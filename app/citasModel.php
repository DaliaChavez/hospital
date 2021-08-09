<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class citasModel extends Model
{
    protected $table = 't_citas';
    protected $primaryKey = 'id_cita';

    public function scopeGetCitas($query,$id_paciente){
        $query->select('t_citas.*','users.nombre')
              ->join('t_pacientes','t_pacientes.id_paciente','t_citas.id_paciente')
              ->join('users','users.id','t_citas.id_medico')
              ->where('t_pacientes.id_paciente',$id_paciente);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetCitasMedicoCalendar($query,$id_medico){
        $query->select('t_citas.*')
              ->where('t_citas.id_medico',$id_medico);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    public function scopeSearchCita($query,$id_paciente,$id_medico){
        $query->select('t_citas.*')
                ->where('t_citas.id_paciente',$id_paciente)
                ->where('t_citas.id_medico',$id_medico);
        $data = $query->get()->toArray();
        return $data;
    }

    public function scopeGetCitasPacienteCalendar($query,$id_paciente){
        $query->select('t_citas.*')
              ->where('t_citas.id_paciente',$id_paciente);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    public function scopeDataCitas($query,$id_admin){
        $query->select('t_citas.*')
              ->join('users','users.id','t_citas.id_admin')
              ->where('users.id',$id_admin);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetCitasAll($query,$id_admin){
        $query->select('t_citas.*')
            ->where('t_citas.id_admin',$id_admin);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
    public function scopeGetCitasAllUpdate($query,$id_admin,$id_paciente){
        $query->select('t_citas.*')
            ->where('t_citas.id_paciente',$id_paciente)
            ->where('t_citas.id_admin',$id_admin);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    public function scopeGetCitasObservaciones($query,$id,$id_medico){
        $query->select('t_citas.*')
            ->where('t_citas.id_medico',$id_medico)
            ->where('t_citas.id_paciente',$id);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }

    public function scopeGetDatesCitas($query,$id_paciente,$id_medico){
        $query->select('t_citas.fecha','t_citas.id_cita')
            ->where('t_citas.id_medico',$id_medico)
            ->where('t_citas.id_paciente',$id_paciente);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
}


