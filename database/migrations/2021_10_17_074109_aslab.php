<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aslab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aslab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_aslab', 50);
            $table->string('nbi', 16);
            $table->string('no_hp', 16);
            $table->string('id_user');
            $table->timestamps();
            // $table->integer('id_user')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aslab');
    }
}
