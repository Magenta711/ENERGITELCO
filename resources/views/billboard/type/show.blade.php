@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Ver tipo de cartelera
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Administración del sistema</a></li>
        <li><a href="">Tipo de carteleras</a></li>
        <li class="active">Ver tipo de carteleras</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        @include('includes.alerts')
        <div class="box-header">
            <div class="box-title">
                {{ $id->name }}
            </div>
            <div class="box-tools">
                <a href="{{route('billboard_type')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="name">Nombre</label>
                <p>{{ $id->name }}</p>
            </div>
        </div>
    </div>
</section>
@endsection