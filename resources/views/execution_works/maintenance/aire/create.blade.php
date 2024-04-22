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
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                    <div class="box-tools">
                        <a href="{{ route('air_index', $id->id) }}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
            </div>
            <form action="{{ route('air_store', $id->id) }}" method="POST">
                @method('POST')
                @csrf
                <div class="box-body">
                    <h3>Información principal</h3>
                    <p>Datos obligatorios (*)</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tecnico">Nombre del Técnico <span class="color-red">*</span></label>
                                <input type="text" class="form-control" name="tecnico" value="{{ old('tecnico') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="revisor">Nombre del Revisor <span class="color-red">*</span></label>
                                <input type="text" class="form-control" name="revisor" value="{{ old('revisor') }}">
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
                                    @include('execution_works.maintenance.aire.include.dates_generals')
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
                                    @include('execution_works.maintenance.aire.include.check_list')
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
                                    @include('execution_works.maintenance.aire.include.actions')
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
                                        <textarea name="plan_mejora" id="plan_mejora" cols="30" rows="10" class="form-control"></textarea>
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
