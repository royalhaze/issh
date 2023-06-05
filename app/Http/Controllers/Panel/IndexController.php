<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\SystemInfoHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
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
