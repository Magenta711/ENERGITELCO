<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ENERGITELCO</title>
        <link rel="icon" type="image/x-icon" href="{{asset('img/logo_sm.png')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/guest.css')}}" rel="stylesheet" />
        @yield('css')
        
    </head>
    <?php function activeMenu($url)
    {
        return request()->is($url) ? 'active' : '';
    }
    ?>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="https://www.energitelco.com.co"><img src="{{asset('img/logo.png')}}" alt="ENERGITELCO"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li class="{{ activeMenu('work_with_us') }} nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ route('home') }}">Home</a>
                            </li>
                        @endauth
                        @guest
                            <li class="{{ activeMenu('login') }} nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endguest
                        <li class="{{ activeMenu('work_with_us') }} nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('work_with_us') }}">Trabaja con nosotros</a>
                        </li>
                        <li class="{{ activeMenu('work_with_us') }} nav-item">
                            <a class="nav-link js-scroll-trigger" href="{{ route('letter_recommendation') }}">Carta recomendación</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © ENERGITELCO 2019 - 2021</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/guest.js')}}"></script>
        @yield('js')
    </body>
</html>
