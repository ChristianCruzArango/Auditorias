<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Auditorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objetivo')->nullable();
            $table->text('alcance')->nullable();
            $table->text('criterio')->nullable();
            $table->text('recursos')->nullable();
            $table->text('riesgos')->nullable();
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFinal')->nullable();
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
        Schema::dropIfExists('auditorias');
    }
}
