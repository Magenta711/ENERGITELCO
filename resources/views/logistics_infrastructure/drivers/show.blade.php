@php
    function getAge($birthDate)
    {
        $birthDate = explode("-", $birthDate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
        ? ((date("Y") - intval($birthDate[0])))
        : (date("Y") - intval($birthDate[0])) - 1);

        return $age;
    }
@endphp

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
                <h3 class="box-title">Ver control de documentos de conductores</h3>
                <div class="box-tools">
                    <a href="{{route('drivers')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row" id="div_user">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="city">Fecha</label>
                            <p>{{$id->created_at}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <p>{{$id->city}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="users_id">Número de documento</label>
                        <p>{{$id->user->cedula}}</p>
                    </div>
                    <div class="col-md-3">
                        <label for="users_id">Nombres y apellidos</label>
                        <p>{{$id->user->name}}</p>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category">Categoría de licencia de conducción</label>
                            <p>{{$id->category}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tipo de vehículo que conduce</label> <br>
                            <p>{{$id->moto ? 'Moto' : '' }} {{$id->car ? 'Carro' : '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="effective_date">Fecha de vigencia</label>
                            <p>{{$id->effective_date}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="users_id">Edad</label>
                        <p>{{getAge($id->user->register->date_birth)}}</p>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="runt">Inscripción ante el RUNT</label>
                            <p>{{$id->runt}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="experience">Experiencia en conducción (años)</label>
                            <p>{{$id->experience}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Reporte de comparendos y fotomultas e histórico de los mismos</h4>
                <div id="report_destino">
                @foreach ($id->reports as $item)
                    <div class="row" id="report_origen">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="report_date">Fecha</label>
                                <p>{{$item->date}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="report_city">Ciudad</label>
                                <p>{{$item->city}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="report_vehicle">Vehículos</label>
                                <p>{{$item->plate}} - {{$item->vehicle->brand}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="report_suject">Motivo</label>
                                <p>{{$item->suject}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="report_observation">Observaciones</label>
                                <p>{{$item->observation}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <h4>Control de ingreso de conductores con deudas de comparendos y fotomultas</h4>
                @foreach ($id->controls as $item)
                    <div class="row" id="control_origen">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="control_date">Fecha</label>
                                <p>{{$id->date}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="control_city">Ciudad</label>
                                <p>{{$id->city}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="control_vehicle">Vehículos</label>
                                <p>{{$item->vehicle->plate}} - {{$item->vehicle->brand}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="control_suject">Motivo</label>
                                <p>{{$id->suject}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="control_observation">Observaciones</label>
                                <p>{{$id->observation}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <h4>Reporte de accidentes</h4>
                @foreach ($id->accidents as $item)
                    <div class="row" id="accident_origen">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="accident_date">Fecha</label>
                                <p>{{$id->date}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="accident_city">Ciudad</label>
                                <p>{{$id->city}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="accident_vehicle">Vehículos</label>
                                <p>{{$item->vehicle->plate}} - {{$item->vehicle->brand}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="accident_zone">Rural/Urbano</label>
                                <p>{{$id->zone}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="accident_details">Detalles</label>
                                <p>{{$id->details}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <h3>Acciones realizadas en seguridad vial</h3>
                <hr>
                <h4>Exámenes físicos, de alcohol y drogas psicoactiva</h4>
                @foreach ($id->exams as $item)
                    <div class="row" id="exam_origen">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exam_type">Tipo de examen</label>
                                <p>{{$id->type}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exam_date">Fecha</label>
                                <p>{{$id->date}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exam_result">Resultado</label>
                                <p>{{$id->result}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exam_commentary">Comentarios</label>
                                <p>{{$id->commentary}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <h4>Pruebas teóricas y prácticas realizadas</h4>
                @foreach ($id->tests as $item)
                    <div class="row" id="test_origen">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="test_type">Tipo de examen</label>
                                <p>{{$item->type}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="test_date">Fecha</label>
                                <p>{{$item->date}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="test_result">Resultado</label>
                                <p>{{$item->result}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="test_commentary">Comentarios</label>
                                <p>{{$item->commentary}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <h4>Capacitaciones recibidas</h4>
                <div id="training_destino">
                @foreach ($id->trainings as $item)
                    <div class="row" id="training_origen">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="training_date">Fecha</label>
                                <p>{{$item->date}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="training_theme">Tema</label>
                                <p>{{$item->theme}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="training_facilitator">Facilitador</label>
                                <p>{{$item->facilitator}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="training_duration">Duración</label>
                                <p>{{$item->duration}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="training_observation">Observaciones</label>
                                <p>{{$item->observation}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </section>
@endsection