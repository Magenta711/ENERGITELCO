@extends('store.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/cart.css') }}">
@endsection

@section('content')
    @php
        $total = 0;
        $i = 1;
    @endphp
    @if (isset($all_products) && count($all_products) > 0)
        <div class="description text-center">
            <h4><b>Carrito de Compras</b></h4>
        </div>
        <hr>
        <div class="big-container">
            <div class="md-container">
                @foreach ($products as $item)
                    @if ($item->typeGorup == 'Producto')
                        <div class="container" id="cart-{{ $item->id }}">
                            <div class="img-principal">
                                @foreach ($item->files as $items)
                                    <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
                                @endforeach
                            </div>
                            <div class="info">
                                <div class="title">{{ strtoupper($item->type) }}</div>
                                <div class="description">{{ strtoupper($item->model) }}</div>
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
                                    <div class="row text-center">
                                        <div class="amount_div"><input type="number" id="amount_items"
                                                class="form-control amount_items" value="{{ $item->cantidad }}"
                                                data-id="{{ $item['type'] }}" data-euge="{{ $item['id'] }}"
                                                data-valor="{{ $item['valor'] }}" min="1"
                                                oninput="validity.valid||(value='1')">
                                            <input type="hidden" id="available-{{ $item['id'] }}"
                                                value="{{ $item->disponibles }}" min="1"
                                                max="{{ $item->disponibles }}">
                                            <br>
                                            @if ($item->disponibles < $item->cantidad)
                                                <span class="badge badge-pill badge-danger unable"
                                                    data-id="{{ $item['type'] }}"><b>No hay suficientes</b></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="div">
                                            <a href="#" class="btn btn-danger btn-remove"
                                                data-id="{{ $item['type'] }}" data-euge="{{ $item['id'] }}"
                                                aria-disabled="true">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container" id="cart-{{ $item->id }}">
                            <div class="kit-max-img">
                                @foreach ($item->files as $items)
                                    <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
                                @endforeach
                            </div>
                            <div class="info">
                                <div class="title">{{ strtoupper($item->type) }}</div>
                                <div class="description">{{ strtoupper($item->name) }}</div>
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
                                    <div class="row text-center">
                                        <div class="amount_div"><input type="number" id="amount_items"
                                                class="form-control amount_items" value="{{ $item->cantidad }}"
                                                data-id="{{ $item['type'] }}" data-euge="{{ $item['id'] }}"
                                                data-valor="{{ $item['valor'] }}" min="1"
                                                oninput="validity.valid||(value='1')">
                                            <input type="hidden" id="available-{{ $item['id'] }}"
                                                value="{{ $item->disponibles }}" min="1"
                                                max="{{ $item->disponibles }}">
                                            <br>
                                            @if ($item->disponibles < $item->cantidad)
                                                <span class="badge badge-pill badge-danger unable"
                                                    data-id="{{ $item['type'] }}"><b>No hay suficientes</b></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="div">
                                            <a href="#" class="btn btn-danger btn-remove"
                                                data-id="{{ $item['type'] }}" data-euge="{{ $item['id'] }}"
                                                aria-disabled="true">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $total += $item->cantidad;
                        $i++;
                    @endphp
                    <input type="hidden" id="valor_item-{{ $item->id }}" value="{{ $item->price }}">
                @endforeach
            </div>
            <div class="pay">
                <div>Subtotal:</div>
                <div class="price">${{ number_format($cart_client->total, 2, ',', '.') }}</div>
                <a href="{{ route('store.pay_show', [$cart_client->id, 1]) }}" class="btn btn-warning"
                    id="btn-comprar">Proceder al pago</a>
            </div>
            <input type="hidden" id="total" value="{{ $cart_client->total }}">

        </div>
        <div class="sub-total">
            Subtotal de la compra ({{ $total }}): ${{ number_format($cart_client->total, 2, ',', '.') }}
        </div>
    @else
        <div class="big-container">
            <div class="md-container">
                <div class="container">
                    <div class="info">
                        <div class="description text-center">
                            <h4><b>Carrito de Compras</b></h4>
                        </div>
                        <div class="caracter text-center">
                            <div class="row">
                                <div>No tienes ningún producto en el carrito</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="hide-container">
        No tienes ningún porducto en el carrito
    </div>
    @include('store.products-section-min')
@endsection


@section('script')
    <script>
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/store/cart.js') }}"></script>
@endsection
