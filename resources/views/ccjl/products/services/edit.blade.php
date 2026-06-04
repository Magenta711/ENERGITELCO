@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar servicio
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="">Productos</a></li>
        <li><a href="">Servicios</a></li>
        <li class="active">Editar servicios</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('CCJL_services')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('CCJL_services_update',$id->id)}}" method="post" autocomplete="off">
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
                        <label for="value">Valor</label>
                        <input type="number" name="value" id="value" class="form-control" value="{{ $id->value }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="text">Descrición</label>
                        <textarea name="text" id="text" class="form-control" cols="30" rows="3">{{ $id->text }}</textarea>
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