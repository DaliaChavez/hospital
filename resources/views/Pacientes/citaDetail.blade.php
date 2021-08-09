@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        Detalles de la cita
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Detalles de la cita</li>
    </ol>
</section>
    <section class="content">
      <form action="/cita/update" method="POST">
        @csrf
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
                            <label for="nombre" class="col-sm-2 control-label">Nombre paciente:</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="nombre" value="{{$cita['nombre_paciente']}}">
                              @if ($errors->has('nombre'))
                              <small class="form-text text-danger">{{ $errors->first('nombre') }}</small>
                            @endif
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="apellido_P" class="col-sm-2 control-label">Telefono:</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="telefono" name="telefono" value="{{$cita['telefono']}}">
                              @if ($errors->has('telefono'))
                              <small class="form-text text-danger">{{ $errors->first('telefono') }}</small>
                            @endif
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="apellido_M" class="col-sm-2 control-label">Edad:</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="edad" name="edad" value="{{$cita['edad']}}">
                              @if ($errors->has('edad'))
                              <small class="form-text text-danger">{{ $errors->first('edad') }}</small>
                            @endif
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="direccion" class="col-sm-2 control-label">Fecha:</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="fecha" value="{{$cita['fecha']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Hora:</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="hora" value="{{$cita['hora']}}" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Talla:</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="talla" name="talla" value="{{$cita['talla']}}">
                              @if ($errors->has('talla'))
                              <small class="form-text text-danger">{{ $errors->first('talla') }}</small>
                            @endif
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Peso:</label>
        
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="peso" name="peso" value="{{$cita['peso']}}">
                              @if ($errors->has('peso'))
                              <small class="form-text text-danger">{{ $errors->first('peso') }}</small>
                            @endif
                            </div>
                          </div>

                            <!-- Date -->
                            <div class="form-group" id="newDate">
                              <label class="col-sm-2 control-label">Nueva fecha de la consulta:</label>
                                <div class="col-sm-10">
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="datepicker1" name="datepicker1" >
                                  </div>
                                </div>
                                        <!-- /.input group -->
                              @if ($errors->has('datepicker1'))
                                <small class="form-text text-danger">{{ $errors->first('datepicker1') }}</small>
                              @endif
                            </div>
                            
                              <!-- time Picker -->
                             <div class="bootstrap-timepicker" id="newHour">
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">Nueva hora:</label>
                                  <div class="col-sm-10">
                                    <div class="input-group">
                                      <input type="text" class="form-control timepicker" id="timepicker" name="timepicker" value="0">
                    
                                        <div class="input-group-addon">
                                          <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                  </div>
                                    <!-- /.input group -->
                                    @if ($errors->has('timepicker'))
                                      <small class="form-text text-danger">{{ $errors->first('timepicker') }}</small>
                                    @endif
                                </div>
                             </div>
                                        <!-- /.form group -->
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-app" id="btn"><i class="fa fa-save"></i>Guardar</button>
                              <button type="submit" class="btn btn-app" onclick="DeleteCita()"><i class="fa fa-trash"></i>Eliminar</button>
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
        <input type="hidden" id="id_cita" name="id_cita" value="{{$cita['id_cita']}}">
        <input type="hidden" id="id_medico_cita" name="id_medico_cita" value="{{$cita['id_medico']}}">
        <input type="hidden" name="redirect" value="/cita/{{$cita['id_cita']}}">
    </section>
  </form>
  
    @include('Pacientes.citas_js')
@endsection
@section('script')
<script>
  $(document).ready(function() {
    var id_cita = $('#id_cita').val();
    var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                m = m + 1;
           
            var fecha = '';
            $.post('{{URL::to('/paciente/getDateCita')}}',
            {
                '_token':'{{ csrf_token() }}',
                id_cita:id_cita
            },
            function(data){
               
                    fecha = data['fecha'].split('-');
                    var anio = Number(fecha[0]);
                    var mes = Number(fecha[1]);
                    var dia = Number(fecha[2]);
                   
                    if(y == anio && m == mes && d > dia){
                      $('#newDate').css('visibility','hidden');
                      $('#newHour').css('visibility','hidden');
                      $('#btn').removeClass('btn btn-app');
                      $('#btn').addClass('btn btn-app disabled');
                      $('#btn').attr('disabled',true);
                    }
                    if(y == anio && m > mes && d > dia){
                      $('#newDate').css('visibility','hidden');
                      $('#newHour').css('visibility','hidden');
                      $('#btn').removeClass('btn btn-app');
                      $('#btn').addClass('btn btn-app disabled');
                      $('#btn').attr('disabled',true);
                    }
                    if(y == anio && m > mes && d < dia){
                      $('#newDate').css('visibility','hidden');
                      $('#newHour').css('visibility','hidden');
                      $('#btn').removeClass('btn btn-app');
                      $('#btn').addClass('btn btn-app disabled');
                      $('#btn').attr('disabled',true);
                    }

                    if(y > anio){
                      $('#newDate').css('visibility','hidden');
                      $('#newHour').css('visibility','hidden');
                      $('#btn').removeClass('btn btn-app');
                      $('#btn').addClass('btn btn-app disabled');
                      $('#btn').attr('disabled',true);
                    }
            }
        );
});
</script>
@endsection

