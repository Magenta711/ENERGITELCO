<div class="tab-pane fade" id="register" role="tabpanel">
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
        <button type="submit" class="btn btn-success btn-block">Registrarse</button>
    </form>
</div>
