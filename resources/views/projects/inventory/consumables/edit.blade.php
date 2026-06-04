@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Consumibles
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Ejecución de obras</a></li>
            <li><a href="#">Inventario</a></li>
            <li><a href="#">Consumibles</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>
    <section class="content">
         
        <div class="box">
            <div class="box-header">
                <div class="box-title">Editar consumible</div>
                <div class="box-tools">
                    <a href="{{route('mintic_inventory_consumables')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('mintic_inventory_consumables_update',$id->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="item">Item</label>
                                <input type="text" class="form-control" name="item" id="item" value="{{$id->item}}">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="amount">Cantidades</label>
                                <input type="number" class="form-control" name="amount" id="amount" value="{{$id->amount}}">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="unid">Unidad</label>
                                <select name="unid" id="unid" class="form-control">
                                    <option selected value="">No aplica</option>
                                    <option {{$id->unid == 'Mts' ? 'selected' : ''}} value="Mts">Metros</option>
                                    <option {{$id->unid == 'Kg' ? 'selected' : ''}} value="Kg">Kilogramos</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <input type="text" class="form-control" name="type" id="type" value="{{$id->type}}">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="alert">Alertar <small>Digite la cantidad minima para que el sistema arroje una alerta</small></label>
                                <input type="number" class="form-control" name="alert" id="alert" value="{{$id->alert ?? 0 }}">
                            </div>
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