<?php

namespace App\Http\Controllers;

use App\DetailKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function get_all_detailpen(){
        return response()->json(DetailKriteria::with('kriteria_ahp')->get(), 200);
    }

    public function insert_detail(Request $request){
        $insert_detail = new DetailKriteria();
        $insert_detail->kompetensi= $request->kompetensi;
        $insert_detail->kriteria_ahp_id= $request->kriteriaID;
        $insert_detail->range_nilai= $request->rangeNilai;
        $insert_detail->save();
        return response([
            'status' => 'OK',
            'message' => 'Detail Kriteria Disimpan',
            'data' => $insert_detail
        ], 200);
    }

    public function update_detail(Request $request, $id){
        $check_detail = DetailKriteria::firstWhere('id', $id);
        if($check_detail){
            $data_detail = DetailKriteria::find($id);
            $data_detail->kompetensi = $check_detail->kompetensi;
            $data_detail->kriteria_ahp_id = $check_detail->kriteria_id;
            $data_detail->range_nilai = $request->rangeNilai;
            $data_detail->save();
            return response([
                'status' => 'OK',
                'message' => 'Detail Kriteria Diubah',
                'data' => $data_detail
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Detail Kriteria tidak ditemukan'
            ], 404);
        }
    }

    public function delete_detail($id){
        $check_detail = DetailKriteria::firstWhere('id', $id);
        if ($check_detail) {
            DetailKriteria::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Detail Kriteria Dihapus'
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Detail Kriteria tidak ditemukan'
            ], 404);
        }
    }

    public function index(){

        //mengambil data darri database menggunakan db::table() dan disimpan ke dalam $data
        //menggunakan ->join() untuk menggabungkan tabel lainnya
        //diakhir get() untuk mengambil data array
    
        //diakhir first() jika hanya satu data yang diambil
    
        $data = DB::table('detail_kriteria')
            ->join('kriteria_ahp', 'kriteria_ahp.id', '=', 'detail_kriteria.kriteria_ahp_id')
            ->select('kriteria_ahp.nama', 'detail_kriteria.kompetensi', 'detail_kriteria_range_nilai')
            ->get();
     return view('kriteia/detail', ['detail_kriteria' => $data, 'no' => 1], compact('data'));


        //mengambil data dari tabel user
        // $penilaian = DB::table('penilaian')->get();
        //mengirim data ke view user
        // return view('penilaian/index', ['penilaian' => $penilaian, 'no' => 1]);
    }

}
