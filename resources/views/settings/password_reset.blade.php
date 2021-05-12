@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Cambiar contraseña <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Actualizar contraseña</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="row">
        @include('settings.include.menu')
        <div class="col-md-8 col-ms-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
        
                    <h3 class="box-title">Cambiar contraseña</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('password_update') }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-md-4 label-control" for="current_password">Contraseña actual</label>
                        <div class="col-md-8">
                            <input type="password" name="current_password" value="" class="form-control" placeholder="Contraseña actual">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 label-control" for="password">Nueva contraseña</label>
                        <div class="col-md-8">
                            <input type="password" name="password" value="" class="form-control" placeholder="Nueva contraseña">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 label-control" for="password-confirm">{{ __('Confirm Password') }}</label>
                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                </div>
                </form>
            </div>
        <!-- /.box -->
        </div>
    </div>
</section>
@endsection