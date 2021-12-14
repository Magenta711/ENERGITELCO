@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    @if ($id->created_at > '2021-12-10 24:00:00')
        <h1>
            Víaticos <small></small>
        </h1>
    @else
        <h1>
            Bonificaciones y víaticos <small></small>
        </h1>
    @endif
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        @if ($id->created_at > '2021-12-10 24:00:00')
            <li class="active"><a href="#">Víaticos</a></li>
        @else
            <li class="active"><a href="#">Bonificaciones y víaticos</a></li>
        @endif
    </ol>
</section>
<section class="content">
     
    @if (($id->status == 3 && !$id->has_bonus) || ($id->status == 3 && !$id->has_box))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Advertencia!</h4>
            <ul>
                @if ($id->status == 3 && !$id->has_bonus)
                    <li>Se requiere consolidar víaticos</li>
                @endif
                @if ($id->status == 3 && !$id->has_box)
                    <li>Se requiere consolidar la caja menor</li>
                @endif
            </ul>
        </div>
    @endif
    <div class="box box-solid">
        <div class="box-header with-border">
            @if ($id->created_at > '2021-12-10 24:00:00')
                <h3 class="box-title">Víaticos</h3>
            @else
                <h3 class="box-title">Bonificaciones y víaticos</h3>
            @endif
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
                            @if ($id->created_at <= '2021-12-10 24:00:00')
                                <th>Bonificaciones</th>
                            @endif
                            <th>Viáticos</th>
                            <th>Ajustes</th>
                            <th>Pendientes</th>
                            <th>Total a pagar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        if ($id->created_at <= '2021-12-10 24:00:00'){
                            $bonus = 0;
                        }
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
                            @if ($id->created_at <= '2021-12-10 24:00:00')
                                <td>${{ number_format($item['bonification'],2,',','.') }}</td>
                            @endif
                            <td>${{ number_format($item['viatic'],2,',','.') }}</td>
                            <td>${{ number_format($item['ajustes'],2,',','.') }}</td>
                            <td>${{ number_format($item['pending'],2,',','.') }}</td>
                            @php
                                if ($id->created_at <= '2021-12-10 24:00:00'){
                                    $bonus += $item['bonification'];
                                    $totalPagar = $item['bonification']+$item['viatic']-$item['ajustes']+$item['pending'];
                                }else {
                                    $totalPagar = $item['viatic']-$item['ajustes']+$item['pending'];
                                }
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
                        @if ($id->created_at <= '2021-12-10 24:00:00')
                            <th>${{ number_format($bonus,2,',','.') }}</th>
                        @endif
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
</form>
<form id="form_no_approval" action="{{ route('work_permit_bonuses_approve',$id->id) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="status" value="No aprobado">
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