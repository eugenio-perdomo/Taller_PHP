<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string("tituloNoticia")->nullable();
            $table->string("copeteNoticia")->nullable();
            $table->string("cuerpoNoticia")->nullable();
            $table->integer("cantVisual")->nullable();
            $table->string("tipoNoticia")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
