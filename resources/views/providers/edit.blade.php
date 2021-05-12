@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar proveedor <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Proveedores</a></li>
        <li class="active">Editar proveedores</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('provider_update',$id->id) }}" method="POST" class="form-horizontal">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <a href="{{ route('providers') }}" 
                        class="btn btn-sm btn-primary">
                            Volver
                        </a>
                    </div>
                </div>
                <div class="box-body">

                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="nit" class="col-sm-4 control-label">Nit</label>

                            <div class="col-md-6 @error('nit') has-error @enderror">
                                <input id="nit" type="text" class="form-control" name="nit"  value="{{ $id->nit }}" autocomplete="off" autofocus placeholder="Nit o cédula">

                                @error('nit') <span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Nombre</label>

                            <div class="col-md-6 @error('name') has-error @enderror">
                                <input id="name" type="text" class="form-control" name="name"  value="{{ $id->name }}" autocomplete="off" autofocus placeholder="Nombre de la empresa">

                                @error('name') <span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label"> Correo</label>

                            <div class="col-md-6 @error('email') has-error @enderror">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $id->email }}" autocomplete="off" placeholder="example@email.com">

                                @error('email') <span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-sm-4 control-label">Teléfono</label>

                            <div class="col-md-6 @error('tel') has-error @enderror">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{ $id->tel }}" autocomplete="off" placeholder="Teléfono">

                                @error('tel') <span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-4 control-label">Ciudad</label>
                            
                            <div class="col-md-6 @error('city') has-error @enderror">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $id->city }}" autocomplete="off" placeholder="Ciudad">
                                
                                @error('city') <span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-4 control-label">Dirección</label>
    
                            <div class="col-md-6 @error('address') has-error @enderror">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $id->address }}" autocomplete="off" placeholder="Dirección">
    
                                @error('address') <span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type_id" class="col-sm-4 control-label">Tipo de proveedor</label>
    
                            <div class="col-md-6 @error('type_id') has-error @enderror">
                                <select name="type_id" id="type_id" class="form-control">
                                    <option value="" disabled selected></option>
                                    @foreach ($type_providers as $type)
                                        <option {{($id->type_id == $type->id) ? 'selected' : ''}} value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
    
                                @error('type_id') <span class="help-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-center">
                        <button id="send" class="btn  btn-sm btn-primary btn-send">Guardar</button>
                    </div>
                </div>
            </form>
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
                return d.submit();
            });
        });
        
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
            return "¿Seguro que quieres salir?";
        }
    </script>
@endsection
