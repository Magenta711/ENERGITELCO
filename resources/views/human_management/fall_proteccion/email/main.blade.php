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
                                <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">{{$mensaje}}</p>

<table class="table-form">
    <thead>
        <tr>
            <th>H-FR-34</th>
            <th colspan="4">INSPECCIÓN DE EQUIPOS DE PROTECCIÓN CONTRA CAÍDAS</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">Trabajador</td>
            <td colspan="3">{{$format->trabajador->name}}</td>
        </tr>
        <tr>
            <td colspan="2">Cargo</td>
            <td colspan="3">{{$format->trabajador->position->name}}</td>
        </tr>
        <tr>
            <td colspan="2">Responsable de la inspección</td>
            <td colspan="3">{{$format->inspeccionador->name}}</td>
        </tr>
        <tr>
            <td colspan="2">Cargo</td>
            <td colspan="3">{{$format->inspeccionador->position->name}}</td>
        </tr>
        <tr>
            <td colspan="2">Fecha de inspección</td>
            <td colspan="3">{{$format->fecha_inspeccion}}</td>
        </tr>
        <tr>
            <th>Equipo</th>
            <th>Parte</th>
            <th>Aspecto a inspeccionar</th>
            <th>Si / No</th>
            <th>Observaciones</th>
        </tr>
        {{-- Formulario 2 --}}
        <tr>
            <td rowspan="20">ARNÉS</td>
            <td rowspan="13">CINTAS, CORREAS Y COSTURAS</td>
            <td>Cortes o rotura del tejido o costuras </td>
            <td>{{$format->E1_1}}</td>
            <td rowspan="17">{{$format->observaciones_1}}</td>
        </tr>
        <tr>
            <td>Fisuras</td>
            <td>{{$format->E1_2}}</td>
        </tr>
        <tr>
            <td>Estiramiento excesivo (elongación de la riata)</td>
            <td>{{$format->E1_3}}</td>
        </tr>
        <tr>
            <td>Deterioro generar</td>
            <td>{{$format->E1_4}}</td>
        </tr>
        <tr>
            <td>Corrosión o desastres por exposición a ácidos o productos químicos</td>
            <td>{{$format->E1_5}}</td>
        </tr>
        <tr>
            <td>Quemaduras o fibras derretidas</td>
            <td>{{$format->E1_6}}</td>
        </tr>
        <tr>
            <td>Perforaciones o agujeros</td>
            <td>{{$format->E1_7}}</td>
        </tr>
        <tr>
            <td>Presenta suciedad</td>
            <td>{{$format->E1_8}}</td>
        </tr>
        <tr>
            <td>Costuras completas</td>
            <td>{{$format->E1_9}}</td>
        </tr>
        <tr>
            <td>Cuenta con la etiqueta de certificación</td>
            <td>{{$format->E1_10}}</td>
        </tr>
        <tr>
            <td>Deshilachamiento</td>
            <td>{{$format->E1_11}}</td>
        </tr>
        <tr>
            <td>Hilos faltantes</td>
            <td>{{$format->E1_12}}</td>
        </tr>
        <tr>
            <td>Reventadas</td>
            <td>{{$format->E1_13}}</td>
        </tr>
        <tr>
            <td rowspan="4">PARTES METÁLICAS</td>
            <td>Deformación (dobladura, ect.)</td>
            <td>{{$format->E1_14}}</td>
        </tr>
        <tr>
            <td>Picadura, grietas</td>
            <td>{{$format->E1_15}}</td>
        </tr>
        <tr>
            <td>Presenta desgaste</td>
            <td>{{$format->E1_16}}</td>
        </tr>
        <tr>
            <td>Corrosión u oxidación</td>
            <td>{{$format->E1_17}}</td>
        </tr>
        <tr>
            <td colspan="2">Serie del equipo</td>
            <td colspan="2">{{$format->serie_equipo_1}}</td>
        </tr>
        <tr>
            <td colspan="2">Marca del equipo</td>
            <td colspan="2">{{$format->marca_1}}</td>
        </tr>
        <tr>
            <td colspan="2">Estado general del arnés</td>
            <td colspan="2">{{$format->estado_arnes}}</td>
        </tr>
        <tr>
            <th>Equipo</th>
            <th>Parte</th>
            <th>Aspecto a inspeccionar</th>
            <th>Si / No</th>
            <th>Observaciones</th>
        </tr>
        {{-- Formulario 3 --}}
        <tr>
            <td rowspan="21">ESLINGA EN Y</td>
            <td rowspan="14">CINTAS, CORREAS, COSTURAS Y ABSORBEDOR</td>
            <td>Presenta perforaciones o desgastes</td>
            <td>{{$format->E2_1}}</td>
            <td rowspan="18">{{$format->observaciones_2}}</td>
        </tr>
        <tr>
            <td>Costuras sueltas o reventadas</td>
            <td>{{$format->E2_2}}</td>
        </tr>
        <tr>
            <td>Deterioro</td>
            <td>{{$format->E2_3}}</td>
        </tr>
        <tr>
            <td>Presenta suciedad</td>
            <td>{{$format->E2_4}}</td>
        </tr>
        <tr>
            <td>Salpicaduras de pintura y rigidez en cinta</td>
            <td>{{$format->E2_5}}</td>
        </tr>
        <tr>
            <td>Cortes o roturas del tejido o costuras</td>
            <td>{{$format->E2_6}}</td>
        </tr>
        <tr>
            <td>Fisuras</td>
            <td>{{$format->E2_7}}</td>
        </tr>
        <tr>
            <td>Estiramiento excesivo (elongación de la riata)</td>
            <td>{{$format->E2_8}}</td>
        </tr>
        <tr>
            <td>Deterioro general</td>
            <td>{{$format->E2_9}}</td>
        </tr>
        <tr>
            <td>Corrosión o desgas tes por exposición a ácidos o productos químicos</td>
            <td>{{$format->E2_10}}</td>
        </tr>
        <tr>
            <td>Quemaduras o fibras derretidas</td>
            <td>{{$format->E2_11}}</td>
        </tr>
        <tr>
            <td>Perforaciones o agujeros</td>
            <td>{{$format->E2_12}}</td>
        </tr>
        <tr>
            <td>Costuras completas</td>
            <td>{{$format->E2_13}}</td>
        </tr>
        <tr>
            <td>Cuenta con etiqueta de certificación </td>
            <td>{{$format->E2_14}}</td>
        </tr>
        <tr>
            <td rowspan="4">PARTES METÁLICAS</td>
            <td>Deformación (dobladura, ect.)</td>
            <td>{{$format->E2_15}}</td>
        </tr>
        <tr>
            <td>Picadura, grietas</td>
            <td>{{$format->E2_16}}</td>
        </tr>
        <tr>
            <td>Presenta desgaste</td>
            <td>{{$format->E2_17}}</td>
        </tr>
        <tr>
            <td>Corrosión u oxidación</td>
            <td>{{$format->E2_18}}</td>
        </tr>
        <tr>
            <td colspan="2">Serie del equipo</td>
            <td colspan="2">{{$format->serie_equipo_2}}</td>
        </tr>
        <tr>
            <td colspan="2">Marca del equipo</td>
            <td colspan="2">{{$format->marca_equipo_2}}</td>
        </tr>
        <tr>
            <td colspan="2">Estado general de la eslinga en Y</td>
            <td colspan="2">{{$format->estado_eslinga}}</td>
        </tr>
        <tr>
            <th>Equipo</th>
            <th>Parte</th>
            <th>Aspecto a inspeccionar</th>
            <th>Si / No</th>
            <th>Observaciones</th>
        </tr>
        {{-- Formulario 3 --}}
        <tr>
            <td rowspan="17">ESLINGA DE POSICIONAMIENTO</td>
            <td rowspan="9">CINTAS, CORREAS Y COSTURAS</td>
            <td>Cortes o rotura del tejido o costuras</td>
            <td>{{$format->E3_1}}</td>
            <td rowspan="14">{{$format->observaciones_3}}</td>
        </tr>
        <tr>
            <td>Fisuras</td>
            <td>{{$format->E3_2}}</td>
        </tr>
        <tr>
            <td>Estiramiento excesivo (elongación de la riata)</td>
            <td>{{$format->E3_2}}</td>
        </tr>
        <tr>
            <td>Deterioro general</td>
            <td>{{$format->E3_3}}</td>
        </tr>
        <tr>
            <td>Corrosión o desgastes por exposición a ácidos o productos químicos</td>
            <td>{{$format->E3_4}}</td>
        </tr>
        <tr>
            <td>Quemaduras o fibras derretidas</td>
            <td>{{$format->E3_5}}</td>
        </tr>
        <tr>
            <td>Perforaciones o agujeros</td>
            <td>{{$format->E3_6}}</td>
        </tr>
        <tr>
            <td>Presenta suciedad</td>
            <td>{{$format->E3_7}}</td>
        </tr>
        <tr>
            <td>Costuras completas</td>
            <td>{{$format->E3_8}}</td>
        </tr>
        <tr>
            <td>Cuenta con etiqueta de certificación</td>
            <td>{{$format->E3_9}}</td>
        </tr>
        <tr>
            <td rowspan="4">PARTES METÁLICAS</td>
            <td>Deformación (dobladura, ect.)</td>
            <td>{{$format->E2_10}}</td>
        </tr>
        <tr>
            <td>Picadura, grietas</td>
            <td>{{$format->E2_11}}</td>
        </tr>
        <tr>
            <td>Presenta desgaste</td>
            <td>{{$format->E2_12}}</td>
        </tr>
        <tr>
            <td>Corrosión u oxidación</td>
            <td>{{$format->E2_13}}</td>
        </tr>
        <tr>
            <td colspan="2">Serie del equipo</td>
            <td colspan="2">{{$format->serie_equipo_3}}</td>
        </tr>
        <tr>
            <td colspan="2">Marca del equipo</td>
            <td colspan="2">{{$format->marca_equipo_3}}</td>
        </tr>
        <tr>
            <td colspan="2">Estado general de la eslinga</td>
            <td colspan="2">{{$format->estado_eslinga2}}</td>
        </tr>
        <tr>
            <th>Equipo</thth>
            <th>Parte</thth>
            <th>Aspecto a inspeccionar</th>
            <th>Si / No</th>
            <th>Observaciones</th>
        </tr>
        {{-- Formulario 4 --}}
        <tr>
            <td rowspan="22">ACCESORIOS</td>
            <td rowspan="8">MOSQUETÓN</td>
            <td>Deformación (dobladura, etc.)</td>
            <td>{{$format->E4_1}}</td>
            <td rowspan="8">{{$format->observaciones_4}}</td>
        </tr>
        <tr>
            <td>Deformación (dobladura, etc.)</td>
            <td>{{$format->E4_2}}</td>
        </tr>
        <tr>
            <td>Bloqueo (ajuste excesivo) de los mosquetones en cierres de seguridad.</td>
            <td>{{$format->E4_2}}</td>
        </tr>
        <tr>
            <td>Grietas o picaduras</td>
            <td>{{$format->E4_3}}</td>
        </tr>
        <tr>
            <td>Resortes (detecta fallas)</td>
            <td>{{$format->E4_4}}</td>
        </tr>
        <tr>
            <td>Deterioro general</td>
            <td>{{$format->E4_5}}</td>
        </tr>
        <tr>
            <td>Corrosión</td>
            <td>{{$format->E4_6}}</td>
        </tr>
        <tr>
            <td>Presencia de oxidación (moho)</td>
            <td>{{$format->E4_7}}</td>
        </tr>
        <tr>
            <td colspan="2">Serie del equipo</td>
            <td colspan="2">{{$format->serie_equipo_4}}</td>
        </tr>
        <tr>
            <td colspan="2">Marca del equipo</td>
            <td colspan="2">{{$format->marca_equipo_4}}</td>
        </tr>
        <tr>
            <td colspan="2">Estado general del mosquetón</td>
            <td colspan="2">{{$format->estado_mosqueton}}</td>
        </tr>
        <tr>
            <td rowspan="8">Freno</td>
            <td>Deformación (dobladura, etc.)</td>
            <td>{{$format->E5_1}}</td>
            <td rowspan="8">{{$format->observaciones_5}}</td>
        </tr>
        <tr>
            <td>Bloqueo (ajuste excesivo) de los mosquetones en cierres de seguridad</td>
            <td>{{$format->E5_2}}</td>
        </tr>
        <tr>
            <td>Grietas o picaduras</td>
            <td>{{$format->E5_3}}</td>
        </tr>
        <tr>
            <td>Resortes (detecta fallas)</td>
            <td>{{$format->E5_4}}</td>
        </tr>
        <tr>
            <td>Frenado (hacer prueba)</td>
            <td>{{$format->E5_5}}</td>
        </tr>
        <tr>
            <td>Deterioro general</td>
            <td>{{$format->E5_6}}</td>
        </tr>
        <tr>
            <td>Corrosión</td>
            <td>{{$format->E5_7}}</td>
        </tr>
        <tr>
            <td>Presencia de oxidación (moho)</td>
            <td>{{$format->E5_8}}</td>
        </tr>
        <tr>
            <td colspan="2">Serie del equipo</td>
            <td colspan="2">{{$format->serie_equipo_5}}</td>
        </tr>
        <tr>
            <td colspan="2">Marca del equipo</td>
            <td colspan="2">{{$format->marca_equipo_5}}</td>
        </tr>
        <tr>
            <td colspan="2">Estado general del freno</td>
            <td colspan="2">{{$format->estado_freno}}</td>
        </tr>
        <tr>
            <td colspan="3">Firmado electrónicamente por el responsable del trabajo o líder</td>
            <td colspan="3">Firmado electrónicamente por el auditor o coordinador</td>
        </tr>
        <tr>
            <td colspan="1">Nombre</td>
            <td colspan="2">{{$format->responsableAcargo->name}}</td>
            <td colspan="1">Nombre</td>
            <td colspan="2">{{($format->coordinadorAcargo) ? $format->coordinadorAcargo->name : ''}}</td>
        </tr>
        <tr>
            <td colspan="1">Cédula</td>
            <td colspan="2">{{$format->responsableAcargo->cedula}}</td>
            <td colspan="1">Cédula</td>
            <td colspan="2">{{($format->coordinadorAcargo) ? $format->coordinadorAcargo->cedula : ''}}</td>
        </tr>
        <tr>
            <td colspan="3">
                Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$format->responsableAcargo->name}}</strong>, en rol de {{$format->responsableAcargo->getRoleNames()[0]}} habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
            </td>
            <td colspan="3">
                @if ($format->coordinadorAcargo)
                    Solicitud aprobada y firmada electrónicamente por <strong>{{$format->coordinadorAcargo->name}}</strong> en rol de {{$format->coordinadorAcargo->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012
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
                                    <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; line-height: 1.5em; margin-top: 0; color: #aeaeae; font-size: 12px; text-align: center;">© 2019-2022 Energitelco S.A.S. Todos los derechos reservados.</p>
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