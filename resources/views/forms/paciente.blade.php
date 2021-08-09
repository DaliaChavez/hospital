<form action="/paciente/save" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
		<div class="row">
			<div class="col-md-12">
				<div class="footer">
					<a class="btn btn-default" role="button" data-toggle="collapse" href="#collStore" aria-expanded="false" aria-controls="Generar Cita">Cerrar</a>
					<button type="submit" class="btn btn-primary">Registrar paciente</button>
				</div>
			</div>
			<br>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Nombre:</label>
					<div class="controls">
						<input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" >
						@if ($errors->has('nombre'))
                            <small class="form-text text-danger">{{ $errors->first('nombre') }}</small>
                        @endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Apellido Paterno:</label>
					<div class="controls">
						<input type="text" class="form-control" name="apellido_P" id="apellido_P" value="{{old('apellido_P')}}" >
						@if ($errors->has('apellido_P'))
                            <small class="form-text text-danger">{{ $errors->first('apellido_P') }}</small>
                        @endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Apellido Materno:</label>
					<div class="controls">
						<input type="text" class="form-control" name="apellido_M" id="apellido_M" value="{{old('apellido_M')}}" >
						@if ($errors->has('apellido_M'))
                            <small class="form-text text-danger">{{ $errors->first('apellido_M') }}</small>
                        @endif
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<!-- Date -->
                <div class="form-group">
                    <label>Fecha de nacimiento:</label>
    
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="datepicker" >
					  
                    </div>
                    <!-- /.input group -->
					@if ($errors->has('datepicker'))
                            <small class="form-text text-danger">{{ $errors->first('datepicker') }}</small>
                    @endif
                  </div>
                  <!-- /.form group -->
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Email:</label>
					<div class="controls" style="display:table;">
						<span class="input-group-addon" style="border-radius: 0"><i class="fa fa-envelope"></i></span>
						<input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" >
						
					</div>
					@if ($errors->has('email'))
                            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                    @endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Teléfono:</label>
					<div class="controls" style="display:table;">
						<span class="input-group-addon" style="border-radius: 0"><i class="fa fa-phone"></i></span>
						<input type="text" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}" >
						
					</div>
					@if ($errors->has('telefono'))
                            <small class="form-text text-danger">{{ $errors->first('telefono') }}</small>
                        @endif
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">Dirección:</label>
					<div class="controls" style="display:table;">
						<span class="input-group-addon" style="border-radius: 0"><i class="fa fa-map-marker"></i></span>
						<input type="text" class="form-control" name="direccion" id="direccion" value="{{old('direccion')}}" >
						
					</div>
					@if ($errors->has('direccion'))
                            <small class="form-text text-danger">{{ $errors->first('direccion') }}</small>
                    @endif
				</div>
			</div>
			<br>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Imagen:</label>
					<div class="controls" style="display:table;">
						<span class="input-group-addon" style="border-radius: 0"><i class="fa fa-image"></i></span>
						<input type="file" class="form-control" name="imagen" id="imagen">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Contraseña:</label>
					<div class="controls" style="display:table;">
						<span class="input-group-addon" style="border-radius: 0"><i class="fa fa-lock"></i></span>
						<input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" >
						
					</div>
					@if ($errors->has('password'))
                            <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                    @endif
				</div>
			</div>
			<br>
			<div class="col-md-12">
				<div class="footer">
					<a class="btn btn-default" role="button" data-toggle="collapse" href="#collStore" aria-expanded="false" aria-controls="Generar Cita">Cerrar</a>
					<button type="submit" class="btn btn-primary">Registrar paciente</button>
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