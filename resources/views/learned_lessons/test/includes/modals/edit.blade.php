<div class="modal fade" id="modal_edit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="{{ route('learned_lessons_test_update',$item->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLongTitle">Editar pregunta</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="question">Pregunta</label>
                <input type="text" name="question" id="question" class="form-control" value="{{$item->question}}">
            </div>
            <p><b>Respuestas</b></p>
            <div id="destino-option-edit-{{$item->id}}">
                @php
                    $i = 0;
                @endphp
                @foreach ($item->options as $option)
                    <div id="origen-option-edit-{{$item->id}}" class="form-group">
                        <div class="custom-radio form-check" style="display: flex; margin-bottom: 5px;">
                            <input type="radio" id="radio" name="answer[{{$i}}]" class="input_radio" value="1" {{$option->answer ? 'checked' : ''}}>
                            <input type="text" name="text_answer[{{$i}}]" id="text-radio" class="form-control" value="{{$option->text_answer}}" placeholder="Opción" aria-describedby="button-addon2">
                            <button class="btn btn-sm" type="button"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
            <button type="button" class="btn btn-sm btn-link add-answer" id="add-answer-edit-{{$item->id}}"><i class="fa fa-plus"></i> agregar respuesta</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-sm btn-success">Guardar</button>
        </div>
    </form>
    </div>
    </div>
</div>