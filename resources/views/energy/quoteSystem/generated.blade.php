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
                <h4>Ubicacióne Información del Proyecto</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="clientName">Cliente</label>
                            <p> {{ $id->client->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="clientIde">CC/NIT</label>
                            <p> {{ $id->client->ide }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="locateProject">Ubicación del Proyecto</label>
                            <p> {{ $id->locateProject }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="claseSystem">Clase ON/OFF GRID</label>
                            <p> {{ $id->claseSystem }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estrato">Estrato</label>
                            <p> {{ $id->estrato }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="consumo">Consumo Max KW/H Ult 6M</label>
                            <p>{{ $id->consumo }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="typeProject">Tipo de proyecto a cotizar</label>
                            <p> {{ $id->typeProject }}</p>
                        </div>
                    </div>
                </div>
                 <hr>
                <h4>Objetivos</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="objetivo_proyecto">Objetivo del Proyecto</label>
                            <p>{{ $id->items->objetivo_proyecto ?? '' }}</p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descripcion_proyecto">Descripción del Proyecto</label>
                            <p>{{ $id->items->descripcion_proyecto ?? '' }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="validez_oferta">Validez de la Oferta (días)</label>
                                <p>{{ $id->items->validez_oferta}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_oferta">FECHA PRESENTACION DE LA OFERTA:</label>
                                <p>{{ $id->items->fecha_oferta }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fin_oferta">ACEPTACION MAXIMA DE OFERTA CON EMISION DE DOCUMENTO DE ORDEN DE
                                COMPRA:</label>
                                <p>{{ $id->items->fin_oferta}}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="polizas">Pólizas RC, Patronales y RE</label>
                                <p>{{ $id->items->polizas}}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="garantia_equipos">Garantía Equipos Electrónicos (años)</label>
                                <p>{{ $id->items->garantia_equipos }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="garantia_celdas">Garantía Celdas Solares (años)</label>
                                <p>{{ $id->items->garantia_celdas}}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="garantia_materiales">Garantía Materiales Eléctricos y Obras Civiles
                                (años)</label>
                                <p>{{ $id->items->garantia_materiales}}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="verificacion_sistema">Verificación Operación Sistema</label>
                                <p>{{ $id->items->verificacion_sistema }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nivel_sst">Nivel SST</label>
                                <p>{{ $id->items->nivel_sst}}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mantenimiento">Mantenimiento Incluido</label>
                                <p>{{ $id->items->mantenimiento}}></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nota_importante">Nota Importante</label>
                            <p>{{ $id->items->nota_importante}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Imagenes</h4>
                @if ($id->files)
                    <div class="row">

                        @foreach ($id->files as $items)
                            <div class="col-md-6 text-center">
                                <label for="img">{{ $items->name }}</label>
                                <br>
                                <img id="img" src="/storage/energy/quotes/{{ $items->name }}" style="width: 75%;"
                                    alt="Attachment">
                            </div>
                        @endforeach
                    </div>
                @endif
                <hr>
                <h4>Oferta Económica</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ValorUSD">Valor USD</label>
                            <p> ${{ number_format($id->items->usd, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Valor1">Valor 1</label>
                            <span>USD EQUIPOS</span>
                            <p>${{ number_format($id->valores['Valor1'], 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Valor2">Valor 2</label>
                            <span>COP EQUIPOS:</span>
                            <p>${{ number_format($id->valores['Valor2'], 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Valor3">Valor 3</label>
                            <span>COP MANO OBRA Y CONSUMIBLES</span>
                            <p>${{ number_format($id->valores['Valor3'], 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Valor4">Valor 4</label>
                            <span>CERTIFICACION Y TRAMITES</span>
                            <p>${{ number_format($id->valores['Valor4'], 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Valor5">Valor 5</label>
                            <span>IMPUESTOS</span>
                            <p>${{ number_format($id->valores['Valor5'], 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Flujo de la Inversión</b></h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target=".flujo-modal-lg"><i
                                class="fa fa-edit"></i></a>
                    </div>
                    @include('energy.quoteSystem.includes.flujo_update')
                    <div class="col-md-12">
                        <br>
                        <table class="table table-bordered">
                            <thead class="thead-light text-center">
                                <tr class="text-center">
                                    <th style="width: 5%;">Item</th>
                                    <th style="width: 30%;">Hito</th>
                                    <th style="width: 5%;">% Inversión</th>
                                    <th style="width: 10%;">Tipo Inversion</th>
                                    <th style="width: 10%;">Valor</th>
                                    <th style="width: 10%;">Valor Acumulado</th>
                                    <th style="width: 25%;">Avance Calendario Implementación</th>
                                </tr>
                            </thead>
                            <tbody id="flujoInversionTable">
                                @php
                                    $oldCategories = old('hito', []);
                                @endphp
                                @foreach ($id->flujos as $i => $flujo)
                                    <tr class="text-center">
                                        <td>
                                            <p>{{ $flujo->item }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $flujo->hito }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $flujo->inversion }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $flujo->typeInversion }}</p>
                                        </td>
                                        <td>
                                            <p>${{ number_format($flujo->valor, 2, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            <p>${{ number_format($flujo->valorAcumulado, 2, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $flujo->avance }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Listado de Precios</b></h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target=".precio-modal-lg"><i
                                class="fa fa-edit"></i></a>
                    </div>
                    @include('energy.quoteSystem.includes.precios_update')
                    <div class="col-md-12">
                        <br>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 12%;">Código</th>
                                    <th style="width: 5%;">Item</th>
                                    <th style="width: 30%;">Descripción</th>
                                    <th style="width: 15%;">Tipo Inversion</th>
                                    <th style="width: 10%;">Valor USD</th>
                                    <th style="width: 10%;">Valor COP</th>
                                    <th style="width: 5%;">Cantidad</th>
                                    <th style="width: 10%;">Total</th>
                                </tr>
                            </thead>
                            <tbody id="listadoPreciosTable">
                                @foreach ($id->precios as $i => $precios)
                                    <tr class="text-center">
                                        <td>
                                            <p>{{ $precios->codigo }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $precios->item }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $precios->descripcion }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $precios->typeInversion }}</p>
                                        </td>
                                        <td>
                                            <p>${{ number_format($precios->usd, 2, ',', '.') }}</p>
                                        </td>
                                        <td>
                                            ${{ number_format($precios->cop, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            <p>{{ $precios->cantidad }}</p>
                                        <td>
                                            <p>${{ number_format($precios->total, 2, ',', '.') }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-right">
                            <h4><b>Total USD: ${{ number_format($id->totalUSD, 2, ',', '.') }}</b></h4>
                            <h4><b>Total COP: ${{ number_format($id->totalCOP, 2, ',', '.') }}</b></h4>
                            <h4><b>IVA: ${{ number_format($id->totalCOP * ($id->items->iva / 100), 2, ',', '.') }}</b></h4>
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
                                </tr>
                            </thead>
                            <tbody id="listadoEquiposTable">
                                @foreach ($id->simulacion->Equipos as $i => $equipos)
                                    <tr class="text-center">
                                        <td>{{ $equipos['item'] }}</td>
                                        <td>{{ $equipos['descripcion'] }}</td>
                                        <td>{{ $equipos['cantidad'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <h4>FLUJO DE PRODUCCION Y RETORNO DE LA INVERSION</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Operador">Operador de Red</label>
                            <p>{{ $id->simulacion->Operador ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="PromProduccion">Horas promedio de producción</label>
                            <p>{{ $id->simulacion->PromProduccion ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="PromProduccionAnual">Dias promedio de producción al Año</label>
                            <p>{{ $id->simulacion->PromProduccionAnual ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-grou">
                            <label for="capacidadInstalada">Capacidad Instalada</label>
                            <p>{{ $id->capacidadInstalada }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Produccions Anuales estimadas</h4>
                @foreach ($id->produccionFinal as $key => $item)
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Año {{ $key }}</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">KW/H PRODUCIDOS AÑO {{ $key }}</label>
                                <p>{{ $item['factor'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">PRODUCCION AÑO {{ $key }} EN COP</label>
                                <p>{{ $item['kwh'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">VALOR PRODUCCION PRIMEROS 5 AÑOS: </label>
                                <p>{{ $item['produccion'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">VALOR MANTENIMIENTO PRIMEROS 5 AÑOS:</label>
                                <p>{{ $item['mantenimiento'] }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">VALOR COP ESTIMADO PRIMEROS 5 AÑOS:</label>
                                <p>{{ $item['estimacion'] }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <hr>

                <h4>Gráficos</h4>
                <div class="container" style="width: 85%;">
                    <canvas id="grafica"></canvas>
                </div>
                <hr>
                <div class="container" style="width: 85%;">
                    <canvas id="grafica2"></canvas>
                </div>
                <h4>Resumen de la Inversión</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="totalSistema">Total Inversión COP</label>
                            <h2> <b>
                                    $ {{ number_format($id->totalSistema, 2, ',', '.') }}
                                </b>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="descuentoRenta">Descuento de la renta</label>
                            <h2> <b>
                                    $ {{ number_format($id->descuentoRenta, 2, ',', '.') }}
                                </b>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="valorIva">Valor del Iva</label>
                            <h2> <b>
                                    $ {{ number_format($id->valores['Valor5'], 2, ',', '.') }}
                                </b>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="totalInversion">Inversion real contable</label>
                            <h2> <b>
                                    $ {{ number_format($id->totalInversion, 2, ',', '.') }}
                                </b>
                            </h2>
                        </div>
                    </div>
                </div>

                <hr>
                @can('Aprobar y rechazar Cotizaciones')
                    @if ($id->status == 'Pendiente')
                    <a href="" class="btn btn-success" data-toggle="modal"
                        data-target=".approved-modal-lg">Aprobar</a>
                    <a href="" class="btn btn-danger" data-toggle="modal"
                        data-target=".noapproved-modal-lg">Rechazar</a>
                    @endif
                @endcan
                @include('energy.quoteSystem.includes.approved')
                @include('energy.quoteSystem.includes.noapproved')
            </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        let rowIndex = {{ count($id->flujos) ?? 0 }};
        let rowPrecios = {{ count($id->precios) ?? 0 }};

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
                <td><input type="number" step="0.01" name="precios[${rowPrecios}][cop]"
                        class="form-control" required value="" data-id="${rowPrecios}"></td>
                <td><input type="number" step="0.01" name="precios[${rowPrecios}][usd]"
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
        const data = @json($id->retorno);
    </script>
    <script src="{{ asset('js/quotes/grafica1.js') }}"></script>
@endsection
