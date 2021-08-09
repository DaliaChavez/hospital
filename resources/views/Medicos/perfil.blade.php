@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      Perfil del paciente
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="{{ url('/pacientes') }}">Pacientes</a></li>
      <li class="active">Perfil del paciente</li>
    </ol>
</section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">
                    @if($imagen['imagen'] == '' || $imagen['imagen'] == null)
                    <img class="profile-user-img img-responsive img-circle" src="{{URL::to('/')}}/img/avatar-sign.png" alt="User profile picture" style="width:100px;height:110px;">
                    @else
                    <img class="profile-user-img img-responsive img-circle" src="{{URL::to('/')}}/img/pacientes/{{$imagen['imagen']}}" alt="User profile picture" style="width:100px;height:110px;">
                    @endif
      
                    <h3 class="profile-username text-center">{{$paciente['nombre']}} {{$paciente['apellido_P']}}</h3>
      
                    <p class="text-muted text-center">{{$paciente['fecha_Nacimiento']}}</p>

                    </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Información</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                        <strong><i class="fa fa-map-marker margin-r-5"></i>Dirección</strong>

                        <p class="text-muted">{{$paciente['direccion']}}</p>

                        <hr>

                        <strong><i class="fa fa-phone margin-r-5"></i>Telefono</strong>

                        <p class="text-muted">{{$paciente['telefono']}}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab">Modificar datos</a></li>
                    </ul>
                      <input type="hidden" id="id_paciente" name="id_paciente" value="{{$paciente['id_paciente']}}">
                      <div class="tab-content">
                        <div class="active tab-pane" id="edit">
                          <div class="form-horizontal">
                            <div class="form-group">
                              <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
          
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="{{$paciente['nombre']}}">
                                @if ($errors->has('nombre'))
                                    <small class="form-text text-danger">{{ $errors->first('nombre') }}</small>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="apellido_P" class="col-sm-2 control-label">Apellido Paterno:</label>
          
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="apellido_P" name="apellido_P" placeholder="Apellido Paterno" value="{{$paciente['apellido_P']}}">
                                @if ($errors->has('apellido_P'))
                                    <small class="form-text text-danger">{{ $errors->first('apellido_P') }}</small>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="apellido_M" class="col-sm-2 control-label">Apellido Materno:</label>
          
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="apellido_M" name="apellido_M" placeholder="Apellido Materno" value="{{$paciente['apellido_M']}}">
                                @if ($errors->has('apellido_M'))
                                    <small class="form-text text-danger">{{ $errors->first('apellido_M') }}</small>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="direccion" class="col-sm-2 control-label">Dirección:</label>
          
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccón" value="{{$paciente['direccion']}}">
                                @if ($errors->has('direccion'))
                                    <small class="form-text text-danger">{{ $errors->first('direccion') }}</small>
                                @endif
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="telefono" class="col-sm-2 control-label">Telefono:</label>
          
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{$paciente['telefono']}}">
                                @if ($errors->has('telefono'))
                                    <small class="form-text text-danger">{{ $errors->first('telefono') }}</small>
                                @endif
                              </div>
                            </div>
                            <div class="form-group" id="form">
                              <label for="telefono" class="col-sm-2 control-label">Observaciones:</label>
                              <div class="col-sm-10">
                                @foreach($citas as $cita)
                                  @if($cita['observaciones'] != '')
                                    <label class="control-label">{{$cita['motivo_cita']}}</label>
                                    <textarea class="form-control" readonly>{{$cita['observaciones']}}</textarea><br>
                                  @elseif($cita['observaciones'] == '')
                                  <div class="{{$cita['id_cita']}}">
                                      <label class="control-label">{{$cita['motivo_cita']}}</label>
                                      <textarea class="form-control" id='{{$cita['id_cita']}}'></textarea>
                                      <button class="btn btn-app" onclick="saveObservacion({{$cita['id_cita']}})"><i class="fa fa-edit"></i>Guardar observacion</button><br>
                                  </div>
                                  @endif
                                @endforeach
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="telefono" class="col-sm-2 control-label">Generar PDF:</label>
                              <div class="col-sm-10">
                                <button class="btn btn-block btn-default" id="btn" onclick="PDFPaciente()"><i class="fa fa-file-pdf-o"></i>Generar PDF</button>
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
    </section>
    <div class="modal fade" id="modal_ticket" tabindex="-1" role="dialog" aria-labelledby="modal_charge" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title">PDF</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <iframe src="" frameborder="0" id="PDF" width="100%" height="400px"></iframe>
              </div>
          </div>
      </div>
  </div>
    @include('Medicos.pacientes_js')
@endsection
@foreach($citas as $cita)
@if($cita['observaciones'] == '')
  @section('script')
  <script>
    $(document).ready(function() {
          $('#btn').removeClass('btn btn-block btn-default');
          $('#btn').addClass('btn btn-block btn-default disabled');
          $('#btn').attr('disabled',true);
      });
  </script>
  @endsection
@endif
@endforeach

