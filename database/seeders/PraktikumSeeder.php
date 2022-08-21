<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Praktikum;

class PraktikumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('praktikum')->insert([
        //     'nama_prak' => "Pengembangan Teknologi Mobile",
        //     'tahun_ajaran' => "2021",
        //     'semester' => "gasal",
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        $prak = new Praktikum;
        $prak->nama_prak = "Pengembangan Teknologi Mobile";
        $prak->tahun_ajaran = "2021";
        $prak->semester = "gasal";
        $prak->save();
    }
}
