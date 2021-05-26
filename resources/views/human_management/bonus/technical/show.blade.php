@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bonificaciones y víaticos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active"><a href="#">Bonificaciones y víaticos</a></li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    @if (($id->status == 3 && !$id->has_bonus) || ($id->status == 3 && !$id->has_box))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Advertencia!</h4>
            <ul>
                @if ($id->status == 3 && !$id->has_bonus)
                    <li>Se requiere consolidar bonificaciones</li>
                @endif
                @if ($id->status == 3 && !$id->has_box)
                    <li>Se requiere consolidar la caja menor</li>
                @endif
            </ul>
        </div>
    @endif
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Bonificaciones y víaticos</h3>
            <div class="box-tools">
                <a href="{{route('work_permit_bonuses')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Funcionario</th>
                            <th># Cuenta</th>
                            <th>Bonificaciones</th>
                            <th>Viáticos</th>
                            <th>Ajustes</th>
                            <th>Pendientes</th>
                            <th>Total a pagar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $bonus = 0;
                        $vistics = 0;
                        $ajustes = 0;
                        $pending = 0;
                        $total_pagar = 0;
                    @endphp
                    @foreach ($array as $item)
                        <tr>
                            <td>{{ $item['cedula'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['cuenta'] }}</td>
                            <td>${{ number_format($item['bonification'],2,',','.') }}</td>
                            <td>${{ number_format($item['viatic'],2,',','.') }}</td>
                            <td>${{ number_format($item['ajustes'],2,',','.') }}</td>
                            <td>${{ number_format($item['pending'],2,',','.') }}</td>
                            @php
                                $totalPagar = $item['bonification']+$item['viatic']-$item['ajustes']+$item['pending'];
                                $bonus += $item['bonification'];
                                $vistics += $item['viatic'];
                                $ajustes += $item['ajustes'];
                                $pending += $item['pending'];
                                $total_pagar += $totalPagar;
                            @endphp
                            <td>${{ number_format($totalPagar,2,',','.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="3">Total</th>
                        <th>${{ number_format($bonus,2,',','.') }}</th>
                        <th>${{ number_format($vistics,2,',','.') }}</th>
                        <th>${{ number_format($ajustes,2,',','.') }}</th>
                        <th>${{ number_format($pending,2,',','.') }}</th>
                        <th>${{ number_format($total_pagar,2,',','.') }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            @if ($id->status == 2 && $id->has_bonus && $id->has_box)
                @can('Aprobar bonificaciones de permisos de trabajo')
                    {{-- hasBox and hasBonus else link to edit cut sugery --}}
                    <button id="send_a" class="btn btn-sm btn-primary btn-send">Aprobar</button>
                    <button id="send_n" class="btn btn-sm btn-danger btn-send">No aprobar</button>
                @endcan
            @endif
            @if ($id->status == 1)
                @can('Exportar bonificaciones de permisos de trabajo')
                    <a href="{{ route('work_permit_bonuses_export',$id->id) }}" class="btn btn-sm btn-warning">Exportar</a>
                @endcan
            @endif
        </div>
    </div>
</section>

<form id="form_approval" action="{{ route('work_permit_bonuses_approve',$id->id) }}" method="POST" style="form_dis;">
    @csrf
    <input type="hidden" name="status" value="Aprobado">
    {{-- <textarea name="observaciones_jefe" id="observaciones_jefe_2" class="hide" cols="30" rows="3">{{old('observaciones_jefe')}}</textarea> --}}
</form>
<form id="form_no_approval" action="{{ route('work_permit_bonuses_approve',$id->id) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="status" value="No aprobado">
    {{-- <textarea name="observaciones_jefe" id="observaciones_jefe_2" class="hide" cols="30" rows="3">{{old('observaciones_jefe')}}</textarea> --}}
</form>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#send_a').click(function (e){
                e.preventDefault();
                return document.getElementById('form_approval').submit();
            });
            $('#send_n').click(function (e){
                e.preventDefault();
                return document.getElementById('form_no_approval').submit();
            });
        });
    </script>
@endsection