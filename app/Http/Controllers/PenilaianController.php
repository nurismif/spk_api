<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penilaian;
use App\Exports\PenilaianExport;
use App\Imports\PenilaianImport;
use Excel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class PenilaianController extends Controller
{
    public function get_all_penilaian(){
        return response()->json(Penilaian::with('kriteria_ahp', 'user')->get(), 200);
    }

    public function insert_nilai_ahp(Request $request){
        $insert_nilai_ahp = new Penilaian;
        $insert_nilai_ahp->user_id= $request->userID;
        $insert_nilai_ahp->kriteria_ahp_id= $request->kriteriaID;
        $insert_nilai_ahp->nilai= $request->nilaiKriteria;
        $insert_nilai_ahp->save();
        return response([
            'status' => 'OK',
            'message' => 'Penilaian AHP Disimpan',
            'data' => $insert_nilai_ahp
        ], 200);
    }

    public function update_nilai_ahp(Request $request, $id){
        $check_pen_ahp = Penilaian::firstWhere('id', $id);
        if($check_pen_ahp){
            $data_pen_ahp = Penilaian::find($id);
            $data_pen_ahp->user_id = $check_pen_ahp->user_id;
            $data_pen_ahp->kriteria_ahp_id = $check_pen_ahp->kriteria_ahp_id;
            $data_pen_ahp->nilai = $request->nilai;
            $data_pen_ahp->save();
            return response([
                'status' => 'OK',
                'message' => 'Penilaian AHP Disimpan',
                'data' => $data_pen_ahp
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Penilaian AHP tidak ditemukan'
            ], 404);
        }
    }

    public function delete_nilai_ahp($id){
        $check_pen_ahp = Penilaian::firstWhere('id', $id);
        if ($check_pen_ahp) {
            Penilaian::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Penilaian Dihapus'
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Penilaian tidak ditemukan'
            ], 404);
        }
    }

    public function index(){

        //mengambil data darri database menggunakan db::table() dan disimpan ke dalam $data
        //menggunakan ->join() untuk menggabungkan tabel lainnya
        //diakhir get() untuk mengambil data array
    
        //diakhir first() jika hanya satu data yang diambil
    
        $data = DB::table('penilaian')
            ->join('users', 'users.id', '=', 'penilaian.user_id')
            ->join('kriteria_ahp', 'kriteria_ahp.id', '=', 'penilaian.kriteria_ahp_id')
            ->select('penilaian.*', 'users.nama', 'kriteria_ahp.nama as nama_kriteria_ahp')
            ->get();
        // print_r($data);
        // return "";
     return view('penilaian/index', ['penilaian' => $data, 'no' => 1], compact('data'));


        //mengambil data dari tabel user
        // $penilaian = DB::table('penilaian')->get();
        //mengirim data ke view user
        // return view('penilaian/index', ['penilaian' => $penilaian, 'no' => 1]);
    }

    public function importForm(){
        return view('/penilaian/import_form');
    }

    public function import(Request $request)
    {
        FacadesExcel::import(new PenilaianImport,$request->file);
        return redirect('/penilaian/index');
    }
}
