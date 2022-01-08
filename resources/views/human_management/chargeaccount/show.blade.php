@extends('lte.layouts')
@section('content')
    <section class="content-header">
        <h1>
            Cuenta de cobro
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#"> Cuenta de cobro</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    Cuenta de cobro
                </div>
                <div class="box-tools">
                    <a href="{{route('chargeaccount')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">Cuidad</label>
                            <p>{{$id->city}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <p>{{$id->date}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre completo</label>
                            <p>{{$id->name}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="document">Número de identificación</label>
                            <p>{{$id->document}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="concept">Concepto</label>
                            <p>{{$id->concept}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="value">Valor</label>
                            <p>{{$id->value}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bank_account">Número de cuenta</label>
                            <p>{{$id->bank_account}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type_bank_account">Tipo de cuenta</label>
                            <p>{{$id->type_bank_account}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Correo electronico</label>
                            <p>{{$id->email}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="file">Adjuntos</label>
                            @if ($id->files)
                                <div class="row">
                                    @foreach ($id->files as $file)
                                        <div class="col-md-3">
                                            <span class="mailbox-attachment-icon has-img">
                                                <div>
                                                    @if ($file->extencion == 'pdf')
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    @endif
                                                    @if ($file->extencion == 'docx' || $file->extencion == 'doc')
                                                        <i class="fa fa-file-word-o"></i>
                                                    @endif
                                                    @if ($file->extencion == 'png' || $file->extencion == 'jpg' || $file->extencion == 'jpeg')
                                                        <img src="/storage/human_management/work_permit/{{$file->nombre}}" style="width: 100%;" alt="Attachment">
                                                    @endif
                                                </div>
                                            </span>
                                            <div class="mailbox-attachment-info">
                                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$file->nombre}}</p>
                                                <span class="mailbox-attachment-size">
                                                    KB
                                                    <a target="_black" href="/storage/human_management/work_permit/{{$file->nombre}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Firma</label>
                            {{-- <p>{{$id->signaturebles->file}}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection