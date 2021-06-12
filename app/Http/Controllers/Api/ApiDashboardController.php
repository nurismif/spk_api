<?php

namespace App\Http\Controllers\Api;

use App\AhpMethod;
use App\Http\Controllers\Controller;
use App\WpMethod;

class ApiDashboardController extends Controller
{
    public function showAhpChart()
    {
        $ahpMethods = AhpMethod::orderBy('rank')->get();
        $data = collect();
        foreach ($ahpMethods as  $ahpMethod) {
            $data[$ahpMethod->user->nama] = $ahpMethod->ahp_value;
        }
        return response([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function showWpChart()
    {
        $wpMethods = WpMethod::orderBy('rank')->get();
        $data = collect();
        foreach ($wpMethods as  $wpMethod) {
            $data[$wpMethod->user->nama] = $wpMethod->wp_value;
        }
        return response([
            'status' => 200,
            'data' => $data
        ]);
    }
}
