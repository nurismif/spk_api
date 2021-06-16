<?php

namespace App\Services;

use App\KriteriaAHP;
use App\Penilaian;
use App\WpMethod;

use function DeepCopy\deep_copy;

class WpMethodService
{
     public function recalculateWpValues()
     {
          // Initialization
          $kriteria_list = KriteriaAHP::get();

          // Get the total of bobot
          $bobot_total = $kriteria_list->sum('bobot');

          // Get a new bobot ratio value
          foreach ($kriteria_list as $kriteria) {
               $kriteria->bobot_ratio = $kriteria->bobot / $bobot_total;
               if ($kriteria->tipe == KriteriaAHP::COST_TYPE) {
                    $kriteria->bobot_ratio = 0 - $kriteria->bobot_ratio;
               }
          }

          // Get penilaian guru and group by the user uid
          $penilaian_guru_groups = Penilaian::orderBy('kriteria_ahp_id')
               ->get()
               ->groupBy('user_id')
               ->sort();

          // Create the matriks penilaian

          // Get Vector S
          $vector_s = collect();
          foreach ($penilaian_guru_groups as $group) {
               $vector_val = 1;
               foreach ($group as $i => $penilaian) {
                    $vector_val *= pow($penilaian->nilai, $kriteria_list[$i]->bobot_ratio);
               }
               $vector_s->push($vector_val);
          }
          $vector_s_total = $vector_s->sum();

          // Get Vector V
          $vector_v = $vector_s->map(function ($item) use ($vector_s_total) {
               return $item / $vector_s_total;
          });

          // Get the rank into a seperate list
          $user_ids = Penilaian::pluck('user_id')->unique()->values();
          $final_values_sorted = deep_copy($vector_v)->sortDesc();
          $ranks = $final_values_sorted->keys()->flip();

          // Set the value and rank to the database
          foreach ($user_ids as $i => $user_id) {
               WpMethod::updateOrCreate(
                    [
                         'user_id' => $user_id
                    ],
                    [
                         'user_id' => $user_id,
                         'wp_value' => $vector_v[$i],
                         'rank' => $ranks[$i] + 1
                    ]
               );
          }
     }
}
