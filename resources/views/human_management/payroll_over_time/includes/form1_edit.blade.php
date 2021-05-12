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
            @foreach ($id->work_adds as $item)
                <tr>
                    <th><input type="checkbox" name="user_add[{{ $item->user->id }}]" id="user_add_{{ $item->user->id }}" value="{{ $item->user->id }}" class="check_user" checked></th>
                    <th>{{$item->user->cedula}}</th>
                    <td>{{$item->user->name}}</td>
                    <td id="total_pay_td_{{ $item->user->id }}">$ 0.00</td>
                    <td>
                        <span id="status_{{ $item->user->id }}" class="label bg-red">Pendiente</span>
                        <input type="hidden" name="status[{{ $item->user->id }}]" id="status_item_{{ $item->user->id }}" value="0">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$item->user->id}}">Editar</button>
                        {{-- Modal description --}}
                        <div class="modal fade" id="modal_edit_{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$item->user->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <label for="assistance_{{ $item->user->id }}">
                                                    <input type="checkbox" id="assistance_{{ $item->user->id }}" class="check_concept" name="assistance[{{ $item->user->id }}]" value="1" {{ ($item->assistance == 1) ? 'checked' : ''}}> AUXILIO DE TRANSPORTE
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="health_{{ $item->user->id }}">
                                                    <input type="checkbox" id="health_{{ $item->user->id }}" class="check_concept" name="health[{{ $item->user->id }}]" value="1" {{ ($item->health == 1) ? 'checked' : ''}}> Salud
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="pension_{{ $item->user->id }}">
                                                    <input type="checkbox" id="pension_{{ $item->user->id }}" class="check_concept" name="pension[{{ $item->user->id }}]" value="1" {{ ($item->pension == 1) ? 'checked' : ''}}> Pensión
                                                </label>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 form-group">
                                                <label for="salary_{{$item->user->id}}"">Salario base</label>
                                                <input type="text" name="salary[{{$item->user->id}}]" id="salary_{{$item->user->id}}" value="{{ $item->salary }}" class="form-control values_nomina">
                                            </div>
                                            <div class="col-md-6 col-sm-6 form-group">
                                                <label for="working_days_{{$item->user->id}}"">Días laborados</label>
                                                <input type="text" name="working_days[{{$item->user->id}}]" id="working_days_{{$item->user->id}}" value="{{ $item->working_days }}" class="form-control values_nomina">
                                            </div>
                                            <div class="col-md-4 col-sm-4 form-group">
                                                <label for="unpaid_leave_{{$item->user->id}}">Licencia no remunerada</label>
                                                <input type="text" name="unpaid_leave[{{$item->user->id}}]" id="unpaid_leave_{{$item->user->id}}" value="{{ $item->unpaid_leave }}" class="form-control values_nomina">
                                            </div>
                                            <div class="col-md-4 col-sm-4 form-group">
                                                <label for="disabilities_1_{{$item->user->id}}"">Incapacidades ARL <small>(100%)</small></label>
                                                <input type="text" name="disabilities_1[{{$item->user->id}}]" id="disabilities_1_{{$item->user->id}}" value="{{ $item->disabilities_1 }}" class="form-control values_nomina">
                                            </div>
                                            <div class="col-md-4 col-sm-4 form-group">
                                                <label for="disabilities_2_{{$item->user->id}}"">Incapacidades EPS <small>(67%)</small></label>
                                                <input type="text" name="disabilities_2[{{$item->user->id}}]" id="disabilities_2_{{$item->user->id}}" value="{{ $item->disabilities_2 }}" class="form-control values_nomina">
                                            </div>
                                        </div>
                                        <h4>Horas por concepto</h4>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_sc_{{ $item->user->id }}">Extra Dom. o Fest. Diurnos Compensado</label>
                                                    <input type="text" name="extras_sc[{{ $item->user->id }}]" id="extras_sc_{{ $item->user->id }}" value="{{ $item->extras_sc }}" class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="surcharge_n_{{ $item->user->id }}">RECARGO NOCTURNO ORDINARIO</label>
                                                    <input type="text" name="surcharge_n[{{ $item->user->id }}]" id="surcharge_n_{{ $item->user->id }}" value="{{ $item->surcharge_n }}" class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_d_{{ $item->user->id }}">Extras Diurnas</label>
                                                    <input type="text" name="extras_d[{{ $item->user->id }}]" id="extras_d_{{ $item->user->id }}" value="{{ $item->extras_d }}" class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_dc_{{ $item->user->id }}">Extras Diurnas Compensadas</label>
                                                    <input type="text" name="extras_dc[{{ $item->user->id }}]" id="extras_dc_{{ $item->user->id }}" value="{{ $item->extras_dc }}" class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_n_{{ $item->user->id }}">Extras Nocturnas</label>
                                                    <input type="text" name="extras_n[{{ $item->user->id }}]" id="extras_n_{{ $item->user->id }}" value="{{ $item->extras_n }}" class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_s_{{ $item->user->id }}">Extra Dom.  o Fest. Diurnos</label>
                                                    <input type="text" name="extras_s[{{ $item->user->id }}]" id="extras_s_{{ $item->user->id }}" value="{{ $item->extras_s }}" class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="holyday_n_{{ $item->user->id }}">FESTIVOS NOCTURNOS</label>
                                                    <input type="text" name="holyday_n[{{ $item->user->id }}]" id="holyday_n_{{ $item->user->id }}" value="{{ $item->holyday_n }}" class="form-control values_nomina">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="extras_hn_{{ $item->user->id }}">Extras Festivas Nocturnas</label>
                                                    <input type="text" name="extras_hn[{{ $item->user->id }}]" id="extras_hn_{{ $item->user->id }}" value="{{ $item->extras_hn }}" class="form-control values_nomina">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="discounts_{{ $item->user->id }}">Descuentos</label>
                                            <input type="text" name="discounts[{{ $item->user->id }}]" id="discounts_{{ $item->user->id }}" value="{{ $item->discounts }}" class="form-control values_nomina">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal" data-target="#modal_detail_{{$item->user->id}}">Detalles</button>
                        {{-- Modal description --}}
                        <div class="modal fade" id="modal_detail_{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$item->user->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <b>LICENCIA NO REMUNERADA</b>
                                                <br>
                                                <span id="unpaid_leave_tx_{{ $item->user->id }}">$ {{number_format($item->unpaid_leave_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->unpaid_leave_tx}}" name="unpaid_leave_tx[{{ $item->user->id }}]" id="unpaid_leave_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <b>INCAPACIDADES ARP</b>
                                                <br>
                                                <span id="disabilities_1_tx_{{ $item->user->id }}">$ {{number_format($item->disabilities_1_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->disabilities_1_tx}}" name="disabilities_1_tx[{{ $item->user->id }}]" id="disabilities_1_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <b>INCAPACIDADES EPS</b>
                                                <br>
                                                <span id="disabilities_2_tx_{{ $item->user->id }}">$ {{number_format($item->disabilities_2_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->disabilities_2_tx}}" name="disabilities_2_tx[{{ $item->user->id }}]" id="disabilities_2_item_{{ $item->user->id }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Valor horas</h3>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extra Dom. o Fest. Diurnos Compensado</b>
                                                <br>
                                                <span id="extras_sc_tx_{{ $item->user->id }}">$ {{number_format($item->extras_sc_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->extras_sc_tx}}" name="extras_sc_tx[{{ $item->user->id }}]" id="extras_sc_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>RECARGO NOCTURNO ORDINARIO</b>
                                                <br>
                                                <span id="surcharge_n_tx_{{ $item->user->id }}">$ {{number_format($item->surcharge_n_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->surcharge_n_tx}}" name="surcharge_n_tx[{{ $item->user->id }}]" id="surcharge_n_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extras Diurnas</b>
                                                <br>
                                                <span id="extras_d_tx_{{ $item->user->id }}">$ {{number_format($item->extras_d_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->extras_d_tx}}" name="extras_d_tx[{{ $item->user->id }}]" id="extras_d_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extras Diurnas Compensadas</b>
                                                <br>
                                                <span id="extras_dc_tx_{{ $item->user->id }}">$ {{number_format($item->extras_dc_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->extras_dc_tx}}" name="extras_dc_tx[{{ $item->user->id }}]" id="extras_dc_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extras Nocturnas</b>
                                                <br>
                                                <span id="extras_n_tx_{{ $item->user->id }}">$ {{number_format($item->extras_n_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->extras_n_tx}}" name="extras_n_tx[{{ $item->user->id }}]" id="extras_n_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extra Dom. o Fest.</b>
                                                <br>
                                                <span id="extras_s_tx_{{ $item->user->id }}">$ {{number_format($item->extras_s_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->extras_s_tx}}" name="extras_s_tx[{{ $item->user->id }}]" id="extras_s_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Diurnos FESTIVOS NOCTURNOS</b>
                                                <br>
                                                <span id="holyday_n_tx_{{ $item->user->id }}">$ {{number_format($item->holyday_n_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->holyday_n_tx}}" name="holyday_n_tx[{{ $item->user->id }}]" id="holyday_n_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <b>Extras Festivas Nocturnas</b>
                                                <br>
                                                <span id="extras_hn_tx_{{ $item->user->id }}">$ {{number_format($item->extras_hn_tx,2,',','.')}}</span>
                                                <input type="hidden" value="{{$item->extras_hn_tx}}" name="extras_hn_tx[{{ $item->user->id }}]" id="extras_hn_item_{{ $item->user->id }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>VALORES OTROS CONCEPTOS</h3>
                                        <p><b>Total devengado</b></p>
                                        <span id="total_devengado_tx_{{ $item->user->id }}">$ 0.00</span>
                                        <input type="hidden" value="{{$item->total_devengado_tx}}" name="total_devengado_tx[{{ $item->user->id }}]" id="total_devengado_item_{{ $item->user->id }}">
                                        <p><b>Auxilio de trasporte</b></p>
                                        <span id="assistance_tx_{{ $item->user->id }}">$ 0.00</span>
                                        <input type="hidden" value="{{$item->assistance_tx}}" name="assistance_tx[{{ $item->user->id }}]" id="assistance_item_{{ $item->user->id }}">
                                        <h4>Deducciones</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <p><b>Salud</b></p>
                                                <span id="health_tx_{{ $item->user->id }}">$ 0.00</span>
                                                <input type="hidden" value="{{$item->health_tx}}" name="health_tx[{{ $item->user->id }}]" id="health_item_{{ $item->user->id }}">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <p><b>Pensión</b></p>
                                                <span id="pension_tx_{{ $item->user->id }}">$ 0.00</span>
                                                <input type="hidden" value="{{$item->pension_tx}}" name="pension_tx[{{ $item->user->id }}]" id="pension_item_{{ $item->user->id }}">

                                            </div>
                                        </div>
                                        <hr>
                                        <p><b>Descuentos</b></p>
                                        <span id="discounts_tx_{{ $item->user->id }}">$ 0.00</span>
                                        <input type="hidden" value="{{$item->discounts_tx}}" name="discounts_tx[{{ $item->user->id }}]" id="discounts_item_{{ $item->user->id }}">
                                        <hr>
                                        <h3>Total neto a pagar</h3>
                                        <span id="total_pay_{{ $item->user->id }}">$ 0.00</span>
                                        <input type="hidden" value="{{$item->total_pay}}" name="total_pay_user[{{ $item->user->id }}]" id="total_item_{{ $item->user->id }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
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
                            <span id="total_employees_tx">{{$id->total_employees}}</span>
                            <input type="hidden" name="total_employees" value="{{$id->total_employees}}" id="total_employees">
                        </td>
                        <td>
                            <span id="total_devengado_tx">$ 0.00</span>
                            <input type="hidden" name="total_devengado" value="{{$id->total_devengado}}" id="total_devengado">
                        </td>
                        <td>
                            <span id="total_assistance_tx">$ 0.00</span>
                            <input type="hidden" name="total_assistance" value="{{$id->total_assistance}}" id="total_assistance">
                        </td>
                        <td>
                            <span id="total_health_tx">$ 0.00</span>
                            <input type="hidden" name="total_health" value="{{$id->total_health}}" id="total_health">
                        </td>
                        <td>
                            <span id="total_pension_tx">$ 0.00</span>
                            <input type="hidden" name="total_pension" value="{{$id->total_pension}}" id="total_pension">
                        </td>
                        <td>
                            <span id="total_discount_tx">$ 0.00</span>
                            <input type="hidden" name="total_discount" value="{{$id->total_discount}}" id="total_discount">
                        </td>
                        <th>
                            <h4><span id="total_pay_tx">$ 0.00</span></h4>
                            <input type="hidden" name="total_pay" value="{{$id->total_pay}}" id="total_pay">
                        </th>
                    </tr>
                </tbody>
            </tbody>
        </table>
    </div>
</div>