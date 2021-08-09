<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicosPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos_pacientes',function (Blueprint $table){
            $table->integer('id_medico');
            $table->integer('id_paciente');
            $table->timestamps();
            $table->foreign('id_medico')->references('id')->on('users');
            $table->foreign('id_paciente')->references('id_paciente')->on('t_pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
