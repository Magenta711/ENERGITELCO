@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Consumibles
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Ejecución de obras</a></li>
            <li><a href="#">Consumibles</a></li>
            <li><a href="#">Inventario</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">
         
        <div class="box">
            <div class="box-header">
                <div class="box-title">Crear consumible</div>
                <div class="box-tools">
                    <a href="{{route('mintic_inventory_consumables')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('mintic_inventory_consumables_store')}}" method="post">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="item">Item</label>
                                <input type="text" class="form-control" name="item" id="item" value="{{old('item')}}">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="amount">Cantidades</label>
                                <input type="text" class="form-control" name="amount" id="amount" value="{{old('amount')}}">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="unid">Unidad</label>
                                <select name="unid" id="unid" class="form-control">
                                    <option selected value="">No aplica</option>
                                    <option {{old('unid') == 'Mts' ? 'seleted' : ''}} value="Mts">Metros</option>
                                    <option {{old('unid') == 'Kg' ? 'seleted' : ''}} value="Kg">Kilogramos</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <input type="text" class="form-control" name="type" id="type" value="{{old('type')}}">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="form-group">
                                <label for="alert">Alertar <small>Digite la cantidad minima para que el sistema arroje una alerta</small></label>
                                <input type="text" class="form-control" name="alert" id="alert" value="{{old('alert') ?? 0 }}">
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