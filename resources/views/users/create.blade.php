@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear usuario <small>Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Usuarios</a></li>
        <li class="active">Crear usuarios</li>
    </ol>
</section>
<section class="content">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <a href="{{ route('users') }}" 
                        class="btn btn-sm btn-primary">
                            Volver
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('user_store') }}" class="form-horizontal">
                    @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Nombres y apellidos</label>
                        <div class="col-sm-6 @error('name') has-error @enderror">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="off" autofocus placeholder="Nombres y apellidos">
                            @error('name')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">{{ __('E-Mail Address') }}</label>
                        <div class="col-sm-6 @error('email') has-error @enderror">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="{{ __('E-Mail Address') }}">
                            @error('email')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">{{ __('Password') }}</label>
                        <div class="col-sm-6 @error('password') has-error @enderror">
                            <input id="password" type="password" class="form-control" name="password" autocomplete="off-password" placeholder="{{ __('Password') }}">
                            @error('password')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rol" class="col-sm-4 control-label">Rol</label>
                        <div class="col-sm-6 @error('roles') has-error @enderror">
                            <select name="roles" id="rol" class="form-control" placeholder="Rol">
                                <option selected disabled></option>
                                @foreach ($roles as $rol)
                                    <option {{(old('roles') == $rol->id) ? 'selected' : '' }} {{(!auth()->user()->hasRole('Administrador') && $rol->id == 1) ? 'disabled' : ''}} value="{{$rol->id}}">{{$rol->name}}</option>
                                @endforeach
                            </select>
                            @error('roles')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cedula" class="col-sm-4 control-label">Número de documento</label>
                        <div class="col-sm-6 @error('cedula') has-error @enderror">
                            <input id="cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" autocomplete="off" placeholder="Número de documento">
                            @error('cedula')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-sm-4 control-label">Dirección</label>
                        <div class="col-sm-6 @error('direccion') has-error @enderror">
                            <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" autocomplete="off" placeholder="Dirección">
                            @error('direccion')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="col-sm-4 control-label">Teléfono</label>

                        <div class="col-sm-6 @error('telefono') has-error @enderror">
                            <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" autocomplete="off" placeholder="Teléfono">
                            @error('telefono')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="position_id" class="col-md-4 control-label">Cargo</label>
                        <div class="col-md-6 @error('position_id') has-error @enderror">
                            <select name="position_id" id="position_id" class="form-control">
                                <option value="" selected disabled>Selecciona el cargo</option>
                                @foreach ($positions as $position)
                                    <option {{ (old('position_id') == $position->id) ? 'selected' : ''}} value="{{$position->id}}">{{$position->name}}</option>
                                @endforeach
                            </select>
                            @error('position_id')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="area" class="col-sm-4 control-label">Área</label>
                        <div class="col-sm-6 @error('area') has-error @enderror">
                            <input id="area" type="text" class="form-control" name="area" value="{{ old('area') }}" autocomplete="off" placeholder="Área">
                            @error('area')<span class="help-block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-sm btn-primary">Crear</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection