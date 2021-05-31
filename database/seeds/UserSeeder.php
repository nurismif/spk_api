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
        User::create([
            'nip' => "123456789",
            'nama' => "PKG1",
            'username' => "PKG1",
            'password' => bcrypt('123123123'),
            'jabatan' => 'Tim_PKG',
            'jenis_kelamin' => "L",
            'jurusan' => "IT"
        ]);
    }
}
