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
        <li><a href="#">Sedes</a></li>
        <li class="active">Editar tipos de Sim Cards</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        @include('includes.alerts')
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_admin_sims_type')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <p>{{ $id->name }}</p>
                    </div>
                </div>
            </div>
            <hr>
            <h3>Precios</h3>
            @foreach ($id->prices as $item)
                <div class="form-gruop">
                    <label>{{ $item->sede->name }}</label>
                    <p>{{ $item->prices }}</p>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</section>
@endsection