@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar accesorios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Inventarios</a></li>
        <li><a href="">Accesorios</a></li>
        <li class="active">Editar accesorios</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_inventary_claro_services')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_inventary_claro_services_update',$id->id)}}" method="post" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cod">Tipo</label>
                        <select name="cod" id="cod" class="form-control">
                            <option disabled selected></option>
                            <option {{ $id->cod == "Movil" ? 'selected' : ''}} value="Movil">Movil</option>
                            <option {{ $id->cod == "Fijo" ? 'selected' : ''}} value="Fijo">Fijo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Referencia</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{ $id->description }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Valor</label>
                        <input type="text" name="value" id="value" class="form-control" value="{{ $id->value }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Observaciones</label>
                        <textarea name="text" id="text" cols="30" rows="3" class="form-control">{{ $id->text }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control">
                            <option disabled selected></option>
                            <option {{ $id->status == "1" ? 'selected' : ''}} value="1">Activo</option>
                            <option {{ $id->status == "0" ? 'selected' : ''}} value="0">Inactivo</option>
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