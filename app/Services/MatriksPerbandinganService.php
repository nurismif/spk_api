<?php

namespace App\Services;

use App\NilaiPerbandingan;
use Illuminate\Support\Collection;

class MatriksPerbandinganService
{
     public function getMatrix(Collection $list_kriteria)
     {
          $data = collect();
          $groups = NilaiPerbandingan::orderBy('target_kriteria_ahp_id')
               ->get()
               ->groupBy("kriteria_ahp_id")
               ->sort()
               ->values();
               
          foreach ($groups as $i => $group) {
               $map_group = $group->map(function ($item) {
                    return $item->nilai_perbandingan;
               });
               $data->put($list_kriteria[$i]->nama, $map_group);
          };

          return $data;
     }

     public function updateMatrixValue($pebandingan_value, $kriteria1_id, $kriteria2_id, $ratio_reversed = false)
     {
          $cell = NilaiPerbandingan::where("kriteria_ahp_id", $kriteria1_id)
               ->where("target_kriteria_ahp_id", $kriteria2_id)
               ->first();

          $float_ratio = floatval($pebandingan_value);
          if ($kriteria1_id == $kriteria2_id) {
               $cell->nilai_perbandingan = 1;
          } else if ($ratio_reversed == false) {
               $cell->nilai_perbandingan = $float_ratio;
          } else {
               $cell->nilai_perbandingan = 1 / $float_ratio;
          }

          $cell->save();
     }

     public function resetMatrixValue()
     {
          NilaiPerbandingan::where("nilai_perbandingan", "!=", 0)
               ->update(["nilai_perbandingan" => 0]);
     }
}
