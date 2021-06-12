<?php

namespace App\Http\Controllers\Api;

use App\DetailKriteria;
use App\Http\Controllers\Controller;
use App\KriteriaAHP;
use Illuminate\Http\Request;

class ApiKriteriaController extends Controller
{
    public function getAllKriteriaAhp()
    {
        $kriteria_list = KriteriaAHP::get();
        return response($kriteria_list, 200);
    }

    public function detailKriteriaAhp(Request $request, $kriteria_ahp_id)
    {
        return DetailKriteria::where('kriteria_ahp_id', $kriteria_ahp_id)->get();
    }

    public function storeKriteriaAhp(Request $request)
    {
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

    public function updateKriteriaAhp(Request $request, $id)
    {
        $check_kr_ahp = KriteriaAHP::firstWhere('id_kr_ahp', $id);
        if ($check_kr_ahp) {
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
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Kriteria AHP tidak ditemukan'
            ], 404);
        }
    }

    public function deleteKriteriaAhp($id)
    {
        $check_kr_ahp = KriteriaAHP::firstWhere('id_kr_ahp', $id);
        if ($check_kr_ahp) {
            KriteriaAHP::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Kriteria AHP Dihapus'
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Kriteria AHP tidak ditemukan'
            ], 404);
        }
    }
}
