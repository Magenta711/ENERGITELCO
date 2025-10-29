@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Nueva Venta <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Energías</a></li>
            <li><a href="#">Ventas</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">
       <div class="box">
             <div class="box-header">
                <div class="box-title">Venta <b>{{ $sale->cod_sale }}</b></div>
                <div class="box-tools">
                    <a href="{{ route('energy_sale') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4><b>Venta</b></h4>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label for="">Cliente: </label>
                            <p>{{ $sale->client->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label for="">{{ $sale->client->typeId }}: </label>
                            <p>{{ $sale->client->ide }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label for="">Fecha de Venta: </label>
                            <p>{{ $sale->created_at->format('Y-m-d') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label for="">Garantía de Venta: </label>
                            <p>{{ $sale->warranty ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label for="">Valor de Venta: </label>
                            <p>${{ number_format($sale->valor, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><br><a href="{{ route('energy_sale.show', $sale->id) }}"
                                class="btn btn-success" target="_black"><i class="fa fa-file"></i></a></div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @if ($sale->product)
                        <div class="col-md-12 text-center">
                            <h4><b>Producto</b></h4>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                @if ($sale->product->files)
                                    @foreach ($sale->product->files as $sales)
                                        <img id="img" src="/storage/energy/{{ $sales->name }}"
                                            style="width: 25%;" alt="Attachment">
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
                                <p>${{ number_format($sale->product->price, 2, ',', '.') }}</p>
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
                    @else
                        <div class="col-md-12 text-center">
                            <h4><b>Producto</b></h4>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <p>Varios Productos</p>
                            </div>
                        </div>

                </div>
                @foreach ($sale->ProductsLists() as $item)
                    <div class="row">
                        @if ($item['type'] == 'SolarProduct' && $item['type'] != 'ExtraItem')
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Tipo de Equipo</label>
                                    <p>{{ $item['details']['type'] }}</p>
                                </div>
                            </div>
                        @elseif ($item['type'] == 'SolarKit' && $item['type'] != 'ExtraItem')
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Nombre del Kit</label>
                                    <p>{{ $item['details']['name'] }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($item['type'] != 'ExtraItem')
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Valor de venta</label>
                                    <p>${{ number_format($item['value'], 2, ',', '.')  }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Garantía de Venta unidad</label>
                                    <p>{{ $item['warranty'] }}</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="type">Cantidad Vendida</label>
                                    <p>{{ $item['amount'] }}</p>
                                </div>
                            </div>
                        @else
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Item Extra</label>
                                    <p>{{ $item['item'] }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type">Valor Item</label>
                                    <p>${{ number_format($item['value'], 2, ',', '.')  }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <hr>
                @endforeach
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="#" id="seriales_{{ $sale->id }}" data-id="{{ $sale->id }}" class="btn btn-info"
                            data-toggle="modal" data-target=".all-products-modal-lg">Ver
                            Series de Productos Vendidos</a>
                    </div>
                </div>
                @include('energy.sale.include.allProducts')
                @endif
            </div>
       </div>
    </section>
@endsection
