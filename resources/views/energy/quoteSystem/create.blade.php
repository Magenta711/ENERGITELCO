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
                <form action="{{ route('quote_energy_system.store') }}" method="POST">
                    @csrf
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a class="text-center" data-toggle="collapse" data-parent="#accordion" href="#Cliente">
                                    CLIENTE, UBICACIÓN E INFORMACIÓN DEL PROYECTO
                                </a>
                            </h4>
                        </div>
                        <div id="Cliente" class="panel-collapse collapse show">
                            <div class="box-body">
                                <div id="selectClient">
                                    <h4>Cliente</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="client">Seleccione el cliente</label>
                                                <select onchange="infoUser(this)" name="client" id="client"
                                                    class="form-control">
                                                    <option selected></option>
                                                    @foreach ($client as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name . '-' . $item->ide }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nameClient">Nombre</label>
                                                <input type="text" class="form-control" name="nameClient"
                                                    id="nameClient">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="typeId">Tipo de Identificación</label>
                                                <select name="typeId" id="typeId" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                                    <option value="Cédula de extranjería">Cédula de extranjería</option>
                                                    <option value="Pasaporte">Pasaporte</option>
                                                    <option value="NIT">NIT</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ide">Documento</label>
                                                <input type="text" class="form-control" name="ide" id="ide">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="locate">Ubicación</label>
                                                <input type="text" class="form-control" name="locate" id="locate">
                                            </div>
                                        </div>
                                        <div class="col-md-4"><label for="type_client">Tipo de Cliente</label><select
                                                name="type_client" id="type_client" class="form-control">
                                                <option selected></option>
                                                <option value="Distribuidor">Distribuidor</option>
                                                <option value="Cliente Final">Cliente Final</option>
                                                <option value="Instalador">Instalador</option>
                                                <option value="Otro">Otro</option>
                                            </select></div>
                                    </div>
                                </div>
                                <input type="hidden" name="newCliente" id="newCliente" value="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="newClient">Nuevo Cliente</label>
                                            <input type="checkbox" name="newClient" id="newClient">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="newClients" hidden>
                                    <div class="col-md-4"><label for="nameNew">Nombre</label><input type="text"
                                            class="form-control" name="nameNew" id="nameNew" value="{{ old('nameNew') }}">
                                    </div>
                                    <div class="col-md-4"><label for="typeIdNew">Tipo de Identificación</label><select
                                            name="typeIdNew" id="typeIdNew" class="form-control">
                                            <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                            <option value="Cédula de extranjería">Cédula de extranjería</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="NIT">NIT</option>
                                            <option value="Otro">Otro</option>
                                        </select></div>
                                    <div class="col-md-4"><label for="ideNew">Identificación/NIT</label><input
                                            type="text" class="form-control" name="ideNew" id="ideNew"
                                            value="{{ old('ideNew') }}">
                                    </div>
                                    <div class="col-md-4"><label for="telNew">Telefono de Contacto</label><input
                                            type="text" class="form-control" name="telNew" id="telNew"
                                            value="{{ old('telNew') }}">
                                    </div>
                                    <div class="col-md-4"><label for="emailNew">Correo Eléctronico</label><input
                                            type="text" class="form-control" name="emailNew" id="emailNew"
                                            value="{{ old('emailNew') }}">
                                    </div>
                                    <div class="col-md-4"><label for="departamentNew">Departamento</label><input
                                            type="text" class="form-control" name="departamentNew"
                                            id="departamentNew" value="{{ old('departamentNew') }}"></div>
                                    <div class="col-md-4"><label for="municipioNew">Municipio</label><input
                                            type="text" class="form-control" name="municipioNew" id="municipioNew"
                                            value="{{ old('municipioNew') }}">
                                    </div>
                                    <div class="col-md-4"><label for="type_clientNew">Tipo de Cliente</label><select
                                            name="type_clientNew" id="type_clientNew" class="form-control">
                                            <option selected></option>
                                            <option value="Distribuidor">Distribuidor</option>
                                            <option value="Cliente Final">Cliente Final</option>
                                            <option value="Instalador">Instalador</option>
                                            <option value="Otro">Otro</option>
                                        </select></div>
                                </div>
                                <hr>
                                <div class="locate">
                                    <h4>Ubicacióne Información del Proyecto</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="locateProject">Ubicación del Proyecto</label>
                                                <input type="text" class="form-control" name="locateProject"
                                                    id="locateProject" value="{{ old('locateProyect') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="claseSystem">Clase ON/OFF GRID</label>
                                                <select name="claseSystem" id="claseSystem" class="form-control"
                                                    required>
                                                    <option selected></option>
                                                    <option {{ old('claseSystem') == 'ON GRID' ? 'selected' : '' }}
                                                        value="ON GRID">ON GRID</option>
                                                    <option {{ old('claseSystem') == 'OFF GRID' ? 'selected' : '' }}
                                                        value="OFF GRID">OFF GRID</option>
                                                    <option {{ old('claseSystem') == 'HÍBRIDO' ? 'selected' : '' }}
                                                        value="HÍBRIDO">HÍBRIDO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="estrato">Estrato</label>
                                                <input type="text" class="form-control" name="estrato" id="estrato"
                                                    value="{{ old('estrato') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="consumo">Consumo Max KW/H Ult 6M</label>
                                                <input type="number" class="form-control" name="consumo" id="consumo"
                                                    value="{{ old('consumo') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="radiacion">Radiación Promedio KWh/m2/día</label>
                                                <input type="number" step="0.01" class="form-control"
                                                    name="radiacion" id="radiacion" value="{{ old('radiacion') }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="usd">Precio Dolar</label>
                                                <input type="number" class="form-control" name="usd" id="usd"
                                                    value="{{ old('usd') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="typeProject">Tipo de proyecto a cotizar</label>
                                                <input type="text" class="form-control" name="typeProject"
                                                    id="typeProject" value="{{ old('typeProyect') }}" required>
                                            </div>
                                        </div>
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
                                            <textarea name="objetivo_proyecto" id="objetivo_proyecto" class="form-control" required rows="3">{{ $plantilla->objetivo_proyecto ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion_proyecto">Descripción del Proyecto</label>
                                            <textarea name="descripcion_proyecto" id="descripcion_proyecto" class="form-control" required rows="3">{{ $plantilla->descripcion_proyecto ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="validez_oferta">Validez de la Oferta (días)</label>
                                            <input type="number" name="validez_oferta" id="validez_oferta"
                                                class="form-control" required
                                                value="{{ $plantilla->validez_oferta ?? '60' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polizas">Pólizas RC, Patronales y RE</label>
                                            <input type="text" name="polizas" id="polizas" class="form-control"
                                                required
                                                value="{{ $plantilla->polizas ?? 'SI DURANTE LA EJECUCION DEL CONTRATO' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_equipos">Garantía Equipos Electrónicos (años)</label>
                                            <input type="number" name="garantia_equipos" id="garantia_equipos"
                                                class="form-control" required
                                                value="{{ $plantilla->garantia_equipos ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_celdas">Garantía Celdas Solares (años)</label>
                                            <input type="number" name="garantia_celdas" id="garantia_celdas"
                                                class="form-control" required
                                                value="{{ $plantilla->garantia_celdas ?? '10' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_materiales">Garantía Materiales Eléctricos y Obras Civiles
                                                (años)</label>
                                            <input type="number" name="garantia_materiales" id="garantia_materiales"
                                                class="form-control" required
                                                value="{{ $plantilla->garantia_materiales ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="verificacion_sistema">Verificación Operación Sistema</label>
                                            <input type="text" name="verificacion_sistema" id="verificacion_sistema"
                                                class="form-control" required
                                                value="{{ $plantilla->verificacion_sistema ?? '2 A LOS 4 Y 8 MESES' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nivel_sst">Nivel SST</label>
                                            <input type="number" name="nivel_sst" id="nivel_sst" class="form-control"
                                                required value="{{ $plantilla->nivel_sst ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mantenimiento">Mantenimiento Incluido</label>
                                            <input type="text" name="mantenimiento" id="mantenimiento"
                                                class="form-control" required
                                                value="{{ $plantilla->mantenimiento ?? '1 A LOS 12 MESES ANTES SI ES REQUERIDO' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nota_importante">Nota Importante</label>
                                            <textarea name="nota_importante" id="nota_importante" class="form-control" required rows="2">{{ $plantilla->nota_importante ?? 'TODAS LAS GARANTIAS ESTAN SUJETAS A LA EJECUCION DE MANTENIMIENTOS PERIODICOS...' }}</textarea>
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
                                                required value="{{ $plantilla->iva ?? 19 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ValorKW">VALOR ACTUAL KW/H</label>
                                            <input type="number" step="0.01" name="ValorKW" id="ValorKW"
                                                class="form-control" required value="{{ $plantilla->valor_kw ?? 19 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><b>Flujo de la Inversión</b></h5>
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th style="width: 10%;">Item</th>
                                                    <th style="width: 30%;">Hito</th>
                                                    <th style="width: 10%;">% Inversión</th>
                                                    <th style="width: 15%;">Tipo Inversion</th>
                                                    <th style="width: 25%;">Avance Calendario Implementación</th>
                                                    <th>Acción</th>
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
                                                    <th style="width: 10%;">Item</th>
                                                    <th style="width: 30%;">Descripción</th>
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
                                                                value="{{ $precios->codigo }}"></td>
                                                        <td><input type="number"
                                                                name="precios[{{ $i }}][item]"
                                                                class="form-control" required
                                                                value="{{ $precios->item }}"></td>
                                                        <td><input type="text"
                                                                name="precios[{{ $i }}][descripcion]"
                                                                class="form-control" required
                                                                value="{{ $precios->descripcion }}">
                                                        </td>
                                                        <td>
                                                            <select name="precios[{{ $i }}][typeInversion]"
                                                                class="form-control typeInversion" required id=""
                                                                data-id="{{ $i }}">
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
                                                                value="{{ $precios->item }}" {{ $precios->panel == 'Si' ? 'checked' : '' }}>
                                                        </td>
                                                        <td><input type="number" step="0.01"
                                                                name="precios[{{ $i }}][usd]"
                                                                class="form-control usd" required
                                                                value="{{ $precios->usd }}"
                                                                data-id="{{ $i }}"></td>
                                                        <td><input type="number" step="0.01"
                                                                name="precios[{{ $i }}][cop]"
                                                                class="form-control cop" required
                                                                value="{{ $precios->cop }}"
                                                                data-id="{{ $i }}"></td>
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
                                                required value="{{ $plantilla->simulacionItems->Operador ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PromProduccion">Horas promedio de producción</label>
                                            <input type="number" name="PromProduccion" id="PromProduccion"
                                                class="form-control" required
                                                value="{{ $plantilla->simulacionItems->PromProduccion ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PromProduccionAnual">Dias promedio de producción al Año</label>
                                            <input type="number" name="PromProduccionAnual" id="PromProduccionAnual"
                                                class="form-control" required
                                                value="{{ $plantilla->simulacionItems->PromProduccionAnual ?? '' }}">
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
                                                @foreach ($plantilla->simulacionItems->kwh_ipc as $potencia)
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
                                                @foreach ($plantilla->simulacionItems->factor_potencia as $factor)
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
            if ($('#newClients').is(':hidden')) {
                $('#newClients').find('input, select, textarea').prop('disabled', true);
            }

            $('.typeInversion').each(function() {
                let typeInversion = $(this).val();
                let id = $(this).data('id');
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

            $('.typeInversion').change(function() {
                let typeInversion = $(this).val();
                let id = $(this).data('id');
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

        let rowIndex = {{ count($plantilla->flujos) ?? 0 }};
        let rowPrecios = {{ count($plantilla->precios) ?? 0 }};

        $('#Btn-plus-Objetivos').click(function() {
            rowIndex++;
            $('#flujoInversionTable').append(createObjetivos(rowIndex));
        });

        $('#Btn-plus-precios').click(function() {
            rowPrecios++;
            $('#listadoPreciosTable').append(createPrecios(rowPrecios));
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
                <td><input type="text" name="flujo[${rowIndex}][avance]" class="form-control" required></td>
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
                <td>
                    <select name="precios[${rowPrecios}][typeInversion]" class="form-control" required id="" data-id="${rowPrecios}">
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
                <td><input type="number" name="precios[${rowPrecios}][cop]"
                        class="form-control" required value="" data-id="${rowPrecios}"></td>
                <td><input type="number" name="precios[${rowPrecios}][usd]"
                        class="form-control" required value="" data-id="${rowPrecios}"></td>
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

        $('#newClient').change(function() {
            const checkbox = $('#newClient');
            if (checkbox.is(':checked')) {
                $('#newClients').show();
                $('#selectClient').hide();
                $('#newCliente').val(1);
                $('#newClients').find('input, select, textarea').prop('disabled', false);
            } else {
                $('#newClients').hide();
                $('#selectClient').show();
                $('#newCliente').val(0);
                $('#newClients').find('input, select, textarea').prop('disabled', true);
            }
        })

        function infoUser(element) {
            let id = element.value;
            $.get(`/energy/clients/info_user/` + id, function(data) {

                if (data.success) {
                    console.log(data.client);
                    $('#nameClient').val(data.client.name).prop('readonly', false);
                    $('#ide').val(data.client.ide);
                    $('#typeId').val(data.client.typeId);

                    // $('#locate').val(data.client.locate);
                    // $('#type_client').val(data.client.typeClient);
                } else {
                    alert(data.message);
                }
            });
        }
    </script>
@endsection
