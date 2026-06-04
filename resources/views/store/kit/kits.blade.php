@extends('store.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/products.css') }}">
@endsection

@section('content')
    <div class="container" id="product">
        <div class="kit-img">
            @foreach ($productos as $imagenes)
            @php
                $i = 0;
                $i++;
            @endphp
                @if ($i <= 4)
                    @foreach ($imagenes->files as $items)
                        <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
                    @endforeach
                @endif
            @endforeach
        </div>
        <div class="info">
            <div class="title">{{ strtoupper($id->type) }}</div>
            <div class="description">{{ strtoupper($id->name) }}</div>
            <hr>
            <div class="caracter">
                @if (!empty(strtoupper($id->caracteristics['potencia_dia'])))
                    <div class="row">
                        <div class="col-md-6"><b>POTENCIA GENERADA POR DÍA:</b></div>
                        <div class="col-md-6">{{ $id->caracteristics['potencia_dia'] }}</div>
                    </div>
                @endif
                @if (!empty(strtoupper($id->caracteristics['potencia_nominal'])))
                    <div class="row">
                        <div class="col-md-6"><b>POTENCIA NOMINAL:</b></div>
                        <div class="col-md-6">{{ $id->caracteristics['potencia_nominal'] }}</div>
                    </div>
                @endif
                @if (!empty(strtoupper($id->caracteristics['voltaje'])))
                    <div class="row">
                        <div class="col-md-6"><b>VOLTAJE:</b></div>
                        <div class="col-md-6">{{ $id->caracteristics['voltaje'] }}</div>
                    </div>
                @endif
                @if (!empty(strtoupper($id->warranty)))
                    <div class="row">
                        <div class="col-md-6"><b>GARANTÍA:</b></div>
                        <div class="col-md-6">{{ strtoupper($id->warranty) }}</div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6"><b>DISPONIBLE:</b></div>
                    <div class="col-md-6"><b> Hay ({{ strtoupper($id->disponibles) }}) en stock </b></div>
                    <input type="hidden" id="available" value="{{ strtoupper($id->disponibles) }}">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <b>DESCRIPCIÓN:</b>
                        <p>{{ $id->description }}</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="products">
                <div class="title">
                    <h4><b>Productos incluidos en el kit:</b></h4>
                </div>
                <div class="row">
                    @foreach ($productos as $producto)
                        <div class="col-md-12">
                            <div class="row ">
                                <div class="col-md-4 ">
                                    <div class="img text-center">
                                        @foreach ($producto->files as $items)
                                            <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment"
                                                style="max-width: 100%; height: auto; display: block;  margin: 0 auto 10px auto;">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <b>{{ $producto->type }} </b>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6"><b>MODELO:</b></div>
                                        <div class="col-md-6">{{ $producto->model }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><b>POTENCIA:</b></div>
                                        <div class="col-md-6">{{ $producto->power }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><b>CANTIDAD:</b></div>
                                        <div class="col-md-6">X{{ $producto->cantidad }}</div>
                                    </div>
                                    {{ $producto->description }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="pay">
            <div class="price">${{ number_format($id->price, 2, ',', '.') }}</div>
            <br>
            <div class="amount"><input type="number" class="ip_amount" value="1" id="amount_item" min="1"
                    max="{{ $id->disponibles }}"></div>
            <button type="button" style="background-color: #ff8400" id="add_cart">Agregar al Carrito</button>
        </div>
        <form action="{{ route('store.add_cart', [$id->id, 2]) }}" method="POST" id="add_cart_form">
            @method('POST')
            @csrf
            <input type="hidden" name="amount_item" id="input_amount_item">
        </form>
    </div>
    @include('store.products-section-min')
    <style>
        .kit-img {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            width: 220px;
            align-content: center;
            height: 50%;
        }

        .kit-img img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('js/store/product.js') }}"></script>
@endsection
