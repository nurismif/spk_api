<?php

namespace App\Http\Controllers;

use App\Perbandingan;
use Illuminate\Http\Request;

class PerbandinganController extends Controller
{
    public function get_all_perbandingan(){
        return response()->json(Perbandingan::with('perbandingan')->get(), 200);
    }

    public function insert_perbandingan(Request $request){
        $insert_perbandingan = new Perbandingan();
        $insert_perbandingan->nama= $request->nama;
        $insert_perbandingan->nilai= $request->nilai;
        $insert_perbandingan->save();
        return response([
            'status' => 'OK',
            'message' => 'Pebandingan Disimpan',
            'data' => $insert_perbandingan
        ], 200);
    }

    public function update_perbandingan(Request $request, $id){
        $check_perbandingan = Perbandingan::firstWhere('id', $id);
        if($check_perbandingan){
            $data_perbandingan = Perbandingan::find($id);
            $data_perbandingan->nama = $check_perbandingan->nama;
            $data_perbandingan->nilai = $check_perbandingan->nilai;
            $data_perbandingan->save();
            return response([
                'status' => 'OK',
                'message' => 'Perbandingan Diubah',
                'data' => $data_perbandingan
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Perbandingan tidak ditemukan'
            ], 404);
        }
    }

    public function delete_perbandingan($id){
        $check_perbandingan = Perbandingan::firstWhere('id', $id);
        if ($check_perbandingan) {
            Perbandingan::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Perbandingan Dihapus'
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Perbandingan tidak ditemukan'
            ], 404);
        }
    }
}
