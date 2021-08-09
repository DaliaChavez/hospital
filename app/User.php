<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password','cedula_profesional','level','id_medico','id_paciente','id_admin','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeGetUsers($query, $id_admin){
        $query->select('users.id','users.nombre','t_especialidades.nombre_especialidad')
            ->join('t_especialidades','t_especialidades.id_especialidad','users.id_especialidad')
            ->where('users.id_admin',$id_admin)
            ->where('users.level',1);
        $data = $query->distinct()->get()->toArray();
        return $data;
    }
}
