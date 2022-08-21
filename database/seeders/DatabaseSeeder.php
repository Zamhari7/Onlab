<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        $this->call([
            UsersTableSeeder::class,
            PraktikumSeeder::class,
            KelasSeeder::class,
            ModulSeeder::class,
            ArtikelSeeder::class,
            VideoSeeder::class,
            TugasSeeder::class,
        ]);
    }
}
