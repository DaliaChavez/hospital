<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pacientes',function (Blueprint $table){
            $table->increments('id_paciente');
            $table->string('nombre',50);
            $table->string('apellido_P',50);
            $table->string('apellido_M',50);
            $table->string('email',50)->unique();
            $table->string('direccion',150);
            $table->date('fecha_Nacimiento');
            $table->string('telefono',10);
            $table->integer('id_medico')->nulleable();
            $table->integer('id_admin');
            $table->timestamps();
        });
        Schema::table('t_pacientes', function($table) {
            $table->foreign('id_medico')->references('id_medico')->on('t_medicos');
            $table->foreign('id_admin')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pacientes');
    }
}
