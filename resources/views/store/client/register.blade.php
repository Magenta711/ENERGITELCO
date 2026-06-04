@extends('store.client.auth')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/auth.css') }}">
@endsection
@section('content')
<section>
    <div class="container text-center p-5">
        <h4><b>Crear cuenta</b></h4>
        <hr>
        <div class="tab-pane" id="register">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>Nombre *</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Correo Electrónico *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Teléfono *</label>
                    <input type="number" name="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Contraseña *</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Confirmar contraseña *</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <hr>
                <p>Ya tienes cuenta, ingresa <a href="{{ route('login_client_show') }}">aquí</a></p>
                <hr>
                <button type="submit" class="btn btn-success btn-block">Registrarse</button>
            </form>
        </div>
    </div>
</section>
@endsection
