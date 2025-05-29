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
                <div class="row">
                    <div class="col-md-6"><b>Modelo</b></div>
                    <div class="col-md-6">{{ $id->model }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><b>Potencia</b></div>
                    <div class="col-md-6">{{ $id->power }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><b>Garantía</b></div>
                    <div class="col-md-6">{{ $id->warranty }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6"><b>Disponibles</b></div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
        <div class="pay">
            <div class="price">${{ number_format($id->price, 2, ',', '.') }}</div>
            <div class="amount"><input type="number" class="ip_amount" value="1" id="amount_item"></div>
            <button type="button" style="background-color: #ff8400" id="add_cart">Agregar al Carrito</button>
            <button type="button" style="background-color: #ffa41c">Comprar</button>
        </div>
        <form action="{{ route('store.add_cart', $id->id) }}" method="POST" id="add_cart_form">
            @csrf
            <input type="hidden" name="amount_item" id="input_amount_item">
        </form>
    </div>
@endsection


