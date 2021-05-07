<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->unique(); // integer Unsigned ]Increment
            $table->string('cedula')->nullable();
            $table->string('name')->nullable(); // var char
            $table->string('apellido')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('genero')->nullable();
            $table->unsignedBigInteger('id_roles')->nullable();
            $table ->foreign('id_roles')->references('id')->on('rols')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken(200);
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps(); // created_at update_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
