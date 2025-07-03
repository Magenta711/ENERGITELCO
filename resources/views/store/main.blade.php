<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TIENDA</title>

    <link rel="icon" type="image/x-icon" href="https://energitelco.com/assets/img/favicon.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://energitelco.com/css/styles.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css") }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/crypto-js@4.1.1/crypto-js.min.js"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <ul class="nav">
        <li class="nav-item">
            <a class="navbar-brand js-scroll-trigger"><img src="https://energitelco.com/assets/img/logo.png"
                    alt="ENERGITELCO"></a>
        </li>
        <div class="nav-content">
            @auth('tienda')
                <div class="btn-group">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="user">{{ strtoupper($cliente->name) }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('store.orders') }}" class="nav-link">COMPRAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('store.show_cart', $cliente->id) }}"><i
                                class="fa fa-cart-plus"></i> {{ count($all_products) }}</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout" action="{{ route('logout_client') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </div>
            @endauth
            @guest('tienda')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register_client') }}">Ingresar</a>
                </li>
            @endguest
        </div>
    </ul>
    </main>
    @yield('style')
    <section>
        @yield('content')
    </section>
    @yield('script')

    {{-- @include('store.products-section-min') --}}
</body>

</html>

<script>
    $(document).ready(function() {
        $("#user").click(function() {
            $("#logout").submit();
        });
    });

</script>


<style>
    .nav {
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding: 10px 0px 10px 0px;
    }

    .nav-link {
        color: #000000;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
    }
</style>
