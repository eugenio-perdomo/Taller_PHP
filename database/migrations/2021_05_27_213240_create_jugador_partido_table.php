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
            $table->unsignedBigInteger("jugador_id")->nullable();
            $table->unsignedBigInteger("partido_id")->nullable();
            $table->foreign("jugador_id")->references("id")->on("jugadors")->onDelete("set null");
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
        Schema::dropIfExists('jugador_partido');
    }
}
