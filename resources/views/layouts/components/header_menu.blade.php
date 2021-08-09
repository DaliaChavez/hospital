<header class="main-header">
    <!-- Logo -->
    <a href="{{URL::to('/')}}/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>System</b>Doc</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if(Auth::user()->level == 1)
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user()->imagen != '' || Auth::user()->imagen != null)
                <img src="{{URL::to('/')}}/img/medicos/{{Auth::user()->imagen}}" class="user-image" alt="User Image">
              @else
                <img src="{{URL::to('/')}}/img/avatar-sign.png" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(Auth::user()->imagen != '' || Auth::user()->imagen != null)
                  <img src="{{URL::to('/')}}/img/medicos/{{Auth::user()->imagen}}" class="img-circle" alt="User Image">
                @else
                  <img src="{{URL::to('/')}}/img/avatar-sign.png" class="img-circle" alt="User Image">
                @endif
               

                <p>
                    {{ Auth::user()->nombre }}
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="#">{{ Auth::user()->email }}</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout')}}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->level == 2)
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user()->imagen != '' || Auth::user()->imagen != null)
                <img src="{{URL::to('/')}}/img/pacientes/{{Auth::user()->imagen}}" class="user-image" alt="User Image">
              @else
                <img src="{{URL::to('/')}}/img/avatar-sign.png" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(Auth::user()->imagen != '' || Auth::user()->imagen != null)
                  <img src="{{URL::to('/')}}/img/pacientes/{{Auth::user()->imagen}}" class="img-circle" alt="User Image">
                @else
                <img src="{{URL::to('/')}}/img/avatar-sign.png" class="img-circle" alt="User Image">
                @endif
                <p>
                    {{ Auth::user()->nombre }}
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="#">{{ Auth::user()->email }}</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout')}}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->level == 0)
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::user()->imagen != '' || Auth::user()->imagen != null)
                  <img src="{{URL::to('/')}}/img/pacientes/{{Auth::user()->imagen}}" class="user-image" alt="User Image">
                @else
                <img src="{{URL::to('/')}}/img/avatar-sign.png" class="user-image" alt="User Image">
                @endif
              <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(Auth::user()->imagen != '' || Auth::user()->imagen != null)
                  <img src="{{URL::to('/')}}/img/pacientes/{{Auth::user()->imagen}}" class="img-circle" alt="User Image">
                @else
                  <img src="{{URL::to('/')}}/img/avatar-sign.png" class="img-circle" alt="User Image">
                @endif

                <p>
                    {{ Auth::user()->nombre }}
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="#">{{ Auth::user()->email }}</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout')}}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </nav>
  </header>