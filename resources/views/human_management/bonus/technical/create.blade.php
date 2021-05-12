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
                <a href="{{route('work_permit_bonuses')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{ route('work_permit_bonuses_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
        <div class="box-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Código formato</th>
                        <th>Estación base</th>
                        <th>Fecha</th>
                        <th>Funcionario</th>
                        <th>Bonificación</th>
                        <th>Viáticos</th>
                        {{-- <th>Caja menor</th>
                        <th>- Ajustes</th> --}}
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
                                        <input type="number" name="bonus[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="bonus_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a1u1 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(2)
                                        <input type="number" name="bonus[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="viatic_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a1u2 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(3)
                                        <input type="number" name="bonus[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a1u3 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(4)
                                        <input type="number" name="bonus[{{ $item->id }}][{{ $user->id }}]" {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a1u4 ?? 0 }}" class="form-control text-right">
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
                                        <input type="number" name="viatic[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="bonus_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a2u1 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(2)
                                        <input type="number" name="viatic[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="viatic_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a2u2 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(3)
                                        <input type="number" name="viatic[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a2u3 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(4)
                                        <input type="number" name="viatic[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a2u4 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @default
                                        N/A
                                @endswitch
                                {{-- @php
                                    $t2 += $r;
                                    $t += $r;
                                @endphp --}}
                            </td>
                            {{-- <td>
                                @switch($i)
                                    @case(1)
                                        <input type="number" name="box[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="bonus_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a3u1 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(2)
                                        <input type="number" name="box[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="viatic_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a3u2 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(3)
                                        <input type="number" name="box[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a3u3 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @case(4)
                                        <input type="number" name="box[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="box_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->f9a3u4 ?? 0 }}" class="form-control text-right">
                                    @break
                                    @default
                                        N/A
                                @endswitch --}}
                                {{-- @php
                                    $t3 += $r;
                                    $t += $r;
                                @endphp --}}
                            {{-- </td>
                            <td>
                                @switch($i)
                                    @case(1)
                                        <input type="number" max='0' name="ajustes[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="ajustes_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->ajustes_u1 ?? 0 }}" class="form-control text-right ajustes">
                                    @break
                                    @case(2)
                                        <input type="number" max='0' name="ajustes[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="ajustes_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->ajustes_u2 ?? 0 }}" class="form-control text-right ajustes">
                                    @break
                                    @case(3)
                                        <input type="number" max='0' name="ajustes[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="ajustes_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->ajustes_u3 ?? 0 }}" class="form-control text-right ajustes">
                                        @break
                                    @case(4)
                                        <input type="number" max='0' name="ajustes[{{ $item->id }}][{{ $user->id }}]"  {{ $status ? 'disabled' : '' }} id="ajustes_{{ $item->id }}_{{ $user->id }}" value="{{ $item->work_add->ajustes_u4 ?? 0 }}" class="form-control text-right ajustes">
                                        @break
                                    @default
                                        N/A
                                @endswitch
                            </td> --}}
                            {{-- <td class="text-right">{{ $t }}</td>
                            @php
                                $total += $t;
                            @endphp--}}
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
                </tbody>
            </table>
        </div>
        <div class="box box-footer">
            <input type="hidden" name="date_now" value="{{ $now }}">
            <button id="send" {!! $status_send ? 'disabled' : '' !!} class="btn btn-sm btn-success btn-send">Enviar y firmar</button>
        </div>
        </form>
    </div>
</section>
@endsection
@section('js')
    <script>
        var bPreguntar = true;
        window.onbeforeunload = preguntarAntesDeSalir;
        $(document).ready(function() {
            $('#send').click(function (){
                ajustes = $('.ajustes');
                r = true;
                for (const key in ajustes) {
                    if (ajustes.hasOwnProperty.call(ajustes, key)) {
                        const ajuste = ajustes[key];
                        if (ajuste.value) {
                            if (ajuste.value >= 0) {
                                r = false;
                            }
                        }
                    }
                }
                bPreguntar = false;
                if (!r) {
                    $('.loader').hide();
                }
                return true;
            });
        });
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
                return "¿Seguro que quieres salir?";
        }
    </script>
@endsection