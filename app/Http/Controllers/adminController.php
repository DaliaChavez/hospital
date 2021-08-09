<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\medicoRequest;
use App\Http\Requests\medicosUpdateRequest;
use App\Http\Requests\pacienteRequest;
use App\Http\Requests\pacientesUpdateRequest;
use Illuminate\Support\Str;
use \App\medicosModel;
use \App\pacientesModel;
use \App\citasModel;
use \App\especialidadesModel;
use \App\User;
use Auth;
use Session;

class adminController extends Controller
{
    public function index(){
        /*$id_admin = Auth::user()->id;
        $items = medicosModel::getMedics($id_admin);
        return \view('Admin.medicos.medicos',['items'=>$items]);*/
        $especialidades = especialidadesModel::all();
        return \view('Admin.medicos.medicos',['especialidades'=>$especialidades]);
    }

    public function showPerfil($id)
    {
        $medico = \App\medicosModel::find($id);
        $imagen = \App\User::where('id_medico','=',$id)->first();
        $especialidad = \App\especialidadesModel::where('id_especialidad','=',$medico['id_especialidad'])->first();
        //$total_citas = \App\Citas::where('id_medico', $medico->id)->where('status', 1)->orderBy('fecha', 'asc')->paginate(30);
        if($medico){
            return \view('Admin.medicos.perfil', ['medico'=>$medico,'imagen'=>$imagen,'especialidad'=>$especialidad]);
        }
        return \view('Error.404');
    }

    public function saveMedico(medicoRequest $request){
        $imagen = '';
        $id_admin = Auth::user()->id;
        $id_medico = null;
        $nombre = $request->input('nombre');
        $apellido_P = $request->input('apellido_P');
        $apellido_M = $request->input('apellido_M');
        $especialidad = $request->input('especialidad');
        $cedula_Profesional = $request->input('cedula_Profesional');
        $email = $request->input('email');
        $direccion = $request->input('direccion');
        $A_Experiencia = $request->input('A_Experiencia');
        $telefono = $request->input('telefono');
        $password = $request->input('password');
        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");     
            
        }else{
            $imagen = '';
        }

        $medico = new medicosModel();
        $medico->nombre = $nombre;
        $medico->apellido_P = $apellido_P;
        $medico->apellido_M = $apellido_M;
        $medico->id_especialidad = $especialidad;
        $medico->cedula_Profesional = $cedula_Profesional;
        $medico->email = $email;
        $medico->direccion = $direccion;
        $medico->A_experiencia = $A_Experiencia;
        $medico->telefono = $telefono;
        $medico->id_admin = $id_admin;   

