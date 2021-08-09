<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\pacientesModel;
use \App\citasModel;
use \App\User;
use Auth;
use App\Classes\Ticket;

class medicosController extends Controller
{
    public function index(){
        /*$id_medico = Auth::user()->id;
        $items = pacientesModel::getPacientes($id_medico);
        return \view('Medicos.pacientes',['items'=>$items]);*/
        return \view('Medicos.pacientes');
    }

    public function showPerfil($id)
    {
        $id_medico = Auth::user()->id;
        $paciente = \App\pacientesModel::find($id);
        $imagen = \App\User::where('id_paciente','=',$id)->first();
        $citas = citasModel::getCitasObservaciones($id,$id_medico);
        //$total_citas = \App\Citas::where('id_medico', $medico->id)->where('status', 1)->orderBy('fecha', 'asc')->paginate(30);
        if($paciente){
            return \view('Medicos.perfil', ['paciente'=>$paciente,'imagen'=>$imagen,'citas'=>$citas]);
            
        }
        return \view('Error.404');
    }
   

    public function showCitas(Request $request){
        $id_medico = $request->input('id_medico');
        $data = citasModel::getCitasMedicoCalendar($id_medico);
        return $data;
    }

    public function showCita($id_cita){
        $cita = \App\citasModel::find($id_cita);
        if($cita){
            return \view('Medicos.citaDetail',['cita'=>$cita]);
        }
        return \view('Error.404');
    }

    // Vue Data
    public function getDataPaciente()
    {
        $id_medico = Auth::user()->id;
        
        $item = pacientesModel::getPacientes($id_medico);
        return response()->json($item);
    }

    public function getDataFilterPaciente(Request $request)
    {
        $id_admin = Auth::user()->id_admin;
        $filter = $request->filtro;
        if($request->por == 'email')
        {
            $item = \App\pacientesModel::getPacienteEmailAdmin($id_admin,$filter);
        }
        if($request->por == 'nombre')
        {
            $item = \App\pacientesModel::getPacienteNombreAdmin($id_admin,$filter);
        }
        if($request->por == 'apellido')
        {
            $item = \App\pacientesModel::getPacienteApellidoAdmin($id_admin,$filter);
        }
        return response()->json($item);
    }

    public function generatePDF(Request $request){
        $id_paciente = $request->input('id_paciente');
        $id_medico = Auth::user()->id;
        $data = citasModel::searchCita($id_paciente,$id_medico);
        //$data = json_decode($request->input('data'),true);
        return $data;
    }

    public function PDF(Request $request){
        $data = json_decode($request->input('data'),true);
        Ticket::createTicket($data);
    }
    public function saveObservacion(Request $request){
        $id_cita = $request->input('id_cita');
        $text = $request->input('text');

        $model = citasModel::where('id_cita','=',$id_cita)->first();
        $model->observaciones = $text;
        
        try {
            $model->save();
        } catch (\Throwable $th) {
            $data['status'] = 'Error';
            $data['msg'] = $th;
        }
    }

    public function getDatesCitas(Request $request){
        $id_paciente = $request->input('id_paciente');
        $id_medico = Auth::user()->id;
        $data = citasModel::getDatesCitas($id_paciente,$id_medico);
        return $data;

    }
}
