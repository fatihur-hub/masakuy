<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomenTable extends Migration
{
    public function up()
    {
        Schema::create('komen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_resep');
            $table->text('komen');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_resep')->references('id')->on('resep');
        });
    }

    public function down()
    {
        Schema::dropIfExists('komen');
    }
}
