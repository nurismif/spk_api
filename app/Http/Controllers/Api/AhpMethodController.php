<?php

namespace App\Http\Controllers\Api;

use App\AhpMethod;
use App\Http\Controllers\Controller;
use App\Services\AhpMethodService;

class AhpMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ahp_methods = AhpMethod::get();
        return response(
            $ahp_methods,
            200
        );
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

        $ahp_methods = AhpMethod::get();
        return response(
            $ahp_methods,
            200
        );
    }
}
