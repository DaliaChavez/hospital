<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
	  <!-- Sidebar user panel -->
	  <div class="user-panel">
		<div class="pull-left image">
			@if(Auth::user()->imagen != '' || Auth::user()->imagen != null)
				<img src="{{URL::to('/')}}/img/medicos/{{Auth::user()->imagen}}" class="user-image" alt="User Image" style="width:45px;height:45px;border-radius:50%;margin-top:-4px;margin-left:-8px;">
			@else
				<img src="{{URL::to('/')}}/img/avatar-sign.png" class="user-image" alt="User Image" style="width:45px;height:45px;border-radius:50%;margin-top:-4px;margin-left:-8px;">
			@endif
		</div>
		<div class="pull-left info" style="margin-top: 7px">
		  <p>{{Auth::user()->nombre}}</p>
		</div>
	  </div>
	  <!-- sidebar menu: : style can be found in sidebar.less -->
	  <ul class="sidebar-menu" data-widget="tree">
		<li class="header">NAVEGACIÓN MÉDICOS</li>
		<li>
		  <a href="{{ url('/home') }}">
			<i class="fa fa-home"></i> <span>Inicio</span>
		  </a>
		</li>
		<li>
			<a href="{{ url('/pacientes') }}">
			  <i class="fa fa-users"></i> <span>Pacientes</span>
			</a>
		  </li>
	  </ul>
	</section>
	<!-- /.sidebar -->
  </aside>
