<div class="modal fade" id="modalStart_{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Suspender el proyecto</h4>
            </div>
            <form action="{{route('start_project',$project->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="modal-body">
                    <p>Esta seguro de reactivar el proyecto</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-success">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>