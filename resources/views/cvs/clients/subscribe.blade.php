@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SUSCRIBIRCE</div>
                <form action="{{ route('cvs_clients_subscribe_save',$id->token) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                         
                        <P>
                            Apartir de ahora no prodras recibir nuestras anuncios importantes, grandes ofertas o ventajas exclusivas para los clientes de Claro – Energitelco.
                        </P>
                        <p>
                            ¿Has cancelado tu suscripcíon por error?
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Susbribirse de nuevo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
