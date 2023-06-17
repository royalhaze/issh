<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\BashHelper;
use App\Helpers\SystemInfoHelper;
use App\Http\Controllers\Controller;
use App\Models\BandwidthUsage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        BandwidthUsage::syncBandwidthUsage();
        $pid = shell_exec("nethogs");
        dd($pid);
        return view('panel.index');
    }

    public function dashboard_data()
    {
        $data = [
            'cpu' => SystemInfoHelper::getCpuInfo(),
            'net' => SystemInfoHelper::getNetInfo(),
            'mem' => SystemInfoHelper::getMemInfo(),
            'disk' => SystemInfoHelper::getDiskInfo(),
            'ip' => SystemInfoHelper::getIpInfo()
        ];

        return response()->json($data);
    }
}
