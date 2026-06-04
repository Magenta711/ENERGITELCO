@extends('store.client.auth')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/auth.css') }}">
@endsection
@section('content')
    <section>
        <div class="container text-center p-5">
            <h4><b>Iniciar sesión</b></h4>
            <hr>
            <div class="tab-pane" id="login" role="tabpanel">
                <form method="POST" action="{{ route('login_client') }}">
                    @csrf
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <hr>
                    <p>No tienes cuenta, creála <a href="{{ route('register_client') }}">aquí</a></p>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </section>
@endsection
