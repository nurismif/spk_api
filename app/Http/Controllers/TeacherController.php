<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    
    public function index(){
        //mengambil data dari tabel user
        $user = DB::table('users')->get()->where('jabatan', '=', 'Guru');
        //mengirim data ke view user
        return view('guru/index', ['user' => $user, 'no' => 1]);
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('guru.edit', compact('users'));
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
            return redirect('/admin/guru/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $user->update($request->all());
        return redirect('admin/guru/index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/guru/index')->with('status', 'Guru Berhasil Dihapus');
    }
}
