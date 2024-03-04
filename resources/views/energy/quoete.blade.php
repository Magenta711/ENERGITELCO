<div class="mini-container">
    <div class="col-auto p-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card" style=" box-shadow: 1px 1px 10px 10px rgba(0, 0, 0, 0.1);">
                        <div class="card-title text-center" >
                            <h3><b><i>ESTE ES EL PRIMER PASO PARA QUE CUMPLES TU META ENERGÉTICA</i></b></h3>
                        </div>
                        <hr>
                        <div class="card-body">
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
                                            <td id="Paneles"></td>
                                            <td id="ValorPanelTxt"></td>
                                            <td id="ValorTotalPanelTxt"></td>
                                            <td>{{ $id->GarantiaPanel }} Años</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>Reguladores</td>
                                            <td>{{ $id->ModelRegulador }}</td>
                                            <td id="Reguladores"></td>
                                            <td id="ValorReguladorTxt"></td>
                                            <td id="ValorTotalReguladorTxt"></td>
                                            <td>{{ $id->GarantiaRegulador }} Años</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>Baterías</td>

                                            <td>{{ $id->ModelBateria }}</td>
                                            <td id="Baterias"></td>
                                            <td id="ValorBateriaTxt"></td>
                                            <td id="ValorTotalBateriaTxt"></td>
                                            <td>{{ $id->GarantiaBateria }} Años</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>Inversores</td>
                                            <td>{{ $id->ModelInversor }}</td>
                                            <td id="Inversores"></td>
                                            <td id="ValorInversorTxt"></td>
                                            <td id="ValorTotalInversorTxt"></td>
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
                                <b><h4 id="totalSistema"></h4></b>
                            </div>
                            <hr>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <h5>EL TIEMPO ESTIMADO PARA QUE RECUPERES TU INVERSIÓN ES DE:</h5>
                                    <p id="SalvaTxt"></p>
                                    <h5><b>RECUERDA QUE NUESTROS SISTEMAS SOLARES TE GARANTIZAN UNA VIDA ÚTIL DE MÁS DE 25 AÑOS</b></h5>
                                    <h5><B>IMPORTANTE:</B>Las empresas que inviertan en sistemas solares pueden deducir el 50% del costo de la inversión de sus impuestos de renta durante los primeros 5 años.
                                    </h5>
                                </div>
                                <div class="col-md-12">
                                    <h5>Te enviaremos un correo con esta cotización</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <label for="Visit" class="text-center">¿Deseas que nos pongamos en contacto para agendar una cita para que hagamos una verdadera cotización?</label>
                                        <input type="checkbox" name="" class="form-control" id="VisitCheck" value="Visit">
                                        <p id="VisitTxt"></p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="btn-enviar" class="form-control justify-content-center btn-success">TERMINAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
