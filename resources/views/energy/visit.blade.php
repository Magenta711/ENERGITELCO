<div class="visit-container">
    <div class="col-auto p-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card" style=" box-shadow: 1px 1px 10px 10px rgba(0, 0, 0, 0.1);">
                        <div class="card-title text-center" >
                            <h3><b><i>AGENDAR CITA DE COTIZACIÓN</i></b></h3>
                        </div>
                        <hr>
                        <div class="card-body">
                            <form action="{{route('quote_visit')}}" method="post" id="form-main" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <h4><b>PUEDES SOLICITAR UNA CITA DE RECONOCIMIENTO PARA QUE NUESTRO EQUIPO DE EXPERTOS TE VISITE</b></h4>
                            </div>
                            <hr>
                            <div class="row text-center">
                                {{-- <h5></h5> --}}
                                <div class="col-md-12">
                                    <p id="SalvaTxt"></p>
                                    <label for="Direccion">Digita tu dirección o coordenadas:</label>
                                    <input type="text" class="form-control" id="Direccion" >
                                    <h5><b></b></h5>
                                </div>
                                <div class="col-md-12">
                                    {{-- <h5>Danto click al siguiente botón</h5> --}}
                                    <button type="submit" id="btn-submit" class="form-control justify-content-center btn-success">SOLICITAR VISITA</button>
                                    <p><b>Nota: </b> Una vez enviado tu solicitud, nuestro equipo se pondrá en contacto contigo para agendar tu visita.</p>
                                    {{-- <h5><b>RECUERDA QUE NUESTROS SISTEMAS SOLARES TE GARANTIZAN UNA VIDA ÚTIL DE MÁS DE 25 AÑOS</b></h5> --}}
                                </div>
                            </div>
                            </form>
                            <br>
                            <button type="submit" id="btn-enviar" class="form-control justify-content-center btn-danger">TERMINAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>