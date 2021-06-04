<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WpMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spk.wp');
    }

    /**
     * Generate the AHP method and store it to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        //
    }
}
