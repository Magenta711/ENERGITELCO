@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Solicitud de carta de retiro de cesantías o laboral
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Solicitud de carta de retiro de cesantías o laboral</li>
    </ol>
</section>

<section class="content">
     
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ver solicitud de carta de retiro de cesantías o laboral</h3>
                    <div class="box-tools">
                        <a href="{{route('request_withdraw_severance')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="user_id">Funcionario</label>
                            <p>{{$id->responsableAcargo->name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="reason">Motivo</label>
                            <p>
                                @switch($id->reason)
                                    @case('vivienda')
                                        Para financiar vivienda.
                                        @break
                                    @case('educacion')
                                        Para financiar la educación.
                                        @break
                                    @case('acciones')
                                        Para comprar acciones en las empresas del estado.
                                        @break
                                    @case('carta laboral')
                                        Carta laboral
                                        @break
                                    @default
                                        {{$id->reason}}
                                @endswitch
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="from">Aquien dirige</label>
                            @if ($id->estado == 'Sin aprobar' && auth()->user()->hasPermissionTo('Aprobar retiro de cesantías'))
                                <form id="approval_work" action="{{ route('request_withdraw_severance_approve',$id->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <input type="text" value="{{$id->from}}" name="from" class="form-control" id="from">
                            @else
                                <p>{{$id->form}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="value">Valor</label>
                            @if ($id->estado == 'Sin aprobar' && auth()->user()->hasPermissionTo('Aprobar retiro de cesantías'))
                                    <input type="hidden" name="status" value="Aprobado">
                                    @if ($id->reason == 'carta laboral')
                                        <input type="number" value="{{$id->responsableAcargo->register && $id->responsableAcargo->register->hasContract() ? $id->responsableAcargo->register->hasContract()->salary : ''}}" name="layoffs" class="form-control" id="value">
                                    @else
                                        <input type="number" value="{{$id->value}}" name="layoffs" class="form-control" id="value">
                                    @endif
                                    <input type="hidden" value="Medellín" name="city">
                            @else
                                <p>$ {{number_format($id->value,2,',','.')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Descriptión</label>
                            <p>{!! str_replace("\n", '</br>', addslashes($id->description)) !!}</p>
                        </div>
                        @if ($id->files)
                            <hr>
                            <div class="form-group">
                                <label for="file">Archivos adjuntos</label><br>
                                <div class="row">
                                    @foreach ($id->files as $item)
                                    <div class="col-md-3">
                                        <span class="mailbox-attachment-icon {{$item->type == "jpg" || $item->type == "png" || $item->type == "jpeg" ? 'has-img' : ''}}" id="icon_{{$item->id}}">
                                            <div id="type_{{$item->id}}">
                                                @if ($item->type=='pdf')
                                                    <i class="fa fa-file-pdf"></i>
                                                @endif
                                                @if ($item->type=='docx' || $item->type=='doc')
                                                    <i class="fa fa-file-word"></i>
                                                @endif
                                                @if ($item->type == 'png' || $item->type == 'jpg' || $item->type == 'jpeg')
                                                    <img src="/storage/files/work_10/{{$item->name}}" style="width: 100%;" alt="Attachment">
                                                @endif
                                            </div>
                                        </span>
                                        <div class="mailbox-attachment-info">
                                            <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i><span id="name_{{$item->id}}">{{$item->name}}</span></p>
                                            <span class="mailbox-attachment-size">
                                                <span id="size_{{$item->id}}">{{$item->size}}</span>
                                                <a target="_black" href="/storage/files/work_10/{{$item->name}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <hr>
                    @if ($id->commentary)
                        <p><b>Comentarios quien aprueba</b><br>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
                    @endif
                    @if ($id->estado == 'Aprobado')
                    <br><hr><br>
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
                    <p>SEÑOR FUNCIONARIO EMISOR DEL PRESENTE PERMISO DE TRABAJO, TENGA PRESENTE QUE ES OBLIGATORIO ANTES DE INICIAR ACTIVIDADES GARANTIZAR EL CONOCIMIENTO Y LAS RESTRICCIONES DEL PRESENTE PERMISO A LOS DEMÁS COMPAÑEROS INVOLUCRADOS EN LA PRESENTE ACTIVIDAD DE FORMA DIGITAL MEDIANTE EL MAIL ENVIADO A CADA UNO DE LOS FUNCIONARIOS INVOLUCRADOS EN LA PRESENTE ACTIVIDAD Y EN CASO DE QUE EL TRABAJO SE REALICE EN SITIOS DONDE INTERVIENEN TERCEROS AJENOS A ENERGITELCO SAS, TENGA PRESENTE QUE ANTES DE INICIAR LABORES OBLIGATORIAMENTE DEBE PROCEDER A IMPRIMIR FÍSICAMENTE EL PRESENTE DOCUMENTO Y PUBLICARLO EN LOS LÍMITES DE LA ZONA DE TRABAJO O DE LA DEMARCACIÓN Y CERRAMIENTO QUE HIZO DE SU ZONA DE TRABAJO.</p>
                    @else
                        @if ($id->estado == "Sin aprobar")
                            @can('Aprobar retiro de cesantías')
                                <div class="form-group">
                                    <label for="letter4">
                                        @if ($id->reason == 'carta laboral')
                                            Carta laboral
                                        @else
                                            Carta de retiro de cesantías
                                        @endif
                                    </label>
                                    @if ($id->reason == 'carta laboral')
                                        <textarea name="letter4" id="letter4" cols="6" rows="3" class="form-control">Por medio de la presente se quiere dejar constancia de que el señor(a) {{$id->responsableAcargo->name}} número de identificación {{$id->responsableAcargo->cedula}} trabaja con Energitelco S.A.S. desde el {{$date['day']}} de {{$date['month']}} de {{ $date['year']}} desempeñándose como {{$id->responsableAcargo->position->name}}, con contrato a término {{$id->responsableAcargo->register->hasContract()->type_contract}} {{$id->responsableAcargo->register->hasContract()->type_contract == 'Definido' ? 'por '.$id->responsableAcargo->register->hasContract()->months.' meses' : ''}} y actualmente percibe los siguientes ingresos.</textarea>
                                    @else
                                        <textarea name="letter4" id="letter4" cols="6" rows="3" class="form-control">Según el asunto en referencia, me permito autorizar el retiro de las cesantías del señor {{$id->responsableAcargo->name}} con Cédula de Ciudadanía número {{$id->responsableAcargo->cedula}}, quien labora en nuestra compañía ENERGÍA PARA TELECOMUNICACIONES S.A.S, NIT: 900082621-1 desde el {{$date['day']}} de {{$date['month']}} de {{$date['year']}} hasta la fecha. Se autoriza el retiro de las siguientes cesantías @switch($id->reason)
                                            @case('vivienda') para financiación vivienda. @break
                                            @case('educacion') para financiación la educación. @break
                                            @case('acciones') para comprar acciones en las empresas del estado. @break
                                            @default 
                                        @endswitch</textarea>
                                    @endif
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="pre_commentary">Comentarios quien aprueba</label>
                                    <textarea name="commentary" id="pre_commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                                </div>
                            </form>
                            @endcan    
                        @endif
                    @endif
                    </div>
                    <div class="box-footer">
                        @if ($id->estado == 'Sin aprobar')
                            @can('Aprobar retiro de cesantías')
                                <a class="btn btn-sm btn-primary btn-send" href="{{ route('request_withdraw_severance_approve',$id->id) }}"
                                        onclick="aprobar()">
                                    Aprobar y firmar
                                </a>
                                <a class="btn btn-sm btn-danger btn-send" href="{{ route('request_withdraw_severance_approve',$id->id) }}"
                                        onclick="no_aprobar()">
                                    No aprobar
                                </a>
                                <form id="approval_work_no" action="{{ route('request_withdraw_severance_approve',$id->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                        <input type="hidden" name="status" value="No aprobado">
                                    <textarea name="commentary" id="commentary_b" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                                </form>
                            @endcan
                        @endif
                    </div>
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
            document.getElementById('commentary_b').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_no').submit();
        }
        function aprobar() {
            event.preventDefault();
            document.getElementById('approval_work').submit();
        }
    </script>
@endsection