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
                    <th>H-FR-23</th>
                    <th colspan="4">
                        APROBACIÓN DE TRABAJO ENERGITELCO S. A. S.
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        1
                    </th>
                    <th colspan="4" class="tth">
                        Información general del trabajo
                    </th>
                </tr>
                <tr>
                    <th>
                        Documento
                    </th>
                    <th colspan="3">
                        Nombre completo funcionario
                    </th>
                    <th>
                        Rol autorizado para el funcionario
                    </th>
                </tr>
                @foreach ($trabajo->users as $usuario)
                <tr>
                    <td>
                        {{$usuario->cedula}}
                    </td>
                    <td colspan="3">
                        {{$usuario->name}}
                    </td>
                    <td>
                        {{$usuario->position->name}}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="3">
                        Nombre de la EB donde se va trabajar
                    </th>
                    <td colspan="2">
                        {{$trabajo->nombre_eb}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Altura aprox. a la cual se realizará la actividad
                    </th>
                    <td colspan="2">
                        {{$trabajo->altura}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        La actividad a realizar es a una altura superior a los 1.5 metros de altura
                    </th>
                    <td colspan="2">
                        {{$trabajo->max_altura}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Placa del vehículo en el cual se moviliza
                    </th>
                    <td colspan="2">
                        {{$trabajo->placa_vehiculo}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Estado del vehículo
                    </th>
                    <td colspan="2">
                        {{$trabajo->estado_vehiculo}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        ¿Por qué?
                    </th>
                    <td colspan="2">
                        {{$trabajo->por_que_estado_vehiculo}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Porcentaje de trabajo ejecutado
                    </th>
                    <td colspan="2">
                        {{$trabajo->porcentaje_trabajo_presentado}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Número de días en ese proyecto
                    </th>
                    <td colspan="2">
                        {{$trabajo->numero_dias_proyecto}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Requiere caja menor
                    </th>
                    <td colspan="2">
                        {{$trabajo->requiere_caja_menor}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Justificación de caja menor
                    </th>
                    <td colspan="2">
                        {{$trabajo->Justificación_caja_menor}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        <h5>Pendientes de consumibles</h5> 
                    </th>
                    <td colspan="2">
                        {{$trabajo->pendientes_consumible}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        <h5>Negligencias de su coordinador</h5> 
                    </th>
                    <td colspan="2">
                        {{$trabajo->negligencias_coordinador}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        <h5>Se desplaza en vehículo o moto de la empresa</h5> 
                    </th>
                    <td colspan="2">
                        {{$trabajo->vehiculo_desplazamiento}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        <h5>Estás trabajando o manipulando equipos Energizados</h5> 
                    </th>
                    <td colspan="2">
                        {{$trabajo->equipos_energizados}}
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <th colspan="4" class="tth">
                        LISTADO DE VERIFICACIÓN
                    </th>
                </tr>
                <tr>
                    <td colspan="4">
                        Condiciones meteorológicas seguras
                    </td>
                    <td>
                        {{$trabajo->f2a1}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Condiciones integrales de los trabajadores
                    </td>
                    <td>
                        {{$trabajo->f2a2}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Capacitación con certificación vigente
                    </td>
                    <td>
                        {{$trabajo->f2a3}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Hay entrenamiento para el reconocimiento de riesgos
                    </td>
                    <td>
                        {{$trabajo->f2a4}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Existen procedimientos o instrucciones para la ejecución de la tarea y métodos de control
                    </td>
                    <td>
                        {{$trabajo->f2a5}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Se verificaron los puntos de anclaje en la estructura donde se realizará el trabajo
                    </td>
                    <td>
                        {{$trabajo->f2a6}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Completa documentación del personal
                    </td>
                    <td>
                        {{ ($trabajo->f2a7 === 'Si') ? $trabajo->documentacion_personal : 'No' }}
                    </td>
                </tr>
                <tr>
                    <th>Elementos de Protección Personal</th>
                    <th>Funcionario 1</th>
                    <th>Funcionario 2</th>
                    <th>Funcionario 3</th>
                    <th>Funcionario 4</th>
                </tr>
                <tr>
                    <td>
                        PROTECCIÓN DE CABEZA: - Casco con barbuquejo
                    </td>
                    <td>
                        {{$trabajo->f2b1u1}}
                    </td>
                    <td>
                        {{$trabajo->f2b1u2}}
                    </td>
                    <td>
                        {{$trabajo->f2b1u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2b1u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        PROTECCIÓN AUDITIVA: - Protector de inserción
                    </td>
                    <td>
                        {{$trabajo->f2b2u1}}
                    </td>
                    <td>
                        {{$trabajo->f2b2u2}}
                    </td>
                    <td>
                        {{$trabajo->f2b2u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2b2u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        PROTECCIÓN VISUAL: - Gafas de seguridad
                    </td>
                    <td>
                        {{$trabajo->f2b3u1}}
                    </td>
                    <td>
                        {{$trabajo->f2b3u2}}
                    </td>
                    <td>
                        {{$trabajo->f2b3u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2b3u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        PROTECCIÓN EN MANOS: - Guantes con recubrimiento adecuado para la actividad
                    </td>
                    <td>
                        {{$trabajo->f2b4u1}}
                    </td>
                    <td>
                        {{$trabajo->f2b4u2}}
                    </td>
                    <td>
                        {{$trabajo->f2b4u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2b4u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        PROTECCIÓN EN PIES: - Botas de seguridad dieléctricas
                    </td>
                    <td>
                        {{$trabajo->f2b5u1}}
                    </td>
                    <td>
                        {{$trabajo->f2b5u2}}
                    </td>
                    <td>
                        {{$trabajo->f2b5u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2b5u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        PROTECCIÓN EN CUERPO: - Ropa cómoda para trabajo
                    </td>
                    <td>
                        {{$trabajo->f2b6u1}}
                    </td>
                    <td>
                        {{$trabajo->f2b6u2}}
                    </td>
                    <td>
                        {{$trabajo->f2b6u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2b6u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <th>Equipos de Protección y Prevención contra Caídas</th>
                    <th>Funcionario 1</th>
                    <th>Funcionario 2</th>
                    <th>Funcionario 3</th>
                    <th>Funcionario 4</th>
                </tr>
                <tr>
                    <td>
                        ARNES DE CUERPO COMPLETO: (de cuatro argollas preferible tipo cruzado)
                    </td>
                    <td>
                        {{$trabajo->f2c1u1}}
                    </td>
                    <td>
                        {{$trabajo->f2c1u2}}
                    </td>
                    <td>
                        {{$trabajo->f2c1u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2c1u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        CONECTORES: - Eslinga con absorvedor en Y
                    </td>
                    <td>
                        {{$trabajo->f2c2u1}}
                    </td>
                    <td>
                        {{$trabajo->f2c2u2}}
                    </td>
                    <td>
                        {{$trabajo->f2c2u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2c2u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        MECANISMO DE ANCLAJE: - Cinta de anclaje portátil (tie off)
                    </td>
                    <td>
                        {{$trabajo->f2c4u1}}
                    </td>
                    <td>
                        {{$trabajo->f2c4u2}}
                    </td>
                    <td>
                        {{$trabajo->f2c4u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2c4u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        MECANISMOS DE ASCENSO - Freno + Mosquetón de seguridad para ascenso con línea de vida de acero)
                    </td>
                    <td>
                        {{$trabajo->f2c3u1}}
                    </td>
                    <td>
                        {{$trabajo->f2c3u2}}
                    </td>
                    <td>
                        {{$trabajo->f2c3u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f2c3u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <th colspan="5">
                        Condiciones de riesgo en zona de trabajo
                    </th>
                </tr>
                <tr>
                    <td colspan="4">
                        El sitio de trabajo en alturas está delimitado (encerrado) y señalizado (avisos informativos) debidamente
                    </td>
                    <td>{{$trabajo->f2d1}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Se han previsto medidas de control ante riesgos eléctricos, biológicos (avispas, abejas o animales peligrosos), caída de objetos, etc.
                    </td>
                    <td>{{$trabajo->f2d2}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Se han previsto controles ante obstáculos, difícil acceso, espacios reducidos, etc., que dificulten la labor en alturas.
                    </td>
                    <td>{{$trabajo->f2d3}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Condiciones ambientales adecuadas (ausencia de lluvia, neblina, tormenta eléctrica, vientos fuertes).
                    </td>
                    <td>{{$trabajo->f2d4}}</td>
                </tr>
                <tr>
                    <th colspan="5">
                        Torre, estructura o sistema de acceso y sus componentes
                    </th>
                </tr>
                <tr>
                    <td colspan="4">
                        Se garantiza completa estabilidad y seguridad de la estructura (sin fracturas, partes torcidas, corrosión, partes incompletas).
                    </td>
                    <td>{{$trabajo->f2e1}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Se dispone de puntos de anclaje adecuados y con resistencia de 5.000 lbs. aprox. donde el trabajador pueda asegurarse.
                    </td>
                    <td>{{$trabajo->f2e7}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        De acuerdo a las condiciones del sitio, es adecuado el sistema de acceso y la resistencia de la estructura a las cargas.
                    </td>
                    <td>{{$trabajo->f2e2}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Buen estado de componentes (línea de vida, peldaños escalera, materiales, diámetros, ángulos, tubos, diagonales, barandas, etc.)
                    </td>
                    <td>{{$trabajo->f2e3}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Se encuentra libre de superficies húmedas, lisas, resbalosas o irregulares que impidan ejecutar la tarea.
                    </td>
                    <td>{{$trabajo->f2e4}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Se garantizan distancias y límites seguros permitidos, evitando líneas eléctricas energizadas o bordes desprotegidos, etc.
                    </td>
                    <td>{{$trabajo->f2e5}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Plataformas en perfecto estado que garantizan cobertura del 100% de la superficie de trabajo y sistema de barandas adecuado.
                    </td>
                    <td>{{$trabajo->f2e6}}</td>
                </tr>
                <tr>
                    <th>3</th>
                    <th colspan="4" class="tth">
                        Validación para trabajar
                    </th>
                </tr>
                <tr>
                    <th colspan="2">Nombre del representante del trablajo o líder</td>
                    <td>{{ $trabajo->responsableAcargo->name }}</td>
                    <th>Cédula</td>
                    <td>{{ $trabajo->responsableAcargo->cedula }}</td>
                </tr>
                <tr>
                    <th colspan="2">Nombre del auditor o coordinador</td>
                    <td>{{ $trabajo->coordinadorAcargo->name }}</td>
                    <th>Cédula</td>
                    <td>{{ $trabajo->coordinadorAcargo->cedula }}</td>
                </tr>
                <tr>
                    <th colspan="2">Fecha validez permiso</td>
                    <td>{{ $trabajo->fecha_validez_permiso }}</td>
                    <th>Hora validez</td>
                    <td>{{ $trabajo->hora_inicio }}</td>
                </tr>
                <tr>
                    <th colspan="2">Fecha final de la validez</td>
                    <td>{{ $trabajo->fecha_validez_permiso }}</td>
                    <th>Hora validez</td>
                    <td>{{ $trabajo->hora_final }}</td>
                </tr>
                <tr>
                    <th>
                        4
                    </th>
                    <th colspan="4" class="tth">
                        Condiciones de Riesgo Eléctrico (aplica sólo para trabajar en equipos energizados)
                    </th>
                </tr>
                <tr>
                    <td colspan="3">
                            Número de matrícula de la persona a cargo de la actividad
                    </td>
                    <td colspan="2">{{ $trabajo->numero_matricula }}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Posee matrícula de electricista
                    </td>
                    <td>{{$trabajo->f4a1}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Herramientas a utilizar en la actividad se encuentran aisladas adecuadamente
                    </td>
                    <td>{{$trabajo->f4a2}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        La fuente de energía se encuentra desenergizada en caso de ser posible 
                    </td>
                    <td>{{$trabajo->f4a3}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        En caso de ser una labor en caliente se cumple con todas las condiciones de seguridad y se estudió adecuadamente el procedimiento
                    </td>
                    <td>{{$trabajo->f4a4}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Retiró todos los elementos metálicos o conductivos de su cuerpo, como cadenas, reloj, anillos y manillas
                    </td>
                    <td>{{$trabajo->f4a5}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Tiene puestos los guantes, gafas, pulsera antiestática, botas dieléctricas y todo lo requerido para la actividad
                    </td>
                    <td>{{$trabajo->f4a6}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        Posee la herramienta adecuada para realizar la actividad y entiende eléctricamente el equipo a intervenir
                    </td>
                    <td>{{$trabajo->f4a7}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        El trabajo en caliente es en baja tensión (Recuerde: trabajos en caliente en alta tensión están prohibidos)
                    </td>
                    <td>{{$trabajo->f4a8}}</td>
                </tr>
                <tr>
                    <th>
                        5
                    </th>
                    <th colspan="4" class="tth">
                        Condiciones de verificación del vehículo para sistema de seguridad vial
                    </th>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Está completa la documentación del vehiculo o conductor?
                    </td>
                    <td>{{$trabajo->f5a1}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿El sistema de luces del vehículo funciona correctamente?
                    </td>
                    <td>{{$trabajo->f5a2}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Muestra el tablero de instrumentos alguna alarma?
                    </td>
                    <td>{{$trabajo->f5a3}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Son adecuados los niveles de los fluidos (líquidos) del vehículo? 
                    </td>
                    <td>{{$trabajo->f5a4}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Presenta escapes de algún fluido (líquido) en el motor, las ruedas o en el piso?
                    </td>
                    <td>{{$trabajo->f5a5}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Los frenos funcionan correctamente?
                    </td>
                    <td>{{$trabajo->f5a6}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Funcionan adecuadamente los cinturones de seguridad?
                    </td>
                    <td>{{$trabajo->f5a7}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Están los espejos laterales y el retrovisor en buen estado? 
                    </td>
                    <td>{{$trabajo->f5a8}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Es adecuado el estado de las llantas, incluida la del repuesto?
                    </td>
                    <td>{{$trabajo->f5a9}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Tiene herramienta y equipo de carretera adecuados?
                    </td>
                    <td>{{$trabajo->f5a10}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Siente ruidos anormales durante el recorrido? 
                    </td>
                    <td>{{$trabajo->f5a11}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Realizó la consulta al #767 sobre el estado de la ruta que va a transitar, y no encuentra problemas para su viaje?
                    </td>
                    <td>{{$trabajo->f5a12}}</td>
                </tr>
                <tr>
                    <th>
                        6
                    </th>
                    <th colspan="4" class="tth">
                        Validación de los equipos de protección para la conducción de motos.
                    </th>
                </tr>
                <tr>
                    <th>Elementos</th>
                    <th>Funcionario 1</th>
                    <th>Funcionario 2</th>
                    <th>Funcionario 3</th>
                    <th>Funcionario 4</th>
                </tr>
                <tr>
                    <td>
                        Casco con placa
                    </td>
                    <td>
                        {{$trabajo->f6a1u1}}
                    </td>
                    <td>
                        {{$trabajo->f6a1u2}}
                    </td>
                    <td>
                        {{$trabajo->f6a1u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f6a1u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>Comentarios</td>
                    <td colspan="4">{{$trabajo->comentario1}}</td>
                </tr>
                <tr>
                    <td>
                        Coderas
                    </td>
                    <td>
                        {{$trabajo->f6a2u1}}
                    </td>
                    <td>
                        {{$trabajo->f6a2u2}}
                    </td>
                    <td>
                        {{$trabajo->f6a2u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f6a2u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>Comentarios</td>
                    <td colspan="4">{{$trabajo->comentario2}}</td>
                </tr>
                <tr>
                    <td>
                        Rodilleras
                    </td>
                    <td>
                        {{$trabajo->f6a3u1}}
                    </td>
                    <td>
                        {{$trabajo->f6a3u2}}
                    </td>
                    <td>
                        {{$trabajo->f6a3u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f6a3u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>Comentarios</td>
                    <td colspan="4">{{$trabajo->comentario3}}</td>
                </tr>
                <tr>
                    <td>
                        Impermeable
                    </td>
                    <td>
                        {{$trabajo->f6a4u1}}
                    </td>
                    <td>
                        {{$trabajo->f6a4u2}}
                    </td>
                    <td>
                        {{$trabajo->f6a4u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f6a4u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>Comentarios</td>
                    <td colspan="4">{{$trabajo->comentario4}}</td>
                </tr>
                <tr>
                    <td>
                        Chaleco reflectivo con placa
                    </td>
                    <td>
                        {{$trabajo->f6a5u1}}
                    </td>
                    <td>
                        {{$trabajo->f6a5u2}}
                    </td>
                    <td>
                        {{$trabajo->f6a5u3}}
                    </td>
                    <td>
                        {{$trabajo->work_add ? $trabajo->work_add->f6a5u4 : '' }}
                    </td>
                </tr>
                <tr>
                    <td>Comentarios</td>
                    <td colspan="4">{{$trabajo->comentario5}}</td>
                </tr>
                {{-- Items de bioseguridad --}}
                <tr>
                    <th>7</th>
                    <th colspan="4">
                        Verificación cumplimiento protocolo de bioseguridad:
                    </th>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Se aplicó protocolo de desinfección y limpieza al vehículo o moto? 
                    </td>
                    <td>{{($trabajo->work_add) ? $trabajo->work_add->f8a1 : ''}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿El equipo cuanta con elementos de bioseguridad como alcohol, antibacterial y jabon de manos? 
                    </td>
                    <td>{{($trabajo->work_add) ? $trabajo->work_add->f8a2 : ''}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Cuentan todos los miembros de la cuadrilla con tapabocas cubriendo nariz y boca? 
                    </td>
                    <td>{{($trabajo->work_add) ? $trabajo->work_add->f8a3 : ''}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Se realizó protocolo de limpieza y desinfección a la herramienta a utilizar? 
                    </td>
                    <td>{{($trabajo->work_add) ? $trabajo->work_add->f8a4 : ''}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ¿Todo el personal realizó autodiagnostico en la aplicación Coronapp?
                    </td>
                    <td>{{($trabajo->work_add) ? $trabajo->work_add->f8a5 : ''}}</td>
                </tr>
                {{-- Fin de Items --}}
                <tr>
                    <th>
                        8
                    </th>
                    <th colspan="4" class="tth">
                        Observaciones:
                    </th>
                </tr>
                <tr>
                    <td colspan="5">
                        {{($trabajo->observaciones) ? $trabajo->observaciones : ' '}}
                    </td>
                </tr>
                @if ($trabajo->created_at > '2020-12-14 11:00:00') 
                <tr>
                    <th>
                        9
                    </th>
                    <th colspan="4" class="tth">
                        Comisiones:
                    </th>
                </tr>
                <tr>
                    <th>/</th>
                    <th>Funcionario 1</th>
                    <th>Funcionario 2</th>
                    <th>Funcionario 3</th>
                    <th>Funcionario 4</th>
                </tr>
                <tr>
                    <td>
                        Valor que considera de bonificaciones
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a1u1 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a1u2 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a1u3 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a1u4 : ''}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Valor que considera de viáticos
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a2u1 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a2u2 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a2u3 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a2u4 : ''}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Valor que considera de caja menor
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a3u1 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a3u2 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a3u3 : ''}}
                    </td>
                    <td>
                        {{($trabajo->work_add) ? $trabajo->work_add->f9a3u4 : ''}}
                    </td>
                </tr>
                @endif
                <tr>
                    <td colspan="2">Firmado electrónicamente por el responsable del trabajo o líder</td>
                    <td></td>
                    <td colspan="2">Firmado electrónicamente por el auditor o coordinador</td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>{{$trabajo->responsableAcargo->name}}</td>
                    <td></td>
                    <td>Nombre</td>
                    <td>{{$trabajo->coordinadorAcargo->name}}</td>
                </tr>
                <tr>
                    <td>Cédula</td>
                    <td>{{$trabajo->responsableAcargo->cedula}}</td>
                    <td></td>
                    <td>Cédula</td>
                    <td>{{$trabajo->coordinadorAcargo->cedula}}</td>
                </tr>
                <tr>
                    <td colspan="2">Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$trabajo->responsableAcargo->name}}</strong>, en rol de {{$trabajo->responsableAcargo->getRoleNames()[0] }} habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
                    <td></td>
                    <td colspan="2">Solicitud aprobada y firmada electrónicamente por <strong>{{$trabajo->coordinadorAcargo->name}}</strong> en rol de {{$trabajo->coordinadorAcargo->getRoleNames()[0] }} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</td>
                </tr>
            </tbody>
        </table>
        <p>SEÑOR FUNCIONARIO EMISOR DEL PRESENTE PERMISO DE TRABAJO, TENGA PRESENTE QUE ES OBLIGATORIO ANTES DE INICIAR ACTIVIDADES, GARANTIZAR EL CONOCIMIENTO Y LAS RESTRICCIONES DEL PRESENTE PERMISO A LOS DEMÁS COMPAÑEROS INVOLUCRADOS EN LA PRESENTE ACTIVIDAD DE FORMA DIGITAL MEDIANTE EL MAIL ENVIADO A CADA UNO DE LOS FUNCIONARIOS INVOLUCRADOS EN LA PRESENTE ACTIVIDAD Y EN CASO DE QUE EL TRABAJO SE REALICE EN SITIOS DONDE INTERVIENEN TERCEROS AJENOS A ENERGITELCO SAS, TENGA PRESENTE QUE ANTES DE INICIAR LABORES, OBLIGATORIAMENTE DEBE PROCEDER A IMPRIMIR FÍSICAMENTE EL PRESENTE DOCUMENTO Y PUBLICARLO EN LOS LÍMITES DE LA ZONA DE TRABAJO O DE LA DEMARCACIÓN Y CERRAMIENTO QUE HIZO DE SU ZONA DE TRABAJO.</p>
    </main>
        
    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    </footer>
</body>
</html>