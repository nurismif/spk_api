<?php

use App\MatriksKriteria;
use Illuminate\Database\Seeder;

class MatriksKriteriaSeeder extends Seeder
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
                'row' => '{"Umum":1,"Teman Sejawat":0,"Peserta Didik":0,"Wali Murid":0,"Dunia Industri":0}',
            ],
            (object)[
                'nama' => 'Teman Sejawat',
                'row' => '{"Umum":0,"Teman Sejawat":1,"Peserta Didik":0,"Wali Murid":0,"Dunia Industri":0}',
            ],
            (object)[
                'nama' => 'Peserta Didik',
                'row' => '{"Umum":0,"Teman Sejawat":0,"Peserta Didik":1,"Wali Murid":0,"Dunia Industri":0}',
            ],
            (object)[
                'nama' => 'Wali Murid',
                'row' => '{"Umum":0,"Teman Sejawat":0,"Peserta Didik":0,"Wali Murid":1,"Dunia Industri":0}',
            ],
            (object)[
                'nama' => 'Dunia Industri',
                'row' => '{"Umum":0,"Teman Sejawat":0,"Peserta Didik":0,"Wali Murid":0,"Dunia Industri":1}',
            ],
        ];

        foreach ($records as $rec) {
            MatriksKriteria::create([
                'nama' => $rec->nama,
                'row' => $rec->row,
            ]);
        }
    }
}
