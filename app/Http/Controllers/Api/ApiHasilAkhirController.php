<?php

namespace App\Http\Controllers\Api;

use App\AhpMethod;
use App\Http\Controllers\Controller;
use App\Http\Resources\AhpMethodResource;
use App\Http\Resources\HasilAkhirResource;
use App\Http\Resources\WpMethodResource;
use App\Services\HasilAkhirService;
use App\WpMethod;
use Illuminate\Http\Request;

class ApiHasilAkhirController extends Controller
{
    public function index()
    {
        $hasil_akhir_service = new HasilAkhirService();
        $hasil_akhir_service->compareMethodSensitivities();
        $hasil_akhir_method = $hasil_akhir_service->getSmallestValuesMethod();
        $method_values = $hasil_akhir_service->getMethodValues();
        $sensitivity = $hasil_akhir_service->getCurrentSensitivity();

        $data = collect();
        $data->method = $hasil_akhir_method;
        $data->sensitivity = $sensitivity;
        $data->method_values = $method_values;

        return new HasilAkhirResource($data);
    }

    public function generate()
    {
        $hasil_akhir_service = new HasilAkhirService();
        $hasil_akhir_service->generateEachMethodValues();

        return $this->index();
    }
}
