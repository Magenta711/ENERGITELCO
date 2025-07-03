@extends('store.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/orders.css') }}">
@endsection

@section('content')
    <div class="big-container">
        <div class="md-container">
            <h4><b>Mis Compras</b></h4>
            <hr>
            @if (count($orders) > 0)
                @foreach ($orders as $order)
                    <a href="{{ route('store.orders_detail', $order->reference) }}" class="container btn" id="order-{{ $order->id }}">
                        <div class="info">
                            <div class="description">
                                    <div><h4><b>Fecha: {{ $order->created_at->format('d-m-Y H:i') }}</b></h4></div>
                            </div>
                            <hr>
                            <div class="caracter">
                                <div class="row">
                                    <b>Pedido {{ $order->reference }}</b>
                                </div>
                                <div class="row">
                                    <div>Total: ${{ number_format($order->valor, 2, ',', '.') }}</div>
                                </div>
                                <div class="row">
                                    <div>Estado: {{ $order->status }}</div>
                                </div>
                                <div class="row">
                                    <div>Productos: {{ count($order->products) }}</div>
                                </div>
                                <div class="row">
                                    {{-- @foreach ($order->products as $item)
                                        <div>Producto: {{ $item->type }}</div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <hr>
                @endforeach
            @else
                <p>No tienes compras registradas.</p>
            @endif
        </div>
    </div>
@endsection
