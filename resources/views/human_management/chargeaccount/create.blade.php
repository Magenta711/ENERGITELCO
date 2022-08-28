@extends(isset(Auth::user()->id) ? 'lte.layouts' : 'layouts.app2')
@auth
    @section('content')
    <section class="content-header">
        <h1>
            Cuenta de cobro
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#"> Cuenta de cobro</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    Cuenta de cobro
                </div>
                <div class="box-tools">
                    <a href="{{route('chargeaccount')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <small class="text-hidden">Todos los campos con <span class="text-red">*</span> son obligarios</small>
@endauth
@guest

@section('content')
<section class="signup-section" id="signup" style="padding: 10rem 0 0 0">
    <div class="container" style="background-color: rgb(0,0,0,0.4); padding: 1rem; border-radius: 10px">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-white">
                {{-- <i class="far fa-paper-plane fa-2x mb-2 text-white"></i> --}}
                <div class="text-center">
                    <i class="fab fa-wpforms fa-2x mb-2"></i>
                    <h2 class="mb-5">Cuenta de cobro</h2>
                    <small class="text-hidden">Todos los campos con <span class="text-danger">*</span> son obligarios</small>
                </div>

@endguest
<form action="{{route('chargeaccount_store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
 @csrf
    <div class="row">
        <input type="hidden" name="token" value="{{$token}}">
        <div class="col-md-6">
            <div class="form-group">
                <label for="city">Cuidad <span class="text-red text-danger">*</span></label>
                <input type="text" class="form-control" id="city" name="city" value="{{old('city') ?? 'Medellín'}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="date">Fecha <span class="text-red text-danger">*</span></label>
                <input type="date" class="form-control" name="date" readonly value="{{$signature->date ?? now()->format('Y-m-d')}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nombre completo <span class="text-red text-danger">*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Aquien se le debe">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="document">Número de identificación <span class="text-red text-danger">*</span></label>
                <input type="number" class="form-control" name="document" id="document" value="{{old('document')}}" placeholder="NIT o Cédula">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="concept">Concepto <span class="text-red text-danger">*</span></label>
                <input type="text" class="form-control" name="concept" id="concept" value="{{old('concept')}}" class="Concepto claro">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="value">Valor <span class="text-red text-danger">*</span></label>
                <input type="number" class="form-control validate-total" name="value" id="value" value="{{old('value')}}" placeholder="Total a pagar">
                <div class="invalid-feedback d-none hide">
                    Valor incorrecto, el campo solo permite número enteros, no permite lestras, puntos, comas o caracteres especiales.
                  </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="bank_account">Número de cuenta</label>
                <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{old('bank_account')}}" placeholder="Número de cuenta bancaria">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="type_bank_account">Tipo de cuenta</label>
                <input type="text" class="form-control" name="type_bank_account" id="type_bank_account" value="{{old('type_bank_account')}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Correo electronico</label>
                <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="example@mail.com">
            </div>
        </div>
    @auth
        <div class="col-md-6">
            <div class="form-group">
                <label for="">De donde saldrán los recursos para el gasto <span class="text-red text-danger">*</span></label>
                <br><input type="radio" name="expense_type" value="Caja menor" id="caja"> <label for="caja">Caja menor del empleado</label>
                <br><input type="radio" name="expense_type" value="Empresa" id="empresa"> <label for="empresa">Directamente por la empresa</label>
            </div>
        </div>
    @endauth
        <div class="col-md-12">
            <div class="form-group">
                <label for="file">Adjuntos</label>
                <label id="label_file" for="file" class="form-control text-center "><i class="fa fa-upload"></i></label>
                <input value="{{old('files')}}" class="d-none hide file_input" type="file" multiple="true" name="files[]" id="file">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Firma <span class="text-red text-danger">*</span></label><br>
                <canvas id="pizarra" @guest style="border-radius: 0.25rem;" @endguest></canvas>
                <br>
                <button type="button" class="btn btn-sm btn-danger" id="btnLimpiar">Limpiar</button>
                <button type="button" class="btn btn-sm btn-info" id="btnAceptar">Aceptar</button>
                <input type="hidden" id="signature_id" name="signature_id" value="{{old('signature_id')}}">
            </div>
        </div>
    </div>

@auth
            </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary btn-save">Enviar</button>
                </div>
            </div>
        </form>
        </div>
    </section>
    @endsection
@endauth
@guest
                <button class="btn btn-sm btn-block btn-primary btn-save">Enviar</button>
            </div>
        </div>
        </form>
    </div>
</section>
@endsection

@endguest

