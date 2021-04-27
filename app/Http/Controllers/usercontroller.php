<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(){
		return view('auth.login');
	}

    public function postApiLogin(Request $request){
        $data = User::firstWhere([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);
        
        if($data){
            return response([
                'status' => 200,
                'success' => true,
                'message' => 'Login berhasil',
                'data' => $data
            ]);
        }
        else{
            return response([
                'status' => 200,
                'success' => false,
                'message' => 'Username atau password salah',
                'data' => null
            ]);
        }
    }

	public function postlogin(Request $request){
		
        $data = User::firstWhere([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);
        
        if($data){
            return view('/template/dashboard');
        }

        return redirect('/admin/login');

		// if ($this->get_all_user()::attempt($request->only('username', 'password'))) {
		// 	# code...
		// 	return redirect('/welcome');
		// }

		// return redirect('/login');
	}

	public function logout(){
		FacadesAuth::logout();
		return redirect('/login');
	}

    public function get_all_user(){
        return response()->json(User::all(), 200);
    }

    public function insert_guru(Request $request){
        $data = $request->input();
        $data['jabatan'] = 'Guru';
        $insert_user = User::create($data);
        return response([
            'status' => 200,
            'message' => 'Berhasil menginput data guru',
            'data' => $insert_user
        ]);
    }

    public function insert_kepsek(Request $request){
        $data = $request->input();
        $data['jabatan'] = 'KepSek';
        $data['jurusan'] = null;
        $insert_user = User::create($data);
        return response([
            'status' => 200,
            'message' => 'Berhasil menginput data kepsek',
            'data' => $insert_user
        ]);
    }

    public function insert_tim_pkg(Request $request){
        $data = $request->input();
        $data['jabatan'] = 'Tim_PKG';
        $data['jurusan'] = null;
        $insert_user = User::create($data);
        return response([
            'status' => 200,
            'message' => 'Berhasil menginput data tim pkg',
            'data' => $insert_user
        ]);
    }

    public function update_user(Request $request, $id){
        $body = $request->input();
        if($request->exists('id')){
            return response([
                'status' => 'Not Allowed',
                'message' => 'ID tidak boleh diganti'
            ]);
        }

        $data = User::find($id);
        if($data){
            if($data->jabatan === 'kepsek' || $data->jabatan === 'tim_pkg'){
                $body['jurusan'] = null;
            }
            $data = User::where('id', $id)->update($body);
            return response([
                'status' => 'OK',
                'message' => 'Data berhasil diupdate',
                'data' => $body
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function delete_user(Request $request, $id){
        $data = User::firstWhere('id', $id);
        if ($data) {
            User::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data User Dihapus'
            ], 200);
        } else{
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id User tidak ditemukan'
            ], 404);
        }
    }

    public function index(){
        //mengambil data dari tabel user
        $user = DB::table('users')->get();
        //mengirim data ke view user
        return view('user/index', ['user' => $user, 'no' => 1]);

    }

}
