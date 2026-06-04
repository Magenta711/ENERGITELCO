@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar sede
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li><a href="">Sedes</a></li>
        <li class="active">Editar sedes</li>
    </ol>
</section>
<section class="content">
    <div class="box">
         
        <div class="box-header">
            <div class="box-title">
                {{ $id->name }}
            </div>
            <div class="box-tools">
                <a href="{{route('cvs_sedes')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_sedes_update',$id->id)}}" method="post" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $id->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $id->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{  $id->address }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $id->city }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">Teléfono</label>
                        <input type="tel" name="tel" id="tel" class="form-control" value="{{ $id->tel }}">
                    </div>
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