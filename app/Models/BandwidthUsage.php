<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandwidthUsage extends Model
{
    use HasFactory;

    protected $guarded = ['id','user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public static function syncBandwidthUsage()
    {
        $pid = shell_exec("nethogs");
        $pid = preg_replace("/\\s+/", "", $pid);
        // print_r($pid);
        if (!is_numeric($pid)) {
            $out = shell_exec("cat /var/www/html/issh/storage/logs/out.json");
            $usertraffic = [];
            $trafficlog = preg_split("/\r\n|\n|\r/", $out);
            $trafficlog = array_filter($trafficlog);
            $lastdata = end($trafficlog);
            $json = json_decode($lastdata, true);
            $newarray = [];
            foreach ($json as $value) {
                $TX = round($value["TX"], 0);
                $RX = round($value["RX"], 0);
                $name = preg_replace("/\\s+/", "", $value["name"]);
                if (strpos($name, "sshd") === false) {
                    $name = "";
                }
                if (strpos($name, "root") !== false) {
                    $name = "";
                }
                if (strpos($name, "[net]") !== false) {
                    $name = "";
                }
                if (strpos($name, "[accepted]") !== false) {
                    $name = "";
                }
                if (strpos($name, "[rexeced]") !== false) {
                    $name = "";
                }
                if (strpos($name, "@notty") !== false) {
                    $name = "";
                }
                if (strpos($name, "root:sshd") !== false) {
                    $name = "";
                }
                if (strpos($name, "/sbin/sshd") !== false) {
                    $name = "";
                }
                if (strpos($name, "[priv]") !== false) {
                    $name = "";
                }
                if (strpos($name, "@pts/1") !== false) {
                    $name = "";
                }
                if ($value["RX"] < 1 && $value["TX"] < 1) {
                    $name = "";
                }
                $name = str_replace("sshd:", "", $name);
                if (!empty($name)) {
                    if (isset($newarray[$name])) {
                        $newarray[$name]["TX"] + $TX;
                        $newarray[$name]["RX"] + $RX;
                    } else {
                        $newarray[$name] = ["RX" => $RX, "TX" => $TX, "Total" => $RX + $TX];
                    }
                }
            }

            var_dump($newarray);

            shell_exec("sudo kill -9 " . $pid);
            shell_exec("sudo killall -9 nethogs");
            shell_exec("sudo nethogs -j -d 19 -v 3 > /var/www/html/issh/storage/logs/out.json  &");
        } else {
            if(file_exists("/var/www/html/issh/storage/logs/out.json"))
            {
                unlink("/var/www/html/issh/storage/logs/out.json");
            }
            shell_exec("sudo nethogs -j -d 19 -v 3 > /var/www/html/issh/storage/logs/out.json &");

            self::syncBandwidthUsage();
        }
    }
}
