<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('cedula_profesional')->unique()->nullable();
            $table->integer('level');
            $table->integer('id_medico')->nullable();
            $table->integer('id_paciente')->nullable();
            $table->integer('id_admin')->nullable();
            $table->integer('id_especialidad')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('status');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('id_medico')->references('id_medico')->on('t_medicos');
            $table->foreign('id_paciente')->references('id_paciente')->on('t_pacientes');
            $table->foreign('id_admin')->references('id')->on('users');
            $table->foreign('id_especialidad')->references('id_especialidad')->on('t_especialidades');
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
