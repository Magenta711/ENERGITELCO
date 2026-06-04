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
                <img src="{{ asset('img/ICONTEC.png') }}" />
            </div>
        </div>
    </header>
    <main class="text-justify">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> {{ ($id->type_evaluation_id == 1) ? 'H-FR-04' : (($id->type_evaluation_id == 2) ? 'H-FR-05' : 'H-FR-05') }}</th>
                    <th colspan="4">
                        Evaluaciones de desempeño
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="5">
                        {{ ($id->type_evaluation_id == 1) ? 'Directivos, Administrativos, Ingenieros' : (($id->type_evaluation_id == 2) ? 'Técnicos, auxiliares y operativos' : 'Personal CVS claro') }}.
                    </th>
                </tr>
                <tr>
                    <td colspan="2">Fecha de la evaluación</td>
                    <td>{{$id->date}}</td>
                    <td>Periodo evaluado</td>
                    <td>{{$id->period}}</td>
                </tr>
                <tr>
                    <td colspan="2">Nombre del empleado</td>
                    <td>{{$id->evaluado->name}}</td>
                    <td>Nombre del evaluador</td>
                    <td>{{$id->responsable->name}}</td>
                </tr>
                <tr>
                    <td>CALIFICACIÓN</td>
                    <td colspan="4">Todos los aspectos se valoran de acuerdo con la siguiente escala de puntaje.</td>
                </tr>
                <tr>
                    <td>Excelente: 9 a 10</td>
                    <td colspan="2">Bueno: 8 a 9</td>
                    <td>Regular:  6 a 8</td>
                    <td> Malo: Menos de 6</td>
                </tr>
                @include('performance_evaluation.pdf.includes.show_'.$id->type_evaluation_id)
                <tr>
                    <td colspan="3">
                        Puntaje obtenido
                    </td>
                    <td>{{$id->total_1}}</td>
                    <td>{{$id->total}}</td>
                </tr>
                <tr>
                    <td colspan="5">CUMPLIMIENTO PLAN DE MEJORAMIENTO DEL PERÍODO ANTERIOR.</td>
                </tr>
                <tr>
                    <td colspan="5">ASPECTO</td>
                </tr>
                <tr>
                    <td colspan="5">{{$id->aspects}}</td>
                </tr>
                <tr>
                    <td colspan="5">
                        EFICACIA DE LOS EVENTOS DE FORMACIÓN RECIBIDOS.
                    </td>
                </tr>
                <tr>
                    <td colspan="1">
                        EVENTO/CONCEPTO
                    </td>
                    <td colspan="4">
                        {{$id->event}}
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        PLAN DE MEJORAMIENTO.
                    </td>
                </tr>
                <tr>
                    <td colspan="1">
                        ACTIVIDAD
                    </td>
                    <td colspan="4">
                        {{$id->activty}}
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        NECESIDADES DE FORMACIÓN
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        {{$id->training_needs}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Firmado electrónicamente por el evaluador</td>
                    <td colspan="3">Firmado electrónicamente por el evaluado</td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>{{$id->responsable->name}}</td>
                    <td>Nombre</td>
                    <td colspan="2">{{$id->evaluado->name}}</td>
                </tr>
                <tr>
                    <td>Cédula</td>
                    <td>{{$id->responsable->cedula}}</td>                    
                    <td>Cédula</td>
                    <td colspan="2">{{$id->evaluado->cedula}}</td>
                </tr>
                <tr>
                    <td colspan="2">Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$id->responsable->name}}</strong>, en rol de {{$id->responsable->getRoleNames()[0] }} habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
                    <td colspan="3">Solicitud aprobada y firmada electrónicamente por <strong>{{$id->evaluado->name}}</strong> en rol de {{$id->evaluado->getRoleNames()[0] }} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
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