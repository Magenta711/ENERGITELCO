@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        Editar proyecto MINTIC <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">Editar</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title"> proyecto MINTIC</div>
            <div class="box-tools">
            </div>
        </div>
        <div class="box-body">
            <form id="form_main" method="post" action="{{ route('mintic_update',$id->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="dep">Departamento</label>
                        <select name="dep" id="department" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el departamento" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" value="{{$id->dep}}">
                            <option disabled selected></option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="mun">Municipio</label>
                        <select name="mun" id="municipality" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el municipio" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true" value="{{$id->mun}}">
                            <option disabled selected></option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name">Sede educativa</label>
                        <select name="eb" id="eb" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-placeholder="Selecciona una sede educativa" data-select2-id="5" tabindex="-1" aria-hidden="true" value="{{$id->con_sede}}">
                            <option disabled selected></option>
                        </select>
                    </div>
                    <div class="form-group col-md-6" style="display: none">
                        <label for="station_name">Nombre de la sede educativa</label>
                        <input type="text" value="{{$id->name}}" name="name" id="station_name" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="lat">Latitud</label>
                        <input type="text" id="lat" name="lat" value="{{ $id->lat }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="long">Longitud</label>
                        <input type="text" id="long" name="long" value="{{ $id->long }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="height">Altitud</label>
                        <input type="text" id="height" name="height" value="{{ $id->height }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="code">Id benefiicario</label>
                        <input type="text" id="code" name="code" value="{{ $id->code }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="population">Centro de población</label>
                        <input type="text" id="population" name="population" value="{{ $id->population }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="person_name">Nombre quien atiende la visita</label>
                        <input type="text" id="person_name" name="person_name" value="{{ $id->person_name }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="person_number">Télefono quien atiende la visita</label>
                        <input type="text" id="person_number" name="person_number" value="{{ $id->person_number }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="rector_name">Nombre del rector</label>
                        <input type="text" id="rector_name" name="rector_name" value="{{ $id->rector_name }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="rector_number">Número del rector</label>
                        <input type="text" id="rector_number" name="rector_number" value="{{ $id->rector_number }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="observation">Observaciones</label>
                        <textarea name="observation" id="observation" cols="30" rows="3" class="form-control">{{ $id->observation }}</textarea>
                    </div>
                </div>
                <input type="text" name="value_send" id="value_send" class="hide">
                <hr>
                <h4>Estudio de campo</h4>
                <div id="destino_ec">
                    @php
                        $ec = false;
                    @endphp
                    @foreach ($id->visits as $item)
                        @if ($item->type == "ec")
                            @php
                                $ec = true;
                            @endphp
                            <div class="row" id="origen_ec">
                                <div class="form-group col-sm-6">
                                    <label for="date">Fecha visita</label>
                                    <input type="date" id="date" name="date_ec[]" value="{{$item->date}}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="time">Hora visita</label>
                                    <input type="time" id="time" name="time_ec[]" value="{{$item->time}}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="technical_id_ec">Técnico asignado</label>
                                    <select name="technical_id_ec[]" id="technical_id_ec" class="form-control">
                                        <option disabled selected></option>
                                        @foreach ($users as $user)
                                            <option {{$item->technical_id == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->cedula}}. {{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="commentary">Comentarios</label>
                                    <input type="text" id="commentary" name="commentary_ec[]" value="{{$item->commentary}}" class="form-control">
                                </div>
                                <hr>
                            </div>
                        @endif
                    @endforeach
                    @if (!$ec)
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
                    @endif
                </div>
                <button class="btn btn-sm btn-link btn-add-visit" id="btn_add_ec"><i class="fa fa-plus"></i> Agregar visita</button>
                <hr>
                <h4>Instalación</h4>
                <div id="destino_install">
                    @php
                        $install = false;
                    @endphp
                    @foreach ($id->visits as $item)
                        @if ($item->type == "install")
                            @php
                                $install = true;
                            @endphp
                            <div class="row" id="origen_install">
                                <div class="form-group col-sm-6">
                                    <label for="date_install">Fecha visita</label>
                                    <input type="date" id="date_install" name="date_install[]" value="{{$item->date}}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="time_install">Hora visita</label>
                                    <input type="time" id="time_install" name="time_install[]" value="{{$item->time}}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="technical_id_install">Técnico asignado</label>
                                    <select name="technical_id_install[]" id="technical_id_install" class="form-control">
                                        <option disabled selected></option>
                                        @foreach ($users as $user)
                                            <option {{$item->technical_id == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->cedula}}. {{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="commentary_install">Comentarios</label>
                                    <input type="text" id="commentary_install" name="commentary_install[]" value="{{$item->commentary}}" class="form-control">
                                </div>
                                <hr>
                            </div>
                        @endif
                    @endforeach
                    @if (!$install)
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
                    @endif
                </div>
                <button class="btn btn-sm btn-link btn-add-visit" id="btn_add_install"><i class="fa fa-plus"></i> Agregar visita</button>
                <hr>
                <h4>Integración y/o entrega</h4>
                <div id="destino_integration">
                    @php
                        $integration = false;
                    @endphp
                    @foreach ($id->visits as $item)
                        @if ($item->type == "integration")
                            @php
                                $integration = true;
                            @endphp
                            <div class="row" id="origen_integration">
                                <div class="form-group col-sm-6">
                                    <label for="date_integration">Fecha visita</label>
                                    <input type="date" id="date_integration" name="date_integration[]" value="{{$item->date}}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="time_integration">Hora visita</label>
                                    <input type="time" id="time_integration" name="time_integration[]" value="{{$item->time}}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="technical_id_integration">Técnico asignado</label>
                                    <select name="technical_id_integration[]" id="technical_id_integration" class="form-control">
                                        <option disabled selected></option>
                                        @foreach ($users as $user)
                                            <option {{$item->technical_id == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->cedula}}. {{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="commentary_integration">Comentarios</label>
                                    <input type="text" id="commentary_integration" name="commentary_integration[]" value="{{$item->commentary}}" class="form-control">
                                </div>
                                <hr>
                            </div>
                        @endif
                    @endforeach
                    @if (!$integration)
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
                    @endif
                </div>
                <button class="btn btn-sm btn-link btn-add-visit" id="btn_add_integration"><i class="fa fa-plus"></i> Agregar visita</button>
                <hr>
                <h4>Mantenimiento</h4>
                <div id="destino_maintenance">
                @php
                    $maintenance = false;
                @endphp
                @foreach ($id->visits as $item)
                    @if ($item->type == "maintenance")
                        @php
                            $maintenance = true;
                        @endphp
                            <div class="row" id="origen_maintenance">
                                <div class="form-group col-sm-6">
                                    <label for="date_maintenance">Fecha visita</label>
                                    <input type="date" id="date_maintenance" name="date_maintenance[]" value="{{$item->date}}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="time_maintenance">Hora visita</label>
                                    <input type="time" id="time_maintenance" name="time_maintenance[]" value="{{$item->time}}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="technical_id_maintenance">Técnico asignado</label>
                                    <select name="technical_id_maintenance[]" id="technical_id_maintenance" class="form-control">
                                        <option disabled selected></option>
                                        @foreach ($users as $user)
                                            <option {{$item->technical_id == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->cedula}}. {{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="commentary_maintenance">Comentarios</label>
                                    <input type="text" id="commentary_maintenance" name="commentary_maintenance[]" value="{{$item->commentary}}" class="form-control">
                                </div>
                                <hr>
                            </div>
                        @endif
                    @endforeach
                    @if (!$maintenance)
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
                    @endif
                </div>
                <button class="btn btn-sm btn-link btn-add-visit" id="btn_add_maintenance"><i class="fa fa-plus"></i> Agregar visita</button>
            </form>
        </div>
        <div class="box-footer">
            <button onclick="document.getElementById('value_send').value = 'Guardar';document.getElementById('form_main').submit();" class="btn btn-sm btn-success btn-send">Guardar</button>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{asset("js/project/mintic/edit.js")}}"></script>
@endsection