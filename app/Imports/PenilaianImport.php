<?php

namespace App\Imports;

use App\Penilaian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenilaianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penilaian([
            //
            "user_id" => $row["user_id"],
            "kriteria_ahp_id" => $row["kriteria_ahp_id"],
            "nilai" => $row["nilai"]
        ]);
    }
}
