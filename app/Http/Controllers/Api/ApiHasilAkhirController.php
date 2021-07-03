<?php

namespace App\Http\Controllers\Api;

use App\AhpMethod;
use App\Http\Controllers\Controller;
use App\Http\Resources\AhpMethodResource;
use App\Http\Resources\WpMethodResource;
use App\Services\HasilAkhirService;
use App\WpMethod;
use Illuminate\Http\Request;

class ApiHasilAkhirController extends Controller
{
    public function index()
    {
        $hasil_akhir_service = new HasilAkhirService();
        $hasil_akhir_method = $hasil_akhir_service->compareMethodSensitivities();

        $method_values = [];
        if ($hasil_akhir_method == 'ahp') {
            $method_values = AhpMethod::orderBy('rank');
            return AhpMethodResource::collection($method_values);
        }

        $method_values = WpMethod::orderBy('rank');
        return WpMethodResource::collection($method_values);
    }

    public function generate()
    {
        $hasil_akhir_service = new HasilAkhirService();
        $hasil_akhir_service->generateEachMethodValues();

        $hasil_akhir_method = $hasil_akhir_service->compareMethodSensitivities();
        $method_values = [];
        if ($hasil_akhir_method == 'ahp') {
            $method_values = AhpMethod::orderBy('rank');
            return AhpMethodResource::collection($method_values);
        }

        $method_values = WpMethod::orderBy('rank');
        return WpMethodResource::collection($method_values);
    }
}
