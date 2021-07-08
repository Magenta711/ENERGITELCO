@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Crear inventario de equipos <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li class="active">Inventario</li>
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
            <form action="{{route('mintic_inventory_equipment_update',$id->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label for="serial">Serial</label>
                                <input type="text" class="form-control" name="serial" id="serial" value="{{$id->serial}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label for="item">Item</label>
                                <input type="text" class="form-control" name="item" id="item" value="{{$id->item}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label for="brand">Marca</label>
                                <input type="text" class="form-control" name="brand" id="brand" value="{{$id->brand}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="commentary">Comentarios</label>
                            <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{$id->commentary}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </section>
@endsection