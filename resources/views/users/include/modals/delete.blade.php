<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form id="deleteForm">
            @csrf
            @method('DELETE')
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLongTitle">Eliminar usuario</h4>
        </div>
        <div class="modal-body">
            <p>¿Está seguro de eliminar el usuario <span id="delete-name"></span>?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-sm btn-danger" id="delete-submit">Eliminar</button>
        </div>
        </form>
    </div>
    </div>
</div>