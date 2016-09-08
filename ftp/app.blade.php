<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Preescolar TEC</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/demo/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/demo/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/demo/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/demo/manifest.json">
    <link rel="mask-icon" href="/demo/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('after-styles-end')

</head>
<body id="app-layout">
    <header class="container">
        <div class="visible-xs" >
            <img class="img-responsive center" style="padding: 15px" src="{{asset('img/logo.png')}}" alt="TEC">
        </div>

        <div class="auth text">
            @if (Auth::check())
            <ul class="pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->full_name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('profile')}}"><i class="fa fa-user fa-fw"></i> Perfil </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
            @else
                <a href="{{ url('/login') }}" class="btn btn-primary btn-nav">Ingresar</a>
                <a href="{{ url('/register') }}" class="btn btn-primary btn-nav">Registrarse</a>
            @endif
                <a target="_blank" href="{{ !empty($register->path)?  url('/') . "/" .  $register->path :'#' }}" class="btn btn-danger btn-nav">Inscripción</a>
        </div>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand hidden-xs" href="{{ url('/') }}">
                        <h1 class="logo">
                            <img src="{{asset('img/logo.png')}}" alt="TEC">
                        </h1>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        {{--<li><a href="{{ url('/home') }}">Inicio</a></li>--}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-tec" data-toggle="dropdown" href="#">TEC</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('about')}}">Nosotros</a></li>
                                <li><a href="{{route('story')}}">Historia</a></li>
                                <li><a href="{{route('team')}}">Equipo Docente</a></li>
                                <li><a href="{{route('gallery', ['gallery' => 'instalaciones'])}}">Instalaciones</a></li>
                                <li><a href="{{route('articles')}}">Actualidad TEC</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-tec" data-toggle="dropdown" href="#">Galería</a>
                            <ul class="dropdown-menu">
                                @foreach($galleries as $gallery)
                                    @if($gallery->visibility)
                                        @if(Auth::check())
                                            <li><a href="{{route('gallery',$gallery)}}">{{$gallery->name}}</a></li>
                                        @endif
                                    @else
                                        <li><a href="{{route('gallery',$gallery)}}">{{$gallery->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-tec" data-toggle="dropdown" href="#">Niveles</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('level', ['id' => '0'])}}">Baby TEC</a></li>
                                <li><a href="{{url('level', ['id' => '1'])}}">Nivel I</a></li>
                                <li><a href="{{url('level', ['id' => '2'])}}">Nivel II</a></li>
                                <li><a href="{{url('level', ['id' => '3'])}}">Nivel III</a></li>
                                <li><a href="{{url('level', ['id' => '4'])}}">Nivel IV</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-tec" data-toggle="dropdown" href="#">Familia Tec</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('family', ['name' => 'babyGym'])}}">Baby Gym</a></li>
                                <li><a href="{{url('family', ['name' => 'deliTec'])}}">Deli Tec </a></li>
                                <li><a href="{{url('family', ['name' => 'tardesTec'])}}">Tardes Tec</a></li>
                                <li><a href="{{url('family', ['name' => 'partyTec'])}}">Party Tec</a></li>
                                <li><a href="{{url('family', ['name' => 'summer'])}}">Summer Camp</a></li>

                            </ul>
                        </li>
                        <li><a class="nav-tec" href="{{route('contact.index')}}">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @include('layouts.partials._flash',['container' => 'container'])

        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-8">
                    <p style="font-size: 18px; letter-spacing: 1px">
                        From small beginnings come great things <br/>
                        <span>+58 212-993 14.09 / 991. 59.74</span>
                    </p>
                </div>
                <div class="col-xs-4">
                    <ul class="list-inline social-icons pull-right">
                        <li>
                            <a href="#">
                                <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    @yield('before-script-begin')
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('after-script-end')
</body>
</html>
