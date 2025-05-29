@extends('store.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/cart.css') }}">
@endsection

@section('content')
    @php
        $total = 0;
        $i = 1;
    @endphp
    @if (count($all_products) != 0)
        <div class="big-container">
            <div class="md-container">
                @foreach ($products as $item)
                    <div class="container" id="cart-{{ $item->id }}">
                        <div class="img">
                            @foreach ($item->files as $items)
                                <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
                            @endforeach
                        </div>
                        <div class="info">
                            <div class="description">{{ $item->description }}</div>
                            <hr>
                            <div class="caracter">
                                <div class="row">
                                    <div><b>Disponibles ({{ $item->disponibles }})</b></div>
                                </div>
                                <div class="row">
                                    <div class="price_item-{{ $item->id }}" id="price_item">
                                        ${{ number_format($item->valor, 2, ',', '.') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div><input type="number" id="amount_items" class="form-control amount_items"
                                            value="{{ $item->cantidad }}" data-id="{{ $item['type'] }}"
                                            data-euge="{{ $item['id'] }}" data-valor="{{ $item['valor'] }}" min="1" oninput="validity.valid||(value='1')">
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="#" class="btn-remove" data-id="{{ $item['type'] }}"
                                        data-euge="{{ $item['id'] }}">Eliminar</a>
                                    <a href=""> Comprar Ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $total += $item->cantidad;
                        $i++;
                    @endphp
                    <input type="hidden" id="valor_item-{{ $item->id }}" value="{{ $item->price }}">
                @endforeach
                <hr>
                <div class="sub-total">
                    Subtotal de la compra ({{ $total }}): ${{ number_format($cart_client->total, 2, ',', '.') }}
                </div>
                <input type="hidden" id="total" value="{{ $cart_client->total }}">
            </div>
            <div class="pay">
                <div>Subtotal:</div>
                <div class="price">${{ number_format($cart_client->total, 2, ',', '.') }}</div>
                <a href="{{ route('store.pay_show',[$cart_client->id,1]  ) }}" class="btn btn-warning">Proceder al pago</a>
            </div>

            {{-- @include('store.products-section-min') --}}

        </div>
    @endif
    <div class="hide-container">
        No tienes ningún porducto en el carrito
    </div>

@endsection


@section('script')
    <script>
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/store/cart.js') }}"></script>
@endsection
