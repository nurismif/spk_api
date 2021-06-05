<?php

namespace App\Http\Controllers;

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
        return view('spk.ahp');
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
