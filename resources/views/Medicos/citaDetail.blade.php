@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        Detalles de la cita
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Detalles de la cita</li>
    </ol>
</section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#edit" data-toggle="tab">Datos cita</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="active tab-pane" id="edit">
                        <div class="form-horizontal">
                          <div class="form-group">
                            <label for="nombre" class="col-sm-2 control-label">Nombre paciente</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nombre"  placeholder="nombre" value="{{$cita['nombre_paciente']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="apellido_P" class="col-sm-2 control-label">Telefono</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="telefono" value="{{$cita['telefono']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="apellido_M" class="col-sm-2 control-label">Edad</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="edad" value="{{$cita['edad']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="direccion" class="col-sm-2 control-label">Fecha</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="fecha" value="{{$cita['fecha']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Hora</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="hora" value="{{$cita['hora']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Motivo de la cita</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="cita" value="{{$cita['motivo_cita']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Talla</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="talla" value="{{$cita['talla']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Peso</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="peso" value="{{$cita['peso']}}" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div>
                  <!-- /.nav-tabs-custom -->
            </div>
        </div>
        <input type="hidden" id="id_cita" value="{{$cita['id_cita']}}">
    </section>
@endsection

