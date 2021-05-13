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
            font-size: 8pt;
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
            font-size: 8pt;
        }
        .info_user p, header p, footer p {
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
            <div class="text-muted text-center">
                <p><b><i>ENERGIA PARA TELECOMUNICACIONES S.A.S.</i></b></p>
                <p><b><i>LTD NIT 900.082.621-1</i></b></p>
            </div>
            <div class="text-right">
                <img src="{{ asset('img/iso9001.jpg') }}" />
            </div>
        </div>
    </header>
    <main class="text-justify">
        <br>
        <p>{{$data->city}}, {{$date['day']}} de {{$date['month']}} de {{ $date['year']}}</p>
        <br>
        <p>Señor(a): {{$id->name}}</p>
        <p>Cargo: {{$id->position->name}}</p>
        <br>
        <p>{!! str_replace("\r\n", '<br>', addslashes($data->letter2)) !!}</p>
        <p>Gracias por los servicios prestados a nuestra compañía.</p>
        <br><br>
        <p>Atentamente,</p>
        <br>
        <p>
            Firmado electrónicamente por <b>JORGE ANDRES ORTEGA BEDOYA</b> en rol de Gerente General habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012.<br>
            ___________________________
        </p>
        <p>
        Jorge Andrés Ortega Bedoya
            <br>
            Gerente General
            <br>
            Energitelco S.A.S</p>
        <p>Firma del trabajador como constancia de recibo de esta notificación:</p>
        <br><br><br>
        ____________________________
    </main>
     
    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    </footer>
</body>
</html>