<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WpMethodService;
use App\WpMethod;
use Illuminate\Http\Request;

class ApiWpMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wp_methods = WpMethod::get();
        return response(
            $wp_methods,
            200
        );
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

        $wp_methods = WpMethod::get();
        return response(
            $wp_methods,
            200
        );
    }
}
