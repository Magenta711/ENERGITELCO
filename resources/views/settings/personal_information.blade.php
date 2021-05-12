@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Información personal <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Información personal</li>
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
        
                    <h3 class="box-title">Actualizar información personal</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('profile_update') }}" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <label for="photo" style="cursor: pointer" enctype="multipart/form-data">
                                <picture>
                                    <img src="/img/{{ Auth::user()->foto }}" class="img-fluid img-thumbnail" style="border-radius: 50%" id="blah" alt="{{Auth::user()->foto}}">
                                </picture>
                                <div class="custom-file text-center">
                                    <input type="file" name="foto" accept="image/*" class="hide" id="photo">
                                    Cambiar foto de perfil
                                </div>
                            </label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="name">Nombre:</label>
                                        <input type="text" readonly name="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="Nombre">
                                        @error('name')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('email') has-error @enderror">
                                        <label for="email">Correo</label>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="email">
                                        @error('email')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('direccion') has-error @enderror">
                                        <label for="direccion">Dirección</label>
                                        <input type="direccion" name="direccion" value="{{ Auth::user()->direccion }}" class="form-control" placeholder="Dirección">
                                        @error('direccion')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('cedula') has-error @enderror">
                                        <label for="cedula">Documento de identificación</label>
                                        <input type="cedula" readonly name="cedula" value="{{ Auth::user()->cedula }}" class="form-control" placeholder="Documento de identificación">
                                        @error('cedula')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('telefono') has-error @enderror">
                                        <label for="telefono">Teléfono</label>
                                        <input type="tel" name="telefono" value="{{ Auth::user()->telefono }}" class="form-control" placeholder="Teléfono">
                                        @error('telefono')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-sm btn-primary btn-send">Actualizar</button>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    function readImage (input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result); // Renderizamos la imagen
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#photo').change(function (){
            readImage(this);
        });
    });
</script>
@endsection