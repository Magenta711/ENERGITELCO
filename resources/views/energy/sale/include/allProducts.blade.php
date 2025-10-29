<div class="modal fade all-products-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Productos Vendidos</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($sale->AllProducts() as $item)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="serial">Serie</label>
                                <p>{{ $item['details']['serie'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="model">Modelo</label>
                                <p>{{ $item['details']['model'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="type">Tipo de Equipo</label>
                                <p>{{ $item['details']['type'] }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
