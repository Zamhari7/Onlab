<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tugas', 50);
            $table->string('tipe', 30);
            $table->string('tugas', 5);
            $table->string('nama_file', 50)->nullable();
            $table->string('file', 150)->nullable();
            $table->dateTime('mulai');
            $table->dateTime('selesai');
            $table->integer('id_kelas')->unsigned()->index(); //integer
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
        Schema::dropIfExists('tugas');
    }
}
