@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear canon
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Canons</a></li>
        <li class="active">Crear canons</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('CCJL_locals')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('CCJL_locals_store')}}" method="post" autocomplete="off">
            @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="departament">Departamento</label>
                        <input type="text" name="departament" id="departament" class="form-control" value="{{ old('departament') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="floor">Piso</label>
                        <input type="number" name="floor" id="floor" class="form-control" value="{{ old('floor') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Valor</label>
                        <input type="number" name="value" id="value" class="form-control" value="{{ old('value') }}">
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