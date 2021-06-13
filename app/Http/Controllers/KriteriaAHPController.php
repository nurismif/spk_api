<?php

namespace App\Http\Controllers;

use App\DetailKriteria;
use Illuminate\Http\Request;
use App\KriteriaAHP;
use App\Services\ConstantService;
use App\Services\MatriksPerbandinganService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KriteriaAHPController extends Controller
{

public function index()
    {
        //mengambil data dari tabel user
        $user = DB::table('kriteria_ahp')->get();
        //mengirim data ke view user
        return view('kriteria/index', ['kriteria' => $user, 'no' => 1]);
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator  = Validator::make($data, [
            'nama'   =>  'required|string|max:255',
            'bobot'   =>  'required|string|max:50',
            'tipe'   =>  'required|string|max:100',
        ]);

        if ($validator->fails()) {
            # code...
            // return redirect('siswa/create');
            return redirect('/admin/kriteria/create')
                ->withInput()
                ->withErrors($validator);
        }

        KriteriaAHP::create($data);
        return redirect('admin/kriteria/index');
    }

    public function edit($id)
    {
        $kriteria = KriteriaAHP::findOrFail($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $kriteria = KriteriaAHP::findOrFail($id);

        $validator  = Validator::make($data, [
            'nama'   =>  'required|string|max:255',
            'bobot'   =>  'required|string|max:50',
            'tipe'   =>  'required|string|max:100',
        ]);

        if ($validator->fails()) {
            # code...
            // return redirect('siswa/create');
            return redirect('/admin/user/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $kriteria->update($data);
        return redirect('admin/kriteria/index');
    }

    public function delete($id)
    {
        $kriteria = KriteriaAHP::findOrFail($id);
        $kriteria->delete();
        // Session::flash('success','Product Deleted Success!');
        return redirect('admin/kriteria/index');
    }

    public function detail($id)
    {
        $detail_kriteria = DetailKriteria::where('kriteria_ahp_id', $id)
            ->join('kriteria_ahp', 'kriteria_ahp.id', '=', 'detail_kriteria.kriteria_ahp_id')
            ->select('detail_kriteria.*', 'kriteria_ahp.nama as nama_kriteria_ahp')
            ->get();

        // return "<pre>".print_r($detail_kriteria, true)."</pre>";
        return view('kriteria.detail', ['no' => 1, 'detail_kriteria' => $detail_kriteria], compact('detail_kriteria'));
    }

    public function matriks()
    {
        $list_kriteria = KriteriaAHP::get();
        $list_perbandingan =  (new ConstantService())->getPerbandinganRules();

        $matrix_perbandingan_service = new MatriksPerbandinganService();
        $matriks = $matrix_perbandingan_service->getMatrix($list_kriteria);

        return view(
            'kriteria.matriks',
            [
                'list_kriteria' => $list_kriteria,
                'list_perbandingan' => $list_perbandingan,
                'matriks' => $matriks
            ]
        );
    }


    public function matriksUpdate(Request $request)
    {
        $matriks_service = new  MatriksPerbandinganService();

        $kriteria1_id = $request->kriteria1;
        $kriteria2_id = $request->kriteria2;
        $pebandingan_value = $request->perbandingan;

        if ($kriteria1_id == $kriteria2_id) {
            // when row and coll have a same value, we update only one value at matrix[row][col]
            $matriks_service->updateMatrixValue($pebandingan_value, $kriteria1_id, $kriteria1_id);
        } else {
            // when row and coll have a diffrent value, we update the value at matrix[row][col] and matrix[col][row]
            $matriks_service->updateMatrixValue($pebandingan_value, $kriteria1_id, $kriteria2_id);
            $matriks_service->updateMatrixValue($pebandingan_value, $kriteria2_id, $kriteria1_id, true);
        }

        return redirect()->back();
    }

    public function matriksReset()
    {
        $matriks_service = new  MatriksPerbandinganService();
        $matriks_service->resetMatrixValue();

        return redirect()->back();
    }
}
