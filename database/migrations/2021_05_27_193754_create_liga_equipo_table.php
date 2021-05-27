<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigaEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liga_equipo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("liga_id");
            $table->unsignedBigInteger("equipo_id");
            $table->foreign("liga_id")->references("id")->on("ligas")->onDelete("cascade");
            $table->foreign("equipo_id")->references("id")->on("equipos")->onDelete("cascade");
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
        Schema::dropIfExists('liga_equipo');
    }
}
