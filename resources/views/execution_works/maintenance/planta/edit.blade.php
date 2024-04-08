@php
                $count_prueba=count($check['prueba_realizada']);
@endphp

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
            <li class="active">Editar</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                    <div class="box-tools">
                    <a href="{{ route('plant_index', $id->maintenance_id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{ route('plant_update', $id->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <h3>1). Datos Generales</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name_base">Nombre de Estación base</label>
                                <input type="text" name="name_base" id="name_base" value="{{ $id->name_base }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="location">Dirección o Ubicación</label>
                                <input type="text" name="location" id="location" value="{{ $id->location }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="leadership">Nombre Jefatura </label>
                                <input type="text" name="leadership" id="leadership" value="{{ $id->leadership }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="zone">Zona O&M Claro</label>
                                <input type="text" name="zone" id="zone" value="{{ $id->zone }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="modus">Modalidad</label>
                                <input type="text" name="modus" id="modus" value="{{ $id->modus }}"
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
                                <input type="text" name="order_work" id="order_work" value="{{ $id->order_work }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="site_owner">Site Owner</label>
                                <input type="text" name="site_owner" id="site_owner" value="{{ $id->site_owner }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amount_plant">Cantidad de Plantas</label>
                                <input type="text" name="amount_plant" id="amount_plant" value="{{ $id->amount_plant }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="region">Región</label>
                                <input type="text" name="region" id="region" value="{{ $id->region }}"
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
                                @include('execution_works.maintenance.planta.edit.plant_electric')
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
                                @include('execution_works.maintenance.planta.edit.check_list')
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
                                <HR>
                                    <h4><b>PRUEBA REALIZADA</b></h4>
                                </HR>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5 class="text-center">
                                                ESTADO COMPONENTE
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5 class="text-center">
                                                ESTADO GENERAL
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5 class="text-center">
                                                CAUSA POSIBLE
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5 class="text-center">
                                                FORMA DETECTARLO
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5 class="text-center">
                                                FORMA CORREGIRLO
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                @for ($i = 1; $i <= $count_prueba; $i++)
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <p>
                                                        {{ $check['prueba_realizada'][$i]["item"] }}
                                                    </p>
                                                    <input type="hidden" class="form-control" name="prueba_realizada[{{ $i }}][item]" value="{{ $check['prueba_realizada'][$i]["item"] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="prueba_realizada[{{ $i }}][estado]" value="{{ $check['prueba_realizada'][$i]["estado"] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="prueba_realizada[{{ $i }}][causa_posible]" value="{{ $check['prueba_realizada'][$i]["causa_posible"] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="prueba_realizada[{{ $i }}][forma_detectarlo]" value="{{ $check['prueba_realizada'][$i]["forma_detectarlo"] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="prueba_realizada[{{ $i }}][forma_corregirlo]" value="{{ $check['prueba_realizada'][$i]["forma_corregirlo"] }}">
                                                </div>
                                            </div>
                                        </div>
@endfor
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
                                {{-- @foreach ($resultado as $activity)
                                <tr>
                                    <td>{!! $activity->type == 1 ? '<b>' : '' !!}{{ $activity->sap }}{!! $activity->type == 1 ? '</b>' : '' !!}</td>
                                    <td>{!! $activity->type == 1 ? '<b>' : '' !!}{{ $activity->description }}{!! $activity->type == 1 ? '</b>' : '' !!}
                                    </td>
                                    <td><input type="radio" name="activity_status"
                                            {{ $checkedActivity == 'SI' ? 'checked' : '' }} value="SI"></td>
                                    <td><input type="radio" name="activity_status"
                                            {{ $checkedActivity == 'NO' ? 'checked' : '' }} value="NO"></td>
                                    <td><input type="radio" name="activity_status"
                                            {{ $checkedActivity == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                </tr>
                                @endforeach                            --}}
                                <div class="table-responsable">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td>SAP</td>
                                                <td>SI</td>
                                                <td>NO</td>
                                                <td>N/A</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Chequeo de aceite</td>
                                                <td><input type="radio" name="cheque_aceite"
                                                    {{ $resultado->cheque_aceite == 'SI' ? 'checked' : '' }} value="SI"></td>
                                            <td><input type="radio" name="cheque_aceite"
                                                    {{ $resultado->cheque_aceite == 'NO' ? 'checked' : '' }} value="NO"></td>
                                            <td><input type="radio" name="cheque_aceite"
                                                    {{ $resultado->cheque_aceite == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                            </tr>
                                            <tr>
                                                <td>Cambios del filtro del Aire</td>
                                                <td><input type="radio" name="cambio_filtro_aire"
                                                    {{ $resultado->cambio_filtro_aire == 'SI' ? 'checked' : '' }} value="SI"></td>
                                            <td><input type="radio" name="cambio_filtro_aire"
                                                    {{ $resultado->cambio_filtro_aire == 'NO' ? 'checked' : '' }} value="NO"></td>
                                            <td><input type="radio" name="cambio_filtro_aire"
                                                    {{ $resultado->cambio_filtro_aire == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                            </tr>
                                            <tr>
                                                <td>Cambio de filtros de combustible</td>
                                                <td><input type="radio" name="cambio_filtro_combustible"
                                                    {{ $resultado->cambio_filtro_combustible == 'SI' ? 'checked' : '' }} value="SI"></td>
                                            <td><input type="radio" name="cambio_filtro_combustible"
                                                    {{ $resultado->cambio_filtro_combustible == 'NO' ? 'checked' : '' }} value="NO"></td>
                                            <td><input type="radio" name="cambio_filtro_combustible"
                                                    {{ $resultado->cambio_filtro_combustible == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                            </tr>
                                            <tr>
                                                <td>Cambio de filtros de aceite</td>
                                                <td><input type="radio" name="cambio_filtro_aceite"
                                                    {{ $resultado->cambio_filtro_aceite == 'SI' ? 'checked' : '' }} value="SI"></td>
                                            <td><input type="radio" name="cambio_filtro_aceite"
                                                    {{ $resultado->cambio_filtro_aceite == 'NO' ? 'checked' : '' }} value="NO"></td>
                                            <td><input type="radio" name="cambio_filtro_aceite"
                                                    {{ $resultado->cambio_filtro_aceite == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                            </tr>
                                            <tr>
                                                <td>Cambio de mangueras de precalentador</td>
                                                <td><input type="radio" name="cambio_maguera"
                                                    {{ $resultado->cambio_maguera == 'SI' ? 'checked' : '' }} value="SI"></td>
                                            <td><input type="radio" name="cambio_maguera"
                                                    {{ $resultado->cambio_maguera == 'NO' ? 'checked' : '' }} value="NO"></td>
                                            <td><input type="radio" name="cambio_maguera"
                                                    {{ $resultado->cambio_maguera == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                            </tr>
                                            <tr>
                                                <td>Cambio o ajuste refrigerante para motor diesel</td>
                                                <td><input type="radio" name="cambio_refrigerante"
                                                    {{ $resultado->cambio_refrigerante == 'SI' ? 'checked' : '' }} value="SI"></td>
                                            <td><input type="radio" name="cambio_refrigerante"
                                                    {{ $resultado->cambio_refrigerante == 'NO' ? 'checked' : '' }} value="NO"></td>
                                            <td><input type="radio" name="cambio_refrigerante"
                                                    {{ $resultado->cambio_refrigerante == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                            </tr>
                                            <tr>
                                                <td>Cambio de baterías</td>
                                                <td><input type="radio" name="cambio_bateria"
                                                    {{ $resultado->cambio_bateria == 'SI' ? 'checked' : '' }} value="SI"></td>
                                            <td><input type="radio" name="cambio_bateria"
                                                    {{ $resultado->cambio_bateria == 'NO' ? 'checked' : '' }} value="NO"></td>
                                            <td><input type="radio" name="cambio_bateria"
                                                    {{ $resultado->cambio_bateria == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
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
