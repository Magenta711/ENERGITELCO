@extends('store.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/products.css') }}">
@endsection

@section('content')
    <div class="container" id="product">
        <div class="img">
            @foreach ($id->files as $items)
                <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
            @endforeach
        </div>
        <div class="info">
            <div class="title">{{ $id->type }}</div>
            <div class="description">{{ $id->description }}</div>
            <hr>
            <div class="caracter">
                @if (!empty($id->model))
                    <div class="row">
                        <div class="col-md-6"><b>Modelo:</b></div>
                        <div class="col-md-6">{{ $id->model }}</div>
                    </div>
                @endif
                @if (!empty($id->power))
                    <div class="row">
                        <div class="col-md-6"><b>Potencia:</b></div>
                        <div class="col-md-6">{{ $id->power }}</div>
                    </div>
                @endif
                @if (!empty($id->warranty))
                    <div class="row">
                        <div class="col-md-6"><b>Garantía:</b></div>
                        <div class="col-md-6">{{ $id->warranty }}</div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6"><b>Disponible:</b></div>
                    <div class="col-md-6"><b> Hay ({{ $id->disponibles }}) en stock </b></div>
                    <input type="hidden" id="available" value="{{ $id->disponibles }}">
                </div>
            </div>
        </div>
        <div class="pay">
            <div class="price">${{ number_format($id->price, 2, ',', '.') }}</div>
            <br>
            <div class="amount"><input type="number" class="ip_amount" value="1" id="amount_item" min="1"
                    max="{{ $id->disponibles }}"></div>
            <button type="button" style="background-color: #ff8400" id="add_cart">Agregar al Carrito</button>
            <button type="button" style="background-color: #ffa41c">Comprar</button>
        </div>
        <form action="{{ route('store.add_cart', $id->id) }}" method="POST" id="add_cart_form">
            @csrf
            <input type="hidden" name="amount_item" id="input_amount_item">
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/store/product.js') }}"></script>
@endsection
