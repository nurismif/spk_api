<?php

namespace App\Http\Controllers;

use App\DetailKriteria;
use Illuminate\Http\Request;
use App\KriteriaAHP;
use App\MatriksKriteria;
use App\Services\ConstantService;
use App\Services\MatriksPerbandinganService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KriteriaAHPController extends Controller
{
    public function get_all_kr_ahp()
    {
        return response()->json(KriteriaAHP::all(), 200);
    }

    public function get_detail_kriteria_ahp(Request $request, $kriteria_ahp_id)
    {
        return DetailKriteria::where('kriteria_ahp_id', $kriteria_ahp_id)->get();
    }

    public function insert_kri_ahp(Request $request)
    {
        $insert_kr_ahp = new KriteriaAHP;
        $insert_kr_ahp->nama = $request->namaKriteria;
        $insert_kr_ahp->bobot = $request->bobotKriteria;
        $insert_kr_ahp->tipe = $request->tipeKriteria;
        $insert_kr_ahp->save();
        return response([
            'status' => 'OK',
            'message' => 'Kriteria AHP Disimpan',
            'data' => $insert_kr_ahp
        ], 200);
    }

    public function update_kri_ahp(Request $request, $id)
    {
        $check_kr_ahp = KriteriaAHP::firstWhere('id_kr_ahp', $id);
        if ($check_kr_ahp) {
            $data_kr_ahp = KriteriaAHP::find($id);
            $data_kr_ahp->nama = $request->namaKriteria;
            $data_kr_ahp->bobot = $request->bobotKriteria;
            $data_kr_ahp->tipe = $request->tipeKriteria;
            $data_kr_ahp->save();
            return response([
                'status' => 'OK',
                'message' => 'Kriteria AHP Disimpan',
                'data' => $data_kr_ahp
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Kriteria AHP tidak ditemukan'
            ], 404);
        }
    }

    public function delete_kri_ahp($id)
    {
        $check_kr_ahp = KriteriaAHP::firstWhere('id_kr_ahp', $id);
        if ($check_kr_ahp) {
            KriteriaAHP::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Kriteria AHP Dihapus'
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Kriteria AHP tidak ditemukan'
            ], 404);
        }
    }

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

        // dd($detail_kriteria);
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
}
