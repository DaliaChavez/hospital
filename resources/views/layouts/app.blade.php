<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
	<title>Hospital</title>
  <link rel="shortcut icon" href="{{{ asset('img/LogoSystemDoc.png') }}}">
    <!--<script src="/js/lib/jquery/jquery.min.js"></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- VueJs --}}
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>-->

    <script src="{{asset('vue/vue.min.js')}}"></script>
    <script src="{{asset('vue/axios.js')}}"></script>

    <!-- CSS -->
    {{-- CSS --}}
      @section('css')
        @include('layouts.components.css')
      @show
    <!-- /CSS -->
    <!-- JavaScript -->
      @section('javascript')
        @include('layouts.components.js')
      @show
    <!-- Page script -->
    <!-- JavaScript -->
    @section('calendar')
    @include('layouts.components.calendar')
  @show
<!-- Page script -->
	
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
	  @section('header_menu')
            @include('layouts.components.header_menu')
    @show

    @if (Auth::user()->level==0)
    @section('left_menu_admin')
        @include('layouts.components.left_menu_admin')
    @show

	
    @elseif (Auth::user()->level==1)
    @section('left_menu_medico')
        @include('layouts.components.left_menu_medico')
    @show

    @elseif (Auth::user()->level==2)
    @section('left_menu_paciente')
        @include('layouts.components.left_menu_paciente')
    @show
    @endif
    <div class="content-wrapper">
        <div class="row"> 
            <div id="app" style="margin:10px">
                @yield('content')
                @yield('forms')
                @yield('options')
                @yield('elements')
                @yield('script')
            </div>
        </div>
	</div><!--.page-content-->
</div>
<!--<script src="/assets3/assets/js/app.js"></script>-->
 

</body>
</html>