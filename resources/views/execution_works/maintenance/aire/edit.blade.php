@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Mantenimiento proyecto SMU <small>SMU</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">SMU</a></li>
            <li><a href="#">Aires Acondicionados</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                    <div class="box-tools">
                        <a href="{{ route('air_index', $id->maintenance_id) }}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
            </div>
            <form action="{{ route('air_update', $id->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <h3>Información principal</h3>
                    <p>Datos obligatorios (*)</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tecnico">Nombre del Técnico <span class="color-red">*</span></label>
                                <input type="text" class="form-control" name="tecnico" value="{{ $dates['tecnico'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="revisor">Nombre del Revisor <span class="color-red">*</span></label>
                                <input type="text" class="form-control" name="revisor" value="{{ $dates['revisor'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseZero">
                                        1). Información Aire Acondicionado
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseZero" class="panel-collapse collapse">
                                <div class="box-body">
                                    @include('execution_works.maintenance.aire.edit.dates_generals')
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-info">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        2). Lista de Chequeo General
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="box-body">
                                    <div class="title text-center">
                                        <h3>PARAMETRO DE EVALUACIÓN</h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="table-responsable">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td>DESCRIPCIÓN</td>
                                                        <td>SI</td>
                                                        <td>NO</td>
                                                        <td>N/A</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 1; $i <= 39; $i++)
                                                        <tr>
                                                            <td>{{ $dates['check'][$i]['id'] }}</td>
                                                            <input type="hidden" name="check[{{ $i }}][id]" value="{{ $dates['check'][$i]['id'] }}">
                                                            <td><input type="radio" {{ $dates['check'][$i]['value'] == 'SI' ? 'checked' : '' }} name="check[{{ $i }}][value]" value="SI"></td>
                                                            <td><input type="radio" {{ $dates['check'][$i]['value'] == 'NO' ? 'checked' : '' }} name="check[{{ $i }}][value]" value="NO"></td>
                                                            <td><input type="radio" {{ $dates['check'][$i]['value'] == 'N/A' ? 'checked' : '' }} name="check[{{ $i }}][value]" value="N/A"></td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        3). Acciones realizadas
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="box-body">
                                    @for ($i = 1; $i <= 3; $i++)
                                    <h4>FORMULARIO DE A.A.1</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][limpieza]">LIMPIEZA DE SERPENTINES</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][limpieza]" id="actions[{{ $i }}][limpieza]" value="{{ $dates['actions'][$i]['limpieza'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][ajuste]">AJUSTE ELEMENTOS DE CONTROL</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][ajuste]" id="actions[{{ $i }}][ajuste]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][adicion]">ADICIÓN REFRIGERANTE</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][adicion]" id="actions[{{ $i }}][adicion]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][correccion]">CORRECCIÓN DE DRENAJES</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][correccion]" id="actions[{{ $i }}][correccion]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][lubricacion]">LUBRICACIÓN DE COMPONENTES</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][lubricacion]" id="actions[{{ $i }}][lubricacion]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][cambio_filtro]">CAMBIO FILTROS SECADO</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][cambio_filtro]" id="actions[{{ $i }}][cambio_filtro]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][alineacion]">ALINEACIÓN DE POLEAS</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][alineacion]" id="actions[{{ $i }}][alineacion]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][cambio_componentes]">CAMBIO COMPONENTES ELECTRONICOS</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][cambio_componentes]" id="actions[{{ $i }}][cambio_componentes]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][cambio_compresor]">CAMBIO DE COMPRESOR</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][cambio_compresor]" id="actions[{{ $i }}][cambio_compresor]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][cambio_correas]">CAMBIO DE CORREAS/FILTROS</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][cambio_correas]" id="actions[{{ $i }}][cambio_correas]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="actions[{{ $i }}][otras_reparaciones]">OTRAS REPARACIONES</label>
                                                    <input type="text" class="form-control" name="actions[{{ $i }}][otras_reparaciones]" id="actions[{{ $i }}][otras_reparaciones]" value="{{ $dates['actions'][$i]['limpieza'] }}" >
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
                                        5). Plan de mejora
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="box-body">
                                    <h4>Descripción del plan de mejora:</h4>
                                    <div class="form-group">
                                        <textarea name="plan_mejora" id="plan_mejora" cols="30" rows="10" class="form-control">{{ $dates['plan_mejora'] }}</textarea>
                                    </div>
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
@endsection
