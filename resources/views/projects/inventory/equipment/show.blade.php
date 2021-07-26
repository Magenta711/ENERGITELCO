@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Ver inventario de equipos <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Ejecución de obras</a></li>
            <li><a href="#">Inventarios</a></li>
            <li class="active">Equipos</li>
        </ol>
    </section>
    <section class="content">
        @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <div class="box-title">Equipos MINTIC</div>
                <div class="box-tools">
                    <a href="{{route('mintic_inventory_equipment')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="serial">Serial</label>
                            <p>{{$id->serial}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="item">Item</label>
                            <p>{{$id->item}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label for="brand">Marca</label>
                            <p>{{$id->brand}}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="commentary">Comentarios</label>
                        <p>{{$id->commentary}}</p>
                    </div>
                </div>
                <p>
                    @if($id->inventarybles)
                        <p>Id programación de frente de trabajo {{$id->inventarybles->tasking->id}}</p>
                        <p>Nombre de EB o CD {{$id->inventarybles->tasking->station_name}}</p>
                        <p>Departamento {{$id->inventarybles->tasking->department}}</p>
                        <p>Municipio {{$id->inventarybles->tasking->municipality}}</p>
                    @endif
                    @if ($id->productables)
                        <p>Proyecto MinTIC id {{$id->productables->implement->project->id}}</p>
                        <p>Nombre de centro digital {{$id->productables->implement->project->name}}</p>
                        <p>Departamento {{$id->productables->implement->project->dep}}</p>
                        <p>Municipio de centro digital {{$id->productables->implement->project->mun}}</p>
                    @endif
                </p>
            </div>
        </div>
    </section>
@endsection