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
            @foreach ($users as $user)
                <tr>
                    <th><input type="checkbox" name="user_add[{{ $user->id }}]" id="user_add_{{ $user->id }}" value="{{ $user->id }}" class="check_user" checked></th>
                    <th>{{$user->cedula}}</th>
                    <td>{{$user->name}}</td>
                    <td id="total_pay_td_{{ $user->id }}">$ 0.00</td>
                    <td>
                        <span id="status_{{ $user->id }}" class="label bg-red">Pendiente</span>
                        <input type="hidden" name="status[{{ $user->id }}]" id="status_item_{{ $user->id }}" value="0">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$user->id}}">Editar</button>
                        {{-- Modal description --}}
                        <div class="modal fade" id="modal_edit_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$user->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="date" readonly name="" id="date_start_u_{{$user->id}}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" readonly name="" id="date_end_u_{{$user->id}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="linked_days_{{$user->id}}">Días vinculados</label>
                                                    <input type="text" class="form-control linked-days" name="linked_days[{{$user->id}}]" value="{{old('linked_days')[$user->id] ?? 0}}" id="linked_days_{{$user->id}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="license_days_{{$user->id}}">Días de licencia</label>
                                                    <input type="text" class="form-control license-days" name="license_days[{{$user->id}}]" value="{{old('license_days')[$user->id] ?? 0}}" id="license_days_{{$user->id}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="days_settle_{{$user->id}}">Número de días a liquidar</label>
                                                    <input type="text" class="form-control days-settle" name="settle_days[{{$user->id}}]" value="{{old('settle_days')[$user->id] ?? 0}}" id="days_settle_{{$user->id}}">
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
                                                    @for ($i = 1; $i < count($months); $i++)
                                                        <tr class="tr-months tr_month_{{$i}}">
                                                            <th>{{$months[$i]}}</th>
                                                            <td><input type="text" name="salary_month[{{$user->id}}][{{$i}}]" id="salaryMonth_{{$user->id}}_{{$i}}" class="form-control text-right salary_month" value="{{ old('salary_month')[$user->id][$i] ?? 0}}"></td>
                                                            <td><input type="text" name="extras_month[{{$user->id}}][{{$i}}]" id="extrasMonth_{{$user->id}}_{{$i}}" class="form-control text-right extras_month" value="{{ old('extras_month')[$user->id][$i] ?? 0}}"></td>
                                                            <td><input type="text" name="assistance_month[{{$user->id}}][{{$i}}]" id="assistanceMonth_{{$user->id}}_{{$i}}" class="form-control text-right assistance_month" value="{{ old('assistance_month')[$user->id][$i] ?? 0}}"></td>
                                                        </tr>
                                                    @endfor
                                                    <tr>
                                                        <th>Total devengado</th>
                                                        <td>
                                                            <input type="number" name="total_devengado_salary[{{$user->id}}]" value="{{old('total_devengado_salary')[$user->id] ?? 0}}" id="total_devengado_salary_{{$user->id}}" readonly class="form-control text-right">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="total_devengado_extras[{{$user->id}}]" value="{{old('total_devengado_extras')[$user->id] ?? 0}}" id="total_devengado_extras_{{$user->id}}" readonly class="form-control text-right">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="total_devengado_assistance[{{$user->id}}]" value="{{old('total_devengado_assistance')[$user->id] ?? 0}}" id="total_devengado_assistance_{{$user->id}}" readonly class="form-control text-right">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Promedio</th>
                                                        <td>
                                                            <input type="number" name="average_salary[{{$user->id}}]" value="{{old('average_salary')[$user->id] ?? 0}}" id="average_salary_{{$user->id}}" readonly class="form-control text-right">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="average_extras[{{$user->id}}]" value="{{old('average_extras')[$user->id] ?? 0}}" id="average_extras_{{$user->id}}" readonly class="form-control text-right">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="average_assistance[{{$user->id}}]" value="{{old('average_assistance')[$user->id] ?? 0}}" id="average_assistance_{{$user->id}}" readonly class="form-control text-right">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h3>Total neto a pagar</h3>
                                        <span id="total_pay_{{ $user->id }}">$ {{number_format((old('total_pay_user')[$user->id] ?? 0),2,',','.')}}</span>
                                        <input type="hidden" value="{{old('total_pay_user')[$user->id] ?? 0}}" name="total_pay_user[{{ $user->id }}]" id="total_item_{{ $user->id }}">
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
                            <span id="total_employees_tx">{{count($users)}}</span>
                            <input type="hidden" name="total_employees" value="{{count($users)}}" id="total_employees">
                        </td>
                        <th>
                            <h4><span id="total_pay_tx">$ {{number_format((old('total_pay') ?? 0),2,',','.')}}</span></h4>
                            <input type="hidden" name="total_pay" value="{{old('total_pay') ?? 0}}" id="total_pay">
                        </th>
                    </tr>
                </tbody>
            </tbody>
        </table>
    </div>
</div>