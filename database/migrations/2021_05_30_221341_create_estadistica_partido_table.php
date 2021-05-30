<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticaPartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadistica_partido', function (Blueprint $table) {
            $table->integer("posesion")->nullable();
            $table->integer("tirosTotales")->nullable();
            $table->integer("tirosPuerta")->nullable();
            $table->integer("corner")->nullable();
            $table->integer("offside")->nullable();
            $table->integer("faltas")->nullable();
            $table->integer("amarillas")->nullable();
            $table->integer("rojas")->nullable();
            $table->unsignedBigInteger("equipo_id")->nullable();
            $table->unsignedBigInteger("partido_id")->nullable();
            $table->foreign("equipo_id")->references("id")->on("equipos")->onDelete("set null");
            $table->foreign("partido_id")->references("id")->on("partidos")->onDelete("set null");
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
        Schema::dropIfExists('estadistica_partido');
    }
}
