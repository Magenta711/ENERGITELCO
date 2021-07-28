<div class="modal fade" id="modal_answers_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Respuesta</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->answers as $answer)
                            <td>{{$answer->user->name}}</td>
                            <td>{!!$answer->answer ? '<span class="label '.(($answer->answer->answer == 1) ? 'label-primary' : 'label-danger').'">'.$answer->answer->text_answer.'</span>' : '<span class="label label-warning">Sin responder</span>'!!}</td>
                            <td>{{$answer->created_at}}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
        </div>
    </form>
    </div>
    </div>
</div>