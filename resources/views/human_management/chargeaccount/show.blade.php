@extends('lte.layouts')
@section('content')
    <section class="content-header">
        <h1>
            Cuenta de cobro
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#"> Cuenta de cobro</a></li>
            <li class="active">Ver</li>
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
                            <p>$ {{number_format($id->value,2,',','.')}}</p>
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
                            <label>De donde saldrán los recursos para el gasto</label>
                            <p>{{$id->expense_type}}</p>
                        </div>
                    </div>
                    @if ($id->files)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="file">Adjuntos</label>
                                <div class="row">
                                    @foreach ($id->files as $file)
                                        <div class="col-md-3">
                                            <span class="mailbox-attachment-icon has-img">
                                                <div>
                                                    @if ($file->extencion == 'pdf')
                                                        <i class="fa fa-file-pdf"></i>
                                                    @endif
                                                    @if ($file->extencion == 'docx' || $file->extencion == 'doc')
                                                        <i class="fa fa-file-word-o"></i>
                                                    @endif
                                                    @if ($file->extencion == 'png' || $file->extencion == 'jpg' || $file->extencion == 'jpeg')
                                                        <img src="/storage/upload/chargeAccount/{{$file->nombre}}" style="width: 100%;" alt="Attachment">
                                                    @endif
                                                </div>
                                            </span>
                                            <div class="mailbox-attachment-info">
                                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$file->nombre}}</p>
                                                <span class="mailbox-attachment-size">
                                                    KB
                                                    <a target="_black" href="/storage/upload/chargeAccount/{{$file->nombre}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($id->signature)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Firma</label><br>
                                <img src="{{route('uploads',$id->signature->file)}}" alt="">
                            </div>
                        </div>
                    @endif
                </div>
                @if ($id->status == 0)
                    <div class="form-group">
                        <label for="pre_commentary">Comentarios quien aprueba</label>
                        <textarea name="commentary" id="pre_commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                    </div>
                @elseif($id->status == 1 || $id->status == 2)
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <div class="box-title">
                                    Firmado electrónicamente por el auditor o coordinador
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6"><strong>Nombre: </strong>{{$id->approve->name}}</div>
                                    <div class="col-md-6"><strong>Cédula: </strong>{{$id->approve->cedula}}</div>
                                </div>
                                <p>Solicitud firmada electrónicamente por <strong>{{$id->approve->name}}</strong> en rol de {{$id->approve->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($id->user_id)    
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <div class="box-title">
                                    Firmado electrónicamente por el responsable
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6"><strong>Nombre: </strong>{{$id->user->name}}</div>
                                    <div class="col-md-6"><strong>Cédula: </strong>{{$id->user->cedula}}</div>
                                </div>
                                <p>Solicitud firmada electrónicamente por <strong>{{$id->user->name}}</strong> en rol de {{$id->user->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="box-footer">
                @if ($id->status == 0)
                    <div class="box-footer">
                        <button class="btn btn-sm btn-primary btn-send" onclick="aprobar()">Aprobar</button>
                        <button class="btn btn-sm btn-danger btn-send" onclick="no_aprobar()">No aprobar</button>
                    </div>
                    <form id="form_approval" action="{{ route('chargeaccount_approve',$id->id) }}" method="POST" style="form_dis;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Aprobado">
                        <textarea name="commentary" id="commentary_a" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                    </form>
                    <form id="form_no_approval" action="{{ route('chargeaccount_approve',$id->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="No aprobado">
                        <textarea name="commentary" id="commentary_b" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                    </form>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function aprobar() {
            event.preventDefault();
            document.getElementById('commentary_a').value=document.getElementById('pre_commentary').value;
            document.getElementById('form_approval').submit();
        }
        function no_aprobar() {
            event.preventDefault();
            document.getElementById('commentary_b').value=document.getElementById('pre_commentary').value;
            document.getElementById('form_no_approval').submit();
        }
    </script>
@endsection