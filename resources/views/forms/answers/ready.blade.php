@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-body mb-3">
                <h3 class="card-title">Gracias por tu participación</h3>
                <p class="card-text">Tus respuestas se han registrado correctamente</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/forms/order_create.js') }}" defer></script>
@endsection