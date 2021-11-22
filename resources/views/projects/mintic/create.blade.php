@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        Crear proyecto MINTIC <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">Crear</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title"> Proyecto MINTIC</div>
            <div class="box-tools">
                <a href="{{route('mintic')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <form method="post" action="{{ route('mintic_store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="department">Departamentos</label>
                            <select name="dep" id="department" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el departamento" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option disabled selected></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="municipality">Municipio</label>
                            <select name="mun" id="municipality" disabled class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el municipio" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                <option disabled selected></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="eb">Sede educativa</label>
                            <input type="hidden" name="type_eb" id="type_eb">
                            <select name="con_sede" id="eb" class="form-control select2 select2-hidden-accessible" disabled style="width: 100%;" data-placeholder="Selecciona una sede educativa" data-select2-id="5" tabindex="-1" aria-hidden="true">
                                <option disabled selected></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="display: none">
                            <label for="station_name">Nombre de la sede educativa</label>
                            <input type="text" value="{{old('name')}}" name="name" id="station_name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lat">Latitud</label>
                            <input type="text" value="{{old('lat')}}" name="lat" id="lat" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="long">Longitud</label>
                            <input type="text" value="{{old('long')}}" name="long" id="long" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="height">Altitud</label>
                            <input type="text" id="height" name="height" value="{{ old('height') }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="code">Id beneficiario</label>
                            <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="population">Centro de población</label>
                            <input type="text" id="population" name="population" value="{{ old('population') }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="person_name">Nombre quien atiende la visita</label>
                            <input type="text" id="person_name" name="person_name" value="{{ old('person_name') }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="person_number">Teléfono quien atiende la visita</label>
                            <input type="text" id="person_number" name="person_number" value="{{ old('person_number') }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="rector_name">Nombre del rector</label>
                            <input type="text" id="rector_name" name="rector_name" value="{{ old('rector_name') }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="rector_number">Número del rector</label>
                            <input type="text" id="rector_number" name="rector_number" value="{{ old('rector_number') }}" class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="observation">Observaciones</label>
                            <textarea name="observation" id="observation" cols="30" rows="3" class="form-control">{{ old('observation') }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <h4>Estudio de campo</h4>
                    <div id="destino_ec">
                        <div class="row" id="origen_ec">
                            <div class="form-group col-sm-6">
                                <label for="date">Fecha visita</label>
                                <input type="date" id="date" name="date_ec[]" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time">Hora visita</label>
                                <input type="time" id="time" name="time_ec[]" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id_ec">Técnico asignado</label>
                                <select name="technical_id_ec[]" id="technical_id_ec" class="form-control">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->cedula}}. {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary">Comentarios</label>
                                <input type="text" id="commentary" name="commentary_ec[]" class="form-control">
                            </div>
                            <hr>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-link btn-add-visit" id="btn_add_ec"><i class="fa fa-plus"></i> Agregar visita</button>
                    <hr>
                    <h4>Instalación</h4>
                    <div id="destino_install">
                        <div class="row" id="origen_install">
                            <div class="form-group col-sm-6">
                                <label for="date_install">Fecha visita</label>
                                <input type="date" id="date_install" name="date_install[]" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_install">Hora visita</label>
                                <input type="time" id="time_install" name="time_install[]" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id_install">Técnico asignado</label>
                                <select name="technical_id_install[]" id="technical_id_install" class="form-control">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->cedula}}. {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary_install">Comentarios</label>
                                <input type="text" id="commentary_install" name="commentary_install[]" class="form-control">
                            </div>
                            <hr>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-link btn-add-visit" id="btn_add_install"><i class="fa fa-plus"></i> Agregar visita</button>
                    <hr>
                    <h4>Integración y/o entrega</h4>
                    <div id="destino_integration">
                        <div class="row" id="origen_integration">
                            <div class="form-group col-sm-6">
                                <label for="date_integration">Fecha visita</label>
                                <input type="date" id="date_integration" name="date_integration[]" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_integration">Hora visita</label>
                                <input type="time" id="time_integration" name="time_integration[]" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id_integration">Técnico asignado</label>
                                <select name="technical_id_integration[]" id="technical_id_integration" class="form-control">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->cedula}}. {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary_integration">Comentarios</label>
                                <input type="text" id="commentary_integration" name="commentary_integration[]"  class="form-control">
                            </div>
                            <hr>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-link btn-add-visit" id="btn_add_integration"><i class="fa fa-plus"></i> Agregar visita</button>
                    <hr>
                    <h4>Mantenimiento</h4>
                    <div id="destino_maintenance">
                        <div class="row" id="origen_maintenance">
                            <div class="form-group col-sm-6">
                                <label for="date_maintenance">Fecha visita</label>
                                <input type="date" id="date_maintenance" name="date_maintenance[]" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_maintenance">Hora visita</label>
                                <input type="time" id="time_maintenance" name="time_maintenance[]" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id_maintenance">Técnico asignado</label>
                                <select name="technical_id_maintenance[]" id="technical_id_maintenance" class="form-control">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                    <option value="{{$item->id}}">{{$item->cedula}}. {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary_maintenance">Comentarios</label>
                                <input type="text" id="commentary_maintenance" name="commentary_maintenance[]" class="form-control">
                            </div>
                            <hr>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-link btn-add-visit" id="btn_add_maintenance"><i class="fa fa-plus"></i> Agregar visita</button>
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary btn-send">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{asset("js/project/mintic/create.js")}}"></script>
@endsection