@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Editar indicador
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Dirección</a></li>
        <li><a href="#">Indicadores</a></li>
        <li class="active">Editar indicadores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">{{ $id->name }}</div>
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
        <form action="{{route('indicators_update',$id->id)}}" method="post"  enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" value="{{ $id->name }}" id="name" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formula">Formula</label>
                            <input type="text" name="formula" value="{{ $id->formula }}" id="formula" value="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="periodicity">Peridicidad</label>
                            <select name="periodicity" class="form-control" id="periodicity">
                                <option disabled selected></option>
                                <option {{ $id->periodicity == "Anual" ? 'selected' : '' }} value="Anual">Anual</option>
                                <option {{ $id->periodicity == "Semestral" ? 'selected' : '' }} value="Semestral">Semestral</option>
                                <option {{ $id->periodicity == "Trimestral" ? 'selected' : '' }} value="Trimestral">Trimestral</option>
                                <option {{ $id->periodicity == "Bimestral" ? 'selected' : '' }} value="Bimestral">Bimestral</option>
                                <option {{ $id->periodicity == "Mensual" ? 'selected' : '' }} value="Mensual">Mensual</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="goal">Meta</label>
                            <input type="number" name="goal" value="{{ $id->goal }}" id="goal" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="process_id">Proceso</label>
                            <select name="process_id" class="form-control" id="process_id">
                                <option disabled selected></option>
                                <option {{ $id->process_id == 'Dirección' ? 'selected' : '' }} value="Dirección">Dirección</option>
                                <option {{ $id->process_id == 'Gestión Humana' ? 'selected' : '' }} value="Gestión Humana">Gestión Humana</option>
                                <option {{ $id->process_id == 'Ejecución de obras' ? 'selected' : '' }} value="Ejecución de obras">Ejecución de obras</option>
                                <option {{ $id->process_id == 'Mercadeo y ventas' ? 'selected' : '' }} value="Mercadeo y ventas">Mercadeo y ventas</option>
                                <option {{ $id->process_id == 'Servicio al cliente y garantía de obra' ? 'selected' : '' }} value="Servicio al cliente y garantía de obra">Servicio al cliente y garantía de obra</option>
                                <option {{ $id->process_id == 'Logística e infraestructura' ? 'selected' : '' }} value="Logística e infraestructura">Logística e infraestructura</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="analysis">Análisis</label>
                    <textarea name="analysis" id="analysis" cols="30" rows="3" class="form-control">{{ $id->analysis }}</textarea>
                </div>
                @if (!$id->isAuto)    
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
                                <input type="text" name="hasFormula" id="hasFormula" value="{{ $id->hasFormula }}" placeholder="Vista previa de la formula" class="form-control" readonly>
                                <small class="text-muted" id="preview_form"></small>
                            </div>
                        </div>
                    </div>
                @endif
                <hr>
                <small>En las siguiente planeacion, las fechas se registra el numero de la semana y la fecha de corte se realiza el viernes de esa semana</small>
                <h4>Fechas de cortes</h4>
                <div class="row" id="destino_breack">
                    @foreach ($id->months as $item)
                        @if ($item->type == 1)
                            <div class="origen_breack col-sm-3" id="origen_breack">
                                <div class="form-group">
                                    <input type="week" value="{{ now()->format('Y') }}-W{{ $item->week }}" name="month_breack[]" id="month_breack" class="form-control">
                                    <input type="hidden" name="month_breack_id[]" value="{{ $item->id }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button type="button" id="add_breack" class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar</button>
                <hr>
                <h4>Fechas de hitos</h4>
                <div class="row" id="destino_alert">
                    @foreach ($id->months as $item)
                        @if ($item->type == 2)
                            <div class="origen_alert col-sm-3" id="origen_alert">
                                <div class="form-group">
                                    <input type="week" value="{{ now()->format('Y') }}-W{{ $item->week }}" name="month_alert[]" id="month_alert" class="form-control">
                                    <input type="hidden" name="month_alert_id[]" value="{{ $item->id }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
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