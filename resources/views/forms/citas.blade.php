<form action="/cita/save" method="POST">
    @csrf
    <input type="hidden" name="id_paciente" value="{{Auth::user()->id}}">
		<div class="row">
			<div class="col-md-12">
				<div class="footer">
					<a class="btn btn-default" role="button" data-toggle="collapse" href="#collStore" aria-expanded="false" aria-controls="Generar Cita">Cerrar</a>
					<button type="submit" class="btn btn-primary">Registrar cita</button>
				</div>
			</div>
			<br>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Nombre:</label>
					<div class="controls">
						<input type="text" class="form-control" name="nombre_paciente" id="nombre_paciente" value="{{$info['nombre']}}" readonly>
						@if ($errors->has('nombre_paciente'))
                            <small class="form-text text-danger">{{ $errors->first('nombre_paciente') }}</small>
                        @endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Telefono:</label>
					<div class="controls" style="display:table;">
						<span class="input-group-addon" style="border-radius: 0"><i class="fa fa-phone"></i></span>
						<input type="text" class="form-control" name="telefono" id="telefono" value="{{$info['telefono']}}" readonly>
						
					</div>
					@if ($errors->has('telefono'))
                            <small class="form-text text-danger">{{ $errors->first('telefono') }}</small>
                    @endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Edad:</label>
					<div class="controls">
						<input type="text" class="form-control" name="edad" id="edad" value="{{old('edad')}}" >
						@if ($errors->has('edad'))
                            <small class="form-text text-danger">{{ $errors->first('edad') }}</small>
                        @endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<!-- Date -->
                <div class="form-group">
                    <label>Fecha de la consulta:</label>
    
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker1" name="datepicker1" >
                    </div>
                    <!-- /.input group -->
					@if ($errors->has('datepicker1'))
                            <small class="form-text text-danger">{{ $errors->first('datepicker1') }}</small>
                        @endif
                  </div>
                  <!-- /.form group -->
			</div>
            <div class="col-md-6">
                <!-- time Picker -->
                <div class="bootstrap-timepicker">
                    <div class="form-group">
                    <label>Hora:</label>

                    <div class="input-group">
                        <input type="text" class="form-control timepicker" id="timepicker" name="timepicker" >

                        <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                    <!-- /.input group -->
					@if ($errors->has('timepicker'))
                            <small class="form-text text-danger">{{ $errors->first('timepicker') }}</small>
                        @endif
                    </div>
                    <!-- /.form group -->
                </div>
            </div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Peso:</label>
					<div class="controls">
						<input type="text" class="form-control" name="peso" id="peso" value="{{old('peso')}}" >
						@if ($errors->has('peso'))
                            <small class="form-text text-danger">{{ $errors->first('peso') }}</small>
                        @endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Talla:</label>
					<div class="controls">
						<input type="text" class="form-control" name="talla" id="talla" value="{{old('talla')}}" >
						@if ($errors->has('talla'))
                            <small class="form-text text-danger">{{ $errors->first('talla') }}</small>
                        @endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Motivo de la cita:</label>
					<div class="controls" style="display:table;">
						<span class="input-group-addon" style="border-radius: 0"><i class="fa fa-edit"></i></span>
						<input type="text" class="form-control" name="motivo_cita" id="motivo_cita" value="{{old('motivo_cita')}}" >
						
					</div>
					@if ($errors->has('motivo_cita'))
                            <small class="form-text text-danger">{{ $errors->first('motivo_cita') }}</small>
                    @endif
				</div>
			</div>
			<br>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Seleccionar medico:</label>
					<div class="controls" style="display:table;">
						<span class="input-group-addon" style="border-radius: 0"><i class="fa fa-user-md"></i></span>
						<select onchange="drawType()" id="select_medics" name="select_medics" class="form-control">
								<option value="0">Selecciona una opción</option>
							@foreach ($medics as $m)
								<option value="{{ $m['id'] }}">{{ $m['nombre'] }} - {{ $m['nombre_especialidad'] }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<br>
			<div class="col-md-12">
				<div class="footer">
					<a class="btn btn-default" role="button" data-toggle="collapse" href="#collStore" aria-expanded="false" aria-controls="Generar Cita">Cerrar</a>
					<button type="submit" class="btn btn-primary">Registrar cita</button>
				</div>
			</div>
		</div>
</form>
@if($errors == '[]')
	
@else
<script>
	var message = 'Registro no insertado por favor revisa los errores dentro del formulario';
	$.notify({
		icon: 'fa fa-warning',
		title: '<strong>Información!</strong>',
		message: message
	},{
		type: 'warning',
		placement: {
			from: "bottom"
		}
	});
</script>
@endif