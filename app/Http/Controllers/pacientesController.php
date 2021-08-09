<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\citaRequest;
use App\Http\Requests\citaUpdateRequest;
use \App\citasModel;
use \App\medicosModel;
use \App\pacientesModel;
use \App\medicos_pacientes;
use \App\User;
use Auth;

class pacientesController extends Controller
{
    public function index(){
        $id_paciente = Auth::user()->id_paciente;
        $id_admin = Auth::user()->id_admin;
        $items = citasModel::getCitas($id_paciente);
        $infoPaciente = pacientesModel::find($id_paciente);
        $medics = User::getUsers($id_admin);
        return \view('Pacientes.citas',['items'=>$items,'medics'=>$medics,'info'=>$infoPaciente]);
    }

    public function saveCita(citaRequest $request){
        
        $id_paciente = Auth::user()->id_paciente;
        $data = pacientesModel::getIdmedico($id_paciente);
        $id_admin = $data[0]['id_admin'];

        $nombre_paciente = $request->input('nombre_paciente');
        $edad = $request->input('edad');
        $telefono = $request->input('telefono');
        $date = date("Y-m-d", strtotime($request->input('datepicker1')));
        $hora = $request->input('timepicker');
        $peso = $request->input('peso');
        $talla = $request->input('talla');
        $motivo_cita = $request->input('motivo_cita');
        $medico_id = $request->input('select_medics');
       
        
        $id = $medico_id;

        $datosCitas = citasModel::getCitasAll($id_admin);
        $count = count($datosCitas);
        for ($i=0; $i < $count; $i++) { 
            if($datosCitas[$i]['fecha'] == $date && $datosCitas[$i]['hora'] == $hora && $datosCitas[$i]['id_medico'] == $id && $datosCitas[$i]['id_paciente']== $id_paciente){
                return "<script>alert('Fecha y hora ya selecionadas por favor seleccione otra fecha y hora.'); window.location.replace('/citas'); </script>";
            }
            if($datosCitas[$i]['fecha'] == $date && $datosCitas[$i]['hora'] == $hora && $datosCitas[$i]['id_medico'] != $id && $datosCitas[$i]['id_paciente']== $id_paciente){
                return "<script>alert('Fecha y hora ya selecionadas para otra cita con otro doctor.'); window.location.replace('/citas'); </script>";
            }
            if($datosCitas[$i]['fecha'] == $date && $datosCitas[$i]['hora'] == $hora && $datosCitas[$i]['id_medico'] == $id){
                return "<script>alert('Fecha y hora ya selecionadas por favor seleccione otra fecha y hora.'); window.location.replace('/citas'); </script>";
            }
            
        }
        
        $cita = new citasModel();
        $cita->nombre_paciente = $nombre_paciente;
        $cita->edad = $edad;
        $cita->telefono = $telefono;
        $cita->fecha = $date;
        $cita->hora = $hora;
        $cita->peso = $peso;
        $cita->talla = $talla;
        $cita->motivo_cita = $motivo_cita;
        $cita->id_medico = $id;
        $cita->id_paciente = $id_paciente;
        $cita->id_admin = $id_admin;

        try {
            $cita->save();
            $data['status'] = 'success';
        } catch (\Throwable $th) {
            $data['status'] = 'error';
            $data['msg'] = $th;
        }
        $this->saveIDs($id,$id_paciente);
        return \redirect('/citas');
       
    }

    public function saveIDs($id,$id_paciente){
        $ids = new medicos_pacientes();
        $ids->id_medico = $id;
        $ids->id_paciente = $id_paciente;

        try {
            $ids->save();
            $data['status'] = 'success';
        } catch (\Throwable $th) {
            $data['status'] = 'error';
            $data['msg'] = $th;
        }

    }

    public function showCita($id_cita){
        $cita = \App\citasModel::find($id_cita);
        if($cita){
            return \view('Pacientes.citaDetail',['cita'=>$cita]);
        }
        return \view('Error.404');
    }
    public function getCitasPaciente(Request $request){
        $id_paciente = $request->input('id_paciente');
        $data = citasModel::getCitasPacienteCalendar($id_paciente);
        return $data;
    }

    public function deleteCita(Request $request){
        $id_cita = $request->input('id_cita');
        $model = citasModel::where('id_cita', '=', $id_cita)->first();

        try {
            $model->delete();
            $data['status'] == 'success';
        } catch (\Throwable $th) {
            $data['error'] = $th;
        }
        return $data;
    }

    public function updateCita(citaUpdateRequest $request){
        $new_fecha = '';
        $new_hora = '';
        $date = '';
        $hora = '';
        $id_cita = $request->input('id_cita');
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $edad = $request->input('edad');
        $peso = $request->input('peso');
        $talla = $request->input('talla');
        $redirect = $request->input('redirect');
        $date = date("Y-m-d", strtotime($request->input('datepicker1')));
        $hora = $request->input('timepicker');
        $id = $request->input('id_medico_cita');
        $id_paciente = Auth::user()->id_paciente;
        $data = pacientesModel::getIdmedico($id_paciente);
        $id_medico = $data[0]['id_medico'];
        $id_admin = $data[0]['id_admin'];
        $datosCitas = citasModel::getCitasAllUpdate($id_admin,$id_paciente);

        $count = count($datosCitas);
        for ($i=0; $i < $count; $i++) { 
            if($datosCitas[$i]['fecha'] == $date && $datosCitas[$i]['hora'] == $hora){
                return "<script>alert('Fecha y hora ya selecionadas por favor seleccione otra fecha y hora.'); window.location.replace('".$redirect."'); </script>";
            }
        }

        if($date == '1970-01-01' && $hora == '12:00 AM'){
            $model = citasModel::find($id_cita);
            $model->nombre_paciente = $nombre;
            $model->telefono = $telefono;
            $model->edad = $edad;
            $model->peso = $peso;
            $model->talla = $talla;
            
        }
        if($date != '1970-01-01' && $hora != '12:00 AM'){
            $model = citasModel::find($id_cita);
            $model->nombre_paciente = $nombre;
            $model->telefono = $telefono;
            $model->edad = $edad;
            $model->peso = $peso;
            $model->talla = $talla;
            $model->fecha = $date;
            $model->hora = $hora;
            
        }
        if($date == '1970-01-01' && $hora != '12:00 AM'){
            $model = citasModel::find($id_cita);
            $model->nombre_paciente = $nombre;
            $model->telefono = $telefono;
            $model->edad = $edad;
            $model->peso = $peso;
            $model->talla = $talla;
            $model->hora = $hora;
        }
        if($date != '1970-01-01' && $hora == '12:00 AM'){
            $model = citasModel::find($id_cita);
            $model->nombre_paciente = $nombre;
            $model->telefono = $telefono;
            $model->edad = $edad;
            $model->peso = $peso;
            $model->talla = $talla;
            $model->fecha = $date;
        }
        
        try {
            $model->save();
        } catch (\Throwable $th) {
            $data['status'] = 'Error';
            $data['msg'] = $th;
        }

        return \redirect($redirect);
    }

    public function getDateCita(Request $request){
        $id_cita = $request->input('id_cita');
        $data = citasModel::find($id_cita);
        return response()->json($data);

    }
}
