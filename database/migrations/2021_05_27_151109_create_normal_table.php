<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal', function (Blueprint $table) {
            $table->unsignedBigInteger('normal_id')->unique(); 
            
            $table->foreign('normal_id')
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
        Schema::dropIfExists('normal');
    }
}
