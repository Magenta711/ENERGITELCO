@extends('store.main')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/order_detail.css') }}">
@endsection

@section('content')
    <div class="big-container">
        <div class="md-container">
            <hr>
            <div class="container">
                <div class="info">
                    <div class="description text-center"><h4><b>Pedido {{ $order->reference }}</b></h4></div>
                    <hr>
                    <div class="caracter">
                        <div class="row">
                            <div><b>Fecha del Pedido: {{ $order->created_at->format('d-m-Y H:i') }}</b></div>
                        </div>
                        {{-- <div class="row">
                            <div>Total: ${{ number_format($order->valor, 2, ',', '.') }}</div>
                        </div> --}}
                        <div class="row">
                            <div>Estado: {{ $order->status }}</div>
                        </div>
                        <div class="row">
                            <div>Productos: {{ count($order->products) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @php
                $cantidad = 0;
            @endphp
            @if (count($order->products) > 0)
                @foreach ($products as $item)
                    <div class="products" id="cart-{{ $item->id }}">
                        <div class="img">
                            @foreach ($item->files as $items)
                                <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
                            @endforeach
                        </div>
                        <div class="info">
                            <div class="description"><b>{{ $item['description'] }}</b></div>
                            <hr>
                            <div class="caracter">
                                <div class="row">
                                    <div>Cantidad: {{ $item['cantidad'] }}</div>
                                </div>
                                <div class="row">
                                    <div class="price_item" id="price_item">
                                        ${{ number_format($item['valor'], 2, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $cantidad += $item['cantidad'];
                    @endphp
                @endforeach
                <hr>
                <div class="container">
                    <div class="sub-total text-right">
                        <h3><b>Total de la compra ({{ $cantidad }}): ${{ number_format($order->valor, 2, ',', '.') }}</b></h3>
                    </div>
                </div>
            @else
                <p>No hay productos en esta compra.</p>
            @endif
        </div>
    </div>
@endsection
