<?php

namespace App\Http\Controllers;

use App\Services\WpMethodService;
use App\WpMethod;

class WpMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wp_methods = WpMethod::orderBy('rank')->get();
        return view('spk.wp', compact('wp_methods'));
    }

    /**
     * Generate the WP method and store it to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        $wp_method_service = new WpMethodService();
        $wp_method_service->recalculateWpValues();

        return redirect()->route('wp');
    }
}
