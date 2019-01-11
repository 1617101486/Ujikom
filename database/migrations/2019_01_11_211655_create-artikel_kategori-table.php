<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_artikel');
            $table->foreign('id_artikel')->references('id')->on('artikel')->onDelete('CASCADE');
            $table->unsignedInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('CASCADE');
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
        Schema::dropIfExists('artikel_kategori');
    }
}
