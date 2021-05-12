<div class="modal fade" id="modal_delete_{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="{{route('project_destroy',$project->id)}}" method="post">
            @csrf
            @method('DELETE')
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLongTitle">Eliminar projecto</h4>
        </div>
        <div class="modal-body">
            <p>¿Está seguro de eliminar el proyecto {{$project->name}}?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
        </div>
        </form>
    </div>
    </div>
</div>