<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penilaian;
use App\Imports\PenilaianImport;
use App\KriteriaAHP;
use App\User;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PenilaianController extends Controller
{

    public function index()
    {

        //mengambil data darri database menggunakan db::table() dan disimpan ke dalam $data
        //menggunakan ->join() untuk menggabungkan tabel lainnya
        //diakhir get() untuk mengambil data array

        //diakhir first() jika hanya satu data yang diambil
        $penilaian_list = Penilaian::orderBy('kriteria_ahp_id')->get()
            ->groupBy('user_id')
            ->sort()
            ->values();
        $kriteria_list = KriteriaAHP::get();

        return view('penilaian.index', [
            'penilaian_list' => $penilaian_list,
            'kriteria_list' => $kriteria_list
        ]);
    }

    public function create()
    {
        $kriteria_list = KriteriaAHP::get();
        $users = User::where('jabatan', User::GURU_ROLE)->get();

        return view('penilaian.create', [
            'kriteria_list' => $kriteria_list,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'user_id'   =>  'required|unique:penilaian,user_id',
            'kriteria_values.*'   =>  'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('penilaian.create')
                ->withInput()
                ->withErrors($validator);
        }

        foreach ($request->kriteria_values as $key => $value) {
            Penilaian::create([
                'user_id' => $request->user_id,
                'kriteria_ahp_id' => $key,
                'nilai' => $value,
            ]);
        }
        return redirect()->route('penilaian.index');
    }


    public function edit($user_id)
    {
        $kriteria_list = KriteriaAHP::get();
        $users = User::where('jabatan', User::GURU_ROLE)->get();
        $penilaian_list = Penilaian::where('user_id', $user_id)->get();

        return view('penilaian.edit', [
            'penilaian_list' => $penilaian_list,
            'kriteria_list' => $kriteria_list,
            'users' => $users,
            'user_id' => $user_id
        ]);
    }

    public function update(Request $request, $user_id)
    {
        $validator  = Validator::make($request->all(), [
            'kriteria_values.*'   =>  'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        foreach ($request->kriteria_values as $key => $value) {
            $penilaian = Penilaian::where('user_id', $user_id)
                ->where('kriteria_ahp_id', $key)
                ->first();
            if ($penilaian != null) {
                $penilaian->update([
                    'nilai' => $value,
                ]);
            }
        }

        return redirect()->route('penilaian.index');
    }

    public function destroy($user_id)
    {
        $penilaian_list = Penilaian::where('user_id', $user_id);
        $penilaian_list->delete();
        return redirect()->route('penilaian.index')->with('status', 'User Berhasil Dihapus');
    }

    public function import(Request $request)
    {
        if (Penilaian::first() != null) {
            Penilaian::truncate();
        }
        FacadesExcel::import(new PenilaianImport, $request->file);
        return redirect()->route('penilaian');
    }
}
