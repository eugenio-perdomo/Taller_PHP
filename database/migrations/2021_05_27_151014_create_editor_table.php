<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editor', function (Blueprint $table) {
            $table->unsignedBigInteger('editor_id')->unique(); 
            
            $table->foreign('editor_id')
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
        Schema::dropIfExists('editor');
    }
}
