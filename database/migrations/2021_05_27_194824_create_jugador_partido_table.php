<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadorPartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugador_partido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("jugador_id");
            $table->unsignedBigInteger("partido_id");
            $table->foreign("jugador_id")->references("id")->on("jugadores")->onDelete("cascade");
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
        Schema::dropIfExists('jugador_partido');
    }
}
