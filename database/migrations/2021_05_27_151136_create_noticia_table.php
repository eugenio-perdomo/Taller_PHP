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
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('noticia');
    }
}
