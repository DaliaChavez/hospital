<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', 'indexController@index')->name('index');
Route::get('/home','homeController@home')->name('home');
Route::get('/CerrarSession','Auth\LoginController@logout');
Route::group(['middleware'=>['admin']], function (){
    Route::get('/medicos','adminController@index');
    Route::get('/medico/getData', 'adminController@getData');
    Route::post('/medico/getDataFilter', 'adminController@getDataFilter');
    Route::get('/medico/{id_medico}/perfil','adminController@showPerfil');
    Route::post('/medico/save','adminController@saveMedico');
    Route::post('/medico/update','adminController@updateMedico');
    Route::post('/medico/delete','adminController@deleteMedico');
    //home info
    Route::get('/medicos/data','adminController@medicosData');
    Route::get('/pacientes/data','adminController@pacientesData');
    Route::get('/citas/data','adminController@citasData');
    //Pacientes
    Route::get('/pacientes/index','adminController@indexPaciente');
    Route::get('/paciente/getData', 'adminController@getDataPacienteAdmin');
    Route::post('/paciente/getDataFilter', 'adminController@getDataFilterPacienteAdmin');
    Route::get('/paciente/{id_paciente}/perfil','adminController@showPerfilPaciente');
    Route::post('/paciente/save','adminController@savePaciente');
    Route::post('/paciente/update','adminController@updatePaciente');
    Route::post('/paciente/delete','adminController@deletePaciente');
});

Route::group(['middleware'=>['medico']],function(){
    Route::get('/pacientes','medicosController@index');
    Route::get('/paciente/getDataPaciente', 'medicosController@getDataPaciente');
    Route::post('/paciente/getDataFilterPaciente', 'medicosController@getDataFilterPaciente');
    Route::get('/paciente/{id_paciente}/perfilPaciente','medicosController@showPerfil');
    Route::post('/citas','medicosController@showCitas');
    Route::get('/citas/{id_cita}','medicosController@showCita');
    Route::post('/paciente/generatePDF','medicosController@generatePDF');
    Route::get('/PDF','medicosController@PDF');
    Route::post('/paciente/save/observacion','medicosController@saveObservacion');
    Route::post('/paciente/getDatesCitas','medicosController@getDatesCitas');
});

Route::group(['middleware'=>['paciente']],function(){
    Route::get('/citas','pacientesController@index');
    Route::get('/cita/{id_cita}','pacientesController@showCita');
    Route::get('/{id_paciente}/perfil','pacientesController@showPerfil');
    Route::post('/cita/save','pacientesController@saveCita');
    Route::post('/cita/update','pacientesController@updateCita');
    Route::post('/cita/delete','pacientesController@deleteCita');
    Route::post('/citas/Paciente','pacientesController@getCitasPaciente');
    Route::post('/paciente/getDateCita','pacientesController@getDateCita');
});




