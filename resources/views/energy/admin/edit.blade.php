<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-subtitle text-center">Modifica los valores correspondientes.</h4>
        </div>
        <form action="{{ route('energy_update', $id->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                    <p><b>Actualiza la información de los equipos del sistema solar.</b></p>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>Paneles solares</b></h4>
                            </div>
                            <div class="col-md-4">
                                <label for="ModelPanel">Modelo:</label>
                                <input type="text" class="form-control" id="ModelPanel" name="ModelPanel" value="{{ $id->ModelPanel }}">
                            </div>
                            <div class="col-md-4">
                                <label for="ValorPanel">Valor Unitario:</label>
                                <input type="number" class="form-control" id="ValorPanel" name="ValorPanel" value="{{ $id->ValorPanel }}">
                            </div>
                            <div class="col-md-4">
                                <label for="GarantiaPanel">Años de garantía:</label>
                                <input type="number" class="form-control" id="GarantiaPanel" name="GarantiaPanel" value="{{ $id->GarantiaPanel }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>Reguladores</b></h4>
                            </div>
                            <div class="col-md-4">
                                <label for="ModelRegulador">Modelo:</label>
                                <input type="text" class="form-control" id="ModelRegulador" name="ModelRegulador" value="{{ $id->ModelRegulador }}">
                            </div>
                            <div class="col-md-4">
                                <label for="ValorRegulador">Valor Unitario:</label>
                                <input type="number" class="form-control" id="ValorRegulador" name="ValorRegulador" value="{{ $id->ValorRegulador }}">
                            </div>
                            <div class="col-md-4">
                                <label for="GarantiaRegulador">Años de garantía:</label>
                                <input type="number" class="form-control" id="GarantiaRegulador" name="GarantiaRegulador" value="{{ $id->GarantiaRegulador }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>Baterías</b></h4>
                            </div>
                            <div class="col-md-4">
                                <label for="ModelBateria">Modelo:</label>
                                <input type="text" class="form-control" id="ModelBateria" name="ModelBateria" value="{{ $id->ModelBateria }}">
                            </div>
                            <div class="col-md-4">
                                <label for="ValorBateria">Valor Unitario:</label>
                                <input type="number" class="form-control" id="ValorBateria" name="ValorBateria" value="{{ $id->ValorBateria }}">
                            </div>
                            <div class="col-md-4">
                                <label for="GarantiaBateria">Años de garantía:</label>
                                <input type="number" class="form-control" id="GarantiaBateria" name="GarantiaBateria" value="{{ $id->GarantiaBateria }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><b>Inversores</b></h4>
                            </div>
                            <div class="col-md-4">
                                <label for="ModelInversor">Modelo:</label>
                                <input type="text" class="form-control" id="ModelInversor" name="ModelInversor" value="{{ $id->ModelInversor }}">
                            </div>
                            <div class="col-md-4">
                                <label for="ValorInversor">Valor Unitario:</label>
                                <input type="number" class="form-control" id="ValorInversor" name="ValorInversor" value="{{ $id->ValorInversor }}">
                            </div>
                            <div class="col-md-4">
                                <label for="GarantiaInversor">Años de garantía:</label>
                                <input type="number" class="form-control" id="GarantiaInversor" name="GarantiaInversor" value="{{ $id->GarantiaInversor }}">
                            </div>
                        </div>
                        <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-sm btn-success btn-send">Guardar</button>
                </div>
        </form>
    </div>
  </div>
</div>
