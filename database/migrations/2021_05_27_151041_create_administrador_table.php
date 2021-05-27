<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrador', function (Blueprint $table) {
            $table->unsignedBigInteger('administrador_id')->unique(); 
            
            $table->foreign('administrador_id')
            ->references('id')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade'); //administrador_id es clave foranea y referencia a usuario de la clase usuario.

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
        Schema::dropIfExists('administrador');
    }
}
