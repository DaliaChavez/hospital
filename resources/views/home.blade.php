@extends('layouts.app')
@section('content')
@if (Auth::user()->level==0 && Auth::user()->status==1)
    @section('home_Admin')
        @include('home.home_Admin')
        @include('home.home_Admin_js')
    @show

@elseif (Auth::user()->level==1 && Auth::user()->status==1)
    @section('home_Medico')
        @include('home.home_Medicos')
        @include('home.home_Medicos_js')
    @show

@elseif (Auth::user()->level==2 && Auth::user()->status==1)
    @section('home_Paciente')
        @include('home.home_Pacientes')
        @include('home.home_Paciente_js')
    @show
    
@endif
@endsection
