<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="_token" content="{{csrf_token()}}" />
  <title>
    @yield('title','Auditoría')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="{{ asset('css/material-kit.css?v=2.0.4')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://openlayers.org/en/v4.6.4/css/ol.css" type="text/css">
  </head>

<body class="@yield('body-class')">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('') }}">
            Auditoría </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="{{ route('login') }}"  data-original-title="Iniciar sesión">
                        <i class="fas fa-user-secret"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="{{ route('register') }}" data-original-title="Registrarse">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </li>
            @else
                <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="material-icons">account_circle</i> {{ auth()->user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                                <a href="{{ url('/home') }}" class="dropdown-item">
                                    {{ __("Inicio") }}
                                </a>
                            @if (auth()->user()->role_id == 1)
                                <a href="{{ url('/users') }}" class="dropdown-item">
                                    {{ __("Gestionar Usuarios") }}
                                </a>
                                <a href="{{ url('/employee') }}" class="dropdown-item">
                                    {{ __("Gestionar Empleados") }}
                                </a>
                                <a href="{{ url('/admin/categories') }}" class="dropdown-item">
                                    {{ __("Gestionar Categorías") }}
                                </a>
                            @endif
                        <a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __("Cerrar sesión") }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>

    <div >
        @yield('content')
    </div>

</body>
    <!--   Core JS Files   -->
    <script src="{{asset('/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/plugins/moment.min.js')}}"></script>
    <script src="{{asset('/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/plugins/jquery.sharrre.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/material-kit.js?v=2.0.4')}}" type="text/javascript"></script>
</html>

