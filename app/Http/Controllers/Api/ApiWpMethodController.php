<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WpMethodResource;
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
        $wp_methods = WpMethod::orderBy('rank')->get();
        return WpMethodResource::collection($wp_methods);
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

        $wp_methods = WpMethod::orderBy('rank')->get();
        return WpMethodResource::collection($wp_methods);
    }
}
