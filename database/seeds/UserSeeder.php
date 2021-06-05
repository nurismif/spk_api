<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            User::create([
                'nip' => "1" . $i,
                'nama' => "PKG" . $i,
                'username' => "PKG" . $i,
                'password' => bcrypt('123123123'),
                'jabatan' =>  User::TIM_KPG_ROLE,
                'jenis_kelamin' => User::MALE_TYPE,
                'jurusan' => "Akuntansi"
            ]);
        }

        for ($i = 1; $i < 3; $i++) {
            User::create([
                'nip' => "2" . $i,
                'nama' => "KEPSEK" . $i,
                'username' => "KEPSEK" . $i,
                'password' => bcrypt('123123123'),
                'jabatan' =>  User::KEPSEK_ROLE,
                'jenis_kelamin' => User::FEMALE_TYPE,
                'jurusan' => "Akuntansi"
            ]);
        }

        for ($i = 0; $i < 2; $i++) {
            User::create([
                'nip' => "3" . $i,
                'nama' => "GURU" . $i,
                'username' => "GURU" . $i,
                'password' => bcrypt('123123123'),
                'jabatan' =>  User::GURU_ROLE,
                'jenis_kelamin' => User::FEMALE_TYPE,
                'jurusan' => "Akuntansi"
            ]);
        }
    }
}
