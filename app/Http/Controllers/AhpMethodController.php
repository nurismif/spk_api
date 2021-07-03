<?php

namespace App\Http\Controllers;

use App\AhpMethod;
use App\Services\AhpMethodService;
use Illuminate\Http\Request;

class AhpMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ahp_methods = AhpMethod::orderBy('rank')->get();
        return view('spk.ahp', compact('ahp_methods'));
    }

    /**
     * Generate the AHP method and store it to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        $ahp_method_service = new AhpMethodService();
        $ahp_method_service->recalculateAhpValues();

        return redirect()->route('ahp');
    }
}
