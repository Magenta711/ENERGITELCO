@php
    $m = 0;
@endphp
@switch($question->type)
    @case(1)
    <div class="form-group" id="text-option">
        <input type="text" readonly name="text[]" id="text_{{$n}}" class="form-control">
    </div>
        @break
    @case(2)
        <div class="form-group" id="textarea-option">
            <textarea name="textarea[]" readonly id="textarea_{{$n}}" cols="30" rows="1" class="form-control"></textarea> 
        </div>
        @break
    @case(3)
        <div id="radio-option">
            <div class="form-group">
                <div id="option_destion_{{$n}}" class="option-new">
                    @foreach ($question->options as $option)
                    @php
                        $m++;
                    @endphp
                        <div id="option-radio_{{$n}}_{{$m}}" class="custom-radio form-check option-radio_{{$n}}" style="display: flex; margin-bottom: 5px;">
                            <input type="radio" id="radio_{{$n}}_{{$m}}" name="answer[{{$n}}]" class="custom-control-input input_radio" value="{{$option->option}}" {!! $option->option == $question->answer ? 'checked' : ''!!}>
                            <input type="text" name="text_radio[]" id="text-radio_{{$n}}_{{$m}}" class="form-control text_radio" value="{{$option->option}}" placeholder="Opción" aria-describedby="button-addon2">
                            <button class="btn btn-sm btn-delete-option-radio" id="delete_option_radio_{{$n}}_{{$m}}" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                        </div>
                    @endforeach
                </div>
            </div>
            <input id="num_option_{{$n}}" type="hidden" name="num_option[]" value="{{$m}}">
            <button id="new_option_radio_{{$n}}" class="btn btn-sm btn-link btn-new-option-radio"><i class="fas fa-plus"></i> Agregar opción</button>
        </div>
        @break
    @case(4)
        <div id="checkbox-option">
            <div class="form-group">
                <div id="option_destion_{{$n}}" class="option-new">
                    @foreach ($question->options as $option)
                    @php
                        $m++;
                    @endphp
                        <div id="option-checkbox_{{$n}}_{{$m}}" class="custom-checkbox form-check option-checkbox_{{$n}}"  style="display: flex; margin-bottom: 5px">
                            <input type="checkbox" name="checkbox" class="custom-control-input" id="customCheck_{{$n}}_{{$m}}">
                            <input type="text" name="text_checkbox[]" id="text-checkbox_{{$n}}_{{$m}}" class="form-control" value="{{$option->option}}" placeholder="Opción" aria-describedby="button-addon2">
                            <button class="btn btn-sm btn-delete-option-checkbox" id="delete_option_checkbox_{{$n}}_{{$m}}" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                        </div>
                    @endforeach
                </div>
            </div>
            <input id="num_option_{{$n}}" type="hidden" name="num_option[]" value="{{$m}}">
            <button id="new_option_checkbox_{{$n}}" class="btn btn-sm btn-link btn-new-option-checkbox"><i class="fas fa-plus"></i> Agregar opción</button>
        </div>
        @break
    @case(5)
        <div id="select-option">
            <div class="form-group">
                <div id="option_destion_{{$n}}" class="option-new">
                    @foreach ($question->options as $option)
                    @php
                        $m++;
                    @endphp
                        <div class="input-group mb-3" id="option-select_{{$n}}_{{$m}}"  style="display: flex; margin-bottom: 5px">
                            <input type="text" name="text_select[]" id="text-select_{{$n}}_{{$m}}" class="form-control" value="{{$option->option}}" placeholder="Opción" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-delete-option-select" id="delete_option_select_{{$n}}_{{$m}}" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <input id="num_option_{{$n}}" type="hidden" name="num_option[]" value="{{$m}}">
            <button id="new_option_select_{{$n}}" class="btn btn-sm btn-link btn-new-option-select"><i class="fas fa-plus"></i> Agregar opción</button>
        </div>
        @break
    @case(6)
        <div class="form-group" id="file-option">
            @php
                $m = 0;
            @endphp
            <label for="">Permitir solo archivos de tipo</label>
            <div class="form-check">
                <input type="checkbox" @foreach ($question->options as $option) @if ($option->option == 'document') checked @php $m++; @endphp @endif @endforeach value="document" name="type_file[]" class="form-check-input file_option_checked file_option_{{$n}}" id="file_option_1_{{$n}}">
                <label class="form-check-label" for="file_option_1_{{$n}}">
                    Documento
                </label>
            </div>
            <div class="form-check">
                <input type="checkbox" @foreach ($question->options as $option) @if ($option->option == 'worksheets') checked @php $m++; @endphp @endif  @endforeach value="worksheets" name="type_file[]" class="form-check-input file_option_checked file_option_{{$n}}" id="file_option_2_{{$n}}">
                <label class="form-check-label" for="file_option_2_{{$n}}">
                    Hoja de calculo
                </label>
            </div>
            <div class="form-check">
                <input type="checkbox" @foreach ($question->options as $option) @if ($option->option == 'pdf') checked @php $m++; @endphp @endif @endforeach value="pdf" name="type_file[]" class="form-check-input file_option_checked file_option_{{$n}}" id="file_option_3_{{$n}}">
                <label class="form-check-label" for="file_option_3_{{$n}}">
                    PDF
                </label>
            </div>
            <div class="form-check">
                <input type="checkbox" @foreach ($question->options as $option) @if ($option->option == 'image') checked @php $m++; @endphp @endif @endforeach value="image" name="type_file[]" class="form-check-input file_option_checked file_option_{{$n}}" id="file_option_4_{{$n}}">
                <label class="form-check-label" for="file_option_4_{{$n}}">
                    Imagen
                </label>
            </div>
            <div class="form-check">
                <input type="checkbox" @foreach ($question->options as $option) @if ($option->option == 'video') checked @php $m++; @endphp @endif @endforeach value="video" name="type_file[]" class="form-check-input file_option_checked file_option_{{$n}}" id="file_option_5_{{$n}}">
                <label class="form-check-label" for="file_option_5_{{$n}}">
                    Video
                </label>
            </div>
            <input id="num_option_{{$n}}" type="hidden" name="num_option_file[]" value="{{$m}}">
        </div>
        @break
    @case(7)
        <div class="form-group" id="date-option">
            <input type="date" readonly name="date[]" class="form-control">
        </div>
        @break
    @case(8)    
        <div class="form-group" id="time-option">
            <input type="time" readonly name="time[]" class="form-control">
        </div>
        @break
    @default
        
@endswitch