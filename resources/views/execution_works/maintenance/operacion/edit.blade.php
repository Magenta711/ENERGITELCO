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
            <li><a href="#">Operación y Mantenimientos</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                    <div class="box-tools">
                        <a href="{{ route('operation_index', $id->campus->id) }}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
            </div>
            <form action="{{ route('operation_update', $id->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <h3>Información principal</h3>
                    <p>Datos obligatorios (*)</p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tecnico">Nombre del Personal quien Ejecuta<span class="color-red">*</span></label>
                                <input type="text" class="form-control" name="tecnico" value="{{ $id->tecnico }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="revisor">Nombre del Revisor <span class="color-red">*</span></label>
                                <input type="text" class="form-control" name="revisor" value="{{ $id->revisor }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="empresa">Empresa quien Ejecuta: <span class="color-red">*</span></label>
                                <select name="empresa" id="empresa" class="form-control">
                                    <option value="CINCO" {{ $id->empresa == "CINCO" ? 'selected' : '' }}>CINCO</option>
                                    <option value="LITEYCA" {{ $id->empresa == "LITEYCA" ? 'selected' : '' }}>LITEYCA</option>
                                    <option value="INMEL" {{ $id->empresa == "INMEL" ? 'selected' : '' }}>INMEL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fechaElaboracion">Fecha de Elaboración del Informe<span class="color-red">*</span></label>
                                <input type="date" class="form-control" name="fechaElaboracion" value="{{ $id->fechaElaboracion }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="general[estacionBase]">¿Se tomaron fotos ANTES del mantenimiento?</label>
                            <br>
                            <label for="fotos[antes][SI]">SI</label>
                            <td class="text-center"><input type="radio" id="fotos[antes][NO]" {{ $general['fotos']['antes']== 'SI' ? 'checked' : '' }} name="fotos[antes]" value="SI"></td>
                            <label for="fotos[antes][NO]">NO</label>
                            <td class="text-center"><input type="radio" id="fotos[antes][SI]" {{ $general['fotos']['antes']== 'NO' ? 'checked' : '' }} name="fotos[antes]" value="NO"></td>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >¿Se tomaron fotos DESPUÉS del mantenimiento?</label>
                            <br>
                            <label for="fotos[despues][SI]">SI</label>
                            <td class="text-center"><input type="radio" id="fotos[despues][NO]" {{ $general['fotos']['despues']== 'SI' ? 'checked' : '' }} name="fotos[despues]" value="SI" checked></td>
                            <label for="fotos[despues][NO]">NO</label>
                            <td class="text-center"><input type="radio" id="fotos[despues][SI]" {{ $general['fotos']['despues']== 'NO' ? 'checked' : '' }} name="fotos[despues]" value="NO"></td>
                        </div>
                    </div>
                </div>
                    <div class="content">
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseZero">
                                        1). INFORMACIÓN GENERAL
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseZero" class="panel-collapse collapse">
                                <div class="box-body">
                                    @include('execution_works.maintenance.operacion.edit.dates_generals')
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-info">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        2). INFORMACIÓN DE LA ACTIVIDAD
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="box-body">
                                    @include('execution_works.maintenance.operacion.edit.activity')
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-warning">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                        3). HALLAZGOS
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="box-body">
                                    <h4>Descripción del plan de mejora:</h4>
                                    <div class="form-group">
                                        @include('execution_works.maintenance.operacion.edit.hallazgos')
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
@endsection

@section('js')
    <script src="{{ asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
    <script src="{{ asset('js/project/mintic/maintence/create.js') }}"></script>
@endsection
