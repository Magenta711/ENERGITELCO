@extends('store.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/products.css') }}">
@endsection

@section('content')
    <div class="container" id="product">
        <div class="img-principal">
            @foreach ($id->files as $items)
                <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
            @endforeach
        </div>
        <div class="info">
            <div class="title">{{ strtoupper($id->type) }}</div>
            <div class="description">{{ strtoupper($id->description) }}</div>
            <hr>
            <div class="caracter">
                @if (!empty(strtoupper($id->model)))
                    <div class="row">
                        <div class="col-md-6"><b>MODELO:</b></div>
                        <div class="col-md-6">{{ strtoupper($id->model) }}</div>
                    </div>
                @endif
                @if (!empty(strtoupper($id->power)))
                    <div class="row">
                        <div class="col-md-6"><b>POTENCIA:</b></div>
                        <div class="col-md-6">{{ strtoupper($id->power) }}</div>
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
            </div>
        </div>
        <div class="pay">
            <div class="price">${{ number_format($id->price, 2, ',', '.') }}</div>
            <br>
            <div class="amount"><input type="number" class="ip_amount" value="1" id="amount_item" min="1"
                    max="{{ $id->disponibles }}"></div>
            <button type="button" style="background-color: #ff8400" id="add_cart">Agregar al Carrito</button>
        </div>
        <form action="{{ route('store.add_cart', [$id->id, 1]) }}" method="POST" id="add_cart_form">
            @csrf
            <input type="hidden" name="amount_item" id="input_amount_item">
        </form>
    </div>

    @include('store.products-section-min')
@endsection

@section('script')
    <script src="{{ asset('js/store/product.js') }}"></script>
@endsection
