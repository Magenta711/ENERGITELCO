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
                <div class="box-title">Plantilla de Items</div>
                <div class="box-tools">
                    <a href="{{ route('quote_energy_system.index') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <p>Esta es la plantilla para la realización de una cotización de energía Solar, estos campos serán los que
                    se verán a la hora de generar dicha cotización. Sim embargo, se pueden modificar en la realización.</p>
                <hr>
                <form action="{{ route('quote_energy_system.items_store') }}" method="POST">
                    @csrf
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
                                            <textarea name="objetivo_proyecto" id="objetivo_proyecto" class="form-control" required rows="3">{{ $item->objetivo_proyecto ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion_proyecto">Descripción del Proyecto</label>
                                            <textarea name="descripcion_proyecto" id="descripcion_proyecto" class="form-control" required rows="3">{{ $item->descripcion_proyecto ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="validez_oferta">Validez de la Oferta (días)</label>
                                            <input type="number" name="validez_oferta" id="validez_oferta"
                                                class="form-control" required value="{{ $item->validez_oferta ?? '60' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polizas">Pólizas RC, Patronales y RE</label>
                                            <input type="text" name="polizas" id="polizas" class="form-control"
                                                required
                                                value="{{ $item->polizas ?? 'SI DURANTE LA EJECUCION DEL CONTRATO' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_equipos">Garantía Equipos Electrónicos (años)</label>
                                            <input type="number" name="garantia_equipos" id="garantia_equipos"
                                                class="form-control" required value="{{ $item->garantia_equipos ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_celdas">Garantía Celdas Solares (años)</label>
                                            <input type="number" name="garantia_celdas" id="garantia_celdas"
                                                class="form-control" required value="{{ $item->garantia_celdas ?? '10' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="garantia_materiales">Garantía Materiales Eléctricos y Obras Civiles
                                                (años)</label>
                                            <input type="number" name="garantia_materiales" id="garantia_materiales"
                                                class="form-control" required
                                                value="{{ $item->garantia_materiales ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="verificacion_sistema">Verificación Operación Sistema</label>
                                            <input type="text" name="verificacion_sistema" id="verificacion_sistema"
                                                class="form-control" required
                                                value="{{ $item->verificacion_sistema ?? '2 A LOS 4 Y 8 MESES' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nivel_sst">Nivel SST</label>
                                            <input type="number" name="nivel_sst" id="nivel_sst" class="form-control"
                                                required value="{{ $item->nivel_sst ?? '5' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mantenimiento">Mantenimiento Incluido</label>
                                            <input type="text" name="mantenimiento" id="mantenimiento"
                                                class="form-control" required
                                                value="{{ $item->mantenimiento ?? '1 A LOS 12 MESES ANTES SI ES REQUERIDO' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nota_importante">Nota Importante</label>
                                            <textarea name="nota_importante" id="nota_importante" class="form-control" required rows="2">{{ $item->nota_importante ?? 'TODAS LAS GARANTIAS ESTAN SUJETAS A LA EJECUCION DE MANTENIMIENTOS PERIODICOS...' }}</textarea>
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
                                                required value="{{ $item->iva}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ValorKW">VALOR ACTUAL KW/H</label>
                                            <input type="number" step="0.01" name="ValorKW" id="ValorKW" class="form-control"
                                                required value="{{ $item->valor_kw}}">
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
                                                @foreach ($item->flujos as $i => $flujo)
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
                                                    <th style="width: 2%;">Acción</th>

                                                </tr>
                                            </thead>
                                            <tbody id="listadoPreciosTable">
                                                @foreach ($item->precios as $i => $precios)
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
                                                        <td><input type="number"
                                                                name="precios[{{ $i }}][cop]"
                                                                class="form-control cop" required
                                                                value="{{ $precios->cop }}"
                                                                data-id="{{ $i }}"></td>
                                                        <td><input type="number"
                                                                name="precios[{{ $i }}][cantidad]"
                                                                class="form-control" required
                                                                value="{{ $precios->cantidad }}"></td>
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
                                                @foreach ($item->simulacionItems->Equipos as $i => $equipos)
                                                    <tr class="text-center">
                                                        <td><input type="text" name="Equipos[{{ $i }}][item]" value="{{ $equipos['item'] }}" class="form-control" required value=""></td>
                                                        <td><input type="text" name="Equipos[{{ $i }}][descripcion]" value="{{ $equipos['descripcion'] }}" class="form-control" required></td>
                                                        <td><input type="number" name="Equipos[{{ $i }}][cantidad]" value="{{ $equipos['cantidad'] }}" class="form-control" required></td>
                                                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">X</button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <button type="button" class="btn btn-success" id="Btn-plus-equipos"><i
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
                                                required value="{{ $item->simulacionItems->Operador ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PromProduccion">Horas promedio de producción</label>
                                            <input type="number" name="PromProduccion" id="PromProduccion"
                                                class="form-control" required value="{{ $item->simulacionItems->PromProduccion ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PromProduccionAnual">Dias promedio de producción al Año</label>
                                            <input type="number" name="PromProduccionAnual" id="PromProduccionAnual"
                                                class="form-control" required value="{{ $item->simulacionItems->PromProduccionAnual ?? '' }}">
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
                                                @foreach ($item->simulacionItems->kwh_ipc as $potencia)
                                                    <div class="col-md-4">
                                                        <input type="number" step="0.01" required name="kwh_ipc[{{ $año }}]"
                                                            class="form-control" placeholder="Año 1" value="{{ $potencia }}">
                                                        <small class="form-text text-muted text-center">Año {{ $año }}</small>
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
                                                @foreach ($item->simulacionItems->factor_potencia as $factor)
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
                                            <input type="number" class="form-control" name="PromedioCO2" value="{{ $item->simulacionItems->PromedioCO2 }}">
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

        let rowIndex = {{ count($item->flujos) ?? 0 }};
        let rowPrecios = {{ count($item->precios) ?? 0 }};
        let rowEquipos = {{ count($item->simulacionItems->Equipos) }};

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
                    <select name="flujo[${rowIndex}][typeInversion]" class="form-control" required id="">
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
                <td>
                    <select name="precios[${rowPrecios}][typeInversion]" class="form-control" required id="">
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
                        class="form-control" required value=""></td>
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
