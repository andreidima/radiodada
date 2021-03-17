<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome links -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        @auth
            <nav class="navbar navbar-expand-md navbar-dark shadow py-0" style="background-color:darkcyan">
                <div class="container">
                    <a class="navbar-brand mr-5" href="{{ url('/piese') }}">
                        {{ config('app.name', 'Radio Dada') }}
                        {{-- <img src="{{ asset('images/logo.png') }}" height="40" class="border border-dark rounded-pill mr-4"> --}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active mr-4">
                                <a class="nav-link" href="{{ route('piese.index') }}">
                                    <i class="fas fa-music mr-1"></i>Piese
                                </a>
                            </li>
                            <li class="nav-item active mr-4">
                                <a class="nav-link" href="{{ route('artisti.index') }}">
                                    <i class="fas fa-users mr-1"></i>Artiști
                                </a>
                            </li>
                            <li class="nav-item active mr-4">
                                <a class="nav-link" href="/piese/categorie/Top">
                                    <i class="fas fa-star mr-1"></i>Top
                                </a>
                            </li>
                            <li class="nav-item active mr-4">
                                <a class="nav-link" href="/piese/categorie/Propunere">
                                    <i class="fas fa-list-alt mr-1"></i>Propuneri
                                </a>
                            </li>
                            <li class="nav-item active mr-4">
                                <a class="nav-link" href="{{ route('propuneri.index') }}">
                                    <i class="fas fa-pencil-alt mr-1"></i>Propuneri de aprobat
                                </a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto text-white">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item active dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
