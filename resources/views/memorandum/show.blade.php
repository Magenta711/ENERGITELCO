@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Mostrar memorando
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Memorandos</a></li>
        <li class="active">Mostrar memorando</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('memorandum')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <p>{{$id->header}}</p>
            <hr>
            <h4>Asunto</h4>
            <p>{{$id->affair}}</p>
            <hr>
            <h4>Referencias</h4>
            <p>{!!str_replace("\n", '</br>', addslashes($id->references))!!}</p>
            <hr>
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        Firmado electrónicamente por el auditor
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsable_memo->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsable_memo->cedula}}</div>
                            </div>
                            <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->responsable_memo->name}}</strong> en rol de {{$id->responsable_memo->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            @if ($id->responsable == auth()->id())
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#memo_info">Informacion</button>
                <!-- Modal create -->
                <div class="modal fade" id="memo_info" tabindex="-1" role="dialog" aria-labelledby="memo_infoTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Información de memorando - {{$id->affair}}</h4>
                            </div>
                            <div class="modal-body">
                                <h4>Leído y firmado por</h4>
                                @foreach ($id->receivers as $receiver)
                                    @if($receiver->state == 1)
                                        <hr style="width: 40%; margin-top: 5px; margin-bottom: 5px;">
                                        {{$receiver->user->name}} - <small>{{$receiver->updated_at}}</small>
                                    @endif
                                @endforeach
                                <hr>
                                <h4>Sin leer ni firmar por</h4>
                                @foreach ($id->receivers as $receiver)
                                    @if($receiver->state == 0)
                                        {{$receiver->user->name}} - <small>{{$receiver->created_at}}</small>
                                        <hr style="width: 40%; margin-top: 5px; margin-bottom: 5px;">
                                    @endif
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($id->receivers as $receiver)
                    @if ($receiver->user->id == auth()->id() && $receiver->state == 0)
                        <a class="btn btn-sm btn-primary" href="{{ route('memorandum_update',$id->id) }}"
                                onclick="event.preventDefault();
                                            document.getElementById('memorandum_update').submit();">
                            Confirmar y firmar
                        </a>
                        <form id="memorandum_update" action="{{ route('memorandum_update',$id->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection