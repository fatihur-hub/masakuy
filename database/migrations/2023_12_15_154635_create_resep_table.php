<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('nama_resep');
            $table->unsignedBigInteger('id_user');
            $table->string('asal_kota');
            $table->unsignedBigInteger('id_kategori');
            $table->integer('durasi');
            $table->enum('kesulitan', ['mudah', 'menengah', 'sulit']);
            $table->text('bahan');
            $table->text('langkah');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resep');
    }
}
