<?php

namespace App\Services;

use App\KriteriaAHP;
use App\MatriksKriteria;

class MatriksPerbandinganService
{

     public function regenarateMatrix()
     {
          $list_kriteria = KriteriaAHP::get();
          $current_matrix = MatriksKriteria::get();

          if (count($list_kriteria) == count($current_matrix)) {
               return;
          }

          // foreach ($list_kriteria as $kriteria) {
          //      # code...
          // }
     }

     public function getMatrix()
     {
          $data = collect();

          $current_matrix = MatriksKriteria::get();
          foreach ($current_matrix as $i => $matrix) {
               $row = collect(json_decode($matrix->row));
               $data->put(
                    $matrix->nama,
                    $row->values()
               );
          }
          return $data;
     }

     public function updateMatrixValue($pebandingan_value, $kriteria1_name, $kriteria2_name, $ratio_reversed = false)
     {
          $matriks = MatriksKriteria::where("nama", $kriteria1_name)->first();
          $row_data = json_decode(
               $matriks->row
          );

          $val1 = floatval($pebandingan_value);
          $val2 = $row_data->{$kriteria2_name} != "0" ? floatval($row_data->{$kriteria2_name}) : 1;
          if ($ratio_reversed == false) {
               $row_data->{$kriteria2_name} = $val1 / $val2;
          } else {
               $row_data->{$kriteria2_name} = $val2 / $val1;
          }

          $matriks->row = json_encode($row_data);
          $matriks->save();

          return $matriks;
     }
}
