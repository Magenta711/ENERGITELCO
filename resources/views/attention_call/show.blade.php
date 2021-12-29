@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Mostrar descargo, llamados de atención y felicitaciones <small>Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Usuarios</a></li>
        <li><a href="#"> Descargos de atención</a></li>
        <li class="active">Mostrar descargo, llamados de atención y felicitaciones</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('attention_call')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            @include('attention_call.include.attention_body')
        </div>
        <div class="box-footer">
            @if ($id->state == 'Sin aprobar'  || $id->state == 'Sin argumentos' && $id->created_at < now()->subMonths(1)->format('Y-m-d H:i:s'))
                @can('Aprobar llamados de atención')
                    <a class="btn btn-sm btn-primary" href="{{ route('approve_call',$id->id) }}"
                        onclick="event.preventDefault();
                                        document.getElementById('approve_call').submit();">
                        Aprobar y firmar
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{ route('not_approve_call',$id->id) }}"
                            onclick="event.preventDefault();
                                        document.getElementById('not_approve_call').submit();">
                        No aprobar
                    </a>
                    <form id="not_approve_call" action="{{ route('not_approve_call',$id->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                @endcan
            @endif
            {{-- @if ($id->state == 'Aprobado')
                <a href="" class="btn btn-danger btn-sm">Descargar</a>
            @endif --}}
            <hr>
            <div class="row">
                @if ($id->comment && $id->approver != $id->responsable )
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                Firmado electrónicamente por quien aprueba
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->approverCall->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->approverCall->cedula}}</div>
                            </div>
                            <p>Solicitud firmada electrónicamente por <strong>{{$id->approverCall->name}}</strong> en rol de {{$id->approverCall->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    </div>
                </div>
                @endif
                @if ($id->arguments)
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                Firmado electrónicamente por el auditor o coordinador
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->receiverCall->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->receiverCall->cedula}}</div>
                            </div>
                            <p>Solicitud firmada electrónicamente por <strong>{{$id->receiverCall->name}}</strong> en rol de {{$id->receiverCall->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                Firmado electrónicamente por el receptor
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsableCall->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsableCall->cedula}}</div>
                            </div>
                            <p>Solicitud firmada electrónicamente por <strong>{{$id->responsableCall->name}}</strong> en rol de {{$id->responsableCall->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
{{-- wysihtml5-supported --}}
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
@endsection
@section('js')
    <script src="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <script>
        $(function () {
            $('.textarea').wysihtml5();
        })
    </script>
@endsection