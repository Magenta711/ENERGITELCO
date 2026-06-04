<div class="modal fade delete-category-{{ $item->id }}-modal-lg" id="deleteModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Advertencia!</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('energy_products_category.delete', [$item->category_id, $item->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-body text-center">
            <h4>¿Está seguro de eliminar todos los productos de la misma subcategoría {{ $item->name }}?</h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar Productos</button>
          </div>
      </form>
    </div>
  </div>
</div>
