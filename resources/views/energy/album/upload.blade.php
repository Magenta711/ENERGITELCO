@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Álbum de proyecto <small>ÁLBUMES DE PROYECTO</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Álbumes de Proyecto</a></li>
            <li class="active">Subir Imagen </li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">{{ $project->name }}</div>
                <div class="box-tools">
                    <a href="{{ route('album_projects.index') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                            <img src="{{ asset($project->cover_image ?? 'assets/img/default.jpg') }}" alt=""
                                width="40%">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>{{ $project->description }}</p>
                    </div>
                    <div class="col-md-6">
                        <b>Ubicación: </b>
                        <p>{{ $project->location }}</p>
                    </div>
                    <div class="col-md-6">
                        <b>Fecha: </b>
                        <p>{{ $project->project_date }}</p>
                    </div>
                    <div class="col-md-6">
                        <b>Estado:</b>
                        <br>
                        <span class="label label-{{ $project->status == 1 ? 'success' : 'default' }}">
                            {{ $project->status == 1 ? 'Visible' : 'Oculto' }}
                        </span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @can('Editar Album')
                        <div class="col-md-6 text-right">
                            <a href="" class="btn btn-warning" data-toggle="modal" data-target=".edit-modal-lg">Editar
                                Álbum</a>
                        </div>
                    @endcan
                    @can('Eliminar Album')
                        <div class="col-md-6 text-left">
                            <form action="{{ route('album_projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar este álbum?')">Eliminar Álbum</button>
                            </form>
                        </div>
                    @endcan
                </div>
                <hr>
                <h4><b>
                        Imágenes/Videos
                    </b>
                </h4>
                <p>El archivo de imagen no puede superar los 10 MB de tamaño.</p>
                <p>El archivo de video no puede superar los 50 MB de tamaño.</p>
                @can('Crear Album')
                    <form action="{{ route('album_projects.upload', $project->id) }}" method="POST" class="dropzone"
                        id="project-dropzone">
                        @csrf
                    </form>
                @endcan

                <div class="row mt-3" id="gallery-container">
                    <div class="col-md-12">
                        <h4><b>
                                Videos subidos
                            </b>
                        </h4>
                        @foreach ($project->images->where('type', 'video') as $image)
                            <div class="col-md-3 text-center" id="image-{{ $image->id }}">
                                <div class="thumbnail">
                                    <video controls class="img-responsive img-thumbnail"
                                        style="height: 200px; object-fit: cover;">
                                        <source src="{{ asset($image->image) }}" type="video/mp4">
                                        Tu navegador no soporta la etiqueta de video.
                                    </video>
                                    @can('Eliminar Imagen de Album')
                                        <button class="btn btn-danger btn-xs btn-block mt-1 delete-image"
                                            data-id="{{ $image->id }}" id="delete-project">
                                            Eliminar
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        <h4><b>
                                Imágenes subidas
                            </b>
                        </h4>
                    </div>
                    @foreach ($project->images->where('type', 'image') as $image)
                        <div class="col-md-3" id="image-{{ $image->id }}">
                            <div class="thumbnail">
                                <img src="{{ asset($image->image) }}" class="img-responsive img-thumbnail">
                                @can('Eliminar Imagen de Album')
                                    <button class="btn btn-danger btn-xs btn-block mt-1 delete-image"
                                        data-id="{{ $image->id }}" id="delete-project">
                                        Eliminar
                                    </button>
                                @endcan
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="modal fade edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center"><b>Editar Álbum de Proyecto</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('album_projects.update', $project->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre del Proyecto</label>
                                        <input type="text" name="name" class="form-control" required
                                            value="{{ $project->name }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ubicación</label>
                                        <input type="text" name="location" class="form-control"
                                            value="{{ $project->location }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fecha del Proyecto</label>
                                        <input type="date" name="project_date" class="form-control"
                                            value="{{ $project->project_date }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ $project->status == '1' ? 'selected' : '' }}>Visible
                                            </option>
                                            <option value="0" {{ $project->status == '0' ? 'selected' : '' }}>Oculto
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea name="description" class="form-control" cols="30" rows="5">{{ $project->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cover_image">Imágen de Portada</label><br>
                                        <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                            <img src="{{ asset($project->cover_image ?? 'assets/img/default.jpg') }}"
                                                alt="" width="40%" id="preimg_servicios">
                                        </div>
                                        <label for="cover_image" class="form-control text-center">
                                            <i class="fa fa-upload"></i>
                                        </label>
                                        <input type="file" name="cover_image" id="cover_image"
                                            class="hide file_create" accept="image/*" value="{{ old('cover_image') }}">
                                    </div>
                                </div>
                            </div>
                            <button class="btn-submit btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <script>
        $(document).on('change', '#cover_image', function(event) {
            console.log('Imagen cambiada');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preimg_servicios').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        //Validar antes de eliminar un álbum
        $('#delete-project').on('click', function(e) {
            if (!confirm('¿Eliminar este álbum?')) {
                e.preventDefault();
            }
        });

        Dropzone.autoDiscover = false;

        new Dropzone("#project-dropzone", {
            url: "{{ route('album_projects.upload', $project->id) }}",
            method: 'post',
            paramName: "file",
            maxFilesize: 50,
            acceptedFiles: "image/*, video/*",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                if (response.success) {
                    if (response.type === 'image') {
                        let html = `
                            <div class="col-md-3" id="image-${response.id}">
                                <div class="thumbnail">
                                    <img src="${response.path}"
                                        class="img-responsive img-thumbnail">

                                    <button class="btn btn-danger btn-xs btn-block delete-image"
                                            data-id="${response.id}">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        `;
                        document
                            .getElementById('gallery-container')
                            .insertAdjacentHTML('beforeend', html);
                    } else {
                        let html = `
                            <div class="col-md-3 text-center" id="image-${response.id}">
                                <div class="thumbnail">
                                    <video controls class="img-responsive img-thumbnail" style="height: 200px; object-fit: cover;">
                                        <source src="${response.path}" type="video/mp4">
                                        Tu navegador no soporta la etiqueta de video.
                                    </video>

                                    <button class="btn btn-danger btn-xs btn-block delete-image"
                                            data-id="${response.id}">
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        `;
                        document
                            .getElementById('gallery-container')
                            .insertAdjacentHTML('beforeend', html);
                    }
                }
            },
            // Agrega un mensaje de error personalizado
            sending: function(file, xhr, formData) {
                console.log('Sending file', file.name);
            },
            // Maneja la respuesta de error del servidor
            error: function(file, response) {
                let msg = "";

                if (typeof response === "string") {
                    msg = response;
                } else if (response && response.message) {
                    msg = response.message;
                } else if (response && response.error) {
                    msg = response.error;
                } else if (response && response.xhr && response.xhr.responseText) {
                    try {
                        const json = JSON.parse(response.xhr.responseText);
                        msg = json.message || JSON.stringify(json);
                    } catch (e) {
                        msg = response.xhr.responseText;
                    }
                } else {
                    msg = JSON.stringify(response);
                }

                // Actualiza el mensaje de error en la vista previa del archivo
                const preview = file.previewElement;
                if (preview) {
                    const errEl = preview.querySelector('.dz-error-message');
                    if (errEl) errEl.textContent = msg;
                }
            }
        }).on('error', function(file, response) {
            console.log('Dropzone error:', response);
        });

        // ELiminación de imagenes con JS mediante fetch API
        document.addEventListener('DOMContentLoaded', function() {
            // Agrega eventos a los botones de eliminación
            document.querySelectorAll('.delete-image').forEach(button => {
                // Escucha el evento click en cada botón
                button.addEventListener('click', function() {
                    // Obtiene el id de la imagen desde el atributo data-id
                    let imageId = this.dataset.id;
                    // Pregunta de confirmación antes de eliminar
                    if (!confirm('¿Eliminar esta imagen?')) return;
                    // Realiza la petición DELETE al servidor para eliminar la imagen
                    fetch("{{ url('albums/destroy_image') }}/" + imageId, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                'Accept': 'application/json'
                            }
                        })

                        .then(response => response.json())
                        .then(data => {
                            // Si la eliminación fue exitosa, remueve la imagen del DOM
                            if (data.success) {
                                document.getElementById('image-' + imageId).remove();
                            }
                        });
                });

            });

        });
    </script>
@endsection
