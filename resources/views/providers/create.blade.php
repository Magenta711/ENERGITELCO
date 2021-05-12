@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear proveedor 
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Proveedores</a></li>
        <li class="active">Crear proveedores</li>
    </ol>
</section>
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <a href="{{route('providers')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <form action="{{route('provider_store')}}" method="post" class="form-horizontal">
                    @csrf
                <div class="box-body">
                    <div class="form-group">  
                        <label class="control-label col-sm-4" for="nit">Nit</label>
                        <div class="col-sm-6 @error('nit') has-error @enderror">
                            <input type="text" name="nit" id="nit" class="form-control" value="{{old('nit')}}" placeholder="Nit o cédula">
                            @error('nit') <span class="help-block">{{ $message }}</span> @enderror
                        </div>  
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="name">Nombre</label>
                        <div class="col-sm-6 @error('name') has-error @enderror">
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Nombre del cliente">
                            @error('name') <span class="help-block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">  
                        <label class="control-label col-sm-4" for="email">Correo electrónico</label>
                        <div class="col-sm-6 @error('email') has-error @enderror">
                            <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="example@email.com">
                            @error('email') <span class="help-block">{{ $message }}</span> @enderror
                        </div>  
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="tel">Teléfono</label>
                        <div class="col-sm-6 @error('tel') has-error @enderror">
                            <input type="text" name="tel" id="tel" class="form-control" value="{{old('tel')}}" placeholder="Teléfono de contacto">
                            @error('tel') <span class="help-block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">  
                        <label class="control-label col-sm-4" for="city">Ciudad</label>
                        <div class="col-sm-6 @error('city') has-error @enderror">
                            <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}" placeholder="Ciudad">
                            @error('city') <span class="help-block">{{ $message }}</span> @enderror
                        </div>  
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="address">Dirección</label>
                        <div class="col-sm-6 @error('address') has-error @enderror">
                            <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}" placeholder="Dirección">
                            @error('address') <span class="help-block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">  
                        <label class="control-label col-sm-4" for="type_id">Tipo de proveedor</label>
                        <div class="col-sm-6 @error('type_id') has-error @enderror">
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="" disabled selected></option>
                                @foreach ($type_providers as $type)
                                <option value="{{$type->id}}">{{$type->type}}</option>
                                @endforeach
                            </select>
                            @error('type_id') <span class="help-block">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button id="send" class="btn btn-sm btn-primary btn-send">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
        var bPreguntar = true;
    
        window.onbeforeunload = preguntarAntesDeSalir;

        $(document).ready(function() {
            $('#send').click(function (){
                bPreguntar = false;
                return true;
            });
        });
        
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
            return "¿Seguro que quieres salir?";
        }
    </script>
@endsection