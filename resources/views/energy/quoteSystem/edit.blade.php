@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Energía Solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="">Cotizaciones</li>
            <li class="active">Sistema Solar</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Realizar Cotización</div>
                <div class="box-tools">
                    <a href="{{ route('quote_energy_system.index') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <hr>
                <form action="{{ route('quote_energy_system.update', $plantilla->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a class="text-center" data-toggle="collapse" data-parent="#accordion" href="#Cliente">
                                    CLIENTE, UBICACIÓN E INFORMACIÓN DEL PROYECTO
                                </a>
                            </h4>
                        </div>
                        <div id="Cliente" class="panel-collapse collapse">
                            <div class="box-body">
                                <hr>
                                <div class="locate">
                                <h4>Cliente</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="responsable_id">Responsable</label>
                                        <input type="text" class="form-control" value="{{ $plantilla->client->name }}"
                                            readonly>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Teléfono</label>
                                        <input type="text" class="form-control" name=""
                                            value="{{ $plantilla->client->tel }}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Dirección</label>
                                        <input type="text" class="form-control" name=""
                                            value="{{ $plantilla->direccion }}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Correo</label>
                                        <input type="text" class="form-control" name=""
                                            value="{{ $plantilla->client->email }}" readonly>
                                    </div>
                                </div>
                                <h4>Responsable</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="responsable_id">Responsable</label>
                                        <input type="text" class="form-control" value="{{$pantilla->responsable->name ??  auth()->user()->name }}"
                                            readonly>
                                        <input type="hidden" class="form-control" value="{{ $pantilla->responsable->id ?? auth()->user()->id }}"
                                            name="responsable_id">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="responsable_telefono">Teléfono</label>
                                        <input type="text" class="form-control" name="responsable_telefono"
                                            value="{{ $pantilla->responsable->telefono ?? auth()->user()->telefono }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="responsable_direccion">Dirección</label>
                                        <input type="text" class="form-control" name="responsable_direccion"
                                            value="{{ $pantilla->responsable ?? 'CALLE 48B NRO 66 - 65 MEDELLIN' }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="responsable_correo">Correo</label>
                                        <input type="text" class="form-control" name="responsable_correo"
                                            value="{{ $pantilla->responsable ?? 'solar@energitelco.com' }}">
                                    </div>
                                </div>
                                <hr>
                                    <h4>Ubicacióne Información del Proyecto</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="locateProject">Ubicación del Proyecto</label>
                                                <input type="text" class="form-control" name="locateProject"
                                                    id="locateProject" value="{{ $plantilla->locateProject }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="claseSystem">Clase ON/OFF GRID</label>
                                                <select name="claseSystem" id="claseSystem" class="form-control" required>
                                                    <option selected></option>
                                                    <option {{ $plantilla->claseSystem == 'ON GRID' ? 'selected' : '' }}
                                                        value="ON GRID">ON GRID</option>
                                                    <option {{ $plantilla->claseSystem == 'OFF GRID' ? 'selected' : '' }}
                                                        value="OFF GRID">OFF GRID</option>
                                                    <option {{ $plantilla->claseSystem == 'HÍBRIDO' ? 'selected' : '' }}
                                                        value="HÍBRIDO">HÍBRIDO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="estrato">Estrato</label>
                                                <input type="text" class="form-control" name="estrato" id="estrato"
                                                    value="{{ $plantilla->estrato }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="consumo">Consumo Max KW/H Ult 6M</label>
                                                <input type="number" class="form-control" name="consumo" id="consumo"
                                                    value="{{ $plantilla->consumo }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="radiacion">Radiación Promedio KWh/m2/día</label>
                                                <input type="number" step="0.01" class="form-control" name="radiacion"
                                                    id="radiacion" value="{{ $plantilla->radiacion }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="usd">Precio Dolar</label>
                                                <input type="number" class="form-control" name="usd" id="usd"
                                                    value="{{ $plantilla->items->usd ?? 0 }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="typeProject">Tipo de proyecto a cotizar</label>
                                                <input type="text" class="form-control" name="typeProject"
                                                    id="typeProject" value="{{ $plantilla->typeProject }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="alturaPanel">Altura de Instalación de los Paneles</label>
                                                <input type="number" class="form-control" name="alturaPanel"
                                                    id="alturaPanel" value="{{ $plantilla->alturaPanel }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="trasiego">Requiero Trasiego Vertical</label>
                                                <input type="text" class="form-control" name="trasiego"
                                                    id="trasiego" value="{{ $plantilla->trasiego }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="distanPuntos">Distancia al Punto de Ins.</label>
                                                <input type="text" class="form-control" name="distanPuntos"
                                                    id="distanPuntos" value="{{ $plantilla->distanPuntos }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        @if ($plantilla->file_servicios)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        for="file_{{ $plantilla->file_servicios->description }}">{{ $plantilla->file_servicios->description }}</label><br>
                                                    <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                                        <img src="/storage/energy/quotes/{{ $plantilla->file_servicios->name }}"
                                                            alt="" width="75%"
                                                            id="preimg_{{ $plantilla->file_servicios->description }}">
                                                    </div>
                                                    <label for="file_{{ $plantilla->file_servicios->description }}"
                                                        class="form-control text-center">
                                                        <i class="fa fa-upload"></i>
                                                    </label>
                                                    <input type="file"
                                                        name="file_{{ $plantilla->file_servicios->description }}"
                                                        id="file_{{ $plantilla->file_servicios->description }}"
                                                        class="d-none file_create hide" accept="image/*">
                                                </div>
                                            </div>
                                        @else
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_Servicios">Cuenta de Servicios</label><br>
                                                        <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                                            <img src="" alt="" width="40%"
                                                                id="preimg_Servicios">
                                                        </div>
                                                        <label for="file_Servicios" class="form-control text-center">
                                                            <i class="fa fa-upload"></i>
                                                        </label>
                                                        <input type=" file" name="file_Servicios" id="file_Servicios"
                                                            class="d-none hide file_create" accept="image/*">
                                                    </div>
                                                </div>
                                        @endif
                                        @if ($plantilla->file_maps)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        for="file_Mapa">{{ $plantilla->file_maps->description }}</label><br>
                                                    <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                                        <img src="/storage/energy/quotes/{{ $plantilla->file_maps->name }}"
                                                            alt="" width="75%"
                                                            id="preimg_{{ $plantilla->file_maps->description }}">
                                                    </div>
                                                    <label for="file_Mapa" class="form-control text-center">
                                                        <i class="fa fa-upload"></i>
                                                    </label>
                                                    <input type="file" name="file_Mapa" id="file_Mapa"
                                                        class="hide file_create" accept="image/*">
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="file_Mapa">Vista aérea de la zona</label><br>
                                                    <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                                        <img src="" alt="" width="40%"
                                                            id="preimg_Mapa">
                                                    </div>
                                                    <label for="file_Mapa" class="form-control text-center">
                                                        <i class="fa fa-upload"></i>
                                                    </label>
                                                    <input type="file" name="file_Mapa" id="file_Mapa"
                                                        class="hide file_create" accept="image/*">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a class="text-center" data-toggle="collapse" data-parent="#accordion" href="#Objetivo">
                                    OBJETIVO DE OFERTA E IMPLEMENTACION
                                </a>
                            </h4>
                        </div>
                        <div id="Objetivo" class="panel-collapse collapse">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="objetivo_proyecto">Objetivo del Proyecto</label>
                                            <textarea name="objetivo_proyecto" id="objetivo_proyecto" class="form-control" required rows="3">{{ $plantilla->items->objetivo_proyecto ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion_proyecto">Descripción del Proyecto</label>
                                            <textarea name="descripcion_proyecto" id="descripcion_proyecto" class="form-control" required rows="3">{{ $plantilla->items->descripcion_proyecto ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="validez_oferta">Validez de la Oferta (días)</label>
                                            <input type="number" name="validez_oferta" id="validez_oferta"
                                                class="form-control" required
                                                value="{{ $plantilla->items->validez_oferta ?? '60' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fecha_oferta">FECHA PRESENTACION DE LA OFERTA:</label>
                                            <input type="text" name="fecha_oferta" id="fecha_oferta"
                                                class="form-control" required
                                                value="{{ $plantilla->items->fecha_oferta ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fin_oferta">ACEPTACION MAXIMA DE OFERTA CON EMISION DE DOCUMENTO DE
                                                ORDEN DE COMPRA:</label>
                                            <input type="text" name="fin_oferta" id="fin_oferta" class="form-control"
                                                required value="{{ $plantilla->items->fin_oferta ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polizas">Pólizas RC, Patronales y RE</label>
                                            <input type="text" name="polizas" id="polizas" class="form-control"
                                                required
                                                value="{{ $plantilla->items->polizas ?? 'SI DURANTE LA EJECUCION DEL CONTRATO' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_equipos">Garantía Equipos Electrónicos (años)</label>
                                            <input type="number" name="garantia_equipos" id="garantia_equipos"
                                                class="form-control" required
                                                value="{{ $plantilla->items->garantia_equipos ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_celdas">Garantía Celdas Solares (años)</label>
                                            <input type="number" name="garantia_celdas" id="garantia_celdas"
                                                class="form-control" required
                                                value="{{ $plantilla->items->garantia_celdas ?? '10' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_materiales">Garantía Materiales Eléctricos y Obras Civiles
                                                (años)</label>
                                            <input type="number" name="garantia_materiales" id="garantia_materiales"
                                                class="form-control" required
                                                value="{{ $plantilla->items->garantia_materiales ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="verificacion_sistema">Verificación Operación Sistema</label>
                                            <input type="text" name="verificacion_sistema" id="verificacion_sistema"
                                                class="form-control" required
                                                value="{{ $plantilla->items->verificacion_sistema ?? '2 A LOS 4 Y 8 MESES' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nivel_sst">Nivel SST</label>
                                            <input type="number" name="nivel_sst" id="nivel_sst" class="form-control"
                                                required value="{{ $plantilla->items->nivel_sst ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mantenimiento">Mantenimiento Incluido</label>
                                            <input type="text" name="mantenimiento" id="mantenimiento"
                                                class="form-control" required
                                                value="{{ $plantilla->items->mantenimiento ?? '1 A LOS 12 MESES ANTES SI ES REQUERIDO' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nota_importante">Nota Importante</label>
                                            <textarea name="nota_importante" id="nota_importante" class="form-control" required rows="2">{{ $plantilla->items->nota_importante ?? 'TODAS LAS GARANTIAS ESTAN SUJETAS A LA EJECUCION DE MANTENIMIENTOS PERIODICOS...' }}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a class="text-center" data-toggle="collapse" data-parent="#accordion" href="#Oferta">
                                    OFERTA ECONOMICA DE LA PROPUESTA
                                </a>
                            </h4>
                        </div>
                        <div id="Oferta" class="panel-collapse collapse">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Iva">% IVA</label>
                                            <input type="number" name="Iva" id="Iva" class="form-control"
                                                required value="{{ $plantilla->items->iva }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ValorKW">VALOR ACTUAL KW/H</label>
                                            <input type="number" step="0.01" name="ValorKW" id="ValorKW"
                                                class="form-control" required value="{{ $plantilla->items->valor_kw }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><b>Flujo de la Inversión</b></h5>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th style="width: 10%;">Item</th>
                                                    <th style="width: 20%;">Hito</th>
                                                    <th style="width: 10%;">% Inversión</th>
                                                    <th style="width: 15%;">Tipo Inversion</th>
                                                    <th style="width: 15%;">Rubro del Pago</th>
                                                    <th style="width: 20%;">Avance Calendario Implementación</th>
                                                    <th style="width: 10%">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="flujoInversionTable">
                                                @php
                                                    $oldCategories = old('hito', []);
                                                @endphp
                                                @foreach ($plantilla->flujos as $i => $flujo)
                                                    <tr class="text-center">
                                                        <td>
                                                            <input type="number" name="flujo[{{ $i }}][item]"
                                                                class="form-control" required
                                                                value="{{ $flujo->item }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="flujo[{{ $i }}][hito]"
                                                                class="form-control" required
                                                                value="{{ $flujo->hito }}">
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="flujo[{{ $i }}][inversion]"
                                                                class="form-control" required
                                                                value="{{ $flujo->inversion }}" max="100"
                                                                min="0">
                                                        </td>
                                                        <td>
                                                            <select name="flujo[{{ $i }}][typeInversion]"
                                                                class="form-control" required id="">
                                                                <option></option>
                                                                <option value="Valor2"
                                                                    {{ $flujo->typeInversion == 'Valor2' ? 'selected' : '' }}>
                                                                    Valor Equipos</option>
                                                                <option value="Valor3"
                                                                    {{ $flujo->typeInversion == 'Valor3' ? 'selected' : '' }}>
                                                                    Mano de Obra y Consumibles</option>
                                                                <option value="Valor4"
                                                                    {{ $flujo->typeInversion == 'Valor4' ? 'selected' : '' }}>
                                                                    Certificación y Tramites</option>
                                                                <option value="Valor5"
                                                                    {{ $flujo->typeInversion == 'Valor5' ? 'selected' : '' }}>
                                                                    Impuestos</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="flujo[{{ $i }}][rubro]"
                                                                class="form-control" required
                                                                value="{{ $flujo->rubro }}">
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="flujo[{{ $i }}][avance]"
                                                                class="form-control" required
                                                                value="{{ $flujo->avance }}">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                id="Btn-minus-Objetivos">X</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-success" id="Btn-plus-Objetivos"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Listado de Precios</b></h5>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th style="width: 12%;">Código</th>
                                                    <th style="width: 7%;">Item</th>
                                                    <th style="width: 20%;">Descripción</th>
                                                    <th style="width: 10%;">Unidad</th>
                                                    <th style="width: 7%;">Exento de Iva</th>
                                                    <th style="width: 15%;">Tipo Inversion</th>
                                                    <th style="width: 5%;">Paneles</th>
                                                    <th style="width: 10%;">Valor USD</th>
                                                    <th style="width: 10%;">Valor COP</th>
                                                    <th style="width: 8%;">Cantidad</th>
                                                    <th style="width: 5%;">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listadoPreciosTable">
                                                @foreach ($plantilla->precios as $i => $precios)
                                                    <tr class="text-center">
                                                        <td><input type="text"
                                                                name="precios[{{ $i }}][codigo]"
                                                                class="form-control" required
                                                                value="{{ $precios->codigo }}">
                                                        </td>
                                                        <td><input type="number"
                                                                name="precios[{{ $i }}][item]"
                                                                class="form-control" required
                                                                value="{{ $precios->item }}"></td>
                                                        <td><input type="text"
                                                                name="precios[{{ $i }}][descripcion]"
                                                                class="form-control" required
                                                                value="{{ $precios->descripcion }}">
                                                        </td>
                                                        <td><input type="text"
                                                                name="precios[{{ $i }}][unidad]"
                                                                class="form-control" required
                                                                value="{{ $precios->unidad }}">
                                                        </td>
                                                        <td>
                                                            <select name="precios[{{ $i }}][exento]"
                                                                class="form-control" required>
                                                                <option value="SI"
                                                                    {{ $precios->exento == 'SI' ? 'selected' : '' }}>
                                                                    SI</option>
                                                                <option value="NO"
                                                                    {{ $precios->exento == 'NO' ? 'selected' : '' }}>
                                                                    NO</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="precios[{{ $i }}][typeInversion]"
                                                                class="form-control typeInversion" required id=""
                                                                data-id="{{ $precios->item }}">
                                                                <option></option>
                                                                <option value="Valor2"
                                                                    {{ $precios->typeInversion == 'Valor2' ? 'selected' : '' }}>
                                                                    Valor Equipos</option>
                                                                <option value="Valor3"
                                                                    {{ $precios->typeInversion == 'Valor3' ? 'selected' : '' }}>
                                                                    Mano de Obra y Consumibles</option>
                                                                <option value="Valor4"
                                                                    {{ $precios->typeInversion == 'Valor4' ? 'selected' : '' }}>
                                                                    Certificación y Tramites</option>
                                                                <option value="Valor5"
                                                                    {{ $precios->typeInversion == 'Valor5' ? 'selected' : '' }}>
                                                                    Impuestos</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="panel"
                                                                value="{{ $precios->item }}"
                                                                {{ $precios->panel == 'Si' ? 'checked' : '' }}>
                                                        </td>
                                                        <td><input type="number" step="0.01"
                                                                name="precios[{{ $i }}][usd]"
                                                                class="form-control usd" required
                                                                value="{{ $precios->usd }}"
                                                                data-id="{{ $precios->item }}">
                                                        </td>
                                                        <td><input type="number" step="0.01"
                                                                name="precios[{{ $i }}][cop]"
                                                                class="form-control cop" required
                                                                value="{{ $precios->cop }}"
                                                                data-id="{{ $precios->item }}">
                                                        </td>
                                                        <td><input type="number"
                                                                name="precios[{{ $i }}][cantidad]"
                                                                class="form-control" required
                                                                value="{{ $precios->cantidad }}" min="0"></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="removePrecios(this)">X</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <button type="button" class="btn btn-success" id="Btn-plus-precios"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Fórmulas para calcular Valores</b></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="FormulaValor3">Formula Para Valor 3</label>
                                            <input type="text" name="FormulaValor3" id="FormulaValor3"
                                                class="form-control" required
                                                value="{{ $plantilla->simulacion->FormulaValor3 ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="FormulaValor4">Formula Para Valor 4</label>
                                            <input type="text" name="FormulaValor4" id="FormulaValor4"
                                                class="form-control" required
                                                value="{{ $plantilla->simulacion->FormulaValor4 ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5><b>Listado de Equipos</b></h5>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th style="width: 10%;">Item</th>
                                                    <th style="width: 60%;">Descripción Técina</th>
                                                    <th style="width: 20%;">Cantidad</th>

                                                    <th style="width: 5%;">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listadoEquiposTable">
                                                @foreach ($plantilla->simulacion->Equipos as $i => $equipos)
                                                    <tr class="text-center">
                                                        <td><input type="text"
                                                                name="Equipos[{{ $i }}][item]"
                                                                value="{{ $equipos['item'] }}" class="form-control"
                                                                required value=""></td>
                                                        <td><input type="text"
                                                                name="Equipos[{{ $i }}][descripcion]"
                                                                value="{{ $equipos['descripcion'] }}"
                                                                class="form-control" required>
                                                        </td>
                                                        <td><input type="number"
                                                                name="Equipos[{{ $i }}][cantidad]"
                                                                value="{{ $equipos['cantidad'] }}" class="form-control"
                                                                required>
                                                        </td>
                                                        <td><button type="button" class="btn btn-danger btn-sm"
                                                                onclick="removeRow(this)">X</button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <button type="button" class="btn btn-success" id="Btn-plus-equipos"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="potenciaPanel">Potencia de los Paneles (KW)</label>
                                            <input type="number" step="0.01" name="potenciaPanel" id="potenciaPanel"
                                                class="form-control" required value="{{ $plantilla->potenciaPanel ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="margenError">Margen de Error en Producción Mensual</label>
                                            <input type="number" step="0.01" name="margenError" id="margenError"
                                                class="form-control" required value="{{ $plantilla->margenError ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a class="text-center" data-toggle="collapse" data-parent="#accordion"
                                    href="#Inversion">
                                    FLUJO DE PRODUCCION Y RETORNO DE LA INVERSION
                                </a>
                            </h4>
                        </div>
                        <div id="Inversion" class="panel-collapse collapse">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Operador">Operador de Red</label>
                                            <input type="text" name="Operador" id="Operador" class="form-control"
                                                required value="{{ $plantilla->simulacion->Operador ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PromProduccion">Horas promedio de producción</label>
                                            <input type="number" name="PromProduccion" id="PromProduccion"
                                                class="form-control" required
                                                value="{{ $plantilla->simulacion->PromProduccion ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PromProduccionAnual">Dias promedio de producción al Año</label>
                                            <input type="number" name="PromProduccionAnual" id="PromProduccionAnual"
                                                class="form-control" required
                                                value="{{ $plantilla->simulacion->PromProduccionAnual ?? '' }}">
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="mb-3"><b>Factores de Simulación</b></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Valor KWh con Aumento (IPC) por Rango de Año</label>
                                            <div class="row">
                                                @php
                                                    $año = 1;
                                                @endphp
                                                @foreach ($plantilla->simulacion->kwh_ipc as $potencia)
                                                    <div class="col-md-4">
                                                        <input type="number" step="0.01" required
                                                            name="kwh_ipc[{{ $año }}]" class="form-control"
                                                            placeholder="Año 1" value="{{ $potencia }}">
                                                        <small class="form-text text-muted text-center">Año
                                                            {{ $año }}</small>
                                                    </div>
                                                    @php $año += 5; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nuevo Factor de Potencia por Rango de Año</label>
                                            <div class="row">
                                                @php
                                                    $año = 1;
                                                @endphp
                                                @foreach ($plantilla->simulacion->factor_potencia as $factor)
                                                    <div class="col-md-2">
                                                        <input type="number" step="0.01" required min="0"
                                                            max="1" name="factor_potencia[{{ $año }}]"
                                                            id="factor_potencia[{{ $año }}]"
                                                            class="form-control" value="{{ $factor }}">
                                                        <small class="form-text text-muted text-center">Año
                                                            {{ $año }}</small>
                                                    </div>
                                                    @php $año += 5; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <small class="text-muted">Los campos anteriores alimentan la simulación: producción
                                            anual por periodo, valor produccion (COP) y acumulados. Puedes ajustar
                                            cualquiera de los valores para ver su efecto en los cálculos.</small>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PromedioCO2">Consumo Promedio del cliente de CO2:</label>
                                            <input type="number" class="form-control" name="PromedioCO2"
                                                value="{{ $plantilla->simulacion->PromedioCO2 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success submit">Guardar</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.file_create').change(function() {
                const idPreview = this.id.replace('file_', 'preimg_');
                console.log('Renderizando preview:', idPreview);
                readImage(this, idPreview);
            });

            $('.file-edit').change(function() {
                let id = this.id.split('_')[this.id.split('_').length - 1];
                console.log(id);
                $($('#' + this.id).parent().children('label')).addClass('text-aqua');
                readImageEdit(this, id);
            });

            $('.typeInversion').each(function() {
                let typeInversion = $(this).val();
                let id = $(this).data('id');
                console.log('Aqui entra');
                if (typeInversion === 'Valor2') {
                    $(`.cop[data-id=${id}]`).prop('readonly', true);
                    $(`.usd[data-id=${id}]`).prop('readonly', false);
                    $(`.cop[data-id=${id}]`).val('');
                } else {
                    $(`.usd[data-id=${id}]`).prop('readonly', true);
                    $(`.cop[data-id=${id}]`).prop('readonly', false);
                    $(`.usd[data-id=${id}]`).val('');
                }
            });

        });

        $(document).on('change', '.typeInversion', function () {
            console.log('Aqui entra');
            let typeInversion = $(this).val();
            let id = $(this).data('id');
            if (typeInversion === 'Valor2') {
                $(`.cop[data-id=${id}]`).prop('readonly', true).val('');
                $(`.usd[data-id=${id}]`).prop('readonly', false);
            } else {
                $(`.usd[data-id=${id}]`).prop('readonly', true).val('');
                $(`.cop[data-id=${id}]`).prop('readonly', false);
            }
        });

        function readImage(input, idPreview) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + idPreview).attr('src', e.target.result); // renderizamos la imagen correcta
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        let rowIndex = {{ count($plantilla->flujos) ?? 0 }};
        let rowPrecios = {{ count($plantilla->precios) ?? 0 }};
        let rowEquipos = {{ count($plantilla->simulacion->Equipos) ?? 0 }};


        $('#Btn-plus-Objetivos').click(function() {
            rowIndex++;
            $('#flujoInversionTable').append(createObjetivos(rowIndex));
        });

        $('#Btn-plus-precios').click(function() {
            rowPrecios++;
            $('#listadoPreciosTable').append(createPrecios(rowPrecios));
        });

        $('#Btn-plus-equipos').click(function() {
            rowEquipos++;
            $('#listadoEquiposTable').append(createEquipos(rowEquipos));
        });

        function createObjetivos(rowIndex) {
            let row = `
            <tr class="text-center">
                <td><input type="number" name="flujo[${rowIndex}][item]" class="form-control" required value="${rowIndex}"></td>
                <td><input type="text" name="flujo[${rowIndex}][hito]" class="form-control" required></td>
                <td>
                    <input type="number" name="flujo[${rowIndex}][inversion]" class="form-control" required
                        value="" max="100" min="0">
                </td>
                <td>
                    <select name="flujo[${rowIndex}][t {{ $flujo->typeInversion == '}][' ? 'selected' : '' }}ypeInversion]" class="form-control" required id="">
                        <option></option>
                        <option value="Valor2">Valor Equipos</option>
                        <option value="Valor3">Mano de Obra y Consumibles</option>
                        <option value="Valor4">Certificación y Tramites</option>
                        <option value="Valor5">Impuestos</option>
                    </select>
                </td>
                <td><input type="text" name="flujo[${rowIndex}][rubro]" class="form-control" required></td>
                <td><input type="text" name="flujo[${rowIndex}][avance]" class="form-control" required></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">X</button></td>
            </tr>
            `;
            return row;
        }


        function createEquipos(rowEquipos) {
            let row = `
            <tr class="text-center">
                <td><input type="text" name="Equipos[${rowEquipos}][item]" class="form-control" required value=""></td>
                <td><input type="text" name="Equipos[${rowEquipos}][descripcion]" class="form-control" required></td>
                <td><input type="number" name="Equipos[${rowEquipos}][cantidad]" class="form-control" required></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">X</button></td>
            </tr>
            `;
            return row;
        }

        function createPrecios(rowPrecios) {
            let row = `
             <tr>
                <td><input type="text" name="precios[${rowPrecios}][codigo]" class="form-control" required
                        value="ENER SOLAR ${rowPrecios}"></td>
                <td><input type="number" name="precios[${rowPrecios}][item]" class="form-control" required
                        value="${rowPrecios}"></td>
                <td><input type="text" name="precios[${rowPrecios}][descripcion]"
                        class="form-control" required value="">
                </td>
                <td><input type="text"
                    name="precios[${rowPrecios}][unidad]" class="form-control" required value="{{ $precios->unidad }}">
                </td>
                <td>
                    <select name="precios[${rowPrecios}][exento]"
                        class="form-control" required>
                        <option value="SI"
                            {{ $precios->exento == 'SI' ? 'selected' : '' }}>
                            SI</option>
                        <option value="NO"
                            {{ $precios->exento == 'NO' ? 'selected' : '' }}>
                            NO</option>
                    </select>
                </td>
                <td>
                    <select name="precios[${rowPrecios}][typeInversion]" class="form-control typeInversion" required id="" data-id="${rowPrecios}">
                        <option></option>
                        <option value="Valor2">Valor Equipos</option>
                        <option value="Valor3">Mano de Obra y Consumibles</option>
                        <option value="Valor4">Certificación y Tramites</option>
                        <option value="Valor5">Impuestos</option>
                    </select>
                </td>
                <td>
                    <input type="radio" name="panel" value="${rowPrecios}">
                </td>
                <td><input type="number" step="0.01" name="precios[${rowPrecios}][usd]"
                    class="form-control usd" required value="" data-id="${rowPrecios}"></td>
                <td><input type="number" step="0.01" name="precios[${rowPrecios}][cop]"
                    class="form-control cop" required value="" data-id="${rowPrecios}"></td>
                <td><input type="number" name="precios[${rowPrecios}][cantidad]"
                        class="form-control" required value=""></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm"
                        onclick="removeRow(this)">X</button>
                </td>
            </tr>
            `;
            return row;
        }

        function removeRow(button) {
            rowIndex--;
            button.closest('tr').remove();
        }

        function removePrecios(button) {
            rowPrecios--;
            button.closest('tr').remove();
        }

        function removeEquipos(button) {
            rowEquipos--;
            button.closest('tr').remove();
        }
    </script>
@endsection
`
