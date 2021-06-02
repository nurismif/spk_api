<?php

use App\DetailKriteria;
use Illuminate\Database\Seeder;

class DetailKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "Menguasai karakteristik peserta didik.",
            "Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik",
            "Pengembangan kurikulum"
        ];
        foreach ($data as $item) {
            DetailKriteria::create([
                'kompetensi' => $item,
                'kriteria_ahp_id' => "1",
                'range_nilai' => "1-4",
            ]);
        }
    }
}
