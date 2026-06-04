<div class="modal fade costo-envio-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><b>Nueva producto</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <div class="row">
                    <div class="col-md-12">
                        <h4>Fórmula para asignar el costo de envio de los productos solares</h4>
                    </div>
                    <div class="col-md-12">
                        <h4><b>Ejemplo:</b></h4>
                        Costo base: $6.000 (por los primeros 1.5 kg)
                        <br>
                        Kilos adicionales: 4.8 - 1.5 = 3.3 kg → se cobra 4 kg
                        <br>
                        Costo adicional: 4 * $2.000 = $8.000
                        <br>
                        Seguro: 1% de $200.000 = $2.000
                        <br>
                        Total base sin aumento: $6.000 + $8.000 + $2.000 = $16.000
                        <br>
                        Total: $16.000+10% = $17.600
                    </div>
                </div>
                <hr>
                <form action="{{ route('energy_products.shipping', $shipping->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="base">Precio base de envío</label>
                                <input type="number" class="form-control" id="base" name="base" value="{{ $shipping->base }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kilos_adicionales">Kilos adicionales a partir de:</label>
                                <input type="number" class="form-control" id="kilos_adicionales" name="kilos_adicionales" value="{{ $shipping->kilos_adicionales }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="valor_kilos_adic">Valor por Kilo adicional</label>
                                <input type="number" class="form-control" id="valor_kilos_adic" name="valor_kilos_adic" value="{{ $shipping->valor_kilos_adic}}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="porcentaje_aumentado">Valor a aumentar al valor de envío</label>
                                <input type="number" class="form-control" id="porcentaje_aumentado" name="porcentaje_aumentado" value="{{ $shipping->porcentaje_aumentado }}" required>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                              <button class="btn btn-success submit">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
