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
            @foreach ($id->users as $item)
                <tr>
                    <th><input type="checkbox" name="user_add[{{ $item->user->id }}]" id="user_add_{{ $item->user->id }}" value="{{ $item->user->id }}" class="check_user" checked></th>
                    <th>{{$item->user->cedula}}</th>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->user->position->name}}</td>
                    <td id="total_pay_td_{{ $item->user->id }}">${{number_format($item->total_user,2,',','.')}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$item->user->id}}">Evaluar</button>
                        <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal" data-target="#modal_report_{{$item->user->id}}">Reporte 24/7</button>
                        {{-- Modal description --}}
                        <div class="modal fade" id="modal_edit_{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$item->user->name}} - {{$item->user->position->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="working_days">Días trabajados</label>
                                            <input type="number" name="working_days[{{$item->user->id}}]" id="working_days_{{$item->user->id}}" class="form-control working_days" value="{{$item->working_days}}">
                                        </div>
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <label for="admin_bonus_{{ $item->user->id }}">
                                                    <input type="checkbox" id="admin_bonus_checked_{{ $item->user->id }}" class="check_concept admin_bonus_checked" name="admin_bonus_check[{{ $item->user->id}}]" {{ $item->admin_bonus_check ? 'checked' : ''}} value="1"> Bonificación a administrativos
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="drive_bonus_{{ $item->user->id }}">
                                                    <input type="checkbox" id="drive_bonus_checked_{{ $item->user->id }}" class="check_concept drive_bonus_checked" name="drive_bonus_check[{{ $item->user->id }}]" {{ $item->drive_bonus_check ? 'checked' : ''}} value="1"> Bonificación a conductores
                                                </label>
                                            </li>
                                            <li class="list-group-item">
                                                <label for="24_7_bonus_checked_{{ $item->user->id }}">
                                                    <input type="checkbox" id="24_7_bonus_checked_{{ $item->user->id }}" class="check_concept 24_7_bonus_checked" name="b24_7_check[{{ $item->user->id }}]" value="1" {{ $item->b24_7_check ? 'checked' : '' }}> Bonificación 24/7
                                                </label>
                                            </li>
                                            <li class="list-group-item hide">
                                                <label for="na_{{ $item->user->id }}">
                                                    <input type="checkbox" id="na_checked_{{ $item->user->id }}" class="check_concept na_checked" name="na_check[{{ $item->user->id }}]" {{ $item->na_checked ? 'checked' : ''}} value="1"> Está en incapacidad o en vacaciones
                                                </label>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="block_bonus_administrative_{{$item->user->id}}" {!! !$item->admin_bonus_check ? 'style="display: none"' : ''!!}>
                                            <div class="form-group">
                                                <label for="value_bonus_{{$item->user->id}}">Bonificación segun su cargo</label>
                                                <input type="text" name="value_bonus[{{$item->user->id}}]" id="value_bonus_{{$item->user->id}}" value="{{ old('value_bonus')[$item->user->id] ? old('value_bonus')[$item->user->id] : $item->value_bonus }}" class="form-control">
                                            </div>
                                            <h4>Admistrativo</h4>
                                            <hr>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_1"><h5>ALCANCE</h5> MANEJO DEL ALCANCE DE LOS PROYECTOS DE LA COMPAÑÍA</label>
                                                <input type="number" name="admin_1[{{$item->user->id}}]" id="admin_{{$item->user->id}}_1" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_1}}" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_2"><h5>TIEMPO</h5> MANEJO CORRECTO DE TIEMPOS Y CUMPLIMIENTO DE CRONOGRAMAS</label>
                                                <input type="number" name="admin_2[{{$item->user->id}}]" id="admin_{{$item->user->id}}_2" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_2}}" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_3"><h5>COSTO</h5> MANEJO CORRECTO DE LOS COSTOS DE LOS PROYECTOS</label>
                                                <input type="number" name="admin_3[{{$item->user->id}}]" id="admin_{{$item->user->id}}_3" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_3}}" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_4">MANEJO DE LA CALIDAD Y DE POLÍTICA CERO PENDIENTES</label>
                                                <input type="number" name="admin_4[{{$item->user->id}}]" id="admin_{{$item->user->id}}_4" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_4}}" max="10" min="0">
                                            </div>
                                            <h5>RECURSO HUMANO (INTEGRACIÓN Y BUENA COORDINACIÓN DEL RECURSO HUMANO)</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="admin_{{$item->user->id}}_5">PUNTUALIDAD</label>
                                                        <input type="number" name="admin_5[{{$item->user->id}}]" id="admin_{{$item->user->id}}_5" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_5}}" max="10" min="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="admin_{{$item->user->id}}_6">INTERACCIÓN CON LOS DEMÁS COMPAÑEROS Y ÁREAS DE LA COMPAÑÍA</label>
                                                        <input type="number" name="admin_6[{{$item->user->id}}]" id="admin_{{$item->user->id}}_6" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_6}}" max="10" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_7">COMUNICACIONES: MANEJO DE LAS COMUNICACIÓNES SEGÚN POLÍTICAS DE LA COMPAÑÍA, ENTERANDO DE TODO AL DIRECTOR DEL PROYECTO</label>
                                                <input type="number" name="admin_7[{{$item->user->id}}]" id="admin_{{$item->user->id}}_7" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_7}}" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_8">MANEJO Y NEGOCIACIÓN DE LAS ADQUISICIONES, DE ACUERDO A LAS POLÍTICAS DE COMPRAS Y APROBACIONES DEL DIRECTOR DE PROYECTOS</label>
                                                <input type="number" name="admin_8[{{$item->user->id}}]" id="admin_{{$item->user->id}}_8" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_8}}" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_9">GESTIÓN DE TODOS LOS INTERESADOS DE LOS PROYECTOS, INCLUYE INTERESADOS INTERNOS, EXTERNOS Y PATROCINADOR</label>
                                                <input type="number" name="admin_9[{{$item->user->id}}]" id="admin_{{$item->user->id}}_9" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_9}}" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_10">MANEJO DE LA PROPIEDAD DEL CLIENTE O PATROCINADOR.</label>
                                                <input type="number" name="admin_10[{{$item->user->id}}]" id="admin_{{$item->user->id}}_10" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_10}}" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_11">CUMPLIMIENTO DE POLÍTICAS Y ESTÁNDARES DEL PATROCINADOR (REG NOC, SITIO LIMPIO, ETC.)</label>
                                                <input type="number" name="admin_11[{{$item->user->id}}]" id="admin_{{$item->user->id}}_11" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_11}}" max="10" min="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_{{$item->user->id}}_12">MANEJO DE LA INFORMACIÓN Y DE LA APP ENERGITELCO</label>
                                                <input type="number" name="admin_12[{{$item->user->id}}]" id="admin_{{$item->user->id}}_12" class="form-control question_{{$item->user->id}} admin_input" value="{{$item->admin_12}}" max="10" min="0">
                                            </div>
                                        </div>
                                        <div class="block_bonus_driver_{{$item->user->id}}" {!! !$item->drive_bonus_check ? 'style="display: none"' : '' !!}>
                                            <h4>Conductor</h4>
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label for="driver_{{$item->user->id}}_1"><input type="checkbox" {{$item->carro ? 'checked' : ''}} name="carro[{{$item->user->id}}]" value="1"> BONIFICACIÓN POR CONDUCIR CARRO</label>
                                                    <input type="number" name="driver_1[{{$item->user->id}}]" id="driver_{{$item->user->id}}_1" class="form-control question2_{{$item->user->id}} driver_input" value="{{$item->driver_1}}" max="10" min="0">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="driver_{{$item->user->id}}_2"><input type="checkbox" {{$item->moto ? 'checked' : ''}} name="moto[{{$item->user->id}}]" value="1"> BONIFICACIÓN POR CONDUCIR MOTO</label>
                                                    <input type="number" name="driver_2[{{$item->user->id}}]" id="driver_{{$item->user->id}}_2" class="form-control question2_{{$item->user->id}} driver_input" value="{{$item->driver_2}}" max="10" min="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block_bonus_24_7_{{$item->user->id}}" {!! !$item->b24_7_check ? 'style="display: none"' : '' !!}>
                                            <div class="form-group">
                                                <label for="bonus_24_7">Bonificación 24/7 (valor $)</label>
                                                <input type="number" name="bonus_24_7[{{$item->user->id}}]" id="bonus_24_7_{{$item->user->id}}" class="form-control total_24_7" value="{{$item->bonus_24_7}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="commentary_{{$item->user->id}}">Comentarios</label>
                                            <textarea name="commentary[{{$item->user->id}}]" id="commentary_{{$item->user->id}}" cols="30" rows="3" class="form-control">{{$item->commentary}}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 block_bonus_administrative_{{$item->user->id}}" {!! !$item->admin_bonus_check ? 'style="display: none"' : ''!!}>
                                                <h4>Porcentaje bonificación administrativa</h4>
                                                <span id="percentage_admin_{{ $item->user->id }}">${{number_format($item->percentage_admin,2,',','.')}}</span>
                                                <input type="hidden" name="percentage_admin[{{$item->user->id}}]" value="{{$item->percentage_admin}}" id="percentage_admin_{{$item->user->id}}" class="percentage_admin">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 block_bonus_administrative_{{$item->user->id}}" {!! !$item->admin_bonus_check ? 'style="display: none"' : ''!!}>
                                                <h4>Total bonificación administrativa</h4>
                                                <input type="hidden" name="total_admin[{{$item->user->id}}]" value="{{$item->total_admin}}" id="total_admin_{{$item->user->id}}" class="total_admin">
                                                <span id="total_pay_admin_{{ $item->user->id }}">${{number_format($item->total_admin,2,',','.')}}</span>
                                            </div>
                                            <div class="col-md-4 block_bonus_driver_{{$item->user->id}}" {!! !$item->drive_bonus_check ? 'style="display: none"' : ''!!}>
                                                <h4>Total bonificación conductor</h4>
                                                <input type="hidden" name="total_dirver[{{$item->user->id}}]" value="{{$item->total_dirver}}" id="total_driver_{{$item->user->id}}" class="total_driver">
                                                <span id="total_pay_driver_{{ $item->user->id }}">${{number_format($item->total_dirver,2,',','.')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Total neto a pagar</h3>
                                                <input type="hidden" name="total_user[{{$item->user->id}}]" value="{{$item->total_user}}" id="total_{{$item->user->id}}" class="total_user">
                                                <span id="total_pay_{{ $item->user->id }}">${{number_format($item->total_user,2,',','.')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal_report_{{$item->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$item->user->name}} - {{$item->user->position->name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="info_24_7" id="info_24_7_{{$item->user->id}}">
                                            <input type="hidden" name="state_24_7[{{$item->user->id}}]" id="state_24_7_user_{{$item->user->id}}" value="{{$item->state_24_7}}">
                                            <input type="hidden" name="last_24_7[{{$item->user->id}}]" id="last_24_7_user_{{$item->user->id}}" value="{{$item->last_24_7}}">
                                            <input type="hidden" name="time_24_7[{{$item->user->id}}]" id="time_24_7_user_{{$item->user->id}}" value="{{$item->time_24_7}}">
                                            <p>
                                                Estado:
                                                <span class="state_24_7" id="state_24_7_{{$item->user->id}}">{{$item->state_24_7 ? 'Activo' : 'Inactivo'}}</span>
                                            </p>
                                            @if ($item->state_24_7)
                                                <p>
                                                    Fecha de última activacion:
                                                    <span class="last_24_7">{{$item->last_24_7}}</span>
                                                </p>
                                            @endif
                                            @php
                                                $time = json_decode($item->time_24_7,true)
                                            @endphp
                                            <p>
                                                Tiempo: 
                                                <span class="time_24_7" id="time_24_7_{{$item->user->id}}">Meses: {{ $time['m'] ?? 0 }}, Días: {{ $time['d'] ?? 0 }}, Horas: {{ $time['h'] ?? 0 }}, Minutos: {{ $time['i'] ?? 0 }}</span>
                                            </p>
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
                                                @foreach ($item->user->report_24_7 as $item)
                                                    @if ($item->bonus_id == $id->id)
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
                            <span id="total_employees_tx">{{$id->total_employees}}</span>
                            <input type="hidden" name="total_employees" value="{{$id->total_employees}}" id="total_employees">
                        </td>
                        <td>
                            <span id="total_admin">${{number_format($id->total_pay_admin,2,',','.')}}</span>
                            <input type="hidden" name="total_pay_admin" value="{{$id->total_pay_admin}}" id="total_pay_admin">
                        </td>
                        <td>
                            <span id="total_driver">${{number_format($id->total_pay_drive,2,',','.')}}</span>
                            <input type="hidden" name="total_pay_drive" value="{{$id->total_pay_drive}}" id="total_pay_drive">
                        </td>
                        <td>
                            <span id="total_24_7">${{number_format($id->total_pay_24_7,2,',','.')}}</span>
                            <input type="hidden" name="total_pay_24_7" value="{{$id->total_pay_24_7}}" id="total_pay_24_7">
                        </td>
                        <th>
                            <h4><span id="total_all">${{number_format($id->total_pay,2,',','.')}}</span></h4>
                            <input type="hidden" name="total_pay" value="{{$id->total_pay}}" id="total_pay">
                        </th>
                    </tr>
                </tbody>
            </tbody>
        </table>
    </div>
</div>