<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquipoAuditor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipoAuditor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('procesosAuditar_id');
            $table->foreign('procesosAuditar_id')->references('id')->on('procesoauditar');
            $table->unsignedInteger('auditorias_id');
            $table->foreign('auditorias_id')->references('id')->on('auditorias');
            $table->string('actividades')->nullable();
            $table->text('requisitos')->nullable();
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
        Schema::dropIfExists('equipoAuditor');
    }
}
