@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Permiso de trabajo <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active"><a href="#">Permiso de trabajo</a></li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Bonificaciones permisos de trabajo</h3>
            <div class="box-tools">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deliveryMinorBoxModal">
                    Pendientes
                </button>
                <a href="{{route('work_permit_bonuses')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{ route('work_permit_bonuses_update',$id->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                <th>Bonificación</th>
                                <th>Viáticos</th>
                                <th>Ajustes</th>
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
                                                    $ {{ is_numeric($item->work_add->f9a1u1) ? number_format(($item->work_add->f9a1u1 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(2)
                                                    $ {{ is_numeric($item->work_add->f9a1u2) ? number_format(($item->work_add->f9a1u2 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(3)
                                                    $ {{ is_numeric($item->work_add->f9a1u3) ? number_format(($item->work_add->f9a1u3 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(4)
                                                    $ {{ is_numeric($item->work_add->f9a1u4) ? number_format(($item->work_add->f9a1u4 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @default
                                                    N/A
                                            @endswitch
                                        </td>
                                        <td class="text-right">
                                            @switch($i)
                                                @case(1)
                                                    $ {{ is_numeric($item->work_add->f9a2u1) ? number_format(($item->work_add->f9a2u1 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(2)
                                                    $ {{ is_numeric($item->work_add->f9a2u2) ? number_format(($item->work_add->f9a2u2 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(3)
                                                    $ {{ is_numeric($item->work_add->f9a2u3) ? number_format(($item->work_add->f9a2u3 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(4)
                                                    $ {{ is_numeric($item->work_add->f9a2u4) ? number_format(($item->work_add->f9a2u4 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @default
                                                    N/A
                                            @endswitch
                                        </td>
                                        <td class="text-right">
                                            @switch($i)
                                                @case(1)
                                                    - $ {{ is_numeric($item->work_add->ajustes_u1) ? number_format(($item->work_add->ajustes_u1 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(2)
                                                    - $ {{ is_numeric($item->work_add->ajustes_u2) ? number_format(($item->work_add->ajustes_u2 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(3)
                                                    - $ {{ is_numeric($item->work_add->ajustes_u3) ? number_format(($item->work_add->ajustes_u3 ?? 0),2,',','.') : 0 }}
                                                @break
                                                @case(4)
                                                    - $ {{ is_numeric($item->work_add->ajustes_u4) ? number_format(($item->work_add->ajustes_u4 ?? 0),2,',','.') : 0 }}
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
                            <th>Bonificación</th>
                            <th>Viáticos</th>
                            <th>- Ajustes</th>
                            {{-- <th>Total</th> --}}
                        </tr> 
                    </thead>
                    <tbody>
                        @php
                            // $total = 0;
                            // $t1 = 0;
                            // $t2 = 0;
                            // $t3 = 0;
                            // $user_pending = array();
                        @endphp
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
                                            <input type="number" name="bonus[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="bonus_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a1u1 ?? 0 }}" class="form-control text-right">
                                        @break
                                        @case(2)
                                            <input type="number" name="bonus[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="bonus_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a1u2 ?? 0 }}" class="form-control text-right">
                                        @break
                                        @case(3)
                                            <input type="number" name="bonus[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="bonus_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a1u3 ?? 0 }}" class="form-control text-right">
                                        @break
                                        @case(4)
                                            <input type="number" name="bonus[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="bonus_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a1u4 ?? 0 }}" class="form-control text-right">
                                        @break
                                        @default
                                            N/A
                                    @endswitch
                                    {{-- @php
                                        $t1 += $r;
                                        $t += $r;
                                    @endphp --}}
                                </td>
                                <td>
                                    @switch($i)
                                        @case(1)
                                            <input type="number" name="viatic[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="viatic_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a2u1 ?? 0 }}" class="form-control text-right">
                                        @break
                                        @case(2)
                                            <input type="number" name="viatic[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="viatic_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a2u2 ?? 0 }}" class="form-control text-right">
                                        @break
                                        @case(3)
                                            <input type="number" name="viatic[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="viatic_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a2u3 ?? 0 }}" class="form-control text-right">
                                        @break
                                        @case(4)
                                            <input type="number" name="viatic[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="viatic_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a2u4 ?? 0 }}" class="form-control text-right">
                                        @break
                                        @default
                                            N/A
                                    @endswitch
                                    {{-- @php
                                        $t2 += $r;
                                        $t += $r;
                                    @endphp --}}
                                </td>
                                <td>
                                    @switch($i)
                                        @case(1)
                                            <input type="number" min='0' name="ajustes[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="ajustes_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->ajustes_u1 ?? 0 }}" class="form-control text-right ajustes">
                                        @break
                                        @case(2)
                                            <input type="number" min='0' name="ajustes[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="ajustes_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->ajustes_u2 ?? 0 }}" class="form-control text-right ajustes">
                                        @break
                                        @case(3)
                                            <input type="number" min='0' name="ajustes[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="ajustes_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->ajustes_u3 ?? 0 }}" class="form-control text-right ajustes">
                                            @break
                                        @case(4)
                                            <input type="number" min='0' name="ajustes[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="ajustes_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->ajustes_u4 ?? 0 }}" class="form-control text-right ajustes">
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
                    {{-- <tr>
                        <td colspan="2">Total</td>
                        <td class="text-right">{{ $t1 }}</td>
                        <td class="text-right">{{ $t2 }}</td>
                        <td class="text-right">{{ $t3 }}</td>
                        <td class="text-right">{{ $total }}</td>
                        <td>{{ $now }}</td>
                    </tr> --}}
                    <tr>
                        <td colspan="6"></td>
                        <td>
                            <input type="text" name="plus" id="plus" placeholder="" class="form-control" value="{{old('plus')}}">
                        </td>
                    </tr>
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

{{-- Modal --}}
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
                                <th>Pendientes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($minor_boxes as $item)
                                @if ($item->pending)
                                    <tr>
                                        <td>{{$item->user->name}}</td>
                                        <td>${{number_format($item->pending,2,',','.')}}</td>
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