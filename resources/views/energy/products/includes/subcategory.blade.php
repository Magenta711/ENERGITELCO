<div class="modal fade category-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><b>Nueva Subcategoría</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('energy_products_subcategory.store', $id->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subcategory">Nombre de la Subcategoría</label>
                                <input type="text" class="form-control" id="subcategory" name="subcategory" placeholder="Ingrese el nombre de la subcategoría" required>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                              <button class="btn btn-success submit">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