        try {
            $medico->save();
            $id_medico = $medico->id_medico;
            $data['success'] = true;
        } catch (\Throwable $th) {
            $data['status'] = $th;
            $data['msg'] = 'No se pudo insertar.';
        }
        $this->saveUser($nombre,$email,$cedula_Profesional,$id_medico,$password,$id_admin,$imagen,$especialidad);
        return redirect('/medicos');
        
    }

    public function saveUser($nombre,$email,$cedula_Profesional,$id_medico,$password,$id_admin,$imagen,$especialidad){
        $nombreimagen = '';
        if($imagen != ''){
            $nombreimagen = Str::slug($nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/medicos/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);    
            $user = new User();
            $user->nombre = $nombre;
            $user->email = $email;
            $user->cedula_Profesional = $cedula_Profesional;
            $user->level = 1;
            $user->id_medico = $id_medico;
            $user->id_admin = $id_admin;
            $user->status = 1;
            $user->password = bcrypt($password);
            $user->imagen = $nombreimagen;
            $user->id_especialidad = $especialidad;
        }else{
            $user = new User();
            $user->nombre = $nombre;
            $user->email = $email;
            $user->cedula_Profesional = $cedula_Profesional;
            $user->level = 1;
            $user->id_medico = $id_medico;
            $user->id_admin = $id_admin;
            $user->status = 1;
            $user->password = bcrypt($password);
            $user->id_especialidad = $especialidad;
        }
        

        try {
            $user->save();
            $datos['success'] = true;
        } catch (\Throwable $th) {
            $datos['status'] = $th;
            $datos['msg'] = 'No se pudo insertar.';
        }
    }

    public function updateMedico(medicosUpdateRequest $request){
        $imagen = '';
        $id_medico = $request->input('id_medico');
        $nombre = $request->input('nombre');
        $apellido_P = $request->input('apellido_P');
        $apellido_M = $request->input('apellido_M');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        $redirect = $request->input('redirect');
        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");     
            
        }else{
            $imagen = '';
        }
        $data = medicosModel::actualizarMedico($id_medico,$nombre,$apellido_P,$apellido_M,$direccion,$telefono);
        $model = User::where('id_medico','=', $id_medico)->first();

        $nombreimagen = '';
        if($imagen != ''){
            $nombreimagen = Str::slug($nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/medicos/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen); 
            $model->nombre = $nombre;
            $model->imagen = $nombreimagen;
        }else{
            $model->nombre = $nombre;
        }
        
        try {
            $model->save();
        } catch (\Throwable $th) {
            $data['status'] = 'Error';
            $data['msg'] = $th;
        }
        return \redirect($redirect);
    }

    public function deleteMedico(Request $request){
        $id_medico = $request->input('id_medico');
        $data = medicosModel::deleteMedico($id_medico);
        $model = User::where('id_medico', '=', $id_medico)->first();

        try {
            $model->delete();
            $data['status'] = 'success';
        } catch (\Throwable $th) {
            $data['error'] = $th;
        }
        return $data;
    }

    // Vue Data
    public function getData()
    {
        $id_admin = Auth::user()->id;
        //$item = medicosModel::getMedics($id_admin);
        $item = \App\medicosModel::getMedics($id_admin);
        return response()->json($item);
    }

    public function getDataFilter(Request $request)
    {
        $id_admin = Auth::user()->id;
        $filter = $request->filtro;
        if($request->por == 'email')
        {
            $item = \App\medicosModel::getMedicsEmail($id_admin,$filter);
        }
        if($request->por == 'cedula')
        {
            $item = \App\medicosModel::getMedicsCedula($id_admin,$filter);
        }
        if($request->por == 'nombre')
        {
            $item = \App\medicosModel::getMedicsNombre($id_admin,$filter);
        }
        if($request->por == 'apellido')
        {
            $item = \App\medicosModel::getMedicsApellido($id_admin,$filter);
        }
        return response()->json($item);
    }

    //Data info dashboard admin
    public function medicosData(){
        $id_admin = Auth::user()->id;
        $data = medicosModel::getMedics($id_admin);
        $count = count($data);
        return response()->json($count);
    }

    public function pacientesData(){
        $id_admin = Auth::user()->id;
        $data = pacientesModel::dataPacientes($id_admin);
        $count = count($data);
        return response()->json($count);
    }

    public function citasData(){
        $id_admin = Auth::user()->id;
        $data = citasModel::dataCitas($id_admin);
        //$count = count($data);
        return response()->json($data);
    }

    /*------------------------------------*/
                //Pacientes
    /*------------------------------------*/

    public function indexPaciente(){
        /*$id_medico = Auth::user()->id;
        $items = pacientesModel::getPacientes($id_medico);
        return \view('Medicos.pacientes',['items'=>$items]);*/
        return \view('Admin.pacientes.pacientes');
    }

    public function showPerfilPaciente($id)
    {
        $paciente = \App\pacientesModel::find($id);
        $imagen = \App\User::where('id_paciente','=',$id)->first();
        //$total_citas = \App\Citas::where('id_medico', $medico->id)->where('status', 1)->orderBy('fecha', 'asc')->paginate(30);
        if($paciente){
            return \view('Admin.pacientes.perfil', ['paciente'=>$paciente,'imagen'=>$imagen]);
        }
        return \view('Error.404');
    }

    public function savePaciente(pacienteRequest $request){
        $imagen = '';
        $id_admin = Auth::user()->id;
        $fecha_Nacimiento = '';
        $id_paciente = null;
        $nombre = $request->input('nombre');
        $apellido_P = $request->input('apellido_P');
        $apellido_M = $request->input('apellido_M');
        $date = date("Y-m-d", strtotime($request->datepicker));
        $email = $request->input('email');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        $password = $request->input('password');
        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");     
            
        }else{
            $imagen = '';   
        }
       

        
        $paciente = new pacientesModel();
        $paciente->nombre = $nombre;
        $paciente->apellido_P = $apellido_P;
        $paciente->apellido_M = $apellido_M;
        $paciente->fecha_Nacimiento = $date;
        $paciente->email = $email;
        $paciente->direccion = $direccion;
        $paciente->telefono = $telefono;
        $paciente->id_admin = $id_admin;

        try {
            $paciente->save();
            $id_paciente = $paciente->id_paciente;
            $data['status'] = 'success';
        } catch (\Throwable $th) {
            $data['status'] = 'error';
            $data['msg'] = $th;
        }
        $datos = $this->saveUserPaciente($nombre,$email,$password,$id_admin,$id_paciente,$imagen);
        return redirect('/pacientes/index');
    }

    public function saveUserPaciente($nombre,$email,$password,$id_admin,$id_paciente,$imagen){
        $nombreimagen = '';
        if($imagen != ''){
            $nombreimagen = Str::slug($nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/pacientes/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen); 
            $user = new User();
            $user->nombre = $nombre;
            $user->email = $email;
            $user->level = 2;
            $user->id_admin = $id_admin;
            $user->id_paciente = $id_paciente;
            $user->status = 1;
            $user->password = bcrypt($password);
            $user->imagen = $nombreimagen;
        }else{
            $user = new User();
            $user->nombre = $nombre;
            $user->email = $email;
            $user->level = 2;
            $user->id_admin = $id_admin;
            $user->id_paciente = $id_paciente;
            $user->status = 1;
            $user->password = bcrypt($password);
        }
        try {
            $user->save();
            $datos['success'] = true;
        } catch (\Throwable $th) {
            $datos['status'] = $th;
            $datos['msg'] = 'No se pudo insertar.';
        }
        $datos['imagen'] = $imagen;
        return $datos;
    }

    public function updatePaciente(pacientesUpdateRequest $request){
        $imagen = '';
        $id_paciente = $request->input('id_paciente');
        $nombre = $request->input('nombre');
        $apellido_P = $request->input('apellido_P');
        $apellido_M = $request->input('apellido_M');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        $redirect = $request->input('redirect');
        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");     
            
        }else{
            $imagen = '';
        }

        $data = pacientesModel::actualizarPaciente($id_paciente,$nombre,$apellido_P,$apellido_M,$direccion,$telefono);
        $model = User::where('id_paciente','=', $id_paciente)->first();

        $nombreimagen = '';
        if($imagen != ''){
            $nombreimagen = Str::slug($nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/pacientes/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen); 
            $model->nombre = $nombre;
            $model->imagen = $nombreimagen;
        }else{
            $model->nombre = $nombre;
        }

        try {
            $model->save();
        } catch (\Throwable $th) {
            $data['status'] = 'Error';
            $data['msg'] = $th;
        }

        return \redirect($redirect);
    }

    public function deletePaciente(Request $request){
        $id_paciente = $request->input('id_paciente');
        $data = pacientesModel::deletePaciente($id_paciente);
        $model = User::where('id_paciente', '=', $id_paciente)->first();

        try {
            $model->delete();
            $data['status'] = 'success';
        } catch (\Throwable $th) {
            $data['error'] = $th;
        }
        return $data;
    } 

    // Vue Data
    public function getDataPacienteAdmin()
    {
        $id_admin = Auth::user()->id;
        
        $item = pacientesModel::getDataPacientes($id_admin);
        return response()->json($item);
    }

    public function getDataFilterPacienteAdmin(Request $request)
    {
        $id_admin = Auth::user()->id;
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

}
