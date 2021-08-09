<?php

use Illuminate\Database\Seeder;

class especialidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_especialidades')->insert([
            'nombre_especialidad'    => 'Medicina interna'
            
        ]);
        DB::table('t_especialidades')->insert([
            'nombre_especialidad'    => 'Traumatoliogía'
            
        ]);
        DB::table('t_especialidades')->insert([
            'nombre_especialidad'    => 'Anesteciología'
           
        ]);
        DB::table('t_especialidades')->insert([
            'nombre_especialidad'    => 'Dermatología'
            
        ]);
        DB::table('t_especialidades')->insert([
            'nombre_especialidad'    => 'Radiología'
            
        ]);
        DB::table('t_especialidades')->insert([
            'nombre_especialidad'    => 'Endocrinología'
            
        ]);
        DB::table('t_especialidades')->insert([
            'nombre_especialidad'    => 'Medico general'
            
        ]);
    }
}
