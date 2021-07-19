@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Bonificaciones de administrativos y conductores
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li><a href="#">Bonificaciones de amdinistrativos y conductores</a></li>
        <li class="active">Ver</li>
    </ol>
</section>

<section class="content">
    @include('includes.alerts')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="month">Periodo de pago</label>
                        <div class="row">
                            <div class="col-md-6">
                                <p>{{ $id->start_date }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{ $id->end_date }}</p>
                            </div>
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
                                        <th>Cargo</th>
                                        <th>Total neto a pagar</th>
                                        <th>/</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($id->users as $item)
                                        <tr>
                                            <th>{{$item->user->cedula}} {{$item->admin_bonus_check}}</th>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->user->position->name}}</td>
                                            <td id="total_pay_td_{{ $item->user->id }}">${{number_format($item->total_user,2,',','.')}}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$item->user->id}}">Detalles</button>
                                                <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal" data-target="#modal_report_{{$item->user->id}}">Reporte 24/7</button>
                                                <div class="modal fade" id="modal_edit_{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="exampleModalLongTitle">{{$item->user->name}} - {{$item->user->position->name}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="list-group">
                                                                    @if ($item->admin_bonus_check)
                                                                        <li class="list-group-item">
                                                                            <p>
                                                                                Bonificación a administrativos
                                                                            </p>
                                                                        </li>
                                                                    @endif
                                                                    @if ($item->drive_bonus_check)
                                                                        <li class="list-group-item">
                                                                            <p>
                                                                                Bonificación a conductores
                                                                            </p>
                                                                        </li>
                                                                    @endif
                                                                    @if ($item->b24_7_check)
                                                                        <li class="list-group-item">
                                                                            <p>
                                                                                Bonificación 24/7
                                                                            </p>
                                                                        </li>
                                                                    @endif
                                                                    @if ($item->na_checked)
                                                                        <li class="list-group-item">
                                                                            <p>
                                                                                Está en incapacidad o en vacaciones
                                                                            </p>
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                                <hr>
                                                                <div {!! !$item->admin_bonus_check ? 'style="display: none"' : ''!!}>
                                                                    <div class="form-group">
                                                                        <label for="value_bonus_{{$item->user->id}}">Bonificación segun su cargo</label>
                                                                        <p>{{number_format($item->value_bonus,2,',','.')}}</p>
                                                                    </div>
                                                                    <h4>Admistrativo</h4>
                                                                    <hr>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_1"><h5>ALCANCE</h5> MANEJO DEL ALCANCE DE LOS PROYECTOS DE LA COMPAÑÍA</label>
                                                                        <p>{{$item->admin_1}}</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_2"><h5>TIEMPO</h5> MANEJO CORRECTO DE TIEMPOS Y CUMPLIMIENTO DE CRONOGRAMAS</label>
                                                                        <p>{{$item->admin_2}}</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_3"><h5>COSTO</h5> MANEJO CORRECTO DE LOS COSTOS DE LOS PROYECTOS</label>
                                                                        <p>{{$item->admin_3}}</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_4">MANEJO DE LA CALIDAD Y DE POLÍTICA CERO PENDIENTES</label>
                                                                        <p>{{$item->admin_4}}</p>
                                                                    </div>
                                                                    <h5>RECURSO HUMANO (INTEGRACIÓN Y BUENA COORDINACIÓN DEL RECURSO HUMANO)</h5>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="admin_{{$item->user->id}}_5">PUNTUALIDAD</label>
                                                                                <p>{{$item->admin_5}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="admin_{{$item->user->id}}_6">INTERACCIÓN CON LOS DEMÁS COMPAÑEROS Y ÁREAS DE LA COMPAÑÍA</label>
                                                                                <p>{{$item->admin_6}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_7">COMUNICACIONES: MANEJO DE LAS COMUNICACIÓNES SEGÚN POLÍTICAS DE LA COMPAÑÍA, ENTERANDO DE TODO AL DIRECTOR DEL PROYECTO</label>
                                                                        <p>{{$item->admin_7}}</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_8">MANEJO Y NEGOCIACIÓN DE LAS ADQUISICIONES, DE ACUERDO A LAS POLÍTICAS DE COMPRAS Y APROBACIONES DEL DIRECTOR DE PROYECTOS</label>
                                                                        <p>{{$item->admin_8}}</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_9">GESTIÓN DE TODOS LOS INTERESADOS DE LOS PROYECTOS, INCLUYE INTERESADOS INTERNOS, EXTERNOS Y PATROCINADOR</label>
                                                                        <p>{{$item->admin_9}}</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_10">MANEJO DE LA PROPIEDAD DEL CLIENTE O PATROCINADOR.</label>
                                                                        <p>{{$item->admin_10}}</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_11">CUMPLIMIENTO DE POLÍTICAS Y ESTÁNDARES DEL PATROCINADOR (REG NOC, SITIO LIMPIO, ETC.)</label>
                                                                        <p>{{$item->admin_11}}</p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="admin_{{$item->user->id}}_12">MANEJO DE LA INFORMACIÓN Y DE LA APP ENERGITELCO</label>
                                                                        <p>{{$item->admin_12}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="block_bonus_driver_{{$item->user->id}}" {!! !$item->drive_bonus_check ? 'style="display: none"' : '' !!}>
                                                                    <h4>Conductor</h4>
                                                                    <div class="row">
                                                                        <div class="col-md-6 form-group">
                                                                            <label for="driver_{{$item->user->id}}_1">BONIFICACIÓN POR CONDUCIR CARRO</label>
                                                                            <p>{{$item->driver_1}}</p>
                                                                        </div>
                                                                        <div class="col-md-6 form-group">
                                                                            <label for="driver_{{$item->user->id}}_2">BONIFICACIÓN POR CONDUCIR MOTO</label>
                                                                            <p>{{$item->driver_2}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="commentary_{{$item->user->id}}">Comentarios</label>
                                                                    <p>{!! str_replace("\n", '</br>', addslashes($item->commentary)) !!}</p>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6" {!! !$item->admin_bonus_check ? 'style="display: none"' : ''!!}>
                                                                        <h4>Porcentaje bonificación administrativa</h4>
                                                                        <span id="percentage_admin_{{ $item->user->id }}">${{number_format($item->percentage_admin,2,',','.')}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3" {!! !$item->b24_7_check ? 'style="display: none"' : '' !!}>
                                                                        <h4>Total bonificación 24/7</h4>
                                                                        <span id="total_pay_admin_{{ $item->user->id }}">${{number_format($item->bonus_24_7,2,',','.')}}</span>
                                                                    </div>
                                                                    <div class="col-md-3" {!! !$item->admin_bonus_check ? 'style="display: none"' : ''!!}>
                                                                        <h4>Total bonificación administrativa</h4>
                                                                        <span id="total_pay_admin_{{ $item->user->id }}">${{number_format($item->total_admin,2,',','.')}}</span>
                                                                    </div>
                                                                    <div class="col-md-3 block_bonus_driver_{{$item->user->id}}" {!! !$item->drive_bonus_check ? 'style="display: none"' : ''!!}>
                                                                        <h4>Total bonificación conductor</h4>
                                                                        <span id="total_pay_driver_{{ $item->user->id }}">${{number_format($item->total_dirver,2,',','.')}}</span>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <h3>Total neto a pagar</h3>
                                                                        <span id="total_pay_{{ $item->user->id }}">${{number_format($item->total_user,2,',','.')}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="modal_report_{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="exampleModalLongTitle">{{$item->user->name}} - {{$item->user->position->name}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="info_24_7" id="info_24_7_{{$item->user->id}}">
                                                                    <input type="hidden" name="state_24_7[{{$item->user->id}}]" id="state_24_7_user_{{$item->user->id}}" value="{{$item->state_24_7}}">
                                                                    <input type="hidden" name="last_24_7[{{$item->user->id}}]" id="last_24_7_user_{{$item->user->id}}" value="{{$item->last_24_7}}">
                                                                    <input type="hidden" name="time_24_7[{{$item->user->id}}]" id="time_24_7_user_{{$item->user->id}}" value="{{$item->time_24_7}}">
                                                                    <p>
                                                                        Estado:
                                                                        <span class="state_24_7" id="state_24_7_{{$item->user->id}}">{{$item->state_24_7 ? 'Activo' : 'Inactivo'}}</span>
                                                                    </p>
                                                                    @if ($item->state_24_7)
                                                                        <p>
                                                                            Fecha de última activacion:
                                                                            <span class="last_24_7">{{$item->last_24_7}}</span>
                                                                        </p>
                                                                    @endif
                                                                    @php
                                                                        $time = json_decode($item->time_24_7,true)
                                                                    @endphp
                                                                    <p>
                                                                        Tiempo: 
                                                                        <span class="time_24_7" id="time_24_7_{{$item->user->id}}">Meses: {{ $time['m'] ?? 0 }}, Días: {{ $time['d'] ?? 0 }}, Horas: {{ $time['h'] ?? 0 }}, Minutos: {{ $time['i'] ?? 0 }}</span>
                                                                    </p>
                                                                </div>
                                                                <table class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Descripción</th>
                                                                            <th>Plus</th>
                                                                            <th>Fecha</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($item->user->report_24_7 as $item)
                                                                            @if ($item->bonus_id == $id->id)
                                                                                <tr>
                                                                                    <td>{{$item->description}}</td>
                                                                                    <td>{{$item->plus ? 'Si' : 'No'}}</td>
                                                                                    <td>{{$item->created_at}}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        @if (!isset($item))
                                                                            <tr>
                                                                                <td colspan="3" class="text-center">Sin reportes</td>
                                                                            </tr>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
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
                                            <th>Total bonificaciones a administrativos</th>
                                            <th>Total bonificaciones a condutores</th>
                                            <th>Total bonificaciones 24/7</th>
                                            <th>Total neto a pagar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span id="total_employees_tx">{{$id->total_employees}}</span>
                                            </td>
                                            <td>
                                                <span id="total_admin">${{number_format($id->total_pay_admin,2,',','.')}}</span>
                                            </td>
                                            <td>
                                                <span id="total_driver">${{number_format($id->total_pay_drive,2,',','.')}}</span>
                                            </td>
                                            <td>
                                                <span id="total_24_7">${{number_format($id->total_pay_24_7,2,',','.')}}</span>
                                            </td>
                                            <th>
                                                <h4><span id="total_all">${{number_format($id->total_pay,2,',','.')}}</span></h4>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if ($id->status == 2)
                    <form action="{{route('admin_bonuses_approve',$id->id)}}" id='approval_work_8' method="POST">
                        @csrf
                        @method('PATCH')
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
                    @if ($id->status != 2)
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
                     @if ($id->status == 2)
                        <a class="btn btn-sm btn-primary btn-send" href="{{ route('admin_bonuses_approve',$id->id) }}"
                            onclick="aprobar()">
                            Aprobar y firmar
                        </a>
                        <a class="btn btn-sm btn-danger btn-send" href="{{ route('admin_bonuses_approve',$id->id) }}"
                                onclick="no_aprobar()">
                            No aprobar
                        </a>
                        <form id="approval_work_no_8" action="{{ route('admin_bonuses_approve',$id->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="No aprobado">
                            <textarea name="commentary" id="commentary_2" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                        </form>
                    @endif
                    @if ($id->status == 1)
                        @can('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica')
                            <a href="{{route('admin_bonuses_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
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