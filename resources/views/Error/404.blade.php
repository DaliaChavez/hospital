@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      Pagina de error 404
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="{{ url('/adminMedicos') }}"><i class="fa fa-user-md"></i>Medicos</a></li>
      <li class="active">404 error</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-yellow"> 404</h2>

      <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Pagina no encontrada.</h3>

        <p>
          No podemos encontar la pagina que estas buscando.
          Mientras tanto, tu puedes <a href="{{URL::to('/')}}/home">resgresar al inicio.</a>
        </p>
        
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->
@endsection