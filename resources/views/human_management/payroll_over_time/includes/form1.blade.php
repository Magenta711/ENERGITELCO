<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>/</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Total neto a pagar</th>
                <th>Estado</th>
                <th>/</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
                <tr>
                    <th><input type="checkbox" name="user_add[{{ $user->id }}]" id="user_add_{{ $user->id }}"
                            value="{{ $user->id }}" class="check_user"></th>
                    <th>{{ $user->cedula }}</th>
                    <td>{{ $user->name }}</td>
                    <td id="total_pay_td_{{ $user->id }}">$ 0.00</td>
                    <td>
                        <span id="status_{{ $user->id }}" class="label bg-red">Pendiente</span>
                        <input type="hidden" name="status[{{ $user->id }}]" id="status_item_{{ $user->id }}"
                            value="0">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal"
                            data-target="#modal_edit_{{ $user->id }}">Editar</button>
                        {{-- Modal description --}}
                        <div class="modal fade" id="modal_edit_{{ $user->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{ $user->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <label for="assistance_{{ $user->id }}">
                                                    <input type="checkbox" id="assistance_{{ $user->id }}"
                                                        class="check_concept" name="assistance[{{ $user->id }}]"
                                                        value="1" checked> AUXILIO DE TRANSPORTE
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="health_{{ $user->id }}">
                                                    <input type="checkbox" id="health_{{ $user->id }}"
                                                        class="check_concept" name="health[{{ $user->id }}]"
                                                        value="1" checked> Salud
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="pension_{{ $user->id }}">
                                                    <input type="checkbox" id="pension_{{ $user->id }}"
                                                        class="check_concept" name="pension[{{ $user->id }}]"
                                                        value="1" checked> Pensión
                                                </label>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 form-group">
                                                <label for="salary_{{ $user->id }}">Salario base</label>
                                                <input type="text" name="salary[{{ $user->id }}]"
                                                    id="salary_{{ $user->id }}"
                                                    value="{{ old('salary') && old('salary')[$user->id] ? old('salary')[$user->id] : ($user->register && $user->register->hasContract() && $user->register->hasContract()->salary ? $user->register->hasContract()->salary : 0) }}"
                                                    class="form-control values_nomina">
                                            </div>
                                            <div class="col-md-6 col-sm-6 form-group">
                                                <label for="working_days_{{ $user->id }}">Días laborados</label>
                                                <input type="text" name="working_days[{{ $user->id }}]"
                                                    id="working_days_{{ $user->id }}"
                                                    value="{{ old('working_days')[$user->id] ?? 30 }}"
                                                    class="form-control values_nomina">
                                            </div>
                                            <div class="col-md-4 col-sm-4 form-group">
                                                <label for="unpaid_leave_{{ $user->id }}">Licencia no
                                                    remunerada</label>
                                                <input type="text" name="unpaid_leave[{{ $user->id }}]"
                                                    id="unpaid_leave_{{ $user->id }}"
                                                    value="{{ old('unpaid_leave')[$user->id] ?? 0 }}"
                                                    class="form-control values_nomina">
                                            </div>
                                            <div class="col-md-4 col-sm-4 form-group">
                                                <label for="disabilities_1_{{ $user->id }}">Incapacidades ARL
                                                    <small>(100%)</small></label>
                                                <input type="text" name="disabilities_1[{{ $user->id }}]"
                                                    id="disabilities_1_{{ $user->id }}"
                                                    value="{{ old('disabilities_1')[$user->id] ?? 0 }}"
                                                    class="form-control values_nomina">
                                            </div>
                                            <div class="col-md-4 col-sm-4 form-group">
                                                <label for="disabilities_2_{{ $user->id }}">Incapacidades EPS
                                                    <small>(67%)</small></label>
                                                <input type="text" name="disabilities_2[{{ $user->id }}]"
                                                    id="disabilities_2_{{ $user->id }}"
                                                    value="{{ old('disabilities_2')[$user->id] ?? 0 }}"
                                                    class="form-control values_nomina">
                                            </div>
                                        </div>
                                        <h4>Horas por concepto</h4>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_sc_{{ $user->id }}">Extra Dom. o Fest.
                                                        Diurnos Compensado</label>
                                                    <input type="text" name="extras_sc[{{ $user->id }}]"
                                                        id="extras_sc_{{ $user->id }}"
                                                        value="{{ old('extras_sc')[$user->id] ?? 0 }}"
                                                        class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="surcharge_n_{{ $user->id }}">RECARGO NOCTURNO
                                                        ORDINARIO</label>
                                                    <input type="text" name="surcharge_n[{{ $user->id }}]"
                                                        id="surcharge_n_{{ $user->id }}"
                                                        value="{{ old('surcharge_n')[$user->id] ?? 0 }}"
                                                        class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_d_{{ $user->id }}">Extras Diurnas</label>
                                                    <input type="text" name="extras_d[{{ $user->id }}]"
                                                        id="extras_d_{{ $user->id }}"
                                                        value="{{ old('extras_d')[$user->id] ?? 0 }}"
                                                        class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_dc_{{ $user->id }}">Extras Diurnas
                                                        Compensadas</label>
                                                    <input type="text" name="extras_dc[{{ $user->id }}]"
                                                        id="extras_dc_{{ $user->id }}"
                                                        value="{{ old('extras_dc')[$user->id] ?? 0 }}"
                                                        class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_n_{{ $user->id }}">Extras Nocturnas</label>
                                                    <input type="text" name="extras_n[{{ $user->id }}]"
                                                        id="extras_n_{{ $user->id }}"
                                                        value="{{ old('extras_n')[$user->id] ?? 0 }}"
                                                        class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_s_{{ $user->id }}">Extra Dom. o Fest.
                                                        Diurnos</label>
                                                    <input type="text" name="extras_s[{{ $user->id }}]"
                                                        id="extras_s_{{ $user->id }}"
                                                        value="{{ old('extras_s')[$user->id] ?? 0 }}"
                                                        class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="holyday_n_{{ $user->id }}">FESTIVOS
                                                        NOCTURNOS</label>
                                                    <input type="text" name="holyday_n[{{ $user->id }}]"
                                                        id="holyday_n_{{ $user->id }}"
                                                        value="{{ old('holyday_n')[$user->id] ?? 0 }}"
                                                        class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_hn_{{ $user->id }}">Extras Festivas
                                                        Nocturnas</label>
                                                    <input type="text" name="extras_hn[{{ $user->id }}]"
                                                        id="extras_hn_{{ $user->id }}"
                                                        value="{{ old('extras_hn')[$user->id] ?? 0 }}"
                                                        class="form-control values_nomina">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="discounts_{{ $user->id }}">Descuentos</label>
                                            <input type="text" name="discounts[{{ $user->id }}]"
                                                id="discounts_{{ $user->id }}"
                                                value="{{ old('discounts')[$user->id] ?? 0 }}"
                                                class="form-control values_nomina">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary pull-left"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-sm btn-success"
                                            data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal"
                            data-target="#modal_detail_{{ $user->id }}">Detalles</button>
                        {{-- Modal description --}}
                        <div class="modal fade" id="modal_detail_{{ $user->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{ $user->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <b>LICENCIA NO REMUNERADA</b>
                                                <br>
                                                <span id="unpaid_leave_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="unpaid_leave_tx[{{ $user->id }}]"
                                                    id="unpaid_leave_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <b>INCAPACIDADES ARP</b>
                                                <br>
                                                <span id="disabilities_1_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="disabilities_1_tx[{{ $user->id }}]"
                                                    id="disabilities_1_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <b>INCAPACIDADES EPS</b>
                                                <br>
                                                <span id="disabilities_2_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="disabilities_2_tx[{{ $user->id }}]"
                                                    id="disabilities_2_item_{{ $user->id }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Valor horas</h3>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extra Dom. o Fest. Diurnos Compensado</b>
                                                <br>
                                                <span id="extras_sc_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="extras_sc_tx[{{ $user->id }}]"
                                                    id="extras_sc_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>RECARGO NOCTURNO ORDINARIO</b>
                                                <br>
                                                <span id="surcharge_n_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="surcharge_n_tx[{{ $user->id }}]"
                                                    id="surcharge_n_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extras Diurnas</b>
                                                <br>
                                                <span id="extras_d_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="extras_d_tx[{{ $user->id }}]"
                                                    id="extras_d_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extras Diurnas Compensadas</b>
                                                <br>
                                                <span id="extras_dc_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="extras_dc_tx[{{ $user->id }}]"
                                                    id="extras_dc_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extras Nocturnas</b>
                                                <br>
                                                <span id="extras_n_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="extras_n_tx[{{ $user->id }}]"
                                                    id="extras_n_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extra Dom. o Fest.</b>
                                                <br>
                                                <span id="extras_s_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="extras_s_tx[{{ $user->id }}]"
                                                    id="extras_s_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Diurnos FESTIVOS NOCTURNOS</b>
                                                <br>
                                                <span id="holyday_n_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="holyday_n_tx[{{ $user->id }}]"
                                                    id="holyday_n_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extras Festivas Nocturnas</b>
                                                <br>
                                                <span id="extras_hn_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="extras_hn_tx[{{ $user->id }}]"
                                                    id="extras_hn_item_{{ $user->id }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>VALORES OTROS CONCEPTOS</h3>
                                        <p><b>Total devengado</b></p>
                                        <span id="total_devengado_tx_{{ $user->id }}">$ 0.00</span>
                                        <input type="hidden" value="0"
                                            name="total_devengado_tx[{{ $user->id }}]"
                                            id="total_devengado_item_{{ $user->id }}">
                                        <p><b>Auxilio de trasporte</b></p>
                                        <span id="assistance_tx_{{ $user->id }}">$ 0.00</span>
                                        <input type="hidden" value="0"
                                            name="assistance_tx[{{ $user->id }}]"
                                            id="assistance_item_{{ $user->id }}">
                                        <h4>Deducciones</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <p><b>Salud</b></p>
                                                <span id="health_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="health_tx[{{ $user->id }}]"
                                                    id="health_item_{{ $user->id }}">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><b>Pensión</b></p>
                                                <span id="pension_tx_{{ $user->id }}">$ 0.00</span>
                                                <input type="hidden" value="0"
                                                    name="pension_tx[{{ $user->id }}]"
                                                    id="pension_item_{{ $user->id }}">

                                            </div>
                                        </div>
                                        <hr>
                                        <p><b>Descuentos</b></p>
                                        <span id="discounts_tx_{{ $user->id }}">$ 0.00</span>
                                        <input type="hidden" value="0"
                                            name="discounts_tx[{{ $user->id }}]"
                                            id="discounts_item_{{ $user->id }}">
                                        <hr>
                                        <h3>Total neto a pagar</h3>
                                        <span id="total_pay_{{ $user->id }}">$ 0.00</span>
                                        <input type="hidden" value="0"
                                            name="total_pay_user[{{ $user->id }}]"
                                            id="total_item_{{ $user->id }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary pull-left"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-sm btn-success"
                                            data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div class="table-responsive">
        <h4>Totales</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Total empleados</th>
                    <th>Total devengado</th>
                    <th>Total auxilio de trasporte</th>
                    <th>Total salud</th>
                    <th>Total pensión</th>
                    <th>Total descuentos</th>
                    <th>Total neto a pagar</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <tr>
                    <td>
                        <span id="total_employees_tx">{{ count($usuarios) }}</span>
                        <input type="hidden" name="total_employees" value="{{ count($usuarios) }}"
                            id="total_employees">
                    </td>
                    <td>
                        <span id="total_devengado_tx">$ 0.00</span>
                        <input type="hidden" name="total_devengado" value="0" id="total_devengado">
                    </td>
                    <td>
                        <span id="total_assistance_tx">$ 0.00</span>
                        <input type="hidden" name="total_assistance" value="0" id="total_assistance">
                    </td>
                    <td>
                        <span id="total_health_tx">$ 0.00</span>
                        <input type="hidden" name="total_health" value="0" id="total_health">
                    </td>
                    <td>
                        <span id="total_pension_tx">$ 0.00</span>
                        <input type="hidden" name="total_pension" value="0" id="total_pension">
                    </td>
                    <td>
                        <span id="total_discount_tx">$ 0.00</span>
                        <input type="hidden" name="total_discount" value="0" id="total_discount">
                    </td>
                    <th>
                        <h4><span id="total_pay_tx">$ 0.00</span></h4>
                        <input type="hidden" name="total_pay" value="0" id="total_pay">
                    </th>
                </tr>
            </tbody>
            </tbody>
        </table>
    </div>
</div>
