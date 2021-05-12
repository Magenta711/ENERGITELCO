@extends('lte.layouts')

@section('content')
<?php $i=0; ?>
<section class="content-header">
    <h1>Reporte de novedades y horas extras <small>{{$id->id}}</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li>Formatos de gestión</li>
        <li class="active">Reporte de novedades y horas extras</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        @if ($id->estado != 'Sin aprobar')
                            <a href="{{route('payroll_overtime_news_report')}}" class="btn btn-sm btn-primary">Volver</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <label for="value_assistance">Valor de auxilio transporte mes</label>
                            <p>$ {{ number_format($id->value_assistance,2,',','.') }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="box-group" id="accordion">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Cédula</th>
                                        <th>Nombre</th>
                                        <th>Total neto a pagar</th>
                                        <th>Estado</th>
                                        <th>/</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($id->work_adds as $item)
                                        <tr>
                                            <th>{{$item->user->cedula}}</th>
                                            <td>{{$item->user->name}}</td>
                                            <td>$ {{ number_format($item->total_pay,2,',','.') }}</td>
                                            <td>
                                                <span id="status_{{ $item->user->id }}" class="label {{ $item->status == 1 ? 'bg-green' : 'bg-red'  }}">{{ $item->status == 1 ? 'Listo' : 'Pendiente'  }}</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$item->user->id}}">Ver</button>
                                                {{-- Modal description --}}
                                                <div class="modal fade" id="modal_edit_{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="exampleModalLongTitle">{{$item->user->name}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-6 form-group">
                                                                        <label for="salary_{{$item->user->id}}"">Salario básico</label>
                                                                        <p>$ {{ number_format($item->salary,2,',','.') }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Concepto</th>
                                                                                <th>Unidades</th>
                                                                                <th>Valores</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>100% Jornada laboral normal</td>
                                                                                <td>{{ $item->working_days }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->total_devengado_tx - $item->extras_sc_tx - $item->surcharge_n_tx - $item->extras_d_tx - $item->extras_dc_tx - $item->extras_n_tx - $item->extras_s_tx - $item->holyday_n_tx - $item->extras_hn_tx - $item->unpaid_leave_tx - $item->disabilities_1_tx - $item->disabilities_2_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Subsidio de transporte</td>
                                                                                <td>{{ $item->working_days }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->assistance_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Extra Dom. o Fest. Diurnos Compensado</td>
                                                                                <td>{{ $item->extras_sc }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->extras_sc_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>RECARGO NOCTURNO ORDINARIO</td>
                                                                                <td>{{ $item->surcharge_n }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->surcharge_n_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Extras Diurnas</td>
                                                                                <td>{{ $item->extras_d }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->extras_d_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Extras Diurnas Compensadas</td>
                                                                                <td>{{ $item->extras_dc }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->extras_dc_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Extras Nocturnas</td>
                                                                                <td>{{ $item->extras_n }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->extras_n_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Extra Dom.  o Fest. Diurnos</td>
                                                                                <td>{{ $item->extras_s }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->extras_s_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>FESTIVOS NOCTURNOS</td>
                                                                                <td>{{ $item->holyday_n }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->holyday_n_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Extras Festivas Nocturnas</td>
                                                                                <td>{{ $item->extras_hn }}</td>
                                                                                <td>
                                                                                    $ {{ number_format(($item->extras_hn_tx),2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Licencia no remunerada</td>
                                                                                <td>{{ $item->extras_hn }}</td>
                                                                                <td>
                                                                                   $ {{ number_format($item->unpaid_leave_tx,2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Incapacidades ARL <small>(100%)</small></td>
                                                                                <td>{{ $item->extras_hn }}</td>
                                                                                <td>
                                                                                   $ {{ number_format($item->disabilities_1_tx,2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Incapacidades EPS <small>(67%)</small></td>
                                                                                <td>{{ $item->extras_hn }}</td>
                                                                                <td>
                                                                                   $ {{ number_format($item->disabilities_2_tx,2,',','.') }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Deducciones</th>
                                                                                <th>Unidades</th>
                                                                                <th>Valores</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Salud (4%)</td>
                                                                                <td>{{ $item->working_days }}</td>
                                                                                <td>$ {{ number_format($item->health_tx,2,',','.') }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Pensión (4%)</td>
                                                                                <td>{{ $item->working_days }}</td>
                                                                                <td>$ {{ number_format($item->pension_tx,2,',','.') }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Descuentos</td>
                                                                                <td></td>
                                                                                <td>$ {{ number_format($item->discounts_tx,2,',','.') }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <hr>
                                                                <h3>Totales</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-sm-4">
                                                                        <p><b>Devengado</b></p>
                                                                        <span id="total_devengado_tx_{{ $item->user->id }}">$ {{ number_format(($item->total_devengado_tx + $item->assistance_tx),2,',','.') }}</span>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-4">
                                                                        <p><b>Deducciones</b></p>
                                                                        <span id="total_devengado_tx_{{ $item->user->id }}">$ {{ number_format(($item->health_tx + $item->pension_tx + $item->discounts_tx),2,',','.') }}</span>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <h3>Total neto a pagar</h3>
                                                                        <span id="total_pay_{{ $item->user->id }}">$ {{ number_format($item->total_pay,2,',','.') }}</span>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
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
                                            <th>Total devengado</th>
                                            <th>Total auxilio de trasporte</th>
                                            <th>Total salud</th>
                                            <th>Total pensión</th>
                                            <th>Total descuentos</th>
                                            <th>Total neto a pagar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span id="total_employees_tx">{{ $id->total_employees }}</span>
                                                </td>
                                                <td>
                                                    <span id="total_devengado_tx">$ {{ number_format($id->total_devengado,2,',','.') }}</span>
                                                </td>
                                                <td>
                                                    <span id="total_assistance_tx">$ {{ number_format($id->total_assistance,2,',','.') }}</span>
                                                </td>
                                                <td>
                                                    <span id="total_health_tx">$ {{ number_format($id->total_health,2,',','.') }}</span>
                                                </td>
                                                <td>
                                                    <span id="total_pension_tx">$ {{ number_format($id->total_pension,2,',','.') }}</span>
                                                </td>
                                                <td>
                                                    <span id="total_discount_tx">$ {{ number_format($id->total_discount,2,',','.') }}</span>
                                                </td>
                                                <th>
                                                    <h4><span id="total_pay_tx">$ {{ number_format($id->total_pay,2,',','.') }}</span></h4>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if ($id->estado == 'Sin aprobar')
                    <form action="{{route('payroll_overtime_news_report_approve',$id->id)}}" id='approval_work_8' method="POST">
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
                                        <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsableAcargo->name}}</div>
                                        <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsableAcargo->cedula}}</div>
                                    </div>
                                    <p>Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$id->responsableAcargo->name}}</strong>, en rol de {{$id->responsableAcargo->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <h6>Firmado electrónicamente por el auditor o coordinador</h6>
                                    <div class="row">
                                        <div class="col-md-6"><strong>Nombre: </strong>{{$id->coordinadorAcargo->name}}</div>
                                        <div class="col-md-6"><strong>Cédula: </strong>{{$id->coordinadorAcargo->cedula}}</div>
                                    </div>
                                    <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->coordinadorAcargo->name}}</strong> en rol de {{$id->coordinadorAcargo->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="box-footer">
                    @if ($id->estado == 'Sin aprobar')
                    <a class="btn btn-sm btn-primary btn-send" href="{{ route('payroll_overtime_news_report_approve',$id->id) }}"
                        onclick="aprobar()">
                        Aprobar y firmar
                    </a>
                    <a class="btn btn-sm btn-danger btn-send" href="{{ route('payroll_overtime_news_report_approve',$id->id) }}"
                            onclick="no_aprobar()">
                        No aprobar
                    </a>
                    <form id="approval_work_no_8" action="{{ route('payroll_overtime_news_report_approve',$id->id) }}" method="POST" style="display: none;">
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