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
        <li><a href="#">Caja menor, víaticos y bonificaciones</a></li>
        <li class="active"><a href="#">Bonificaciones técnicas</a></li>
    </ol>
</section>
<section class="content">
     
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Bonificaciones permisos de trabajo</h3>
            <div class="box-tools">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deliveryMinorBoxModal">
                    Pendientes
                </button>
                <a href="{{route('work_permit_viatics')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{ route('work_permit_viatics_update',$id->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @method('PUT')
            @csrf
        <div class="box-body">
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
                            {{-- <th>Viáticos</th>
                            <th>- Ajustes</th> --}}
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
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right"><small class="text-muted">Plus</small></td>
                        <td>
                            <input type="hid" name="plus" id="plus" placeholder="" class="form-control" value="{{old('plus') ?? 0}}">
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


{{-- Lista por proyectos y mes anterior y proyectos que inicio y quedaron iniciado --}}