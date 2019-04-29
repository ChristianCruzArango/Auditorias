<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListarVerificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listaVerificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('procesosAuditar_id');
            $table->foreign('procesosAuditar_id')->references('id')->on('procesoAuditar');
            $table->unsignedInteger('categorias_id');
            $table->foreign('categorias_id')->references('id')->on('categorias');
            $table->string('responsable')->nullable();
            $table->timestamp('fechalista')->nullable();
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
        Schema::dropIfExists('listaVerificacion');
    }
}
