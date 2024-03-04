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
        .info_user p, header p, footer p {
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
                <p><b><i>LTD NIT 900.082.621-1</i></b></p>
            </div>
            <div class="text-right">
                <img src="{{ asset('img/MUST.png') }}" />
            </div>
        </div>
    </header>
    <main class="text-justify">
        <div class="mini-container">
            <div class="col-auto p-5">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <br>
                                <br><br>
                                <div class="card-title text-center" >
                                    <h3><b><i>COTIZACIÓN SISTEMA SOLAR CON ENERGITELCO Y MUST</i></b></h3>
                                </div>

                                <div class="card-body">
                                    <hr>
                                <br>
                                    <div class="text-center">
                                        <h3><b>COTIZANTE</b></h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-center">NOMBRE</th>
                                                    <TH class="text-center">CORREO</TH>
                                                    <th class="text-center">TELÉFONO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td>{{$id->name}}</td>
                                                    <td>{{$id->email}}</td>
                                                    <td>{{$id->telefono}}</td>
                                                </tr>
                                            </tbody>
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-center">CANTIDAD KV/MES</th>
                                                    <TH class="text-center">VALOR KV</TH>
                                                    <th class="text-center">TOTAL DE CONSUMO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td>{{$id->cantidadKV}}</td>
                                                    <td>COP ${{number_format($id->ValorKV,2)}}</td>
                                                    <td>COP ${{number_format($id->TotalConsumo,2)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-center">EQUIPO</th>
                                                    <TH class="text-center">MODELO</TH>
                                                    <th class="text-center">CANTIDAD</th>
                                                    <th class="text-center">VALOR UNI</th>
                                                    <th class="text-center">VALOR TOTAL</th>
                                                    <th class="text-center">GARANTÍA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <td>Paneles solares</td>
                                                    <td>{{ $id->ModelPanel }}</td>
                                                    <td id="Paneles">{{$id->CantidadPanel}}</td>
                                                    <td id="ValorPanel">COP ${{number_format($id->ValorPanel,2)}}</td>
                                                    <td id="ValorTotalPanel">COP ${{number_format($id->ValorTotalPanel,2)}}</td>
                                                    <td>{{ $id->GarantiaPanel }} Años</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>Reguladores</td>
                                                    <td>{{ $id->ModelRegulador }}</td>
                                                    <td id="Reguladores">{{$id->CantidadRegulador}}</td>
                                                    <td id="ValorRegulador">COP ${{number_format($id->ValorRegulador,2)}}</td>
                                                    <td id="ValorTotalRegulador">COP ${{number_format($id->ValorTotalRegulador,2)}}</td>
                                                    <td>{{ $id->GarantiaRegulador }} Años</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>Baterías</td>
                                                    <td>{{ $id->ModelBateria }}</td>
                                                    <td id="Baterias">{{$id->CantidadBateria}}</td>
                                                    <td id="ValorBateria">COP ${{number_format($id->ValorBateria,2)}}</td>
                                                    <td id="ValorTotalBateria">COP ${{number_format($id->ValorTotalBateria,2)}}</td>
                                                    <td>{{ $id->GarantiaBateria }} Años</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>Inversores</td>
                                                    <td>{{ $id->ModelInversor }}</td>
                                                    <td id="Inversores">{{$id->CantidadInversor}}</td>
                                                    <td id="ValorInversor">COP ${{number_format($id->ValorInversor,2)}}</td>
                                                    <td id="ValorTotalInversor">COP ${{number_format( $id->ValorTotalInversor, 2)}}</td>
                                                    <td>{{ $id->GarantiaInversor }} Años</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h5><b>Nota: </b>El valor de la instalación y de los consumibles son repectivamente del 10% y 5%  del valor total de los equipos, estos valores se reflejarán en el valor del sistema.</h5>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <h5><b>RECIBIRÁS UNA OFERTA ESPECIAL</b></h5>
                                        <h4><b>EL COSTO TOTAL DE TU SISTEMA SOLAR ES DE:</b></h4>
                                        <b><h4 id="totalSistema">COP ${{number_format($id->ValorTotalSistema,2)}}</h4></b>
                                    </div>
                                    <hr>
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <h5>EL TIEMPO ESTIMADO PARA QUE RECUPERES TU INVERSIÓN ES DE:</h5>
                                            <h6 id="Salva">{{$id->Salva}}</h6>
                                            <h5><b>RECUERDA QUE NUESTROS SISTEMAS SOLARES TE GARANTIZAN UNA VIDA ÚTIL DE MÁS DE 25 AÑOS</b></h5>
                                            <h5><B>IMPORTANTE:</B>Las empresas que inviertan en sistemas solares pueden deducir el 50% del costo de la inversión de sus impuestos de renta durante los primeros 5 años.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    </footer>
</body>
</html>
