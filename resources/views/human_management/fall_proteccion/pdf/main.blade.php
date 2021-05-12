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
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>H-FR-34</th>
                <th colspan="4">INSPECCIÓN DE EQUIPOS DE PROTECCIÓN CONTRA CAÍDAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">Trabajador</td>
                <td colspan="3">{{$trabajo->trabajador->name}}</td>
            </tr>
            <tr>
                <td colspan="2">Cargo</td>
                <td colspan="3">{{$trabajo->trabajador->position->name}}</td>
            </tr>
            <tr>
                <td colspan="2">Responsable de la inspección</td>
                <td colspan="3">{{$trabajo->inspeccionador->name}}</td>
            </tr>
            <tr>
                <td colspan="2">Cargo</td>
                <td colspan="3">{{$trabajo->inspeccionador->position->name}}</td>
            </tr>
            <tr>
                <td colspan="2">Fecha de inspección</td>
                <td colspan="3">{{$trabajo->fecha_inspeccion}}</td>
            </tr>
            <tr>
                <th>Equipo</td>
                <th>Parte</td>
                <th>Aspecto a inspeccionar</th>
                <th>Si / No</th>
                <th>Observaciones</th>
            </tr>
            {{-- Formulario 2 --}}
            <tr>
                <td rowspan="20">ARNÉS</td>
                <td rowspan="13">CINTAS, CORREAS Y COSTURAS</td>
                <td>Cortes o rotura del tejido o costuras </td>
                <td>{{$trabajo->E1_1}}</td>
                <td rowspan="17">{{$trabajo->observaciones_1}}</td>
            </tr>
            <tr>
                <td>Fisuras</td>
                <td>{{$trabajo->E1_2}}</td>
            </tr>
            <tr>
                <td>Estiramiento excesivo (elongación de la riata)</td>
                <td>{{$trabajo->E1_3}}</td>
            </tr>
            <tr>
                <td>Deterioro generar</td>
                <td>{{$trabajo->E1_4}}</td>
            </tr>
            <tr>
                <td>Corrosión o desastres por exposición a ácidos o productos químicos</td>
                <td>{{$trabajo->E1_5}}</td>
            </tr>
            <tr>
                <td>Quemaduras o fibras derretidas</td>
                <td>{{$trabajo->E1_6}}</td>
            </tr>
            <tr>
                <td>Perforaciones o agujeros</td>
                <td>{{$trabajo->E1_7}}</td>
            </tr>
            <tr>
                <td>Presenta suciedad</td>
                <td>{{$trabajo->E1_8}}</td>
            </tr>
            <tr>
                <td>Costuras completas</td>
                <td>{{$trabajo->E1_9}}</td>
            </tr>
            <tr>
                <td>Cuenta con la etiqueta de certificación</td>
                <td>{{$trabajo->E1_10}}</td>
            </tr>
            <tr>
                <td>Deshilachamiento</td>
                <td>{{$trabajo->E1_11}}</td>
            </tr>
            <tr>
                <td>Hilos faltantes</td>
                <td>{{$trabajo->E1_12}}</td>
            </tr>
            <tr>
                <td>Reventadas</td>
                <td>{{$trabajo->E1_13}}</td>
            </tr>
            <tr>
                <td rowspan="4">PARTES METÁLICAS</td>
                <td>Deformación (dobladura, ect.)</td>
                <td>{{$trabajo->E1_14}}</td>
            </tr>
            <tr>
                <td>Picadura, grietas</td>
                <td>{{$trabajo->E1_15}}</td>
            </tr>
            <tr>
                <td>Presenta desgaste</td>
                <td>{{$trabajo->E1_16}}</td>
            </tr>
            <tr>
                <td>Corrosión u oxidación</td>
                <td>{{$trabajo->E1_17}}</td>
            </tr>
            <tr>
                <td colspan="2">Serie del equipo</td>
                <td colspan="2">{{$trabajo->serie_equipo_1}}</td>
            </tr>
            <tr>
                <td colspan="2">Marca del equipo</td>
                <td colspan="2">{{$trabajo->marca_1}}</td>
            </tr>
            <tr>
                <td colspan="2">Estado general del arnés</td>
                <td colspan="2">{{$trabajo->estado_arnes}}</td>
            </tr>
            <tr>
                <th>Equipo</td>
                <th>Parte</td>
                <th>Aspecto a inspeccionar</th>
                <th>Si / No</th>
                <th>Observaciones</th>
            </tr>
            {{-- Formulario 3 --}}
            <tr>
                <td rowspan="21">ESLINGA EN Y</td>
                <td rowspan="14">CINTAS, CORREAS, COSTURAS Y ABSORBEDOR</td>
                <td>Presenta perforaciones o desgastes</td>
                <td>{{$trabajo->E2_1}}</td>
                <td rowspan="18">{{$trabajo->observaciones_2}}</td>
            </tr>
            <tr>
                <td>Costuras sueltas o reventadas</td>
                <td>{{$trabajo->E2_2}}</td>
            </tr>
            <tr>
                <td>Deterioro</td>
                <td>{{$trabajo->E2_3}}</td>
            </tr>
            <tr>
                <td>Presenta suciedad</td>
                <td>{{$trabajo->E2_4}}</td>
            </tr>
            <tr>
                <td>Salpicaduras de pintura y rigidez en cinta</td>
                <td>{{$trabajo->E2_5}}</td>
            </tr>
            <tr>
                <td>Cortes o roturas del tejido o costuras</td>
                <td>{{$trabajo->E2_6}}</td>
            </tr>
            <tr>
                <td>Fisuras</td>
                <td>{{$trabajo->E2_7}}</td>
            </tr>
            <tr>
                <td>Estiramiento excesivo (elongación de la riata)</td>
                <td>{{$trabajo->E2_8}}</td>
            </tr>
            <tr>
                <td>Deterioro general</td>
                <td>{{$trabajo->E2_9}}</td>
            </tr>
            <tr>
                <td>Corrosión o desgas tes por exposición a ácidos o productos químicos</td>
                <td>{{$trabajo->E2_10}}</td>
            </tr>
            <tr>
                <td>Quemaduras o fibras derretidas</td>
                <td>{{$trabajo->E2_11}}</td>
            </tr>
            <tr>
                <td>Perforaciones o agujeros</td>
                <td>{{$trabajo->E2_12}}</td>
            </tr>
            <tr>
                <td>Costuras completas</td>
                <td>{{$trabajo->E2_13}}</td>
            </tr>
            <tr>
                <td>Cuenta con etiqueta de certificación </td>
                <td>{{$trabajo->E2_14}}</td>
            </tr>
            <tr>
                <td rowspan="4">PARTES METÁLICAS</td>
                <td>Deformación (dobladura, ect.)</td>
                <td>{{$trabajo->E2_15}}</td>
            </tr>
            <tr>
                <td>Picadura, grietas</td>
                <td>{{$trabajo->E2_16}}</td>
            </tr>
            <tr>
                <td>Presenta desgaste</td>
                <td>{{$trabajo->E2_17}}</td>
            </tr>
            <tr>
                <td>Corrosión u oxidación</td>
                <td>{{$trabajo->E2_18}}</td>
            </tr>
            <tr>
                <td colspan="2">Serie del equipo</td>
                <td colspan="2">{{$trabajo->serie_equipo_2}}</td>
            </tr>
            <tr>
                <td colspan="2">Marca del equipo</td>
                <td colspan="2">{{$trabajo->marca_equipo_2}}</td>
            </tr>
            <tr>
                <td colspan="2">Estado general de la eslinga en Y</td>
                <td colspan="2">{{$trabajo->estado_eslinga}}</td>
            </tr>
            <tr>
                <th>Equipo</td>
                <th>Parte</td>
                <th>Aspecto a inspeccionar</th>
                <th>Si / No</th>
                <th>Observaciones</th>
            </tr>
            {{-- Formulario 3 --}}
            <tr>
                <td rowspan="17">ESLINGA DE POSICIONAMIENTO</td>
                <td rowspan="9">CINTAS, CORREAS Y COSTURAS</td>
                <td>Cortes o rotura del tejido o costuras</td>
                <td>{{$trabajo->E3_1}}</td>
                <td rowspan="14">{{$trabajo->observaciones_3}}</td>
            </tr>
            <tr>
                <td>Fisuras</td>
                <td>{{$trabajo->E3_2}}</td>
            </tr>
            <tr>
                <td>Estiramiento excesivo (elongación de la riata)</td>
                <td>{{$trabajo->E3_2}}</td>
            </tr>
            <tr>
                <td>Deterioro general</td>
                <td>{{$trabajo->E3_3}}</td>
            </tr>
            <tr>
                <td>Corrosión o desgastes por exposición a ácidos o productos químicos</td>
                <td>{{$trabajo->E3_4}}</td>
            </tr>
            <tr>
                <td>Quemaduras o fibras derretidas</td>
                <td>{{$trabajo->E3_5}}</td>
            </tr>
            <tr>
                <td>Perforaciones o agujeros</td>
                <td>{{$trabajo->E3_6}}</td>
            </tr>
            <tr>
                <td>Presenta suciedad</td>
                <td>{{$trabajo->E3_7}}</td>
            </tr>
            <tr>
                <td>Costuras completas</td>
                <td>{{$trabajo->E3_8}}</td>
            </tr>
            <tr>
                <td>Cuenta con etiqueta de certificación</td>
                <td>{{$trabajo->E3_9}}</td>
            </tr>
            <tr>
                <td rowspan="4">PARTES METÁLICAS</td>
                <td>Deformación (dobladura, ect.)</td>
                <td>{{$trabajo->E2_10}}</td>
            </tr>
            <tr>
                <td>Picadura, grietas</td>
                <td>{{$trabajo->E2_11}}</td>
            </tr>
            <tr>
                <td>Presenta desgaste</td>
                <td>{{$trabajo->E2_12}}</td>
            </tr>
            <tr>
                <td>Corrosión u oxidación</td>
                <td>{{$trabajo->E2_13}}</td>
            </tr>
            <tr>
                <td colspan="2">Serie del equipo</td>
                <td colspan="2">{{$trabajo->serie_equipo_3}}</td>
            </tr>
            <tr>
                <td colspan="2">Marca del equipo</td>
                <td colspan="2">{{$trabajo->marca_equipo_3}}</td>
            </tr>
            <tr>
                <td colspan="2">Estado general de la eslinga</td>
                <td colspan="2">{{$trabajo->estado_eslinga2}}</td>
            </tr>
            <tr>
                <th>Equipo</td>
                <th>Parte</td>
                <th>Aspecto a inspeccionar</th>
                <th>Si / No</th>
                <th>Observaciones</th>
            </tr>
            {{-- Formulario 4 --}}
            <tr>
                <td rowspan="22">ACCESORIOS</td>
                <td rowspan="8">MOSQUETÓN</td>
                <td>Deformación (dobladura, etc.)</td>
                <td>{{$trabajo->E4_1}}</td>
                <td rowspan="8">{{$trabajo->observaciones_4}}</td>
            </tr>
            <tr>
                <td>Deformación (dobladura, etc.)</td>
                <td>{{$trabajo->E4_2}}</td>
            </tr>
            <tr>
                <td>Bloqueo (ajuste excesivo) de los mosquetones en cierres de seguridad.</td>
                <td>{{$trabajo->E4_2}}</td>
            </tr>
            <tr>
                <td>Grietas o picaduras</td>
                <td>{{$trabajo->E4_3}}</td>
            </tr>
            <tr>
                <td>Resortes (detecta fallas)</td>
                <td>{{$trabajo->E4_4}}</td>
            </tr>
            <tr>
                <td>Deterioro general</td>
                <td>{{$trabajo->E4_5}}</td>
            </tr>
            <tr>
                <td>Corrosión</td>
                <td>{{$trabajo->E4_6}}</td>
            </tr>
            <tr>
                <td>Presencia de oxidación (moho)</td>
                <td>{{$trabajo->E4_7}}</td>
            </tr>
            <tr>
                <td colspan="2">Serie del equipo</td>
                <td colspan="2">{{$trabajo->serie_equipo_4}}</td>
            </tr>
            <tr>
                <td colspan="2">Marca del equipo</td>
                <td colspan="2">{{$trabajo->marca_equipo_4}}</td>
            </tr>
            <tr>
                <td colspan="2">Estado general del mosquetón</td>
                <td colspan="2">{{$trabajo->estado_mosqueton}}</td>
            </tr>
            <tr>
                <td rowspan="8">Freno</td>
                <td>Deformación (dobladura, etc.)</td>
                <td>{{$trabajo->E5_1}}</td>
                <td rowspan="8">{{$trabajo->observaciones_5}}</td>
            </tr>
            <tr>
                <td>Bloqueo (ajuste excesivo) de los mosquetones en cierres de seguridad</td>
                <td>{{$trabajo->E5_2}}</td>
            </tr>
            <tr>
                <td>Grietas o picaduras</td>
                <td>{{$trabajo->E5_3}}</td>
            </tr>
            <tr>
                <td>Resortes (detecta fallas)</td>
                <td>{{$trabajo->E5_4}}</td>
            </tr>
            <tr>
                <td>Frenado (hacer prueba)</td>
                <td>{{$trabajo->E5_5}}</td>
            </tr>
            <tr>
                <td>Deterioro general</td>
                <td>{{$trabajo->E5_6}}</td>
            </tr>
            <tr>
                <td>Corrosión</td>
                <td>{{$trabajo->E5_7}}</td>
            </tr>
            <tr>
                <td>Presencia de oxidación (moho)</td>
                <td>{{$trabajo->E5_8}}</td>
            </tr>
            <tr>
                <td colspan="2">Serie del equipo</td>
                <td colspan="2">{{$trabajo->serie_equipo_5}}</td>
            </tr>
            <tr>
                <td colspan="2">Marca del equipo</td>
                <td colspan="2">{{$trabajo->marca_equipo_5}}</td>
            </tr>
            <tr>
                <td colspan="2">Estado general del freno</td>
                <td colspan="2">{{$trabajo->estado_freno}}</td>
            </tr>
            <tr>
                <td colspan="2">Firmado electrónicamente por el responsable del trabajo o líder</td>
                <td colspan="2">Firmado electrónicamente por el auditor o coordinador</td>
            </tr>
            <tr>
                <td colspan="1">Nombre</td>
                <td colspan="1">{{$trabajo->responsableAcargo->name}}</td>
                <td colspan="1">Nombre</td>
                <td colspan="1">{{$trabajo->coordinadorAcargo->name}}</td>
            </tr>
            <tr>
                <td colspan="1">Cédula</td>
                <td colspan="1">{{$trabajo->responsableAcargo->cedula}}</td>
                <td colspan="1">Cédula</td>
                <td colspan="1">{{$trabajo->coordinadorAcargo->cedula}}</td>
            </tr>
            <tr>
                <td colspan="2">Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$trabajo->responsableAcargo->name}}</strong>, en rol de {{$trabajo->responsableAcargo->getRoleNames()[0] }} habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
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