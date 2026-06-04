<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>COLSOLYTEL</title>

        {{-- <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}"> --}}

        <link rel="icon" type="image/x-icon" href="https://energitelco.com/assets/img/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://energitelco.com/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
                    {{-- <img src="https://energitelco.com/assets/img/logo.png" alt="ENERGITELCO"> --}}
                    COLSOLYTEL
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#signup">Contáctanos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Proyectos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login"><i class="far fa-user-circle"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <!-- About-->
        @yield('content')


        <!-- Signup-->
        @include('welcome.footer')
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © COLSOLYTEL 2025</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://energitelco.com/js/scripts.js"></script>
    </body>

    {{-- <button type="button" onclick="document.getElementById('modal').style.display = 'block'">Abrir modal</button> --}}
</html>


