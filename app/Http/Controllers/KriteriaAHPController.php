<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KriteriaAHP;
use Illuminate\Support\Facades\DB;

class KriteriaAHPController extends Controller
{
    public function get_all_kr_ahp(){
        return response()->json(KriteriaAHP::all(), 200);
    }

    public function insert_kri_ahp(Request $request){
        $insert_kr_ahp = new KriteriaAHP;
        $insert_kr_ahp->nama = $request->namaKriteria;
        $insert_kr_ahp->bobot = $request->bobotKriteria;
        $insert_kr_ahp->tipe = $request->tipeKriteria;
        $insert_kr_ahp->save();
        return response([
            'status' => 'OK',
            'message' => 'Kriteria AHP Disimpan',
            'data' => $insert_kr_ahp
        ], 200);
    }

    public function update_kri_ahp(Request $request, $id){
        $check_kr_ahp = KriteriaAHP::firstWhere('id_kr_ahp', $id);
        if($check_kr_ahp){
            $data_kr_ahp = KriteriaAHP::find($id);
            $data_kr_ahp->nama = $request->namaKriteria;
            $data_kr_ahp->bobot = $request->bobotKriteria;
            $data_kr_ahp->tipe = $request->tipeKriteria;
            $data_kr_ahp->save();
            return response([
                'status' => 'OK',
                'message' => 'Kriteria AHP Disimpan',
                'data' => $data_kr_ahp
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Kriteria AHP tidak ditemukan'
            ], 404);
        }
    }

    public function delete_kri_ahp($id){
        $check_kr_ahp = KriteriaAHP::firstWhere('id_kr_ahp', $id);
        if ($check_kr_ahp) {
            KriteriaAHP::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Kriteria AHP Dihapus'
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Kriteria AHP tidak ditemukan'
            ], 404);
        }
    }

    public function index(){
        //mengambil data dari tabel user
        $user = DB::table('kriteria_ahp')->get();
        //mengirim data ke view user
        return view('kriteria/index', ['kriteria' => $user, 'no' => 1]);
    }
}
