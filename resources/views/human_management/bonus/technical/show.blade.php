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
                <a href="{{route('bonuses_technical')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Estación base</th>
                            <th>Días</th>
                            <th>Fecha inicio - fin</th>
                            <th>Funcionario</th>
                            <th>Bonificación</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $item['nombre_eb'] }}</td>
                                <td>{{ $item['amount'] }}</td>
                                <td>{{ $item['created_at'] }} {{ $item['ended_at'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td class="text-right">
                                    {{ $item['bonus'] ?? 0 }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                @if ($id->approver)
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <div class="box-title">
                                    Firmado electrónicamente por quien aprueba
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6"><strong>Nombre: </strong>{{$id->approver->name}}</div>
                                    <div class="col-md-6"><strong>Cédula: </strong>{{$id->approver->cedula}}</div>
                                </div>
                                <p>Solicitud firmada electrónicamente por <strong>{{$id->approver->name}}</strong> en rol de {{$id->approver->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                Firmado electrónicamente por el auditor o coordinador
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsable->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsable->cedula}}</div>
                            </div>
                            <p>Solicitud firmada electrónicamente por <strong>{{$id->responsable->name}}</strong> en rol de {{$id->responsable->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            @if ($id->status == 2)
                @can('Aprobar bonificaciones de permisos de trabajo')
                    {{-- hasBox and hasBonus else link to edit cut sugery --}}
                    <button id="send_a" class="btn btn-sm btn-primary btn-send">Aprobar</button>
                    <button id="send_n" class="btn btn-sm btn-danger btn-send">No aprobar</button>
                @endcan
            @endif
            @if ($id->status == 1)
                @can('Exportar bonificaciones de permisos de trabajo')
                    <a href="{{ route('bonuses_technical_export',$id->id) }}" class="btn btn-sm btn-warning">Exportar</a>
                @endcan
            @endif
        </div>
    </div>
</section>
@endsection

<form id="form_approval" action="{{ route('bonuses_technical_approve',$id->id) }}" method="POST" style="form_dis;">
    @csrf
    <input type="hidden" name="status" value="Aprobado">
</form>
<form id="form_no_approval" action="{{ route('bonuses_technical_approve',$id->id) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="status" value="No aprobado">
</form>

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

{{-- Lista por proyectos y mes anterior y proyectos que inicio y quedaron iniciado --}}