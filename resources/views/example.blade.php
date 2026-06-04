<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar firma de usuario - By Parzibyte</title>
    {{-- <link rel="stylesheet" href="estilo.css"> --}}
    <style>
        canvas {
            width: 500px;
            height: 500px;
            background-color: #fffff;
            border: 1px solid #000000;
        }
    </style>
</head>

<body>
    <p>Firmar a continuación:</p>
    <canvas id="pizarra"></canvas>
    <br>
    <button id="btnLimpiar">Limpiar</button>
    <button id="btnDescargar">Descargar</button>
    <button id="btnGenerarDocumento">Pasar a documento</button>
    <br>
    {{-- <script src="script.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</body>

</html>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //======================================================================
    // VARIABLES
    //======================================================================
    let miCanvas = document.querySelector('#pizarra'),
        $btnDescargar = document.querySelector("#btnDescargar"),
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
    miCanvas.height = 500;

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

    $btnDescargar.onclick = () => {
        const enlace = document.createElement('a');
        // El título
        enlace.download = "Firma.png";
        // Convertir la imagen a Base64 y ponerlo en el enlace
        // enlace.href = miCanvas.toDataURL();
        // // Hacer click en él
        // enlace.click();

        var imagen =  miCanvas.toDataURL("image/png");
        /* Envío la petición XHR al servidor con los datos de la imagen */
        $.ajax({
            url: '/example_post',
            method: 'post',
            data: { imagen: imagen},
        }).done(function(retorno) {
            console.log(retorno);
            // $( '#imagen' ).show();
        });
    };
    
</script>