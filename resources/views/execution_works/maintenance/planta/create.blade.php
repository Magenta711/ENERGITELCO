@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Mantenimiento proyecto mintic <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li><a href="#">Mantenimiento</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                    <div class="box-tools">
                        <a href="{{ route('plant_index', $id->id) }}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
            </div>
            <form action="{{ route('plant_store', $id->id) }}" method="POST">
                @method('POST')
                @csrf
                <div class="box-body">
                    <h3>1). Datos Generales</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name_base">Nombre de Estación base</label>
                                <input type="text" name="name_base" id="name_base" value="{{ $id->site_name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="location">Dirección o Ubicación</label>
                                <input type="text" name="location" id="location" value="{{ $id->locate }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="leadership">Nombre Jefatura </label>
                                <input type="text" name="leadership" id="leadership" value="{{ old('leadership') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="zone">Zona O&M Claro</label>
                                <input type="text" name="zone" id="zone" value="{{ old('zone') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="modus">Modalidad</label>
                                <input type="text" name="modus" id="modus" value="{{ old('modus') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="structure">Estructura</label>
                                <input type="text" name="structure" id="structure" value="{{ $id->structure }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="order_work">Orden de Trabajo o Tas</label>
                                <input type="text" name="order_work" id="order_work" value="{{ old('order_work') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="site_owner">Site Owner</label>
                                <input type="text" name="site_owner" id="site_owner" value="{{ old('site_owner') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amount_plant">Cantidad de Plantas</label>
                                <input type="text" name="amount_plant" id="amount_plant" value="{{ $id->plants_amount }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="region">Región</label>
                                <input type="text" name="region" id="region" value="{{ $id->name }}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel box box-info">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    2). Datos Principales de Plantas
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="box-body">
                                @include('execution_works.maintenance.planta.plant_electric')
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-danger">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    3). Lista de Chequeo Ceneral Planta
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                                @include('execution_works.maintenance.planta.check_list')
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    4). Resultados de Pruebas
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="box-body">
                                @include('execution_works.maintenance.planta.prueba')
                            </div>
                        </div>
                    </div>

                    <div class="panel box box-warning">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                    5). Resultados de Pruebas
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="box-body">
                                @include('execution_works.maintenance.planta.resultados')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/$theme/bower_components/select2/dist/css/select2.min.css") }}">

    <style>
    .rojo {
        border-color: red;
      }
      </style>
@endsection

@section('js')
    <script src="{{ asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
    <script src="{{ asset('js/project/mintic/maintence/create.js') }}"></script>

    <script>
        $(document).ready(function() {
  // Seleccionar los campos a controlar
        var campos = $('.text-plant');

        // Función para verificar y aplicar estilo
        function verificarLongitud(campo) {
            var valor = $(campo).val();
            var longitud = valor.length;

            if (longitud > 50) {
            $(campo).addClass('rojo');
            } else {
            $(campo).removeClass('rojo');
            }
        }

        // Registrar eventos para cada campo
        campos.each(function() {
            $(this).on('keyup', function() {
            verificarLongitud(this);
            });
        });

        // Verificar la longitud al cargar la página
        campos.each(function() {
            verificarLongitud(this);
        });
        });
    </script>
@endsection
