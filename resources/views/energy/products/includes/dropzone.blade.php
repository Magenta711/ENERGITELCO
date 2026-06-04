<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de Imágenes</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">
</head>
<body>
    <h1>Subir Múltiples Imágenes</h1>

    <!-- Formulario Dropzone -->
    <form action="" method="post" enctype="multipart/form-data" class="dropzone" id="image-upload">
        @csrf
        <div class="dz-message">
            Arrastra y suelta imágenes aquí o haz clic para seleccionarlas.
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.imageUpload = {
            maxFilesize: 2, // Tamaño máximo de archivo en MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif", // Tipos de archivos permitidos
            addRemoveLinks: true, // Opción para eliminar archivos
            dictRemoveFile: "Eliminar archivo",
            init: function() {
                this.on("success", function(file, response) {
                    console.log("Subido exitosamente:", response);
                });
                this.on("error", function(file, response) {
                    console.log("Error:", response);
                });
            }
        };
    </script>
</body>
</html>
