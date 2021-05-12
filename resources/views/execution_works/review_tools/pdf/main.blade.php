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
                <th>O-FR-06</th>
                <th colspan="4">REVISIÓN Y ASIGNACIÓN DE HERRAMIENTAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="2">Revisor</td>
                <td colspan="2">Cédula</td>
                <td colspan="2">Nombre del funcionario</td>
            </tr>
            <tr>
                <td colspan="2">{{$trabajo->revisor->cedula}}</td>
                <td colspan="2">{{$trabajo->revisor->name}}</td>
            </tr>
            <tr>
                <td rowspan="2">Revisado</td>
                <td colspan="2">Cédula</td>
                <td colspan="2">Nombre del funcionario</td>
            </tr>
            <tr>
                <td colspan="2">{{$trabajo->revisado->cedula}}</td>
                <td colspan="2">{{$trabajo->revisado->name}}</td>
            </tr>
            <tr>
                <td colspan="3">Fehca y hora</td>
                <td colspan="2">{{{$trabajo->created_at}}}</td>
            </tr>
            <tr>
                <td>Ítem</td>
                <td>Herramienta asignada</td>
                <td>Cantidad</td>
                <td>Marca</td>
                <td>Observaciones</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Brújula (GPS)</td>
                <td>{{$trabajo->cantidad_1}}</td>
                <td>{{$trabajo->marca_1}}</td>
                <td>{{$trabajo->observacion_1}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Multímetro digital</td>
                <td>{{$trabajo->cantidad_2}}</td>
                <td>{{$trabajo->marca_2}}</td>
                <td>{{$trabajo->observacion_2}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Cables USB 2.0 o ETHERNET</td>
                <td>{{$trabajo->cantidad_3}}</td>
                <td>{{$trabajo->marca_3}}</td>
                <td>{{$trabajo->observacion_3}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Llaves para tableros de BTS, ZTE, HUAWEI</td>
                <td>{{$trabajo->cantidad_4}}</td>
                <td>{{$trabajo->marca_4}}</td>
                <td>{{$trabajo->observacion_4}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Ponchadora BNC</td>
                <td>{{$trabajo->cantidad_5}}</td>
                <td>{{$trabajo->marca_5}}</td>
                <td>{{$trabajo->observacion_5}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Ponchadora RJ45</td>
                <td>{{$trabajo->cantidad_6}}</td>
                <td>{{$trabajo->marca_6}}</td>
                <td>{{$trabajo->observacion_6}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Juego de llaves TORX</td>
                <td>{{$trabajo->cantidad_7}}</td>
                <td>{{$trabajo->marca_7}}</td>
                <td>{{$trabajo->observacion_7}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Juego de llaves hexágonas</td>
                <td>{{$trabajo->cantidad_8}}</td>
                <td>{{$trabajo->marca_8}}</td>
                <td>{{$trabajo->observacion_8}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Cortafrío</td>
                <td>{{$trabajo->cantidad_9}}</td>
                <td>{{$trabajo->marca_9}}</td>
                <td>{{$trabajo->observacion_9}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Pinza</td>
                <td>{{$trabajo->cantidad_10}}</td>
                <td>{{$trabajo->marca_10}}</td>
                <td>{{$trabajo->observacion_10}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Bisturí</td>
                <td>{{$trabajo->cantidad_11}}</td>
                <td>{{$trabajo->marca_11}}</td>
                <td>{{$trabajo->observacion_11}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Cautín</td>
                <td>{{$trabajo->cantidad_12}}</td>
                <td>{{$trabajo->marca_12}}</td>
                <td>{{$trabajo->observacion_12}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Juego de destornilladores de pala y estrella</td>
                <td>{{$trabajo->cantidad_13}}</td>
                <td>{{$trabajo->marca_13}}</td>
                <td>{{$trabajo->observacion_13}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Destornillador perillero de pala y estrella</td>
                <td>{{$trabajo->cantidad_14}}</td>
                <td>{{$trabajo->marca_14}}</td>
                <td>{{$trabajo->observacion_14}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Alicate</td>
                <td>{{$trabajo->cantidad_15}}</td>
                <td>{{$trabajo->marca_15}}</td>
                <td>{{$trabajo->observacion_15}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Mango de sierra</td>
                <td>{{$trabajo->cantidad_16}}</td>
                <td>{{$trabajo->marca_16}}</td>
                <td>{{$trabajo->observacion_16}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Juego de llaves combinadas</td>
                <td>{{$trabajo->cantidad_17}}</td>
                <td>{{$trabajo->marca_17}}</td>
                <td>{{$trabajo->observacion_17}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Llave de expansión pequeña</td>
                <td>{{$trabajo->cantidad_18}}</td>
                <td>{{$trabajo->marca_18}}</td>
                <td>{{$trabajo->observacion_18}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Llave de expansión grande 12 pulgadas</td>
                <td>{{$trabajo->cantidad_19}}</td>
                <td>{{$trabajo->marca_19}}</td>
                <td>{{$trabajo->observacion_19}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Unión BNC-BNC super importante</td>
                <td>{{$trabajo->cantidad_20}}</td>
                <td>{{$trabajo->marca_20}}</td>
                <td>{{$trabajo->observacion_20}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Led de prueba super importante</td>
                <td>{{$trabajo->cantidad_21}}</td>
                <td>{{$trabajo->marca_21}}</td>
                <td>{{$trabajo->observacion_21}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Extensión eléctrica</td>
                <td>{{$trabajo->cantidad_22}}</td>
                <td>{{$trabajo->marca_22}}</td>
                <td>{{$trabajo->observacion_22}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Martillo</td>
                <td>{{$trabajo->cantidad_23}}</td>
                <td>{{$trabajo->marca_23}}</td>
                <td>{{$trabajo->observacion_23}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Tijera de corte especial</td>
                <td>{{$trabajo->cantidad_24}}</td>
                <td>{{$trabajo->marca_24}}</td>
                <td>{{$trabajo->observacion_24}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Cortafrío pequeño</td>
                <td>{{$trabajo->cantidad_25}}</td>
                <td>{{$trabajo->marca_25}}</td>
                <td>{{$trabajo->observacion_25}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Taladro</td>
                <td>{{$trabajo->cantidad_26}}</td>
                <td>{{$trabajo->marca_26}}</td>
                <td>{{$trabajo->observacion_26}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Juego de brocas de lámina</td>
                <td>{{$trabajo->cantidad_27}}</td>
                <td>{{$trabajo->marca_27}}</td>
                <td>{{$trabajo->observacion_27}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Broca de muro</td>
                <td>{{$trabajo->cantidad_28}}</td>
                <td>{{$trabajo->marca_28}}</td>
                <td>{{$trabajo->observacion_28}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>PC con PTO ETH y los SW para MW, BTS y POWER</td>
                <td>{{$trabajo->cantidad_29}}</td>
                <td>{{$trabajo->marca_29}}</td>
                <td>{{$trabajo->observacion_29}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Bolso para portar PC</td>
                <td>{{$trabajo->cantidad_30}}</td>
                <td>{{$trabajo->marca_30}}</td>
                <td>{{$trabajo->observacion_30}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Smartphone con app Energitelco. puede ser personal</td>
                <td>{{$trabajo->cantidad_31}}</td>
                <td>{{$trabajo->marca_31}}</td>
                <td>{{$trabajo->observacion_31}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Marquilladora con cinta dimo</td>
                <td>{{$trabajo->cantidad_32}}</td>
                <td>{{$trabajo->marca_32}}</td>
                <td>{{$trabajo->observacion_32}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Bolso para arnés</td>
                <td>{{$trabajo->cantidad_33}}</td>
                <td>{{$trabajo->marca_33}}</td>
                <td>{{$trabajo->observacion_33}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Vehículo o moto</td>
                <td>{{$trabajo->cantidad_34}}</td>
                <td>{{$trabajo->marca_34}}</td>
                <td>{{$trabajo->observacion_34}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Llaves de ingreso a sede Energitelco</td>
                <td>{{$trabajo->cantidad_35}}</td>
                <td>{{$trabajo->marca_35}}</td>
                <td>{{$trabajo->observacion_35}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Silla</td>
                <td>{{$trabajo->cantidad_36}}</td>
                <td>{{$trabajo->marca_36}}</td>
                <td>{{$trabajo->observacion_36}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Escritorio</td>
                <td>{{$trabajo->cantidad_37}}</td>
                <td>{{$trabajo->marca_37}}</td>
                <td>{{$trabajo->observacion_37}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Arnés</td>
                <td>{{$trabajo->cantidad_38}}</td>
                <td>{{$trabajo->marca_38}}</td>
                <td>{{$trabajo->observacion_38}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Casco</td>
                <td>{{$trabajo->cantidad_39}}</td>
                <td>{{$trabajo->marca_39}}</td>
                <td>{{$trabajo->observacion_39}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Barbuquejo</td>
                <td>{{$trabajo->cantidad_40}}</td>
                <td>{{$trabajo->marca_40}}</td>
                <td>{{$trabajo->observacion_40}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Gafas de seguridad</td>
                <td>{{$trabajo->cantidad_41}}</td>
                <td>{{$trabajo->marca_41}}</td>
                <td>{{$trabajo->observacion_41}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Eslinga en Y</td>
                <td>{{$trabajo->cantidad_42}}</td>
                <td>{{$trabajo->marca_42}}</td>
                <td>{{$trabajo->observacion_42}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Eslinga de posicionamiento</td>
                <td>{{$trabajo->cantidad_43}}</td>
                <td>{{$trabajo->marca_43}}</td>
                <td>{{$trabajo->observacion_43}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Mosquetón</td>
                <td>{{$trabajo->cantidad_44}}</td>
                <td>{{$trabajo->marca_44}}</td>
                <td>{{$trabajo->observacion_44}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Freno para guaya de 10 mm</td>
                <td>{{$trabajo->cantidad_45}}</td>
                <td>{{$trabajo->marca_45}}</td>
                <td>{{$trabajo->observacion_45}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Equipo de protección caídas para moto</td>
                <td>{{$trabajo->cantidad_46}}</td>
                <td>{{$trabajo->marca_46}}</td>
                <td>{{$trabajo->observacion_46}}</td>
            </tr>
            <tr>
                <td>{{++$i}}</td>
                <td>Impermeable para moto</td>
                <td>{{$trabajo->cantidad_47}}</td>
                <td>{{$trabajo->marca_47}}</td>
                <td>{{$trabajo->observacion_47}}</td>
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