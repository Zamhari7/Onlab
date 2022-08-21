<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video = new Video;
        $video->nama_file = "Pengembangan Teknologi Mobile";
        $video->file = "https://drive.google.com/file/d/1Jq4FydFK_fHUMEX4JhlY1nHBkJNR9gJg/view?usp=sharing";
        $video->save();
    }
}
