@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Energía Solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Energías</li>
            <li class="active">Tienda</li>
            <li class="active">Ventas</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title text-center">Ventas</div>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="container">
                            <div class="info">
                                <div class="description text-center">
                                    <h4><b>Pedido {{ $order->reference }}</b></h4>
                                </div>
                                <hr>
                                <div class="caracter">
                                    <div class="row">
                                        <div><b>Fecha del Pedido: {{ $order->created_at->format('d-m-Y H:i') }}</b></div>
                                    </div>
                                    <div class="row">
                                        <div><b>Comprador:</b> {{ $order->client->name }}</div>
                                    </div>
                                    @if ($order->collect=='envio')
                                        <div class="row">
                                            <div><b>Enviado:</b>
                                                {{ $order->locate['address'] ?? '' }} - {{ $order->locate['city'] ?? '' }} - {{ $order->locate['name_contact'] ?? '' }} - {{ $order->locate['number_contact'] ?? '' }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div><b>Valor envio:</b> ${{ number_format($order->valor_envio, 2, ',', '.') }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div><b>Recogida:</b>
                                                {{ $order->locate['name_contact'] ?? '' }} - {{ $order->locate['number_contact'] ?? '' }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div><b>Total:</b> ${{ number_format($order->valor+$order->valor_envio, 2, ',', '.') }}</div>
                                    </div>
                                    <div class="row">
                                        <div><b>Estado de la transacción:</b> {{ $order->status }}</div>
                                    </div>
                                    <div class="row">
                                        <div><b>Productos:</b> {{ count($order->products) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @php
                            $cantidad = 0;
                        @endphp
                        @if (count($order->products) > 0)
                            <div class="row">
                                <h4 class="text-center"><b>Detalle de la compra</b></h4>
                                @foreach ($products as $item)
                                    <div class="col-md-12">
                                        <div class="row ">
                                            <div class="col-md-4 ">
                                                <div class="img text-center">
                                                    @foreach ($item->files as $items)
                                                        <img id="img" src="/storage/energy/{{ $items->name }}"
                                                            alt="Attachment"
                                                            style="max-width: 50%; height: auto; display: block;  margin: 0 auto 10px auto;">
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="info">
                                                    <div class="description"><b>{{ $item['description'] }}</b></div>
                                                    <hr>
                                                    <div class="caracter">
                                                        <div class="row">
                                                            <div><h5>Cantidad: {{ $item['cantidad'] }}</h5></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="price_item" id="price_item">
                                                                <h3><b>${{ number_format($item['valor'], 2, ',', '.') }}</b></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $cantidad += $item['cantidad'];
                                    @endphp
                                @endforeach
                            </div>
                            <hr>
                            <div class="container">
                                <div class="sub-total text-right">
                                    <h3><b>Total de la compra ({{ $cantidad }}):
                                            ${{ number_format($order->valor+$order->valor_envio, 2, ',', '.') }}</b></h3>
                                </div>
                            </div>
                        @else
                            <p>No hay productos en esta compra.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
