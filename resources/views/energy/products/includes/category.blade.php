<div class="modal fade category-create-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><b>Nueva Categoría</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('energy_products_category.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">Nombre de la Categoría</label>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Ingrese el nombre de la categoría" required>
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
