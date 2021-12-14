@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        MULTAS DE tránsito
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li><a href="#"> Multas de tránsito</a></li>
        <li class="active">Editar</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reporte de comparendos y fotomultas e histórico de los mismos</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Fecha de inicio</label>
                            <p>{{$id->start_date}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">Fecha de fin</label>
                            <p>{{$id->end_date}}</p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-hover">
                    <table class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Placa - Marca</th>
                                <th scope="col">Número de multas</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                            <tr>
                                <th scope="row">{{ $vehicle->id }}</th>
                                <td>{{ $vehicle->plate }} - {{$vehicle->brand}}</td>
                                <td>
                                    @php
                                        $count = 0;
                                        foreach ($vehicle->reports_drivers as $item){
                                            $count++;
                                        }
                                        echo $count;
                                    @endphp
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$vehicle->id}}">Multas</button>
                                    <div class="modal fade" id="delete_{{$vehicle->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title">Reportes de {{$vehicle->plate}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    @php
                                                        $report = false;
                                                    @endphp
                                                    <div id="report_destino_{{$vehicle->id}}">
                                                    @foreach ($vehicle->reports_drivers as $item)
                                                        @php
                                                            $report = true;
                                                        @endphp
                                                            <div class="row" id="report_origen_{{$vehicle->id}}">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="report_date">Fecha</label>
                                                                        <p>{{$item->date}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="report_city">Ciudad</label>
                                                                        <p>{{$item->city}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 text-right">
                                                                    <i class="fa fa-trash remove_block"></i>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_driver_id">Conductor</label>
                                                                        {{$item->user->name}}
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
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    {{-- <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button> --}}
                                                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection