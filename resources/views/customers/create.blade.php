@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Clientes</a></li>
        <li class="active">Crear clientes</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('customers')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('customer_store')}}" method="post" class="form-horizontal">
            @csrf
        <div class="box-body">
            <div class="form-group">
                <label class="control-label col-sm-4" for="nit">Nit</label>
                <div class="col-sm-6 @error('nit') has-error @enderror)">
                    <input type="text" name="nit" id="nit" class="form-control" value="{{old('nit')}}" placeholder="Nit o cédula">
                    @error('nit') <span class="help-block">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="name">Nombre</label>
                <div class="col-sm-6 @error('name') has-error @enderror)">
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Nombre del cliente">
                    @error('name') <span class="help-block">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Correo electrónico</label>
                <div class="col-sm-6 @error('email') has-error @enderror)">
                    <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="example@email.com">
                    @error('email') <span class="help-block">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="tel">Teléfono</label>
                <div class="col-sm-6 @error('tel') has-error @enderror)">
                    <input type="text" name="tel" id="tel" class="form-control" value="{{old('tel')}}" placeholder="Teléfono de contacto">
                    @error('tel') <span class="help-block">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="city">Ciudad</label>
                <div class="col-sm-6 @error('city') has-error @enderror)">
                    <input type="text" name="city" id="city" class="form-control" value="{{old('city')}}" placeholder="Ciudad">
                    @error('city') <span class="help-block">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="address">Dirección</label>
                <div class="col-sm-6 @error('address') has-error @enderror)">
                    <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}" placeholder="Dirección">
                    @error('address') <span class="help-block">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection