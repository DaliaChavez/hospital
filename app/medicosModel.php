<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicosModel extends Model
{
    protected $table = 't_medicos';
    protected $primaryKey = 'id_medico';

    public function scopeGetMedics($query,$id_admin){
        $query->select('t_medicos.*')
              ->join('users','users.id_admin','t_medicos.id_admin')
              ->where('users.id_admin',$id_admin);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    public function scopeActualizarMedico($query,$id_medico,$nombre,$apellido_P,$apellido_M,$direccion,$telefono){
        $model = medicosModel::find($id_medico);
        $model->nombre = $nombre;
        $model->apellido_P = $apellido_P;
        $model->apellido_M = $apellido_M;
        $model->direccion = $direccion;
        $model->telefono = $telefono;

        try {
            $model->save();
            $data['status'] = 'success';
            $data['msg'] = 'Medico actualizado';
            $data['model'] = $model;
        } catch (\Throwable $th) {
            $data['status'] = $th;
            $data['model'] = $model;
            $data['msg'] = 'Medico no actualizado';
        }

        return $data;
    }

    public function scopeDeleteMedico($query,$id_medico){
        $model = medicosModel::find($id_medico);
        
        try {
            $model->delete();
            $data['status'] = 'success';
        } catch (Ex $th) {
            $data['status'] = $th;
        }
        return $data;
    }

    public function scopeGetMedicsEmail($query,$id_admin,$filter){
        $query->select('t_medicos.*')
              ->where('t_medicos.id_admin',$id_admin)
              ->where('t_medicos.email','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetMedicsCedula($query,$id_admin,$filter){
        $query->select('t_medicos.*')
              ->where('t_medicos.id_admin',$id_admin)
              ->where('t_medicos.cedula_Profesional','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetMedicsNombre($query,$id_admin,$filter){
        $query->select('t_medicos.*')
              ->where('t_medicos.id_admin',$id_admin)
              ->where('t_medicos.nombre','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetMedicsApellido($query,$id_admin,$filter){
        $query->select('t_medicos.*')
              ->where('t_medicos.id_admin',$id_admin)
              ->where('t_medicos.apellido_P','LIKE','%'.$filter.'%');
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    /*public function scopeGetMedicosWithEspecialidad($query,$id_admin){
        $query->select('t_medicos.*','users.id')
                ->join('users','users.id_admin','t_medicos.id_admin')
                ->where('users.id_admin',$id_admin);
        $data = $query->distinct()->get()->toArray();
        return $data;
    
    }*/

}
