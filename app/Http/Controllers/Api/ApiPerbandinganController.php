<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Perbandingan;
use Illuminate\Http\Request;

class ApiPerbandinganController extends Controller
{
    public function getAllPerbandingan()
    {
        return response()->json(Perbandingan::with('perbandingan')->get(), 200);
    }

    public function storePerbandingan(Request $request)
    {
        $storePerbandingan = new Perbandingan();
        $storePerbandingan->nama = $request->nama;
        $storePerbandingan->nilai = $request->nilai;
        $storePerbandingan->save();
        return response([
            'status' => 'OK',
            'message' => 'Pebandingan Disimpan',
            'data' => $storePerbandingan
        ], 200);
    }

    public function updatePerbandingan(Request $request, $id)
    {
        $check_perbandingan = Perbandingan::firstWhere('id', $id);
        if ($check_perbandingan) {
            $data_perbandingan = Perbandingan::find($id);
            $data_perbandingan->nama = $check_perbandingan->nama;
            $data_perbandingan->nilai = $check_perbandingan->nilai;
            $data_perbandingan->save();
            return response([
                'status' => 'OK',
                'message' => 'Perbandingan Diubah',
                'data' => $data_perbandingan
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Perbandingan tidak ditemukan'
            ], 404);
        }
    }

    public function deletePerbandingan($id)
    {
        $check_perbandingan = Perbandingan::firstWhere('id', $id);
        if ($check_perbandingan) {
            Perbandingan::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Perbandingan Dihapus'
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Perbandingan tidak ditemukan'
            ], 404);
        }
    }
}
