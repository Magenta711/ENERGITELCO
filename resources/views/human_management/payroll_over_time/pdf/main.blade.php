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
            opacity: 1;
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
                <p><b><i>ENERGIA PARA TELECOMUNICACIONES</i></b></p>
                <p><b><i>LTD NIT 900.082.621-1</i></b></p>
            </div>
            <div class="text-right">
                <img src="{{ asset('img/iso9001.jpg') }}" />
            </div>
        </div>
    </header>
    <main>
        <div class="text-center"><h3>Comprobante de pago</h3></div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $data->user->name }}</td>
                    <th>Cédula:</th>
                    <td>{{ $data->user->cedula }}</td>
                    <th>Básico:</th>
                    <td>$ {{ number_format($data->salary,2,',','.') }}</td>
                </tr>
                <tr>
                    <th>Fecha:</th>
                    <td>{{ $data->work->date }}</td>
                    <th>Periodo:</th>
                    <td>{{ $data->work->start_date }} a {{ $data->work->end_date }}</td>
                    <th>Cuenta:</th>
                    <td>{{ $data->user->register ? $data->user->register->bank_account : '' }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2">Concepto</th>
                    <th>Unidades</th>
                    <th>Valores</th>
                    <th colspan="2">Deducciones</th>
                    <th>Unidades</th>
                    <th>Valores</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>BÁSICO</td>
                        <td>100% Jornada laboral normal</td>
                        <td>{{ $data->working_days }}</td>
                        <td>
                            $ {{ number_format(($data->total_devengado_tx - $data->extras_sc_tx - $data->surcharge_n_tx - $data->extras_d_tx - $data->extras_dc_tx - $data->extras_n_tx - $data->extras_s_tx - $data->holyday_n_tx - $data->extras_hn_tx - $data->unpaid_leave_tx - $data->disabilities_1_tx - $data->disabilities_2_tx),2,',','.') }}
                        </td>
                        <td>SALUD</td>
                        <td>Salud (4%)</td>
                        <td>{{ $data->working_days }}</td>
                        <td>$ {{ number_format($data->health_tx,2,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>AUXILIO</td>
                        <td>Subsidio de transporte</td>
                        <td>{{ $data->working_days }}</td>
                        <td>
                            $ {{ number_format(($data->assistance_tx),2,',','.') }}
                        </td>
                        <td>PENSION</td>
                        <td>Pensión (4%)</td>
                        <td>{{ $data->working_days }}</td>
                        <td>$ {{ number_format($data->pension_tx,2,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>75%</td>
                        <td>Extra Dom. o Fest. Diurnos Compensado</td>
                        <td>{{ $data->extras_sc }}</td>
                        <td>
                            $ {{ number_format(($data->extras_sc_tx),2,',','.') }}
                        </td>
                        <td colspan="2">Descuentos</td>
                        <td></td>
                        <td>$ {{ number_format($data->discounts_tx,2,',','.') }}</td>
                    </tr>
                    {{-- <tr>
                        <td>135%</td>
                        <td>RECARGO NOCTURNO ORDINARIO</td>
                        <td>{{ $data->surcharge_n }}</td>
                        <td>
                            $ {{ number_format(($data->surcharge_n_tx),2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}
                    <tr>
                        <td>125%</td>
                        <td>Extras Diurnas</td>
                        <td>{{ $data->extras_d }}</td>
                        <td>
                            $ {{ number_format(($data->extras_d_tx),2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>25%</td>
                        <td>Extras Diurnas Compensadas</td>
                        <td>{{ $data->extras_dc }}</td>
                        <td>
                            $ {{ number_format(($data->extras_dc_tx),2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>175%</td>
                        <td>Extras Nocturnas</td>
                        <td>{{ $data->extras_n }}</td>
                        <td>
                            $ {{ number_format(($data->extras_n_tx),2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>175%</td>
                        <td>Extra Dom.  o Fest. Diurnos</td>
                        <td>{{ $data->extras_s }}</td>
                        <td>
                            $ {{ number_format(($data->extras_s_tx),2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- <tr>
                        <td>210%</td>
                        <td>FESTIVOS NOCTURNOS</td>
                        <td>{{ $data->holyday_n }}</td>
                        <td>
                            $ {{ number_format(($data->holyday_n_tx),2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}
                    <tr>
                        <td>250%</td>
                        <td>Extras Festivas Nocturnas</td>
                        <td>{{ $data->extras_hn }}</td>
                        <td>
                            $ {{ number_format(($data->extras_hn_tx),2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>0%</td>
                        <td>Licencia no remunerada</td>
                        <td>{{ $data->extras_hn }}</td>
                        <td>
                           $ {{ number_format($data->unpaid_leave_tx,2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>100%</td>
                        <td>Incapacidades ARL</td>
                        <td>{{ $data->extras_hn }}</td>
                        <td>
                           $ {{ number_format($data->disabilities_1_tx,2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>67%</td>
                        <td>Incapacidades EPS <small>(67%)</small></td>
                        <td>{{ $data->extras_hn }}</td>
                        <td>
                           $ {{ number_format($data->disabilities_2_tx,2,',','.') }}
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tr>
                <th colspan="6" style="text-align: center">Totales</th>
            </tr>
            <tr>
                <th>Devengos</th>
                <td>$ {{ number_format(($data->total_devengado_tx + $data->assistance_tx),2,',','.') }}</td>
                <th>Deducciones</th>
                <td>$ {{ number_format(($data->health_tx + $data->pension_tx + $data->discounts_tx),2,',','.') }}</td>
                <th>Neto a pagar</th>
                <td>$ {{ number_format($data->total_pay,2,',','.') }}</td>
            </tr>
        </table>
</main>
        
<footer>
    <br>
    <p class="text-muted" style="color: rgb(0,176,80) !important;">Practica la cultura del AHORRO…                 Gracias por tu cooperación en este mes.</p>
    <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    {{-- 2059397 --}}
</footer>
</body>
</html>