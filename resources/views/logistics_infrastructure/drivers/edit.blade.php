@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        L-FR-18 CONTROL DE DOCUMENTACIÓN DE CONDUCTORES
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li class="active">Documentación de conductores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de controles de documentos de conductores</h3>
                <div class="box-tools">
                    <a href="{{route('drivers')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('drivers_update',$id->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="box-body">
                <div class="row" id="div_user">
                    <div class="col-md-3">
                        <label for="users_id">Número de documento</label>
                        <select name="user_id" id="users_id" class="form-control select_user">
                            <option disabled selected></option>
                            @foreach ($users as $user)
                                <option {{ ($id->user_id == $user->id) ? 'selected' : '' }} value="{{$user->id}}">{!!$user->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$user->name!!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <input type="text" name="city" id="city" value="{{$id->city}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="effective_date">Fecha de vigencia</label>
                            <input type="date" name="effective_date" id="effective_date" value="{{$id->effective_date}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category">Categoría de licencia de conducción</label>
                            <input type="text" name="category" id="category" value="{{$id->category}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="runt">Inscripción ante el RUNT</label>
                            <input type="text" name="runt" id="runt" value="{{$id->runt}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="experience">Experiencia en conducción (años)</label>
                            <input type="number" name="experience" id="experience" value="{{$id->experience}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tipo de vehículo que conduce</label> <br>
                            <label for="moto"><input type="checkbox" name="moto" id="moto" {{$id->moto ? 'checked' : '' }} value="1"> Moto</label>
                            <label for="car"><input type="checkbox" name="car" id="car" {{$id->car ? 'checked' : '' }} value="1"> Carro</label>
                        </div>
                    </div>
                    <hr>
                </div>
                <h4>Reporte de comparendos y fotomultas e histórico de los mismos</h4>
                <div id="report_destino">
                    @forelse ($id->reports as $item)
                        <div class="row" id="report_origen">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="report_date">Fecha</label>
                                    <input type="date" name="report_date[]" value="{{$item->date}}" id="report_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="report_city">Ciudad</label>
                                    <input type="text" name="report_city[]" value="{{$item->city}}" id="report_city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="report_vehicle">Vehículos</label>
                                    <select name="report_vehicle[]" id="report_vehicle" class="form-control">
                                        <option selected disabled></option>
                                        <option {{$item->vehicle_id == 0 ? 'selected' : ''}} value="0">Otro</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option {{$item->vehicle_id == $vehicle->id ? 'selected' : ''}} value="{{$vehicle->id}}">{{$vehicle->plate}} {{$vehicle->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="report_suject">Motivo</label>
                                    <textarea name="report_suject[]" value="{{$item->suject}}" id="report_suject" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="report_observation">Observaciones</label>
                                    <textarea name="report_observation[]" value="{{$item->observation}}" id="report_observation" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="row" id="report_origen">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="report_date">Fecha</label>
                                    <input type="date" name="report_date[]" id="report_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="report_city">Ciudad</label>
                                    <input type="text" name="report_city[]" id="report_city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="report_vehicle">Vehículos</label>
                                    <select name="report_vehicle[]" id="report_vehicle" class="form-control">
                                        <option selected disabled></option>
                                        <option value="0">Otro</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{$vehicle->id}}">{{$vehicle->plate}} {{$vehicle->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="report_status">Estado</label>
                                    <select name="report_status[{{$vehicle->id}}][]" id="report_status_{{$vehicle->id}}" class="form-control">
                                        <option selected disabled></option>
                                        <option value="0">Pendiente de pago</option>
                                        <option value="1">Pago</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="report_suject">Motivo</label>
                                    <textarea name="report_suject[]" id="report_suject" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="report_observation">Observaciones</label>
                                    <textarea name="report_observation[]" id="report_observation" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforelse
                </div>
                <button type="button" class="btn btn-sm btn-link btn-add-block" id="report_add"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Control de ingreso de conductores con deudas de comparendos y fotomultas</h4>
                <div id="control_destino">
                    @forelse ($id->controls as $item)
                        <div class="row" id="control_origen">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="control_date">Fecha</label>
                                    <input type="date" name="control_date[]" value="{{$id->date}}" id="control_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control_city">Ciudad</label>
                                    <input type="text" name="control_city[]" value="{{$id->city}}" id="control_city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control_vehicle">Vehículos</label>
                                    <select name="control_vehicle[]" id="control_vehicle" class="form-control">
                                        <option selected disabled></option>
                                        <option {{$item->vehicle_id == 0 ? 'selected' : ''}} value="0">Otro</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option {{$item->vehicle_id && $vehicle->id ? 'selected' : ''}} value="{{$vehicle->id}}">{{$vehicle->plate}} {{$vehicle->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="control_suject">Motivo</label>
                                    <textarea name="control_suject[]" value="{{$id->suject}}" id="control_suject" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="control_observation">Observaciones</label>
                                    <textarea name="control_observation[]" value="{{$id->observation}}" id="control_observation" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row" id="control_origen">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="control_date">Fecha</label>
                                    <input type="date" name="control_date[]" id="control_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control_city">Ciudad</label>
                                    <input type="text" name="control_city[]" id="control_city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="control_vehicle">Vehículos</label>
                                    <select name="control_vehicle[]" id="control_vehicle" class="form-control">
                                        <option selected disabled></option>
                                        <option value="0">Otro</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{$vehicle->id}}">{{$vehicle->plate}} {{$vehicle->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="control_suject">Motivo</label>
                                    <textarea name="control_suject[]" id="control_suject" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="control_observation">Observaciones</label>
                                    <textarea name="control_observation[]" id="control_observation" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforelse
                </div>
                <button type="button" class="btn btn-sm btn-link btn-add-block" id="control_add"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Reporte de accidentes</h4>
                <div id="accident_destino">
                    @forelse ($id->accidents as $item)
                        <div class="row" id="accident_origen">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="accident_date">Fecha</label>
                                    <input type="date" name="accident_date[]" value="{{$id->date}}" id="accident_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="accident_city">Ciudad</label>
                                    <input type="text" name="accident_city[]" value="{{$id->city}}" id="accident_city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="accident_vehicle">Vehículos</label>
                                    <select name="accident_vehicle[]" id="accident_vehicle" class="form-control">
                                        <option selected disabled></option>
                                        <option value="0">Otro</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option {{$vehicle->id == $item->vehicle_id ? 'selected' : ''}} value="{{$vehicle->id}}">{{$vehicle->plate}} {{$vehicle->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="accident_zone">Rural/Urbano</label>
                                    <textarea name="accident_zone[]" value="{{$id->zone}}" id="accident_zone" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="accident_details">Detalles</label>
                                    <textarea name="accident_details[]" value="{{$id->details}}" id="accident_details" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="row" id="accident_origen">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="accident_date">Fecha</label>
                                    <input type="date" name="accident_date[]" id="accident_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="accident_city">Ciudad</label>
                                    <input type="text" name="accident_city[]" id="accident_city" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="accident_vehicle">Vehículos</label>
                                    <select name="accident_vehicle[]" id="accident_vehicle" class="form-control">
                                        <option selected disabled></option>
                                        <option value="0">Otro</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{$vehicle->id}}">{{$vehicle->plate}} {{$vehicle->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="accident_zone">Rural/Urbano</label>
                                    <textarea name="accident_zone[]" id="accident_zone" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="accident_details">Detalles</label>
                                    <textarea name="accident_details[]" id="accident_details" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforelse
                </div>
                <button type="button" class="btn btn-sm btn-link btn-add-block" id="accident_add"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h3>Acciones realizadas en seguridad vial</h3>
                <hr>
                <h4>Exámenes físicos, de alcohol y drogas psicoactiva</h4>
                <div id="exam_destino">
                    @forelse ($id->exams as $item)
                        <div class="row" id="exam_origen">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exam_type">Tipo de examen</label>
                                    <input type="text" name="exam_type[]" value="{{$id->type}}" id="exam_type" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exam_date">Fecha</label>
                                    <input type="date" name="exam_date[]" value="{{$id->date}}" id="exam_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exam_result">Resultado</label>
                                    <textarea name="exam_result[]" value="{{$id->result}}" id="exam_result" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exam_commentary">Comentarios</label>
                                    <textarea name="exam_commentary[]" value="{{$id->commentary}}" id="exam_commentary" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="row" id="exam_origen">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exam_type">Tipo de examen</label>
                                    <input type="text" name="exam_type[]" id="exam_type" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exam_date">Fecha</label>
                                    <input type="date" name="exam_date[]" id="exam_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exam_result">Resultado</label>
                                    <textarea name="exam_result[]" id="exam_result" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exam_commentary">Comentarios</label>
                                    <textarea name="exam_commentary[]" id="exam_commentary" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforelse
                </div>
                <button type="button" class="btn btn-sm btn-link btn-add-block" id="exam_add"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Pruebas teóricas y prácticas realizadas</h4>
                <div id="test_destino">
                    @forelse ($id->tests as $item)
                        <div class="row" id="test_origen">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="test_type">Tipo de examen</label>
                                    <input type="text" name="test_type[]" value="{{$item->type}}" id="test_type" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="test_date">Fecha</label>
                                    <input type="date" name="test_date[]" value="{{$item->date}}" id="test_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="test_result">Resultado</label>
                                    <textarea name="test_result[]" value="{{$item->result}}" id="test_result" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="test_commentary">Comentarios</label>
                                    <textarea name="test_commentary[]" value="{{$item->commentary}}" id="test_commentary" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="row" id="test_origen">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="test_type">Tipo de examen</label>
                                    <input type="text" name="test_type[]" id="test_type" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="test_date">Fecha</label>
                                    <input type="date" name="test_date[]" id="test_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="test_result">Resultado</label>
                                    <textarea name="test_result[]" id="test_result" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="test_commentary">Comentarios</label>
                                    <textarea name="test_commentary[]" id="test_commentary" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforelse
                </div>
                <button type="button" class="btn btn-sm btn-link btn-add-block" id="test_add"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Capacitaciones recibidas</h4>
                <div id="training_destino">
                    @forelse ($id->trainings as $item)
                        <div class="row" id="training_origen">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_date">Fecha</label>
                                    <input type="date" name="training_date[]" value="{{$item->date}}" id="training_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_theme">Tema</label>
                                    <input type="text" name="training_theme[]" value="{{$item->theme}}" id="training_theme" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_facilitator">Facilitador</label>
                                    <input type="text" name="training_facilitator[]" value="{{$item->facilitator}}" id="training_facilitator" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="training_duration">Duración</label>
                                    <input type="text" name="training_duration[]" value="{{$item->duration}}" id="training_duration" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="training_observation">Observaciones</label>
                                    <textarea name="training_observation[]" value="{{$item->observation}}" id="training_observation" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="row" id="training_origen">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_date">Fecha</label>
                                    <input type="date" name="training_date[]" id="training_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_theme">Tema</label>
                                    <input type="text" name="training_theme[]" id="training_theme" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="training_facilitator">Facilitador</label>
                                    <input type="text" name="training_facilitator[]" id="training_facilitator" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="training_duration">Duración</label>
                                    <input type="text" name="training_duration[]" id="training_duration" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <i class="fa fa-trash remove_block"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="training_observation">Observaciones</label>
                                    <textarea name="training_observation[]" id="training_observation" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforelse
                </div>
                <button type="button" class="btn btn-sm btn-link btn-add-block" id="training_add"><i class="fa fa-plus"></i> Agregar reporte</button>
            </div>
            <div class="box-footer">
                <button class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </div>
        </form>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            incre=0;
            $('.btn-add-block').click(function () {
                let type = this.id.split('_')[0];
                incre++;
                let newELement = $('#'+type+'_origen').clone().appendTo('#'+type+'_destino').attr('id',type+'_origen_'+incre);
                newELement.children('.col-md-1').children('i').click(function () {
                    $(this).parent().parent().remove();
                });
                $('#'+type+'_origen_'+incre+' input').val('');
            })
        })
    </script>
@endsection