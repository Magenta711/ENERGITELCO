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
            <li><a href="#">Siste Puesta a Tierra</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                    <div class="box-tools">
                        <a href="{{ route('land_index', $id->maintenance_id) }}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
            </div>
            <form action="{{ route('land_update', $id->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <h3>Información principal</h3>
                    <p>Datos obligatorios (*)</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tecnico">Nombre del Técnico <span class="color-red">*</span></label>
                                <input type="text" class="form-control" name="tecnico" value="{{ $id->tecnico }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="revisor">Nombre del Revisor <span class="color-red">*</span></label>
                                <input type="text" class="form-control" name="revisor" value="{{ $id->revisor }}">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseZero">
                                        1). Información General
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseZero" class="panel-collapse collapse">
                                <div class="box-body">
                                    @include('execution_works.maintenance.tierra.edit.dates_general')
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-info">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a  class="text-center" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        2). Mediciones y pruebas
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="box-body">
                                    @include('execution_works.maintenance.tierra.edit.pruebas')
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
                                    <div class="title text-center">
                                        <h3>PARAMETRO DE EVALUACIÓN</h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="table-responsable">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td>SAP</td>
                                                        <td>DESCRIPCIÓN</td>
                                                        <td>BIEN</td>
                                                        <td>REGULAR</td>
                                                        <td>MAL</td>
                                                        <td>NO APLOCA</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @for ($i = 1; $i <= 20; $i++)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $dates['check'][$i]['name'] }}
                                                            <input type="hidden" name="check[{{ $i }}][name]" value="{{ $dates['check'][$i]['name'] }}">
                                                            </td>
                                                            <td class="text-center"><input type="radio" name="check[{{ $i }}][value]" {{ $dates['check'][$i]['value'] == 'BIEN' ? 'checked' : ''  }} value="BIEN"></td>
                                                            <td class="text-center"><input type="radio" name="check[{{ $i }}][value]" {{ $dates['check'][$i]['value'] == 'REGULAR' ? 'checked' : ''  }} value="REGULAR"></td>
                                                            <td class="text-center"><input type="radio" name="check[{{ $i }}][value]" {{ $dates['check'][$i]['value'] == 'MAL' ? 'checked' : ''  }} value="MAL"></td>
                                                            <td class="text-center"><input type="radio" name="check[{{ $i }}][value]" {{ $dates['check'][$i]['value'] == 'NO APLICA' ? 'checked' : ''  }} value="NO APLICA"></td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                                        <textarea name="plan_mejora" id="plan_mejora" cols="30" rows="10" class="form-control">{{ $id->plan_mejora }}</textarea>
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
