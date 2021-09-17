@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        REPORTE DE NOVEDADES DE NOMINA Y HORAS EXTRAS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">REPORTE DE NOVEDADES DE NOMINA Y HORAS EXTRAS</li>
    </ol>
</section>
<section class="content">
    <div class="hide">
        @php
            $months = ['0',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];                             
        @endphp
    </div>
    @include('includes.alerts')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="month">Periodo de pago</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>{{ $id->start_date }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>{{ $id->end_date }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="box-group" id="accordion">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th>/</th> --}}
                                        <th>Cédula</th>
                                        <th>Nombre</th>
                                        <th>Total neto a pagar</th>
                                        <th>Estado</th>
                                        <th>/</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($id->users as $user)
                                        <tr>
                                            {{-- <th>{{ $user->user_id }}</th> --}}
                                            <th>{{$user->user->cedula}}</th>
                                            <td>{{$user->user->name}}</td>
                                            <td id="total_pay_td_{{ $user->user_id }}">$ {{number_format(( $user->total_pay_user ),2,',','.')}}</td>
                                            <td>
                                                <span id="status_{{ $user->user_id }}" class="label {{ $user->status == 1 ? 'bg-green' : 'bg-red'}}">{{ $user->status == 1 ? 'Listo' : 'Pendiente'}}</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$user->user_id}}">Ver</button>
                                                {{-- Modal description --}}
                                                <div class="modal fade" id="modal_edit_{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="exampleModalLongTitle">{{$user->user->name}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="linked_days_{{$user->user_id}}">Días vinculados</label>
                                                                            <p>{{$user->linked_days}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="license_days_{{$user->user_id}}">Días de licencia</label>
                                                                            <p>{{$user->license_days}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="days_settle_{{$user->user_id}}">Número de días a liquidar</label>
                                                                            <p>{{$user->settle_days}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>TIEMPO TRABAJADO</th>
                                                                                <th>VALOR SALARIAL</th>
                                                                                <th>VALOR HORAS EXTRAS</th>
                                                                                <th>AUXILIO DE TRANSPORTE</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($user->months as $item)
                                                                                <tr class="tr-months tr_month_{{$item->month}}">
                                                                                    <th>{{$months[$item->month]}}</th>
                                                                                    <td>{{ $item->salary_month }}</td>
                                                                                    <td>{{ $item->extras_month }}</td>
                                                                                    <td>{{ $item->assistance_month }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            @for ($i = 1; $i < count($months); $i++)
                                                                            @endfor
                                                                            <tr>
                                                                                <th>Total devengado</th>
                                                                                <td>
                                                                                    {{$user->total_devengado_salary }}
                                                                                </td>
                                                                                <td>
                                                                                    {{$user->total_devengado_extras }}
                                                                                </td>
                                                                                <td>
                                                                                    {{$user->total_devengado_assistance }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Promedio</th>
                                                                                <td>
                                                                                    {{$user->average_salary }}
                                                                                </td>
                                                                                <td>
                                                                                    {{$user->average_extras }}
                                                                                </td>
                                                                                <td>
                                                                                    {{$user->average_assistance }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <h3>Total neto a pagar</h3>
                                                                <span id="total_pay_{{ $user->user_id }}">$ {{number_format(( $user->total_pay_user ),2,',','.')}}</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {{-- <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button> --}}
                                                                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="table-responsive">
                                <h4>Totales</h4>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Total empleados</th>
                                            <th>Total neto a pagar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span id="total_employees_tx">{{$id->total_employees}}</span>
                                                </td>
                                                <th>
                                                    <h4><span id="total_pay_tx">$ {{number_format($id->total_pay,2,',','.')}}</span></h4>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection