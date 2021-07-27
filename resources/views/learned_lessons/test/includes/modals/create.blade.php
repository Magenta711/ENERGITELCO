<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="{{ route('learned_lessons_test_store') }}" method="POST">
            @csrf
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLongTitle">Crear pregunta</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="question">Pregunta</label>
                <input type="text" name="question" id="question" class="form-control">
            </div>
            <p><b>Respuestas</b></p>
            <div id="destino-option">
                <div id="origen-option" class="form-group">
                    <div class="custom-radio form-check" style="display: flex; margin-bottom: 5px;">
                        <input type="radio" id="radio" name="answer[0]" class="input_radio" value="1">
                        <input type="text" name="text_answer[0]" id="text-radio" class="form-control" value="Opción" placeholder="Opción" aria-describedby="button-addon2">
                        <button class="btn btn-sm" type="button"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-link" id="add-answer"><i class="fa fa-plus"></i> agregar respuesta</button>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-sm btn-success">Guardar</button>
        </div>
    </form>
    </div>
    </div>
</div>