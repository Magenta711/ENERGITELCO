<div class="modal fade precio-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><b>Modal de Oferta en el inicio</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('quote_energy_system.precio_pdate', $id->id) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                            @foreach ($id->precios as $i => $precios)
                                <tr class="text-center">
                                    <td><input type="text" name="precios[{{ $i }}][codigo]"
                                            class="form-control" required value="{{ $precios->codigo }}"></td>
                                    <td><input type="number" name="precios[{{ $i }}][item]"
                                            class="form-control" required value="{{ $precios->item }}"></td>
                                    <td><input type="text" name="precios[{{ $i }}][descripcion]"
                                            class="form-control" required value="{{ $precios->descripcion }}">
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
                                        <input type="radio" name="panel" value="{{ $precios->item }}"
                                            {{ $precios->panel == 'Si' ? 'checked' : '' }}>
                                    </td>
                                    <td><input type="number" step="0.01" name="precios[{{ $i }}][usd]"
                                            class="form-control usd" required value="{{ $precios->usd }}"
                                            data-id="{{ $i }}"></td>
                                    <td><input type="number" step="0.01" name="precios[{{ $i }}][cop]"
                                            class="form-control cop" required value="{{ $precios->cop }}"
                                            data-id="{{ $i }}"></td>
                                    <td><input type="number" name="precios[{{ $i }}][cantidad]"
                                            class="form-control" required value="{{ $precios->cantidad }}"
                                            min="0"></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="removePrecios(this)">X</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right">
                        <button type="button" class="btn btn-success" id="Btn-plus-precios"><i
                                class="fa fa-plus"></i></button>
                    </div>
                    <hr>
                    <button class="btn-submit btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
