<?php
/**
 * GitHub: RoyalHaze
 * Date: 6/4/23
 * Time: 10:04 PM
 **/

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Matriphe\Larinfo\Larinfo;

class SystemInfoHelper
{
    public static function run()
    {

    }

    public static function getMemInfo()
    {
        $meminfo = file_get_contents('/proc/meminfo');

        $lines = explode("\n", $meminfo);

        $totalMemory = 0;
        $freeMemory = 0;
        $usedMemory = 0;

        foreach ($lines as $line) {
            $parts = explode(":", $line);
            if (isset($parts[1])) {
                $key = trim($parts[0]);
                $value = preg_replace('/\D/', '', $parts[1]);

                if ($key === 'MemTotal') {
                    $totalMemory = intval($value);
                } elseif ($key === 'MemFree' || $key === 'MemAvailable') {
                    $freeMemory = intval($value);
                }
            }
        }

        $usedMemory = $totalMemory - $freeMemory;

        return [
            'total' => $totalMemory,
            'used' => $usedMemory,
            'free' => $freeMemory,
            'percent' => round($usedMemory / ($totalMemory/100),1)
        ];
    }

    public static function getCpuInfo()
    {

        $statData = file_get_contents('/proc/stat');

        $lines = explode("\n", $statData);

        $cpuInfo = explode(" ", preg_replace('/\s+/', ' ', $lines[0]));
        $cpuUsage = 0;

        $totalTime = 0;
        $idleTime = 0;

        foreach ($cpuInfo as $key => $value) {
            if ($key !== 0) {
                $totalTime += $value;
                if ($key === 4) {
                    $idleTime = $value;
                }
            }
        }

        $cpuUsage = 100 - (($idleTime / $totalTime) * 100);

        return round($cpuUsage, 2);
    }

    public static function getDiskInfo()
    {
        $free = round(disk_free_space(".") / 1000000000);
        $total = round(disk_total_space(".") / 1000000000);
        $used = round($total - $free);

        return [
            'total' => $total,
            'free' => $free,
            'used' => $used,
            'percent' => round($used / ($total/100),1)
        ];
    }

    public static function getNetInfo()
    {
        $devData = file_get_contents('/proc/net/dev');
        $lines = explode("\n", $devData);

        $interface = 'eth0'; // Adjust the network interface name if necessary
        $uploadRate = 0;
        $downloadRate = 0;

        foreach ($lines as $line) {
            if (str_contains($line, $interface)) {
                $data = explode(':', $line);
                $values = preg_split('/\s+/', trim($data[1]));

                $uploadBytes = $values[1];
                $downloadBytes = $values[9];
                $totalDownloadBytes = $values[8];
                $totalUploadBytes = $values[0];

                break;
            }
        }


        return [
            'upload' => self::formatBytes($uploadBytes) . '/s',
            'download' =>self::formatBytes($downloadBytes) . '/s',
            'total_download' => self::formatBytes($totalDownloadBytes),
            'total_upload' => self::formatBytes($totalUploadBytes)
        ];
    }

    private static function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public static function getIpInfo()
    {
        if (Cache::has('ip_info')){
           return json_decode(Cache::get('ip_info'),true);
        }else{
            $client = new Client();

            $response = $client->get('http://ip-api.com/json/');

            if ($response->getStatusCode() != 200){
                return null;
            }

            $data = json_decode($response->getBody(),true);

            Cache::put('ip_info',json_encode($data),now()->addDays(3));

            return $data;
        }
    }
}
