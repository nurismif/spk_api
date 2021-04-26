<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    // public function get_all_teacher(){
    //     return response()->json(Teacher::all(), 200);
    // }

    // public function insert_data_teacher(Request $request){
    //     $insert_teacher = new Teacher;
    //     $insert_teacher->nama_guru = $request->namaGuru;
    //     $insert_teacher->nip = $request->NIP;
    //     $insert_teacher->tanggal_lahir = $request->tanggalLahir;
    //     $insert_teacher->jenkel = $request->jenisKelamin;
    //     $insert_teacher->jurusan = $request->jurusan;
    //     $insert_teacher->save();
    //     return response([
    //         'status' => 'OK',
    //         'message' => 'Teacher Disimpan',
    //         'data' => $insert_teacher
    //     ], 200);
    // }

    // public function update_data_teacher(Request $request, $id){
    //     $check_teacher = Teacher::firstWhere('id', $id);
    //     if($check_teacher){
    //         $data_teacher = Teacher::find($id);
    //         $data_teacher->nama_guru = $request->namaGuru;
    //         $data_teacher->nip = $request->NIP;
    //         $data_teacher->tanggal_lahir = $request->tanggalLahir;
    //         $data_teacher->jenkel = $request->jenisKelamin;
    //         $data_teacher->jurusan = $request->jurusan;
    //         $data_teacher->save();
    //         return response([
    //             'status' => 'OK',
    //             'message' => 'Teacher Diperbarui',
    //             'data' => $data_kr_ahp
    //         ], 200);
    //     } else{
    //         return response([
    //             'status' => 'NOT FOUND',
    //             'message' => 'Id Teacher tidak ditemukan'
    //         ], 404);
    //     }
    // }

    // public function delete_data_teacher($id){
    //     $check_teacher = Teacher::firstWhere('id', $id);
    //     if ($check_teacher) {
    //         Teacher::destroy($id);
    //         return response([
    //             'status' => 'OK',
    //             'message' => 'Teacher Dihapus'
    //         ], 200);
    //     } else{
    //         return response([
    //             'status' => 'NOT FOUND',
    //             'message' => 'Id Teacher tidak ditemukan'
    //         ], 404);
    //     }
    // }

    public function index(){
        //mengambil data dari tabel user
        $user = DB::table('users')->get()->where('jabatan', '=', 'Guru');
        //mengirim data ke view user
        return view('guru/index', ['user' => $user, 'no' => 1]);
    }
}
