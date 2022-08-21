<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modul;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modul = new Modul;
        $modul->nama_file = "Modul Pengembangan Teknologi Mobile";
        $modul->file = "https://docs.google.com/document/d/1rB7URptDHUjuYwv_knkhgvB8LWdc2pKB/edit?usp=sharing&ouid=101235927154450606559&rtpof=true&sd=true";
        $modul->save();
    }
}
