<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penilaian;
use App\Imports\PenilaianImport;
use App\KriteriaAHP;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class PenilaianController extends Controller
{

    public function index()
    {

        //mengambil data darri database menggunakan db::table() dan disimpan ke dalam $data
        //menggunakan ->join() untuk menggabungkan tabel lainnya
        //diakhir get() untuk mengambil data array

        //diakhir first() jika hanya satu data yang diambil
        $penilaian_list = Penilaian::orderBy('kriteria_ahp_id')->get()
            ->groupBy('user_id')
            ->sort()
            ->values();
        dd($penilaian_list);
        $kriteria_list = KriteriaAHP::get();

        return view('penilaian/index', [
            'penilaian_list' => $penilaian_list,
            'kriteria_list' => $kriteria_list
        ]);
    }

    public function importForm()
    {
        return view('/penilaian/import_form');
    }

    public function import(Request $request)
    {
        if (Penilaian::first() != null) {
            Penilaian::truncate();
        }
        FacadesExcel::import(new PenilaianImport, $request->file);
        return redirect()->route('admin.penilaian.index');
    }
}
