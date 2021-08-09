@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<div class="card">
		<div class="content">
			<center><h4 class="title">Citas</h4></center>
			<div class="row container-fluid">
				<a role="button" data-toggle="collapse" href="#collStore" class="btn btn-primary">Nueva cita</a>
			</div>
			<br>
			<div class="list-group">
				@if($items)
                @foreach($items as $item)
                    <a href="/cita/{{$item['id_cita']}}" class="list-group-item" v-for="item in items">
                        <div class="row">
                            <div class="col-md-11">
                                <span class="pull-right"><b> Médico asignado:</b> {{$item['nombre']}}</span>
                                <b style="font-size: 2em;">{{$item['motivo_cita']}}</b><br>
                                <span class="hidden-sm hidden-xs">
                                    <b>Paciente: </b>{{$item['nombre_paciente']}} | <b>Fecha y hora:</b> {{$item['fecha']}} {{$item['hora']}}
                                </span>
                            </div>
                            <div class="col-md-1 hidden-sm hidden-xs">
                                <h1 class="title text-right"><span style="color:aaa;" class="fa fa-angle-right"></span></h1>
                            </div>
                        </div>
                    </a>
                @endforeach
                @else
                    <script>
						var message = 'No hay Citas registradas';
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
			</div>
		</div>
		
		<!--<center v-if="pagination.current_page < pagination.last_page">
			<a href="#" @click.prevent="moreItems()">Cargar más<br><span class="fa fa-plus"></span></a>
		</center>-->
	</div>
</div>
@endsection
@section('forms')
<div class="col-md-12">
	<div class="collapse" id="collStore">
	  	<div class="card">
	   		<div class="header"><center><h4 class="title">Registrar a una cita</h4></center></div>
		   	<div class="content">
		   		@include('forms.citas')
		   	</div>
	  	</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        m = m + 1;
		$('#day').val(d);
		$('#month').val(m);
		$('#year').val(y);
    });
</script>
@endsection

