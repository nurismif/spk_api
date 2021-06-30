<?php

namespace App\Services;

use App\AhpMethod;
use App\KriteriaAHP;
use App\NilaiPerbandingan;
use App\Penilaian;

use function DeepCopy\deep_copy;

class AhpMethodService
{
     const CONSISTENT_TYPE = 'Konsisten';
     const NOT_CONSISTENT_TYPE = 'Tidak Konsisten';

     public function recalculateAhpValues()
     {
          // Initialization
          $kriteria_list = KriteriaAHP::get();
          $jumlah_kriteria = $kriteria_list->count();

          $t = 0;
          $ci = 0;
          $RI = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59];
          $data = NilaiPerbandingan::orderBy('kriteria_ahp_id', "asc")
               ->get();

          // Normalisasi

          // Group by columns
          $groups_by_col = $data->groupBy("target_kriteria_ahp_id");
          // Total the group cols
          $total_col_list = $groups_by_col->map(function ($group) {
               return $group->sum('nilai_perbandingan');
          });

          // Get the nilai perbandingan normal and store it to $data
          foreach ($groups_by_col as $key_group => $group) {
               foreach ($group as $key => $item) {
                    $item->nilai_perbandingan_normal =  $item->nilai_perbandingan / $total_col_list[$key_group];
               }
          }

          // Group by row
          $groups_by_row = $data->sortBy(function ($group, $key) {
               return $group->target_kriteria_ahp_id;
          })->groupBy("kriteria_ahp_id")->sort();

          // Find bobot
          $total_normalized_row = $groups_by_row->map(function ($group) {
               return $group->sum('nilai_perbandingan_normal');
          });

          // Find total bobot
          $bobot_list = $total_normalized_row->map(function ($value) use ($jumlah_kriteria) {
               return $value / $jumlah_kriteria;
          })->values();


          // Find total bobot akhir
          $total_bobot_akhir_list = collect()->pad($jumlah_kriteria, 0);
          foreach ($groups_by_row->values() as $i => $group) {
               foreach ($bobot_list as $key => $value) {
                    $cell = $group[$key]->nilai_perbandingan;
                    $total_bobot_akhir_list[$i] += $cell * $value;
               }
          }

          // Find t by totaling the division of total_botot_akir_list with total_bobot_list
          for ($i = 0; $i < $jumlah_kriteria; $i++) {
               $t += $total_bobot_akhir_list[$i] / $bobot_list[$i];
          }
          // Divide the total cm with jumlah kriteria
          $t = $t / $jumlah_kriteria;
          // Find ci value
          $ci = ($t - $jumlah_kriteria) / ($jumlah_kriteria - 1);

          // Get status and keterangan value
          $status = $ci / $RI[$jumlah_kriteria - 1];
          $keterangan = "";
          if ($status <= 0.1) {
               $keterangan = self::CONSISTENT_TYPE;
          } else {
               $keterangan = self::NOT_CONSISTENT_TYPE;
          }

          // Set matriks penilaian values for every criteria
          $avg_criteria_list = collect();
          foreach ($kriteria_list as $kriteria) {
               $avg_criteria = $this->processMatrixPerCriteria($kriteria);
               $avg_criteria_list->push($avg_criteria);
          }

          // Calculate the final value and sort it to get rank
          $final_values = collect()->pad($avg_criteria_list[0]->count(), 0);
          foreach ($avg_criteria_list as $i => $col) {
               foreach ($col as $j => $val) {
                    $final_values[$j] += $val * $bobot_list[$i];
               }
          }

          // Get the rank into a seperate list
          $user_ids = Penilaian::pluck('user_id')->unique()->values();
          $final_values_sorted = deep_copy($final_values)->sortDesc();
          $ranks = $final_values_sorted->keys()->flip();

          // Set the value and rank to the database
          foreach ($user_ids as $i => $user_id) {
               AhpMethod::updateOrCreate(
                    [
                         'user_id' => $user_id
                    ],
                    [
                         'user_id' => $user_id,
                         'ahp_value' => $final_values[$i],
                         'rank' => $ranks[$i] + 1
                    ]
               );
          }
     }

     private function processMatrixPerCriteria(KriteriaAHP $kriteria)
     {
          $penilaian_guru = Penilaian::where('kriteria_ahp_id', $kriteria->id)
               ->orderBy('user_id')
               ->get();
          $count_guru = $penilaian_guru->count();

          $matriks = collect()
               ->pad($count_guru, 1)
               ->map(function ($item) use ($count_guru) {
                    return collect()->pad($count_guru, 1);
               });

          $total_per_cols = collect()->pad($count_guru, 1);
          for ($i = 0; $i < $count_guru; $i++) {
               for ($j = 0; $j < $i; $j++) {
                    $value = $penilaian_guru[$i]->nilai / $penilaian_guru[$j]->nilai;
                    $reversed_value = $penilaian_guru[$j]->nilai / $penilaian_guru[$i]->nilai;
                    if ($kriteria->tipe == KriteriaAHP::BENEFIT_TYPE) {
                         $matriks[$i][$j] = $value;
                         $matriks[$j][$i] = $reversed_value;
                    } else {
                         $matriks[$i][$j] = $reversed_value;
                         $matriks[$j][$i] = $value;
                    }
                    $total_per_cols[$i] += $matriks[$j][$i];
                    $total_per_cols[$j] += $matriks[$i][$j];
               }
          }

          // Normalisasi
          $matriks_normalized = deep_copy($matriks);
          $avg_per_rows = collect();
          for ($i = 0; $i < $count_guru; $i++) {
               for ($j = 0; $j < $count_guru; $j++) {
                    $matriks_normalized[$i][$j] /= $total_per_cols[$j];
               }
               $avg_value = $matriks_normalized[$i]->avg();
               $avg_per_rows->push($avg_value);
          }

          return $avg_per_rows;
     }
}
