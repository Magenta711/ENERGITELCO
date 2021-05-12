@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CANCELAR SUSCRIPCIÓN</div>
                <form action="{{ route('cvs_clients_unsubscribe_save',$id->token) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            @include('includes.alerts')
                        @else
                            <p>
                                ¿Está seguro de que ya no desea recibir correos electrónicos en {{ $id->email }}? Es posible que se pierda anuncios importantes, grandes ofertas o ventajas exclusivas para los clientes de Claro – Energitelco.</p>
                            <p>
                                Haz clic en CONFIRMAR CANELACIÓN para cancelar la suscripción o CANCELAR si deseas seguir recibiendo noticias de Claro - Energitelco.
                            </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <button type="button" onclick="window.close();" class="btn btn-sm btn-primary">Cancelar</button>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-sm btn-danger">Confirmar cancelación</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
