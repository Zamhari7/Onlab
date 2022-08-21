<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nilai_p1');
            $table->integer('nilai_p2');
            $table->integer('nilai_p3');
            $table->integer('nilai_p4');
            $table->integer('nilai_ujian')->nullable();
            $table->integer('nilai_dosen')->nullable();
            $table->integer('laporan')->nullable();
            $table->integer('id_mahasiswa')->unsigned()->index();
            $table->integer('id_kelas')->unsigned()->index();
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
        Schema::dropIfExists('nilai');
    }
}
