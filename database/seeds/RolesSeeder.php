<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'jabatan' => 'Tim_PKG', 
        ]);

        DB::table('users')->insert([
            'jabatan' => 'KepSek', 
        ]);

        DB::table('users')->insert([
            'jabatan' => 'Guru', 
        ]);
    }
}
