@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Mostrar solicitud de empleo <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Solicitudes de empleo</a></li>
        <li class="active">Mostrar solicitud de empleo</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-title">Solicitud de empleo</div>
            <div class="box-tools">
                <a href="{{route('job_application')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            
            <p><Strong>Nombre del aspirante</Strong><br>{{$id->name}}</p>
            <hr>
            <p><Strong>Correo electrónico</Strong><br>{{$id->email}}</p>
            <hr>
            <p><Strong>Numero de contacto</Strong><br>{{$id->tel}}</p>
            <hr>
            <p><Strong>Cargo al que aspira</Strong><br>{{$id->position->name}}</p>
            <hr>
            <p><Strong>Comentarios</Strong><br>{{$id->comentary}}</p>
            <hr>
            <p>
                <Strong>Hoja de vida o archivo adjunto</Strong>
            </p>
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <span class="mailbox-attachment-icon" id="icon">
                        <div id="type">
                            <i class="fa fa-file-pdf"></i>
                        </div>
                    </span>
                    <div class="mailbox-attachment-info">
                        <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->file}}</p>
                        <span class="mailbox-attachment-size">
                            11 KB
                            <a target="_black" href="/file/work_with_us/{{$id->file}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection