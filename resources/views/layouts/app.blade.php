<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- IconNav --}}
    <link rel="shortcut icon" href="{{asset('img/logo_sm.png')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ENERGIRTELCO SAS') }}</title>
    
    <!-- Scripts -->
    <script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <link href="{{asset("assets/$theme/bower_components/font-awesome/css/all.min.css")}}" rel="stylesheet">
    
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    @yield('js')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="https://www.energitelco.com">
                    {{ config('app.name', 'Energitelco') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                <?php function activeMenu($url)
                {
                    return request()->is($url) ? 'active' : '';
                }
                ?>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <li class="{{ activeMenu('work_with_us') }} nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                        @endauth
                        <!-- Authentication Links -->
                        <li class="{{ activeMenu('guest/letters/recommendation') }} nav-item">
                            <a class="nav-link" href="{{ route('letter_recommendation') }}">Carta recomendación</a>
                        </li>
                        <li class="{{ activeMenu('work_with_us') }} nav-item">
                            <a class="nav-link" href="{{ route('work_with_us') }}">Trabaja con nosotros</a>
                        </li>
                        @guest
                            <li class="{{ activeMenu('login') }} nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
    <footer class="position-relative fixed-bottom">
        <!--<div class="container">-->
            <p class="text-muted text-center credit">
                © Copyright 2019 - 2022 Todos los derechos reservados | Hecho por Juan Esteban Leal Usuga.
            </p>
        <!--</div>-->
    </footer>
</body>
</html>
