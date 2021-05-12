@php
    function numberToText(int $num)
    {
        $unidades = ['','uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve'];
        $especiales = ['','once','doce','trece','catorce','quince','diezciseis','diecisiete','dieciocho','diecinueve'];
        $decenas = ['','diez','veinte','treinta','cuarenta','cincuenta','sesenta','setenta','ochenta','noventa'];
        $centenas = ['','cien','doscientos','trescientos','cuatrocientos','quinientos','seiscientos','setecientos','ochocientos','novecientos'];
        $unidadesMillon = ['','un millón', 'dos millones', 'tres millones', 'cuatro millones', 'cinco millones', 'seis millones', 'siete millones', 'ocho millones', 'nueve millones'];

        $number = str_split($num);
        $text = '';

        $by = strlen($num);

        if ($by == 7) {
            if ($number[0]) {
                $text = $text.$unidadesMillon[$number[0]].' ';
            }
            $by--;
            array_splice($number, 0, 1);
        }
        if ($by == 6) {
            if ($number[0]) {
                $text = $text.$centenas[$number[0]].' ';
            }
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 5) {
            if ($number[0]) {
                $de = $decenas[$number[0]].' ';
                if ($number[0] == 1) {
                    if ($number[1] != 0) {
                        $de = $especiales[$number[1]].' mil ';
                        array_splice($number, 0, 1);
                        $by--;
                    }
                }
                $text = $text.$de;
            }
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 4) {
            if ($number[0]) {
                $text = $text.$unidades[$number[0]].' mil ';
            }
            $text = $text;
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 3) {
            if ($number[0]) {
                $text = $text.$centenas[$number[0]].' ';
            }
            $text = $text;
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 2) {
            if ($number[0]) {
                $de = $decenas[$number[0]].' ';
                if ($number[0] == 1) {
                    if ($number[1] != 0) {
                        $de = $especiales[$number[1]].' ';
                        array_splice($number, 0, 1);
                        $by--;
                    }
                }
                $text = $text.$de;
            }
            $text = $text.' ';
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 1) {
            if ($number[0]) {
                $text = $text.$unidades[$number[0]].' ';
            }
            $text = $text;
            array_splice($number, 0, 1);
            $by--;
        }

        return $text;
    }

@endphp
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
            font-size: 7pt;
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
            opacity: 1;
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
        header p, footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="row">
            <div class="text-left">
                <img src="{{ asset('img/logo.png') }}" />
            </div>
            <div class="text-muted text-center" style="margin-top: -10px">
                <p><b>COMPROBANTE DE EGRESOS</b></p>
                <p><b><i>NIT 900.082.621-1</i></b></p>
            </div>
            <div class="text-right">
                <img src="{{ asset('img/claro.png') }}" />
            </div>
        </div>
    </header>
    <main>
        <div class="my-table">
            @php
                $i = 1;
                $total = 0;
            @endphp
            <h3 class="text-center">COMPROBANTE DE EGRESOS</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2">Fecha</th>
                        <th>CODIGO</th>
                        <th>D-FR-24</th>
                    </tr>
                    <tr>
                        <th>Version</th>
                        <th>00</th>
                    </tr>
                    <tr>
                        <th rowspan="2">{{$id->created_at}}</th>
                        <th>Fecha</th>
                        <th>00</th>
                    </tr>
                    <tr>
                        <th>Pagina</th>
                        <th>1 de 1</th>
                    </tr>
                </thead>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>CONCEPTO</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($array as $item)
                        <tr>
                            <td class="text-right">{{ $i++ }}</td>
                            <td>{{ $item['cedula'] }} {{ $item['name'] }}</td>
                            <td class="text-right">${{ number_format(($item['bonificacion']+$item['viaticos']-$item['ajustes']),2) }}</td>
                        </tr>
                        @php
                            $total += ($item['bonificacion']+$item['viaticos']-$item['ajustes']);
                        @endphp
                    @endforeach
                    <tr class="active">
                        <th colspan="2">Total</th>
                        <th class="text-right" colspan="4">$ {{ number_format($total, 2) }}</th>
                    </tr>
                    <tr class="active">
                        <th colspan="2">Valor en letras</th>
                        <th class="text-right" colspan="4">{{ numberToText($total) }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    </footer>
</body>
</html>