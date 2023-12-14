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
            @foreach ($id->users as $user)
                <tr>
                    <th><input type="checkbox" name="user_add[{{ $user->user_id }}]" id="user_add_{{ $user->user_id }}" value="{{ $user->user_id }}" class="check_user" checked></th>
                    <th>{{$user->user->cedula}}</th>
                    <td>{{$user->user->name}}</td>
                    <td id="total_pay_td_{{ $user->user_id }}">$ {{number_format(( $user->total_pay_user ),2,',','.')}}</td>
                    <td>
                        <span id="status_{{ $user->user_id }}" class="label {{ $user->status == 1 ? 'bg-green' : 'bg-red'}}">{{ $user->status == 1 ? 'Listo' : 'Pendiente'}}</span>
                        <input type="hidden" name="status[{{ $user->user_id }}]" id="status_item_{{ $user->user_id }}" value="{{$user->status}}">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$user->user_id}}">Editar</button>
                        {{-- Modal description --}}
                        <div class="modal fade" id="modal_edit_{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$user->user->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="linked_days_{{$user->user_id}}">Días vinculados</label>
                                                    <input type="text" class="form-control linked-days" name="linked_days[{{$user->user_id}}]" value="{{$user->linked_days}}" id="linked_days_{{$user->user_id}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="license_days_{{$user->user_id}}">Días de licencia</label>
                                                    <input type="text" class="form-control license-days" name="license_days[{{$user->user_id}}]" value="{{$user->license_days}}" id="license_days_{{$user->user_id}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="days_settle_{{$user->user_id}}">Número de días a liquidar</label>
                                                    <input type="text" class="form-control days-settle" name="settle_days[{{$user->user_id}}]" value="{{$user->settle_days}}" id="days_settle_{{$user->user_id}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>TIEMPO TRABAJADO</th>
                                                        <th>VALOR SALARIAL</th>
                                                        <th>VALOR HORAS EXTRAS</th>
                                                        <th>AUXILIO DE TRANSPORTE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user->months as $item)
                                                        <tr class="tr-months tr_month_{{$item->month}}" {{ showMonth($item->month,$id->start_date,$id->end_date) ? 'style=display:none' : ''}}>
                                                            <th>{{$months[$item->month]}}</th>
                                                            <td><input type="text" name="salary_month[{{$user->user_id}}][{{$item->month}}]" id="salaryMonth_{{$user->user_id}}_{{$item->month}}" class="form-control text-right salary_month" value="{{ $item->salary_month }}"></td>
                                                            <td><input type="text" name="extras_month[{{$user->user_id}}][{{$item->month}}]" id="extrasMonth_{{$user->user_id}}_{{$item->month}}" class="form-control text-right extras_month" value="{{ $item->extras_month }}"></td>
                                                            <td><input type="text" name="assistance_month[{{$user->user_id}}][{{$item->month}}]" id="assistanceMonth_{{$user->user_id}}_{{$item->month}}" class="form-control text-right assistance_month" value="{{ $item->assistance_month }}"></td>
                                                        </tr>
                                                    @endforeach
                                                    @for ($i = 1; $i < count($months); $i++)
                                                    @endfor
                                                    <tr>
                                                        <th>Total devengado</th>
                                                        <td>
                                                            <input type="number" name="total_devengado_salary[{{$user->user_id}}]" value="{{$user->total_devengado_salary }}" id="total_devengado_salary_{{$user->user_id}}" readonly class="form-control text-right">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="total_devengado_extras[{{$user->user_id}}]" value="{{$user->total_devengado_extras }}" id="total_devengado_extras_{{$user->user_id}}" readonly class="form-control text-right">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="total_devengado_assistance[{{$user->user_id}}]" value="{{$user->total_devengado_assistance }}" id="total_devengado_assistance_{{$user->user_id}}" readonly class="form-control text-right">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Promedio</th>
                                                        <td>
                                                            <input type="number" name="average_salary[{{$user->user_id}}]" value="{{$user->average_salary }}" id="average_salary_{{$user->user_id}}" readonly class="form-control text-right">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="average_extras[{{$user->user_id}}]" value="{{$user->average_extras }}" id="average_extras_{{$user->user_id}}" readonly class="form-control text-right">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="average_assistance[{{$user->user_id}}]" value="{{$user->average_assistance }}" id="average_assistance_{{$user->user_id}}" readonly class="form-control text-right">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h3>Total neto a pagar</h3>
                                        <span id="total_pay_{{ $user->user_id }}">$ {{number_format(( $user->total_pay_user ),2,',','.')}}</span>
                                        <input type="hidden" value="{{ $user->total_pay_user }}" name="total_pay_user[{{ $user->user_id }}]" id="total_item_{{ $user->user_id }}">
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
                        <th>
                            <h4><span id="total_pay_tx">$ {{number_format($id->total_pay,2,',','.')}}</span></h4>
                            <input type="hidden" name="total_pay" value="{{$id->total_pay}}" id="total_pay">
                        </th>
                    </tr>
                </tbody>
            </tbody>
        </table>
    </div>
</div>