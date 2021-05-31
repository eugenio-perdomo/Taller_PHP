<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticaPartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadistica_partidos', function (Blueprint $table) {
            $table->id();
            $table->integer("posesion");
            $table->integer("tirosTotales");
            $table->integer("tirosPuerta");
            $table->integer("corner");
            $table->integer("offside");
            $table->integer("faltas");
            $table->integer("amarillas");
            $table->integer("rojas");
            $table->unsignedBigInteger("equipo_id");
            $table->unsignedBigInteger("partido_id");
            $table->foreign("equipo_id")->references("id")->on("equipos")->onDelete("cascade");
            $table->foreign("partido_id")->references("id")->on("partidos")->onDelete("cascade");
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
        Schema::dropIfExists('estadistica_partidos');
    }
}
