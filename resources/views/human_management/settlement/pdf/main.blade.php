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
        <div class="text-center"><h3>Comprobante de pago de liquidación por prestación de servicios</h3></div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $id->user->name }}</td>
                    <th>Cédula:</th>
                    <td>{{ $id->user->cedula }}</td>
                    <th>Básico:</th>
                    <td>$ {{ number_format($id->salary,2,',','.') }}</td>
                </tr>
                <tr>
                    <th>Fecha de ingreso:</th>
                    <td>{{$id->date_start}}</td>
                    <th>Fecha de retiro:</th>
                    <td>{{$id->date_end}}</td>
                    <th>Cuenta:</th>
                    <td>{{ $id->user->register ? $id->user->register->bank_account : '' }}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>/</th>
                     @foreach ($id->years as $item)
                        <td>{{$item->years}}</td>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Días vinculados</th>
                     @foreach ($id->years as $item)
                        <td>{{$item->days_linked}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Días en licencia</th>
                     @foreach ($id->years as $item)
                        <td>{{$item->days_leave}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Número de días a liquidar</th>
                     @foreach ($id->years as $item)
                        <td>{{$item->days_to_settle}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Total días por vacaciones</th>
                    <th>Días de vacaciones</th>
                    <th>Días disfrutados en vacaciones</th>
                    <th>Total de días de vacaciones a pagar</th>
                    <th>Días que faltan de pago prima</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$id->days_linked_vacation}}</td>
                    <td>{{$id->vacation_days_to_pay}}</td>
                    <td>{{$id->vacation}}</td>
                    <td>{{$id->total_vacation_days_to_pay}}</td>
                    <td>{{$id->premium_payment_days}}</td>
                </tr>
            </tbody>
        </table>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>/</th>
                    <th>VALOR SALARIAL</th>
                    <th>VALOR HORAS EXTRAS</th>
                    <th>AUXILIO DE TRANSPORTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Total devengado</th>
                    <td>${{number_format($id->total_devengado_salary,2,',','.')}}</td>
                    <td>${{number_format($id->total_devengado_extras,2,',','.')}}</td>
                    <td>${{number_format($id->total_devengado_assistance,2,',','.')}}</td>
                </tr>
                <tr>
                    <th>Promedio devengado</th>
                    <td>${{number_format($id->average_salary,2,',','.')}}</td>
                    <td>${{number_format($id->average_extras,2,',','.')}}</td>
                    <td>${{number_format($id->average_assistance,2,',','.')}}</td>
                </tr>
                <tr>
                    <th>Total últimos 6 meses</th>
                    <td>${{number_format($id->average_last_month_salary,2,',','.')}}</td>
                    <td>${{number_format($id->average_last_month_extras,2,',','.')}}</td>
                    <td>${{number_format($id->average_last_month_assistance,2,',','.')}}</td>
                </tr>
                <tr>
                    <th>Promedio últimos 6 meses</th>
                    <td>${{number_format($id->average_premium_salary,2,',','.')}}</td>
                    <td>${{number_format($id->average_premium_extras,2,',','.')}}</td>
                    <td>${{number_format($id->average_premium_assistance,2,',','.')}}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="table table-bordered">
            <tr>
                <th>Liquidación de cesantías</th>
                <td>${{number_format($id->total_linkend,2,',','.')}}</td>
                <th>Pago de intereses de cesantías</th>
                <td>${{number_format($id->intereses,2,',','.')}}</td>
            </tr>
            <tr>
                <th>Liquidación por prima</th>
                <td>${{number_format($id->total_premium,2,',','.')}}</td>
                <th>Pago de vacaciones</th>
                <td>${{number_format($id->total_vacation,2,',','.')}}</td>
            </tr>
            <tr>
                <th>Salario pendiente</th>
                <td>${{number_format($id->this_salary,2,',','.')}}</td>
                <th>Pago de indemnización</th>
                <td>${{number_format($id->compensation,2,',','.')}}</td>
            </tr>
            <tr>
                <th>Deudas con la compañía</th>
                <td>${{number_format($id->debt,2,',','.')}}</td>
                <th>Total a pagar por liquidación</th>
                <td><h3 class="p-0 m-0">${{number_format($id->total_settlement,2,',','.')}}</h3></td>
            </tr>
        </table>
</main>
        
<footer>
    <br>
    <p class="text-muted" style="color: rgb(0,176,80) !important;">ENERGITELCO S.A.S AGRADECE TODO SU APORTE LABORAL, DURANTE EL TIEMPO QUE LABORO CON NOSOTROS.</p>
    <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    {{-- 2059397 --}}
</footer>
</body>
</html>