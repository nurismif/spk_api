<?php

namespace App\Http\Controllers;

use App\AhpMethod;
use App\Services\HasilAkhirService;
use Illuminate\Http\Request;

class HasilAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasil_akhir_service = new HasilAkhirService();
        $hasil_akhir_method = $hasil_akhir_service->compareMethodSensitivities();

        $method_values = [];
        if ($hasil_akhir_method == 'ahp') {
            $method_values = AhpMethod::get();
        } else {
            $method_values = AhpMethod::get();
        }

        return view('hasil_akhir.index', [
            'method_values' => $method_values,
            'method' => $hasil_akhir_method
        ]);
    }

    public function generate()
    {
        $hasil_akhir_service = new HasilAkhirService();
        $hasil_akhir_service->generateEachMethodValues();

        return redirect()->route('hasil.akhir');
    }
}
