@extends('lte.layouts')

@section('content')

<section class="content-header">
    <h1>Solicitud de permiso laboral o notificación de incapacidad médica <small>{{$id->id}}</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li>Formatos de gestión</li>
        <li class="active">Solicitud de permiso</li>
    </ol>
</section>
<section class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        @if ($id->estado != 'Sin aprobar')
                        <a href="{{route('work_permits_notifications_medical_incapacity')}}" class="btn btn-sm btn-primary">Volver</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <p><strong>Nota:</strong> Recuerde que los permisos se deben solicitar mínimo con 72 horas de antelación.</p>
                    <h4>Fecha</h4>
                    <p>{{$id->created_at}}</p>
                    <h4>Trabajador</h4>
                    <div class="row">
                        <div class="col-md-3 col-xs-6"><strong>Número de identificación</strong><br>{{$id->trabajador->cedula}}</div>
                        <div class="col-md-3 col-xs-6"><strong>Nombre del trabajador</strong><br>{{$id->trabajador->name}}</div>
                        <div class="col-md-3 col-xs-6"><strong>Cargo</strong><br>{{$id->trabajador->position->name}}</div>
                        <div class="col-md-3 col-xs-6"><strong>Área</strong><br>{{$id->trabajador->area}}</div>
                    </div>
                    <hr>
                    <h4>Detalle del permiso</h4>
                    <div class="row">
                        <div class="col-md-6"><strong>Fecha de inicio</strong><br>{{$id->fecha_inicio}} {{$id->hora_inicio}}</div>
                        <div class="col-md-6"><strong>Fecha de finalización</strong><br>{{$id->fecha_finalizacion}} {{$id->hora_finalizacion}}</div>
                    </div>
                    <hr>
                    <h4>Tipo de solicitud</h4>
                    <p>{{$id->tipo_solicitud}}</p>
                    <hr>
                    @if ($id->tipo_incapacidad)
                        <h4>Origen de su incapacidad</h4>
                        <p>{{$id->tipo_incapacidad}}</p>
                        <hr>
                    @endif
                    <h4>Motivo del permiso</h4>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->motivo_permiso)) !!}</p>
                    @if ($id->file)
                    <hr>
                        <strong>Archivo adjunto</strong>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-sm btn-link" href="/img/formulario7/{{$id->file}}" target="_blank">{{$id->file}}</a>
                            </div>
                        </div>    
                    @endif
                    <hr>
                    @if ($id->estado == 'Sin aprobar')
                        @can('Aprobar solicitud de permiso laboral o notificación de incapacidad')
                            <form action="{{route('work_permits_notifications_medical_incapacity_approve',$id->id)}}" id='approval_work_7' method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Aprobado">
                                <div class="form-group">
                                    <label for="observaciones_jefe">Observaciones del jefe inmediato (Quién aprueba el permiso)</label>
                                    <textarea name="observaciones_jefe" id="observaciones_jefe" cols="30" rows="3" class="form-control">{{old('observaciones_jefe')}}</textarea>
                                </div>
                            </form>
                        @endcan
                    @else
                        <h4>Observaciones del jefe inmediato</h4>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_jefe))!!}</p>
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
                        @can('Aprobar solicitud de permiso laboral o notificación de incapacidad')
                            <a class="btn btn-sm btn-primary btn-send" href="{{ route('work_permits_notifications_medical_incapacity_approve',$id->id) }}"
                                onclick="aprobar()">
                                Aprobar y firmar
                            </a>
                            <a class="btn btn-sm btn-danger btn-send" href="{{ route('work_permits_notifications_medical_incapacity_approve',$id->id) }}"
                                    onclick="no_aprobar()">
                                No aprobar
                            </a>
                            <form id="approval_work_no_7" action="{{ route('work_permits_notifications_medical_incapacity_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="No aprobado">
                                <textarea name="observaciones_jefe" id="observaciones_jefe_2" class="hide" cols="30" rows="3">{{old('observaciones_jefe')}}</textarea>
                            </form>
                        @endcan
                    @endif
                    @if ($id->estado == 'Aprobado')
                        @can('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica')
                            <a href="{{route('work_permits_notifications_medical_incapacity_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
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
        document.getElementById('observaciones_jefe_2').value=document.getElementById('observaciones_jefe').value;
        document.getElementById('approval_work_no_7').submit();
    }
    function aprobar() {
        event.preventDefault();
        document.getElementById('approval_work_7').submit();
    }
    </script>
@endsection