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
            margin: 4cm 2cm 2cm 2cm;
            background: #fff;
        }
 
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            opacity: 0.6;
            margin: 0.5cm 2cm 2cm 2cm;
        }

        header img {
            height: 2cm;
            width: auto;
            /* margin-top: -1cm; */
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
        header p, footer p {
            margin: 0;
        }
        header table {
            color: #878787;
        }
        .bg-gray {
            background: #d2d6de;
        }
    </style>
</head>
@php
    $i = 0;
@endphp
<body>
    <header>
        <table class="table table-sm table-bordered">
            <tr>
                <td class="text-center" rowspan="4" colspan="2">
                    <img src="{{ asset('img/logo.png') }}" />
                </td>
                <th class="text-center" rowspan="4" colspan="4">
                    ACCIONES CORRECTIVAS Y DE MEJORA
                </th>
                <th>Código</th>
                <td class="text-center">D-FR-12</td>
            </tr>
            <tr>
                <th>Versión</th>
                <td class="text-center">01</td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td class="text-center">14/08/2017</td>
            </tr>
            <tr>
                <th>Página</th>
                <td class="text-center"></td>
            </tr>
        </table>
    </header>
    <main>
        <table class="table table-sm table-bordered">
            <tr>
                <td colspan="3">
                    <b>Fecha:</b> {{$id->date}}
                </td>
                <td colspan="4">
                    <b>Proceso:</b> {{$id->process}}
                </td>
                <td colspan="2">
                    <b>Acción número:</b> {{$id->num}}
                </td>
            </tr>
            <tr>
                <td colspan="9">
                    <b>Presentada por:</b> {{$id->by}}
                </td>
            </tr>
            <tr>
                <td>{{$id->type == 'Acción correctiva' ? 'X' : ''}}</td>
                <td colspan="3">Acción correctiva</td>
                <td>{{$id->type == 'Acción de mejora' ? 'X' : ''}}</td>
                <td colspan="4">Acción de mejora</td>
            </tr>
            <tr>
                <th colspan="9" class="text-center bg-gray">Descripción del efecto, problema o riesgo identificado</td>
            </tr>
            <tr>
                <td colspan="9">
                    {!! $id->effect_description !!}
                </td>
            </tr>
            <tr>
                <th colspan="9" class="text-center bg-gray">Descripción de posibles causas</td>
            </tr>
            <tr>
                <th colspan="2">INFRAESTRUCTURA</th>
                <td colspan="7">{{$id->infraestructure}}</td>
            </tr>
            <tr>
                <th colspan="2">TALENTO HUMANO</th>
                <td colspan="7">{{$id->human_talent}}</td>
            </tr>
            <tr>
                <th colspan="2">INFORMACIÓN</th>
                <td colspan="7">{{$id->information}}</td>
            </tr>
            <tr>
                <th colspan="2">MEDICIÓN</th>
                <td colspan="7">{{$id->measuring}}</td>
            </tr>
            <tr>
                <th colspan="2">MEDIO AMBIENTE</th>
                <td colspan="7">{{$id->environment}}</td>
            </tr>
            <tr>
                <th colspan="2">MÉTODO</th>
                <td colspan="7">{{$id->method}}</td>
            </tr>
            <tr>
                <th colspan="2">Causa(s) principal(es)</th>
                <td colspan="7">{{$id->cause}}</td>
            </tr>
            <tr>
                <th colspan="9" class="text-center bg-gray">Plan de Acción</th>
            </tr>
            <tr>
                <th class="text-center" colspan="6">Tarea</th>
                <th class="text-center" colspan="1">Responsable</th>
                <th class="text-center" colspan="2">Fecha</th>
            </tr>
            @foreach ($id->details as $item)
                @if ($item->type == 'action')
                <tr>
                    <td colspan="6"> {!!$item->text!!}</td>
                    <td>
                        @foreach ($item->users as $uId => $ui)
                            {{$ui->user->name}}/
                        @endforeach
                    </td>
                    <td colspan="2"> {{$item->start_date}}</td>
                </tr>
                @endif
            @endforeach
            <tr>
                <th colspan="9" class="text-center bg-gray">Seguimiento y Verificación del Plan de Acción</th>
            </tr>
            <tr>
                <th colspan="6" rowspan="2" class="text-center">Tarea</th>
                <th rowspan="2" class="text-center">Responsable</th>
                <th colspan="2" class="text-center">Fecha</th>
            </tr>
            <tr>
                <th class="text-center">Inicia</th>
                <th class="text-center">Termina</th>
            </tr>
            @foreach ($id->details as $item)
                @if ($item->type == 'tracing')
                <tr>
                    <td colspan="6"> {!!$item->text!!}</td>
                    <td>
                        @foreach ($item->users as $uId => $ui)
                            <span>{{ $ui->user->name }} / </span>
                        @endforeach
                    </td>
                    <td> {{date('m-Y',strtotime($item->start_date))}}</td>
                    <td> {{date('m-Y',strtotime($item->end_date))}}</td>
                </tr>
                @endif
            @endforeach
            <tr>
                <th colspan="9" class="text-center bg-gray">Evaluación de las acciones tomadas</th>
            </tr>
            <tr>
                <td colspan="5">Responsable: Jorge Andrés Ortega Bedoya</td>
                <td colspan="4">Fecha de cierre de la acción</td>
            </tr>
            <tr>
                <td colspan="9">Comentarios adicionales: {{$id->commentary}}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">Se cierra la acción</td>
                <td></td>
                <td colspan="4">No es posible cerrar la acción.</td>
            </tr>
        </table>
    </main>
        
<footer>
    <br>
    <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
    <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
</footer>
<script type="text/php">
    if (isset($pdf)) {
        $x = 700;
        $y = 93;
        $text = "Page {PAGE_NUM} de {PAGE_COUNT}";
        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
        $size = 10;
        $pdf->page_text($x, $y, $text, $font, $size);
    }
</script>
</body>
</html>