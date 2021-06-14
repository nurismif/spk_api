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
        // KPG ROLE
        User::create([
            'nip' => "19680806200121",
            'nama' => "Lilik Setyoharyanti, M.Pd.",
            'username' => "lilik",
            'password' => bcrypt('123'),
            'jabatan' =>  User::TIM_KPG_ROLE,
            'jenis_kelamin' => User::FEMALE_TYPE,
            'jurusan' => "NULL"
        ]);

        User::create([
            'nip' => "19701112189012",
            'nama' => "Nurvi Asiati, M.Pd.",
            'username' => "nurviasi",
            'password' => bcrypt('123'),
            'jabatan' =>  User::TIM_KPG_ROLE,
            'jenis_kelamin' => User::FEMALE_TYPE,
            'jurusan' => "NULL"
        ]);
        User::create([
            'nip' => "19870806200121",
            'nama' => "Drs. Agus",
            'username' => "agus",
            'password' => bcrypt('123'),
            'jabatan' =>  User::TIM_KPG_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "NULL"
        ]);
        User::create([
            'nip' => "19701115890012",
            'nama' => "Pramudiyono, S.Pd.",
            'username' => "pramudiyono",
            'password' => bcrypt('123'),
            'jabatan' =>  User::TIM_KPG_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "NULL"
        ]);
        User::create([
            'nip' => "19750806200134",
            'nama' => "Hj. Suyetty, S.Pd.",
            'username' => "suyetty",
            'password' => bcrypt('123'),
            'jabatan' =>  User::TIM_KPG_ROLE,
            'jenis_kelamin' => User::FEMALE_TYPE,
            'jurusan' => "NULL"
        ]);

        // KEPSEK
        for ($i = 1; $i < 3; $i++) {
            User::create([
                'nip' => "2" . $i,
                'nama' => "KEPSEK" . $i,
                'username' => "KEPSEK" . $i,
                'password' => bcrypt('123'),
                'jabatan' =>  User::KEPSEK_ROLE,
                'jenis_kelamin' => User::FEMALE_TYPE,
                'jurusan' => "Akuntansi"
            ]);
        }

        // GURU
        for ($i = 0; $i < 2; $i++) {
            User::create([
                'nip' => "3" . $i,
                'nama' => "GURU" . $i,
                'username' => "GURU" . $i,
                'password' => bcrypt('123'),
                'jabatan' =>  User::GURU_ROLE,
                'jenis_kelamin' => User::FEMALE_TYPE,
                'jurusan' => "Akuntansi"
            ]);
        }
        User::create([
            'nip' => "1005239",
            'nama' => "Yuwono, S.E.",
            'username' => "yuwono",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Akuntansi"
        ]);
        User::create([
            'nip' => "1005228",
            'nama' => "Juherlan Miftachul Anam, S.ST.",
            'username' => "juerlanmif",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Animasi"
        ]);
        User::create([
            'nip' => "1005232",
            'nama' => "Putri Priyatin, S.Pd.",
            'username' => "putripri",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::FEMALE_TYPE,
            'jurusan' => "Akutansi"
        ]);
        User::create([
            'nip' => "1005222",
            'nama' => "Atiena Sudwiharmi Pertiwi, S.Pd. ",
            'username' => "atienasp",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::FEMALE_TYPE,
            'jurusan' => "Akutansi"
        ]);
        User::create([
            'nip' => "1005238",
            'nama' => "Yunita Andriani, S.Pd.",
            'username' => "yunitaand",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::FEMALE_TYPE,
            'jurusan' => "Animasi"
        ]);
        User::create([
            'nip' => "1005231",
            'nama' => "Purnama Hadi Setiawan, S.Kom.",
            'username' => "purhadiset",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Multimedia"
        ]);
        User::create([
            'nip' => "1005235",
            'nama' => "Sandi, S.Ikom.",
            'username' => "sandi",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Multimedia"
        ]);
        User::create([
            'nip' => "1005233",
            'nama' => "Rangga Bintang Rhamadan, S.Pd.",
            'username' => "ranggabr",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Multimedia"
        ]);
        User::create([
            'nip' => "1016212",
            'nama' => "Slamet Sutresno, M.Pd. ",
            'username' => "slametsut",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Multimedia"
        ]);
        User::create([
            'nip' => "1027191",
            'nama' => "Rakhmi Kuspriyantini, S.Pd.",
            'username' => "rakhmikus",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::FEMALE_TYPE,
            'jurusan' => "Multimedia"
        ]);
        User::create([
            'nip' => "1038170",
            'nama' => "Sri Rahayu Utami, S.Pd.",
            'username' => "srirahayu",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::FEMALE_TYPE,
            'jurusan' => "BDP"
        ]);
        User::create([
            'nip' => "1049149",
            'nama' => "Syarif Hidayatullah, S.Pd.",
            'username' => "syarifhid",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "BDP"
        ]);
        User::create([
            'nip' => "1049148",
            'nama' => "Ridho A'zima, S.Pd.",
            'username' => "ridhoa",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Perkantoran"
        ]);
        User::create([
            'nip' => "1071107",
            'nama' => "Raihan Ibrahim Saputro, S.Kom.",
            'username' => "raihanibr",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Multimedia"
        ]);
        User::create([
            'nip' => "1082086",
            'nama' => "Apria Sri Rohani, S.Kom.",
            'username' => "apriasria",
            'password' => bcrypt('123'),
            'jabatan' =>  User::GURU_ROLE,
            'jenis_kelamin' => User::MALE_TYPE,
            'jurusan' => "Multimedia"
        ]);
    }
}
