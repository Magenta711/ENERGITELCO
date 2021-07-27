<div class="modal fade" id="modal_show_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="{{ route('learned_lessons_test_store') }}" method="POST">
            @csrf
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLongTitle">Ver pregunta</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="question">Pregunta</label>
                <p>{{$item->question}}</p>
            </div>
            <p><b>Respuestas</b></p>
            <ul class="list-group">
            @foreach ($item->options as $option)
                <li class="list-group-item{{$option->answer == 1 ? ' bg-gray' : ''}}">{{$option->text_answer}}</li>
            @endforeach
            </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
    </div>
    </div>
</div>