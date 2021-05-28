<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccionpartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accionpartidos', function (Blueprint $table) {
            $table->id();
            $table->string("accion");
            $table->integer("minuto");
            $table->unsignedBigInteger("jugador_id");
            $table->unsignedBigInteger("partido_id");
            $table->foreign("jugador_id")->references("id")->on("jugadors")->onDelete("cascade");
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
        Schema::dropIfExists('accionpartidos');
    }
}