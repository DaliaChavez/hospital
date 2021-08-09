@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="content">
			<center><h4 class="title">Pacientes</h4></center>
			<div class="row container-fluid">
				
				<div class="form-inline pull-right">
					<div class="form-group">
						<label for="buscar">Buscar</label>
						<input type="text" class="form-control" id="buscar" placeholder="Buscar" v-model="filter.filtro" @keyup="this.filtro()" name="filter">
					</div>
					<div class="form-group">
						<label for="por"> Por:</label>
						<select name="por" id="por" v-model="filter.por" @change="this.filtro()" class="form-control">
							<option value="email">Email</option>
							<option value="nombre">Nombre</option>
							<option value="apellido">Apellidos</option>
						</select>
					</div>
				</div>
			</div>
			<br>
			<div class="list-group">
			
					<a href="/paciente/@{{item.id_paciente}}/perfilPaciente" class="list-group-item" v-for="item in items">
						<div class="row">
							<div class="col-md-11">
								<span class="pull-right">Fecha de nacimiento: @{{item.fecha_Nacimiento}}</span>
								<b style="font-size: 2em;">@{{item.nombre}} @{{item.apellido_P}}</b><br>
								
								<span class="hidden-sm hidden-xs">
									<sub><b>Email: </b>@{{item.email}} </sub>
								</span>
							</div>
							<div class="col-md-1 hidden-sm hidden-xs">
								<h1 class="title text-right"><span style="color:aaa;" class="fa fa-angle-right"></span></h1>
							</div>
						</div>
					</a>
				
			</div>
		</div>
		
		<center v-if="pagination.current_page < pagination.last_page">
			<a href="#" @click.prevent="moreItems()">Cargar más<br><span class="fa fa-plus"></span></a>
		</center>
	</div>
</div>
@endsection
@section('script')
<script src="{{asset('vue/medico_paciente_vue.js')}}"></script>
@endsection

