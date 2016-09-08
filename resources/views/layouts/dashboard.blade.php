<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin TEC</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @yield('after-styles')
</head>
<body id="app-layout">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('admin') }}">Administrador</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-left">
        <li>
            <a target="_blank" href="{{route('welcome')}}" class="bt btn-link">
                Ver web
            </a>
        </li>
    </ul>
    <ul class="nav navbar-top-links navbar-right">

        @if (Auth::check())
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">

                <li>
                    <a href="{{route('profile')}}"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->full_name }} </a>
                </li>

                <li class="divider"></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-fw fa-sign-out"></i>Logout</a></li>

            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
        @endif
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-inverse sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ url('admin') }}"><i class="fa fa-dashboard fa-fw"></i> Principal</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Representantes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.users.index') }}">Todos</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Noticias<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.articles.index') }}">Todas</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.articles.create') }}">Crear noticia</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{route('admin.galleries.index')}}"><i class="fa fa-picture-o fa-fw"></i> Galerías</a>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{route('admin.albums.index')}}"><i class="fa fa-picture-o fa-fw"></i> Albums</a>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{route('admin.files.index')}}"><i class="fa fa-th fa-fw"></i> Botones</a>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

<div id="wrapper">

    <div id="page-wrapper">
        @include('layouts.partials._flash',['container' => 'container-fluid'])

        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>

<footer>

</footer>
@yield('before-script-begin')
<!-- JavaScripts -->
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/dataTables.js') }}"></script>

@yield('after-script-end')

</body>
</html>
