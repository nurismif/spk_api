<?php

namespace App\Services;

use App\AhpMethod;
use App\WpMethod;
use App\Services\AhpMethodService;
use App\Services\WpMethodService;

class HasilAkhirService
{
     private $sensitivities;
     private $smallest_values_method;
     private $currentSensitivity;

     function __construct()
     {
          // Generate ahp method values
          if (AhpMethod::first() == null) {
               $ahp_method_service = new AhpMethodService();
               $ahp_method_service->recalculateAhpValues();
          }

          // Generate wp method values
          if (WpMethod::first() == null) {
               $wp_method_service = new WpMethodService();
               $wp_method_service->recalculateWpValues();
          }
     }

     public function compareMethodSensitivities()
     {
          // AHP
          $rank1_ahp = AhpMethod::orderBy('rank')->first()->ahp_value;
          $rank2_ahp = AhpMethod::orderBy('rank')->skip(1)->first()->ahp_value;
          $ahp_values_sum = AhpMethod::sum('ahp_value');

          // WP
          $rank1_wp = WpMethod::orderBy('rank')->first()->wp_value;
          $rank2_wp = WpMethod::orderBy('rank')->skip(1)->first()->wp_value;
          $wp_values_sum = WpMethod::sum('wp_value');

          $method_values = collect(
               [
                    'ahp' => collect([$rank1_ahp, $rank2_ahp, $ahp_values_sum]),
                    'wp' => collect([$rank1_wp, $rank2_wp, $wp_values_sum])
               ]
          );

          $min_sensitivities = collect();
          $sensitivities = collect();
          foreach ($method_values as $key => $method) {
               $sensitivity_each_methods = collect();
               $rank1 = $method[0];
               $rank2 = $method[1];
               $total = $method[2];

               $sensitivity_each_methods->push($this->getSensitivity1($rank1, $rank2))
                    ->push($this->getSensitivity2($rank1, $total))
                    ->push($this->getSensitivity3($rank1, $rank2));

               $sensitivities->put($key, $sensitivity_each_methods);
               $min_sensitivities->put($key, $sensitivity_each_methods->min());
          }

          $this->smallest_values_method = $min_sensitivities->sort()->keys()->first();
          $this->currentSensitivity = $min_sensitivities->sort()->values()->first();
          $this->sensitivities = $sensitivities;
     }

     public function generateEachMethodValues()
     {
          // Generate ahp method values
          $ahp_method_service = new AhpMethodService();
          $ahp_method_service->recalculateAhpValues();

          // Generate wp method values
          $wp_method_service = new WpMethodService();
          $wp_method_service->recalculateWpValues();
     }

     public function getSensitivities()
     {
          return $this->sensitivities;
     }

     public function getSmallestValuesMethod()
     {
          return $this->smallest_values_method;
     }

     public function getCurrentSensitivity()
     {
          return $this->currentSensitivity;
     }

     public function getMethodValues()
     {
          $method_values = [];
          if ($this->smallest_values_method == 'ahp') {
               $method_values = AhpMethod::orderBy('rank')->get();
          } else {
               $method_values = WpMethod::orderBy('rank')->get();
          }
          return $method_values;
     }

     private function getSensitivity1($rank1, $rank2)
     {
          return number_format($rank1 - $rank2, 7);
     }

     private function getSensitivity2($rank1, $total)
     {
          return number_format($rank1 / $total, 7);
     }

     private function getSensitivity3($rank1, $rank2)
     {
          return number_format(($rank1 + $rank2) / 2,  7);
     }
}
