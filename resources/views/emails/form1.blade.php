<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #f8fafc; color: #74787e; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;">
    <style>
        @media  only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media  only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        .table-form th, .table-form td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #f8fafc; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
        <tr>
            <td align="center" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box;">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                    <tr>
    <td class="header" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; padding: 25px 0; text-align: center;">
        <a href="{{config('app.url')}}" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #bbbfc3; font-size: 19px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
            {{ config('app.name') }}
        </a>
    </td>
</tr>
    <!-- Email Body -->
    <tr>
        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #ffffff; border-bottom: 1px solid #edeff2; border-top: 1px solid #edeff2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
            <table class="inner-body" align="center" width="750" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #ffffff; margin: 0 auto; padding: 0; width: 750px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 750px;">
                <!-- Body content -->
                <tr>
                    <td class="content-cell" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; padding: 35px;">
                        <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">¡Hola!</h1>
<p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Estás recibiendo una solicitud para su aprobación.</p>

    <table class="table-form">
        <thead>
            <tr>
                <th>H-FR-23</th>
                <th colspan="3">
                    APROBACIÓN DE TRABAJO ENERGITELCO S. A. S.
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    1
                </th>
                <th colspan="3">
                    Información general del trabajo
                </th>
            </tr>
            <tr>
                <th>
                    Documento
                </th>
                <th colspan="2">
                    Nombre completo funcionario
                </th>
                <th>
                    Rol autorizado para el funcionario
                </th>
            </tr>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>
                    {{$usuario->cedula}}
                </td>
                <td colspan="2">
                    {{$usuario->name}}
                </td>
                <td>
                    {{$usuario->position->name}}
                </td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">
                    Nombre de la EB donde se va trabajar
                </th>
                <td colspan="2">
                    {{$format->nombre_eb}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Altura aprox. a la cual se realizará la actividad
                </th>
                <td colspan="2">
                    {{$format->altura}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    La actividad a realizar es a una altura superior a los 1.5 metros de altura
                </th>
                <td colspan="2">
                    {{$format->max_altura}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Placa del vehículo en el cual se moviliza
                </th>
                <td colspan="2">
                    {{$format->placa_vehiculo}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Estado del vehículo
                </th>
                <td colspan="2">
                    {{$format->estado_vehiculo}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    ¿Por qué?
                </th>
                <td colspan="2">
                    {{$format->por_que_estado_vehiculo}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Porcentaje de trabajo ejecutado
                </th>
                <td colspan="2">
                    {{$format->porcentaje_trabajo_presentado}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Número de días en ese proyecto
                </th>
                <td colspan="2">
                    {{$format->numero_dias_proyecto}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Requiere caja menor
                </th>
                <td colspan="2">
                    {{$format->requiere_caja_menor}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Justificación de caja menor
                </th>
                <td colspan="2">
                    {{$format->Justificación_caja_menor}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Pendientes de consumibles
                </th>
                <td colspan="2">
                    {{$format->pendientes_consumible}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Negligencias de su coordinador
                </th>
                <td colspan="2">
                    {{$format->negligencias_coordinador}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Se desplaza en vehículo o moto de la empresa
                </th>
                <td colspan="2">
                    {{$format->vehiculo_desplazamiento}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Está trabajando o manipulando equipos Energizados
                </th>
                <td colspan="2">
                    {{$format->equipos_energizados}}
                </td>
            </tr>
            <tr>
                <th>2</th>
                <th colspan="3">
                    LISTADO DE VERIFICACIÓN
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    Condiciones meteorológicas seguras
                </td>
                <td>
                    {{$format->f2a1}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Condiciones integrales de los trabajadores
                </td>
                <td>
                    {{$format->f2a2}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Capacitación con certificación vigente
                </td>
                <td>
                    {{$format->f2a3}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Hay entrenamiento para el reconocimiento de riesgos
                </td>
                <td>
                    {{$format->f2a4}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Existen procedimientos o instrucciones para la ejecución de la tarea y métodos de control
                </td>
                <td>
                    {{$format->f2a5}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Se verificaron los puntos de anclaje en la estructura donde se realizará el trabajo
                </td>
                <td>
                    {{$format->f2a6}}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Completa documentación del personal
                </td>
                <td>
                    {{ ($format->f2a7 === 'Si') ? $format->documentacion_personal : 'No' }}
                </td>
            </tr>
            <tr>
                <th>Elementos de Protección Personal</th>
                <th>Funcionario 1</th>
                <th>Funcionario 2</th>
                <th>Funcionario 3</th>
            </tr>
            <tr>
                <td>
                    PROTECCIÓN DE CABEZA: - Casco con barbuquejo
                </td>
                <td>
                    {{$format->f2b1u1}}
                </td>
                <td>
                    {{$format->f2b1u2}}
                </td>
                <td>
                    {{$format->f2b1u3}}
                </td>
            </tr>
            <tr>
                <td>
                    PROTECCIÓN AUDITIVA: - Protector de inserción
                </td>
                <td>
                    {{$format->f2b2u1}}
                </td>
                <td>
                    {{$format->f2b2u2}}
                </td>
                <td>
                    {{$format->f2b2u3}}
                </td>
            </tr>
            <tr>
                <td>
                    PROTECCIÓN VISUAL: - Gafas de seguridad
                </td>
                <td>
                    {{$format->f2b3u1}}
                </td>
                <td>
                    {{$format->f2b3u2}}
                </td>
                <td>
                    {{$format->f2b3u3}}
                </td>
            </tr>
            <tr>
                <td>
                    PROTECCIÓN EN MANOS: - Guantes con recubrimiento adecuado para la actividad
                </td>
                <td>
                    {{$format->f2b4u1}}
                </td>
                <td>
                    {{$format->f2b4u2}}
                </td>
                <td>
                    {{$format->f2b4u3}}
                </td>
            </tr>
            <tr>
                <td>
                    PROTECCIÓN EN PIES: - Botas de seguridad dieléctricas
                </td>
                <td>
                    {{$format->f2b5u1}}
                </td>
                <td>
                    {{$format->f2b5u2}}
                </td>
                <td>
                    {{$format->f2b5u3}}
                </td>
            </tr>
            <tr>
                <td>
                    PROTECCIÓN EN CUERPO: - Ropa cómoda para trabajo
                </td>
                <td>
                    {{$format->f2b6u1}}
                </td>
                <td>
                    {{$format->f2b6u2}}
                </td>
                <td>
                    {{$format->f2b6u3}}
                </td>
            </tr>
            <tr>
                <th>Equipos de Protección y Prevención contra Caídas</th>
                <th>Funcionario 1</th>
                <th>Funcionario 2</th>
                <th>Funcionario 3</th>
            </tr>
            <tr>
                <td>
                    ARNES DE CUERPO COMPLETO (de cuatro argollas preferible tipo cruzado)
                </td>
                <td>
                    {{$format->f2c2u1}}
                </td>
                <td>
                    {{$format->f2c1u2}}
                </td>
                <td>
                    {{$format->f2c1u3}}
                </td>
            </tr>
            <tr>
                <td>
                    CONECTORES - Eslinga con absorvedor en Y
                </td>
                <td>
                    {{$format->f2c2u1}}
                </td>
                <td>
                    {{$format->f2c2u2}}
                </td>
                <td>
                    {{$format->f2c2u3}}
                </td>
            </tr>
            <tr>
                <td>
                    MECANISMO DE ANCLAJE - Cinta de anclaje portátil (tie off)
                </td>
                <td>
                    {{$format->f2c4u1}}
                </td>
                <td>
                    {{$format->f2c4u2}}
                </td>
                <td>
                    {{$format->f2c4u3}}
                </td>
            </tr>
            <tr>
                <td>
                    MECANISMOS DE ASCENSO - Freno + Mosquetón de seguridad para ascenso con línea de vida de acero)
                </td>
                <td>
                    {{$format->f2c3u1}}
                </td>
                <td>
                    {{$format->f2c3u2}}
                </td>
                <td>
                    {{$format->f2c3u3}}
                </td>
            </tr>
            <tr>
                <th colspan="4">
                    Condiciones de riesgo en zona de trabajo
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    El sitio de trabajo en alturas está delimitado (encerrado) y señalizado (avisos informativos) debidamente
                </td>
                <td>{{$format->f2d1}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Se han previsto medidas de control ante riesgos eléctricos, biológicos (avispas, abejas o animales peligrosos), caída de objetos, etc.
                </td>
                <td>{{$format->f2d2}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Se han previsto controles ante obstáculos, difícil acceso, espacios reducidos, etc., que dificulten la labor en alturas.
                </td>
                <td>{{$format->f2d3}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Condiciones ambientales adecuadas (ausencia de lluvia, neblina, tormenta eléctrica, vientos fuertes).
                </td>
                <td>{{$format->f2d4}}</td>
            </tr>
            <tr>
                <th colspan="4">
                    Torre, estructura o sistema de acceso  y sus componentes
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    Se garantiza completa estabilidad y seguridad de la estructura (sin fracturas, partes torcidas, corrosión, partes incompletas).
                </td>
                <td>{{$format->f2e1}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Se dispone de puntos de anclaje adecuados y con resistencia de 5.000 lbs. aprox. donde el trabajador pueda asegurarse.
                </td>
                <td>{{$format->f2e7}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    De acuerdo a las condiciones del sitio, es adecuado el sistema de acceso y la resistencia de la estructura a las cargas.
                </td>
                <td>{{$format->f2e2}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Buen estado de componentes (línea de vida, peldaños escalera, materiales, diámetros, ángulos, tubos, diagonales, barandas, etc.)
                </td>
                <td>{{$format->f2e3}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Se encuentra libre de superficies húmedas, lisas, resbalosas o irregulares que impidan ejecutar la tarea.
                </td>
                <td>{{$format->f2e4}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Se garantizan distancias y límites seguros permitidos, evitando líneas eléctricas energizadas o bordes desprotegidos, etc.
                </td>
                <td>{{$format->f2e5}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Plataformas en perfecto estado que garantizan cobertura del 100% de la superficie de trabajo y sistema de barandas adecuado.
                </td>
                <td>{{$format->f2e6}}</td>
            </tr>
            <tr>
                <th>3</th>
                <th colspan="3">
                    Validación para trabajar
                </th>
            </tr>
            <tr>
                <th>Nombre del representante del trablajo o líder</th>
                <td>{{ $format->responsableAcargo->name }}</td>
                <th>Cédula</th>
                <td>{{ $format->responsableAcargo->cedula }}</td>
            </tr>
            <tr>
                <th>4</th>
                <th colspan="3">
                    Condiciones de Riesgo Eléctrico (aplica sólo para trabajar en equipos energizados)
                </th>
            </tr>
            <tr>
                <td colspan="2">
                        Número de matrícula de la persona a cargo de la actividad
                </td>
                <td colspan="2">{{ $format->numero_matricula }}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Posee matrícula de electricista
                </td>
                <td>{{$format->f4a1}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Herramientas a utilizar en la actividad se encuentran aisladas adecuadamente
                </td>
                <td>{{$format->f4a2}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    La fuente de energía se encuentra desenergizada en caso de ser posible 
                </td>
                <td>{{$format->f4a3}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    En caso de ser una labor en caliente se cumple con todas las condiciones de seguridad y se estudió adecuadamente el procedimiento
                </td>
                <td>{{$format->f4a4}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Retiró todos los elementos metálicos o conductivos de su cuerpo, como cadenas, reloj, anillos y manillas
                </td>
                <td>{{$format->f4a5}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Tiene puestos los guantes, gafas, pulsera antiestática, botas dieléctricas y todo lo requerido para la actividad
                </td>
                <td>{{$format->f4a6}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    Posee la herramienta adecuada para realizar la actividad y entiende eléctricamente el equipo a intervenir
                </td>
                <td>{{$format->f4a7}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    El trabajo en caliente es en baja tensión (Recuerde: trabajos en caliente en alta tensión están prohibidos)
                </td>
                <td>{{$format->f4a8}}</td>
            </tr>
            <tr>
                <th>5</th>
                <th colspan="3">
                    Condiciones de verificación del vehículo para sistema de seguridad vial
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Está completa la documentación del vehículo o conductor?
                </td>
                <td>{{$format->f5a1}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿El sistema de luces del vehículo funciona correctamente?
                </td>
                <td>{{$format->f5a2}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Muestra el tablero de instrumentos alguna alarma?
                </td>
                <td>{{$format->f5a3}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Son adecuados los niveles de los fluidos (líquidos) del vehículo? 
                </td>
                <td>{{$format->f5a4}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Presenta escapes de algún fluido (líquido) en el motor, las ruedas o en el piso?
                </td>
                <td>{{$format->f5a5}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Los frenos funcionan correctamente?
                </td>
                <td>{{$format->f5a6}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Funcionan adecuadamente los cinturones de seguridad?
                </td>
                <td>{{$format->f5a7}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Están los espejos laterales y el retrovisor en buen estado? 
                </td>
                <td>{{$format->f5a8}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Es adecuado el estado de las llantas, incluida la del repuesto?
                </td>
                <td>{{$format->f5a9}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Tiene herramienta y equipo de carretera adecuados?
                </td>
                <td>{{$format->f5a10}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Siente ruidos anormales durante el recorrido? 
                </td>
                <td>{{$format->f5a11}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Realizó la consulta al #767 sobre el estado de la ruta que va a transitar, y no encuentra problemas para su viaje?
                </td>
                <td>{{$format->f5a12}}</td>
            </tr>
            <tr>
                <th>
                    6
                </th>
                <th colspan="3">
                    Validación de los equipos de protección para la conducción de motos.
                </th>
            </tr>
            <tr>
                <th>Elementos</th>
                <th>Funcionario 1</th>
                <th>Funcionario 2</th>
                <th>Funcionario 3</th>
            </tr>
            <tr>
                <td>
                    Casco con placa
                </td>
                <td>
                    {{$format->f6a1u1}}
                </td>
                <td>
                    {{$format->f6a1u2}}
                </td>
                <td>
                    {{$format->f6a1u3}}
                </td>
            </tr>
            <tr>
                <td>Comentarios</td>
                <td colspan="3">{{$format->comentario1}}</td>
            </tr>
            <tr>
                <td>
                    Coderas
                </td>
                <td>
                    {{$format->f6a2u1}}
                </td>
                <td>
                    {{$format->f6a2u2}}
                </td>
                <td>
                    {{$format->f6a2u3}}
                </td>
            </tr>
            <tr>
                <td>Comentarios</td>
                <td colspan="3">{{$format->comentario2}}</td>
            </tr>
            <tr>
                <td>
                    Rodilleras
                </td>
                <td>
                    {{$format->f6a3u1}}
                </td>
                <td>
                    {{$format->f6a3u2}}
                </td>
                <td>
                    {{$format->f6a3u3}}
                </td>
            </tr>
            <tr>
                <td>Comentarios</td>
                <td colspan="3">{{$format->comentario3}}</td>
            </tr>
            <tr>
                <td>
                    Impermeable
                </td>
                <td>
                    {{$format->f6a4u1}}
                </td>
                <td>
                    {{$format->f6a4u2}}
                </td>
                <td>
                    {{$format->f6a4u3}}
                </td>
            </tr>
            <tr>
                <td>Comentarios</td>
                <td colspan="3">{{$format->comentario4}}</td>
            </tr>
            <tr>
                <td>
                    Chaleco reflectivo con placa
                </td>
                <td>
                    {{$format->f6a5u1}}
                </td>
                <td>
                    {{$format->f6a5u2}}
                </td>
                <td>
                    {{$format->f6a5u3}}
                </td>
            </tr>
            <tr>
                <td>Comentarios</td>
                <td colspan="3">{{$format->comentario5}}</td>
            </tr>
            {{-- Items de bioseguridad --}}
            <tr>
                <th>7</th>
                <th colspan="3">
                    Verificación cumplimiento protocolo de bioseguridad:
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Se aplicó protocolo de desinfección y limpieza al vehículo o moto? 
                </td>
                <td>{{($format->work_add) ? $format->work_add->f8a1 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿El equipo cuanta con elementos de bioseguridad como alcohol, antibacterial y jabon de manos? 
                </td>
                <td>{{($format->work_add) ? $format->work_add->f8a2 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Cuentan todos los miembros de la cuadrilla con tapabocas cubriendo nariz y boca? 
                </td>
                <td>{{($format->work_add) ? $format->work_add->f8a3 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Se realizó protocolo de limpieza y desinfección a la herramienta a utilizar? 
                </td>
                <td>{{($format->work_add) ? $format->work_add->f8a4 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    ¿Todo el personal realizó autodiagnostico en la aplicación Coronapp?
                </td>
                <td>{{($format->work_add) ? $format->work_add->f8a5 : ''}}</td>
            </tr>
            {{-- Fin de Items --}}
            <tr>
                <th>8</th>
                <th colspan="3">
                    Observaciones:
                </th>
            </tr>
            <tr>
                <td colspan="4">
                    {{$format->observaciones}}
                </td>
            </tr>
            <tr>
                <td colspan="2">Firmado electrónicamente por el responsable del trabajo o líder</td>
                <td colspan="2">Firmado electrónicamente por el auditor o coordinador</td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td>{{$format->responsableAcargo->name}}</td>
                <td>Nombre</td>
                <td></td>
            </tr>
            <tr>
                <td>Cédula</td>
                <td>{{$format->responsableAcargo->cedula}}</td>
                <td>Cédula</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">
                    Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$format->responsableAcargo->name}}</strong>, en rol de {{$format->responsableAcargo->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
                </td>
                <td colspan="2">
                </td>
            </tr>
            <tr>
                <th>
                    9
                </th>
                <th colspan="3">
                    Comisiones:
                </th>
            </tr>
            <tr>
                <th>/</th>
                <th>Funcionario 1</th>
                <th>Funcionario 2</th>
                <th>Funcionario 3</th>
            </tr>
            @if ($id->created_at <= '2021-12-02 24:00:00')
                <tr>
                    <td>
                        Valor que considera de bonificaciones
                    </td>
                    <td>
                        {{($format->work_add) ? $format->work_add->f9a1u1 : ''}}
                    </td>
                    <td>
                        {{($format->work_add) ? $format->work_add->f9a1u2 : ''}}
                    </td>
                    <td>
                        {{($format->work_add) ? $format->work_add->f9a1u3 : ''}}
                    </td>
                </tr>
            @endif
            <tr>
                <td>
                    Valor que considera de viáticos
                </td>
                <td>
                    {{($format->work_add) ? $format->work_add->f9a2u1 : ''}}
                </td>
                <td>
                    {{($format->work_add) ? $format->work_add->f9a2u2 : ''}}
                </td>
                <td>
                    {{($format->work_add) ? $format->work_add->f9a2u3 : ''}}
                </td>
            </tr>
            <tr>
                <td>
                    Valor que considera de caja menor
                </td>
                <td>
                    {{($format->work_add) ? $format->work_add->f9a3u1 : ''}}
                </td>
                <td>
                    {{($format->work_add) ? $format->work_add->f9a3u2 : ''}}
                </td>
                <td>
                    {{($format->work_add) ? $format->work_add->f9a3u3 : ''}}
                </td>
            </tr>
        </tbody>
    </table>
    <p>SEÑOR FUNCIONARIO EMISOR DEL PRESENTE PERMISO DE TRABAJO, TENGA PRESENTE QUE ES OBLIGATORIO ANTES DE INICIAR ACTIVIDADES, GARANTIZAR EL CONOCIMIENTO Y LAS RESTRICCIONES DEL PRESENTE PERMISO A LOS DEMÁS COMPAÑEROS INVOLUCRADOS EN LA PRESENTE ACTIVIDAD DE FORMA DIGITAL MEDIANTE EL MAIL ENVIADO A CADA UNO DE LOS FUNCIONARIOS INVOLUCRADOS EN LA PRESENTE ACTIVIDAD Y EN CASO DE QUE EL TRABAJO SE REALICE EN SITIOS DONDE INTERVIENEN TERCEROS AJENOS A ENERGITELCO SAS, TENGA PRESENTE QUE ANTES DE INICIAR LABORES, OBLIGATORIAMENTE DEBE PROCEDER A IMPRIMIR FÍSICAMENTE EL PRESENTE DOCUMENTO Y PUBLICARLO EN LOS LÍMITES DE LA ZONA DE TRABAJO O DE LA DEMARCACIÓN Y CERRAMIENTO QUE HIZO DE SU ZONA DE TRABAJO.</p>
    <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Saludos,<br>
    {{config('app.name')}}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
        
                            <tr>
                        <td style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box;">
                            <table class="footer" align="center" width="750" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; margin: 0 auto; padding: 0; text-align: center; width: 750px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 750px;">
                                <tr>
                                    <td class="content-cell" align="center" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; padding: 35px;">
                                        <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; line-height: 1.5em; margin-top: 0; color: #aeaeae; font-size: 12px; text-align: center;">© 2019-2021 Energitelco S.A.S. Todos los derechos reservados.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>