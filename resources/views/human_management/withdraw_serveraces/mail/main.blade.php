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
                <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Estás recibiendo una solicitud de carta de retiro de cesantías o laboral.</p>
                <table class="table-form">
                    <thead>
                        <tr>
                            @if ($format->reason == 'carta laboral')
                                <th colspan="4">SOLICITUD DE CARTA LABORAL</th>
                            @else
                                <th colspan="4">SOLICITUD DE CARTA DE RETIRO CESANTÍAS</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                Resposable
                            </th>
                            <td>
                                {{$format->responsableAcargo->name}}
                            </td>
                            <th>
                                Fecha
                            </th>
                            <td>
                                {{$format->created_at}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Motivo
                            </th>
                            <td>
                                @switch($format->reason)
                                    @case('vivienda')
                                        Para financiar vivienda
                                        @break
                                    @case('educacion')
                                        Para financiar la educación
                                        @break
                                    @case('acciones')
                                        Para comprar acciones en las empresas del estado
                                        @break
                                    @case('carta laboral')
                                        Carta laboral
                                        @break
                                    @default
                                        
                                @endswitch
                            </td>
                            <th>
                               Valor
                            </th>
                            <td>
                                $ {{number_format($format->value,2,',','.')}}
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">
                                Descriptión
                            </th>
                        </tr>
                        <tr>
                            <td colspan="4">
                                {{$format->description}}
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