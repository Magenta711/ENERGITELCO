<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
            text-align: left;
            vertical-align: top;
            border: 1px solid #c9c9c9;
            border-collapse: collapse;
        }
        .td-item {
            width: 10%;
        }
        .td-description {
            width: 60%;
        }
        .td-status {
            width: 30%;
        }
    </style>
@php
    $i = 1;
@endphp
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #f8fafc; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
        <tr>
            <td align="center" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box;">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                    <tr>
                        <td class="header" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; padding: 25px 0; text-align: center;">
                            <a href="{{config('app.url')}}" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #bbbfc3; font-size: 19px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
                                {{config('app.name')}}
                            </a>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #ffffff; border-bottom: 1px solid #edeff2; border-top: 1px solid #edeff2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #ffffff; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; padding: 35px;">
                                        <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">H-FR-17 Lista de chequeo documentación<br>Hoja de vida</h1>
                                        <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;"><b>Nombre</b> {{$id->register->name}}<br><b>Número de Cédula</b> {{$id->register->document}}</p>
                                        <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                            <b>A. Documentación para el ingreso del trabajador</b> <br>
                                            <table class="table-form">
                                                <thead>
                                                    <tr>
                                                        <th>Ítem</th>
                                                        <th>Descripción</th>
                                                        <th>Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="td-item">{{$i++}}</td>
                                                        <td class="td-description">Realizó Curso virtual de 50 horas sobre SST</td>
                                                        <td class="td-status">{{$id->sst ? 'Si' : 'No'}}</td>
                                                    </tr>
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Hoja de vida'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Certificados de estudio (BACHILLERATO, TECNICO, CURSOS Y/O ESTUDIOS SUPERIORES)'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Fotocopia de cédula'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Fotocopia de libreta militar'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Fotocopia de la tarjeta profecional o de la matrícula profesional conte'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Fotocopia de licencia de condución'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Foto fondo blanco, traje formal'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Certificado de antecedentes emitido por la procuraduria'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Certificado de antecedentes emitido por la policia nacional'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Certificado de revisión en el SIMIT'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Carta de su actual fondo de pensiones (Si aplica)'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Carta de su actual fondo de EPS (Si aplica)'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Certificado de apertura de cuenta de Bancolombia'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Concepto de examenes médicos ocupacionales y sustancias psicoactivas'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Afiliación a la ARL'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Afiliación a la EPS'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Afiliación a AFP'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Afiliación a cesantías'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Afiliación a caja de compensación'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Certificado de curso de trabajo seguro en alturas'])
                                                    @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Certificado de coordinador de trabajo en alturas'])
                                                    {{-- @include('curriculum.include.show_table',['num'=>$i++,'label'=>'Contrato de trabajo']) --}}
                                                    @foreach ($documents as $item)
                                                        @include('curriculum.include.show_table_signature',['num'=>$i++])
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <br>
                                            <b>B. Declaración sobre familiares que elaboren con claro y otros</b> <br><br>
                                            <table class="table-form">
                                                <tr>
                                                    <th>¿Tiene el trabajador familiares que trabajen con Claro?</th>
                                                    <td>{{$id->has_familiary ? 'Si' : 'No'}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <td>{{$id->name_r}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Parentesco</th>
                                                    <td>{{$id->parent}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Cargo</th>
                                                    <td>{{($id->position) ? $id->position->name : ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>¿Tiene o ha tenido alguna limitación osteomuscular?</th>
                                                    <td>{{($id->has_limitary == 1) ? 'Si' : 'No'}}</td>
                                                </tr>
                                            </table>
                                        </p>
                                        <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Para más detalles sobre la hoja de vida ingresa a la aplicación web de Energitelco, para facilitar el acceso de clic <a target="_blank" href="{{config('app.url')}}/curriculum/show/{{$id->id}}">Aquí</a>.</p>
                                        <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; border-top: 1px solid #edeff2; margin-top: 25px; padding-top: 25px;">
                                            <tr>
                                                <td style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box;">
                                                    <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3d4852; line-height: 1.5em; margin-top: 0; text-align: left; font-size: 12px;">Si tienes problemas haciendo click en el botón "Dar aquí para ingresar", copia y pega el siguiente enlace en tu navegador: <a href="{{config('app.url')}}/curriculum/show/{{$id->id}}" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; color: #3869d4;">{{config('app.url')}}/curriculum/show/{{$id->id}}</a></p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box;">
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; margin: 0 auto; padding: 0; text-align: center; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                <tr>
                                    <td class="content-cell" align="center" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; padding: 35px;">
                                        <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; line-height: 1.5em; margin-top: 0; color: #aeaeae; font-size: 12px; text-align: center;">© 2021 {{config('app.name')}}. Todos los derechos reservados.</p>
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