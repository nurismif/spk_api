<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ConstantService
{
     public function getPerbandinganRules()
     {

          $data = [
               "Sama Penting" => "1",
               "Mendekati cukup penting" => "2",
               "Cukup Penting" => "3",
               "Mendekati lebih penting" => "4",
               "Lebih Penting" => "5",
               "Mendekati sangat lebih penting" => "6",
               "Sangat Lebih Penting" => "7",
               "Mendekati mutlak lebih penting" => "8",
               "Mutlak Lebih Penting" => "9"
          ];
          $data = collect($data);
          return $data;
     }
}
