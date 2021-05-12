@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Ver canon
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="">Productos</a></li>
        <li><a href="">canons</a></li>
        <li class="active">Ver canons</li>
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
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Departamento</label>
                        <p>{{ $id->departament }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Piso</label>
                        <p>{{ $id->floor }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Valor</label>
                        <p>${{ number_format($id->value,2) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Estado</label>
                        <p>{{ $id->status ? 'Disponible' : 'No disponible' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection