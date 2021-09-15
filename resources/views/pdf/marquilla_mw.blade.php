<!DOCTYPE html>
<html lang="es">
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
            font-size: 8.6pt;
        }
 
        body {
            margin: 3cm 1.5cm 2cm 1.5cm;
            background: #fff;
            font-family: Arial;
            font-size: 8.6pt;
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

        *, :after, :before {
            box-sizing: content-box;
        }

        .border_table {
            border: 2px solid black;
        }

        .border_table-1 {
            border: 1px solid black;
        }

        .logo_energitelco {
            width: 2.48cm;
            height: auto;
        }
        .logo_claro {
            width: 1.80cm;
            height: auto;
        }

        .logo_energitelco_idu{
            width: 1.08cm;
            height: auto;
        }
        .logo_claro_idu {
            width: 0.56cm;
            height: auto;
        }

        .id_local {
            font-size: 11pt;
            font-weight: bold;
        }
        
        {{-- Marckeup standar --}}
        .margin_standar{
            width: 14cm;
            height: 7.6cm;
        }
        
        .markeup_standar{
            width: 11.4cm;
            height: 7.6cm;
            margin: 0px;
            margin-top: -2px;
            margin-left: auto;
            margin-right: auto;
        }

        .table_markeup{
            width: 100%;
        }
        
        {{-- Markeup XPIC --}}
        .margin_XPIC{
            width: 14cm;
            height: 8.2cm;
        }

        .markeup_XPIC {
            width: 11.4cm;
            height: 8.2cm;
            margin: 0px;
            margin-top: -2px;
            margin-left: auto;
            margin-right: auto;
        }

        .bg-gray {
            background-color: lightgray;
        }
        
        {{-- Markeup SD --}}
        .margin_SD{
            width: 14cm;
            height: 9.9cm;
        }

        .markeup_SD{
            width: 11.4cm;
            height: 9.9cm;
            margin: 0px;
            margin-top: -2px;
            margin-left: auto;
            margin-right: auto;
        }

        {{-- Markeup XPIC SD --}}
        .margin_XPIC_SD{
            width: 14cm;
            height: 12.1cm;
        }

        .markeup_XPIC_SD {
            width: 11.4cm;
            height: 12.1cm;
            margin: 0px;
            margin-top: -2px;
            margin-left: auto;
            margin-right: auto;
        }

        {{-- Markeup N+1 XPIC --}}
        .margin_N_XPIC{
            width: 14cm;
            height: 9.3cm;
        }

        .markeup_N_XPIC {
            width: 11.4cm;
            height: 9.3cm;
            margin: 0px;
            margin-top: -2px;
            margin-left: auto;
            margin-right: auto;
        }

        {{-- Markeup IDU EB --}}
        .markeup_IDU_E_B{
            border: 5px double rgb(195, 38, 38);
            width: 4.8cm;
            height: 2cm;
            display: inline-block;
        }
        
        .table_markeup_IDU_E_B{
            height: 2cm;
            width: 100%;
            font-size: 6pt;
        }
        .table_markeup_IDU_E_B tr td{
            padding: 0px;
            line-height: 1.2;
        }
        .table_markeup_IDU_E_B tr .header_table_idu {
            font-size: 6pt;
            line-height: 1;
        }

        {{-- Marckeup_OUTDOOR_E_B --}}
        .markeup_OUTDOOR_E_B{
            width: 13cm;
            height: 6.5cm;
            background: rgb(212, 10, 10);
            padding-top: 0.5cm;
            color: white;
            font-size: 18pt;
            margin-bottom: 1cm;
        }

        .markeup_OUTDOOR_E_B_mini{
            width: 5cm;
            height: 2.8cm;
            background: rgb(212, 10, 10);
            color: white;
            font-size: 9pt;
            margin: 3px;
            display: inline-block;
        }

        .table_mini_markeup_OUTDOOR_E_B {
            width: 5cm;
            height: 2.8cm;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .table_markeup_OUTDOOR_E_B{
            width: 13cm;
            height: 6.5cm;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .table_markeup_OUTDOOR_E_B tr{
            padding: 4px 0px;
        }

        .table_markeup_OUTDOOR_E_B .f18{
            font-size: 18pt;
        }
        .table_markeup_OUTDOOR_E_B .f14{
            font-size: 14pt;
        }
        .table_markeup_OUTDOOR_E_B .f13{
            font-size: 13pt;
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
    @if ($id->MakeupMw_1_1->state)
    <section>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>ENLACE CONFIGURACIÓN ESTÁNDAR</h4>
                </div>
                Aplica para instalaciones con configuración 1+0 o 1+1.
            </div>
        </div>

        <div class="margin_standar border_table">
            <div class="markeup_standar border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="text-center id_local">{{$id->MakeupMw_1_1->id_local_1}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_1->ip_local_1}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_1->local_station_1}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_1->remote_station_1}}</td>
                        </tr>
                    </tbody>
                    <tbody class="border_table-1">

                        <tr>
                            <td class="border_table-1" colspan="6">Configuración</td>
                            <td class="border_table-1" colspan="14"></td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Altura antena</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_height_1_1}}</td>
                            <td class="border_table-1" colspan="6">Frecuencia Tx</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->local_frequency_1}}</td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Diámetro Antena</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_diameter_1_1}}</td>
                            <td class="border_table-1" colspan="6">Frecuencia Rx</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->remote_frequency_1}}</td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Polaridad</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->polarity_1_1}}</td>
                            <td class="border_table-1" colspan="6">Nivel Tx</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->level_tx_1_1}}</td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Modelo Antena</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_model_1_1}}</td>
                            <td class="border_table-1" colspan="6">Nivel Rx</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->level_rx_1_1}}</td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Marca Antena</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_brand_1_1}}</td>
                            <td class="border_table-1" colspan="6">Marca Equipo</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->equipment_brand_1}}</td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Serial Antena</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_serial_1_1}}</td>
                            <td class="border_table-1" colspan="6">Modelo Equipo</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->equipment_model_1}}</td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Azimut</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->azimuth_1_1}}</td>
                            <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->instalation_date_1}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="margin_standar border_table">
            <div class="markeup_standar border_table-1">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="text-center id_local">{{$id->MakeupMw_1_1->id_remote_1}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_1->ip_remote_1}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_1->remote_station_1}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_1->local_station_1}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="14"></td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_height_1_2}}</td>
                        <td class="border_table-1" colspan="6">Frecuencia Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->remote_frequency_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_diameter_1_2}}</td>
                        <td class="border_table-1" colspan="6">Frecuencia Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->local_frequency_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Polaridad</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->polarity_1_2}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->level_tx_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_model_1_2}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->level_rx_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_brand_1_2}}</td>
                        <td class="border_table-1" colspan="6">Marca Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->equipment_brand_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->antenna_serial_1_2}}</td>
                        <td class="border_table-1" colspan="6">Modelo Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->equipment_model_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->azimuth_1_2}}</td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_1->instalation_date_1}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    @endif
    <div style="page-break-after:always;"></div>
    @if ($id->MakeupMw_1_2->state)
    <section>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>ENLACE DE CONFIGURACIÓN XPIC</h4>
                </div>
                Aplica para instalaciones con configuración XPIC. Diametro 9,5cm x 11,4cm
            </div>
        </div>
        <div class="margin_XPIC border_table">
            <div class="markeup_XPIC border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="id_local text-center">{{$id->MakeupMw_1_2->id_local_2}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_2->ip_local_2}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_2->station_local_2}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_2->station_remote_2}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="4"></td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->instalation_date_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_height_2_1}}</td>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->azimuth_2_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_diameter_2_1}}</td>
                        <td class="border_table-1" colspan="6">Frecuencia Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->local_frecuency_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_model_2_1}}</td>
                        <td class="border_table-1" colspan="6">Frecuencia Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->remote_frecuency_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_brand_2_1}}</td>
                        <td class="border_table-1" colspan="6">Marca Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->equipment_brand_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_serial_2_1}}</td>
                        <td class="border_table-1" colspan="6">Modelo Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->equipment_model_2}}</td>
                    </tr>
                    <tr>
                        <th  class="border_table" colspan="10">Polaridad Veritical</th>
                        <th  class="border_table" colspan="10">Polaridad horizontal</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->level_tx_2_1_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->level_tx_2_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->level_rx_2_1_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->level_rx_2_1_2}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="margin_XPIC border_table">
            <div class="markeup_XPIC border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="id_local text-center">{{$id->MakeupMw_1_2->id_remote_2}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_2->ip_remote_2}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_2->station_remote_2}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_2->station_local_2}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="4"></td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->instalation_date_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_height_2_2}}</td>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->azimuth_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_diameter_2_2}}</td>
                        <td class="border_table-1" colspan="6">Frecuencia Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->remote_frecuency_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_model_2_2}}</td>
                        <td class="border_table-1" colspan="6">Frecuencia Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->local_frecuency_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_brand_2_2}}</td>
                        <td class="border_table-1" colspan="6">Marca Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->equipment_brand_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->antenna_serial_2_2}}</td>
                        <td class="border_table-1" colspan="6">Modelo Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->equipment_model_2}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Polaridad Veritical</th>
                        <th class="border_table" colspan="10">Polaridad horizontal</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->level_tx_2_2_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->level_tx_2_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->level_rx_2_2_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_2->level_rx_2_2_2}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    @endif
    <div style="page-break-after:always;"></div>
    @if ($id->MakeupMw_1_3->state)
    <section>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>ENLACE DE CONFIGURACIÓN DIVERSIDAD DE ESPACIO (SD)</h4>
                </div>
                Aplica para instalaciones con configuración diversidad de espacio (SD).
            </div>
        </div>
        <div class="margin_SD border_table">
            <div class="markeup_SD border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="id_local text-center">{{$id->MakeupMw_1_3->id_local_3}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_3->ip_local_3}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_3->station_local_3}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_3->station_remote_3}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="4"></td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->instalation_date_3}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Frecuencia Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->local_frecuency_3}}</td>
                        <td class="border_table-1" colspan="6">Marca de Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->equipment_brand_3}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Frecuencia Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->remote_frecuency_3}}</td>
                        <td class="border_table-1" colspan="6">Modelo Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->equipment_model_3}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->azimuth_3_1}}</td>
                        <td class="border_table-1" colspan="6">Polaridad</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->polarity_3_1}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Antena Principal</th>
                        <th class="border_table" colspan="10">Antena Diversidad</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_height_3_1_1}}</td>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_height_3_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_diameter_3_1_1}}</td>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_diameter_3_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_model_3_1_1}}</td>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_model_3_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_brand_3_1_1}}</td>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_brand_3_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_serial_3_1_1}}</td>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_serial_3_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->level_tx_3_1_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->level_tx_3_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->level_rx_3_1_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->level_rx_3_1_2}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="margin_SD border_table">
            <div class="markeup_SD border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="id_local text-center">{{$id->MakeupMw_1_3->id_remote_3}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_3->ip_remote_3}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_3->station_remote_3}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_3->station_local_3}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="4"></td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->instalation_date_3}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Frecuencia Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->remote_frecuency_3}}</td>
                        <td class="border_table-1" colspan="6">Marca de Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->equipment_brand_3}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Frecuencia Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->local_frecuency_3}}</td>
                        <td class="border_table-1" colspan="6">Modelo Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->equipment_model_3}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->azimuth_3_2}}</td>
                        <td class="border_table-1" colspan="6">Polaridad</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->polarity_3_2}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Antena Principal</th>
                        <th class="border_table" colspan="10">Antena Diversidad</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_height_3_2_1}}</td>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_height_3_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_diameter_3_2_1}}</td>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_diameter_3_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_model_3_2_1}}</td>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_model_3_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_brand_3_2_1}}</td>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_brand_3_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_serial_3_2_1}}</td>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->antenna_serial_3_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->level_tx_3_2_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->level_tx_3_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->level_rx_3_2_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_3->level_rx_3_2_2}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    @endif
    <div style="page-break-after:always;"></div>
    @if ($id->MakeupMw_1_4->state)
    <section>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>ENLACE CONFIGURACIÓN XPIC CON DIVERSIDAD DE ESPACIO (SD)</h4>
                </div>
                Aplica para instalaciones con configuración con XPIC con diversidad de espacio (SD).
            </div>
        </div>
        <div class="margin_XPIC_SD border_table">
            <div class="markeup_XPIC_SD border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <td colspan="7" class="id_local text-center">{{$id->MakeupMw_1_4->id_local_4}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <th colspan="7" class="text-center">{{$id->MakeupMw_1_4->ip_local_4}}</th>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_4->station_local_4}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_4->station_remote_4}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="14"></td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Frecuencia Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->local_frecuency_4}}</td>
                        <td class="border_table-1" colspan="6">Marca de Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->equipment_brand_4}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Frecuencia Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->remote_frecuency_4}}</td>
                        <td class="border_table-1" colspan="6">Modelo Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->equipment_model_4}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->azimuth_4_1}}</td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->instalation_date_4}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Antena Principal</th>
                        <th class="border_table" colspan="10">Antena Diversidad</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_height_4_1}}</td>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_height_4_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_diameter_4_1}}</td>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_diameter_4_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_model_4_1}}</td>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_model_4_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_brand_4_1}}</td>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_brand_4_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_serial_4_1}}</td>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_serial_4_1_2}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Polaridad Veritical</th>
                        <th class="border_table" colspan="10">Polaridad Veritical</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_tx_4_1_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_tx_4_1_2_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_rx_4_1_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_rx_4_1_2_1}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Polaridad Horizontal</th>
                        <th class="border_table" colspan="10">Polaridad Horizontal</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_tx_4_1_2}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_tx_4_1_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_rx_4_1_2}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_rx_4_1_2_2}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div class="margin_XPIC_SD border_table">
            <div class="markeup_XPIC_SD border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="id_local text-center">{{$id->MakeupMw_1_4->id_remote_4}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_4->ip_remote_4}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_4->station_remote_4}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_4->station_local_4}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="14"></td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Frecuencia Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->remote_frecuency_4}}</td>
                        <td class="border_table-1" colspan="6">Marca de Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->equipment_brand_4}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Frecuencia Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->local_frecuency_4}}</td>
                        <td class="border_table-1" colspan="6">Modelo Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->equipment_model_4}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->azimuth_4_1}}</td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->instalation_date_4}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Antena Principal</th>
                        <th class="border_table" colspan="10">Antena Diversidad</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_height_4_2}}</td>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_height_4_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_diameter_4_2}}</td>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_diameter_4_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_model_4_2}}</td>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_model_4_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_brand_4_2}}</td>
                        <td class="border_table-1" colspan="6">Marca Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_brand_4_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_serial_4_2}}</td>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->antenna_serial_4_2_2}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Polaridad Veritical</th>
                        <th class="border_table" colspan="10">Polaridad Veritical</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_tx_4_2_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_tx_4_2_2_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_rx_4_2_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_rx_4_2_2_1}}</td>
                    </tr>
                    <tr>
                        <th class="border_table" colspan="10">Polaridad Horizontal</th>
                        <th class="border_table" colspan="10">Polaridad Horizontal</th>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_tx_4_2_2}}</td>
                        <td class="border_table-1" colspan="6">Nivel Tx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_tx_4_2_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_rx_4_2_2}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_4->level_rx_4_2_2_2}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    @endif
    <div style="page-break-after:always;"></div>
    @if ($id->MakeupMw_1_5->state)
    <section>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>ENLACE CONFIGURACIÓN N+1 XPIC</h4>
                </div>
                Aplica para instalaciones con configuración N+1 XPIC.
            </div>
        </div>
        <div class="margin_N_XPIC border_table">
            <div class="markeup_N_XPIC border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="text-center id_local">{{$id->MakeupMw_1_5->id_local_5}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_5->ip_local_5}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_5->station_local_5}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_5->station_remota_5}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="4"></td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->instalation_date_5}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_heigth_5_1}}</td>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_serial_5_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_diameter_5_1}}</td>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->azimuth_5_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_model_5_1}}</td>
                        <td class="border_table-1" colspan="6">Marca Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->equipment_brand_5}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->equipment_brand_5}}</td>
                        <td class="border_table-1" colspan="6">Marca Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->equipment_model_5}}</td>
                    </tr>
                    <tbody class="border_table">
                        <tr>
                            <td class="border_table-1" colspan="6">Frecuencia Tx 1</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->frecuency_5_1_1}}</td>
                            <td class="border_table-1" colspan="6">Frecuencia Rx 1</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->frecuency_rx_5_1_1}}</td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Frecuencia Tx 2</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->frecuency_5_1_2}}</td>
                            <td class="border_table-1" colspan="6">Frecuencia Rx 2</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->frecuency_rx_5_1_2}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx 1</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_5_1_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx 1</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_rx_5_1_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx 2</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_5_1_2}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx 2</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_rx_5_1_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx 3</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_5_1_3}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx 3</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_rx_5_1_3}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx Stand By</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_5_1_4}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx Stand By</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_rx_5_1_4}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="margin_N_XPIC border_table">
            <div class="markeup_N_XPIC border_table">
                <table class="table_markeup">
                    <tbody class="border_table">
                        <tr>
                            <td class="text-center" rowspan="4" colspan="5"><img src="{{ asset('img/logo.png') }}" alt="logo" class="logo_energitelco"></td>
                            <td colspan="11"></td>
                            <td class="text-center" rowspan="4" colspan="4"><img src="{{ asset('img/claro.png') }}" alt="claro" class="logo_claro"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">ID Local:</th>
                            <th colspan="7" class="text-center id_local">{{$id->MakeupMw_1_5->id_remote_5}}</th>
                        </tr>
                        <tr>
                            <td></td>
                            <th colspan="3">IP Local:</th>
                            <td colspan="7" class="text-center">{{$id->MakeupMw_1_5->ip_remote_5}}</td>
                        </tr>
                        <tr>
                            <td colspan="11"></td>
                        </tr>
                    </tbody>
                    <tbody class="border_table text-center">
                        <tr>
                            <th class="border_table-1" rowspan="2" colspan="4">Enlace</th>
                            <th class="border_table-1" colspan="8">Local</th>
                            <th class="border_table-1" colspan="8">Remoto</th>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_5->station_remota_5}}</td>
                            <td class="border_table-1" colspan="8">{{$id->MakeupMw_1_5->station_local_5}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Configuración</td>
                        <td class="border_table-1" colspan="4"></td>
                        <td class="border_table-1 bg-gray" colspan="6">Fecha Finalización</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->instalation_date_5}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Altura antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_heigth_5_2}}</td>
                        <td class="border_table-1" colspan="6">Serial Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_serial_5_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Diámetro Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_diameter_5_2}}</td>
                        <td class="border_table-1" colspan="6">Azimut</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->azimuth_5_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Modelo Antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_model_5_2}}</td>
                        <td class="border_table-1" colspan="6">Marca Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->equipment_brand_5}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Marca antena</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->antenna_brand_5_2}}</td>
                        <td class="border_table-1" colspan="6">Marca Equipo</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->equipment_model_5}}</td>
                    </tr>
                    <tbody class="border_table">
                        <tr>
                            <td class="border_table-1" colspan="6">Frecuencia Tx 1</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->frecuency_5_2_1}}</td>
                            <td class="border_table-1" colspan="6">Frecuencia Rx 1</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->frecuency_rx_5_2_1}}</td>
                        </tr>
                        <tr>
                            <td class="border_table-1" colspan="6">Frecuencia Tx 2</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->frecuency_5_2_2}}</td>
                            <td class="border_table-1" colspan="6">Frecuencia Rx 2</td>
                            <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->frecuency_rx_5_2_2}}</td>
                        </tr>
                    </tbody>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx 1</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_5_2_1}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx 1</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_rx_5_2_1}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx 2</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_5_2_2}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx 2</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_rx_5_2_2}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx 3</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_5_2_3}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx 3</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_rx_5_2_3}}</td>
                    </tr>
                    <tr>
                        <td class="border_table-1" colspan="6">Nivel Tx Stand By</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_5_2_4}}</td>
                        <td class="border_table-1" colspan="6">Nivel Rx Stand By</td>
                        <td class="border_table-1 text-center" colspan="4">{{$id->MakeupMw_1_5->level_rx_5_2_4}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    @endif
    <div style="page-break-after:always;"></div>
    <section>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>PLANEACIÓN DE MARQUILLAS IDU E.B 1</h4>
                </div>
            </div>
        </div>
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_1->main_position_10.' PDB: '.$id->MakeupMw_2_1->pdb_10_1])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_1->main_position_10.' PDB: '.$id->MakeupMw_2_1->pdb_10_1])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_1->main_position_10.' PDB: '.$id->MakeupMw_2_1->pdb_10_1.' (-48 VDC)'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_1->main_position_10.' PDB: '.$id->MakeupMw_2_1->pdb_10_1.' (-48 VDC)'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_1->main_position_10_2.' PDB: '.$id->MakeupMw_2_1->pdb_10_1.' (+0)'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_1->main_position_10_2.' PDB: '.$id->MakeupMw_2_1->pdb_10_1.' (+0)'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'DDF', 'values' => 'GND'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'DDF', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'GND'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'HILO DE DRENAJE POSICIÓN: '.$id->MakeupMw_2_1->main_position_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU MAIN', 'values' => 'HILO DE DRENAJE POSICIÓN: '.$id->MakeupMw_2_1->main_position_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# '.$id->MakeupMw_2_1->e1_10_3.' TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# '.$id->MakeupMw_2_1->e1_10_3.' TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# 1-8 TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# 1-8 TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# 1-8 TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# 1-8 TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        <div style="page-break-after:always;"></div>
        <br>
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_1->stand_by_10_1.' PDB: '.$id->MakeupMw_2_1->pdb_10_1])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_1->stand_by_10_1.' PDB: '.$id->MakeupMw_2_1->pdb_10_1])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_1->stand_by_10_1.' PDB: '.$id->MakeupMw_2_1->pdb_10_1.' (-48 VDC)'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_1->stand_by_10_1.' PDB: '.$id->MakeupMw_2_1->pdb_10_1.' (-48 VDC)'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_1->stand_by_10_1_2.' PDB: '.$id->MakeupMw_2_1->pdb_10_1.' (+0)'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_1->stand_by_10_1_2.' PDB: '.$id->MakeupMw_2_1->pdb_10_1.' (+0)'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'DDF', 'values' => 'GND'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'DDF', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'GND'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'HILO DE DRENAJE POSICIÓN: '.$id->MakeupMw_2_1->stand_by_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'IDU STAND BY', 'values' => 'HILO DE DRENAJE POSICIÓN: '.$id->MakeupMw_2_1->stand_by_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# '.$id->MakeupMw_2_1->e1_10_3.' TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# '.$id->MakeupMw_2_1->e1_10_3.' TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# 9-16 TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# 9-16 TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# 9-16 TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_1->equipment_brand_10.' - '.$id->MakeupMw_2_1->equipment_model_10, 'dir' => 'Dir.'.$id->MakeupMw_2_1->station_remote_10, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_1->card_10_4.' Slot '.$id->MakeupMw_2_1->slot_10_4.' Pto '.$id->MakeupMw_2_1->ddf_10_4.' Destino '.$id->MakeupMw_2_1->destination_equipment_10_4.' DIR '.$id->MakeupMw_2_1->remote_connection_10_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_1->card_10_3.' Slot '.$id->MakeupMw_2_1->slot_10_3.' Pto'.$id->MakeupMw_2_1->ddf_10_3.' E1# 9-16 TxRx '.$id->MakeupMw_2_1->txrx_10_3])
        <div style="page-break-after:always;"></div>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>PLANEACIÓN DE MARQUILLAS IDU E.B 2</h4>
                </div>
            </div>
        </div>
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_2->main_position_11.' PDB: '.$id->MakeupMw_2_2->pdb_11_1])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_2->main_position_11.' PDB: '.$id->MakeupMw_2_2->pdb_11_1])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_2->main_position_11.' PDB: '.$id->MakeupMw_2_2->pdb_11_1.' (-48 VDC)'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_2->main_position_11.' PDB: '.$id->MakeupMw_2_2->pdb_11_1.' (-48 VDC)'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_2->main_position_11_2.' PDB: '.$id->MakeupMw_2_2->pdb_11_1.' (+0)'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'Posición: '.$id->MakeupMw_2_2->main_position_11_2.' PDB: '.$id->MakeupMw_2_2->pdb_11_1.' (+0)'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'DDF', 'values' => 'GND'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'DDF', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'GND'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'HILO DE DRENAJE POSICIÓN: '.$id->MakeupMw_2_2->main_position_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU MAIN', 'values' => 'HILO DE DRENAJE POSICIÓN: '.$id->MakeupMw_2_2->main_position_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# '.$id->MakeupMw_2_2->e1_11_3.' TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# '.$id->MakeupMw_2_2->e1_11_3.' TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# 1-8 TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# 1-8 TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# 1-8 TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# 1-8 TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        <div style="page-break-after:always;"></div>
        <br>
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_2->stand_by_11_1.' PDB: '.$id->MakeupMw_2_2->pdb_11_1])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_2->stand_by_11_1.' PDB: '.$id->MakeupMw_2_2->pdb_11_1])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_2->stand_by_11_1.' PDB: '.$id->MakeupMw_2_2->pdb_11_1.' (-48 VDC)'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_2->stand_by_11_1.' PDB: '.$id->MakeupMw_2_2->pdb_11_1.' (-48 VDC)'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_2->stand_by_11_1_2.' PDB: '.$id->MakeupMw_2_2->pdb_11_1.' (+0)'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'Posición: '.$id->MakeupMw_2_2->stand_by_11_1_2.' PDB: '.$id->MakeupMw_2_2->pdb_11_1.' (+0)'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'DDF', 'values' => 'GND'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'DDF', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'GND'])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'GND'])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'HILO DE DRENAJE POSICIÓN: '.$id->MakeupMw_2_2->stand_by_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'IDU STAND BY', 'values' => 'HILO DE DRENAJE POSICIÓN: '.$id->MakeupMw_2_2->stand_by_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# '.$id->MakeupMw_2_2->e1_11_3.' TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# '.$id->MakeupMw_2_2->e1_11_3.' TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# 9-16 TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# 9-16 TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        <br>
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# 9-16 TxRx '.$id->MakeupMw_2_2->txrx_11_3])
        @include('pdf.includes.mackeup_mw_idu_eb',['name' => $id->MakeupMw_2_2->equipment_brand_11.' - '.$id->MakeupMw_2_2->equipment_model_11, 'dir' => 'Dir.'.$id->MakeupMw_2_2->station_remote_11, 'info' => 'Origen tajeta: '.$id->MakeupMw_2_2->card_11_4.' Slot '.$id->MakeupMw_2_2->slot_11_4.' Pto '.$id->MakeupMw_2_2->ddf_11_4.' Destino '.$id->MakeupMw_2_2->destination_equipment_11_4.' DIR '.$id->MakeupMw_2_2->remote_connection_11_4, 'values' => 'Tarjeta: '.$id->MakeupMw_2_2->card_11_3.' Slot '.$id->MakeupMw_2_2->slot_11_3.' Pto'.$id->MakeupMw_2_2->ddf_11_3.' E1# 9-16 TxRx '.$id->MakeupMw_2_2->txrx_11_3])
    </section>
    <div style="page-break-after:always;"></div>
    <section>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>PLANEACIÓN DE MARQUILLAS OUTDOOR E.B 1</h4>
                </div>
            </div>
        </div>
        <div class="markeup_OUTDOOR_E_B text-center">
            <table class="table_markeup_OUTDOOR_E_B">
                <tr>
                    <th class="f18">ENERGITELCO</th>
                    <th class="f18">CLARO</th>
                </tr>
                <tr>
                    <th class="f14" colspan="2">DIR: {{$id->MakeupMw_3->station_20_2}}<th>
                </tr>
                <tr>
                    <td class="f14" colspan="2">{{$id->MakeupMw_3->radio_model_20}}</td>
                </tr>
                <tr>
                    <td class="f14">BANDA: {{$id->MakeupMw_3->band_20}} Ghz</td>
                    <td class="f14">AZIMUTH: {{$id->MakeupMw_3->azimuth_20_1}}</td>
                </tr>
                <tr>
                    <td colspan="2">POLARIDAD: {{$id->MakeupMw_3->polarity_20}}</td>
                </tr>
            </table>
        </div>
        <br>
        @for ($i = 0; $i < $id->MakeupMw_3->amount_20_1_1; $i++)
            <div class="markeup_OUTDOOR_E_B_mini text-center">
                <table class="table_mini_markeup_OUTDOOR_E_B">
                    <tr>
                        <th>ENERGITELCO</th>
                        <th>CLARO</th>
                    </tr>
                    <tr>
                        <th colspan="2">{{$id->MakeupMw_3->radio_model_20}}<th>
                    </tr>
                    <tr>
                        <th colspan="2">DIR: {{$id->MakeupMw_3->station_20_2}}</th>
                    </tr>
                    <tr>
                        <th colspan="2">IF MAIN</th>
                    </tr>
                </table>
            </div>
        @endfor
        <br>
        @for ($i = 0; $i < $id->MakeupMw_3->amount_20_1_2; $i++)
        <div class="markeup_OUTDOOR_E_B_mini text-center">
            <table class="table_mini_markeup_OUTDOOR_E_B">
                <tr>
                    <th>ENERGITELCO</th>
                    <th>CLARO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="2">{{$id->MakeupMw_3->radio_model_20}}<th>
                </tr>
                <tr>
                    <th colspan="2">DIR: {{$id->MakeupMw_3->station_20_2}}</th>
                </tr>
                <tr>
                    <th colspan="2">IF STAND BY</th>
                </tr>
            </table>
        </div>
        @endfor
        <br>
        @for ($i = 0; $i < $id->MakeupMw_3->amount_20_1_3; $i++)
        <div class="markeup_OUTDOOR_E_B_mini text-center">
            <table class="table_mini_markeup_OUTDOOR_E_B">
                <tr>
                    <th>ENERGITELCO</th>
                    <th>CLARO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="2">{{ $id->MakeupMw_3->radio_model_20 }}<th>
                </tr>
                <tr>
                    <th colspan="2">DIR: {{$id->MakeupMw_3->station_20_2}}</th>
                </tr>
                <tr>
                    <th colspan="2">ODU MAIN - GND</th>
                </tr>
            </table>
        </div>
        @endfor
        <br>
        @for ($i = 0; $i < $id->MakeupMw_3->amount_20_1_4; $i++)
        <div class="markeup_OUTDOOR_E_B_mini text-center">
            <table class="table_mini_markeup_OUTDOOR_E_B">
                <tr>
                    <th>ENERGITELCO</th>
                    <th>CLARO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="2">{{ $id->MakeupMw_3->radio_model_20 }}<th>
                </tr>
                <tr>
                    <th colspan="2">DIR: {{$id->MakeupMw_3->station_20_2}}</th>
                </tr>
                <tr>
                    <th colspan="2">ODU STAND BY - GND</th>
                </tr>
            </table>
        </div>
        @endfor
        <div style="page-break-after:always;"></div>
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h4>PLANEACIÓN DE MARQUILLAS OUTDOOR E.B 2</h4>
                </div>
            </div>
        </div>
        <div class="markeup_OUTDOOR_E_B text-center">
            <table class="table_markeup_OUTDOOR_E_B">
                <tr>
                    <th class="f18">ENERGITELCO</th>
                    <th class="f18">CLARO</th>
                </tr>
                <tr>
                    <th class="f14" colspan="2">DIR: {{$id->MakeupMw_3->station_20_1}}<th>
                </tr>
                <tr>
                    <td class="f14" colspan="2">{{$id->MakeupMw_3->radio_model_20}}</td>
                </tr>
                <tr>
                    <td class="f14">BANDA: {{$id->MakeupMw_3->band_20}} Ghz</td>
                    <td class="f14">AZIMUTH: {{$id->MakeupMw_3->azimuth_20_2}}</td>
                </tr>
                <tr>
                    <td class="f14" colspan="2">POLARIDAD: {{$id->MakeupMw_3->polarity_20}}</td>
                </tr>
            </table>
        </div>
        <br>
        @for ($i = 0; $i < $id->MakeupMw_3->amount_20_2_1; $i++)
            <div class="markeup_OUTDOOR_E_B_mini text-center">
                <table class="table_mini_markeup_OUTDOOR_E_B">
                    <tr>
                        <th>ENERGITELCO</th>
                        <th>CLARO</th>
                    </tr>
                    <tr>
                        <th colspan="2">{{$id->MakeupMw_3->radio_model_20}}<th>
                    </tr>
                    <tr>
                        <th colspan="2">DIR: {{$id->MakeupMw_3->station_20_1}}</th>
                    </tr>
                    <tr>
                        <th colspan="2">IF MAIN</th>
                    </tr>
                </table>
            </div>
        @endfor
        <br>
        @for ($i = 0; $i < $id->MakeupMw_3->amount_20_2_2; $i++)
        <div class="markeup_OUTDOOR_E_B_mini text-center">
            <table class="table_mini_markeup_OUTDOOR_E_B">
                <tr>
                    <th>ENERGITELCO</th>
                    <th>CLARO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="2">{{$id->MakeupMw_3->radio_model_20}}<th>
                </tr>
                <tr>
                    <th colspan="2">DIR: {{$id->MakeupMw_3->station_20_1}}</th>
                </tr>
                <tr>
                    <th colspan="2">IF STAND BY</th>
                </tr>
            </table>
        </div>
        @endfor
        <br>
        @for ($i = 0; $i < $id->MakeupMw_3->amount_20_2_3; $i++)
        <div class="markeup_OUTDOOR_E_B_mini text-center">
            <table class="table_mini_markeup_OUTDOOR_E_B">
                <tr>
                    <th>ENERGITELCO</th>
                    <th>CLARO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="2">{{ $id->MakeupMw_3->radio_model_20 }}<th>
                </tr>
                <tr>
                    <th colspan="2">DIR: {{$id->MakeupMw_3->station_20_1}}</th>
                </tr>
                <tr>
                    <th colspan="2">ODU MAIN - GND</th>
                </tr>
            </table>
        </div>
        @endfor
        <br>
        @for ($i = 0; $i < $id->MakeupMw_3->amount_20_2_4; $i++)
        <div class="markeup_OUTDOOR_E_B_mini text-center">
            <table class="table_mini_markeup_OUTDOOR_E_B">
                <tr>
                    <th>ENERGITELCO</th>
                    <th>CLARO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="2">{{ $id->MakeupMw_3->radio_model_20 }}<th>
                </tr>
                <tr>
                    <th colspan="2">DIR: {{$id->MakeupMw_3->station_20_1}}</th>
                </tr>
                <tr>
                    <th colspan="2">ODU STAND BY - GND</th>
                </tr>
            </table>
        </div>
        @endfor
    </section>
    </main>
    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    </footer>
</body>
</html>