<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Session::get('user_id');
        $user_nama = Session::get('user_nama');
        $count_user = DB::table('users')->count();
        $count_kriteria = DB::table('kriteria_ahp')->count();
        $count_penilaian = DB::table('penilaian')->count();
        return view('template/dashboard', ['user_id' => $user_id, 'user_nama' => $user_nama, 'count_user' =>$count_user, 'count_kriteria' => $count_kriteria, 'count_penilaian' => $count_penilaian]);
    }

}
