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

@php
    $months = ['0',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];                             
@endphp

<body>
    <header>
        <div class="row">
            <div class="text-left">
                <img src="{{ asset('img/logo.png') }}" />
            </div>
            <div class="text-muted text-center">
                <p><b><i>ENERGIA PARA TELECOMUNICACIONES</i></b></p>
                <p><b><i>LTD NIT 900.082.621-1</i></b></p>
            </div>
            <div class="text-right">
                <img src="{{ asset('img/ICONTEC.png') }}" />
            </div>
        </div>
    </header>
    <main>
    <div class="text-center"><h3>PRIMA DE SERVCIOS</h3></div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Nombre:</th>
                <td>{{ $data->user->name }}</td>
            </tr>
            <tr>
                <th>Cédula:</th>
                <td>{{ $data->user->cedula }}</td>
            </tr>
            <tr>
                <td rowspan="2">Periodo</td>
                <td>{{ $data->premium->start_date }}</td>
            </tr>
            <tr>
                <td>{{ $data->premium->end_date }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Días Vinculados</td>
                <td>{{$data->linked_days}}</td>
            </tr>
            <tr>
                <td>Días Vinculados</td>
                <td>{{$data->license_days}}</td>
            </tr>
            <tr>
                <td>Días Vinculados</td>
                <td>{{$data->settle_days}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>TIEMPO TRABAJO</th>
                <th>VALOR SALARIAL</th>
                <th>VALOR HORAS EXTRAS</th>
                <th>AUXILIO DE TRANSPORTE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->months as $item)
                <tr class="tr-months tr_month_{{$item->month}}">
                    <th>{{$months[$item->month]}}</th>
                    <td>{{ $item->salary_month }}</td>
                    <td>{{ $item->extras_month }}</td>
                    <td>{{ $item->assistance_month }}</td>
                </tr>
            @endforeach
            <tr>
                <th>Total devengado</th>
                <td>
                    {{$data->total_devengado_salary }}
                </td>
                <td>
                    {{$data->total_devengado_extras }}
                </td>
                <td>
                    {{$data->total_devengado_assistance }}
                </td>
            </tr>
            <tr>
                <th>Promedio</th>
                <td>
                    {{$data->average_salary }}
                </td>
                <td>
                    {{$data->average_extras }}
                </td>
                <td>
                    {{$data->average_assistance }}
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <tr>
            <th colspan="2" style="text-align: center">Calculos</th>
        </tr>
        <tr>
            <td>Liquidacion por prima</td>
            <td>$ {{ number_format($data->premium->total_pay,2,',','.') }}</td>
        </tr>
        <tr>
            <td>TOTAL A PAGAR POR ESTA LIQUIDACIÓN</td>
            <td>$ {{ number_format($data->premium->total_pay,2,',','.') }}</td>
        </tr>
    </table>
</main>
        
<footer>
    <br>
    <p class="text-muted" style="color: rgb(0,176,80) !important;">ENERGITELCO SAS AGRADECE TODO SU APORTE LABORAL, DURANTE EL TIEMPO QUE LABORO CON NOSOTROS.</p>
    <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    {{-- 2059397 --}}
</footer>
</body>
</html>