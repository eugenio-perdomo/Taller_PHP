<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiaTable extends Migration
{
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
            $table->id();
            $table->string('tituloNoticia');
            $table->string('copeteNoticia');
            $table->string('cuerpoNoticia');
            $table->integer('cantVisual')->default(0);
            $table->string('tipoNoticia');
            $table->unsignedBigInteger('id_creador'); 
            $table->foreign('id_creador')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('id_imagen')->references('id')->on('imagen')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('noticia');
    }
}
