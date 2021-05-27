<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticaspartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticaspartidos', function (Blueprint $table) {
            $table->id();
            $table->integer("posesion");
            $table->integer("tirosTotales");
            $table->integer("tirosPuerta");
            $table->integer("corner");
            $table->integer("offside");
            $table->integer("faltas");
            $table->integer("amarillas");
            $table->integer("rojas");
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
        Schema::dropIfExists('estadisticaspartidos');
    }
}
