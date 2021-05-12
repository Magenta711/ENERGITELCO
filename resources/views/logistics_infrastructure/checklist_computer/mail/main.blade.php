<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #f8fafc; color: #74787e; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;">
    <style>
        @media  only screen and (max-width: 800px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media  only screen and (max-width: 600px) {
            .button {
                width: 100% !important;
            }
        }
        .table-form {
            color: #3d4852;
        }
        .table-form th, .table-form td {
            text-align: left;
            vertical-align: top;
            border: 1px solid #999;
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
            Energitelco
        </a>
    </td>
</tr>
                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #ffffff; border-bottom: 1px solid #edeff2; border-top: 1px solid #edeff2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                            <table class="inner-body" align="center" width="800" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #ffffff; margin: 0 auto; padding: 0; width: 800px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 800px;">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; padding: 35px;">
                                        <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">¡Hola!</h1>
                <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Estás recibiendo una solicitud de verificación para el mantenimiento de los computadores.</p>
                <table class="table-form">
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
                                {{$format->responsable_equipo}}
                            </td>
                            <th>
                                Fecha
                            </th>
                            <td>
                                {{$format->fecha}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Marca
                            </th>
                            <td>
                                {{$format->marca}}
                            </td>
                            <th>
                               Modelo
                            </th>
                            <td>
                                {{$format->modelo}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Serial
                            </th>
                            <td>
                                {{$format->serial}}
                            </td>
                            <th>
                                Procesador
                            </th>
                            <td>
                                {{$format->procesador}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Disco duro
                            </th>
                            <td>
                                {{$format->disco_duro}}
                            </td>
                            <th>
                               Memoria RAM
                            </th>
                            <td>
                                {{$format->memoria_ram}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Sistema operativo
                            </th>
                            <td>
                                {{$format->sistema_operativo}}
                            </td>
                            <th>
                                Software instalado
                            </th>
                            <td>
                                {{$format->software_instalado}}
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">
                                Tipo de licencia
                            </th>
                            <td colspan="2">
                                {{$format->tipo_licencia}}
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">Técnico asignaho para el mantenimiento</td>
                        </tr>
                        <tr>
                            <td>Cédula</td>
                            <td colspan="2">Nombre del funcionario</td>
                            <td>Cargo</td>
                        </tr>
                        <tr>
                            <td>{{$format->tecnico->cedula}}</td>
                            <td>{{$format->tecnico->name}}</td>
                            <td>{{$format->tecnico->position->name}}</td>
                        </tr>
                        <tr>
                            <th colspan="4">Diagnostico inicial del computador</th>
                        </tr>
                        <tr>
                            <td colspan="4">{{$format->diagonostico_inicial}}</td>
                        </tr>
                        <tr>
                            <th colspan="4">Mantenimiento de software tipo 2</th>
                        </tr>
                        <tr>
                            <td colspan="3">1. Usuario y clave de inicio como única opción de acceso al pc</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a1 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">2. Actualizar Windows y todo el SW licenciado</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a2 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"> 3. Restringir acceso a las unidades de almacenamiento (todos sin excepción)</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a3 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">4. ¿Está impidiendo el acceso a las unidades internas del equipo?</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a5 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">5. Limpiar escritorio, carpetas personales y disco duro (solo queda carpeta Energitelco con clave y sus accesos directos)</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a4 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">6. Crear seguridad VPN</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a6 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">7. ¿Se ha realizado borrado seguro de la información confidencial?</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a6 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">8. ¿Se han presentado incidentes de seguridad con los accesos de claro y otros clientes?</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a6 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">9. ¿Se utilizan los servicios seguros y se han deshabilitado servicios no necesarios?</td>
                            <td>{{($format->work_add) ? $format->work_add->f2a6 : ''}}</td>
                        </tr>
                        <tr>
                            <th colspan="4">Mantenimiento de software tipo 1</th>
                        </tr>
                        <tr>
                            <td colspan="3">1. Archivos temporales</td>
                            <td>{{($format->work_add) ? $format->work_add->f3a1 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">2. Desfragmentación del disco duro</td>
                            <td>{{($format->work_add) ? $format->work_add->f3a2 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">3. Actualización del CCLEANER</td>
                            <td>{{($format->work_add) ? $format->work_add->f3a3 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">4. Actualización del antivirus (obligatorio)</td>
                            <td>{{($format->work_add) ? $format->work_add->f3a4 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">5. Se requiere formateo del computador</td>
                            <td>{{($format->work_add) ? $format->work_add->f3a5 : ''}}</td>
                        </tr>
                        <tr>
                            <th colspan="4">Mantenimiento de software tipo 2</th>
                        </tr>
                        <tr>
                            <td colspan="3">1. Cargar de sistema operativo</td>
                            <td>{{$format->f1a1}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">2. Cargar de Office</td>
                            <td>{{$format->f1a2}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">3. Carga de antivirus y actualización</td>
                            <td>{{$format->f1a3}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">4. Cargar de Acrobat y WinRAR</td>
                            <td>{{$format->f1a4}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">5. Conexión AnyDesk</td>
                            <td>{{$format->f1a5}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">6. Conexión Ericsson MW</td>
                            <td>{{$format->f1a6}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">7. Conexión Huawei MW</td>
                            <td>{{$format->f1a7}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">8. Conexión NEC Ipaso MW</td>
                            <td>{{$format->f1a8}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">9. Conexión NEC NEO MW</td>
                            <td>{{$format->f1a9}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">10. Conexión NEC v4 MW</td>
                            <td>{{$format->f1a10}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">11. Conexión flexi BTS</td>
                            <td>{{$format->f1a11}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">12. Conexión lte BTS</td>
                            <td>{{$format->f1a12}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">13. Conexión Ultra BTS</td>
                            <td>{{$format->f1a13}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">14. Conexión Umts BTS</td>
                            <td>{{$format->f1a14}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">15. Conexión Eltek 1.0 Power</td>
                            <td>{{$format->f1a15}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">16. Conexión Eltek 2.0 Power</td>
                            <td>{{$format->f1a16}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">17. Verificar cable de conexión para cada aplicativo de SW</td>
                            <td>{{$format->f1a17}}</td>
                        </tr>
                        <tr>
                            <th colspan="4">Mantenimiento de software tipo 3</th>
                        </tr>
                        <tr>
                            <td colspan="3">1. Carga de sistema operativo</td>
                            <td>{{($format->work_add) ? $format->work_add->f4a1 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">2. Carga de office</td>
                            <td>{{($format->work_add) ? $format->work_add->f4a2 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">3. Carga de antivirus y actualización</td>
                            <td>{{($format->work_add) ? $format->work_add->f4a3 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">4. Carga de Acrobat y WinRar</td>
                            <td>{{($format->work_add) ? $format->work_add->f4a4 : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">5. Instalación de impresoras y red</td>
                            <td>{{($format->work_add) ? $format->work_add->f4a5 : ''}}</td>
                        </tr>
                        <tr>
                            <th colspan="4">Mantenimiento de hardware estándar</th>
                        </tr>
                        <tr>
                            <td colspan="3">1. Limpieza de los contactos de la memoria RAM</td>
                            <td>{{$format->f1b1}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">2. Limpieza del disparador de calor</td>
                            <td>{{$format->f1b2}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">3. Mantenimiento al Cooler y Fan</td>
                            <td>{{$format->f1b3}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">4. Mantenimiento del teclado</td>
                            <td>{{$format->f1b4}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">5. Mantenimiento de la pantalla</td>
                            <td>{{$format->f1b5}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">6. Mantenimiento contactos del teclado y sensor del mouse</td>
                            <td>{{$format->f1b6}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">7. Mantenimiento contactos de tarjeta de red inalámbrica</td>
                            <td>{{$format->f1b7}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">8. Mantenimiento unidad de CD</td>
                            <td>{{$format->f1b8}}</td>
                        </tr>
                        @if ($format->created_at > '2020-12-12 08:00:00')
                            <tr>
                                <td colspan="3">9. ¿El escritorio físico se encentra limpio y ordenado?</td>
                                <td>{{$format->f1b9}}</td>
                            </tr>
                        @endif
                        <tr>
                            <th colspan="4">Observaciones</th>
                        </tr>
                        <tr>
                            <td colspan="4">{{$format->observaciones}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Firmado electrónicamente por el responsable del trabajo o líder</td>
                            <td colspan="2">Firmado electrónicamente por el auditor o coordinador</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{$format->responsableAcargo->name}}</td>
                            <td>Nombre</td>
                            <td>{{($format->coordinadorAcargo) ? $format->coordinadorAcargo->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Cédula</td>
                            <td>{{$format->responsableAcargo->cedula}}</td>
                            <td>Cédula</td>
                            <td>{{($format->coordinadorAcargo) ? $format->coordinadorAcargo->cedula : ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$format->responsableAcargo->name}}</strong>, en rol de {{$format->responsableAcargo->getRoleNames()[0] }}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
                            </td>
                            <td colspan="2">
                                @if ($format->coordinadorAcargo)
                                    Solicitud aprobada y firmada electrónicamente por <strong>{{$format->coordinadorAcargo->name}}</strong> en rol de {{$format->coordinadorAcargo->getRoleNames()[0] }} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
                                @endif
                            </td>
                        </tr>
                    </tbody>
    
                </table>
                
                <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Saludos,<br>
                    {{config('app.name')}} S.A.S</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                
                                <tr>
                <td style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box;">
                    <table class="footer" align="center" width="800" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; margin: 0 auto; padding: 0; text-align: center; width: 800px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 800px;">
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