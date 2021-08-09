<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pacientesModel extends Model
{
    protected $table = 't_pacientes';
    protected $primaryKey = 'id_paciente';

    public function scopeGetPacientes($query,$id_medico){
        $query->select('t_pacientes.*')
                ->join ('medicos_pacientes','medicos_pacientes.id_paciente','t_pacientes.id_paciente')
                ->join('users','users.id','medicos_pacientes.id_medico')
                ->where('users.id',$id_medico);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    public function scopeActualizarPaciente($query,$id_paciente,$nombre,$apellido_P,$apellido_M,$direccion,$telefono){
        $model = pacientesModel::find($id_paciente);
        $model->nombre = $nombre;
        $model->apellido_P = $apellido_P;
        $model->apellido_M = $apellido_M;
        $model->direccion = $direccion;
        $model->telefono = $telefono;

        try {
            $model->save();
            $data['status'] = 'success';
            $data['msg'] = 'Paciente actualizado';
            $data['model'] = $model;
        } catch (\Throwable $th) {
            $data['status'] = $th;
            $data['model'] = $model;
            $data['msg'] = 'Paciente no actualizado';
        }

        return $data;
    }

    public function scopeDeletePaciente($query,$id_paciente){
        $model = pacientesModel::find($id_paciente);
        
        try {
            $model->delete();
            $data['status'] = 'success';
        } catch (Ex $th) {
            $data['status'] = $th;
        }
        return $data;
    }

    public function scopeGetIdmedico($query,$id_paciente){
        $query->select('t_pacientes.id_medico','t_pacientes.id_admin')
              ->where('t_pacientes.id_paciente',$id_paciente);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    /*public function scopeGetPacienteEmail($query,$id_medico,$filter){
        $query->select('t_pacientes.*')
              ->where('t_pacientes.id_medico',$id_medico)
              ->where('t_pacientes.email','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetPacienteNombre($query,$id_medico,$filter){
        $query->select('t_pacientes.*')
              ->where('t_pacientes.id_medico',$id_medico)
              ->where('t_pacientes.nombre','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetPacienteApellido($query,$id_medico,$filter){
        $query->select('t_pacientes.*')
              ->where('t_pacientes.id_medico',$id_medico)
              ->where('t_pacientes.apellido_P','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }*/

    public function scopeGetPacienteEmailAdmin($query,$id_admin,$filter){
        $query->select('t_pacientes.*')
              ->where('t_pacientes.id_admin',$id_admin)
              ->where('t_pacientes.email','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetPacienteNombreAdmin($query,$id_admin,$filter){
        $query->select('t_pacientes.*')
              ->where('t_pacientes.id_admin',$id_admin)
              ->where('t_pacientes.nombre','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetPacienteApellidoAdmin($query,$id_admin,$filter){
        $query->select('t_pacientes.*')
              ->where('t_pacientes.id_admin',$id_admin)
              ->where('t_pacientes.apellido_P','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    public function scopeGetDataPacientes($query,$id_admin){
        $query->select('t_pacientes.*')
              ->join('users','users.id','t_pacientes.id_admin')
              ->where('users.id',$id_admin);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    public function scopeDataPacientes($query,$id_admin){
        $query->select('t_pacientes.*')
              ->join('users','users.id','t_pacientes.id_admin')
              ->where('users.id',$id_admin);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
}
