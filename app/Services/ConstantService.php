<?php

namespace App\Services;

class ConstantService
{
     public function getPerbandinganRules()
     {
          return [
               (object)[
                    "nama" => "Sama Penting",
                    "nilai" => "1"
               ],
               (object)[
                    "nama" => "Mendekati cukup penting",
                    "nilai" => "2"
               ],
               (object)[
                    "nama" => "Cukup Penting",
                    "nilai" => "3"
               ],
               (object)[
                    "nama" => "Mendekati lebih penting",
                    "nilai" => "4"
               ],
               (object)[
                    "nama" => "Lebih Penting",
                    "nilai" => "5"
               ],
               (object)[
                    "nama" => "Mendekati sangat lebih penting",
                    "nilai" => "6"
               ],
               (object)[
                    "nama" => "Sangat Lebih Penting",
                    "nilai" => "7"
               ],
               (object)[
                    "nama" => "Mendekati mutlak lebih penting",
                    "nilai" => "8"
               ],
               (object)[
                    "nama" => "Mutlak Lebih Penting",
                    "nilai" => "9"
               ],
          ];
     }
}
