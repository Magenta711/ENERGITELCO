@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Caja menor <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active"><a href="#">Caja menor</a></li>
    </ol>
</section>
<section class="content">
     
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Editar corte de caja menor</h3>
            <div class="box-tools">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deliveryMinorBoxModal">
                    Cargos y descargos
                </button>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#infoModal">
                    <i class="fa fa-question"></i>
                </button>
                <a href="{{route('bonus_minor_box')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{ route('bonus_minor_box_update',$id->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @method('PUT')
            @csrf
            <div class="box-body">
                @if ($itemsAfter)
                    <div class="table-responsive">
                        <h4>Permisos del día del ultimo corte</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Código formato</th>
                                    <th>Estación base</th>
                                    <th>Fecha</th>
                                    <th>Funcionario</th>
                                    <th>Caja menor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itemsAfter as $item)
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($item->users as $user)
                                        @php
                                            $t = 0;
                                        @endphp
                                        <tr>
                                            <td><a target="_blank" href="{{ route('work_permit_show',$item->id) }}">{{ $item->codigo_formulario }}-{{ $item->id }}</a></td>
                                            <td>{{ $item->nombre_eb }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td class="text-right">
                                                @switch($i)
                                                    @case(1)
                                                        $ {{ is_numeric($item->work_add->f9a3u1) ? number_format(($item->work_add->f9a3u1 ?? 0),2,',','.') : 0 }}
                                                    @break
                                                    @case(2)
                                                        $ {{ is_numeric($item->work_add->f9a3u2) ? number_format(($item->work_add->f9a3u2 ?? 0),2,',','.') : 0 }}
                                                    @break
                                                    @case(3)
                                                        $ {{ is_numeric($item->work_add->f9a3u3) ? number_format(($item->work_add->f9a3u3 ?? 0),2,',','.') : 0 }}
                                                    @break
                                                    @case(4)
                                                        $ {{ is_numeric($item->work_add->f9a3u4) ? number_format(($item->work_add->f9a3u4 ?? 0),2,',','.') : 0 }}
                                                    @break
                                                    @default
                                                        N/A
                                                @endswitch
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                @endif
                <div class="table-responsive">
                    <h4>Permisos del corte actual</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Código formato</th>
                                <th>Estación base</th>
                                <th>Fecha</th>
                                <th>Funcionario</th>
                                <th>Caja menor</th>
                                {{-- <th>Total</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $total = 0;
                                $t1 = 0;
                                $t2 = 0;
                                $t3 = 0;
                            @endphp --}}
                            @php
                                $status_send = false;
                            @endphp
                                @foreach ($items as $item)
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($item->users as $user)
                                    {{-- @php
                                        $t = 0;
                                    @endphp --}}
                                    @php
                                        $status = false;
                                        if ($item->estado == 'Sin aprobar') {
                                            $status = true;
                                            $status_send = true;
                                        }
                                    @endphp
                                    <tr {!! $status ? 'class="bg-red" data-toggle="tooltip" data-placement="top" title="Sin aprobar"' : '' !!} >
                                        <td><a target="_blank" href="{{ route('work_permit_show',$item->id) }}">{{ $item->codigo_formulario }}-{{ $item->id }}</a></td>
                                        <td>{{ $item->nombre_eb }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @switch($i)
                                                @case(1)
                                                    <input type="number" min="0" name="box[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a3u1 ?? 0 }}" class="form-control text-right">
                                                @break
                                                @case(2)
                                                    <input type="number" min="0" name="box[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a3u2 ?? 0 }}" class="form-control text-right">
                                                @break
                                                @case(3)
                                                    <input type="number" min="0" name="box[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a3u3 ?? 0 }}" class="form-control text-right">
                                                @break
                                                @case(4)
                                                    <input type="number" min="0" name="box[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a3u4 ?? 0 }}" class="form-control text-right">
                                                @break
                                                @default
                                                    N/A
                                            @endswitch
                                            {{-- @php
                                                $t3 += $r;
                                                $t += $r;
                                            @endphp --}}
                                        </td>
                                        {{-- <td class="text-right">{{ $t }}</td>
                                            @php
                                                $total += $t;   
                                            @endphp
                                        --}}
                                    </tr>
                                        @php
                                            $i++;
                                        @endphp
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box box-footer">
                <button id="send" {!! $status_send ? 'disabled' : '' !!} class="btn btn-sm btn-success btn-send">Guardar</button>
            </div>
        </form>
    </div>
</section>

{{-- MODAL --}}
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Ayuda</h4>
            </div>
            <div class="modal-body">
                <ul>
                    <li>El pago total del funcionario inferior a <b>$50.000</b> se almacenarán  a valores <b>Pendientes</b> para próximo corte</li>
                    <li>La columna "<b>Caja menor</b>" suma, hace referencia a lo relacionado al "<b>Permiso de trabajo</b>"</li>
                    <li>La columna "<b>Entregado</b>" resta, hace referencia al registro de una entrega manual</li>
                    <li>La columna "<b>Ajustes</b>" resta, en caso que el valor se pase como numero negativo la formula aplica ley de signos</li>
                    <li>La columna "<b>Pendientes</b>" suma, y este valor es acumulado a cortes anteriores que no superaron el valor minimo de pago total</li>
                    <li>La columna "<b>Descargos</b>" es el valor manual sumado valor acumulado a descargos</li>
                    <li>Para <b>ver el estado</b> de los usuarios ir al listado de "CAJA MENOR" en el botón "<b>Informes</b>"</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deliveryMinorBoxModal" tabindex="-1" role="dialog" aria-labelledby="pendingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Estados</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Funcionario</th>
                                <th>Caja menor pendiente de liquidar</th>
                                {{-- <th>Pendientes</th> --}}
                                <th>Valores pendiente a pagar</th>
                                {{-- <th>Ajustes</th> --}}
                                <th>Acciones</th>
                                <th>Última modificación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($minor_boxes as $item)
                                @if ($item->charges || $item->discharges)
                                    <tr>
                                        <td>{{$item->user->name}}</td>
                                        <td>${{number_format($item->charges,2,',','.')}}</td>
                                        {{-- <td>${{number_format($item->pending,2,',','.')}}</td> --}}
                                        <td>${{number_format($item->discharges,2,',','.')}}</td>
                                        {{-- <td>{{$item->rest}}</td> --}}
                                        <td>
                                            @if ($item->discharges > $item->charges)
                                                Se le debe {{ $item->discharges - $item->charges }}
                                            @endif
                                            @if ($item->charges > $item->discharges)
                                                Debe liquidar {{ $item->charges - $item->discharges }}
                                            @endif
                                        </td>
                                        <td>{{$item->last_date}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        var bPreguntar = true;
        window.onbeforeunload = preguntarAntesDeSalir;
        $(document).ready(function() {
            $('#send').click(function (){
                bPreguntar = false;
                return d.submit();
            });
        });
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
                return "¿Seguro que quieres salir?";
        }
    </script>
@endsection