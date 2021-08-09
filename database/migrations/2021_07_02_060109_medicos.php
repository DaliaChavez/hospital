<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_medicos', function (Blueprint $table) {
            $table->increments('id_medico');
            $table->string('nombre',30);
            $table->string('apellido_P',30);
            $table->string('apellido_M',30);
            $table->integer('id_especialidad');
            $table->string('cedula_Profesional',30)->unique();
            $table->string('email',50)->unique();
            $table->string('direccion',150);
            $table->integer('A_experiencia',false,10);
            $table->string('telefono',10);
            $table->integer('id_admin');
            $table->timestamps();
        });
        Schema::table('t_medicos', function($table) {
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
        Schema::dropIfExists('t_medicos');
    }
}
