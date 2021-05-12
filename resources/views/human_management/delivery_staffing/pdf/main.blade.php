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
    </style>
</head>
@php
    $i = 0;
@endphp
<body>
    <header>
        <div class="row">
            <div class="text-left">
                <img src="{{ asset('img/logo.png') }}" />
            </div>
            <div class="text-muted text-center">
                <p><b><i>ENERGIA PARA TELECOMUNICACIONES S.A.S.</i></b></p>
                <p><b><i>LTD NIT 900.082.621-1</i></b></p>
            </div>
            <div class="text-right">
                <img src="{{ asset('img/iso9001.jpg') }}" />
            </div>
        </div>
    </header>
    <main>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>H-FR-09</th>
                <th colspan="4">ENTREGA DE DOTACIÓN PERSONAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2">Empleado</td>
                <td colspan="2">Cédula</td>
                <td colspan="2">Nombre del funcionario</td>
            </tr>
            <tr>
                <td colspan="2">{{$trabajo->empleado->cedula}}</td>
                <td colspan="2">{{$trabajo->empleado->name}}</td>
            </tr>
            <tr>
                <td colspan="3">Fehca y hora</td>
                <td colspan="2">{{{$trabajo->created_at}}}</td>
            </tr>
            <tr>
                <td>Ítem</td>
                <td colspan="2">Descripción</td>
                <td>Cantidad</td>
                <td>Marca</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Overol cuerpo entero Energitelco</td>
                <td>{{$trabajo->cantidad_1}}</td>
                <td>{{$trabajo->marca_1}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Botas dieléctricas</td>
                <td>{{$trabajo->cantidad_2}}</td>
                <td>{{$trabajo->marca_2}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Guantes tipo ingeniero</td>
                <td>{{$trabajo->cantidad_3}}</td>
                <td>{{$trabajo->marca_3}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Tapabocas</td>
                <td>{{$trabajo->cantidad_4}}</td>
                <td>{{$trabajo->marca_4}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Chaqueta Energitelco</td>
                <td>{{$trabajo->cantidad_5}}</td>
                <td>{{$trabajo->marca_5}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Camiseta Energitelco</td>
                <td>{{$trabajo->cantidad_6}}</td>
                <td>{{$trabajo->marca_6}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Pantalón Energitelco</td>
                <td>{{$trabajo->cantidad_7}}</td>
                <td>{{$trabajo->marca_7}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Protector auditivo</td>
                <td>{{$trabajo->cantidad_8}}</td>
                <td>{{$trabajo->marca_8}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Gafas o careta para protección visual</td>
                <td>{{$trabajo->cantidad_9}}</td>
                <td>{{$trabajo->marca_9}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Casco para moto certificadocon placa</td>
                <td>{{$trabajo->cantidad_10}}</td>
                <td>{{$trabajo->marca_10}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Chaleco reflectivo</td>
                <td>{{$trabajo->cantidad_11}}</td>
                <td>{{$trabajo->marca_11}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Impermeable</td>
                <td>{{$trabajo->cantidad_12}}</td>
                <td>{{$trabajo->marca_12}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Motocicleta</td>
                <td>{{$trabajo->cantidad_13}}</td>
                <td>{{$trabajo->marca_13}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Protectores de rodillas y codos</td>
                <td>{{$trabajo->cantidad_14}}</td>
                <td>{{$trabajo->marca_14}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Manos libres para conducir vehículos</td>
                <td>{{$trabajo->cantidad_15}}</td>
                <td>{{$trabajo->marca_15}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td colspan="2">Guantes de caucho</td>
                <td>{{$trabajo->cantidad_16}}</td>
                <td>{{$trabajo->marca_16}}</td>
            </tr>
            <tr>
                <td colspan="2">Firmado electrónicamente por el responsable del trabajo o líder</td>
                <td></td>
                <td colspan="2">Firmado electrónicamente por el auditor o coordinador</td>
            </tr>
            <tr>
                <td colspan="1">Nombre</td>
                <td colspan="1">{{$trabajo->responsableAcargo->name}}</td>
                <td></td>
                <td colspan="1">Nombre</td>
                <td colspan="1">{{$trabajo->coordinadorAcargo->name}}</td>
            </tr>
            <tr>
                <td colspan="1">Cédula</td>
                <td colspan="1">{{$trabajo->responsableAcargo->cedula}}</td>
                <td></td>
                <td colspan="1">Cédula</td>
                <td colspan="1">{{$trabajo->coordinadorAcargo->cedula}}</td>
            </tr>
            <tr>
                <td colspan="2">Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$trabajo->responsableAcargo->name}}</strong>, en rol de {{$trabajo->responsableAcargo->getRoleNames()[0] }}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
                <td></td>
                <td colspan="2">Solicitud aprobada y firmada electrónicamente por <strong>{{$trabajo->coordinadorAcargo->name}}</strong> en rol de {{$trabajo->coordinadorAcargo->getRoleNames()[0] }} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
            </tr>
        </tbody>
    </table>
</main>
        
<footer>
    <br>
    <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
    <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
</footer>
</body>
</html>