@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Ver servicio
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="">Productos</a></li>
        <li><a href="">Servicios</a></li>
        <li class="active">Ver servicios</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('CCJL_administrations')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Nombre</label>
                        <p>{{ $id->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Valor</label>
                        <p>${{ number_format($id->value,2) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Estado</label>
                        <p>{{ $id->status ? 'Activo' : 'Inactivo' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Fecha</label>
                        <p>{{ $id->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection