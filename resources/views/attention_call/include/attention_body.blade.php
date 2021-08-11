<p>{{$id->header}}</p>
<h4>Señor:</h4>
<p>{{$id->receiverCall->name}}</p>
<p>{{$id->receiverCall->position->name}}</p>
<hr>
<h4>Asunto</h4>
<p>{{$id->affair}}</p>
<hr>
<h4>Referencias</h4>
<p>{!!str_replace("\n", '</br>', addslashes($id->references))!!}</p>
<hr>
<h4>Argumentos que dio el trabajador</h4>
@if ($id->arguments)
<p>{!!str_replace("\n", '</br>', addslashes($id->arguments))!!}</p>
@else
<p>Sin argumentos</p>
@endif
@if ($id->type)
<hr>
<h4>Tipo</h4>
<p>{{$id->type}}</p>
@endif
@if ($id->comment)
<hr>
<h4>Comentarios por el aprobador</h4>
<p>{!!str_replace("\n", '</br>', addslashes($id->comment))!!}</p>
@endif
@if ($id->files)
<hr>
<h4>Archivos adjuntos</h4>
    @foreach ($id->files as $file)
        @php
        @endphp
        <div class="col-md-4 col-sm-4">
            <span
                class="mailbox-attachment-icon {{ $file->type == 'jpg' || $file->type == 'png' || $file->type == 'jpeg' ? 'has-img' : '' }}"
                id="icon_{{ $file->id }}">
                <div id="type_{{ $file->id }}">
                    @if (strtolower($file->type) == 'pdf')
                        <i class="fa fa-file-pdf"></i>
                    @endif
                    @if (strtolower($file->type) == 'docx' || strtolower($file->type) == 'doc')
                        <i class="fa fa-file-word"></i>
                    @endif
                    @if (strtolower($file->type) == 'xlsx' || strtolower($file->type) == 'xls')
                        <i class="fa fa-file-excel"></i>
                    @endif
                    @if (strtolower($file->type) == 'pptx' || strtolower($file->type) == 'ppt')
                        <i class="fa fa-file-powerpoint"></i>
                    @endif
                    @if (strtolower($file->type) == 'png' || strtolower($file->type) == 'jpg' || strtolower($file->type) == 'jpeg')
                        <img src="/storage/human_management/call_attention/{{ $file->name }}"
                            style="width: 100%;" alt="Attachment">
                    @endif
                    @if (strtolower($file->type) == 'mp3')
                        <i class="fa fa-file-audio"></i>
                    @endif
                    @if (strtolower($file->type) == 'mp4' || strtolower($file->type) == 'MP4')
                        <i class="fa fa-file-video"></i>
                    @endif
                </div>
            </span>
            <div class="mailbox-attachment-info">
                <p class="mailbox-attachment-name"
                    style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"
                    data-toggle="tooltip" title="{{ $file->name }}"><i
                        class="fa fa-paperclip"></i><span
                        id="name_{{ $file->id }}">{{ $file->name }}</span>
                </p>
                <span class="mailbox-attachment-size">
                    .
                    <span
                        id="size_{{ $file->id }}">{{ $file->size }}</span>
                    <a target="_black"
                        href="/storage/human_management/call_attention/{{ $file->name }}"
                        class="btn btn-default btn-xs pull-right"><i
                            class="fa fa-download"></i></a>
                </span>
            </div>
        </div>
    @endforeach
@endif

@if (!isset($arg) && ($id->state == 'Sin aprobar' || $id->state == 'Sin argumentos') && $id->created_at < now()->subMonths(3)->format('Y-m-d H:i:s'))
    @can('Aprobar llamados de atención')
        <form id="approve_call" action="{{ route('approve_call',$id->id) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            <hr>
            <div class="form-group">
                <label for="type">Tipo de descargo</label>
                <select name="type" id="type" class="form-control">
                    <option selected disabled></option>
                    <option {{$id->type == 'Llamado de atención' ? 'selected' : '' }} value="Llamado de atención">Llamado de atención</option>
                    <option {{$id->type == 'Notificación' ? 'selected' : '' }} value="Notificación">Notificación</option>
                    <option {{$id->type == 'Felicitaciones' ? 'selected' : '' }} value="Felicitaciones">Felicitaciones</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comentarios</label>
                <textarea name="comment" id="comment" cols="30" rows="3" class="form-control textarea">{{old('comment')}}</textarea>
            </div>
        </form>
    @endcan
@endif