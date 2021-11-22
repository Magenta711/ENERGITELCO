@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar tipo de cartelera
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Administración del sistema</a></li>
        <li><a href="">Tipo de carteleras</a></li>
        <li class="active">Editar tipo de carteleras</li>
    </ol>
</section>
<section class="content">
    <div class="box">
         
        <div class="box-header">
            <div class="box-title">
                {{ $id->name }}
            </div>
            <div class="box-tools">
                <a href="{{route('billboard_type')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{ route('billboard_type_update',$id->id) }}" method="post">
            @csrf
            @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $id->name }}">
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection