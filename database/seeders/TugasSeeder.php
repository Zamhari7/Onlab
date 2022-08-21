<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tugas;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tugas = new Tugas;
        $tugas->nama_tugas = "Pendahuluan";
        $tugas->tipe = "Pendahuluan";
        $tugas->tugas = "1";
        $tugas->nama_file = "test.pdf";
        $tugas->file = \Illuminate\Http\UploadedFile::fake()->create('test.pdf')->store('pdfs');
        $tugas->mulai = now();
        $tugas->selesai = now()->add(1, 'day');
        $tugas->id_kelas = "1";
        $tugas->save();
    }
}