@section('css')
    <style>
        canvas {
            width: 500;
            height: 200px;
            border: 1px solid #d2d6de;
            background-color: #fff;
        }
    </style>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.validate-total').keypress(function (event) {
                return (event.charCode >= 47 && event.charCode <= 57)
            });
            $('.validate-total').blur(function () {
                validateTotal();
            });
        });

        function validateTotal() {
            
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //======================================================================
        // VARIABLES
        //======================================================================
        let miCanvas = document.querySelector('#pizarra'),
            $btnAceptar = document.querySelector("#btnAceptar"),
            $btnLimpiar = document.querySelector("#btnLimpiar");
        let lineas = [];
        let correccionX = 0;
        let correccionY = 0;
        let pintarLinea = false;
        // Marca el nuevo punto
        let nuevaPosicionX = 0;
        let nuevaPosicionY = 0;

        let posicion = miCanvas.getBoundingClientRect()
        correccionX = posicion.x;
        correccionY = posicion.y;

        miCanvas.width = 500;
        miCanvas.height = 200;

        //======================================================================
        // FUNCIONES
        //======================================================================

        /**
        * Funcion que empieza a dibujar la linea
        */
        function empezarDibujo() {
            pintarLinea = true;
            lineas.push([]);
        };

        /**
        * Funcion que guarda la posicion de la nueva línea
        */
        function guardarLinea() {
            lineas[lineas.length - 1].push({
                x: nuevaPosicionX,
                y: nuevaPosicionY
            });
        }

        /**
        * Funcion dibuja la linea
        */
        function dibujarLinea(event) {
            event.preventDefault();
            if (pintarLinea) {
                let ctx = miCanvas.getContext('2d')
                // Estilos de linea
                ctx.lineJoin = ctx.lineCap = 'round';
                ctx.lineWidth = 2;
                // Color de la linea
                ctx.strokeStyle = '#000';
                // Marca el nuevo punto
                if (event.changedTouches == undefined) {
                    // Versión ratón
                    nuevaPosicionX = event.layerX;
                    nuevaPosicionY = event.layerY;
                } else {
                    // Versión touch, pantalla tactil
                    nuevaPosicionX = event.changedTouches[0].pageX - correccionX;
                    nuevaPosicionY = event.changedTouches[0].pageY - correccionY;
                }
                // Guarda la linea
                guardarLinea();
                // Redibuja todas las lineas guardadas
                ctx.beginPath();
                lineas.forEach(function (segmento) {
                    ctx.moveTo(segmento[0].x, segmento[0].y);
                    segmento.forEach(function (punto, index) {
                        ctx.lineTo(punto.x, punto.y);
                    });
                });
                ctx.stroke();
            }
        }

        /**
        * Funcion que deja de dibujar la linea
        */
        function pararDibujar () {
            pintarLinea = false;
            guardarLinea();
        }

        //======================================================================
        // EVENTOS
        //======================================================================

        // Eventos raton
        miCanvas.addEventListener('mousedown', empezarDibujo, false);
        miCanvas.addEventListener('mousemove', dibujarLinea, false);
        miCanvas.addEventListener('mouseup', pararDibujar, false);

        // Eventos pantallas táctiles
        miCanvas.addEventListener('touchstart', empezarDibujo, false);
        miCanvas.addEventListener('touchmove', dibujarLinea, false);


        const limpiarCanvas = () => {
            let ctx = miCanvas.getContext('2d')
            // Colocar color blanco en fondo de canvas
            ctx.fillStyle = '#ffffff';
            lineas = [];
            ctx.fillRect(0, 0, miCanvas.width, miCanvas.height);
        };
        limpiarCanvas()
        $btnLimpiar.onclick = limpiarCanvas;

        $btnAceptar.onclick = () => {
            var imagen =  miCanvas.toDataURL("image/png");
            /* Envío la petición XHR al servidor con los datos de la imagen */
            $.ajax({
                url: '/chargeaccount/signature',
                method: 'post',
                data: { imagen: imagen},
                beforeSend: function(){
                    $('#btnLimpiar').prop("disabled", true);
                    $("#btnAceptar").prop("disabled", true);
                },
                success:function(data){
                    $('#signature_id').val(data);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 6000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Se firmo correctamente'
                    })
                    $('#btnLimpiar').hide();
                    $("#btnAceptar").hide();
                },
                error: function (error) {
                    console.error('ERROR: ',error);
                    Swal.fire('Error');
                    $('#btnLimpiar').hide("disabled", false);
                    $("#btnAceptar").hide("disabled", false);
                }
            });
        };
    </script>
@endsection