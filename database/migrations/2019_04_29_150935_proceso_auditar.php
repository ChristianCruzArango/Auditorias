<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcesoAuditar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesoAuditar', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('auditorias_id');
            $table->foreign('auditorias_id')->references('id')->on('auditorias');
            $table->unsignedInteger('procesos_id');
            $table->foreign('procesos_id')->references('id')->on('procesos');
            $table->text('alcance')->nullable();
            $table->string('responsable')->nullable();
            $table->timestamp('fechaAprobacion')->nullable();
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
        Schema::dropIfExists('procesoAuditar');
    }
}
