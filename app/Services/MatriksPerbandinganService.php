<?php

namespace App\Services;

use Illuminate\Support\Collection;

class MatriksPerbandinganService
{
     private $matrix;

     /**
      * @param KriteriaAHP|Collection $list_kriteria
      */
     public function setMatrix(Collection $list_kriteria)
     {
          $this->setKriteriaPerbandinganValue($list_kriteria);
          $this->initMatrixValue($list_kriteria);

          $len = count($list_kriteria);

          for ($i = 0; $i < $len; $i++) {
               $nama_row = $list_kriteria[$i]->nama;
               for ($j = 0; $j < $i; $j++) {
                    $nama_col = $list_kriteria[$j]->nama;
                    $this->matrix[$nama_row][$j] = $list_kriteria[$i]->perbandingan / $list_kriteria[$j]->perbandingan;
                    $this->matrix[$nama_col][$i] = $list_kriteria[$j]->perbandingan / $list_kriteria[$i]->perbandingan;
               }
          }
     }

     private function initMatrixValue(Collection $list_kriteria)
     {
          $this->matrix = collect();
          $len = count($list_kriteria);
          foreach ($list_kriteria as $i => $kriteria) {
               $this->matrix->put(
                    $kriteria->nama,
                    collect()->pad($len, 1)->all()
               );
          };
          $this->matrix = $this->matrix->all();
     }

     public function setKriteriaPerbandinganValue(Collection $list_kriteria)
     {
          $bobot_list = $list_kriteria->pluck("bobot")
               ->unique()
               ->sort()
               ->values();
          foreach ($list_kriteria as $i => $kriteria) {
               $perbandingan = $bobot_list->search($kriteria->bobot);
               $perbandingan += 1 + ($i * 2);
               $kriteria->perbandingan = $perbandingan;
          };
     }

     public function getMatrix()
     {
          return $this->matrix;
     }
}
