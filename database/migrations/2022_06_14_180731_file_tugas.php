<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FileTugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_file', 50)->nullable();
            $table->string('file_tugas', 150)->nullable();
            $table->dateTime('tgl_upload');
            $table->integer('nilai')->nullable();
            $table->string('keterangan', 50)->nullable();
            // $table->string('id_kelas');
            // $table->string('id_mahasiswa');
            $table->integer('id_kelas')->unsigned()->index();
            $table->integer('id_mahasiswa')->unsigned()->index();
            $table->integer('id_tugas')->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_tugas');
    }
}
