<div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="{{ route('cvs_inventary_claro_services_delete',$item->id) }}" method="POST">
            @csrf
            @method('DELETE')
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLongTitle">Eliminar servicios claro</h4>
        </div>
        <div class="modal-body">
            <p>¿Está seguro de eliminar el servicios claro {{ $item->description }} de forma permanente?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
        </div>
        </form>
    </div>
    </div>
</div>