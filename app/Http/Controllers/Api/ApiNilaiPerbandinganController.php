<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\NilaiPerbandingan;
use Illuminate\Http\Request;

class ApiNilaiPerbandinganController extends Controller
{
    public function getAllNilaiPerbandingan()
    {
        return response()->json(NilaiPerbandingan::all(), 200);
    }

    public function storeNilaiPerbandingan(Request $request)
    {
        $check_nil_perbandingan1 = NilaiPerbandingan::where([
            ['kriteria_ahp_id', '=', $request->kriteriaID],
            ['target_kriteria_ahp_id', '=', $request->targetkriteriaID],
        ])->first();

        if ($check_nil_perbandingan1) {
            $data_nil_perbandingan1 = NilaiPerbandingan::find($check_nil_perbandingan1->id);
            $data_nil_perbandingan1->nilai_perbandingan = $request->nilai;
            $data_nil_perbandingan1->save();

            $check_nil_perbandingan2 = NilaiPerbandingan::where([
                ['kriteria_ahp_id', '=', $request->targetkriteriaID],
                ['target_kriteria_ahp_id', '=', $request->kriteriaID],
            ])->first();

            if ($check_nil_perbandingan2) {
                $data_nil_perbandingan2 = NilaiPerbandingan::find($check_nil_perbandingan2->id);
                $data_nil_perbandingan2->nilai_perbandingan = 1 / $request->nilai;
                $data_nil_perbandingan2->save();
            }

            return response([
                'status' => 'OK',
                'message' => 'Nilai Perbandingan Disimpan',
                'data' => $check_nil_perbandingan1
            ], 200);
        }

        $insert_nil_perbandingan1 = new NilaiPerbandingan();
        $insert_nil_perbandingan1->kriteria_ahp_id = $request->kriteriaID;
        $insert_nil_perbandingan1->target_kriteria_ahp_id = $request->targetkriteriaID;
        $insert_nil_perbandingan1->nilai_perbandingan = $request->nilai;
        $insert_nil_perbandingan1->save();

        $insert_nil_perbandingan2 = new NilaiPerbandingan();
        $insert_nil_perbandingan2->kriteria_ahp_id = $request->targetkriteriaID;
        $insert_nil_perbandingan2->target_kriteria_ahp_id = $request->kriteriaID;
        $insert_nil_perbandingan2->nilai_perbandingan = 1 / $request->nilai;
        $insert_nil_perbandingan2->save();
        return response([
            'status' => 'OK',
            'message' => 'Nilai Perbandingan Disimpan',
            'data' => $insert_nil_perbandingan1
        ], 200);
    }

    public function updateNilaiPerbandingan(Request $request, $id)
    {
        $check_nil_perbandingan = NilaiPerbandingan::firstWhere('id', $id);
        if ($check_nil_perbandingan) {
            $data_nil_perbandingan = NilaiPerbandingan::find($id);
            $data_nil_perbandingan->kriteria_ahp_id = $request->kriteriaID;
            $data_nil_perbandingan->targetkriteria_ahp_id = $request->targetkriteriaID;
            $data_nil_perbandingan->perbandingan_id = $request->perbandinganID;
            $data_nil_perbandingan->save();
            return response([
                'status' => 'OK',
                'message' => 'Nilai Perbandingan Disimpan',
                'data' => $data_nil_perbandingan
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Perbandingan tidak ditemukan'
            ], 404);
        }
    }

    public function deleteNilaiPerbandingan($id)
    {
        $check_nil_perbandingan = NilaiPerbandingan::firstWhere('id', $id);
        if ($check_nil_perbandingan) {
            NilaiPerbandingan::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Nilai Perbandingan Dihapus'
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Nilai Perbandingan tidak ditemukan'
            ], 404);
        }
    }
}
