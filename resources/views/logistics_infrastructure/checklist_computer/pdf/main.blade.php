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
                <th>L-FR-06</th>
                <th colspan="3">LISTA DE VERIFICACIÓN PARA EL MANTENIMIENTO DE LOS COMPUTADORES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    Responsable del equipo
                </th>
                <td>
                    {{$trabajo->responsable_equipo}}
                </td>
                <th>
                    Fecha
                </th>
                <td>
                    {{$trabajo->fecha}}
                </td>
            </tr>
            <tr>
                <th>
                    Marca
                </th>
                <td>
                    {{$trabajo->marca}}
                </td>
                <th>
                   Modelo
                </th>
                <td>
                    {{$trabajo->modelo}}
                </td>
            </tr>
            <tr>
                <th>
                    Serial
                </th>
                <td>
                    {{$trabajo->serial}}
                </td>
                <th>
                    Procesador
                </th>
                <td>
                    {{$trabajo->procesador}}
                </td>
            </tr>
            <tr>
                <th>
                    Disco duro
                </th>
                <td>
                    {{$trabajo->disco_duro}}
                </td>
                <th>
                   Memoria RAM
                </th>
                <td>
                    {{$trabajo->memoria_ram}}
                </td>
            </tr>
            <tr>
                <th>
                    Sistema operativo
                </th>
                <td>
                    {{$trabajo->sistema_operativo}}
                </td>
                <th>
                    Software instalado
                </th>
                <td>
                    {{$trabajo->software_instalado}}
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    Tipo de licencia
                </th>
                <td colspan="2">
                    {{$trabajo->tipo_licencia}}
                </td>
            </tr>
            <tr>
                <th rowspan="2">Técnico asignaho para el mantenimiento</td>
                <td>Cédula</td>
                <td>Nombre del funcionario</td>
                <td>Cargo</td>
            </tr>
            <tr>
                <td>{{$trabajo->tecnico->cedula}}</td>
                <td>{{$trabajo->tecnico->name}}</td>
                <td>{{$trabajo->tecnico->position->name}}</td>
            </tr>
            <tr>
                <th colspan="4">Diagnostico inicial del computador</th>
            </tr>
            <tr>
                <td colspan="4">{!! str_replace("\n", '</br>', addslashes($trabajo->diagonostico_inicial))!!}</td>
            </tr>
            {{-- Version 3* 4* --}}
            @if ($trabajo->work_add)
            <tr>
                <th colspan="4">Tareas para el manejo de seguridad de la información</th>
            </tr>
            <tr>
                <td colspan="3">Usuario y clave de inicio como única opción de acceso al pc</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a1 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Actualizar Windows y todo el SW licenciado</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a2 : ''}}</td>
            </tr>
            {{-- Version 4* --}}
            @if ($trabajo->created_at > '2020-10-03 8:00:00')
            <tr>
                <td colspan="3">Restringir acceso a las unidades de almacenamiento (todos sin excepción)</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a3 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">¿Está impidiendo el acceso a las unidades internas del equipo?</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a5 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Limpiar escritorio, carpetas personales y disco duro (solo queda carpeta Energitelco con clave y sus accesos directos)</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a4 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Crear seguridad VPN</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a6 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">¿Se ha realizado borrado seguro de la información confidencial?</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a7 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">¿Se han presentado incidentes de seguridad con los accesos de claro y otros clientes?</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a8 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">¿Se utilizan los servicios seguros y se han deshabilitado servicios no necesarios?<td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a9 : ''}}</td>
            </tr>
            @else
            {{-- Version 3* --}}
            <tr>
                <td colspan="3">Bloquear puertos USB (todos sin excepción)td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a3 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Limpiar escritorio, carpetas personales y disco duro (solo queda carpeta Energitelco con clave y sus accesos directos<td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a4 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Crear bloqueo de bodega<td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a5 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Crear seguridad VPN<td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f2a6 : ''}}</td>
            </tr>
            @endif
            @endif
            {{-- Version 3*, 4* --}}
            @if ($trabajo->work_add)
            <tr>
                <th colspan="4">Mantenimiento de software tipo 1</th>
            </tr>
            <tr>
                <td colspan="3">Archivos temporales</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f3a1 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Desfragmentación del disco duro</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f3a2 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Actualización del CCLEANER</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f3a3 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Actualización del antivirus (obligatorio)</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f3a4 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Se requiere formateo del computador</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f3a5 : ''}}</td>
            </tr>
            @endif
            <tr>
                <th colspan="4">Mantenimiento de software tipo 2</th>
            </tr>
            <tr>
                <td colspan="3">Cargar de sistema operativo</td>
                <td>{{$trabajo->f1a1}}</td>
            </tr>
            <tr>
                <td colspan="3">Cargar de Office</td>
                <td>{{$trabajo->f1a2}}</td>
            </tr>
            <tr>
                <td colspan="3">Carga de antivirus y actualización</td>
                <td>{{$trabajo->f1a3}}</td>
            </tr>
            <tr>
                <td colspan="3">Cargar de Acrobat y WinRAR</td>
                <td>{{$trabajo->f1a4}}</td>
            </tr>
            @if ($trabajo->created_at > '2020-09-17 12:00:00')
            <tr>
                <td colspan="3">Conexión AnyDesk</td>
                <td>{{$trabajo->f1a5}}</td>
            </tr>
            @else
            <tr>
                <td colspan="3">Conexión TeamViewer</td>
                <td>{{$trabajo->f1a5}}</td>
            </tr>
            @endif
            <tr>
                <td colspan="3">Conexión Ericsson MW</td>
                <td>{{$trabajo->f1a6}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión Huawei MW</td>
                <td>{{$trabajo->f1a7}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión NEC Ipaso MW</td>
                <td>{{$trabajo->f1a8}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión NEC NEO MW</td>
                <td>{{$trabajo->f1a9}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión NEC v4 MW</td>
                <td>{{$trabajo->f1a10}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión flexi BTS</td>
                <td>{{$trabajo->f1a11}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión lte BTS</td>
                <td>{{$trabajo->f1a12}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión Ultra BTS</td>
                <td>{{$trabajo->f1a13}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión Umts BTS</td>
                <td>{{$trabajo->f1a14}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión Eltek 1.0 Power</td>
                <td>{{$trabajo->f1a15}}</td>
            </tr>
            <tr>
                <td colspan="3">Conexión Eltek 2.0 Power</td>
                <td>{{$trabajo->f1a16}}</td>
            </tr>
            <tr>
                <td colspan="3">Verificar cable de conexión para cada aplicativo de SW</td>
                <td>{{$trabajo->f1a17}}</td>
            </tr>
            {{-- Version 3* 4* --}}
            @if ($trabajo->work_add)
            <tr>
                <th colspan="4">Mantenimiento de software tipo 3</th>
            </tr>
            <tr>
                <td colspan="3">Carga de sistema operativo</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f4a1 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Carga de office</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f4a2 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Carga de antivirus y actualización</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f4a3 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Carga de Acrobat y WinRar</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f4a4 : ''}}</td>
            </tr>
            <tr>
                <td colspan="3">Instalación de impresoras y red</td>
                <td>{{($trabajo->work_add) ? $trabajo->work_add->f4a5 : ''}}</td>
            </tr>
            @endif
            <tr>
                <th colspan="4">Mantenimiento de hardware estándar</th>
            </tr>
            <tr>
                <td colspan="3">Limpieza de los contactos de la memoria RAM</td>
                <td>{{$trabajo->f1b1}}</td>
            </tr>
            <tr>
                <td colspan="3">Limpieza del disparador de calor</td>
                <td>{{$trabajo->f1b2}}</td>
            </tr>
            <tr>
                <td colspan="3">Mantenimiento al Cooler y Fan</td>
                <td>{{$trabajo->f1b3}}</td>
            </tr>
            <tr>
                <td colspan="3">Mantenimiento del teclado</td>
                <td>{{$trabajo->f1b4}}</td>
            </tr>
            <tr>
                <td colspan="3">Mantenimiento de la pantalla</td>
                <td>{{$trabajo->f1b5}}</td>
            </tr>
            <tr>
                <td colspan="3">Mantenimiento contactos del teclado y sensor del mouse</td>
                <td>{{$trabajo->f1b6}}</td>
            </tr>
            <tr>
                <td colspan="3">Mantenimiento contactos de tarjeta de red inalámbrica</td>
                <td>{{$trabajo->f1b7}}</td>
            </tr>
            <tr>
                <td colspan="3">Mantenimiento unidad de CD</td>
                <td>{{$trabajo->f1b8}}</td>
            </tr>
            @if ($trabajo->created_at > '2020-12-12 08:00:00')
                <tr>
                    <td colspan="3">¿El escritorio físico se encentra limpio y ordenado?</td>
                    <td>{{$trabajo->f1b9}}</td>
                </tr>
            @endif
            <tr>
                <th colspan="4">Observaciones</th>
            </tr>
            <tr>
                <td colspan="4">{{$trabajo->observaciones}}</td>
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
                <td colspan="2">
                    Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$trabajo->responsableAcargo->name}}</strong>, en rol de {{$trabajo->responsableAcargo->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
                </td>
                <td colspan="2">
                    Solicitud aprobada y firmada electrónicamente por <strong>{{$trabajo->coordinadorAcargo->name}}</strong> en rol de {{$trabajo->coordinadorAcargo->getRoleNames()[0] }} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
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