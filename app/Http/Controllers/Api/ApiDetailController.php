<?php

namespace App\Http\Controllers\Api;

use App\DetailKriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiDetailController extends Controller
{
    public function getAllDetailKriteria()
    {
        return response()->json(DetailKriteria::with('kriteria_ahp')->get(), 200);
    }

    public function storeDetailKriteria(Request $request)
    {
        $storeDetailKriteria = new DetailKriteria();
        $storeDetailKriteria->kompetensi = $request->kompetensi;
        $storeDetailKriteria->kriteria_ahp_id = $request->kriteriaID;
        $storeDetailKriteria->range_nilai = $request->rangeNilai;
        $storeDetailKriteria->save();
        return response([
            'status' => 'OK',
            'message' => 'Detail Kriteria Disimpan',
            'data' => $storeDetailKriteria
        ], 200);
    }

    public function updateDetailKriteria(Request $request, $id)
    {
        $check_detail = DetailKriteria::firstWhere('id', $id);
        if ($check_detail) {
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
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Detail Kriteria tidak ditemukan'
            ], 404);
        }
    }

    public function deleteDetailKriteria($id)
    {
        $check_detail = DetailKriteria::firstWhere('id', $id);
        if ($check_detail) {
            DetailKriteria::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Detail Kriteria Dihapus'
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Detail Kriteria tidak ditemukan'
            ], 404);
        }
    }
}
