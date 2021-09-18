@extends('lte.layouts')

@php
     function showMonth($month,$start,$end)
    {
        $x = intval(explode('-',$start)[1]);
        $y = intval(explode('-',$end)[1]);
        $m = intval($month);
        if ($m >= $x && $m <= $y) {
            return false;
        }
        return true;
    }
@endphp

@section('content')
<section class="content-header">
    <h1>
        Prima de servicios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Prima de servicios</li>
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
                                                                                <tr class="tr-months tr_month_{{$item->month}}" {{ showMonth($item->month,$id->start_date,$id->end_date) ? 'style=display:none' : ''}}>
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
                    @if ($id->estado == 'Sin aprobar')
                    <form action="{{route('premium_approve',$id->id)}}" id='approval_work_8' method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="status" value="Aprobado">
                            <label for="commentary">Observaciones del jefe inmediato (Quién aprueba el permiso)</label>
                            <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                        </div>
                    </form>
                    @else
                    <h4>Observaciones del jefe inmediato</h4>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->commentary))!!}</p>
                    @endif
                    @if ($id->estado != 'Sin aprobar')
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-body">
                                        <h6>Firmado electrónicamente por el responsable del trabajo o líder</h6>
                                        <div class="row">
                                            <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsable->name}}</div>
                                            <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsable->cedula}}</div>
                                        </div>
                                        <p>Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$id->responsable->name}}</strong>, en rol de {{$id->responsable->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <div class="box-body">
                                        <h6>Firmado electrónicamente por el auditor o coordinador</h6>
                                        <div class="row">
                                            <div class="col-md-6"><strong>Nombre: </strong>{{$id->approve->name}}</div>
                                            <div class="col-md-6"><strong>Cédula: </strong>{{$id->approve->cedula}}</div>
                                        </div>
                                        <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->approve->name}}</strong> en rol de {{$id->approve->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>
                    <div class="box-footer">
                        @if ($id->estado == 'Sin aprobar')
                        <a class="btn btn-sm btn-primary btn-send" href="{{ route('premium_approve',$id->id) }}"
                            onclick="aprobar()">
                            Aprobar y firmar
                        </a>
                        <a class="btn btn-sm btn-danger btn-send" href="{{ route('premium_approve',$id->id) }}"
                                onclick="no_aprobar()">
                            No aprobar
                        </a>
                        <form id="approval_work_no_8" action="{{ route('premium_approve',$id->id) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="status" value="No aprobado">
                            <textarea name="commentary" id="commentary_2" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                        </form>
                        @endif
                        @if ($id->estado == 'Aprobado')
                            @can('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica')
                                <a href="{{route('payroll_overtime_news_report_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
                            @endcan
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
    function no_aprobar() {
        event.preventDefault();
        document.getElementById('commentary_2').value=document.getElementById('commentary').value;
        document.getElementById('approval_work_no_8').submit();
    }
    function aprobar() {
        event.preventDefault();
        document.getElementById('approval_work_8').submit();
    }
    </script>
@endsection