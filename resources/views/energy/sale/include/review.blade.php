<div class="modal fade review-{{ $sale->id }}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>{{ $sale->product->type }} - {{ $sale->product->cod_product }}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center"><h4><b>Venta</b></h4></div>
                    <div class="col-md-4"><div class="form-group"><label for="">Cliente: </label><p>{{ $sale->client->name }}</p></div></div>
                    <div class="col-md-4"><div class="form-group"><label for="">{{ $sale->client->typeId }}: </label><p>{{ $sale->client->ide }}</p></div></div>
                    <div class="col-md-4"><div class="form-group"><label for="">Fecha de Venta: </label><p>{{ $sale->created_at->format('Y-m-d') }}</p></div></div>
                    <div class="col-md-4"><div class="form-group"><label for="">Garantía de Venta: </label><p>{{ $sale->warranty }}</p></div></div>
                    <div class="col-md-4"><div class="form-group"><label for="">Valor de Venta: </label><p>${{ number_format($sale->valor, 2,',','.') }}</p></div></div>
                    <div class="col-md-4"><div class="form-group"><br><a href="{{ route('energy_sale.show', $sale->id) }}" class="btn btn-success" target="_black"><i class="fa fa-file" ></i></a></div></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center"><h4><b>Producto</b></h4></div>
                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            @if ($sale->product->files)
                                @foreach ($sale->product->files as $sales)
                                    <img id="img" src="/storage/energy/{{$sales->name}}" style="width: 25%;" alt="Attachment">
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type">Tipo de Equipo</label>
                            <p>{{ $sale->product->type }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="model">Modelo</label>
                            <p>{{ $sale->product->model }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <p>{{ $sale->product->serie }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="potencia">Potencia</label>
                            <p>{{ $sale->product->power }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Precio</label>
                            <p>${{ number_format( $sale->product->price , 2,',','.') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="garantia">Garantía</label>
                            <p>{{ $sale->product->warranty }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desription">Descripción</label>
                            <p>{{ $sale->product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
