@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Mostrar documentos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Mostrar documentos</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">{{$id->code}} {{$id->name}} V_0{{$id->version}}</div>
            <div class="box-tools">
                <a href="{{route('documents')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="col-sm-8">
                <p><b>Código</b></p>
                <p>{{$id->code}}</p>
                <hr>
                <p><b>Nombre</b></p>
                <p>{{$id->name}}</p>
                <hr>
                <p><b>Versión</b></p>
                <p>{{$id->version}}</p>
                <hr>
                <p><b>Fecha</b></p>
                <p>{{$id->date}}</p>
                <hr>
                <p><b>Paginas</b></p>
                <p>{{$id->page_total}}</p>
                <hr>
                <p><b>Responsable</b></p>
                <p>{{$id->responsable->name}}</p>
                <hr>
                @if ($id->contract)
                    <p><b>Contratación</b></p>
                    <p>Si</p>
                @endif
                <hr>
                <p><b>Estado</b></p>
                <p>{{$id->status == 1 ? 'Activo' : 'Inactivo'}}</p>
            </div>
            <div class="col-sm-4">
                <span class="mailbox-attachment-icon {{$id->file->type == "jpg" || $id->file->type == "png" || $id->file->type == "jpeg" ? 'has-img' : ''}}" id="icon">
                    <div id="type">
                        @if ($id->file->type=='pdf')
                            <i class="fa fa-file-pdf"></i>
                        @endif
                        @if ($id->file->type=='docx' || $id->file->type=='doc')
                            <i class="fa fa-file-word"></i>
                        @endif
                        @if ($id->file->type=='xlsx' || $id->file->type=='xls')
                            <i class="fa  fa-file-excel"></i>
                        @endif
                        @if ($id->file->type=='pptx' || $id->file->type=='ppt')
                            <i class="fa  fa-file-powerpoint"></i>
                        @endif
                        @if ($id->file->type == 'png' || $id->file->type == 'jpg' || $id->file->type == 'jpeg')
                            <img {{ storage_path().'/private/documents/'.$id->file->name }} style="width: 100%;" alt="Attachment">
                        @endif
                    </div>
                </span>
                <div class="mailbox-attachment-info">
                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->file->name}}</p>
                    <span class="mailbox-attachment-size">
                        {{$id->file->size}}
                        <a href="{{route('documents_download',$id->id)}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection