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
            margin: 5.5cm 2cm 2cm 2cm;
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
            height: 1.3cm;
            width: auto;
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

        footer p {
            margin: 0;
        }

        table {
            width: 100%,
        }
        .text-center {
            text-align: center;
        }

        .page-number:before {
            content: counter(page);
        }
        #page-total:before {
            content: counter(page);
        }
        /* #pageCounter {
            counter-reset: pageTotal;
        }
        #pageCounter span {
            counter-increment: pageTotal; 
        }
        #pageNumbers {
            counter-reset: currentPage;
        }
        #pageNumbers div:before { 
            counter-increment: currentPage; 
            content: "Page " counter(currentPage) " of "; 
        }
        #pageNumbers div:after { 
            content: counter(pageTotal); 
        } */
        .text-uppercase {
            text-transform: uppercase !important;
        }
    </style>
</head>
<body>
    <header>
        <table class="table table-sm table-bordered">
            <tr>
                <td rowspan="4" class="text-center"><img src="{{ asset('img/logo.png') }}" height="40px" /></td>
                <th rowspan="4" class="text-center"><h4 class="text-uppercase">{{$id->affair}}</h4></th>
                <td>Código</td>
                <td>H-SST-FR-02</td>
            </tr>
            <tr>
                <td>Versión</td>
                <td>01</td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td>02/05/2019</td>
            </tr>
            <tr>
                <td>Página</td>
                <td><b class="page-number"></b></td>
            </tr>
        </table>
    </header>
    <main>
        <table class="table table-sm table-bordered">
            <tr>
                <th>{{$id->city}}, {{$id->date}}</th>
                <th>Hora de inicio: {{$id->time_start}}</th>
                <th>Hora de final: {{$id->time_end}}</th>
            </tr>
            <tr>
                <th>Lugar: {{$id->place}}</th>
                <th colspan="2">ACTA No° 1</th>
            </tr>
            <tr>
                <td colspan="3">
                    {!!$id->theme!!}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    {!!$id->development!!}
                </td>
            </tr>
            <tr>
                <th class="text-center">Compromisos</th>
                <th class="text-center">Responsable</th>
                <th class="text-center">Fecha de ejecución</th>
            </tr>
            @foreach ($id->commitments as $item)
                <tr>
                    <td class="text-uppercase">{{$item->user->name}}</td>
                    <td>{{$item->commitment}}</td>
                    <td>{{$item->date_execution}}</td>
                </tr>
            @endforeach
            <tr>
                <th class="text-center" colspan="3">ASISTENTES</th>
            </tr>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Cargo</th>
                <th class="text-center">Firma</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($id->users as $user)
                @if ($i < $id->assistant)
                    <tr>
                        <td class="text-uppercase">{{$user->name}}</td>
                        <td class="text-uppercase">{{$user->position->name}}</td>
                        <td></td>
                    </tr>
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
            <tr>
                <th class="text-center" colspan="3">INVITADOS</th>
            </tr>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Cargo</th>
                <th class="text-center">Firma</th>
            </tr>
            @php
                $i = 0;
                $total = $id->assistant + $id->guest;
            @endphp
            @foreach ($id->users as $user)
                @if ($i >= $id->assistant && $i < $total)
                    <tr>
                        <td class="text-uppercase">{{$user->name}}</td>
                        <td class="text-uppercase">{{$user->position->name}}</td>
                        <td></td>
                    </tr>
                @endif
                @php
                    $i++;
                @endphp    
            @endforeach
            @if ($id->guest == 0)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
        </table>
    </main>
        
    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    </footer>
</body>
</html>