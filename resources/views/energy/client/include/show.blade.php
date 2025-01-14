<div class="modal fade show-{{ $item->id }}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Ver Cliente</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3><b>Cliente</b></h3>
                        </div>
                        <div class="col-md-4"><label for="name">Nombre</label><p>{{ $item->name }}</p></div>
                        <div class="col-md-4"><label for="typeId">Tipo de Identificación</label><p>{{ $item->typeId }}</p></select></div>
                        <div class="col-md-4"><label for="ide">Identificación/NIT</label><p>{{ $item->ide }}</p></div>
                        <div class="col-md-4"><label for="tel">Telefono de Contacto</label><p>{{ $item->tel }}</p></div>
                        <div class="col-md-4"><label for="email">Correo Eléctronico</label><p>{{ $item->email }}</p></div>
                        <div class="col-md-4"><label for="locate">Ubicación</label><p>{{ $item->locate }}</p></div>
                        <div class="col-md-4"><label for="type_client">Tipo de Cliente</label><p>{{ $item->type_client}}</p></div>
                    </div>
                    <hr>
                    @if (count($item->ventas)>0)
                    <div>
                        <h3><b>Compras</b></h3>
                        <hr>
                        <div class="row" style="font-weight: bold">
                            <div class="col-md-3">
                                <p>COD Venta</p>
                            </div>
                            <div class="col-md-3">
                                <p>Equipo</p>
                            </div>
                            <div class="col-md-3">
                                <p>Fecha de Venta</p>
                            </div>
                            <div class="col-md-3">
                                <p>Factura</p>
                            </div>
                        </div>
                        <hr>
                        @foreach ($item->ventas as $sale)
                            <div class="row">
                                <div class="col-md-3">
                                    <p>{{ $sale->cod_sale }}</p>
                                </div>
                                <div class="col-md-3">
                                    <p>{{ $sale->product->type }} - {{ $sale->product->cod_product }}</p>
                                </div>
                                <div class="col-md-3">
                                    <p>{{ $sale->datesale }}</p>
                                </div>
                                <div class="col-md-3"><a href="{{ route('energy_sale.show', $sale->id) }}" class="btn btn-success" target="_black"><i class="fa fa-file" ></i></a></div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>
