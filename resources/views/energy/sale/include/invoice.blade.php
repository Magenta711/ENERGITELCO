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

        #total{
            display: flex;
            width: 100%;`
        }

    </style>
</head>
<body style=" margin: 3cm 2cm 2cm 2cm;
background: #fff;">
    <header>
        <div class="row">
            <div class="text-muted" >
                <div class="card-title text-center" >
                    <h3><b><i>FACTURA DE VENTA</i></b></h3>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="text-center">
                <img src="{{ asset('img/logo.png') }}" />
            </div>
        </div>
    </header>
    <main>
        <br>
        <div class="row" style="margin-bottom: -100px;">
            <table class="table">
                <tbody>
                <tr><td>
                    <h6><b>Energitelco S.A.S.</b></h6>
                </td><td></td>
                <td></td>
                <td>
                    <h6><b>Cliente</b></h6>
                </td>
            </tr>
            <tr>
                <td>
                <h6>LTD NIT 900.082.621-1</h6>
                </td>
                <td></td>
                <td></td>
                <td>
                    <h6>{{ $id->client->name }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                <h6>CLL 48B Nº 66-65</h6>
                </td>
                <td></td>
                <td></td>
                <td>
                    <h6>{{ $id->client->typeId }}: {{ $id->client->ide }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                <h6>MEDELLIN, ANTIOQUIA</h6>
                </td>
                <td></td>
                <td></td>
                <td>
                    <h6>{{ $id->client->tel }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                <h6>TEL: 5072074 - 3113066482</h6>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
                </tbody>
            </table>
        </div>
        <br><br><br><br>
        <br>
        <br>
        <hr>
        <br>
        <br>
        <br>
        <div class="my-table">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>CANTIDAD</th>
                            <TH>CONCEPTO</TH>
                            <TH>GARANTÍA</TH>
                            <th>PRECIO</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($id->product)
                            <tr class="text-center">
                                <td>1.00</td>
                                <td>{{$id->product->type}} - {{ $id->product->model }}</td>
                                <td>{{ $id->warranty }}</td>
                                <td>${{ number_format($id->valor, 2,',','.') }}</td>
                                
                                <td>${{ number_format($id->valor, 2,',','.') }}</td>
                            </tr>
                        @else
                            @foreach ($id->ProductsLists() as $item)
                                <tr class="text-center">
                                    <td>{{ $item['amount'] }}</td>
                                    @if ($item['type'] == 'SolarProduct' && $item['type'] != 'ExtraItem')
                                        <td>{{ $item['details']['type'] }}</td>
                                    @elseif ($item['type'] == 'SolarKit' && $item['type'] != 'ExtraItem')
                                        <td>{{ $item['details']['name'] }}</td>
                                    @endif
                                    @if ($item['type'] == 'ExtraItem')
                                        <td>{{ $item['item'] }}</td>
                                    @endif
                                    <td>{{ $item['warranty'] ?? '' }}</td>
                                    <td>${{ number_format($item['value'], 2, ',', '.')  }}</td>
                                    <td>${{ number_format(($item['value']*$item['amount']), 2, ',', '.')  }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <div id="total">
                <div></div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>TOTAL FACTURA</b></td>
                            <td><b>${{ number_format($id->valor, 2,',','.') }}</b></td>
                        </tr>
                    </tbody>
                </table>

                <hr>
            </div>
        </div>
    </main>
    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    </footer>
</body>
</html>
