@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        CARACTERIZACIÓN DE ACCIDENTES DE TRÁNCITO
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li><a href="#"> Caracterización de accidentes de tráncito</a></li>
        <li class="active">Ver</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Ver caracterización</h3>
            <div class="box-tools">
                <a href="{{route('traffic_accident')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <p>{{$id->date}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="time">Hora</label>
                        <p>{{$id->time}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"> 
                        <label for="event">Evento <small>(Choque, atropellamiento)</small></label>
                        <p>{{$id->event}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="route">Ruta</label>
                        <p>{{$id->route}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="vehicle_id">Vehículo</label>
                        <p>{{ $id->vehicle->plate}} {{ $id->vehicle->brand}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="other_vehicle">Otro vehículo</label>
                        <p>{{$id->other_vehicle}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="position">Oficio <small>(Conductor, mensajero, escolta)</small></label>
                        <p>{{$id->position}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="who">Propio / Tercerizado</label>
                        <p>{{$id->who}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="time_driven">¿Cuántas horas llevaba el conductor laborando antes del accidente?</label>
                        <p>{{$id->time_driven}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="success">Causas</label>
                        <p>{{$id->success}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="body_part">Parte del cuerpo afectada</label>
                        <p>{{$id->body_part}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type_lession">Tipo de lesión</label>
                        <p>{{$id->type_lession}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="days_disabled">N° de días de incapacidad</label>
                        <p>{{$id->days_disabled}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mortal">Accidente mortal del trabajador o contratista de la empresa</label>
                        <p>{{$id->mortal}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="num_victims">Número de víctimas</label>
                        <p>{{$id->num_victims}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="affected_third_parties">Accidente mortal afecta a terceros</label>
                        <p>{{$id->affected_third_parties}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="num_victims2">Número de victimas</label>
                        <p>{{$id->num_victims2}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="actions">Acciones realizadas después del evento</label>
                        <p>{{$id->actions}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection