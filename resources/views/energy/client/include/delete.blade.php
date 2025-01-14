<div class="modal fade delete-{{ $item->id }}-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Advertencia!</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('energy_clients.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body text-center">
              <h4>¿Está seguro de eliminar el cliente?</h4>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Eliminar Producto</button>
            </div>
        </form>
      </div>
    </div>
  </div>
