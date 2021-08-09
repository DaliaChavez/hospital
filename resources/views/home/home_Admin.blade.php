 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>
      Página principal
      <small>Resumen</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Página principal</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <a href="{{ url('/medicos') }}"><div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner" id="medicos">

          </div>
          <div class="icon">
            <i class="fa fa-user-md"></i>
          </div>
        </div>
      </div></a>
      <!-- ./col -->
      <a href="{{ url('/pacientes/index') }}"><div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner" id="pacientes">

          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
        </div>
      </div></a>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner" id="citas_finalizadas">
    
          </div>
          <div class="icon">
            <i class="fa fa-calendar-check-o"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner" id="citas">

          </div>
          <div class="icon">
            <i class="fa fa-calendar-times-o"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
</section>