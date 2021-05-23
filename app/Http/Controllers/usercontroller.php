<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth;
use App\KriteriaAHP;
use App\Penilaian;
use ArrayObject;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postApiLogin(Request $request)
    {
        $data = User::firstWhere([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);
        if ($data) {
            return response([
                'status' => 200,
                'success' => true,
                'message' => 'Login berhasil',
                'data' => $data
            ]);
        } else {
            return response([
                'status' => 200,
                'success' => false,
                'message' => 'Username atau password salah',
                'data' => null
            ]);
        }
    }

    public function postlogin(Request $request)
    {

        $data = User::firstWhere([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);

        if ($data) {
            Session::put('user_id', $data->id);
            Session::put('user_nama', $data->nama);
            return redirect('/admin/template/dashboard');
        }

        return redirect('/admin/login');

        // if ($this->get_all_user()::attempt($request->only('username', 'password'))) {
        // 	# code...
        // 	return redirect('/welcome');
        // }

        // return redirect('/login');
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect('/admin/login');
    }

    public function get_all_user()
    {
        return response()->json(User::all(), 200);
    }

    public function get_nilai_user(Request $request, $user_id){
        return Penilaian::where('user_id', $user_id)->get();
    }

    public function get_profile_user(Request $request, $id){
        return User::where('id', $id)->get();
    }

    public function insert_guru(Request $request)
    {
        $data = $request->input();
        $data['jabatan'] = 'Guru';
        $insert_user = User::create($data);
        return response([
            'status' => 200,
            'message' => 'Berhasil menginput data guru',
            'data' => $insert_user
        ]);
    }

    public function insert_kepsek(Request $request)
    {
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

    public function insert_tim_pkg(Request $request)
    {
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

    public function update_user(Request $request, $id)
    {
        $body = $request->input();
        if ($request->exists('id')) {
            return response([
                'status' => 'Not Allowed',
                'message' => 'ID tidak boleh diganti'
            ]);
        }

        $data = User::find($id);
        if ($data) {
            if ($data->jabatan === 'kepsek' || $data->jabatan === 'tim_pkg') {
                $body['jurusan'] = null;
            }
            $data = User::where('id', $id)->update($body);
            return response([
                'status' => 'OK',
                'message' => 'Data berhasil diupdate',
                'data' => $body
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function delete_user(Request $request, $id)
    {
        $data = User::firstWhere('id', $id);
        if ($data) {
            User::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data User Dihapus'
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id User tidak ditemukan'
            ], 404);
        }
    }

    public function index()
    {
        //mengambil data dari tabel user
        $user = DB::table('users')->get();
        //mengirim data ke view user
        return view('user/index', ['user' => $user, 'no' => 1]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator  = Validator::make($data, [
            'nip'   =>  'required|string|max:30|unique:users',
            'nama'   =>  'required|string|max:255',
            'username'   =>  'required|string|max:50|unique:users',
            'password'   =>  'required|string|max:20',
            'jabatan'   =>  'required|string|max:100',
            'jenis_kelamin'   =>  'required|string|max:10',
        ]);

        if ($validator->fails()) {
            # code...
            // return redirect('siswa/create');
            return redirect('/admin/user/create')
                ->withInput()
                ->withErrors($validator);
        }

        User::create($data);
        return redirect('admin/user/index');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('user.show', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        $validator  = Validator::make($data, [
            'nip'   =>  'required|string|max:30',
            'nama'   =>  'required|string|max:255',
            'username'   =>  'required|string|max:50',
            'password'   =>  'required|string|max:20',
            'jurusan'   =>  'required|string|max:100',
            'jabatan'   =>  'required|string|max:100'
        ]);

        if ($validator->fails()) {
            # code...
            // return redirect('siswa/create');
            return redirect('/admin/user/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $user->update($request->all());
        return redirect('admin/user/index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // Session::flash('success','Product Deleted Success!');
        return redirect('admin/user/index');
    }

    public function get_ranking_guru()
    {
        $kriteria = KriteriaAHP::all();
        $totalBobot = 0;
        foreach ($kriteria as $k) {
            $totalBobot += $k->bobot;
        }

        foreach ($kriteria as $k) {
            $k->bobot = $k->bobot / $totalBobot;
            if ($k->tipe === 'cost') {
                $k->bobot = $k->bobot * -1;
            } else if ($k->tipe === 'benefit') {
                $k->bobot = $k->bobot * 1;
            }
        }
        // return "<pre>".print_r($kriteria,true)."</pre>";
        $users = User::with('penilaian')->where('jabatan', '=', 'Guru')->get();
        // return "<pre>".print_r($users, true)."</pre>";
        // return response()->json($users, 200);
        $data = [];
        $result = [];
        foreach ($users as $u) {
            $nilai_total = 1;
            foreach ($u->penilaian as $p) {
                $bobot = 0;
                foreach ($kriteria as $k) {
                    if ($k->id === $p->kriteria_ahp_id) {
                        $bobot = $k->bobot;
                        break;
                    }
                }

                if ($bobot === 0) {
                    break;
                }

                $nilai_per_kriteria = $p->nilai ** $bobot;

                $p->bobot = $bobot;
                $p->nilai_per_kriteria = $nilai_per_kriteria;

                $nilai_total = $nilai_total * $nilai_per_kriteria;
            }
            $u->nilai_total = $nilai_total;
            array_push($result, [
                'nama' => $u->nama,
                'nilai' => $nilai_total
            ]);
            array_push($data, $u);
        }

        usort($result, function($a,$b){
            return $b['nilai'] <=> $a['nilai'];
        });

        return response()->json([
            'status' => 200,
            'result' => $result,
            'data' => $data
        ], 200);
    }
}
