@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear indicador
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Dirección</a></li>
        <li><a href="#">Indicadores</a></li>
        <li class="active">Crear indicadores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Crear nuevo indicador</div>
            <div class="box-tools">
                <a href="{{route('indicators')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="hide">
            <select name="selectOperators[]" id="selectOperators" class="form-control">
                <option></option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="(">(</option>
                <option value=")">)</option>
            </select>
            <input type="text" name="inputs[]" id="inputs" placeholder="Nombre del valor" class="form-control">
            <input type="number" name="values[]" id="values" placeholder="Numero" class="form-control">
        </div>
        <form action="{{route('indicators_store')}}" method="post"  enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formula">Formula</label>
                            <input type="text" name="formula" id="formula" value="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="periodicity">Peridicidad</label>
                            <select name="periodicity" class="form-control" id="periodicity">
                                <option disabled selected></option>
                                <option value="Anual">Anual</option>
                                <option value="Semestral">Semestral</option>
                                <option value="Trimestral">Trimestral</option>
                                <option value="Bimestral">Bimestral</option>
                                <option value="Mensual">Mensual</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="goal">Meta</label>
                            <input type="number" name="goal" id="goal" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="process_id">Proceso</label>
                            <select name="process_id" class="form-control" id="process_id">
                                <option disabled selected></option>
                                <option value="Dirección">Dirección</option>
                                <option value="Gestión Humana">Gestión Humana</option>
                                <option value="Ejecución de obras">Ejecución de obras</option>
                                <option value="Mercadeo y ventas">Mercadeo y ventas</option>
                                <option value="Servicio al cliente y garantía de obra">Servicio al cliente y garantía de obra</option>
                                <option value="Logística e infraestructura">Logística e infraestructura</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="analysis">Análisis</label>
                    <textarea name="analysis" id="analysis" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <hr>
                <h3>Formula</h3>
                <div id="caja_formula" class="row">
                    <div class="col-sm-3 text-center">
                        <button id="btn_operator" class="btn btn-sm btn-link">+ Operador</button>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button id="btn_input" class="btn btn-sm btn-link">+ Campo</button>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button id="btn_value" class="btn btn-sm btn-link">+ Valor</button>
                    </div>
                    <div class="col-sm-3 text-center">
                        <button id="btn_reset" class="btn btn-sm btn-danger">Limpiar</button>
                    </div>
                    <div class="col-sm-12">
                        <div id="actions">

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="hasFormula" id="hasFormula" placeholder="Vista previa de la formula" class="form-control" readonly>
                            <small class="text-muted" id="preview_form"></small>
                        </div>
                    </div>
                </div>
                <hr>
                <small>En las siguiente planeacion, las fechas se registra el numero de la semana</small>
                <h4>Fechas de cortes</h4>
                <div class="row" id="destino_breack">
                    <div class="origen_breack col-sm-3" id="origen_breack">
                        <div class="form-group">
                            <input type="week" name="month_breack[]" id="month_breack" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="button" id="add_breack" class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar</button>
                <hr>
                <h4>Fechas de hitos</h4>
                <div class="row" id="destino_alert">
                    <div class="origen_alert col-sm-3" id="origen_alert">
                        <div class="form-group">
                            <input type="week" name="month_alert[]" id="month_alert" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="button" id="add_alert" class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar</button>
            </div>
            <div class="box-footer">
                <button id="save" class="btn btn-sm btn-success">Guardar</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/indicators/edit.js') }}"></script>
@endsection