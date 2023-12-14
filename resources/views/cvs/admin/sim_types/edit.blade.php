@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar tipos de Sim Card
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li><a href="">Sedes</a></li>
        <li class="active">Editar tipos de Sim Cards</li>
    </ol>
</section>
<section class="content">
    <div class="box">
         
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_admin_sims_type')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_admin_sims_type_update',$id->id)}}" method="post" autocomplete="off">
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
            </div>
            <hr>
            <h3>Precios</h3>
            @foreach ($sedes as $item)
                <div class="form-gruop">
                    <label for="prices_{{ $item->id }}">{{ $item->name }}</label>
                    <input type="text" name="prices[{{ $item->id }}]" id="prices_{{ $item->id }}" class="form-control" value="{{ $id->hasPrices($item->id) }}">
                </div>
                <hr>
            @endforeach
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection