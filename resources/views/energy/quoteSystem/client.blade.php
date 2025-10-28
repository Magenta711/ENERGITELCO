<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ENERGIRTELCO SAS') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/logo_sm.png') }}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
    <!-- Font Awesome -->
    <link href="{{ asset("assets/$theme/bower_components/font-awesome/css/all.min.css") }}" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css") }}">
    <!-- Theme style -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/skins/_all-skins.min.css") }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="{{ asset("assets/$theme/dist/css/AdminLTE.min.css") }}">
</head>

<body>
    <section class="content">
        <div class="row row-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">Solicitar Cotización</div>
                        <div class="box-tools">
                        </div>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('quote_energy_system.client_store') }}" method="POST"
                            enctype="multipart/form-data" id="cotizacion_form">
                            @csrf
                            <div class="client">
                                <div class="row" id="newClients">
                                    <div class="col-md-12">
                                        <h3>Información del Cliente</h3>
                                    </div>
                                    <div class="col-md-4"><label for="nameNew">Nombre</label><input type="text"
                                            class="form-control" name="nameNew" id="nameNew"
                                            value="{{ old('nameNew') }}">
                                    </div>
                                    <div class="col-md-4"><label for="typeIdNew">Tipo de Identificación</label><select
                                            name="typeIdNew" id="typeIdNew" class="form-control">
                                            <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                            <option value="Cédula de extranjería">Cédula de extranjería</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="NIT">NIT</option>
                                            <option value="Otro">Otro</option>
                                        </select></div>
                                    <div class="col-md-4"><label for="ideNew">Identificación/NIT</label><input
                                            type="text" class="form-control" name="ideNew" id="ideNew"
                                            value="{{ old('ideNew') }}">
                                    </div>
                                    <div class="col-md-4"><label for="telNew">Telefono de Contacto</label><input
                                            type="text" class="form-control" name="telNew" id="telNew"
                                            value="{{ old('telNew') }}">
                                    </div>
                                    <div class="col-md-4"><label for="emailNew">Correo Eléctronico</label><input
                                            type="text" class="form-control" name="emailNew" id="emailNew"
                                            value="{{ old('emailNew') }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row ">
                                    <div class="col-md-12 text-right">
                                        <a class="btn btn-info" id="continuar">Continuar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="cotizar">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Información del Proyecto a Cotizar</h3>
                                        <h4><b>Clase:</b></h4>
                                        <ul>
                                            <li><b>ON GRID: </b>Conectado a la red eléctrica convencional. </li>
                                            <li><b>OFF GRID: </b>Funciona completamente desconectado de la red
                                                eléctrica. </li>
                                        </ul>
                                        <h4><b>Tipo de proyecto</b></h4>
                                        <ul>
                                            <li><b>Bajo Consumo: </b>El sistema se diseña o se limita de forma que la
                                                producción de energía sea igual o inferior a tu consumo</li>
                                            <li><b>Venta de excedentes: </b>La energía generada por los paneles que no
                                                se consume instantáneamente se vierte a la red eléctrica </li>
                                        </ul>
                                        <p><b>Consumo Max KW/H Ult 6M: </b>El consumo máximo de KW/H que has tenido
                                            durante los últimos 6 meses (El KW/H mensual lo puedes ver en tu cuenta de
                                            servicios)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="claseSystem">Clase ON/OFF GRID</label>
                                            <select name="claseSystem" id="claseSystem" class="form-control" required>
                                                <option>Seleccione</option>
                                                <option {{ old('claseSystem') == 'ON GRID' ? 'selected' : '' }}
                                                    value="ON GRID">ON GRID</option>
                                                <option {{ old('claseSystem') == 'OFF GRID' ? 'selected' : '' }}
                                                    value="OFF GRID">OFF GRID</option>
                                                <option {{ old('claseSystem') == 'HÍBRIDO' ? 'selected' : '' }}
                                                    value="HÍBRIDO">HÍBRIDO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="estrato">Estrato</label>
                                            <input type="text" class="form-control" name="estrato" id="estrato"
                                                value="{{ old('estrato') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="consumo">Consumo Max KW/H Ult 6M</label>
                                            <input type="number" class="form-control" name="consumo" id="consumo"
                                                value="{{ old('consumo') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="typeProject">Tipo de proyecto a cotizar</label>
                                            <select name="typeProject" id="typeProject" class="form-control"
                                                required>

                                                <option>Seleccione</option>
                                                <option
                                                    {{ old('typeProject') == 'VENTA DE EXCEDENTES' ? 'selected' : '' }}
                                                    value="VENTA DE EXCEDENTES">VENTA DE EXCEDENTES</option>
                                                <option {{ old('typeProject') == 'BAJO CONSUMO' ? 'selected' : '' }}
                                                    value="BAJO CONSUMO">BAJO CONSUMO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grop">
                                            <label for="ciudad">Ciudad</label>
                                            <input type="text" class="form-control" name="ciudad" id="ciudad"
                                                value="{{ old('ciudad') }}" required>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-grop">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" class="form-control" name="direccion"
                                                id="direccion" value="{{ old('direccion') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="preimg_servicios">Foto de la cuenta de Servicios
                                                (Opcional)</label><br>
                                            <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                                <img src="" alt="" width="40%"
                                                    id="preimg_servicios">
                                            </div>
                                            <label for="file_servicios" class="form-control text-center">
                                                <i class="fa fa-upload"></i>
                                            </label>
                                            <input type="file" name="file_servicios" id="file_servicios"
                                                class="file_create hide" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="r">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-success" id="save">Solicitar Cotización</button>
                                    </div>
                                </div>
                            </div>
                            <div class="success">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3>¡Gracias por solicitar tu cotización!</h3>
                                        <p>Nos pondremos en contacto contigo pronto.</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.cotizar').prop('hidden', true);
        $('.success').prop('hidden', true);
        $('.file_create').change(function() {
            const idPreview = this.id.replace('file_', 'preimg_');
            console.log('Renderizando preview:', idPreview);
            readImage(this, idPreview);
        });

        $('#file_image').change(function(event) {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_image').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });

    })

    function readImage(input, idPreview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + idPreview).attr('src', e.target.result); // renderizamos la imagen correcta
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $('#continuar').click(function() {
        $name = $('#nameNew').val();
        $typeId = $('#typeIdNew').val();
        $ide = $('#ideNew').val();
        $tel = $('#telNew').val();
        $email = $('#emailNew').val();

        if ($name == '' || $ide == '' || $tel == '' || $email == '') {
            alert('Por favor diligencie todos los campos');
            return false;
        }

        $('.client').prop('hidden', true);
        $('.cotizar').prop('hidden', false);

    })

    $('#save').click(function(e) {
        e.preventDefault();
        let $claseSystem = $('#claseSystem').val();
        let $estrato = $('#estrato').val();
        let $consumo = $('#consumo').val();
        let $typeProject = $('#typeProject').val();
        let $ciudad = $('#ciudad').val();
        let $direccion = $('#direccion').val();
        let $name = $('#nameNew').val();
        let $typeId = $('#typeIdNew').val();
        let $ide = $('#ideNew').val();
        let $tel = $('#telNew').val();
        let $email = $('#emailNew').val();
        if ($claseSystem == 'Seleccione' || $estrato == '' || $consumo == '' || $typeProject == 'Seleccione' ||
            $ciudad == '' || $direccion == '') {
            alert('Por favor diligencie todos los campos');
            return false;
        }

        $('#cotizacion_form').submit();
        // let formData = new FormData();

        // formData.append('_token', '{{ csrf_token() }}');
        // formData.append('claseSystem', $claseSystem);
        // formData.append('estrato', $estrato);
        // formData.append('consumo', $consumo);
        // formData.append('typeProject', $typeProject);
        // formData.append('ciudad', $ciudad);
        // formData.append('direccion', $direccion);
        // formData.append('name', $name);
        // formData.append('typeIdNew', $typeId);
        // formData.append('ideNew', $ide);
        // formData.append('telNew', $tel);
        // formData.append('emailNew', $email);
        // let file = $('#file_servicios')[0].files[0];
        // if (file) {
        //     formData.append('file_servicios', file);
        // }
        // $.ajax({
        //     url: '/energy/quote_system/client_store',
        //     method: 'POST',
        //     data: formData,
        //     processData: false,
        //     contentType: false,
        //     success: function(response) {
        //         $('.cotizar').prop('hidden', true);
        //         $('.success').prop('hidden', false);
        //         console.log('Datos enviados correctamente');
        //     },
        //     error: function() {
        //         console.log('Error al enviar los datos');
        //     }
        // });
    })
</script>
