<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(KriteriaAhpSeeder::class);
        $this->call(DetailKriteriaSeeder::class);
        $this->call(NilaiPerbandinganSeeder::class);
        $this->call(PenilaianSeeder::class);
    }
}
