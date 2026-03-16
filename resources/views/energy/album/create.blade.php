@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Crear álbum de proyecto <small>ÁLBUMES DE PROYECTO</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Álbumes de Proyecto</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                <div class="box-title"> Nuevo Álbum de Proyecto</div>
                <div class="box-tools">
                    <a href="{{ route('album_projects.index') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{ route('album_projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre del Proyecto</label>
                                <input type="text" name="name" class="form-control" required value="{{old('name')}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ubicación</label>
                                <input type="text" name="location" class="form-control" value="{{old('location')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha del Proyecto</label>
                                <input type="date" name="project_date" class="form-control" value="{{old('project_date')}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cover_image">Imágen de Portada</label><br>
                                <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                    <img src="" alt="" width="40%" id="preimg_servicios">
                                </div>
                                <label for="cover_image" class="form-control text-center">
                                    <i class="fa fa-upload"></i>
                                </label>
                                <input type="file" name="cover_image" id="cover_image" class="hide file_create"
                                    accept="image/*" value="{{old('cover_image')}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Guardar Proyecto
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script>
        $('#cover_image').on('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('preimg_servicios').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
