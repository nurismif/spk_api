<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\KriteriaAHP;
use App\NilaiPerbandingan;
use App\Penilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use function DeepCopy\deep_copy;

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
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $data = User::firstWhere([
                'username' => $request->username,
            ]);

            Session::put('user_id', $data->id);
            Session::put('user_nama', $data->nama);

            return redirect()->route('dashboard');
        }

        return redirect('/admin/login');
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
            'nip'   =>  'required|string|max:18|unique:users',
            'nama'   =>  'required|string|max:255',
            'username'   =>  'required|string|max:50|unique:users',
            'password'   =>  'required|string|max:20|confirmed',
            'jabatan'   =>  'required|string|max:100',
            'jenis_kelamin'   =>  'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/user/create')
                ->withInput()
                ->withErrors($validator);
        }

        $user = User::create($data);
        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
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
            'nip'   =>  'required|string|max:18',
            'nama'   =>  'required|string|max:255',
            'username'   =>  'required|string|max:50',
            'password'   =>  'sometimes|max:20|confirmed',
            'jabatan'   =>  'required|string|max:100'
        ]);

        if ($validator->fails()) {
            # code...
            // return redirect('siswa/create');
            return redirect('/admin/user/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        // Update User
        $user = User::find($id);
        $user->nip = $request->input('nip');
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->jurusan = $request->input('jurusan');
        $user->jabatan = $request->input('jabatan');

        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return $request->type == 'user' ? redirect('admin/user/index') : redirect('admin/teacher/index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/user/index')->with('status', 'User Berhasil Dihapus');
    }
}
