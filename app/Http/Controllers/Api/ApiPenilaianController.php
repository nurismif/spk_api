<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PenilaianCollection;
use App\Http\Resources\PenilaianResource;
use App\Penilaian;
use Illuminate\Http\Request;

class ApiPenilaianController extends Controller
{
    public function getAllPenilaian()
    {
        $penilaian_list = Penilaian::orderBy('kriteria_ahp_id')->get()
            ->groupBy('user_id')
            ->sort()
            ->values()
            ->map(
                function ($group) {
                    $nilai = collect();
                    foreach ($group as $key => $value) {
                        $nilai->put($value->kriteriaAhp->nama, $value->nilai);
                    }
                    return (object)[
                        'nilai' => $nilai,
                        'user' => $group[0]->user
                    ];
                }
            );

        return PenilaianResource::collection($penilaian_list);
    }

    public function insertNilaiAhp(Request $request)
    {
        $insertNilaiAhp = new Penilaian;
        $insertNilaiAhp->user_id = $request->userID;
        $insertNilaiAhp->kriteria_ahp_id = $request->kriteriaID;
        $insertNilaiAhp->nilai = $request->nilaiKriteria;
        $insertNilaiAhp->save();
        return response([
            'status' => 'OK',
            'message' => 'Penilaian AHP Disimpan',
            'data' => $insertNilaiAhp
        ], 200);
    }

    public function updateNilaiAhp(Request $request, $id)
    {
        $check_pen_ahp = Penilaian::firstWhere('id', $id);
        if ($check_pen_ahp) {
            $data_pen_ahp = Penilaian::find($id);
            $data_pen_ahp->user_id = $check_pen_ahp->user_id;
            $data_pen_ahp->kriteria_ahp_id = $check_pen_ahp->kriteria_ahp_id;
            $data_pen_ahp->nilai = $request->nilai;
            $data_pen_ahp->save();
            return response([
                'status' => 'OK',
                'message' => 'Penilaian AHP Disimpan',
                'data' => $data_pen_ahp
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Penilaian AHP tidak ditemukan'
            ], 404);
        }
    }

    public function deleteNilaiAhp($id)
    {
        $check_pen_ahp = Penilaian::firstWhere('id', $id);
        if ($check_pen_ahp) {
            Penilaian::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Penilaian Dihapus'
            ], 200);
        } else {
            return response([
                'status' => 'NOT FOUND',
                'message' => 'Id Penilaian tidak ditemukan'
            ], 404);
        }
    }
}
