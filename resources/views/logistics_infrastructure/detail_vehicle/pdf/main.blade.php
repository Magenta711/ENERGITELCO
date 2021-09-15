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
                <img src="{{ asset('img/ICONTEC.png') }}" />
            </div>
        </div>
    </header>
    <main>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>L-FR-08</th>
                <th colspan="5">INSPECCIÓN DETALLADA DE VEHÍCULOS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th colspan="5">CHEQUEOS ANTES DE LA MARCHA DEL VEHÍCULO</th>
            </tr>
            <tr>
                <td colspan="2"><strong>Placa de vehículo</strong></td>
                <td>{{$trabajo->placa_vehiculo}}</td>
                <td colspan="2"><strong>Fecha</strong></td>
                <td>{{$trabajo->fecha}}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Ciudad</strong></td>
                <td>{{$trabajo->ciudad}}</td>
                <td colspan="2"><strong>kilometraje</strong></td>
                <td>{{$trabajo->kilometraje}}</td>
            </tr>
            {{-- User 1 --}}
            <tr>
                <td colspan="3">Nombre del conductor</td>
                <td colspan="3">{{$trabajo->condutor}}</td>
            </tr>
            <tr>
                <td colspan="3">Responsable (Quien realiza la inspección)</td>
                <td colspan="3">{{$trabajo->inspeccionador->name}}</td>
            </tr>
            {{-- Formulario 2 --}}
            <tr>
                <td colspan="2">Verificación legal</td>
                <td>Criterio</td>
                <td>Estado</td>
                <td colspan="2">Observaciones</td>
            </tr>
            <tr>
                <td rowspan="5">Documentos</td>
                <td>Licencia de conducción</td>
                <td rowspan="5">Verificar que se encuentren y que su fecha de vencimiento sea la adecuada.</td>
                <td>{{$trabajo->f1_1}}</td>
                <td rowspan="5" colspan="2">{{$trabajo->observaciones1}}</td>
            </tr>
            <tr>
                <td>SOAT</td>
                <td>{{$trabajo->f1_2}}</td>
            </tr>
            <tr>
                <td>RTM</td>
                <td>{{$trabajo->f1_3}}</td>
            </tr>
            <tr>
                <td>Seguro de daños y RC</td>
                <td>{{$trabajo->f1_4}}</td>
            </tr>
            <tr>
                <td>Certificado de gases</td>
                <td>{{$trabajo->f1_5}}</td>
            </tr>
            {{-- Formulario 3 --}}
            <tr>
                <td colspan="2">ELEMENTOS QUE SE INSPECIONAN MECANICOS, HIDRAULICOS Y ELECTRICOS</td>
                <td>Criterio</td>
                <td>Estado</td>
                {{-- <td>Fotos</td> --}}
                <td colspan="2">Observaciones</td>
            </tr>
            <tr>
                <td rowspan="2">Direccionales</td>
                <td>Delanteras</td>
                <td rowspan="2">Funcionamiento adecuado. Respuesta inmediata.</td>
                <td>{{$trabajo->f2_1}}</td>
                <td colspan="2" rowspan="33">{{$trabajo->observaciones2}}</td>
            </tr>
            <tr>
                <td>Traseras</td>
                <td>{{$trabajo->f2_2}}</td>
            </tr>
            <tr>
                <td rowspan="5">Luces</td>
                <td>Altas</td>
                <td rowspan="5">Funcionamiento de bombillos, cubiertas sin rotura, leds no fundidos.</td>
                <td>{{$trabajo->f2_3}}</td>
            </tr>
            <tr>
                <td>Bajas</td>
                <td>{{$trabajo->f2_4}}</td>
            </tr>
            <tr>
                <td>Stops</td>
                <td>{{$trabajo->f2_5}}</td>
            </tr>
            <tr>
                <td>Reversa</td>
                <td>{{$trabajo->f2_6}}</td>
            </tr>
            <tr>
                <td>Parqueo</td>
                <td>{{$trabajo->f2_7}}</td>
            </tr>
            <tr>
                <td>Limpiabrisas</td>
                <td>Derecha / Izquierda / Atrás</td>
                <td>Plumillas en buen estado (limpieza y estructura)</td>
                <td>{{$trabajo->f2_8}}</td>
            </tr>
            <tr>
                <td rowspan="3">Vidrios</td>
                <td>Adelante</td>
                <td rowspan="3">Estado general de los vidrios</td>
                <td>{{$trabajo->f2_9}}</td>
            </tr>
            <tr>
                <td>Atrás</td>
                <td>{{$trabajo->f2_10}}</td>
            </tr>
            <tr>
                <td>Laterales</td>
                <td>{{$trabajo->f2_11}}</td>
            </tr>
            <tr>
                <td>Cremalleras y elevavidrios</td>
                <td>En todas las puertas </td>
                <td>Abren y cierran sin novedad</td>
                <td>{{$trabajo->f2_12}}</td>
            </tr>
            <tr>
                <td>Seguros y chapas</td>
                <td>Puertas y maleta</td>
                <td>Abren y cierran sin novedad</td>
                <td>{{$trabajo->f2_13}}</td>
            </tr>
            <tr>
                <td rowspan="2">Bómperes y punteras</td>
                <td>Delantera</td>
                <td rowspan="2">Estado general</td>
                <td>{{$trabajo->f2_14}}</td>
            </tr>
            <tr>
                <td>Trasera</td>
                <td>{{$trabajo->f2_15}}</td>
            </tr>
            <tr>
                <td>Cojinería y carteras</td>
                <td>Asientos y compartimientos</td>
                <td>Estado general</td>
                <td>{{$trabajo->f2_16}}</td>
            </tr>
            <tr>
                <td rowspan="2">Frenos</td>
                <td>Principal</td>
                <td rowspan="2">Verificar cada día al momento de comenzar la marcha.</td>
                <td>{{$trabajo->f2_17}}</td>
            </tr>
            <tr>
                <td>Emergencia</td>
                <td>{{$trabajo->f2_18}}</td>
            </tr>
            <tr>
                <td rowspan="3">Llantas</td>
                <td>Delanteras</td>
                <td rowspan="3">Cada día, antes de comenzar la marcha, verificar su estado, profundidad del labrado y presión.</td>
                <td>{{$trabajo->f2_19}}</td>
            </tr>
            <tr>
                <td>Traseras</td>
                <td>{{$trabajo->f2_20}}</td>
            </tr>
            <tr>
                <td>Repuesto</td>
                <td>{{$trabajo->f2_21}}</td>
            </tr>
            <tr>
                <td rowspan="2">Espejos</td>
                <td>Laterales Derecho / Izquierdo</td>
                <td rowspan="2">Verificar estado (limpieza, sin rotura ni opacidad), ubicación acorde a la necesidad.</td>
                <td>{{$trabajo->f2_22}}</td>
            </tr>
            <tr>
                <td>Retrovisor</td>
                <td>{{$trabajo->f2_23}}</td>
            </tr>
            <tr>
                <td rowspan="5">Niveles de fluidos</td>
                <td>Frenos</td>
                <td rowspan="5">Verificar que los niveles de los fluidos sean los adecuados (reportar si se ven fugas).</td>
                <td>{{$trabajo->f2_24}}</td>
            </tr>
            <tr>
                <td>Embargue</td>
                <td>{{$trabajo->f2_25}}</td>
            </tr>
            <tr>
                <td>Aceite dirección</td>
                <td>{{$trabajo->f2_26}}</td>
            </tr>
            <tr>
                <td>Aceite de motor</td>
                <td>{{$trabajo->f2_27}}</td>
            </tr>
            <tr>
                <td>Refrigerante</td>
                <td>{{$trabajo->f2_28}}</td>
            </tr>
            <tr>
                <td>Pito</td>
                <td colspan="2">Accionar antes de iniciar la marcha. Debe responder de forma adecuada</td>
                <td>{{$trabajo->f2_29}}</td>
            </tr>
            <tr>
                <td>Radio y parlantes</td>
                <td colspan="2">Funciona sin novedad</td>
                <td>{{$trabajo->f2_30}}</td>
            </tr>
            <tr>
                <td>Tableros y controles</td>
                <td colspan="2">Estado general</td>
                <td>{{$trabajo->f2_31}}</td>
            </tr>
            <tr>
                <td colspan="2">Cinturones de seguridad del. / tras.</td>
                <td>Verificar el estado de las partes (hebillas y parte textil, entre otras) y ajuste</td>
                <td>{{$trabajo->f2_32}}</td>
                {{-- <td>@if ($trabajo->foto_32)<img src="{{ '/img/formulario3/'.$trabajo->foto_32 }}" width="250px" alt="{{$trabajo->foto_32}}" class="img-thumbnail"> @endif</td> --}}
            </tr>
            {{-- Formulario 3 --}}
            <tr>
                <th>2</th>
                <th colspan="5">EQUIPO DE SEGURIDAD OBLIGATORIO</th>
            </tr>
            <tr>
                <td>Equipo de carretera</td>
                <td colspan="2">Criterio</td>
                <td>Estado</td>
                {{-- <td>Foto</td> --}}
                <td colspan="2">Observaciones</td>
            </tr>
            <tr>
                <td>Herramientas</td>
                <td colspan="2">Como mínimo deberá contener: Alicate, destornilladores, llaves de expansión y llaves fijas</td>
                <td>{{$trabajo->f3_1}}</td>
                {{-- <td rowspan="11">@if ($trabajo->foto)<img src="{{'/img/formulario3/'.$trabajo->foto}}" class="img-thumbnail" width="250px" alt="{{$trabajo->foto}}"> @endif</td> --}}
                <td colspan="2">{{$trabajo->observacion_1}}</td>
            </tr>
            <tr>
                <td>Cruceta</td>
                <td colspan="2">Apta para el vehículo</td>
                <td>{{$trabajo->f3_2}}</td>
                <td colspan="2">{{$trabajo->observacion_2}}</td>
            </tr>
            <tr>
                <td>Gato</td>
                <td colspan="2">Con capacidad de elevar el vehículo</td>
                <td>{{$trabajo->f3_3}}</td>
                <td colspan="2">{{$trabajo->observacion_3}}</td>
            </tr>
            <tr>
                <td>Tacos</td>
                <td colspan="2">Dos tacos aptos para bloquear el vehículo</td>
                <td>{{$trabajo->f3_4}}</td>
                <td colspan="2">{{$trabajo->observacion_4}}</td>
            </tr>
            <tr>
                <td>Señales</td>
                <td colspan="2">Dos señales de carretera triangulares, en material reflectivo, y provistas de soportes  para ser colocadas en forma vertical  o lámparas de señal de luz amarilla intermitentes o de destellos.</td>
                <td>{{$trabajo->f3_5}}</td>
                <td colspan="2">{{$trabajo->observacion_5}}</td>
            </tr>
            <tr>
                <td>Chaleco</td>
                <td colspan="2">Debe ser reflectivo</td>
                <td>{{$trabajo->f3_6}}</td>
                <td colspan="2">{{$trabajo->observacion_6}}</td>
            </tr>
            <tr>
                <td>Botiquín</td>
                <td colspan="2">Yodopividona solución antiséptica bolsa (120ml), jabón, gasas, curas, venda elástica, microporo rollo, algodón paquete (25 gr), acetaminofén tabletas, mareol tabletas, sales de rehidratación oral, bajalenguas, suero fisiológico bolsa (250 ml), guantes latex desechables, toallas higiénicas, tijeras y termómetro oral.</td>
                <td>{{$trabajo->f3_7}}</td>
                <td colspan="2">{{$trabajo->observacion_7}}</td>
            </tr>
            <tr>
                <td>Llanta de repuesto</td>
                <td colspan="2">Estado general, profundidad del labrado y presión</td>
                <td>{{$trabajo->f3_8}}</td>
                <td colspan="2">{{$trabajo->observacion_8}}</td>
            </tr>
            <tr>
                <td>Linterna</td>
                <td colspan="2">Ilumina adecuadamente</td>
                <td>{{$trabajo->f3_9}}</td>
                <td colspan="2">{{$trabajo->observacion_9}}</td>
            </tr>
            <tr>
                <td rowspan="2">Extintor</td>
                <td colspan="2">Día / mes / año de vencimiento:</td>
                <td>{{$trabajo->f3_10}}</td>
                <td colspan="2">{{$trabajo->observacion_10}}</td>
            </tr>
            <tr>
                <td colspan="2">Capacidad:</td>
                <td>{{$trabajo->f3_11}}</td>
                <td colspan="2">{{$trabajo->observacion_11}}</td>
            </tr>
            <tr>
                <td colspan="2">Firmado electrónicamente por el responsable del trabajo o líder</td>
                <td colspan="2">Firmado electrónicamente por el auditor o coordinador</td>
            </tr>
            <tr>
                <td colspan="1">Nombre</td>
                <td colspan="2">{{$trabajo->responsableAcargo->name}}</td>
                <td colspan="1">Nombre</td>
                <td colspan="2">{{$trabajo->coordinadorAcargo->name}}</td>
            </tr>
            <tr>
                <td colspan="1">Cédula</td>
                <td colspan="2">{{$trabajo->responsableAcargo->cedula}}</td>
                <td colspan="1">Cédula</td>
                <td colspan="2">{{$trabajo->coordinadorAcargo->cedula}}</td>
            </tr>
            <tr>
                <td colspan="3">Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$trabajo->responsableAcargo->name}}</strong>, en rol de {{$trabajo->responsableAcargo->getRoleNames()[0] }} habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
                <td colspan="3">Solicitud aprobada y firmada electrónicamente por <strong>{{$trabajo->coordinadorAcargo->name}}</strong> en rol de {{$trabajo->coordinadorAcargo->getRoleNames()[0] }} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
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