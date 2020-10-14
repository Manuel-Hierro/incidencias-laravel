<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }} 🡺 Incidencias
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <form class="form-inline" id="buscador" method="GET" action="{{ route('users_ver')}}">
                            <input class="form-control" id="search" type="text" placeholder="Buscar Usuario">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                          </form>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">          <!-- Nombre de la Ruta -->
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">          <!-- Nombre de la Ruta -->
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">          <!-- Nombre de la Ruta -->
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        @if(Auth::user()->role == 'administrador')
                        <li class="nav-item">          <!-- Nombre de la Ruta -->
                            <a class="nav-link" href="{{ route('registro.list') }}">Registros</a>
                        </li>
                        @endif
                        <li class="nav-item">          <!-- Nombre de la Ruta -->
                            <a class="nav-link" href="{{ route('incidencia_ver') }}">Incidencias</a>
                        </li>
                        @if(Auth::user()->role == 'administrador')
                        <li class="nav-item">          <!-- Nombre de la Ruta -->
                            <a class="nav-link" href="{{ route('users_ver') }}">Usuarios</a>
                        </li>
                        @endif
                        <li class="nav-item">          <!-- Nombre de la Ruta -->
                            <a class="nav-link" href="{{ route('mensajes_ver') }}">Mensajes</a>
                        </li>
                        @if(Auth::user()->role == 'administrador')
                        <li class="nav-item">          <!-- Nombre de la Ruta -->
                            <a class="nav-link" href="{{ route('logs_ver') }}">Logs</a>
                        </li>
                        @endif
                        <li class="">
                            @include('includes.avatar')
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucfirst( Auth::user()->nombre ) }} ({{Auth::user()->role}})<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="">
                                       Mi Perfil
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user_config') }}">
                                       Configuracion
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
