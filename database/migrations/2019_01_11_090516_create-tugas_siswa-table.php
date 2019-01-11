<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tugas');
            $table->foreign('id_tugas')->references('id')->on('tugas')->onDelete('CASCADE');
            $table->unsignedInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('CASCADE');
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
        Schema::dropIfExists('tugas_siswa');
    }
}
