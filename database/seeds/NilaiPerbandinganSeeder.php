<?php

use App\NilaiPerbandingan;
use Illuminate\Database\Seeder;

class NilaiPerbandinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1, 1, 1],
            [1, 2, 3],
            [2, 1, 0.33],
            [1, 3, 3],
            [3, 1, 0.33],
            [1, 4, 5],
            [4, 1, 0.2],
            [1, 5, 5],
            [5, 1, 0.2],
            [2, 2, 1],
            [3, 2, 1],
            [2, 3, 1],
            [4, 2, 3],
            [2, 4, 0.33],
            [5, 2, 3],
            [2, 5, 0.33],
            [4, 5, 1],
            [5, 4, 1],
            [4, 4, 1],
            [5, 5, 1],
            [3, 3, 1],
            [3, 4, 0.33],
            [3, 5, 0.33],
            [4, 3, 3],
            [5, 3, 3]
        ];

        foreach ($records as $rec) {
            NilaiPerbandingan::create([
                'kriteria_ahp_id' => $rec[0],
                'target_kriteria_ahp_id' => $rec[1],
                'nilai_perbandingan' => $rec[2]
            ]);
        }
    }
}
