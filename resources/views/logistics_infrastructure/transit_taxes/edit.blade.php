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
            <form action="{{route('transit_taxes_update',$id->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Fecha de inicio</label>
                            <input type="date" name="start_date" value="{{$id->start_date}}" id="start_date" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">Fecha de fin</label>
                            <input type="date" name="end_date" value="{{$id->end_date}}" id="end_date" class="form-control" readonly>
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
                                            if ($item->date >= $id->start_date && $item->date < $id->end_date && $item->type == 'summons') {
                                                $count++;
                                            }
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
                                                    @foreach ($vehicle->reports as $item)
                                                        @if ($id->start_date <= $item->date && $id->end_date >= $item->date)
                                                            @php
                                                                $report = true;
                                                            @endphp
                                                            <div class="row" id="report_origen_{{$vehicle->id}}">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="report_date_{{$vehicle->id}}">Fecha</label>
                                                                        <input type="date" name="report_date[{{$vehicle->id}}][]" value="{{$item->date}}" id="report_date_{{$vehicle->id}}" class="form-control report_date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="report_city_{{$vehicle->id}}">Ciudad</label>
                                                                        <input type="text" name="report_city[{{$vehicle->id}}][]" value="{{$item->city}}" id="report_city_{{$vehicle->id}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 text-right">
                                                                    <i class="fa fa-trash remove_block"></i>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_status_{{$vehicle->id}}">Estado</label>
                                                                        <select name="report_status[{{$vehicle->id}}][]" id="report_status_{{$vehicle->id}}" class="form-control">
                                                                            <option selected disabled></option>
                                                                            <option {{$item->status == 0 ? 'selected' : ''}} value="0">Pendiente de pago</option>
                                                                            <option {{$item->status == 1 ? 'selected' : ''}} value="1">Pago</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_driver_id_{{$vehicle->id}}">Conductor</label>
                                                                        <select name="report_driver_id[{{$vehicle->id}}][]" id="report_driver_id_{{$vehicle->id}}" class="form-control">
                                                                            <option selected disabled></option>
                                                                            @foreach ($users as $user)
                                                                                <option {{$item->driver_id == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_suject_{{$vehicle->id}}">Motivo</label>
                                                                        <textarea name="report_suject[{{$vehicle->id}}][]" id="report_suject_{{$vehicle->id}}" cols="30" rows="3" class="form-control">{{$item->suject}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_observation_{{$vehicle->id}}">Observaciones</label>
                                                                        <textarea name="report_observation[{{$vehicle->id}}][]" id="report_observation_{{$vehicle->id}}" cols="30" rows="3" class="form-control">{{$item->observation}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                    @if (!$report)
                                                            <div class="row" id="report_origen_{{$vehicle->id}}">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="report_date_{{$vehicle->id}}">Fecha</label>
                                                                        <input type="date" name="report_date[{{$vehicle->id}}][]" id="report_date_{{$vehicle->id}}" class="form-control report_date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="report_city_{{$vehicle->id}}">Ciudad</label>
                                                                        <input type="text" name="report_city[{{$vehicle->id}}][]" id="report_city_{{$vehicle->id}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 text-right">
                                                                    <i class="fa fa-trash remove_block"></i>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_status_{{$vehicle->id}}">Estado</label>
                                                                        <select name="report_status[{{$vehicle->id}}][]" id="report_status_{{$vehicle->id}}" class="form-control">
                                                                            <option selected disabled></option>
                                                                            <option value="0">Pendiente de pago</option>
                                                                            <option value="1">Pago</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_driver_id_{{$vehicle->id}}">Conductor</label>
                                                                        <select name="report_driver_id[{{$vehicle->id}}][]" id="report_driver_id_{{$vehicle->id}}" class="form-control">
                                                                            <option selected disabled></option>
                                                                            @foreach ($users as $user)
                                                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_suject_{{$vehicle->id}}">Motivo</label>
                                                                        <textarea name="report_suject[{{$vehicle->id}}][]" id="report_suject_{{$vehicle->id}}" cols="30" rows="3" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="report_observation_{{$vehicle->id}}">Observaciones</label>
                                                                        <textarea name="report_observation[{{$vehicle->id}}][]" id="report_observation_{{$vehicle->id}}" cols="30" rows="3" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endif
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-link btn-add-block" id="report_add_{{$vehicle->id}}"><i class="fa fa-plus"></i> Agregar reporte</button>
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
            <div class="box-footer">
                <button class="btn btn-sm btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.btn-add-block').click(function () {
                let id = this.id.split('_')[this.id.split('_').length - 1];
                let newELement = $('#report_origen_'+id).clone().appendTo('#report_destino_'+id);
                newELement.find('input').val('');
                newELement.find('select').val('');
                newELement.find('textarea').val('');
            });
            // $('.report_date').blur(function () {
            //     let start = $('#start_date').val();
            //     let end = $('#end_date').val();
            //     let date = this.value;

            //     if (start <= date && end >= date) {
            //         console.log('Permitido');
            //     }else {
            //         console.log('No permitido');
            //         $(this).val('');
            //     }
            // });
        });
    </script>
@endsection