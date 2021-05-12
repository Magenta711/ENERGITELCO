<div class="form-group">
    <label for="item_{{$num}}">{{$it}}. {{$label}}</label>
    {!!isset($description) ? '<br>' : ''!!}
    <small>{{ $description ?? '' }}</small>
    @if (isset($place))
        <br><small class="text-red">Foto directa al documento</small>
    @endif
    @php
        $hasFile = 0;
    @endphp
    @foreach ($id->files as $item)
        @if ($item->description == $ltt.'. '.$label)
            @php
                $hasFile = 1;
            @endphp
            <div class="row" id="exit_{{$num}}">
                <div class="col-md-6">
                    <span class="mailbox-attachment-icon {{$item->type == "jpg" || $item->type == "png" || $item->type == "jpeg" ? 'has-img' : ''}}" id="icon_{{$num}}">
                        <div id="type_{{$num}}">
                            @if (strtolower($item->type)=='pdf')
                                <i class="fa fa-file-pdf"></i>
                            @endif
                            @if (strtolower($item->type)=='docx' || strtolower($item->type)=='doc')
                                <i class="fa fa-file-word"></i>
                            @endif
                            @if (strtolower($item->type)=='xlsx' || strtolower($item->type)=='xls')
                                <i class="fa fa-file-excel"></i>
                            @endif
                            @if (strtolower($item->type) == 'png' || strtolower($item->type) == 'jpg' || strtolower($item->type) == 'jpeg')
                                <img src="/storage/upload/clearing/{{$item->name}}" style="width: 100%;" alt="Attachment">
                            @endif
                            @if (strtolower($item->type) == 'mp4' || strtolower($item->type) == 'MP4')
                                <video controls width="100%" src="/storage/upload/clearing/{{$item->name}}"></video>
                            @endif
                        </div>
                    </span>
                    <div class="mailbox-attachment-info">
                        <p class="mailbox-attachment-name" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;" data-toggle="tooltip" title="{{$item->name}}"><i class="fa fa-paperclip"></i><span id="name_{{$num}}">{{$item->name}}</span></p>
                        <span class="mailbox-attachment-size">
                            <span id="size_{{$num}}">{{$item->size}}</span>
                            <a target="_black" href="/storage/upload/clearing/{{$item->name}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    @if($hasFile == 0)
        <br><small class="text-red">Sin archivo</small>
    @endif
</div>