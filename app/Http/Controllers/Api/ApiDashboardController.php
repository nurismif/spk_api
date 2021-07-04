<?php

namespace App\Http\Controllers\Api;

use App\AhpMethod;
use App\Http\Controllers\Controller;
use App\Services\HasilAkhirService;
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

    public function showHasilAkhirChart()
    {
        $hasil_akhir_service = new HasilAkhirService();
        $hasil_akhir_service->compareMethodSensitivities();
        $hasil_akhir_method = $hasil_akhir_service->getSmallestValuesMethod();
        $method_values = $hasil_akhir_service->getMethodValues();

        $values = collect();
        foreach ($method_values as $method) {
            $values[$method->user->nama] = $hasil_akhir_method == 'ahp' ? $method->ahp_value : $method->wp_value;
        }

        $data = collect();
        $data->put('values', $values);
        $data->put('method', $hasil_akhir_method);

        return response([
            'status' => 200,
            'data' => $data
        ]);
    }
}
