<form id="form_signature_{{$item->id}}">
    <div class="row">
        <div class="col-sm-4">
            <input type="hidden" name="id" value="{{$item->id}}">
            <p><b>{{$item->name}}</b></p>
            <span class="mailbox-attachment-icon {{$item->file->type == "jpg" || $item->file->type == "png" || $item->file->type == "jpeg" ? 'has-img' : ''}}" id="icon">
                <div id="type">
                    @if ($item->file->type=='pdf')
                        <i class="fa fa-file-pdf"></i>
                    @endif
                    @if ($item->file->type=='docx' || $item->file->type=='doc')
                        <i class="fa fa-file-word"></i>
                    @endif
                    @if ($item->file->type=='xlsx' || $item->file->type=='xls')
                        <i class="fa  fa-file-excel"></i>
                    @endif
                    @if ($item->file->type=='pptx' || $item->file->type=='ppt')
                        <i class="fa  fa-file-powerpoint"></i>
                    @endif
                    @if ($item->file->type == 'png' || $item->file->type == 'jpg' || $item->file->type == 'jpeg')
                        <img src="{{ storage_path().'/private/documents/'.$item->file->name }}" style="width: 100%;" alt="Attachment">
                    @endif
                </div>
            </span>
            <div class="mailbox-attachment-info">
                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$item->file->name}}</p>
                <span class="mailbox-attachment-size">
                    {{$item->file->size}}
                    <a href="{{route('documents_download',$item->id)}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                </span>
            </div>
            <div class="box" id="result_signature_{{$item->id}}" style="display: none">
                <div class="box-body">
                    <h6>Firmado electrónicamente por el responsable del trabajo o líder</h6>
                    <div class="row">
                        <div class="col-md-6"><strong>Nombre: </strong>{{auth()->user()->name}}</div>
                        <div class="col-md-6"><strong>Cédula: </strong>{{auth()->user()->cedula}}</div>
                    </div>
                    <p>Firmada electrónicamente por <strong>{{auth()->user()->name}}</strong>, en rol de {{auth()->user()->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                </div>
            </div>
            <br>
            @php
                $hasNoSignature = true;
            @endphp
            @if ($id->register->user && $id->register->user->signatures)
                @foreach ($id->register->user->signatures as $signature)
                    @if ($signature->id == $item->id)
                        @php
                            $sema = 1;
                            $hasNoSignature = false;
                        @endphp
                        <div class="box">
                            <div class="box-body">
                                <h6>Firmado electrónicamente por el trabajo</h6>
                                <div class="row">
                                    <div class="col-md-6"><strong>Nombre: </strong>{{$id->register->user->name}}</div>
                                    <div class="col-md-6"><strong>Cédula: </strong>{{$id->register->user->cedula}}</div>
                                </div>
                                <p>Firmada electrónicamente por <strong>{{$id->register->user->name}}</strong>, en rol de {{$id->register->user->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                @if ($hasNoSignature && $sema == 1)
                    <small class="label bg-red">No cuenta con firma</small>
                @endif
                @if ($sema == 0 && $id->register->user->id == auth()->id() )
                    <button type="button" id="sig_{{$item->id}}" class="btn btn-sm btn-primary btn-signature">Firmar</button>
                @endif
            @endif
        </div>
    </div>
</form>