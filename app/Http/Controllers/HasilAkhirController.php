<?php

namespace App\Http\Controllers;

use App\AhpMethod;
use App\Services\HasilAkhirService;
use App\User;
use App\WpMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->jabatan == User::TIM_PKG_ROLE) {
            return view('hasil_akhir.index', [
                'method_values' => [],
                'method' => "-",
                'sensitivities' => [],
            ]);
        }

        return view('hasil_akhir.index', [
            'method_values' => [],
            'method' => "-"
        ]);
    }

    public function generatedView()
    {
        $hasil_akhir_service = new HasilAkhirService();
        $hasil_akhir_service->compareMethodSensitivities();
        $hasil_akhir_method = $hasil_akhir_service->getSmallestValuesMethod();
        $method_values = $hasil_akhir_service->getMethodValues();

        if (Auth::user()->jabatan == User::TIM_PKG_ROLE) {
            $sensitivities = $hasil_akhir_service->getSensitivities();
            return view('hasil_akhir.index', [
                'method_values' => $method_values,
                'method' => $hasil_akhir_method,
                'sensitivities' => $sensitivities,
            ]);
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

        return redirect()->route('hasil.akhir.generated.view');
    }
}
