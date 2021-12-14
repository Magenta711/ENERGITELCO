<div class="panel box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                9. Comisiones
            </a>
        </h4>
    </div>
    <div id="collapseNine" class="panel-collapse collapse">
        <div class="box-body">
            <div class="form-gruop">
            {{-- @if (now()->format('Y-m-d H:i:s') <= '2021-12-10 24:00:00') --}}
                <label for="observaciones">Seleccione el valor que considera de bonificaciones</label>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a1u1" id="f9a1u1" class="form-control">
                            <option value="0">No aplica (0)</option>
                            <option {{old('f9a1u1') == '5000' ? 'selected' : ''}} value="5000">Cliente Energitelco (5000)</option>
                            <option {{old('f9a1u1') == '5000' ? 'selected' : ''}} value="5000">Técnico I cliente Claro 50% efectividad (5000)</option>
                            <option {{old('f9a1u1') == '7000' ? 'selected' : ''}} value="7000">Técnico I cliente Claro 70% efectividad (7000)</option>
                            <option {{old('f9a1u1') == '10000' ? 'selected' : ''}} value="10000">Técnico I cliente Claro 100% efectividad (10000)</option>
                            <option {{old('f9a1u1') == '7500' ? 'selected' : ''}} value="7500">Técnico II cliente Claro 50% efectividad (7500)</option>
                            <option {{old('f9a1u1') == '10500' ? 'selected' : ''}} value="10500">Técnico II cliente Claro 70% efectividad (10500)</option>
                            <option {{old('f9a1u1') == '15000' ? 'selected' : ''}} value="15000">Técnico II cliente Claro 100% efectividad (15000)</option>
                            <option {{old('f9a1u1') == '10000' ? 'selected' : ''}} value="10000">Técnico III cliente Claro 50% efectividad (10000)</option>
                            <option {{old('f9a1u1') == '14000' ? 'selected' : ''}} value="14000">Técnico III cliente Claro 70% efectividad (14000)</option>
                            <option {{old('f9a1u1') == '20000' ? 'selected' : ''}} value="20000">Técnico III cliente Claro 100% efectividad (20000)</option>
                        </select>
                        {{-- <input type="number" name="f9a1u1" value="{{ old('f9a1u1') }}" id="" class="form-control" placeholder="Funcionario 1"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a1u2" id="f9a1u2" class="form-control">
                            <option value="0">No aplica (0)</option>
                            <option {{old('f9a1u2') == '5000' ? 'selected' : ''}} value="5000">Cliente Energitelco (5000)</option>
                            <option {{old('f9a1u2') == '5000' ? 'selected' : ''}} value="5000">Técnico I cliente Claro 50% efectividad (5000)</option>
                            <option {{old('f9a1u2') == '7000' ? 'selected' : ''}} value="7000">Técnico I cliente Claro 70% efectividad (7000)</option>
                            <option {{old('f9a1u2') == '10000' ? 'selected' : ''}} value="10000">Técnico I cliente Claro 100% efectividad (10000)</option>
                            <option {{old('f9a1u2') == '7500' ? 'selected' : ''}} value="7500">Técnico II cliente Claro 50% efectividad (7500)</option>
                            <option {{old('f9a1u2') == '10500' ? 'selected' : ''}} value="10500">Técnico II cliente Claro 70% efectividad (10500)</option>
                            <option {{old('f9a1u2') == '15000' ? 'selected' : ''}} value="15000">Técnico II cliente Claro 100% efectividad (15000)</option>
                            <option {{old('f9a1u2') == '10000' ? 'selected' : ''}} value="10000">Técnico III cliente Claro 50% efectividad (10000)</option>
                            <option {{old('f9a1u2') == '14000' ? 'selected' : ''}} value="14000">Técnico III cliente Claro 70% efectividad (14000)</option>
                            <option {{old('f9a1u2') == '20000' ? 'selected' : ''}} value="20000">Técnico III cliente Claro 100% efectividad (20000)</option>
                        </select>
                        {{-- <input type="number" name="f9a1u2" value="{{ old('f9a1u2') }}" id="" class="form-control" placeholder="Funcionario 2"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a1u3" id="f9a1u3" class="form-control">
                            <option value="0">No aplica (0)</option>
                            <option {{old('f9a1u3') == '5000' ? 'selected' : ''}} value="5000">Cliente Energitelco (5000)</option>
                            <option {{old('f9a1u3') == '5000' ? 'selected' : ''}} value="5000">Técnico I cliente Claro 50% efectividad (5000)</option>
                            <option {{old('f9a1u3') == '7000' ? 'selected' : ''}} value="7000">Técnico I cliente Claro 70% efectividad (7000)</option>
                            <option {{old('f9a1u3') == '10000' ? 'selected' : ''}} value="10000">Técnico I cliente Claro 100% efectividad (10000)</option>
                            <option {{old('f9a1u3') == '7500' ? 'selected' : ''}} value="7500">Técnico II cliente Claro 50% efectividad (7500)</option>
                            <option {{old('f9a1u3') == '10500' ? 'selected' : ''}} value="10500">Técnico II cliente Claro 70% efectividad (10500)</option>
                            <option {{old('f9a1u3') == '15000' ? 'selected' : ''}} value="15000">Técnico II cliente Claro 100% efectividad (15000)</option>
                            <option {{old('f9a1u3') == '10000' ? 'selected' : ''}} value="10000">Técnico III cliente Claro 50% efectividad (10000)</option>
                            <option {{old('f9a1u3') == '14000' ? 'selected' : ''}} value="14000">Técnico III cliente Claro 70% efectividad (14000)</option>
                            <option {{old('f9a1u3') == '20000' ? 'selected' : ''}} value="20000">Técnico III cliente Claro 100% efectividad (20000)</option>
                        </select>
                        {{-- <input type="number" name="f9a1u3" value="{{ old('f9a1u3') }}" id="" class="form-control" placeholder="Funcionario 3"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a1u4" id="f9a1u4" class="form-control">
                            <option value="0">No aplica (0)</option>
                            <option {{old('f9a1u4') == '5000' ? 'selected' : ''}} value="5000">Cliente Energitelco (5000)</option>
                            <option {{old('f9a1u4') == '5000' ? 'selected' : ''}} value="5000">Técnico I cliente Claro 50% efectividad (5000)</option>
                            <option {{old('f9a1u4') == '7000' ? 'selected' : ''}} value="7000">Técnico I cliente Claro 70% efectividad (7000)</option>
                            <option {{old('f9a1u4') == '10000' ? 'selected' : ''}} value="10000">Técnico I cliente Claro 100% efectividad (10000)</option>
                            <option {{old('f9a1u4') == '7500' ? 'selected' : ''}} value="7500">Técnico II cliente Claro 50% efectividad (7500)</option>
                            <option {{old('f9a1u4') == '10500' ? 'selected' : ''}} value="10500">Técnico II cliente Claro 70% efectividad (10500)</option>
                            <option {{old('f9a1u4') == '15000' ? 'selected' : ''}} value="15000">Técnico II cliente Claro 100% efectividad (15000)</option>
                            <option {{old('f9a1u4') == '10000' ? 'selected' : ''}} value="10000">Técnico III cliente Claro 50% efectividad (10000)</option>
                            <option {{old('f9a1u4') == '14000' ? 'selected' : ''}} value="14000">Técnico III cliente Claro 70% efectividad (14000)</option>
                            <option {{old('f9a1u4') == '20000' ? 'selected' : ''}} value="20000">Técnico III cliente Claro 100% efectividad (20000)</option>
                        </select>
                        {{-- <input type="number" name="f9a1u3" value="{{ old('f9a1u3') }}" id="" class="form-control" placeholder="Funcionario 3"> --}}
                    </div>
                </div>
            </div>
            <hr>
            {{-- @endif --}}
            <div class="form-gruop">
                <label for="observaciones">Seleccione el valor que considera de viáticos</label>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a2u1" id="f9a2u1" class="form-control">
                            <option {{old('f9a2u1') == '0' ? 'selected' : ''}} value="0">No aplica (0)</option>
                            <option {{old('f9a2u1') == '8000' ? 'selected' : ''}} value="8000">Trabajo de más de 5 horas en campo (EB) a más de 80 km de su ciudad de operación (8000)</option>
                            <option {{old('f9a2u1') == '60000' ? 'selected' : ''}} value="60000">Si la salida es antes de las 06:00 (60000)</option>
                            <option {{old('f9a2u1') == '52000' ? 'selected' : ''}} value="52000">Si la salida es antes de las 10:00 (52000)</option>
                            <option {{old('f9a2u1') == '42000' ? 'selected' : ''}} value="42000">Si la salida es después de las 10:00 (42000)</option>
                            <option {{old('f9a2u1') == '65000' ? 'selected' : ''}} value="65000">Día de viáticos en comisión (65000)</option>
                            <option {{old('f9a2u1') == '15000' ? 'selected' : ''}} value="15000">Si el regreso es antes de las 12:00 (15000)</option>
                            <option {{old('f9a2u1') == '25000' ? 'selected' : ''}} value="25000">Si el regreso es después de las 13:00 (25000)</option>
                            <option {{old('f9a2u1') == '35000' ? 'selected' : ''}} value="35000">Si el regreso es después de las 20:00 (35000)</option>
                            <option {{old('f9a2u1') == '50000' ? 'selected' : ''}} value="50000">Si el regreso es entre las 22:00 y las 03:00 (50000)</option>
                        </select>
                        {{-- <input type="number" name="f9a2u1" value="{{ old('f9a2u1') }}" id="" class="form-control" placeholder="Funcionario 1"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a2u2" id="f9a2u2" class="form-control">
                            <option {{old('f9a2u2') == '0' ? 'selected' : ''}} value="0">No aplica (0)</option>
                            <option {{old('f9a2u2') == '8000' ? 'selected' : ''}} value="8000">Trabajo de más de 5 horas en campo (EB) a más de 80 km de su ciudad de operación (8000)</option>
                            <option {{old('f9a2u2') == '60000' ? 'selected' : ''}} value="60000">Si la salida es antes de las 06:00 (60000)</option>
                            <option {{old('f9a2u2') == '52000' ? 'selected' : ''}} value="52000">Si la salida es antes de las 10:00 (52000)</option>
                            <option {{old('f9a2u2') == '42000' ? 'selected' : ''}} value="42000">Si la salida es después de las 10:00 (42000)</option>
                            <option {{old('f9a2u2') == '65000' ? 'selected' : ''}} value="65000">Día de viáticos en comisión (65000)</option>
                            <option {{old('f9a2u2') == '15000' ? 'selected' : ''}} value="15000">Si el regreso es antes de las 12:00 (15000)</option>
                            <option {{old('f9a2u2') == '25000' ? 'selected' : ''}} value="25000">Si el regreso es después de las 13:00 (25000)</option>
                            <option {{old('f9a2u2') == '35000' ? 'selected' : ''}} value="35000">Si el regreso es después de las 20:00 (35000)</option>
                            <option {{old('f9a2u2') == '50000' ? 'selected' : ''}} value="50000">Si el regreso es entre las 22:00 y las 03:00 (50000)</option>
                        </select>
                        {{-- <input type="number" name="f9a2u2" value="{{ old('f9a2u2') }}" id="" class="form-control" placeholder="Funcionario 2"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a2u3" id="f9a2u3" class="form-control">
                            <option {{old('f9a2u3') == '0' ? 'selected' : ''}} value="0">No aplica (0)</option>
                            <option {{old('f9a2u3') == '8000' ? 'selected' : ''}} value="8000">Trabajo de más de 5 horas en campo (EB) a más de 80 km de su ciudad de operación (8000)</option>
                            <option {{old('f9a2u3') == '60000' ? 'selected' : ''}} value="60000">Si la salida es antes de las 06:00 (60000)</option>
                            <option {{old('f9a2u3') == '52000' ? 'selected' : ''}} value="52000">Si la salida es antes de las 10:00 (52000)</option>
                            <option {{old('f9a2u3') == '42000' ? 'selected' : ''}} value="42000">Si la salida es después de las 10:00 (42000)</option>
                            <option {{old('f9a2u3') == '65000' ? 'selected' : ''}} value="65000">Día de viáticos en comisión (65000)</option>
                            <option {{old('f9a2u3') == '15000' ? 'selected' : ''}} value="15000">Si el regreso es antes de las 12:00 (15000)</option>
                            <option {{old('f9a2u3') == '25000' ? 'selected' : ''}} value="25000">Si el regreso es después de las 13:00 (25000)</option>
                            <option {{old('f9a2u3') == '35000' ? 'selected' : ''}} value="35000">Si el regreso es después de las 20:00 (35000)</option>
                            <option {{old('f9a2u3') == '50000' ? 'selected' : ''}} value="50000">Si el regreso es entre las 22:00 y las 03:00 (50000)</option>
                        </select>
                        {{-- <input type="number" name="f9a2u3" value="{{ old('f9a2u3') }}" id="" class="form-control" placeholder="Funcionario 3"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a2u4" id="f9a2u4" class="form-control">
                            <option {{old('f9a2u4') == '0' ? 'selected' : ''}} value="0">No aplica (0)</option>
                            <option {{old('f9a2u4') == '8000' ? 'selected' : ''}} value="8000">Trabajo de más de 5 horas en campo (EB) a más de 80 km de su ciudad de operación (8000)</option>
                            <option {{old('f9a2u4') == '60000' ? 'selected' : ''}} value="60000">Si la salida es antes de las 06:00 (60000)</option>
                            <option {{old('f9a2u4') == '52000' ? 'selected' : ''}} value="52000">Si la salida es antes de las 10:00 (52000)</option>
                            <option {{old('f9a2u4') == '42000' ? 'selected' : ''}} value="42000">Si la salida es después de las 10:00 (42000)</option>
                            <option {{old('f9a2u4') == '65000' ? 'selected' : ''}} value="65000">Día de viáticos en comisión (65000)</option>
                            <option {{old('f9a2u4') == '15000' ? 'selected' : ''}} value="15000">Si el regreso es antes de las 12:00 (15000)</option>
                            <option {{old('f9a2u4') == '25000' ? 'selected' : ''}} value="25000">Si el regreso es después de las 13:00 (25000)</option>
                            <option {{old('f9a2u4') == '35000' ? 'selected' : ''}} value="35000">Si el regreso es después de las 20:00 (35000)</option>
                            <option {{old('f9a2u4') == '50000' ? 'selected' : ''}} value="50000">Si el regreso es entre las 22:00 y las 03:00 (50000)</option>
                        </select>
                        {{-- <input type="number" name="f9a2u3" value="{{ old('f9a2u3') }}" id="" class="form-control" placeholder="Funcionario 3"> --}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-gruop">
                <label for="observaciones">Digite el valor que considera de caja menor</label>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <input type="number" name="f9a3u1" value="{{ old('f9a3u1') ?? 0 }}" id="" class="form-control" placeholder="Funcionario 1">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <input type="number" name="f9a3u2" value="{{ old('f9a3u2') ?? 0 }}" id="" class="form-control" placeholder="Funcionario 2">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <input type="number" name="f9a3u3" value="{{ old('f9a3u3') ?? 0 }}" id="" class="form-control" placeholder="Funcionario 3">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <input type="number" name="f9a3u4" value="{{ old('f9a3u4') ?? 0 }}" id="" class="form-control" placeholder="Funcionario 4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>