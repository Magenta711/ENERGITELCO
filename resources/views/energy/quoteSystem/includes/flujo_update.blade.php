<div class="modal fade flujo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Flujo de Inversión</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('quote_energy_system.fLujo_pdate', $id->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h5><b>Actualice el Flujo de Inversión:</b></h5>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th style="width: 10%;">Item</th>
                            <th style="width: 30%;">Hito</th>
                            <th style="width: 10%;">% Inversión</th>
                            <th style="width: 15%;">Tipo Inversion</th>
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
                                    <input type="number" name="flujo[{{ $i }}][item]" class="form-control"
                                        required value="{{ $flujo->item }}">
                                </td>
                                <td>
                                    <input type="text" name="flujo[{{ $i }}][hito]" class="form-control"
                                        required value="{{ $flujo->hito }}">
                                </td>
                                <td>
                                    <input type="number" name="flujo[{{ $i }}][inversion]"
                                        class="form-control" required value="{{ $flujo->inversion }}" max="100"
                                        min="0">
                                </td>
                                <td>
                                    <select name="flujo[{{ $i }}][typeInversion]" class="form-control"
                                        required id="">
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
                                    <input type="text" name="flujo[{{ $i }}][avance]"
                                        class="form-control" required value="{{ $flujo->avance }}">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        id="Btn-minus-Objetivos">X</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                    <button type="button" class="btn btn-success" id="Btn-plus-Objetivos"><i
                        class="fa fa-plus"></i></button>
                </div>
                <hr>
                <button class="btn-submit btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
