<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleUserCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle__user__certificados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuarios');
            $table->unsignedBigInteger('id_certificado');
            $table ->foreign('id_usuarios')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table ->foreign('id_certificado')->references('id')->on('certificados')
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
        Schema::dropIfExists('detalle__user__certificados');
    }
}
