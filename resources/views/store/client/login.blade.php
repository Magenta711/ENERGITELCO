<div class="tab-pane fade show active" id="login" role="tabpanel">
    <form method="POST" action="{{ route('login_client') }}">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
    </form>
</div>
