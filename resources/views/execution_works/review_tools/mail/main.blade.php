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
<?php $i = 0; ?>
<table class="table-form">
    <thead>
        <tr>
            <th>O-FR-06</th>
            <th colspan="4">REVISIÓN Y ASIGNACIÓN DE HERRAMIENTAS</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="2">Revisor</td>
            <td colspan="2">Cédula</td>
            <td colspan="2">Nombre del funcionario</td>
        </tr>
        <tr>
            <td colspan="2">{{$format->revisor->cedula}}</td>
            <td colspan="2">{{$format->revisor->name}}</td>
        </tr>
        <tr>
            <td rowspan="2">Revisado</td>
            <td colspan="2">Cédula</td>
            <td colspan="2">Nombre del funcionario</td>
        </tr>
        <tr>
            <td colspan="2">{{$format->revisado->cedula}}</td>
            <td colspan="2">{{$format->revisado->name}}</td>
        </tr>
        <tr>
            <td>Ítem</td>
            <td>Herramienta asignada</td>
            <td>Cantidad</td>
            <td>Marca</td>
            <td>Observaciones</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Brújula (GPS)</td>
            <td>{{$format->cantidad_1}}</td>
            <td>{{$format->marca_1}}</td>
            <td>{{$format->observacion_1}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Multímetro digital</td>
            <td>{{$format->cantidad_2}}</td>
            <td>{{$format->marca_2}}</td>
            <td>{{$format->observacion_2}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Cables USB 2.0 o ETHERNET</td>
            <td>{{$format->cantidad_3}}</td>
            <td>{{$format->marca_3}}</td>
            <td>{{$format->observacion_3}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Llaves para tableros de BTS, ZTE, HUAWEI</td>
            <td>{{$format->cantidad_4}}</td>
            <td>{{$format->marca_4}}</td>
            <td>{{$format->observacion_4}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Ponchadora BNC</td>
            <td>{{$format->cantidad_5}}</td>
            <td>{{$format->marca_5}}</td>
            <td>{{$format->observacion_5}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Ponchadora RJ45</td>
            <td>{{$format->cantidad_6}}</td>
            <td>{{$format->marca_6}}</td>
            <td>{{$format->observacion_6}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Juego de llaves TORX</td>
            <td>{{$format->cantidad_7}}</td>
            <td>{{$format->marca_7}}</td>
            <td>{{$format->observacion_7}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Juego de llaves hexágonas</td>
            <td>{{$format->cantidad_8}}</td>
            <td>{{$format->marca_8}}</td>
            <td>{{$format->observacion_8}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Cortafrío</td>
            <td>{{$format->cantidad_9}}</td>
            <td>{{$format->marca_9}}</td>
            <td>{{$format->observacion_9}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Pinza</td>
            <td>{{$format->cantidad_10}}</td>
            <td>{{$format->marca_10}}</td>
            <td>{{$format->observacion_10}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Bisturí</td>
            <td>{{$format->cantidad_11}}</td>
            <td>{{$format->marca_11}}</td>
            <td>{{$format->observacion_11}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Cautín</td>
            <td>{{$format->cantidad_12}}</td>
            <td>{{$format->marca_12}}</td>
            <td>{{$format->observacion_12}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Juego de destornilladores de pala y estrella</td>
            <td>{{$format->cantidad_13}}</td>
            <td>{{$format->marca_13}}</td>
            <td>{{$format->observacion_13}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Destornillador perillero de pala y estrella</td>
            <td>{{$format->cantidad_14}}</td>
            <td>{{$format->marca_14}}</td>
            <td>{{$format->observacion_14}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Alicate</td>
            <td>{{$format->cantidad_15}}</td>
            <td>{{$format->marca_15}}</td>
            <td>{{$format->observacion_15}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Mango de sierra</td>
            <td>{{$format->cantidad_16}}</td>
            <td>{{$format->marca_16}}</td>
            <td>{{$format->observacion_16}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Juego de llaves combinadas</td>
            <td>{{$format->cantidad_17}}</td>
            <td>{{$format->marca_17}}</td>
            <td>{{$format->observacion_17}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Llave de expansión pequeña</td>
            <td>{{$format->cantidad_18}}</td>
            <td>{{$format->marca_18}}</td>
            <td>{{$format->observacion_18}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Llave de expansión grande 12 pulgadas</td>
            <td>{{$format->cantidad_19}}</td>
            <td>{{$format->marca_19}}</td>
            <td>{{$format->observacion_19}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Unión BNC-BNC super importante</td>
            <td>{{$format->cantidad_20}}</td>
            <td>{{$format->marca_20}}</td>
            <td>{{$format->observacion_20}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Led de prueba super importante</td>
            <td>{{$format->cantidad_21}}</td>
            <td>{{$format->marca_21}}</td>
            <td>{{$format->observacion_21}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Extensión eléctrica</td>
            <td>{{$format->cantidad_22}}</td>
            <td>{{$format->marca_22}}</td>
            <td>{{$format->observacion_22}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Martillo</td>
            <td>{{$format->cantidad_23}}</td>
            <td>{{$format->marca_23}}</td>
            <td>{{$format->observacion_23}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Tijera de corte especial</td>
            <td>{{$format->cantidad_24}}</td>
            <td>{{$format->marca_24}}</td>
            <td>{{$format->observacion_24}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Cortafrío pequeño</td>
            <td>{{$format->cantidad_25}}</td>
            <td>{{$format->marca_25}}</td>
            <td>{{$format->observacion_25}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Taladro</td>
            <td>{{$format->cantidad_26}}</td>
            <td>{{$format->marca_26}}</td>
            <td>{{$format->observacion_26}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Juego de brocas de lámina</td>
            <td>{{$format->cantidad_27}}</td>
            <td>{{$format->marca_27}}</td>
            <td>{{$format->observacion_27}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Broca de muro</td>
            <td>{{$format->cantidad_28}}</td>
            <td>{{$format->marca_28}}</td>
            <td>{{$format->observacion_28}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>PC con PTO ETH y los SW para MW, BTS y POWER</td>
            <td>{{$format->cantidad_29}}</td>
            <td>{{$format->marca_29}}</td>
            <td>{{$format->observacion_29}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Bolso para portar PC</td>
            <td>{{$format->cantidad_30}}</td>
            <td>{{$format->marca_30}}</td>
            <td>{{$format->observacion_30}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Smartphone con app Energitelco. puede ser personal</td>
            <td>{{$format->cantidad_31}}</td>
            <td>{{$format->marca_31}}</td>
            <td>{{$format->observacion_31}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Marquilladora con cinta dimo</td>
            <td>{{$format->cantidad_32}}</td>
            <td>{{$format->marca_32}}</td>
            <td>{{$format->observacion_32}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Bolso para arnés</td>
            <td>{{$format->cantidad_33}}</td>
            <td>{{$format->marca_33}}</td>
            <td>{{$format->observacion_33}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Vehículo o moto</td>
            <td>{{$format->cantidad_34}}</td>
            <td>{{$format->marca_34}}</td>
            <td>{{$format->observacion_34}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Llaves de ingreso a sede Energitelco</td>
            <td>{{$format->cantidad_35}}</td>
            <td>{{$format->marca_35}}</td>
            <td>{{$format->observacion_35}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Silla</td>
            <td>{{$format->cantidad_36}}</td>
            <td>{{$format->marca_36}}</td>
            <td>{{$format->observacion_36}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Escritorio</td>
            <td>{{$format->cantidad_37}}</td>
            <td>{{$format->marca_37}}</td>
            <td>{{$format->observacion_37}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Arnés</td>
            <td>{{$format->cantidad_38}}</td>
            <td>{{$format->marca_38}}</td>
            <td>{{$format->observacion_38}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Casco</td>
            <td>{{$format->cantidad_39}}</td>
            <td>{{$format->marca_39}}</td>
            <td>{{$format->observacion_39}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Barbuquejo</td>
            <td>{{$format->cantidad_40}}</td>
            <td>{{$format->marca_40}}</td>
            <td>{{$format->observacion_40}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Gafas de seguridad</td>
            <td>{{$format->cantidad_41}}</td>
            <td>{{$format->marca_41}}</td>
            <td>{{$format->observacion_41}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Eslinga en Y</td>
            <td>{{$format->cantidad_42}}</td>
            <td>{{$format->marca_42}}</td>
            <td>{{$format->observacion_42}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Eslinga de posicionamiento</td>
            <td>{{$format->cantidad_43}}</td>
            <td>{{$format->marca_43}}</td>
            <td>{{$format->observacion_43}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Mosquetón</td>
            <td>{{$format->cantidad_44}}</td>
            <td>{{$format->marca_44}}</td>
            <td>{{$format->observacion_44}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Freno para guaya de 10 mm</td>
            <td>{{$format->cantidad_45}}</td>
            <td>{{$format->marca_45}}</td>
            <td>{{$format->observacion_45}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Equipo de protección caídas para moto</td>
            <td>{{$format->cantidad_46}}</td>
            <td>{{$format->marca_46}}</td>
            <td>{{$format->observacion_46}}</td>
        </tr>
        <tr>
            <td>{{++$i}}</td>
            <td>Impermeable para moto</td>
            <td>{{$format->cantidad_47}}</td>
            <td>{{$format->marca_47}}</td>
            <td>{{$format->observacion_47}}</td>
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