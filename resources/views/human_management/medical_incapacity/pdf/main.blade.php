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
        <h3>SOLICITUD DE PERMISO LABORAL O NOTIFICACIÓN DE INCAPACIDAD MÉDICA</h3>
        <table class="table table-bordered">
        <tbody>
            <tr>
                <th>FECHA:</th>
                <td>{{$trabajo->created_at}}</td>
            </tr>
            <tr>
                <th>TRABAJADOR:</th>
                <td>{{$trabajo->trabajador->name}}</td>
            </tr>
            <tr>
                <th>CÉDULA:</th>
                <td>{{$trabajo->trabajador->cedula}}</td>
            </tr>
            <tr>
                <th>CARGO:</th>
                <td>{{$trabajo->trabajador->position->name}}</td>
            </tr>
            <tr>
                <th>AREA:</th>
                <td>{{$trabajo->trabajador->area}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2">DETALLE DEL PERMISO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    FECHA DE INICIO
                </th>
                <th>
                    FECHA DE FINALIZACIÓN
                </th>
            </tr>
            <tr>
                <td>{{$trabajo->fecha_inicio}} {{$trabajo->hora_inicio}} </td>
                <td>{{$trabajo->fecha_finalizacion}} {{$trabajo->hora_finalizacion}} </td>
            </tr>
        </tbody>
    </table>
    <p><strong>Tipo de solicitud:</strong> {{$trabajo->tipo_solicitud}}</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>MOTIVO DEL PERMISO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$trabajo->motivo_permiso}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>OBSERVACIONES DEL JEFE INMEDIATO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$trabajo->observaciones_jefe}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td colspan="3">Firmado electrónicamente por quién solicita el permiso</td>
                <td colspan="3">Firmado electrónicamente de quién aprueba el permiso</td>
            </tr>
            <tr>
                <td colspan="1">Nombre</td>
                <td colspan="2">{{$trabajo->responsableAcargo->name}}</td>
                <td colspan="1">Nombre</td>
                <td colspan="2">{{($trabajo->coordinadorAcargo) ? $trabajo->coordinadorAcargo->name : ''}}</td>
            </tr>
            <tr>
                <td colspan="1">Cédula</td>
                <td colspan="2">{{$trabajo->responsableAcargo->cedula}}</td>
                <td colspan="1">Cédula</td>
                <td colspan="2">{{($trabajo->coordinadorAcargo) ? $trabajo->coordinadorAcargo->cedula : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$trabajo->responsableAcargo->name}}</strong>, en rol de {{$trabajo->responsableAcargo->getRoleNames()[0] }}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
                </td>
                <td colspan="3">
                    @if ($trabajo->coordinadorAcargo)
                        Solicitud aprobada y firmada electrónicamente por <strong>{{$trabajo->coordinadorAcargo->name}}</strong> en rol de {{$trabajo->coordinadorAcargo->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
                    @endif
                </td>
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