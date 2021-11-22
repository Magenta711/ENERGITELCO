@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Consumible
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Ejecución de obras</a></li>
            <li><a href="#">Inventarios</a></li>
            <li><a href="#">Consumibles</a></li>
            <li class="active">Ver</li>
        </ol>
    </section>
    <section class="content">
         
        <div class="box">
            <div class="box-header">
                <div class="box-title">Ver consumibles</div>
                <div class="box-tools">
                    <a href="{{route('mintic_inventory_consumables')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                            <label for="item">Item</label>
                            <p>{{$id->item}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                            <label for="amount">Cantidad inicial</label>
                            <p>{{$id->amount}} {{$id->unid}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                            <label for="amount">Cantidad actual</label>
                            <p>{{$id->stock}} {{$id->unid}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                            <label for="amount">Entradas</label>
                            <p>{{$id->tickets}} {{$id->unid}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                            <label for="amount">Salidas</label>
                            <p>{{$id->departures}} {{$id->unid}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <p>{{$id->type}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="form-group">
                            <label for="type">Aviso por cantidad</label>
                            <p>{{$id->alert}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection