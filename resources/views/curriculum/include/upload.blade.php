<form id="form_{{$num}}">
    <div class="form-group">
        <label for="item_{{$num}}">{{$num}}. {{$label}}</label>
        <div class="row">
            <div class="col-md-8">
            @php
                $hasFile = 0;
            @endphp
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
                                        <img src="/storage/upload/curriculim/{{$item->name}}" style="width: 100%;" alt="Attachment">
                                    @endif
                                    @if (strtolower($item->type) == 'mp4' || strtolower($item->type) == 'MP4')
                                        <video controls width="100%" src="/storage/upload/curriculim/{{$item->name}}"></video>
                                    @endif
                                </div>
                            </span>
                            <div class="mailbox-attachment-info">
                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i><span id="name_{{$num}}">{{$item->name}}</span></p>
                                <span class="mailbox-attachment-size">
                                    <span id="size_{{$num}}">{{$item->size}}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @if (!$hasFile)
                <div class="row" id="upload_ready_{{$num}}" style="display: none;">
                    <div class="col-md-3">
                        <span class="mailbox-attachment-icon" id="icon_{{$num}}">
                            <div id="type_{{$num}}">
                            </div>
                        </span>
                        <div class="mailbox-attachment-info">
                            <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i><span id="name_{{$num}}"></span></p>
                            <span class="mailbox-attachment-size">
                                <span id="size_{{$num}}"></span>
                            </span>
                        </div>
                    </div>
                </div>
            @endif
                <div id="file_new_{{$num}}" style="{{ ($hasFile) ? 'display: none;' : ''}}">
                    @if (isset($hasDate))
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="commentary">Fecha de vencimiento</label>
                                <input type="date" name="commentary" id="commentary" class="form-control">
                            </div>
                        </div>
                    @endif
                    <input type="hidden" name="id" value="{{$id->id}}" class="form-control">
                    <input type="hidden" name="name_d" value="{{$label}}" class="form-control">
                    <label for="item_{{$num}}" class="form-control text-center" id="label_{{$num}}"><i class="fa fa-upload"></i></label>
                    <input type="file" accept=".pdf, .doc, .docx, image/*" {{ ($hasFile) ? 'disabled' : ''}} name="file" id="item_{{$num}}" class="hide file_input">
                </div>
                <small class="text-success" id="result_{{$num}}"></small>
            </div>
            <div class="col-md-4">
                <button id="{{$num}}" class="btn btn-sm {{($hasFile) ? 'btn-success btn-load-again' : 'btn-primary btn-upload'}}">{{($hasFile) ? 'Cargar de nuevo' : 'Subir'}}</button>
            </div>
        </div>
    </div>
</form>