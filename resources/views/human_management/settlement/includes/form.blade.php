
            {{-- User 1 --}}
            <div class="form-group">
                <div id='origen0' class="row origen">
                    <div class="col-md-3">
                        <label for="user_id">Número de documento</label>
                        <select name="user_id" id="user_id" class="form-control selectCedula">
                            <option value="" disabled selected></option>
                            @foreach ($users as $user)
                                <option {{ (old('user_id') == $user->id) ? 'selected' : '' }} value="{{$user->id}}">{!!$user->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$user->name!!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="name">Nombre completo funcionario</label>
                        <input type="text" disabled name="name" value="{{ old('name') }}" class="form-control controlName" id="name" placeholder="Nombre" >
                    </div>
                    <div class="col-md-3">
                        <label for="salary">Salario base mes actual</label>
                        <input type="text" name="salary" value="{{ old('salary') }}" class="form-control controlSalary" id="salary" placeholder="Salario" >
                    </div>
                    <div class="col-md-3">
                        <label for="assistance">Auxilio de transporte</label>
                        <input type="text" name="assistance" value="{{ old('assistance') ?? 117172 }}" class="form-control controlAssistance" id="assistance" placeholder="Auxilio de transporte" >
                    </div>
                    <div class="col-md-3">
                        <label for="date_start">Fecha de ingreso</label>
                        <input type="date" name="date_start" value="{{ old('date_start') }}" class="form-control controlRol" id="date_start" placeholder="Fecha de ingreso">
                    </div>
                    <div class="col-md-3">
                        <label for="date_end">Fecha de retiro</label>
                        <input type="date" name="date_end" value="{{ now()->format('Y-m-d') }}" class="form-control controlRol" id="date_end" placeholder="Fecha de retiro">{{-- old('date_end') --}}
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover" id="table_linked">
                    <thead>
                        <tr id="trTitle">
                            <th>/</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="trDaysLinked">
                            <th><label for="">Días vinculados</label></th>
                        </tr>
                        <tr id="trDaysLeave">
                            <th><label for="">Días en licencia</label></th>
                        </tr>
                        <tr id="trDaysToSettle">
                            <th><label for="">Número de días a liquidar</label></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="days_linked_vacation">Total días por vacaciones</label>
                        <input type="text" name="days_linked_vacation" value="0" id="days_linked_vacation" class="form-control text-right">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="vacation_days_to_pay">Días de vacaciones</label>
                        <input type="text" name="vacation_days_to_pay" value="0" id="vacation_days_to_pay" class="form-control text-right">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="vacation">Días disfrutados en vacaciones</label>
                        <input type="text" name="vacation" value="0" id="vacation" class="form-control text-right">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="total_vacation_days_to_pay">Total de días de vacaciones a pagar</label>
                        <input type="text" name="total_vacation_days_to_pay" value="0" id="total_vacation_days_to_pay" class="form-control text-right">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="premium_payment_days">Días que faltan de pago prima</label>
                        <input type="text" name="premium_payment_days" value="0" id="premium_payment_days" class="form-control text-right">
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
                            <tr>
                                <th>{{$months[$i]}}</th>
                                <td><input type="text" name="salary_month[]" id="salaryMonth_{{$i}}" class="form-control text-right salary_month" value="0"></td>
                                <td><input type="text" name="extras_month[]" id="extrasMonth_{{$i}}" class="form-control text-right extras_month" value="0"></td>
                                <td><input type="text" name="assistance_month[]" id="assistanceMonth_{{$i}}" class="form-control text-right assistance_month" value="0"></td>
                            </tr>
                        @endfor
                        <tr>
                            <th>Total devengado</th>
                            <td>
                                <input type="text" name="total_devengado_salary" value="{{old('total_devengado_salary') ?? 0}}" id="total_devengado_salary" readonly class="form-control text-right">
                            </td>
                            <td>
                                <input type="text" name="total_devengado_extras" value="{{old('total_devengado_extras') ?? 0}}" id="total_devengado_extras" readonly class="form-control text-right">
                            </td>
                            <td>
                                <input type="text" name="total_devengado_assistance" value="{{old('total_devengado_assistance') ?? 0}}" id="total_devengado_assistance" readonly class="form-control text-right">
                            </td>
                        </tr>
                        <tr>
                            <th>Promedio</th>
                            <td>
                                <input type="text" name="average_salary" value="{{old('average_salary') ?? 0}}" id="average_salary" readonly class="form-control text-right">
                            </td>
                            <td>
                                <input type="text" name="average_extras" value="{{old('average_extras') ?? 0}}" id="average_extras" readonly class="form-control text-right">
                            </td>
                            <td>
                                <input type="text" name="average_assistance" value="{{old('average_assistance') ?? 0}}" id="average_assistance" readonly class="form-control text-right">
                            </td>
                        </tr>
                        <tr>
                            <th>Promedio últimos 6 meses</th>
                            <td>
                                <input type="text" name="average_last_month_salary" value="{{old('average_last_month_salary') ?? 0}}" id="average_last_month_salary" readonly class="form-control text-right">
                            </td>
                            <td>
                                <input type="text" name="average_last_month_extras" value="{{old('average_last_month_extras') ?? 0}}" id="average_last_month_extras" readonly class="form-control text-right">
                            </td>
                            <td>
                                <input type="text" name="average_last_month_assistance" value="{{old('average_last_month_assistance') ?? 0}}" id="average_last_month_assistance" readonly class="form-control text-right">
                            </td>
                        </tr>
                        <tr>
                            <th>Promedio prima</th>
                            <td>
                                <input type="text" name="average_premium_salary" value="{{old('average_premium_salary') ?? 0}}" id="average_premium_salary" readonly class="form-control text-right">
                            </td>
                            <td>
                                <input type="text" name="average_premium_extras" value="{{old('average_premium_extras') ?? 0}}" id="average_premium_extras" readonly class="form-control text-right">
                            </td>
                            <td>
                                <input type="text" name="average_premium_assistance" value="{{old('average_premium_assistance') ?? 0}}" id="average_premium_assistance" readonly class="form-control text-right">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Cálculos</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Liquidación de cesantías</th>
                            <td><input type="text" name="total_linkend" id="total_linkend" value="{{old('total_linkend') ?? 0}}" readonly class="form-control text-right"></td>
                        </tr>
                        <tr>
                            <th>Pago de intereses de cesantías</th>
                            <td><input type="text" name="intereses" id="intereses" value="{{old('intereses') ?? 0}}" readonly class="form-control text-right"></td>
                        </tr>
                        <tr>
                            <th>Liquidación por prima</th>
                            <td><input type="text" name="total_premium" id="total_premium" value="{{old('total_premium') ?? 0}}" readonly class="form-control text-right"></td>
                        </tr>
                        <tr>
                            <th>Pago de vacaciones</th>
                            <td><input type="text" name="total_vacation" id="total_vacation" value="{{old('total_vacation') ?? 0}}" readonly class="form-control text-right"></td>
                        <tr>
                            <th>Salario pendiente</th>
                            <td><input type="text" name="this_salary" id="this_salary" value="{{old('this_salary') ?? 0}}" class="form-control text-right"></td>
                        </tr>
                        <tr>
                            <th>Pago de indemnización</th>
                            <td><input type="text" class="form-control text-right" id="compensation" name="compensation" value="{{old('compensation') ?? 0}}"></td>
                        </tr>
                        <tr>
                            <th>Pendientes por la plataforma</th>
                            <td><input type="text" class="form-control text-right" id="pendientes" name="pendientes" value="{{old('pendientes') ?? 0}}"></td>
                        </tr>
                        <tr>
                            <th>Deudas con la compañía</th>
                            <td><input type="text" class="form-control text-right" id="debt" name="debt" value="{{old('debt') ?? 0}}"></td>
                        </tr>
                        <tr>
                            <th>Total a pagar por liquidación</th>
                            <td>
                                <input type="text" name="total_settlement" id="total_settlement" value="{{old('total_settlement') ?? 0}}" readonly class="form-control text-right">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="serveraces">Valor a reclamar cesantías en fondo por valor</label>
                <input type="text" name="serveraces" id="serveraces" class="form-control text-right" value="{{ old('serveraces') ?? 0 }}">
            </div>