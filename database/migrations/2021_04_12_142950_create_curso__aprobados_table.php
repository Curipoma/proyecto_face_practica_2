<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoAprobadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso__aprobados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('horas');
            $table->unsignedBigInteger('id_encuesta')->nullable();
            $table->foreign('id_encuesta')->references('id')->on('encuestas')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_detalle');
            $table->foreign('id_detalle')->references('id')->on('detalle__user__certificados')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('curso__aprobados');
    }
}
