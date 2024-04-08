<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Envialoop</title>
    <link rel="icon" href="{{ asset('/img/favicon.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Faster+One|Gugi&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/d9523ccd01.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/arousel.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/img/logo_lg.png') }}" width="180px" alt="Envialoop">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                         <!--<li class="nav-item">
                             <a href="/blog"class="nav-link">Blog</a>
                         </li>-->
                         <li class="nav-item">
                             <a href="/about"class="nav-link">Acerca de nosotros</a>
                         </li>
                         <li class="nav-item">
                             <a href="/services"class="nav-link">Servicios</a>
                         </li>
                         <li class="nav-item">
                             <a href="/search-number-tracking"class="nav-link">Buscar TRK</a>
                         </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->hasRole('admin'))
                                        <a class="dropdown-item" href="/admin">Dahsboard</a>
                                    @elseif(Auth::user()->hasRole('customer'))
                                        <a class="dropdown-item" href="/customer">Dahsboard</a>
                                    @elseif(Auth::user()->hasRole('collector'))
                                        <a class="dropdown-item" href="/collector">Dahsboard</a>
                                    @endif
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

                    <form method="post" action="{{ route('trackingcontrol.search-trk') }}" class="form-inline mt-2 mt-md-0">
                        @csrf
                        <input class="form-control mr-sm-2" type="text" placeholder="Ttracking" aria-label="Ttracking" name="tracking-number" required>
                        <button class="btn btn-info my-2 my-sm-0" type="submit">BUSCAR</button>
                    </form>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
            <!-- FOOTER -->
            <footer class="container mt-4">
                <p class="float-right"><a href="#">Back to top</a></p>
                <p>&copy; 2019-2020 Envialoop SA de CV. &middot; <a href="#">Provacidad</a> &middot; <a href="#">Terminos</a></p>
            </footer>
        </main>
    </div>
</body>
</html>
