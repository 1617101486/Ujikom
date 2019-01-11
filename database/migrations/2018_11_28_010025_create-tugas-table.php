<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration
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
            $table->unsignedInteger('pengirim');
            $table->foreign('pengirim')->references('id')->on('guru')->onDelete('CASCADE');
            $table->string('file');
            $table->integer('KKM')->nullable();
            $table->integer('nilai')->nullable();
            $table->string('ket');           
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
