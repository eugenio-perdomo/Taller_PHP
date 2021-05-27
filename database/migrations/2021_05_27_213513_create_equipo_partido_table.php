<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoPartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_partido', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('equipo_partido');
    }
}
