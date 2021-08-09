<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Citas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_citas', function (Blueprint $table){
            $table->increments('id_cita');
            $table->string('nombre_paciente',100);
            $table->string('telefono',10);
            $table->integer('edad');
            $table->date('fecha');
            $table->string('hora',10);
            $table->string('peso');
            $table->string('talla');
            $table->string('observaciones',255)->nulleable();
            $table->integer('id_medico');
            $table->integer('id_paciente');
            $table->integer('id_admin');
            $table->string('motivo_cita',150);
            $table->timestamps();
        });
        
        Schema::table('t_citas', function($table) {
            $table->foreign('id_medico')->references('id_medico')->on('t_medicos');
            $table->foreign('id_paciente')->references('id_paciente')->on('t_pacientes');
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
        Schema::dropIfExists('t_citas');
    }
}
