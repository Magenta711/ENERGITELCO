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
                                    <div class="form-group">
                                        <input type="checkbox" name="b24_7" id="b24_7" value="1" {{Auth::user()->b24_7 ? 'checked' : ''}}>
                                        <label for="b24_7">24/7</label>
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
                                    <div class="form-group @error('telefono') has-error @enderror">
                                        <label for="telefono">Teléfono</label>
                                        <input type="tel" name="telefono" value="{{ Auth::user()->telefono }}" class="form-control" placeholder="Teléfono">
                                        @error('telefono')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('marital_status') has-error @enderror">
                                        <label for="marital_status">Estado civil</label>
                                        <select name="marital_status" id="marital_status" class="form-control">
                                            <option disabled selected></option>
                                            <option {{ auth()->user()->register && auth()->user()->register->marital_status == 'Soltero' ? 'selected' : ''}} value="Soltero">Soltero</option>
                                            <option {{ auth()->user()->register && auth()->user()->register->marital_status == 'Casado' ? 'selected' : ''}} value="Casado">Casado</option>
                                            <option {{ auth()->user()->register && auth()->user()->register->marital_status == 'Viudo' ? 'selected' : ''}} value="Viudo">Viudo</option>
                                            <option {{ auth()->user()->register && auth()->user()->register->marital_status == 'Unión libre' ? 'selected' : ''}} value="Unión libre">Union libre</option>
                                        </select>
                                        @error('marital_status')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('emergency_contact') has-error @enderror">
                                        <label for="emergency_contact">Contacto de emergencia</label>
                                        <input type="text" name="emergency_contact" value="{{ auth()->user()->register && auth()->user()->register->emergency_contact ? auth()->user()->register->emergency_contact : old('emergency_contact') }}" id="emergency_contact" class="form-control">
                                        @error('emergency_contact')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('emergency_contact_number') has-error @enderror">
                                        <label for="emergency_contact_number">Número de contacto de emergencia</label>
                                        <input type="text" name="emergency_contact_number" value="{{ auth()->user()->register && auth()->user()->register->emergency_contact_number ? auth()->user()->register->emergency_contact_number : old('emergency_contact_number') }}" id="emergency_contact_number" class="form-control">
                                        @error('emergency_contact_number')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('shirt_size') has-error @enderror">
                                        <label for="shirt_size">Talla camisa</label>
                                        <input type="text" name="shirt_size" value="{{ auth()->user()->register && auth()->user()->register->shirt_size ? auth()->user()->register->shirt_size : old('shirt_size') }}" id="shirt_size" class="form-control">
                                        @error('shirt_size')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('pant_size') has-error @enderror">
                                        <label for="pant_size">Talla pantalón</label>
                                        <input type="text" name="pant_size" value="{{ auth()->user()->register && auth()->user()->register->pant_size ? auth()->user()->register->pant_size : old('pant_size') }}" id="pant_size" class="form-control">
                                        @error('pant_size')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('shoe_size') has-error @enderror">
                                        <label for="shoe_size">Talla calzado</label>
                                        <input type="text" name="shoe_size" value="{{ auth()->user()->register && auth()->user()->register->shoe_size ? auth()->user()->register->shoe_size : old('shoe_size') }}" id="shoe_size" class="form-control">
                                        @error('shoe_size')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('height') has-error @enderror">
                                        <label for="height">Estatura</label>
                                        <input type="text" name="height" value="{{ auth()->user()->register->height ?? old('height') }}" id="height" class="form-control">
                                        @error('height')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group @error('weight') has-error @enderror">
                                        <label for="weight">Peso</label>
                                        <input type="text" name="weight" value="{{ auth()->user()->register->weight ?? old('weight') }}" id="weight" class="form-control">
                                        @error('weight')
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