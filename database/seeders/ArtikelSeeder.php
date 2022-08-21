<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artikel = new Artikel;
        $artikel->nama_file = "Artikel Pengembangan Teknologi Mobile";
        $artikel->file = "https://docs.google.com/document/d/1rB7URptDHUjuYwv_knkhgvB8LWdc2pKB/edit?usp=sharing&ouid=101235927154450606559&rtpof=true&sd=true";
        $artikel->save();
    }
}
