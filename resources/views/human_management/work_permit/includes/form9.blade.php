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
                            <option {{old('f9a2u1') == '5000' ? 'selected' : ''}} value="5000">Trabajo Exitoso en CD O BTS a 5 km de ciudad de origen del tecnico ($5.000)</option>
                            <option {{old('f9a2u1') == '10000' ? 'selected' : ''}} value="10000">Trabajo Exitoso en CD O BTS a 50 km de ciudad de origen del tecnico ($10.000)</option>
                            <option {{old('f9a2u1') == '15000' ? 'selected' : ''}} value="15000">Trabajo Exitoso en CD O BTS a 100 km de ciudad de origen del tecnico ($15.000)</option>
                            <option {{old('f9a2u1') == '20000' ? 'selected' : ''}} value="20000">Trabajo Exitoso en CD O BTS a más de 100 km de ciudad de origen del tecnico ($20.000)</option>
                            <option {{old('f9a2u1') == '63000' ? 'selected' : ''}} value="63000">Si la salida es antes de las 07:00 ($63.000)</option>
                            <option {{old('f9a2u1') == '55000' ? 'selected' : ''}} value="55000">Si la salida es antes de las 09:00 ($55.000)</option>
                            <option {{old('f9a2u1') == '45000' ? 'selected' : ''}} value="45000">Si la salida es después de las 09:00 ($45.000)</option>
                            <option {{old('f9a2u1') == '70000' ? 'selected' : ''}} value="70000">Día de viáticos en comisión completo ($70.000)</option>
                            <option {{old('f9a2u1') == '15000' ? 'selected' : ''}} value="15000">Si el regreso es antes de las 13:00 ($15.000)</option>
                            <option {{old('f9a2u1') == '25000' ? 'selected' : ''}} value="25000">Si el regreso es después de las 13:00 ($25.000)</option>
                            <option {{old('f9a2u1') == '35000' ? 'selected' : ''}} value="35000">Si el regreso es después de las 20:00 ($35.000)</option>
                            <option {{old('f9a2u1') == '40000' ? 'selected' : ''}} value="40000">Si el regreso es entre las 22:00 y las 03:00, con moto asignada ($40.000)</option>
                            <option {{old('f9a2u1') == '50000' ? 'selected' : ''}} value="50000">Si el regreso es entre las 22:00 y las 03:00, sin moto asignada ($50.000)</option>
                        </select>
                        {{-- <input type="number" name="f9a2u1" value="{{ old('f9a2u1') }}" id="" class="form-control" placeholder="Funcionario 1"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a2u2" id="f9a2u2" class="form-control">
                            <option {{old('f9a2u2') == '0' ? 'selected' : ''}} value="0">No aplica (0)</option>
                            <option {{old('f9a2u2') == '5000' ? 'selected' : ''}} value="5000">Trabajo Exitoso en CD O BTS a 5 km de ciudad de origen del tecnico ($5.000)</option>
                            <option {{old('f9a2u2') == '10000' ? 'selected' : ''}} value="10000">Trabajo Exitoso en CD O BTS a 50 km de ciudad de origen del tecnico ($10.000)</option>
                            <option {{old('f9a2u2') == '15000' ? 'selected' : ''}} value="15000">Trabajo Exitoso en CD O BTS a 100 km de ciudad de origen del tecnico ($15.000)</option>
                            <option {{old('f9a2u2') == '20000' ? 'selected' : ''}} value="20000">Trabajo Exitoso en CD O BTS a más de 100 km de ciudad de origen del tecnico ($20.000)</option>
                            <option {{old('f9a2u2') == '63000' ? 'selected' : ''}} value="63000">Si la salida es antes de las 07:00 ($63.000)</option>
                            <option {{old('f9a2u2') == '55000' ? 'selected' : ''}} value="55000">Si la salida es antes de las 09:00 ($55.000)</option>
                            <option {{old('f9a2u2') == '45000' ? 'selected' : ''}} value="45000">Si la salida es después de las 09:00 ($45.000)</option>
                            <option {{old('f9a2u2') == '70000' ? 'selected' : ''}} value="70000">Día de viáticos en comisión completo ($70.000)</option>
                            <option {{old('f9a2u2') == '15000' ? 'selected' : ''}} value="15000">Si el regreso es antes de las 13:00 ($15.000)</option>
                            <option {{old('f9a2u2') == '25000' ? 'selected' : ''}} value="25000">Si el regreso es después de las 13:00 ($25.000)</option>
                            <option {{old('f9a2u2') == '35000' ? 'selected' : ''}} value="35000">Si el regreso es después de las 20:00 ($35.000)</option>
                            <option {{old('f9a2u2') == '40000' ? 'selected' : ''}} value="40000">Si el regreso es entre las 22:00 y las 03:00, con moto asignada ($40.000)</option>
                            <option {{old('f9a2u2') == '50000' ? 'selected' : ''}} value="50000">Si el regreso es entre las 22:00 y las 03:00, sin moto asignada ($50.000)</option>
                        </select>
                        {{-- <input type="number" name="f9a2u2" value="{{ old('f9a2u2') }}" id="" class="form-control" placeholder="Funcionario 2"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a2u3" id="f9a2u3" class="form-control">
                            <option {{old('f9a2u3') == '0' ? 'selected' : ''}} value="0">No aplica (0)</option>
                            <option {{old('f9a2u3') == '5000' ? 'selected' : ''}} value="5000">Trabajo Exitoso en CD O BTS a 5 km de ciudad de origen del tecnico ($5.000)</option>
                            <option {{old('f9a2u3') == '10000' ? 'selected' : ''}} value="10000">Trabajo Exitoso en CD O BTS a 50 km de ciudad de origen del tecnico ($10.000)</option>
                            <option {{old('f9a2u3') == '15000' ? 'selected' : ''}} value="15000">Trabajo Exitoso en CD O BTS a 100 km de ciudad de origen del tecnico ($15.000)</option>
                            <option {{old('f9a2u3') == '20000' ? 'selected' : ''}} value="20000">Trabajo Exitoso en CD O BTS a más de 100 km de ciudad de origen del tecnico ($20.000)</option>
                            <option {{old('f9a2u3') == '63000' ? 'selected' : ''}} value="63000">Si la salida es antes de las 07:00 ($63.000)</option>
                            <option {{old('f9a2u3') == '55000' ? 'selected' : ''}} value="55000">Si la salida es antes de las 09:00 ($55.000)</option>
                            <option {{old('f9a2u3') == '45000' ? 'selected' : ''}} value="45000">Si la salida es después de las 09:00 ($45.000)</option>
                            <option {{old('f9a2u3') == '70000' ? 'selected' : ''}} value="70000">Día de viáticos en comisión completo ($70.000)</option>
                            <option {{old('f9a2u3') == '15000' ? 'selected' : ''}} value="15000">Si el regreso es antes de las 13:00 ($15.000)</option>
                            <option {{old('f9a2u3') == '25000' ? 'selected' : ''}} value="25000">Si el regreso es después de las 13:00 ($25.000)</option>
                            <option {{old('f9a2u3') == '35000' ? 'selected' : ''}} value="35000">Si el regreso es después de las 20:00 ($35.000)</option>
                            <option {{old('f9a2u3') == '40000' ? 'selected' : ''}} value="40000">Si el regreso es entre las 22:00 y las 03:00, con moto asignada ($40.000)</option>
                            <option {{old('f9a2u3') == '50000' ? 'selected' : ''}} value="50000">Si el regreso es entre las 22:00 y las 03:00, sin moto asignada ($50.000)</option>
                        </select>
                        {{-- <input type="number" name="f9a2u3" value="{{ old('f9a2u3') }}" id="" class="form-control" placeholder="Funcionario 3"> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="f9a2u4" id="f9a2u4" class="form-control">
                            <option {{old('f9a2u4') == '0' ? 'selected' : ''}} value="0">No aplica (0)</option>
                            <option {{old('f9a2u4') == '5000' ? 'selected' : ''}} value="5000">Trabajo Exitoso en CD O BTS a 5 km de ciudad de origen del tecnico ($5.000)</option>
                            <option {{old('f9a2u4') == '10000' ? 'selected' : ''}} value="10000">Trabajo Exitoso en CD O BTS a 50 km de ciudad de origen del tecnico ($10.000)</option>
                            <option {{old('f9a2u4') == '15000' ? 'selected' : ''}} value="15000">Trabajo Exitoso en CD O BTS a 100 km de ciudad de origen del tecnico ($15.000)</option>
                            <option {{old('f9a2u4') == '20000' ? 'selected' : ''}} value="20000">Trabajo Exitoso en CD O BTS a más de 100 km de ciudad de origen del tecnico ($20.000)</option>
                            <option {{old('f9a2u4') == '63000' ? 'selected' : ''}} value="63000">Si la salida es antes de las 07:00 ($63.000)</option>
                            <option {{old('f9a2u4') == '55000' ? 'selected' : ''}} value="55000">Si la salida es antes de las 09:00 ($55.000)</option>
                            <option {{old('f9a2u4') == '45000' ? 'selected' : ''}} value="45000">Si la salida es después de las 09:00 ($45.000)</option>
                            <option {{old('f9a2u4') == '70000' ? 'selected' : ''}} value="70000">Día de viáticos en comisión completo ($70.000)</option>
                            <option {{old('f9a2u4') == '15000' ? 'selected' : ''}} value="15000">Si el regreso es antes de las 13:00 ($15.000)</option>
                            <option {{old('f9a2u4') == '25000' ? 'selected' : ''}} value="25000">Si el regreso es después de las 13:00 ($25.000)</option>
                            <option {{old('f9a2u4') == '35000' ? 'selected' : ''}} value="35000">Si el regreso es después de las 20:00 ($35.000)</option>
                            <option {{old('f9a2u4') == '40000' ? 'selected' : ''}} value="40000">Si el regreso es entre las 22:00 y las 03:00, con moto asignada ($40.000)</option>
                            <option {{old('f9a2u4') == '50000' ? 'selected' : ''}} value="50000">Si el regreso es entre las 22:00 y las 03:00, sin moto asignada ($50.000)</option>
                        </select>
                        {{-- <input type="number" name="f9a2u3" value="{{ old('f9a2u3') }}" id="" class="form-control" placeholder="Funcionario 3"> --}}
                    </div>
                </div>
            </div>
            <hr>
            <input type="hidden" name="caja_menor_pendiente" value="{{$minor_boxes->charges}}" id="caja_menor_pendiente">
            <div class="form-gruop">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <label for="solicitar">Solcitar caja menor propia</label>
                        <input type="number" name="f9a3u1" value="{{ old('f9a3u1') ?? 0 }}" id="solicitar" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <label for="caja_menor">Caja menor pendiente por descargar</label>
                        <input type="text" name="caja_menor" value="${{isset($minor_boxes->charges) ? number_format($minor_boxes->charges,2) : "Hola mundo"}}" id="caja_menor" class="form-control" disabled >
                        {{-- <p>${{number_format($minor_boxes->charges,2,',','.')}}</p> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <label for="caja_pendiente">Caja menor pendiente por aprovar</label>
                        {{-- <p>{{number_format($minor_box_unapproved['caja'], 2, ',', '.')}}</p> --}}
                        <input type="text" name="caja_pendiente" value="{{isset($minor_box_unapproved['caja']) ? '$'.number_format($minor_box_unapproved['caja'],2)  : "$0" }}"  id="caja_pendiente" class="form-control" disabled>
                        {{-- <p>${{ number_format($minor_box_unapproved['caja'], 2, ',', '.') }}</p> --}}
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <label for="caja_pendiente">Total de caja menor </label>
                        {{-- <input type="text" name="caja_pendiente" value="${{ number_format($minor_box_unapproved['caja'], 2, ',', '.') }}"  id="caja_pendiente" class="form-control" disabled> --}}
                        {{-- <p>${{ number_format($minor_box_unapproved['caja'], 2, ',', '.') }}</p> --}}
                        <input type="text" class="form-control has-error" name="total_caja" id="total_caja" value="$0.00" disabled>
                        <p id="tope_mensaje"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
