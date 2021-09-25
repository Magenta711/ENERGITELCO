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
            <form action="{{route('mintic_inventory_equipment_store')}}" method="post">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label for="serial">Serial</label>
                                <input type="text" class="form-control" name="serial" id="serial" value="{{old('serial')}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label for="equip_id">Referencia</label>
                                <select name="equip_id" id="equip_id" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el departamento" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    <option value="0">Otra</option>
                                    @foreach ($equipment_deatils as $item)
                                        <option {{old('equip_id') == $item->id ? 'seleted' : ''}} value="{{$item->id}}">{{$item->sap}} - {{$item->name}} - {{$item->model_id}} - {{$item->part_id}} - {{$item->brand}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6 other_reference" {{old('equip_id') != 0 ? 'setyle=display:none' : '' }}>
                            <div class="form-group">
                                <label for="item">Item</label>
                                <input type="text" class="form-control" name="item" id="item" value="{{old('item')}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6 other_reference" {{old('equip_id') != 0 ? 'setyle=display:none' : '' }}>
                            <div class="form-group">
                                <label for="brand">Marca</label>
                                <input type="text" class="form-control" name="brand" id="brand" value="{{old('brand')}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="commentary">Comentarios</label>
                            <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
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

@section('css')
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script>
        $(".select2").select2();
        $('#equip_id').change(function () {
            if(this.value == 0){
                $('.other_reference').show();
            }else {
                $('.other_reference').hide();
            }
        });
    </script>
@endsection