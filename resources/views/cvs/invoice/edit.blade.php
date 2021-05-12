@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Recibo de caja
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Recibos</a></li>
        <li class="active">Recibo de caja</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_invoices')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_invoices_update',$id->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cash">Medio de pago</label>
                        <div class="row" style="margin-bottom: 3px">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" checked type="checkbox" name="cash" id="cash" value="1">
                                    <label class="form-check-label" for="cash">
                                        Efectivo
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="cash_value" id="cash_value" placeholder="Valor efectivo" class="form-control " value="{{ $id->total }}">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 3px">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="qr" id="qr" value="1">
                                    <label class="form-check-label" for="qr">
                                        Pago QR
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="qr_value" id="qr_value" placeholder="Valor QR" class="form-control ">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 3px">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="card" id="card" value="1">
                                    <label class="form-check-label" for="card">
                                        Tarjeta
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="card_value" id="card_value" placeholder="Valor tarjeta" class="form-control ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expiration_date">Fecha de vencimiento</label>
                        <input type="date" name="expiration_date" id="expiration_date" class="form-control" value="{{ $id->expiration_date }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="file">Archivo adjunto</label>
                        <label for="file" id='label_file' class="form-control text-center"><i class="fa fa-upload"></i></label>
                        <input type="file" name="file" id="file" class="hide">
                    </div>
                </div>
            </div>
            <hr>
            <h4>Información del cliente</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre cliente</label>
                        {{ $id->client->name }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address">Documento</label>
                        {{ $id->client->document_type }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address">Número</label>
                        {{ $id->client->document }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Correo</label>
                        {{ $id->client->email }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">Celular</label>
                        {{ $id->client->tel }}
                    </div>
                </div>
            </div>
            <hr>
            @php
                $i = 1;
            @endphp
            <h4>Detalle</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Valor unitario</th>
                        <th>Valor total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($id->details as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->productable->description }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>$ {{ number_format($item->value, 2) }}</td>
                            <td>$ {{ number_format($item->total_value, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr class="active">
                        <th class="text-right" colspan="4"><h3>Total</h3></th>
                        <th><h3>$ {{ number_format($id->total, 2) }}</h3></th>
                    </tr>
                </tbody>
            </table>
            <hr>
            <strong>Comentarios</strong>
            <p>{{ $id->commentary }}</p>
        </div>
        <div class="box-footer">
            <button type="submit" id="send" class="btn btn-sm btn-primary">Pagar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/cvs/sale.js') }}"></script>
    <script>
        var bPreguntar = true;
        window.onbeforeunload = preguntarAntesDeSalir;

        $(document).ready(function() {
            $('#file').change(function (){
                $('#label_file').addClass('text-aqua');
            });
            $('#send').click(function (){
                bPreguntar = false;
                return true;
            });
        });
        
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
            return "¿Seguro que quieres salir?";
        }
    </script>
@endsection