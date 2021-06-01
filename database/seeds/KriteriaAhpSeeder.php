<?php

use App\KriteriaAHP;
use Illuminate\Database\Seeder;

class KriteriaAhpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            (object)[
                'nama' => 'Umum',
                'bobot' => 70,
                'tipe' =>  KriteriaAHP::BENEFIT_TYPE,
            ],
            (object)[
                'nama' => 'Teman Sejawat',
                'bobot' => 60,
                'tipe' =>  KriteriaAHP::BENEFIT_TYPE,
            ],
            (object)[
                'nama' => 'Peserta Didik',
                'bobot' => 50,
                'tipe' =>  KriteriaAHP::BENEFIT_TYPE,
            ],
            (object)[
                'nama' => 'Wali Murid',
                'bobot' => 40,
                'tipe' =>  KriteriaAHP::COST_TYPE,
            ],
            (object)[
                'nama' => 'Dunia Industri',
                'bobot' => 30,
                'tipe' =>  KriteriaAHP::BENEFIT_TYPE,
            ],
        ];

        foreach ($records as $rec) {
            KriteriaAHP::create([
                "nama" => $rec->nama,
                "bobot" => $rec->bobot,
                "tipe" => $rec->tipe,
            ]);
        }
    }
}
