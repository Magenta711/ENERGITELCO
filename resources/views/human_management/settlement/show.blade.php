@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Liquidación prestaciones sociales
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Liquidación prestaciones sociales</li>
    </ol>
</section>

<section class="content">
     
    @php
        $months = ['0',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];                             
    @endphp
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    {{-- User 1 --}}
                    <div class="form-group">
                        <div id='origen0' class="row origen">
                            <div class="col-md-3">
                                <label for="user_id">Número de documento</label>
                                <p>{{$id->user->cedula}}</p>
                            </div>
                            <div class="col-md-3">
                                <label for="name">Nombre completo funcionario</label>
                                <p>{{$id->user->name}}</p>
                            </div>
                            <div class="col-md-3">
                                <label for="salary">Salario base mes actual</label>
                                <p>${{number_format($id->salary,2,',','.')}}</p>  
                            </div>
                            <div class="col-md-3">
                                <label for="assistance">Salario base mes actual</label>
                                <p>${{number_format($id->assistance,2,',','.')}}</p>
                            </div>
                            <div class="col-md-3">
                                <label for="date_start">Fecha de ingreso</label>
                                <p>{{$id->date_start}}</p>
                            </div>
                            <div class="col-md-3">
                                <label for="date_end">Fecha de retiro</label>
                                <p>{{$id->date_end}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>/</th>
                                    @foreach ($id->years as $item)
                                        <td>{{$item->years}}</td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Días vinculados</th>
                                    @foreach ($id->years as $item)
                                        <td>{{$item->days_linked}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Días en licencia</th>
                                    @foreach ($id->years as $item)
                                        <td>{{$item->days_leave}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Número de días a liquidar</th>
                                    @foreach ($id->years as $item)
                                        <td>{{$item->days_to_settle}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="days_linked_vacation">Total días por vacaciones</label>
                                <p>{{$id->days_linked_vacation}}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="vacation_days_to_pay">Días de vacaciones</label>
                                <p>{{$id->vacation_days_to_pay}}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="vacation">Días disfrutados en vacaciones</label>
                                <p>{{$id->vacation}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_vacation_days_to_pay">Total de días de vacaciones a pagar</label>
                                <p>{{$id->total_vacation_days_to_pay}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="premium_payment_days">Días que faltan de pago prima</label>
                                <p>{{$id->premium_payment_days}}</p>
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
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($id->months as $item)
                                    <tr>
                                        <th>{{$months[++$i]}}</th>
                                        <td class="text-right">${{number_format($item->salary_month,2,',','.')}}</td>
                                        <td class="text-right">${{number_format($item->extras_month,2,',','.')}}</td>
                                        <td class="text-right">${{number_format($item->assistance_month,2,',','.')}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th>Total devengado</th>
                                    <td class="text-right">${{number_format($id->total_devengado_salary,2,',','.')}}</td>
                                    <td class="text-right">${{number_format($id->total_devengado_extras,2,',','.')}}</td>
                                    <td class="text-right">${{number_format($id->total_devengado_assistance,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Promedio</th>
                                    <td class="text-right">${{number_format($id->average_salary,2,',','.')}}</td>
                                    <td class="text-right">${{number_format($id->average_extras,2,',','.')}}</td>
                                    <td class="text-right">${{number_format($id->average_assistance,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Promedio últimos 6 meses</th>
                                    <td class="text-right">${{number_format($id->average_last_month_salary,2,',','.')}}</td>
                                    <td class="text-right">${{number_format($id->average_last_month_extras,2,',','.')}}</td>
                                    <td class="text-right">${{number_format($id->average_last_month_assistance,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Promedio prima</th>
                                    <td class="text-right">${{number_format($id->average_premium_salary,2,',','.')}}</td>
                                    <td class="text-right">${{number_format($id->average_premium_extras,2,',','.')}}</td>
                                    <td class="text-right">${{number_format($id->average_premium_assistance,2,',','.')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Cálculos</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Liquidación de cesantías</th>
                                    <td class="text-right">${{number_format($id->total_linkend,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Pago de intereses de cesantías</th>
                                    <td class="text-right">${{number_format($id->intereses,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Liquidación por prima</th>
                                    <td class="text-right">${{number_format($id->total_premium,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Pago de vacaciones</th>
                                    <td class="text-right">${{number_format($id->total_vacation,2,',','.')}}</td>
                                <tr>
                                    <th>Salario pendiente</th>
                                    <td class="text-right">${{number_format($id->this_salary,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Pago de indemnización</th>
                                    <td class="text-right">${{number_format($id->compensation,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Deudas con la compañía</th>
                                    <td class="text-right">${{number_format($id->debt,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th>Total a pagar por liquidación</th>
                                    <td class="text-right"><h3>${{number_format($id->total_settlement,2,',','.')}}</h3></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Valor a reclamar cesantías en fondo por valor</th>
                                    <td class="text-right"><h4>${{number_format($id->serveraces,2,',','.')}}</h4></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="serveraces"></label>
                        <p></p>
                    </div>
                    @if ($id->status == 0)
                        <div class="form-group">
                            <label for="commentary">Observaciones del jefe inmediato (Quién aprueba el permiso)</label>
                            <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                        </div>
                    @endif
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
                                @if ($id->approve)
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
                                @endif
                            </div>
                        </div>
                </div>
                <div class="box-footer">
                    @if ($id->status == 0)
                        <a class="btn btn-sm btn-primary btn-send" href="{{ route('settlement_approve',$id->id) }}"
                            onclick="aprobar()">
                            Aprobar y firmar
                        </a>
                        <a class="btn btn-sm btn-danger btn-send" href="{{ route('settlement_approve',$id->id) }}"
                            onclick="no_aprobar()">
                            No aprobar
                        </a>
                        <form action="{{route('settlement_approve',$id->id)}}" id='approval_work_8' method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="Aprobado">
                            <textarea name="commentary" id="commentary_1" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                        </form>
                        <form id="approval_work_no_8" action="{{ route('settlement_approve',$id->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="No aprobado">
                            <textarea name="commentary" id="commentary_2" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                        </form>
                    @endif
                    @if ($id->status == 1)
                        {{-- @can('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica') --}}
                            <a href="{{route('settlement_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
                        {{-- @endcan --}}
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
        document.getElementById('commentary_1').value=document.getElementById('commentary').value;
        document.getElementById('approval_work_8').submit();
    }
    </script>
@endsection