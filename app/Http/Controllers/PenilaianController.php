<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penilaian;

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
        return view('/penilaian/index');
    }
}
