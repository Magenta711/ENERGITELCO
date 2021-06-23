<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>/</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Total neto a pagar</th>
                <th>/</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th><input type="checkbox" name="user_add[{{ $user->id }}]" id="user_add_{{ $user->id }}" value="{{ $user->id }}" class="check_user"></th>
                    <th>{{$user->cedula}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->position->name}}</td>
                    <td id="total_pay_td_{{ $user->id }}">$0,00</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$user->id}}">Evaluar</button>
                        {{-- Modal description --}}
                        <div class="modal fade" id="modal_edit_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$user->name}} - {{$user->position->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="working_days">Días trabajados</label>
                                            <input type="number" name="working_days[{{$user->id}}]" id="working_days_{{$user->id}}" class="form-control" value="30"> 
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <label for="admin_bonus_checked_{{ $user->id }}">
                                                    <input type="checkbox" id="admin_bonus_checked_{{ $user->id }}" class="check_concept admin_bonus_checked" name="admin_bonus_check[{{ $user->id }}]" value="1" {{old('admin_bonus_check')[$user->id] ? 'checked' : ''}}> Bonificación a administrativos
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="drive_bonus_checked_{{ $user->id }}">
                                                    <input type="checkbox" id="drive_bonus_checked_{{ $user->id }}" class="check_concept drive_bonus_checked" name="drive_bonus_check[{{ $user->id }}]" value="1" {{old('drive_bonus_check')[$user->id] ? 'checked' : (($user->register && ($user->register->car || $user->register->moto)) ? 'checked' : '')}}> Bonificación a conductores
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="24_7_bonus_checked_{{ $user->id }}">
                                                    <input type="checkbox" id="24_7_bonus_checked_{{ $user->id }}" class="check_concept 24_7_bonus_checked" name="b24_7_check[{{ $user->id }}]" value="1" {{ (old('b24_7_check')[$user->id]) ? 'checked' : (($user->b24_7) ? 'checked' : '') }}> Bonificación 24/7
                                                </label>
                                            </li>
                                            <li class="list-group-item hide">
                                                <label for="na_{{ $user->id }}">
                                                    <input type="checkbox" id="na_checked_{{ $user->id }}" class="check_concept na_checked" name="na_check[{{ $user->id }}]" value="1"> Está en incapacidad o en vacaciones
                                                </label>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="block_bonus_administrative_{{$user->id}}" style="display: none">
                                            <div class="form-group">
                                                <label for="value_bonus_{{$user->id}}">Bonificación segun su cargo</label>
                                                <input type="text" name="value_bonus[{{$user->id}}]" id="value_bonus_{{$user->id}}" value="{{ old('value_bonus')[$user->id] ? old('value_bonus')[$user->id] : $user->position->bonus }}" class="form-control">
                                            </div>
                                            <h4>Admistrativo</h4>
                                            <hr>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_1"><h5>ALCANCE</h5> MANEJO DEL ALCANCE DE LOS PROYECTOS DE LA COMPAÑÍA</label>
                                                <input type="number" name="admin_1[{{$user->id}}]" id="admin_{{$user->id}}_1" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_2"><h5>TIEMPO</h5> MANEJO CORRECTO DE TIEMPOS Y CUMPLIMIENTO DE CRONOGRAMAS</label>
                                                <input type="number" name="admin_2[{{$user->id}}]" id="admin_{{$user->id}}_2" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_3"><h5>COSTO</h5> MANEJO CORRECTO DE LOS COSTOS DE LOS PROYECTOS</label>
                                                <input type="number" name="admin_3[{{$user->id}}]" id="admin_{{$user->id}}_3" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_4">MANEJO DE LA CALIDAD Y DE POLÍTICA CERO PENDIENTES</label>
                                                <input type="number" name="admin_4[{{$user->id}}]" id="admin_{{$user->id}}_4" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <h5>RECURSO HUMANO (INTEGRACIÓN Y BUENA COORDINACIÓN DEL RECURSO HUMANO)</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="admin_{{$user->id}}_5">PUNTUALIDAD</label>
                                                        <input type="number" name="admin_5[{{$user->id}}]" id="admin_{{$user->id}}_5" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="admin_{{$user->id}}_6">INTERACCIÓN CON LOS DEMÁS COMPAÑEROS Y ÁREAS DE LA COMPAÑÍA</label>
                                                        <input type="number" name="admin_6[{{$user->id}}]" id="admin_{{$user->id}}_6" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_7">COMUNICACIONES: MANEJO DE LAS COMUNICACIÓNES SEGÚN POLÍTICAS DE LA COMPAÑÍA, ENTERANDO DE TODO AL DIRECTOR DEL PROYECTO</label>
                                                <input type="number" name="admin_7[{{$user->id}}]" id="admin_{{$user->id}}_7" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_8">MANEJO Y NEGOCIACIÓN DE LAS ADQUISICIONES, DE ACUERDO A LAS POLÍTICAS DE COMPRAS Y APROBACIONES DEL DIRECTOR DE PROYECTOS</label>
                                                <input type="number" name="admin_8[{{$user->id}}]" id="admin_{{$user->id}}_8" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_9">GESTIÓN DE TODOS LOS INTERESADOS DE LOS PROYECTOS, INCLUYE INTERESADOS INTERNOS, EXTERNOS Y PATROCINADOR</label>
                                                <input type="number" name="admin_9[{{$user->id}}]" id="admin_{{$user->id}}_9" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_10">MANEJO DE LA PROPIEDAD DEL CLIENTE O PATROCINADOR.</label>
                                                <input type="number" name="admin_10[{{$user->id}}]" id="admin_{{$user->id}}_10" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_11">CUMPLIMIENTO DE POLÍTICAS Y ESTÁNDARES DEL PATROCINADOR (REG NOC, SITIO LIMPIO, ETC.)</label>
                                                <input type="number" name="admin_11[{{$user->id}}]" id="admin_{{$user->id}}_11" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$user->id}}_12">MANEJO DE LA INFORMACIÓN Y DE LA APP ENERGITELCO</label>
                                                <input type="number" name="admin_12[{{$user->id}}]" id="admin_{{$user->id}}_12" class="form-control question_{{$user->id}} admin_input" value="0" max="10" min="0">
                                            </div>
                                        </div>
                                        <div class="block_bonus_driver_{{$user->id}}" {!! old('drive_bonus_check')[$user->id] ? 'style="display: none"' : (($user->register && ($user->register->car || $user->register->moto)) ? '' : 'style="display: none"') !!}>
                                            <h4>Conductor</h4>
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label for="driver_{{$user->id}}_1"><input type="checkbox" name="carro[{{$user->id}}]" value="1" {{($user->register && $user->register->car) ? 'checked' : '' }}> BONIFICACIÓN POR CONDUCIR CARRO</label>
                                                    <input type="number" name="driver_1[{{$user->id}}]" id="driver_{{$user->id}}_1" class="form-control question2_{{$user->id}} driver_input" value="0" max="10" min="0">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="driver_{{$user->id}}_2"><input type="checkbox" name="moto[{{$user->id}}]" value="1" {{($user->register && $user->register->moto) ? 'checked' : '' }}> BONIFICACIÓN POR CONDUCIR MOTO</label>
                                                    <input type="number" name="driver_2[{{$user->id}}]" id="driver_{{$user->id}}_2" class="form-control question2_{{$user->id}} driver_input" value="0" max="10" min="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block_bonus_24_7_{{$user->id}}" {!!old('24_7_bonus_check')[$user->id] || $user->b24_7 ? '' : 'style="display:none"'!!}>
                                            <div class="form-group">
                                                <label for="bonus_24_7">Bonificación 24/7 (valor $)</label>
                                                <input type="number" name="bonus_24_7[{{$user->id}}]" id="bonus_24_7_{{$user->id}}" class="form-control total_24_7" value="{{old('bonus_24_7')[$user->id] ?? 0 }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="commentary_{{$user->id}}">Comentarios</label>
                                            <textarea name="commentary[{{$user->id}}]" id="commentary_{{$user->id}}" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 block_bonus_administrative_{{$user->id}}" style="display: none">
                                                <h4>Porcentaje bonificación administrativa</h4>
                                                <span id="percentage_admin_{{ $user->id }}">0,00%</span>
                                                <input type="hidden" name="percentage_admin[{{$user->id}}]" value="0" id="percentage_admin_{{$user->id}}" class="percentage_admin">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 block_bonus_administrative_{{$user->id}}" style="display: none">
                                                <h4>Total bonificación administrativa</h4>
                                                <input type="hidden" name="total_admin[{{$user->id}}]" value="0" id="total_admin_{{$user->id}}" class="total_admin">
                                                <span id="total_pay_admin_{{ $user->id }}">$0,00</span>
                                            </div>
                                            <div class="col-md-4 block_bonus_driver_{{$user->id}}" {!! old('drive_bonus_check')[$user->id] ? 'style="display: none"' : (($user->register && ($user->register->car || $user->register->moto)) ? '' : 'style="display: none"') !!}>
                                                <h4>Total bonificación conductor</h4>
                                                <input type="hidden" name="total_dirver[{{$user->id}}]" value="0" id="total_driver_{{$user->id}}" class="total_driver">
                                                <span id="total_pay_driver_{{ $user->id }}">$0,00</span>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Total neto a pagar</h3>
                                                <input type="hidden" name="total_user[{{$user->id}}]" value="0" id="total_{{$user->id}}" class="total_user">
                                                <span id="total_pay_{{ $user->id }}">$0,00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal" data-target="#modal_report_{{$user->id}}">Reporte 24/7</button>
                        <div class="modal fade" id="modal_report_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$user->name}} - {{$user->position->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="info_24_7" id="info_24_7_{{$user->id}}">
                                            <p>
                                                Estado actual: 
                                                <span class="state_24_7" id="state_24_7_{{$user->id}}">{{$user->b24_7 ? 'Activo' : 'Inactivo'}}</span>
                                            </p>
                                            @if ($user->b24_7)
                                                <p>
                                                    Fecha de última activacion:
                                                    <span class="last_24_7">{{$user->last_24_7}}</span>
                                                </p>
                                            @endif
                                            @if ($user->time_24_7)
                                            @php
                                                $time = json_decode($user->time_24_7,true)
                                            @endphp
                                                <p>
                                                    Tiempo: 
                                                    <span class="time_24_7" id="time_24_7_{{$user->id}}">Meses: {{ $time['m'] }}, Días: {{ $time['d'] }}, Horas: {{ $time['h'] }}, Minutos: {{ $time['i'] }}</span>
                                                </p>
                                            @else
                                                <p>
                                                    Tiempo: 
                                                    <span class="time_24_7" id="time_24_7_{{$user->id}}">Meses: 0, Días: 0, Horas: 0, Minutos: 0</span>
                                                </p>
                                            @endif
                                        </div>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Descripción</th>
                                                    <th>Plus</th>
                                                    <th>Fecha</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->report_24_7 as $item)
                                                    @if ($item->status == 0)
                                                        <tr>
                                                            <td>{{$item->description}}</td>
                                                            <td>{{$item->plus ? 'Si' : 'No'}}</td>
                                                            <td>{{$item->created_at}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @if (!isset($item))
                                                    <tr>
                                                        <td colspan="3" class="text-center">Sin reportes</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
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
                    <th>Total bonificaciones a administrativos</th>
                    <th>Total bonificaciones a condutores</th>
                    <th>Total bonificaciones 24/7</th>
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
                        <td>
                            <span id="total_admin">$0,00</span>
                            <input type="hidden" name="total_pay_admin" value="0" id="total_pay_admin">
                        </td>
                        <td>
                            <span id="total_driver">$0,00</span>
                            <input type="hidden" name="total_pay_drive" value="0" id="total_pay_drive">
                        </td>
                        <td>
                            <span id="total_24_7">$0,00</span>
                            <input type="hidden" name="total_pay_24_7" value="0" id="total_pay_24_7">
                        </td>
                        <th>
                            <h4><span id="total_all">$0,00</span></h4>
                            <input type="hidden" name="total_pay" value="0" id="total_pay">
                        </th>
                    </tr>
                </tbody>
            </tbody>
        </table>
    </div>
</div>