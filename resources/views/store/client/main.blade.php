<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <!-- Tabs -->
            <ul class="nav nav-tabs text-center" id="authTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab">Inciar
                        Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab">Registro</a>
                </li>
            </ul>

            <!-- Forms -->
            <div class="tab-content bg-white p-4 border border-top-0" id="authTabsContent">
                <!-- Login Form -->
                @include('store.client.login')

                <!-- Register Form -->
                @include('store.client.register')
            </div>
        </div>
        {{-- <!-- JS de Bootstrap --> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
