@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Pago
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="">Rentas</a></li>
        <li class="active">Pago</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('CCJL_rents')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('CCJL_rents_save',$id->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                                <input type="number" name="cash_value" id="cash_value" value="{{ $id->total_pay }}" placeholder="Valor efectivo" class="form-control">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 3px">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="qr" id="qr" value="0">
                                    <label class="form-check-label" for="qr">
                                        Pago QR
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="qr_value" id="qr_value" placeholder="Valor QR" class="form-control">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 3px">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="card" id="card" value="0">
                                    <label class="form-check-label" for="card">
                                        Tarjeta
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="card_value" id="card_value" placeholder="Valor tarjeta" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Información del cliente</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre cliente</label>
                        <p>{{ $id->rent->client->name }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address">Documento</label>
                        <p>{{ $id->rent->client->document_type }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address">Número</label>
                        <p>{{ $id->rent->client->document }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Correo</label>
                        <p>{{ $id->rent->client->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">Celular</label>
                        <p>{{ $id->rent->client->number }}</p>
                    </div>
                </div>
            </div>
            <hr>
            @php
                $i = 1;
                $total = 0;
            @endphp
            <h4>Detalle</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Descripción</th>
                            <th># mes</th>
                            <th>Valor/mes</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Realacionar facturas --}}
                        @foreach ($id->rent->details as $item)
                            @if ($item->months >= $id->month)
                                @php
                                    $total += $item->value;
                                @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->productable->name ?? $item->productable->departament }}</td>
                                    <td>{{ $id->month }}</td>
                                    <td>$ {{ number_format($item->value, 2) }}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr class="active">
                            <th class="text-right" colspan="3"><h3>Total</h3></th>
                            <th><h3>$ {{ number_format($total, 2) }}</h3></th>
                            <input type="hidden" value="{{$total}}" id="total_month">
                        </tr>
                        <tr class="active">
                            <th class="text-right" colspan="3"><h3>Total pago</h3></th>
                            <th><h3 id="total_pay">$ {{ number_format($total, 2) }}</h3></th>
                            <input type="hidden" value="{{$total}}" id="total_pay_input">
                        </tr>
                        <tr style="display: none;">
                            <th class="text-right" colspan="3"><h4>Diferencia</h4></th>
                            <th><h4 id="total_diff">$ 0.00</h4></th>
                            <input type="hidden" value="0" id="total_diff_input">
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" id="send" class="btn btn-sm btn-primary">Pagar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
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
            $('#cash_value').blur(function () {
                validateTotal();
            })
            $('#qr_value').blur(function () {
                validateTotal();
            })
            $('#card_value').blur(function () {
                validateTotal();
            })
        });
        
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
            return "¿Seguro que quieres salir?";
        }

        function validateTotal() {
            let cash = $('#cash_value').val() ? parseFloat($('#cash_value').val()) : 0;
            let qr = $('#qr_value').val() ? parseFloat($('#qr_value').val()) : 0;
            let card = $('#card_value').val() ? parseFloat($('#card_value').val()) : 0;
            let total_month = parseFloat($('#total_month').val());

            let total = cash + qr + card;

            $('#total_pay').text('$ ' + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
            $('#total_pay_input').val(total);

            if (total_month != total) {
                $('#total_diff').parent().parent().show();
                $('#total_diff').text('$ ' + parseFloat((total - total_month), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                $('#total_diff_input').val((total - total_month));
            }else {
                $('#total_diff').parent().parent().hide();
            }
        }
    </script>
@endsection