<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
            font-size: 11pt;
        }
 
        body {
            margin: 3cm 2cm 2cm 2cm;
            background: #fff;
        }
 
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            margin: 2cm;
        }

        header img {
            height: 2cm;
            width: auto;
            margin-top: -1cm;
            opacity: 0.6;
        }
        
        hr {
            color: black;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
        }
        .info_user p, header p, footer p {
            margin: 0;
        }
        .my-row{
            display: flex;
            margin-bottom: 0;
        }
        .my-table {
            margin-top: -200px;
        }
    </style>
</head>
<body>
    <header>
        <div class="row">
            <div class="text-left">
                <img src="{{ asset('img/ccjl.jpg') }}" />
            </div>
            <div class="text-muted text-center" style="margin-top: -10px">
                <p><b>RECIBO DE CAJA</b></p>
                {{-- <p><b><i>LTD NIT 900.082.621-1</i></b></p> --}}
            </div>
            <div class="text-right">
                {{-- <img src="{{ asset('img/ccjl.jpg') }}" /> --}}
            </div>
        </div>
    </header>
    <main>
        <br>
        <div class="my-row">
            <div class="text-left">
                <p><strong>{{ $id->rent->client->name }}</strong></p>
                <P>{{ $id->rent->client->email }}</P>
                <p>No. télefono: {{ $id->rent->client->number }}</p>
                <p>Nit o CC: {{ $id->rent->client->document }}</p>
                <br>
                <p>Recibo electrónico: {{ $id->cod }}</p>
            </div>
            <div class="text-right">
                <p class="border"><strong>TOTAL A PAGAR: $ {{ number_format($id->total, 2) }}</strong></p>
                <p>CENTRO COMERCIAL JOSE LUIS <br><b>NIT</b> 900.881.434-7 <br> Antioquia - Barbosa <br> CRA 15 NRO 10 - 40 INT 201</p>
                <p>Fecha de vencimiento: {{ $id->expiration_date}} <br> Fecha de pago: {{ $id->date_pay }} <br> Fecha de generación: {{ now()->format('d/m/Y') }}</p>
            </div>
        </div>
        <div class="my-table">
            @php
                $i = 1;
                $total = 0;
            @endphp
            <h3>Detalle</h3>
            <table class="table">
                <thead>
                    <tr class="active">
                        <th>Item</th>
                        <th>Descripción</th>
                        <th># mes</th>
                        <th>Valor/mes</th>
                    </tr>
                </thead>
                <tbody>
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
                        <th colspan="3">Total</th>
                        <th class="text-right" >$ {{ number_format($total, 2) }}</th>
                    </tr>
                </tbody>
            </table>

        </div>
    </main>
    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        {{-- <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p> --}}
    </footer>
</body>
</html>