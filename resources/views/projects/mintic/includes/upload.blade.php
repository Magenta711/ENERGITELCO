<form id="form_{{ $num }}">
    <div class="form-group">
        <label for="item_{{ $num }}">{{ $it }}. {{ $label }}</label><br>
        <small>{!! $description ?? '' !!}</small>
        <div class="row">
            <div class="col-md-8">
                @php
                    $hasFile = 0;
                @endphp
                @foreach ($id->files as $item)
                    @if ($item->description == $ltt . '. ' . $label)
                        @php
                            $hasFile = 1;
                        @endphp
                        <div class="row" id="exit_{{ $num }}">
                            <div class="col-md-4">
                                <span
                                    class="mailbox-attachment-icon {{ strtolower($item->type) == 'jpg' || strtolower($item->type) == 'png' || strtolower($item->type) == 'jpeg' ? 'has-img' : '' }}"
                                    id="icon_{{ $num }}">
                                    <div id="type_{{ $num }}">
                                        @if (strtolower($item->type) == 'pdf')
                                            <i class="fa fa-file-pdf"></i>
                                        @endif
                                        @if (strtolower($item->type) == 'docx' || strtolower($item->type) == 'doc')
                                            <i class="fa fa-file-word"></i>
                                        @endif
                                        @if (strtolower($item->type) == 'xlsx' || strtolower($item->type) == 'xls')
                                            <i class="fa fa-file-excel"></i>
                                        @endif
                                        @if (strtolower($item->type) == 'png' || strtolower($item->type) == 'jpg' || strtolower($item->type) == 'jpeg')
                                            <img src="/storage/upload/mintic/{{ $item->name }}" style="width: 100%;"
                                                alt="Attachment">
                                        @endif
                                        @if (strtolower($item->type) == 'mp4' || strtolower($item->type) == 'MP4')
                                            <video controls width="100%"
                                                src="/storage/upload/mintic/{{ $item->name }}"></video>
                                        @endif
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i><span
                                            id="name_{{ $num }}">{{ $item->name }}</span></p>
                                    <span class="mailbox-attachment-size">
                                        <span id="size_{{ $num }}">{{ $item->size }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        {!! $item->commentary != '' ? '<p>' . $item->commentary . '</p>' : '' !!}
                        <input type="hidden" name="file_id" id="file_id" value="{{ $item->id }}" class="form-control">
                    @endif
                @endforeach
                @if (!$hasFile)
                    <div class="row" id="upload_ready_{{ $num }}" style="display: none;">
                        <div class="col-md-3">
                            <span class="mailbox-attachment-icon" id="icon_{{ $num }}">
                                <div id="type_{{ $num }}">
                                </div>
                            </span>
                            <div class="mailbox-attachment-info">
                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i><span
                                        id="name_{{ $num }}"></span></p>
                                <span class="mailbox-attachment-size">
                                    <span id="size_{{ $num }}"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
                <div id="file_new_{{ $num }}" style="{{ $hasFile ? 'display: none;' : '' }}">
                    <div class="row">
                        <div class="form-group col-sm-{{ isset($size_letter) ? 4 : 6 }}">
                            <label for="color_{{ $num }}">Color letra</label>
                            <input type="color" name="color" value="#FFFFFF" id="color_{{ $num }}"
                                class="form-control">
                        </div>
                        @if (isset($size_letter))
                            <div class="form-group col-sm-4">
                                <label for="size_letter_{{ $num }}">Tamaño de letra</label>
                                <select name="size_letter" id="size_letter_{{ $num }}" class="form-control">
                                    <option value="9" {{ $size_letter && $size_letter == 9 ? 'selected' : '' }}>
                                        9 pt
                                    </option>
                                    <option value="10" {{ $size_letter && $size_letter == 10 ? 'selected' : '' }}>
                                        10 pt
                                    </option>
                                    <option value="11" {{ $size_letter && $size_letter == 11 ? 'selected' : '' }}>
                                        11 pt
                                    </option>
                                    <option value="12" {{ $size_letter && $size_letter == 12 ? 'selected' : '' }}>
                                        12 pt
                                    </option>
                                    <option value="13" {{ $size_letter && $size_letter == 13 ? 'selected' : '' }}>
                                        13 pt
                                    </option>
                                    <option value="14" {{ $size_letter && $size_letter == 14 ? 'selected' : '' }}>
                                        14 pt
                                    </option>
                                    <option value="15" {{ $size_letter && $size_letter == 15 ? 'selected' : '' }}>
                                        15 pt
                                    </option>
                                    <option value="16" {{ $size_letter && $size_letter == 16 ? 'selected' : '' }}>
                                        16 pt
                                    </option>
                                    <option value="17" {{ $size_letter && $size_letter == 17 ? 'selected' : '' }}>
                                        17 pt
                                    </option>
                                    <option value="18" {{ $size_letter && $size_letter == 18 ? 'selected' : '' }}>
                                        18 pt
                                    </option>
                                    <option value="19" {{ $size_letter && $size_letter == 19 ? 'selected' : '' }}>
                                        19 pt
                                    </option>
                                    <option value="20" {{ $size_letter && $size_letter == 20 ? 'selected' : '' }}>
                                        20 pt
                                    </option>
                                    <option value="21" {{ $size_letter && $size_letter == 21 ? 'selected' : '' }}>
                                        21 pt
                                    </option>
                                    <option value="22" {{ $size_letter && $size_letter == 22 ? 'selected' : '' }}>
                                        22 pt
                                    </option>
                                    <option value="23" {{ $size_letter && $size_letter == 23 ? 'selected' : '' }}>
                                        23 pt
                                    </option>
                                </select>
                            </div>
                        @endif
                        <div class="form-group col-sm-{{ isset($size_letter) ? 4 : 6 }}">
                            <label for="date">Fecha de rotulo</label>
                            <input type="datetime-local" name="date" id="date_{{ $num }}"
                                class="form-control">
                        </div>
                        <div
                            class="form-group col-sm-{{ isset($size_letter) ? (isset($date_edit) && $date_edit ? 12 : 4) : (isset($date_edit) && $date_edit ? 12 : 6) }}">
                            <label for="commentary">Comentario</label>
                            {{-- <input type="text" name="commentary" id="commentary_{{$num}}"> --}}
                            <textarea name="commentary" id="commentary_{{ $num }}" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $id->id }}" class="form-control">
                        <input type="hidden" name="vol" value="{{ $energy_measurement ?? '' }}">
                        <input type="hidden" name="name_d" value="{{ $ltt }}. {{ $label }}"
                            class="form-control">
                        <input type="hidden" name="place" value="{{ $place ?? '' }}" class="form-control">
                        <input type="hidden" name="size" value="{{ $size ?? '' }}" class="form-control">
                        <input type="hidden" name="write" value="{{ $write ?? '' }}" class="form-control">
                        <label for="item_{{ $num }}" class="form-control text-center"
                            id="label_file_{{ $num }}"><i class="fa fa-upload"></i></label>
                        <input type="file" accept="{{ $accept }}" {{ $hasFile ? 'disabled' : '' }}
                            name="file" id="item_{{ $num }}" class="file_input hide">
                    </div>
                </div>
                <small class="text-success" id="result_{{ $num }}"></small>
            </div>
            <div class="col-md-4">
                <button id="{{ $num }}"
                    class="btn btn-sm {{ $hasFile ? 'btn-success btn-load-again' : 'btn-primary btn-upload' }}">{{ $hasFile ? 'Cargar de nuevo' : 'Subir' }}</button>
                <button id="delete_{{ $num }}"
                class="btn btn-sm btn-danger btn-delete" style="{{!(isset($delete) && $delete && $hasFile) ? 'display: none;' : ''}}">Eliminar</button>
            </div>
        </div>
    </div>
</form>
