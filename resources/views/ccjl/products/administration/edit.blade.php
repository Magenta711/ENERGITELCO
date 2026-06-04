@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar administración
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="">Productos</a></li>
        <li><a href="">Administraciones</a></li>
        <li class="active">Editar administraciones</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('CCJL_administrations')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('CCJL_administrations_update',$id->id)}}" method="post" autocomplete="off">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control">
                            <option disabled selected></option>
                            <option {{ $id->status ? 'selected' : '' }} value="1">Activo</option>
                            <option {{ !$id->status ? 'selected' : '' }} value="0">Inactivo</option>
                        </select>
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