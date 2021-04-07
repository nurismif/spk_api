<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KriteriaAHP;

class KriteriaAHPController extends Controller
{
    public function get_all_kr_ahp(){
        return response()->json(KriteriaAHP::all(), 200);
    }

    public function insert_data_kri_ahp(Request $request){
        $insert_kr_ahp = new KriteriaAHP;
        $insert_kr_ahp->nama_kr_ahp = $request->namaKriteria;
        $insert_kr_ahp->bobot_kr_ahp = $request->bobotKriteria;
        $insert_kr_ahp->save();
        return response([
            'status' => 'OK',
            'message' => 'Barang Disimpan',
            'data' => $insert_kr_ahp
        ], 200);
    }

    public function update_data_kri_ahp(Request $request, $id){
        $check_kr_ahp = KriteriaAHP::firstWhere('id_kr_ahp', $id);
        if($check_kr_ahp){
            $data_kr_ahp = KriteriaAHP::find($id);
            $data_kr_ahp->nama_kr_ahp = $request->namaKriteria;
            $data_kr_ahp->bobot_kr_ahp = $request->bobotKriteria;
            $data_kr_ahp->save();
            return response([
                'status' => 'OK',
                'message' => 'Barang Disimpan',
                'data' => $data_kr_ahp
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Kode barang tidak ditemukan'
            ], 404);
        }
    }

    public function delete_data_kri_ahp($id){
        $check_kr_ahp = KriteriaAHP::firstWhere('id_kr_ahp', $id);
        if ($check_kr_ahp) {
            KriteriaAHP::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Barang Dihapus'
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Kode barang tidak ditemukan'
            ], 404);
        }
    }
}
