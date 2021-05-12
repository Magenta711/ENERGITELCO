@php
$hasFile = 0;
@endphp
<p><strong>{{$num}}. {{$label}}</strong></p>
@foreach ($id->files as $item)
    @if ($item->description == $label)
        @php
            $hasFile = 1;
        @endphp
        @if ($item->commentary)
            <p><span class="label {{ now() <= $item->commentary ? 'bg-green' : 'bg-red' }}">Fecha de vencimiento: {{$item->commentary}}</span></p>
        @endif
        <div class="row" id="exit_{{$num}}">
            <div class="col-md-3">
                <span class="mailbox-attachment-icon {{$item->type == "jpg" || $item->type == "png" || $item->type == 'jpeg' ? 'has-img' : ''}}" id="icon_{{$num}}">
                    <div id="type_{{$num}}">
                        @if ($item->type=='pdf' || $item->type=='PDF')
                            <i class="fa fa-file-pdf"></i>
                        @endif
                        @if ($item->type=='docx' || $item->type=='doc' || $item->type=='DOCX' || $item->type=='DOC')
                            <i class="fa fa-file-word"></i>
                        @endif
                        @if ($item->type=='png' || $item->type=='jpg' || $item->type=='jpeg')
                            <img src="/storage/upload/curriculim/{{$item->name}}" style="width: 100%;" alt="Attachment">
                        @endif
                    </div>
                </span>
                <div class="mailbox-attachment-info">
                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$item->name}}</p>
                    <span class="mailbox-attachment-size">
                        {{$item->size}}
                        <a target="_black" href="/storage/upload/curriculim/{{$item->name}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                    </span>
                </div>
            </div>
        </div>
    @endif
@endforeach
@if (!$hasFile)
    <p>No hay archivo</p>
@endif