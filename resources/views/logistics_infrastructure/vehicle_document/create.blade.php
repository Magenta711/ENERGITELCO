@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        CARACTERIZACIÓN DE ACCIDENTES DE TRÁNSITO
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li><a href="#"> Caracterización de accidentes de tránsito</a></li>
        <li class="active">Crear</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Crear caracterización</h3>
                <div class="box-tools">
                    <a href="{{route('traffic_accident')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('traffic_accident_store')}}" method="post">
                @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Vehículo</label>
                            <select name="vehicle_id" id="vehicle_id" class="form-control">
                                <option disabled selected></option>
                                @foreach ($vehicles as $vehicle)
                                    <option {{ old('vehicle_id') == $vehicle->id ? 'selected' : ''}} value="{{$vehicle->id}}">{{$vehicle->plate}} {{$vehicle->brand}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="time">Hora</label>
                            <input type="time" class="form-control" name="time" id="time">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label for="event">Evento <small>(Choque, atropellamiento)</small></label>
                            <input type="text" class="form-control" name="event" id="event">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="route">Ruta</label>
                            <input type="text" class="form-control" name="route" id="route">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="vehicle_id">Vehículo</label>
                            <select name="vehicle_id" id="vehicle_id" class="form-control">
                                <option disabled selected></option>
                                @foreach ($vehicles as $vehicle)
                                    <option {{ old('vehicle_id') == $vehicle->id ? 'selected' : ''}} value="{{$vehicle->id}}">{{$vehicle->plate}} {{$vehicle->brand}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="other_vehicle">Otro vehículo</label>
                            <input type="text" class="form-control" name="other_vehicle" id="other_vehicle">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Oficio <small>(Conductor, mensajero, escolta)</small></label>
                            <input type="text" class="form-control" name="position" id="position">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="who">Propio / Tercerizado</label>
                            <input type="text" class="form-control" name="who" id="who">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="time_driven">¿Cuántas horas llevaba el conductor laborando antes del accidente?</label>
                            <input type="text" class="form-control" name="time_driven" id="time_driven">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="success">Causas</label>
                            <input type="text" class="form-control" name="success" id="success">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="body_part">Parte del cuerpo afectada</label>
                            <input type="text" class="form-control" name="body_part" id="body_part">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type_lession">Tipo de lesión</label>
                            <input type="text" class="form-control" name="type_lession" id="type_lession">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="days_disabled">N° de días de incapacidad</label>
                            <input type="text" class="form-control" name="days_disabled" id="days_disabled">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mortal">Accidente mortal del trabajador o contratista de la empresa</label>
                            <input type="text" class="form-control" name="mortal" id="mortal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="num_victims">Número de víctimas</label>
                            <input type="text" class="form-control" name="num_victims" id="num_victims">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="affected_third_parties">Accidente mortal afecta a terceros</label>
                            <input type="text" class="form-control" name="affected_third_parties" id="affected_third_parties">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="num_victims2">Número de victimas</label>
                            <input type="text" class="form-control" name="num_victims2" id="num_victims2">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="actions">Acciones realizadas después del evento</label>
                            <textarea name="actions" cols="30" rows="3" class="form-control" id="actions"></textarea>
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