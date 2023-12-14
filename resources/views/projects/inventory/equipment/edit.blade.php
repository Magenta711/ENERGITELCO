@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Editar inventario de equipos <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li class="active">Inventario</li>
        </ol>
    </section>
    <section class="content">
         
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
                                <label for="equip_id">Referencia</label>
                                <select name="equip_id" id="equip_id" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el equipo" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    <option selected value="0">Otra</option>
                                    @foreach ($equipment_deatils as $item)
                                        <option {{$id->equip_id == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->sap}} - {{$item->name}} - {{$item->model_id}} - {{$item->part_id}} - {{$item->brand}}</option>
                                    @endforeach
                                </select>
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
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <select name="type" id="type" class="form-control">
                                    <option selected disabled></option>
                                    <option {{$id->type == 'Instalación' ? 'selected' : ''}} value="Instalación">Instalación</option>
                                    <option {{$id->type == 'Mantenimiento' ? 'selected' : ''}} value="Mantenimiento">Mantenimiento</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select name="status" id="status" class="form-control">
                                    <option selected disabled></option>
                                    <option {{$id->status == 1 ? 'selected' : ''}} value="1">En bodega</option>
                                    <option {{$id->status == 2 ? 'selected' : ''}} value="2">En comisión</option>
                                    <option {{$id->status == 3 ? 'selected' : ''}} value="3">Instalado</option>
                                    <option {{$id->status == 4 ? 'selected' : ''}} value="4">En inversa</option>
                                    <option {{$id->status == 5 ? 'selected' : ''}} value="5">En garantía</option>
                                </select>
                            </div>
                        </div>
                        {{-- @php
                            $relation = true;
                            if($id->inventarybles || $id->productables) {
                                $relation = false;
                            }
                        @endphp --}}
                        {{-- @if (!$relation) --}}
                            <div class="col-md-4 col-xs-6">
                                <div class="form-group">
                                    <label for="">Proyecto</label>
                                    <select name="proyect_id" id="proyect_id" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el proyecto" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                        <option selected disabled></option>
                                        @foreach ($projects as $project)
                                            <option value="{{$project->id}}">{{$project->code}} {{$project->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <div class="form-group">
                                    <label for="">Técnico</label>
                                    <select name="tehcnical_id" id="tehcnical_id" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el funcionario" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                        <option selected disabled></option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        {{-- @endif --}}
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