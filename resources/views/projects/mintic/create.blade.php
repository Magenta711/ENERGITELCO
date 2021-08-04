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
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title"> Proyecto MINTIC</div>
            <div class="box-tools">
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
                            <select name="eb" id="eb" class="form-control select2 select2-hidden-accessible" disabled style="width: 100%;" data-placeholder="Selecciona una sede educativa" data-select2-id="5" tabindex="-1" aria-hidden="true">
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
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="date">Fecha visita</label>
                                <input type="date" id="date" name="date" value="{{ old('date') ?? now()->format('Y-m-d') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time">Hora visita</label>
                                <input type="time" id="time" name="time" value="{{ old('time') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id">Técnico asignado</label>
                                <select name="technical_id" id="technical_id" class="form-control">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                    <option {{ old('technical_id') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->cedula}}. {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary">Comentarios</label>
                                <input type="text" id="commentary" name="commentary" value="{{ old('commentary') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-link" id="btn_add_ec"><i class="fa fa-plus"></i> Agregar visita</button>
                    <hr>
                    <h4>Instalación</h4>
                    <div id="destino-install">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="date_install">Fecha visita</label>
                                <input type="date" id="date_install" name="date_install" value="{{ old('date_install') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_install">Hora visita</label>
                                <input type="time" id="time_install" name="time_install" value="{{ old('time_install') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id">Técnico asignado</label>
                                <select name="technical_id" id="technical_id" class="form-control">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                    <option {{ old('technical_id') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->cedula}}. {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary">Comentarios</label>
                                <input type="text" id="commentary" name="commentary" value="{{ old('commentary') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-link" id="btn_add_install"><i class="fa fa-plus"></i> Agregar visita</button>
                    <hr>
                    <h4>Itegración y/o entrega</h4>
                    <div id="destino-integration">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="date_install">Fecha visita</label>
                                <input type="date" id="date_install" name="date_install" value="{{ old('date_install') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_install">Hora visita</label>
                                <input type="time" id="time_install" name="time_install" value="{{ old('time_install') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id">Técnico asignado</label>
                                <select name="technical_id" id="technical_id" class="form-control">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                    <option {{ old('technical_id') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->cedula}}. {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary">Comentarios</label>
                                <input type="text" id="commentary" name="commentary" value="{{ old('commentary') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-link" id="btn-add-integration"><i class="fa fa-plus"></i> Agregar visita</button>
                    <hr>
                    <h4>Mantenimiento</h4>
                    <div id="destino-maintenance">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="date_install">Fecha visita</label>
                                <input type="date" id="date_install" name="date_install" value="{{ old('date_install') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_install">Hora visita</label>
                                <input type="time" id="time_install" name="time_install" value="{{ old('time_install') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id">Técnico asignado</label>
                                <select name="technical_id" id="technical_id" class="form-control">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                    <option {{ old('technical_id') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->cedula}}. {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary">Comentarios</label>
                                <input type="text" id="commentary" name="commentary" value="{{ old('commentary') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-link" id="btn-add-maintenance"><i class="fa fa-plus"></i> Agregar visita</button>
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
    <script>
        $(document).ready(function() {
            const cd = '/json/ec01wxyb1-4adc2.json';

            const request = new XMLHttpRequest();

            request.open('GET', cd);
            request.responseType = 'json';
            request.send();

            request.onload = function() {
                selectDep(request.response);
            }

            $('#eb').change(function(){
                if (this.value == 0) {
                    $('#station_name').parent().show();
                    $('#station_name').val('');
                    $('#lat').val('');
                    $('#long').val('');
                }else {
                    $('.station-other').hide();
                    $('#station_name').val('');
                    $('#lat').val('');
                    $('#long').val('');
                }
            });

            $(".select2").select2();

        });
        
        function selectDep(response) {
            data = [];
            response.CD.forEach(element => {
                data.push({
                    id: element.DEPARTAMENTO.toUpperCase(),
                    text: element.DEPARTAMENTO.toUpperCase()
                });
            });
            dataMap = data.map(item=>{
                return [item.id,item]
            });
            dataMapArr = new Map(dataMap)
            unicos = [...dataMapArr.values()];
            unicos.sort(GetSortOrder("text"));
            $("#department").select2({
                data: unicos
            }).change(function () {
                $('#municipality').prop('disabled',false);
                $("#eb").empty().prop('disabled',true);;
                selectMunicipaly(this.value,response);
            });
        }

        function selectMunicipaly(value,response) {
            data = [];
            response.CD.forEach(element => {
                if (element.DEPARTAMENTO.toUpperCase() == value) {
                    data.push({
                        id: element.MUNICIPIOANM.toUpperCase(),
                        text: element.MUNICIPIOANM.toUpperCase()
                    });
                }
            });
            dataMap = data.map(item=>{
                return [item.id,item]
            });
            dataMapArr = new Map(dataMap)
            unicos = [...dataMapArr.values()];
            unicos.unshift({
                id: '',
                text: '',
                disabled: true,
                selected: true
            });
            unicos.sort(GetSortOrder("text"));
            $("#municipality").empty()
            $("#municipality").select2({
                data: unicos
            }).change(function () {
                $('#eb').prop('disabled',false);
                selectEB(this.value,response);
            });
        }

        function selectEB(value,response) {
            data = [];
            response.CD.forEach(element => {
                if (element.MUNICIPIOANM.toUpperCase() == value) {
                    data.push({
                        id: element.Consecutivo_Sede,
                        text: (element.INSTITUCIÓN_EDUCATIVA+' '+element.NOMBRE_SEDE).toUpperCase()
                    });
                }
            });
            dataMap = data.map(item=>{
                return [item.id,item]
            });
            dataMapArr = new Map(dataMap)
            unicos = [...dataMapArr.values()];
            
            unicos.sort(GetSortOrder("text"));
            unicos.unshift({
                id: 0,
                text: "OTRA"
            });
            unicos.unshift({
                id: '',
                text: '',
                disabled: true,
                selected: true
            });
            $("#eb").empty();
            $("#eb").select2({
                data: unicos
            }).change(function () {
                $('#eb').prop('disabled',false);
                selectLocation(this.value,response);
            });
        }

        function selectLocation(value,response) {
            response.CD.forEach(element => {
                if (element.Consecutivo_Sede == value) {
                    $('#station_name').val(element.NOMBRE_SEDE);
                    $('#lat').val(element.Latitud);
                    $('#long').val(element.LONGITUD);
                    $('#code').val(element.ID_BENEFICIARIO);
                    $('#population').val(element.CENTRO_POBLADO);
                }
            });
        }

        function GetSortOrder(prop) {
            return function(a, b) {
                if (a[prop] > b[prop]) {
                    return 1;
                } else if (a[prop] < b[prop]) {    
                    return -1;
                }
                return 0;
            }
        }
    </script>
@endsection