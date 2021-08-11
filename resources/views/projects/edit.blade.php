@extends('lte.layouts')
@php
function entregables($project){
    $values = array();
    foreach ($project->time_plannings as $time_planning){
        foreach ($time_planning->activity->deliverables as $deliverable){
            $find = true;
            
                foreach ($values as $value){
                    if($deliverable->id == $value->id){
                        $find = false;
                    }
                }
            
            if ($find){
                $values[] = $deliverable;
            }
        }
    }
    return $values;
}

function deliverablesCheck($deliverables, $id){
    $state = '';
    foreach ($deliverables as $item){
        if($item->deliverable_id == $id) {
            if ($item->state == 1){
                $state = 'checked';
            }
        }
    }
    return $state;
}

function groupMakeups($cable){
    $result = '';
    if($cable->type->name == 'Nodo' && $cable->is_ovp == 0)
        $result = 'group_1';
    
    if($cable->is_ovp == 1)
        $result = 'group_2';
    
    if($cable->type->name == 'Power')
        $result = 'group_3';
    
    if($cable->type->name == 'Antenas'){
        $ca = explode(' ',$cable->description);
        if ($ca[1] == "1")
            $result = "group_4";
            
        if ($ca[1]=="2")
            $result = "group_5";

        if ($ca[1]=="3" )
            $result = "group_6";

        if ($ca[1]=="4" )
            $result = "group_7";
    }
    
    return $result;
}

function hasMaterial($id,$material_id,$type,$place){
    foreach ($id->consumables as $item){
        if ($item->material_id == $material_id && $item->type == $type && $item->place == $place)
            return $item->value;
    }
}

function hasLength($id,$material_id){
    foreach ($id->lenght as $item){
        if ($item->material_id == $material_id)
            return $item->value;
    }
}

function hasTimeControl($id,$item){
    foreach ($id->time_controls as $time_control){
        if ($time_control->item == $item)
            return $time_control->number_hours;
    }
}
function hasDeliveryFeedback($id,$item){
    foreach ($id->time_controls as $time_control){
        if ($time_control->item == $item)
            return $time_control->delivery_feedback;
    }
}
@endphp

@section('content')
<section class="content-header">
    <h1>
        Editar proyecto <small>Gestión de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Proyectos</a></li>
        <li class="active">Editar proyectos</li>
    </ol>
</section>
<section class="content">
    {{--  Inputs hiden  --}}
    <div class="hide">
        {{--  projects info  --}}
        <select name="project[]" id="projects" class="form-control">
            <option selected disabled></option>
            @foreach ($projects as $project)
                <option class="projectOption_{{$project->id}}" value="{{$project->id}}">{{$project->description}}</option>
            @endforeach
        </select>
        @foreach ($projects as $project)
            <p id="name_{{$project->id}}">{{$project->description}}</p>
            @foreach ($project->PaymentLimit as $limit)
                <label style="display: block;" for="time_{{$project->id}}_{{$limit->id}}" class="time_{{$project->id}}">
                    <input type="checkbox" name="time[]" id="time_{{$limit->id}}_{{$project->id}}" value="{{$limit->id}}" class="value_{{$project->hasTime($limit->id)}}">
                    {{$project->hasTime($limit->id)}} día(s) {{$limit->description_time}}
                </label>
            @endforeach
        @endforeach
        {{--  Makeups RF  --}}
        @foreach ($makeups_rf as $makeup_rf)
            @foreach ($makeup_rf->volteos as $volteo)
                <span class="{{groupMakeups($volteo->cable)}}">{{$volteo->default}}</span>
            @endforeach
        @endforeach
    </div>
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Editar proyecto</div>
            <div class="box-tools">
                <a href="{{route('project')}}" class="btn btn-sm btn-success">Volver</a>
            </div>
        </div>
        <form action="{{route('project_update',$id->id)}}" method="POST" autocomplete="off">
            @csrf
            @method("PUT")
            <div class="box-body">
                {{--  Main  --}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            {{--  Project main  --}}
                            <label for="name">Proyecto</label>
                            <select name="project_main_id" id="name" class="form-control">
                                <option selected disabled></option>
                                @foreach ($projects as $project)
                                    <option {{($id->project_main_id == $project->id) ? 'selected' : ''}} class="projectOption_{{$project->id}}" value="{{$project->id}}">{{$project->description}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="project_name">Nombre del proyecto</label>
                            <input type="text" name="project_name" value="{{$id->project_name}}" id="project_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="start_date">Inicio de actividades:</label>
                            <input type="date" name="start_date" value="{{$id->start_date}}" class="form-control pull-right" id="start_date">
                        </div>
                        <div class="col-sm-3">
                            <label for="start_date"></label>
                            <input type="time" name="start_time" value="{{$id->start_time}}" class="form-control pull-right" id="start_time">
                        </div>
                        <!-- /.input group -->
                        <div class="col-md-6">
                            <label for="comentary">Comentarios</label>
                            <textarea name="comentary" id="comentary" cols="30" rows="3" class="form-control">{{$id->comentary}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tipo de proyecto:</label><br>
                            <label for="checkbox_type_rf"><input name="rf" type="checkbox" {{ ($id->rf == 1) ? 'checked' : '' }} value="1" class="checkMarckeType" id="checkbox_type_rf"> RF</label>
                            <br>
                            <label for="checkbox_type_mw"><input name="mw" type="checkbox" {{ ($id->mw == 2) ? 'checked' : '' }} value="2" class="checkMarckeType" id="checkbox_type_mw"> MW</label>
                        </div>
                    </div>
                </div>
                {{--  bonus table  --}}
                <div class="table-responsive">
                    <table id="bonus_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ítem a bonificar</th>
                                <th>Cantidad</th>
                                <th>Días</th>
                                <th>Total de días</th>
                                <th>Comentarios</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tr class="active">
                            <td colspan="6" class="text-center">
                                <strong>Fase de instalación</strong>
                                <button id="btnLap_1" class="btn btn-xs btn-link btn-new-item"><i class="fa fa-plus"></i> Agregar otro item</button>
                            </td>
                        </tr>
                        <tbody id="bonusTableBody_1">
                            @foreach ($id->time_plannings as $time_planning)
                                @if ($time_planning->phase_item == 1)
                                    @include('projects.includes.time_planning')
                                @endif
                            @endforeach
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="3">Total fase instalación</td>
                            <td id="tdTotalFase_1">{{$id->total_installation_phase}}</td>
                            <td><input type="hidden" id="inputTotalFase_1" name="total_installation_phase" value="{{$id->total_installation_phase}}"></td>
                            <td></td>
                        </tr>
                        <tr class="active">
                            <td colspan="6" class="text-center">
                                <strong>Fase de recolección de entregables</strong>
                                <button id="btnLap_2" class="btn btn-xs btn-link btn-new-item"><i class="fa fa-plus"></i> Agregar otro item</button>
                            </td>
                        </tr>
                        <tbody id="bonusTableBody_2">
                            @foreach ($id->time_plannings as $time_planning)
                                @if ($time_planning->phase_item == 2)
                                    @include('projects.includes.time_planning')
                                @endif
                            @endforeach
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="3">Total fase entregables</td>
                            <td id="tdTotalFase_2">{{$id->total_deliverables_phase}}</td>
                            <td><input type="hidden" id="inputTotalFase_2" name="total_deliverables_phase" value="{{$id->total_deliverables_phase}}"></td>
                            <td></td>
                        </tr>
                        <tr class="active">
                            <td colspan="6" class="text-center">
                                <strong>Fase de recolección pruebas y On Air</strong>
                                <button id="btnLap_3" class="btn btn-xs btn-link btn-new-item"><i class="fa fa-plus"></i> Agregar otro item</button>
                            </td>
                        </tr>
                        <tbody id="bonusTableBody_3">
                            @foreach ($id->time_plannings as $time_planning)
                                @if ($time_planning->phase_item == 3)
                                    @include('projects.includes.time_planning')
                                @endif
                            @endforeach
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="3">Total fase On Air</td>
                            <td id="tdTotalFase_3">{{$id->total_on_air_phase}}</td>
                            <td><input type="hidden" id="inputTotalFase_3" name="total_on_air_phase" value="{{$id->total_on_air_phase}}"></td>
                            <td></td>
                        </tr>
                        <tr class="active text-right">
                            <td colspan="3">Total proyecto en campo</td>
                            <td id="totalDays">{{$id->total_field_phases}}</td>
                            <td><input type="hidden" id="inputTotalDays" name="total_field_phases" value="{{$id->total_field_phases}}"></td>
                            <td></td>
                        </tr>
                        <tr class="active">
                            <td colspan="6" class="text-center"><strong>Fase de recolección de entregables y seguimiento</strong></td>
                        </tr>
                        <tr>
                            <th>Ítem</th>
                            <th colspan="2">Descripción</th>
                            <th>Cantidad horas</th>
                            <th colspan="2">Comentarios</th>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Recepción de OT</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,0)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,0)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Planeación OT (Presente archivo)</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,1)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,1)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Soporte a persona en campo</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,2)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,2)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Verificación de entregables</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,3)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,3)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Elaboración de entregable 850</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,4)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,4)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Elaboración de entregable 1900</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,5)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,5)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Elaboración de entregable LTE</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,6)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,6)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Elaboración de entregable GSM</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,7)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,7)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Elaboración de entregable MW</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,8)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,8)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Auditoria en campo</td>
                            <td><input type="number" class="form-control numberHours" name="number_hours[]" value="{{hasTimeControl($id,9)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,9)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="2">Entrega proyecto</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{hasTimeControl($id,10)}}" id="number_hours"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{hasDeliveryFeedback($id,10)}}" id="delivery_feedback"></td>
                        </tr>
                        <tr class="active text-right">
                            <td colspan="2">Total proyecto directivo</td>
                            <td></td>
                            <td id="totalDays_4">{{$id->total_control_phase}}</td>
                            <td><input type="hidden" id="inputTotalFase_4" name="total_control_phase" value="{{$id->total_control_phase}}"></td>
                            <td></td>
                        </tr>
                        <tr class="active text-right">
                            <th colspan="3">Total proyecto</th>
                            <td id="totalDayFinish">{{$id->total_days_project}}</td>
                            <td><input type="hidden" id="inputTotalDayFinish" name="total_days_project" value="{{$id->total_days_project}}"></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <hr>
                <h4>Entregables</h4>
                <ul class="list-group">
                   @foreach (entregables($id) as $item)
                       <a class="list-group-item list-group-item-action">
                           <label for="deliverable_{{$item->id}}">
                        <input type="hidden" name="deliverable_project[]"  value="{{$item->id}}">
                        <input type="checkbox" name="deliverable[]" id="deliverable_{{$item->id}}" {{ deliverablesCheck($id->deliverables,$item->id)}} value="{{$item->id}}" {{($item->deliverable == 'Permiso Energitelco App diario') ? 'disabled': ''}}> {{ $item->deliverable }} </label>
                       </a>
                   @endforeach
                </ul>
                <hr>
                {{-- Consumables RF --}}
                <div class="row" id="section_rf" style="display: none">
                    <hr>
                    <div class="col-md-6">
                        <h4>Planeación de consumibles RF</h4>
                        @foreach ($materials as $material_rf)
                            @if ($material_rf->project_type == 2 && $material_rf->place == 1)
                                <div class="form-group">
                                    <label for="material_{{$material_rf->id}}">{{$material_rf->id}}. {{$material_rf->description}}</label>
                                    <input type="number" name="material_rf[]" id="material_{{$material_rf->id}}" value="{{hasMaterial($id,$material_rf->id,2,1)}}" class="form-control material">
                                    @if($material_rf->hasLength)
                                        <br>
                                        <label for="length_{{$material_rf->id}}">Longitud línea metros DC</label>
                                        <input type="number" class="form-control length_value" value="{{hasLength($id,$material_rf->id)}}" placeholder="Longitud línea metros DC" name="length[{{ $material_rf->id }}]" id="length_{{$material_rf->id}}">
                                    @endif
                                    @foreach ($material_rf->consumables as $consumable)
                                        <div class="hide formulas_{{$material_rf->id}}" id="formula_{{$consumable->id}}">{{$material_rf->hasFormula($consumable->id)}}</div>
                                    @endforeach
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h4>Acomedidas</h4>
                        @foreach ($materials as $acomedida_rf)
                            @if ($acomedida_rf->project_type == 2 && $acomedida_rf->place == 2)
                                <div class="form-group">
                                    <label for="acomedida_{{$acomedida_rf->id}}">{{$acomedida_rf->id}}. {{$acomedida_rf->description}}</label>
                                    <input type="number" name="measured_rf[]" id="acomedida_{{$acomedida_rf->id}}" value="{{hasMaterial($id,$acomedida_rf->id,2,2)}}" class="form-control material">
                                    @foreach ($acomedida_rf->consumables as $consumable)
                                        <div class="hide formulas_{{$acomedida_rf->id}}" id="formula_{{$consumable->id}}">{{$acomedida_rf->hasFormula($consumable->id)}}</div>
                                    @endforeach
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{-- Consumables MW --}}
                <div class="row" id="section_mw" style="display: none">
                    <hr>
                    <div class="col-md-6">
                        <h4>Planeación de consumibles MW</h4>
                        @foreach ($materials as $material_mw)
                            @if ($material_mw->project_type == 3 && $material_mw->place == 1)
                                <div class="form-group">
                                    <label for="material_{{$material_mw->id}}">{{$material_mw->id}}. {{$material_mw->description}}</label>
                                    <input type="number" name="material_mw[]" id="material_{{$material_mw->id}}" value="{{hasMaterial($id,$material_mw->id,3,1)}}" class="form-control material">
                                    @if($material_mw->hasLength)
                                        <br>
                                        <label for="length_{{$material_mw->id}}">Longitud línea metros RG</label>
                                        <input type="number" class="form-control" value="{{hasLength($id,$material_mw->id)}}" placeholder="Longitud línea metros RG" name="length[{{ $material_mw->id }}]" id="length_{{$material_mw->id}}">
                                    @endif
                                    @foreach ($material_mw->consumables as $consumable)
                                        <div class="hide formulas_{{$material_mw->id}}" id="formula_{{$consumable->id}}">{{$material_mw->hasFormula($consumable->id)}}</div>
                                    @endforeach
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h4>Acomedidas</h4>
                        @foreach ($materials as $acomedida_mw)
                            @if ($acomedida_mw->project_type == 3 && $acomedida_mw->place == 2)
                                <div class="form-group">
                                    <label for="acomedida_{{$acomedida_mw->id}}">{{$acomedida_mw->id}}. {{$acomedida_mw->description}}</label>
                                    <input type="number" name="measured_mw[]" id="acomedida_{{$acomedida_mw->id}}" value="{{hasMaterial($id,$acomedida_mw->id,3,2)}}" class="form-control acomedida">
                                    @foreach ($acomedida_mw->consumables as $consumable)
                                        <div class="hide formulas_{{$acomedida_mw->id}}" id="formula_{{$consumable->id}}">{{$acomedida_mw->hasFormula($consumable->id)}}</div>
                                    @endforeach
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{-- Marquillas RF --}}
                <div id="section_marke_rf" style="display: none;">
                    <hr>
                    <h4>Planeación de marquillas RF</h4>
                    <div class="form-group">
                        <div class="radio">
                            <label><input type="checkbox" class="checkboxQuestion" {{$id->whitOVP ? 'checked' : ''}} name="questions[]" value="1">¿Con OVP?</label>
                        </div>
                        <div class="radio">
                            <label><input type="checkbox" class="checkboxQuestion" {{$id->whitPower ? 'checked' : ''}} name="questions[]" value="2">¿Con POWER?</label>
                        </div>
                    </div>
                    <h5>Número de sector?</h5>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="checkbox" class="checkboxQuestion" name="sector[]" {{$id->sector_1 ? 'checked' : ''}} value="1">
                                Sector 1
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="checkbox" class="checkboxQuestion" name="sector[]" {{$id->sector_2 ? 'checked' : ''}} value="2">
                                Sector 2
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="checkbox" class="checkboxQuestion" name="sector[]" {{$id->sector_3 ? 'checked' : ''}} value="3">
                                Sector 3
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="checkbox" class="checkboxQuestion" name="sector[]" {{$id->sector_4 ? 'checked' : ''}} value="4">
                                Sector 4
                            </label>
                        </div>
                    </div>
                    <p><strong>Total de marquillas:</strong> <span id="totalMarquillasRF">0</span><input type="hidden" name="marckup_total" id="marckup_total"></p>
                </div>
                {{-- Marquillas MW --}}
                <div id="section_marke_mw" style="display: none">
                    <hr>
                    <h3>Planeación de marquillas MW</h3>
                    <section id="sectionMarkedIduMw">
                        {{--  Type marke idu mw  --}}
                        <h4>Planeación marquillas IDU MW</h4>
                        <div class="form-group">
                            <label for="type_marke_mw">Tipo de enlace de configuración</label>
                            <br>
                            <label for="type_marke_mw_1">
                                <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_1" value="1" {{($id->MakeupMw_1_1->state) ? 'checked' : ''}} class="type_marke_mw">
                                Enlace de configuración estándar
                            </label>
                            <br>
                            <label for="type_marke_mw_2">
                                <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_2" value="2" {{($id->MakeupMw_1_2->state) ? 'checked' : ''}} class="type_marke_mw">
                                Enlace de configuración XPIC
                            </label>
                            <br>
                            <label for="type_marke_mw_3">
                                <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_3" value="3" {{($id->MakeupMw_1_3->state) ? 'checked' : ''}} class="type_marke_mw">
                                Enlace de configuración con diversidad de espacio (SD)
                            </label>
                            <br>
                            <label for="type_marke_mw_4">
                                <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_4" value="4" {{($id->MakeupMw_1_4->state) ? 'checked' : ''}} class="type_marke_mw">
                                Enlace de configuración XPIC con diversidad de espacio (SD)
                            </label>
                            <br>
                            <label for="type_marke_mw_5">
                                <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_5" value="5" {{($id->MakeupMw_1_5->state) ? 'checked' : ''}} class="type_marke_mw">
                                Enlace de configuración N+1 XPIC
                            </label>
                            <br>
                            <p id="textInfoEnlaces" class="help-block">No se ha chequeado ningún enlace de configuración</p>
                        </div>
                        {{--  Modales  --}}
                        <div class="row">
                            <div class="col-md-2" id="divBtnModal_1" style="display: none">
                                <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_1" class="btn btn-sm btn-success">E.C. Estándar</button>
                            </div>
                            <div class="col-md-2" id="divBtnModal_2" style="display: none">
                                <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_2" class="btn btn-sm btn-success">E.C. XPIC</button>
                            </div>
                            <div class="col-md-2" id="divBtnModal_3" style="display: none">
                                <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_3" class="btn btn-sm btn-success">E.C. (SD)</button>
                            </div>
                            <div class="col-md-2" id="divBtnModal_4" style="display: none">
                                <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_4" class="btn btn-sm btn-success">E.C. XPIC con (SD)</button>
                            </div>
                            <div class="col-md-2" id="divBtnModal_5" style="display: none">
                                <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_5" class="btn btn-sm btn-success">E.C. N+1 XPIC</button>
                            </div>
                        </div>
                        {{--  Modales de enlaces de marquilla MW  --}}
                        {{--  Model de enlace estándar  --}}
                        <div class="modal fade" id="modalEnlaceMarked_1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                            Enlace de configuración estándar <br>
                                            <small>Aplica para instalaciones con configuración de 1+0 o 0+1</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="local_station_1">Estación base local</label>
                                            <input type="text" id="local_station_1" name="local_station_1" value="{{$id->MakeupMw_1_1->local_station_1}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_local_1">IP local</label>
                                                    <input type="text" id="ip_local_1" name="ip_local_1" value="{{$id->MakeupMw_1_1->ip_local_1}}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_local_1">ID local</label>
                                                    <input type="text" id="id_local_1" name="id_local_1" value="{{$id->MakeupMw_1_1->id_local_1}}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="local_frequency_1">Frecuencia TX local</label>
                                                    <input type="text" id="local_frequency_1" name="local_frequency_1" value="{{$id->MakeupMw_1_1->local_frequency_1}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="remote_station_1">Estación base remota</label>
                                            <input type="text" id="remote_station_1" value="{{$id->MakeupMw_1_1->remote_station_1}}" name="remote_station_1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_remote_1">IP remota</label>
                                                    <input type="text" id="ip_remote_1" value="{{$id->MakeupMw_1_1->ip_remote_1}}" name="ip_remote_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_remote_1">ID remota</label>
                                                    <input type="text" id="id_remote_1" value="{{$id->MakeupMw_1_1->id_remote_1}}" name="id_remote_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="remote_frequency">Frecuencia TX remota</label>
                                                    <input type="text" id="remote_frequency_1" value="{{$id->MakeupMw_1_1->remote_frequency_1}}" name="remote_frequency_1" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_1">Marca del equipo</label>
                                                    <input type="text" id="equipment_brand_1" value="{{$id->MakeupMw_1_1->equipment_brand_1}}" name="equipment_brand_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_1">Modelo del equipo</label>
                                                    <input type="text" id="equipment_model_1" value="{{$id->MakeupMw_1_1->equipment_model_1}}" name="equipment_model_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_1">Fecha de instalación</label>
                                                    <input type="text" id="instalation_date_1" value="{{$id->MakeupMw_1_1->instalation_date_1}}" name="instalation_date_1" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_1_1">Altura antena</label>
                                                    <input type="text" id="antenna_height_1_1" value="{{$id->MakeupMw_1_1->antenna_height_1_1}}" name="antenna_height_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_1_1">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_1_1" value="{{$id->MakeupMw_1_1->antenna_diameter_1_1}}" name="antenna_diameter_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="polarity">Polaridad</label>
                                                    <input type="text" id="polarity_1_1" value="{{$id->MakeupMw_1_1->polarity_1_1}}" name="polarity_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_1_1">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_1_1" value="{{$id->MakeupMw_1_1->antenna_model_1_1}}" name="antenna_model_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_1_1">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_1_1" value="{{$id->MakeupMw_1_1->antenna_brand_1_1}}" name="antenna_brand_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_1_1">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_1_1" value="{{$id->MakeupMw_1_1->antenna_serial_1_1}}" name="antenna_serial_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_1_1">Azimuth</label>
                                                    <input type="text" id="azimuth_1_1" value="{{$id->MakeupMw_1_1->azimuth_1_1}}" name="azimuth_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_1_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_1_1" value="{{$id->MakeupMw_1_1->level_tx_1_1}}" name="level_tx_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_1_1">Nivel Rx</label>
                                                    <input type="text" id="level_rx_1_1" value="{{$id->MakeupMw_1_1->level_rx_1_1}}" name="level_rx_1_1" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_1_2">Altura antena</label>
                                                    <input type="text" id="antenna_height_1_2" value="{{$id->MakeupMw_1_1->antenna_height_1_2}}" name="antenna_height_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_1_2">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_1_2" value="{{$id->MakeupMw_1_1->antenna_diameter_1_2}}" name="antenna_diameter_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="polarity">Polaridad</label>
                                                    <input type="text" id="polarity_1_2" value="{{$id->MakeupMw_1_1->polarity_1_2}}" name="polarity_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_1_2">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_1_2" value="{{$id->MakeupMw_1_1->antenna_model_1_2}}" name="antenna_model_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_1_2">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_1_2" value="{{$id->MakeupMw_1_1->antenna_brand_1_2}}" name="antenna_brand_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_1_2">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_1_2" value="{{$id->MakeupMw_1_1->antenna_serial_1_2}}" name="antenna_serial_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_1_2">Azimuth</label>
                                                    <input type="text" id="azimuth_1_2" value="{{$id->MakeupMw_1_1->azimuth_1_2}}" name="azimuth_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_1_2">Nivel Tx</label>
                                                    <input type="text" id="level_tx_1_2" value="{{$id->MakeupMw_1_1->level_tx_1_2}}" name="level_tx_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_1_2">Nivel Rx</label>
                                                    <input type="text" id="level_rx_1_2" value="{{$id->MakeupMw_1_1->level_rx_1_2}}" name="level_rx_1_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  Model de enlace XPIC  --}}
                        <div class="modal fade" id="modalEnlaceMarked_2" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                            Enlace de configuración estándar <br>
                                            <small>Aplica para instalaciones con configuración XPIC. Dimensiones 9,5 cm x 11,4 cm</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="station_local_2">Estación base local</label>
                                            <input type="text" id="station_local_2" value="{{$id->MakeupMw_1_2->station_local_2}}" name="station_local_2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_local_2">IP local</label>
                                                    <input type="text" id="ip_local_2" value="{{$id->MakeupMw_1_2->ip_local_2}}" name="ip_local_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_local_2">ID local</label>
                                                    <input type="text" id="id_local_2" value="{{$id->MakeupMw_1_2->id_local_2}}" name="id_local_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="local_frecuency_2">Frecuencia TX local</label>
                                                    <input type="text" id="local_frecuency_2" value="{{$id->MakeupMw_1_2->local_frecuency_2}}" name="local_frecuency_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="station_remote_2">Estación base remota</label>
                                            <input type="text" id="station_remote_2" value="{{$id->MakeupMw_1_2->station_remote_2}}" name="station_remote_2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_remote_2">IP remota</label>
                                                    <input type="text" id="ip_remote_2" value="{{$id->MakeupMw_1_2->ip_remote_2}}" name="ip_remote_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_remote_2">ID remota</label>
                                                    <input type="text" id="id_remote_2" value="{{$id->MakeupMw_1_2->id_remote_2}}" name="id_remote_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="remote_frecuency_2">Frecuencia TX remota</label>
                                                    <input type="text" id="remote_frecuency_2" value="{{$id->MakeupMw_1_2->remote_frecuency_2}}" name="remote_frecuency_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_2">Marca de equipo</label>
                                                    <input type="text" id="equipment_brand_2" value="{{$id->MakeupMw_1_2->equipment_brand_2}}" name="equipment_brand_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_2">Modelo de equipo</label>
                                                    <input type="text" id="equipment_model_2" value="{{$id->MakeupMw_1_2->equipment_model_2}}" name="equipment_model_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_2">Fecha de instalación</label>
                                                    <input type="text" id="instalation_date_2" value="{{$id->MakeupMw_1_2->instalation_date_2}}" name="instalation_date_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_2_1">Altura antena</label>
                                                    <input type="text" id="antenna_height_2_1" value="{{$id->MakeupMw_1_2->antenna_height_2_1}}" name="antenna_height_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_2_1">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_2_1" value="{{$id->MakeupMw_1_2->antenna_diameter_2_1}}" name="antenna_diameter_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_2_1">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_2_1" value="{{$id->MakeupMw_1_2->antenna_model_2_1}}" name="antenna_model_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_2_1">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_2_1" value="{{$id->MakeupMw_1_2->antenna_brand_2_1}}" name="antenna_brand_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_2_1">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_2_1" value="{{$id->MakeupMw_1_2->antenna_serial_2_1}}" name="antenna_serial_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_2_1">Azimuth</label>
                                                    <input type="text" id="azimuth_2_1" value="{{$id->MakeupMw_1_2->azimuth_2_1}}" name="azimuth_2_1" class="form-control">
                                                </div>
                                            </div>
                                            <h5>Polaridad vertical</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_2_1_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_2_1_1" value="{{$id->MakeupMw_1_2->level_tx_2_1_1}}" name="level_tx_2_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_2_1_1">Nivel Rx</label>
                                                    <input type="text" id="level_rx_2_1_1" value="{{$id->MakeupMw_1_2->level_rx_2_1_1}}" name="level_rx_2_1_1" class="form-control">
                                                </div>
                                            </div>
                                            <h5>Polaridad horizontal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_2_1_2">Nivel Tx</label>
                                                    <input type="text" id="level_tx_2_1_2" value="{{$id->MakeupMw_1_2->level_tx_2_1_2}}" name="level_tx_2_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_2_1_2">Nivel Rx</label>
                                                    <input type="text" id="level_rx_2_1_2" value="{{$id->MakeupMw_1_2->level_rx_2_1_2}}" name="level_rx_2_1_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_2_2">Altura antena</label>
                                                    <input type="text" id="antenna_height_2_2" value="{{$id->MakeupMw_1_2->antenna_height_2_2}}" name="antenna_height_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_2_2">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_2_2" value="{{$id->MakeupMw_1_2->antenna_diameter_2_2}}" name="antenna_diameter_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_2_2">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_2_2" value="{{$id->MakeupMw_1_2->antenna_model_2_2}}" name="antenna_model_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_2_2">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_2_2" value="{{$id->MakeupMw_1_2->antenna_brand_2_2}}" name="antenna_brand_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_2_2">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_2_2" value="{{$id->MakeupMw_1_2->antenna_serial_2_2}}" name="antenna_serial_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_2_2">Azimuth</label>
                                                    <input type="text" id="azimuth_2_2" value="{{$id->MakeupMw_1_2->azimuth_2_2}}" name="azimuth_2_2" class="form-control">
                                                </div>
                                            </div>
                                            <h5>Polaridad vertical</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_2_2_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_2_2_1" value="{{$id->MakeupMw_1_2->level_tx_2_2_1}}" name="level_tx_2_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_2_2_1">Nivel Rx</label>
                                                    <input type="text" id="level_rx_2_2_1" value="{{$id->MakeupMw_1_2->level_rx_2_2_1}}" name="level_rx_2_2_1" class="form-control">
                                                </div>
                                            </div>
                                            <h5>Polaridad horizontal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_2_2_2">Nivel Tx</label>
                                                    <input type="text" id="level_tx_2_2_2" value="{{$id->MakeupMw_1_2->level_tx_2_2_2}}" name="level_tx_2_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_2_2_2">Nivel Rx</label>
                                                    <input type="text" id="level_rx_2_2_2" value="{{$id->MakeupMw_1_2->level_rx_2_2_2}}" name="level_rx_2_2_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  Model de enlace (SD)  --}}
                        <div class="modal fade" id="modalEnlaceMarked_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                            Enlace de configuración estándar <br>
                                            <small>Aplica para instalaciones con configuración con diversidad de espacio (SD).</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="station_local_3">Estación base local</label>
                                            <input type="text" id="station_local_3" value="{{$id->MakeupMw_1_3->station_local_3}}" name="station_local_3" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_local_1">IP local</label>
                                                    <input type="text" id="ip_local_3" value="{{$id->MakeupMw_1_3->ip_local_3}}" name="ip_local_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_local_3">ID local</label>
                                                    <input type="text" id="id_local_3" value="{{$id->MakeupMw_1_3->id_local_3}}" name="id_local_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="local_frecuency_3">Frecuencia TX local</label>
                                                    <input type="text" id="local_frecuency_3" value="{{$id->MakeupMw_1_3->local_frecuency_3}}" name="local_frecuency_3" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="station_remote_3">Estación base remota</label>
                                            <input type="text" id="station_remote_3" value="{{$id->MakeupMw_1_3->station_remote_3}}" name="station_remote_3" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_remote_3">IP remota</label>
                                                    <input type="text" id="ip_remote_3" value="{{$id->MakeupMw_1_3->ip_remote_3}}" name="ip_remote_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_remote_3">ID remota</label>
                                                    <input type="text" id="id_remote_3" value="{{$id->MakeupMw_1_3->id_remote_3}}" name="id_remote_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="remote_frecuency_3">Frecuencia TX remota</label>
                                                    <input type="text" id="remote_frecuency_3" value="{{$id->MakeupMw_1_3->remote_frecuency_3}}" name="remote_frecuency_3" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_3">Marca de equipo</label>
                                                    <input type="text" id="equipment_brand_3" value="{{$id->MakeupMw_1_3->equipment_brand_3}}" name="equipment_brand_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_3">Modelo de equipo</label>
                                                    <input type="text" id="equipment_model_3" value="{{$id->MakeupMw_1_3->equipment_model_3}}" name="equipment_model_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_3">Fecha de instalación</label>
                                                    <input type="text" id="instalation_date_3" value="{{$id->MakeupMw_1_3->instalation_date_3}}" name="instalation_date_3" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="polarity_3_1">Polaridad</label>
                                                    <input type="text" id="polarity_3_1" value="{{$id->MakeupMw_1_3->polarity_3_1}}" name="polarity_3_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_3_1">Azimuth</label>
                                                    <input type="text" id="azimuth_3_1" value="{{$id->MakeupMw_1_3->azimuth_3_1}}" name="azimuth_3_1" class="form-control">
                                                </div>
                                            </div>
                                            <h5>Antena principal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_3_1_1">Altura antena</label>
                                                    <input type="text" id="antenna_height_3_1_1" value="{{$id->MakeupMw_1_3->antenna_height_3_1_1}}" name="antenna_height_3_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_3_1_1">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_3_1_1" value="{{$id->MakeupMw_1_3->antenna_diameter_3_1_1}}" name="antenna_diameter_3_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_3_1_1">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_3_1_1" value="{{$id->MakeupMw_1_3->antenna_model_3_1_1}}" name="antenna_model_3_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_3_1_1">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_3_1_1" value="{{$id->MakeupMw_1_3->antenna_brand_3_1_1}}" name="antenna_brand_3_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_3_1_1">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_3_1_1" value="{{$id->MakeupMw_1_3->antenna_serial_3_1_1}}" name="antenna_serial_3_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_3_1_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_3_1_1" value="{{$id->MakeupMw_1_3->level_tx_3_1_1}}" name="level_tx_3_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_3_1_1">Nivel Rx</label>
                                                    <input type="text" id="level_rx_3_1_1" value="{{$id->MakeupMw_1_3->level_rx_3_1_1}}" name="level_rx_3_1_1" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Antena diversidad</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="antenna_height_3_1_2">Altura antena</label>
                                                <input type="text" id="antenna_height_3_1_2" value="{{$id->MakeupMw_1_3->antenna_height_3_1_2}}" name="antenna_height_3_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_diameter_3_1_2">Diámetro Antena</label>
                                                <input type="text" id="antenna_diameter_3_1_2" value="{{$id->MakeupMw_1_3->antenna_diameter_3_1_2}}" name="antenna_diameter_3_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_model_3_1_2">Modelo de antena</label>
                                                <input type="text" id="antenna_model_3_1_2" value="{{$id->MakeupMw_1_3->antenna_model_3_1_2}}" name="antenna_model_3_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_brand_3_1_2">Marca de antena</label>
                                                <input type="text" id="antenna_brand_3_1_2" value="{{$id->MakeupMw_1_3->antenna_brand_3_1_2}}" name="antenna_brand_3_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_serial_3_1_2">Serial de la antena</label>
                                                <input type="text" id="antenna_serial_3_1_2" value="{{$id->MakeupMw_1_3->antenna_serial_3_1_2}}" name="antenna_serial_3_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="level_tx_3_1_2">Nivel Tx</label>
                                                <input type="text" id="level_tx_3_1_2" value="{{$id->MakeupMw_1_3->level_tx_3_1_2}}" name="level_tx_3_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="level_rx_3_1_2">Nivel Rx</label>
                                                <input type="text" id="level_rx_3_1_2" value="{{$id->MakeupMw_1_3->level_rx_3_1_2}}" name="level_rx_3_1_2" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="polarity_3_2">Polaridad</label>
                                                    <input type="text" id="polarity_3_2" value="{{$id->MakeupMw_1_3->polarity_3_2}}" name="polarity_3_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_3_2">Azimuth</label>
                                                    <input type="text" id="azimuth_3_2" value="{{$id->MakeupMw_1_3->azimuth_3_2}}" name="azimuth_3_2" class="form-control">
                                                </div>
                                            </div>
                                            <h5>Antena principal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_3_2_1">Altura antena</label>
                                                    <input type="text" id="antenna_height_3_2_1" value="{{$id->MakeupMw_1_3->antenna_height_3_2_1}}" name="antenna_height_3_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_3_2_1">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_3_2_1" value="{{$id->MakeupMw_1_3->antenna_diameter_3_2_1}}" name="antenna_diameter_3_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_3_2_1">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_3_2_1" value="{{$id->MakeupMw_1_3->antenna_model_3_2_1}}" name="antenna_model_3_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_3_2_1">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_3_2_1" value="{{$id->MakeupMw_1_3->antenna_brand_3_2_1}}" name="antenna_brand_3_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_3_2_1">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_3_2_1" value="{{$id->MakeupMw_1_3->antenna_serial_3_2_1}}" name="antenna_serial_3_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_3_2_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_3_2_1" value="{{$id->MakeupMw_1_3->level_tx_3_2_1}}" name="level_tx_3_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_3_2_1">Nivel Rx</label>
                                                    <input type="text" id="level_rx_3_2_1" value="{{$id->MakeupMw_1_3->level_rx_3_2_1}}" name="level_rx_3_2_1" class="form-control">
                                                </div>
                                            </div>
                                            <h5>Antena diversidad</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_3_2_2">Altura antena</label>
                                                    <input type="text" id="antenna_height_3_2_2" value="{{$id->MakeupMw_1_3->antenna_height_3_2_2}}" name="antenna_height_3_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_3_2_2">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_3_2_2" value="{{$id->MakeupMw_1_3->antenna_diameter_3_2_2}}" name="antenna_diameter_3_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_3_2_2">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_3_2_2" value="{{$id->MakeupMw_1_3->antenna_model_3_2_2}}" name="antenna_model_3_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_3_2_2">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_3_2_2" value="{{$id->MakeupMw_1_3->antenna_brand_3_2_2}}" name="antenna_brand_3_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_3_2_2">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_3_2_2" value="{{$id->MakeupMw_1_3->antenna_serial_3_2_2}}" name="antenna_serial_3_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_3_2_2">Nivel Tx</label>
                                                    <input type="text" id="level_tx_3_2_2" value="{{$id->MakeupMw_1_3->level_tx_3_2_2}}" name="level_tx_3_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_3_2_2">Nivel Rx</label>
                                                    <input type="text" id="level_rx_3_2_2" value="{{$id->MakeupMw_1_3->level_rx_3_2_2}}" name="level_rx_3_2_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  Model de enlace XPIC (SD)  --}}
                        <div class="modal fade" id="modalEnlaceMarked_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Enlace de configuración XPIC con diversidad de espacio (SD)<br>
                                            <small>Aplica para instalaciones con configuración con XPIC con diversidad de espacio (SD)</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="station_local_4">Estación base local</label>
                                            <input type="text" id="station_local_4" value="{{$id->MakeupMw_1_4->station_local_4}}" name="station_local_4" class="form-control">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="ip_local_4">IP local</label>
                                                <input type="text" id="ip_local_4" value="{{$id->MakeupMw_1_4->ip_local_4}}" name="ip_local_4" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="id_local_4">ID local</label>
                                                <input type="text" id="id_local_4" value="{{$id->MakeupMw_1_4->id_local_4}}" name="id_local_4" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="local_frecuency_4">Frecuencia TX local</label>
                                                <input type="text" id="local_frecuency_4" value="{{$id->MakeupMw_1_4->local_frecuency_4}}" name="local_frecuency_4" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="station_remote_4">Estación base remota</label>
                                            <input type="text" id="station_remote_4" value="{{$id->MakeupMw_1_4->station_remote_4}}" name="station_remote_4" class="form-control">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="ip_remote_4">IP remota</label>
                                                <input type="text" id="ip_remote_4" value="{{$id->MakeupMw_1_4->ip_remote_4}}" name="ip_remote_4" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ip_remote_4">ID remota</label>
                                                <input type="text" id="id_remote_4" value="{{$id->MakeupMw_1_4->id_remote_4}}" name="id_remote_4" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="remote_frecuency_4">Frecuencia TX remota</label>
                                                <input type="text" id="remote_frecuency_4" value="{{$id->MakeupMw_1_4->remote_frecuency_4}}" name="remote_frecuency_4" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="equipment_brand_4">Marca de equipo</label>
                                                <input type="text" id="equipment_brand_4" value="{{$id->MakeupMw_1_4->equipment_brand_4}}" name="equipment_brand_4" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="equipment_model_4">Modelo de equipo</label>
                                                <input type="text" id="equipment_model_4" value="{{$id->MakeupMw_1_4->equipment_model_4}}" name="equipment_model_4" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="instalation_date_4">Fecha de instalación</label>
                                                <input type="text" id="instalation_date_4" value="{{$id->MakeupMw_1_4->instalation_date_4}}" name="instalation_date_4" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Configuración antena local</h3>
                                        <div class="form-group">
                                            <label for="azimuth_4_1">Azimuth</label>
                                            <input type="text" id="azimuth_4_1" value="{{$id->MakeupMw_1_4->azimuth_4_1}}" name="azimuth_4_1" class="form-control">
                                        </div>
                                        <hr>
                                        <h4>Antena principal</h4>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="antenna_height_4_1">Altura antena</label>
                                                <input type="text" id="antenna_height_4_1" value="{{$id->MakeupMw_1_4->antenna_height_4_1}}" name="antenna_height_4_1" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_diameter_4_1">Diámetro Antena</label>
                                                <input type="text" id="antenna_diameter_4_1" value="{{$id->MakeupMw_1_4->antenna_diameter_4_1}}" name="antenna_diameter_4_1" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_model_4_1">Modelo de antena</label>
                                                <input type="text" id="antenna_model_4_1" value="{{$id->MakeupMw_1_4->antenna_model_4_1}}" name="antenna_model_4_1" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_brand_4_1">Marca de antena</label>
                                                <input type="text" id="antenna_brand_4_1" value="{{$id->MakeupMw_1_4->antenna_brand_4_1}}" name="antenna_brand_4_1" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_serial_4_1">Serial de la antena</label>
                                                <input type="text" id="antenna_serial_4_1" value="{{$id->MakeupMw_1_4->antenna_serial_4_1}}" name="antenna_serial_4_1" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Polaridad vertical</h5>
                                                <div class="form-group">
                                                    <label for="level_tx_4_1_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_4_1_1" value="{{$id->MakeupMw_1_4->level_tx_4_1_1}}" name="level_tx_4_1_1" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="level_rx_4">Nivel Rx</label>
                                                    <input type="text" id="level_rx_4_1_1" value="{{$id->MakeupMw_1_4->level_rx_4_1_1}}" name="level_rx_4_1_1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Polaridad horizontal</h5>
                                                <div class="form-group">
                                                    <label for="level_tx_4_1_2">Nivel Tx</label>
                                                    <input type="text" id="level_tx_4_1_2" value="{{$id->MakeupMw_1_4->level_tx_4_1_2}}" name="level_tx_4_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="level_rx_4_1_2">Nivel Rx</label>
                                                    <input type="text" id="level_rx_4_1_2" value="{{$id->MakeupMw_1_4->level_rx_4_1_2}}" name="level_rx_4_1_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Antena Diversidad</h4>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="antenna_height_4_1_2">Altura antena</label>
                                                <input type="text" id="antenna_height_4_1_2" value="{{$id->MakeupMw_1_4->antenna_height_4_1_2}}" name="antenna_height_4_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_diameter_4_1_2">Diámetro Antena</label>
                                                <input type="text" id="antenna_diameter_4_1_2" value="{{$id->MakeupMw_1_4->antenna_diameter_4_1_2}}" name="antenna_diameter_4_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_model_4_1_2">Modelo de antena</label>
                                                <input type="text" id="antenna_model_4_1_2" value="{{$id->MakeupMw_1_4->antenna_model_4_1_2}}" name="antenna_model_4_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_brand_4_1_2">Marca de antena</label>
                                                <input type="text" id="antenna_brand_4_1_2" value="{{$id->MakeupMw_1_4->antenna_brand_4_1_2}}" name="antenna_brand_4_1_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_serial_4_1_2">Serial de la antena</label>
                                                <input type="text" id="antenna_serial_4_1_2" value="{{$id->MakeupMw_1_4->antenna_serial_4_1_2}}" name="antenna_serial_4_1_2" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Polaridad vertical</h5>
                                                <div class="form-group">
                                                    <label for="level_tx_4_1_2_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_4_1_2_1" value="{{$id->MakeupMw_1_4->level_tx_4_1_2_1}}" name="level_tx_4_1_2_1" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="level_rx_4">Nivel Rx</label>
                                                    <input type="text" id="level_rx_4_1_2_1" value="{{$id->MakeupMw_1_4->level_rx_4_1_2_1}}" name="level_rx_4_1_2_1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Polaridad horizontal</h5>
                                                <div class="form-group">
                                                    <label for="level_tx_4_1_2_2">Nivel Tx</label>
                                                    <input type="text" id="level_tx_4_1_2_2" value="{{$id->MakeupMw_1_4->level_tx_4_1_2_2}}" name="level_tx_4_1_2_2" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="level_rx_4_1_2_2">Nivel Rx</label>
                                                    <input type="text" id="level_rx_4_1_2_2" value="{{$id->MakeupMw_1_4->level_rx_4_1_2_2}}" name="level_rx_4_1_2_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Configuración antena remota</h3>
                                        <div class="form-group">
                                            <label for="azimuth_4_2">Azimuth</label>
                                            <input type="text" id="azimuth_4_2" value="{{$id->MakeupMw_1_4->azimuth_4_2}}" name="azimuth_4_2" class="form-control">
                                        </div>
                                        <hr>
                                        <h4>Antena principal</h4>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="antenna_height_4_2">Altura antena</label>
                                                <input type="text" id="antenna_height_4_2" value="{{$id->MakeupMw_1_4->antenna_height_4_2}}" name="antenna_height_4_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_diameter_4_2">Diámetro Antena</label>
                                                <input type="text" id="antenna_diameter_4_2" value="{{$id->MakeupMw_1_4->antenna_diameter_4_2}}" name="antenna_diameter_4_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_model_4_2">Modelo de antena</label>
                                                <input type="text" id="antenna_model_4_2" value="{{$id->MakeupMw_1_4->antenna_model_4_2}}" name="antenna_model_4_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_brand_4_2">Marca de antena</label>
                                                <input type="text" id="antenna_brand_4_2" value="{{$id->MakeupMw_1_4->antenna_brand_4_2}}" name="antenna_brand_4_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_serial_4_2">Serial de la antena</label>
                                                <input type="text" id="antenna_serial_4_2" value="{{$id->MakeupMw_1_4->antenna_serial_4_2}}" name="antenna_serial_4_2" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Polaridad vertical</h5>
                                                <div class="form-group">
                                                    <label for="level_tx_4_2_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_4_2_1" value="{{$id->MakeupMw_1_4->level_tx_4_2_1}}" name="level_tx_4_2_1" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="level_rx_4_2_1">Nivel Rx</label>
                                                    <input type="text" id="level_rx_4_2_1" value="{{$id->MakeupMw_1_4->level_rx_4_2_1}}" name="level_rx_4_2_1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Polaridad horizontal</h5>
                                                <div class="form-group">
                                                    <label for="level_tx_4_2_2">Nivel Tx</label>
                                                    <input type="text" id="level_tx_4_2_2" value="{{$id->MakeupMw_1_4->level_tx_4_2_2}}" name="level_tx_4_2_2" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="level_rx_4_2_2">Nivel Rx</label>
                                                    <input type="text" id="level_rx_4_2_2" value="{{$id->MakeupMw_1_4->level_rx_4_2_2}}" name="level_rx_4_2_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Antena Diversidad</h4>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="antenna_height_4_2_2">Altura antena</label>
                                                <input type="text" id="antenna_height_4_2_2" value="{{$id->MakeupMw_1_4->antenna_height_4_2_2}}" name="antenna_height_4_2_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_diameter_4_2_2">Diámetro Antena</label>
                                                <input type="text" id="antenna_diameter_4_2_2" value="{{$id->MakeupMw_1_4->antenna_diameter_4_2_2}}" name="antenna_diameter_4_2_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_model_4_2_2">Modelo de antena</label>
                                                <input type="text" id="antenna_model_4_2_2" value="{{$id->MakeupMw_1_4->antenna_model_4_2_2}}" name="antenna_model_4_2_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_brand_4_2_2">Marca de antena</label>
                                                <input type="text" id="antenna_brand_4_2_2" value="{{$id->MakeupMw_1_4->antenna_brand_4_2_2}}" name="antenna_brand_4_2_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_serial_4_2_2">Serial de la antena</label>
                                                <input type="text" id="antenna_serial_4_2_2" value="{{$id->MakeupMw_1_4->antenna_serial_4_2_2}}" name="antenna_serial_4_2_2" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Polaridad vertical</h5>
                                                <div class="form-group">
                                                    <label for="level_tx_4_2_2_1">Nivel Tx</label>
                                                    <input type="text" id="level_tx_4_2_2_1" value="{{$id->MakeupMw_1_4->level_tx_4_2_2_1}}" name="level_tx_4_2_2_1" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="level_rx_4_2_2_1">Nivel Rx</label>
                                                    <input type="text" id="level_rx_4_2_2_1" value="{{$id->MakeupMw_1_4->level_rx_4_2_2_1}}" name="level_rx_4_2_2_1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Polaridad horizontal</h5>
                                                <div class="form-group">
                                                    <label for="level_tx_4_2_2_2">Nivel Tx</label>
                                                    <input type="text" id="level_tx_4_2_2_2" value="{{$id->MakeupMw_1_4->level_tx_4_2_2_2}}" name="level_tx_4_2_2_2" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="level_rx_4_2_2_2">Nivel Rx</label>
                                                    <input type="text" id="level_rx_4_2_2_2" value="{{$id->MakeupMw_1_4->level_rx_4_2_2_2}}" name="level_rx_4_2_2_2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  Model de enlace N+1 XPIC  --}}
                        <div class="modal fade" id="modalEnlaceMarked_5" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Enlace de configuración N+1 XPIC<br>
                                            <small>Aplica para instalaciones con configuración N+1 XPIC</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="station_local_5">Estación base local</label>
                                            <input type="text" id="station_local_5" value="{{$id->MakeupMw_1_5->station_local_5}}" name="station_local_5" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ip_local_5">IP local</label>
                                                    <input type="text" id="ip_local_5" value="{{$id->MakeupMw_1_5->ip_local_5}}" name="ip_local_5" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="id_local_5">ID local</label>
                                                    <input type="text" id="id_local_5" value="{{$id->MakeupMw_1_5->id_local_5}}" name="id_local_5" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="station_remota_5">Estación base remota</label>
                                            <input type="text" id="station_remota_5" value="{{$id->MakeupMw_1_5->station_remota_5}}" name="station_remota_5" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ip_remote_5">IP remota</label>
                                                    <input type="text" id="ip_remote_5" value="{{$id->MakeupMw_1_5->ip_remote_5}}" name="ip_remote_5" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="id_remote_5">ID remota</label>
                                                    <input type="text" id="id_remote_5" value="{{$id->MakeupMw_1_5->id_remote_5}}" name="id_remote_5" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_5">Marca de equipo</label>
                                                    <input type="text" id="equipment_brand_5" value="{{$id->MakeupMw_1_5->equipment_brand_5}}" name="equipment_brand_5" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_5">Modelo de equipo</label>
                                                    <input type="text" id="equipment_model_5" value="{{$id->MakeupMw_1_5->equipment_model_5}}" name="equipment_model_5" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_5">Fecha de instalación</label>
                                                    <input type="text" id="instalation_date_5" value="{{$id->MakeupMw_1_5->instalation_date_5}}" name="instalation_date_5" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_heigth_5_1">Altura antena</label>
                                                    <input type="text" id="antenna_heigth_5_1" value="{{$id->MakeupMw_1_5->antenna_heigth_5_1}}" name="antenna_heigth_5_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_5_1">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_5_1" value="{{$id->MakeupMw_1_5->antenna_diameter_5_1}}" name="antenna_diameter_5_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_5_1">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_5_1" value="{{$id->MakeupMw_1_5->antenna_model_5_1}}" name="antenna_model_5_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_5_1">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_5_1" value="{{$id->MakeupMw_1_5->antenna_brand_5_1}}" name="antenna_brand_5_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_5_1">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_5_1" value="{{$id->MakeupMw_1_5->antenna_serial_5_1}}" name="antenna_serial_5_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_5_1">Azimuth</label>
                                                    <input type="text" id="azimuth_5_1" value="{{$id->MakeupMw_1_5->azimuth_5_1}}" name="azimuth_5_1" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_1_1">Frecuencia Tx 1</label>
                                                    <input type="text" id="frecuency_5_1_1" value="{{$id->MakeupMw_1_5->frecuency_5_1_1}}" name="frecuency_5_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_1_2">Frecuencia Tx 2</label>
                                                    <input type="text" id="frecuency_5_1_2" value="{{$id->MakeupMw_1_5->frecuency_5_1_2}}" name="frecuency_5_1_2" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_5_1_1">Nivel Tx 1</label>
                                                    <input type="text" id="level_5_1_1" value="{{$id->MakeupMw_1_5->level_5_1_1}}" name="level_5_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_1_2">Nivel Tx 2</label>
                                                    <input type="text" id="level_5_1_2" value="{{$id->MakeupMw_1_5->level_5_1_2}}" name="level_5_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_1_3">Nivel Tx 3</label>
                                                    <input type="text" id="level_5_1_3" value="{{$id->MakeupMw_1_5->level_5_1_3}}" name="level_5_1_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_1_4">Nivel Tx Stand By</label>
                                                    <input type="text" id="level_5_1_4" value="{{$id->MakeupMw_1_5->level_5_1_4}}" name="level_5_1_4" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="frecuency_rx_5_1_1">Frecuencia Rx 1</label>
                                                    <input type="text" id="frecuency_rx_5_1_1" value="{{$id->MakeupMw_1_5->frecuency_rx_5_1_1}}" name="frecuency_rx_5_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="frecuency_rx_5_1_2">Frecuencia Rx 2</label>
                                                    <input type="text" id="frecuency_rx_5_1_2" value="{{$id->MakeupMw_1_5->frecuency_rx_5_1_2}}" name="frecuency_rx_5_1_2" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_1_1">Nivel Rx 1</label>
                                                    <input type="text" id="level_rx_5_1_1" value="{{$id->MakeupMw_1_5->level_rx_5_1_1}}" name="level_rx_5_1_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_1_2">Nivel Rx 2</label>
                                                    <input type="text" id="level_rx_5_1_2" value="{{$id->MakeupMw_1_5->level_rx_5_1_2}}" name="level_rx_5_1_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_1_3">Nivel Rx 3</label>
                                                    <input type="text" id="level_rx_5_1_3" value="{{$id->MakeupMw_1_5->level_rx_5_1_3}}" name="level_rx_5_1_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_1_4">Nivel Rx Stand By</label>
                                                    <input type="text" id="level_rx_5_1_4" value="{{$id->MakeupMw_1_5->level_rx_5_1_4}}" name="level_rx_5_1_4" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_heigth_5_2">Altura antena</label>
                                                    <input type="text" id="antenna_heigth_5_2" value="{{$id->MakeupMw_1_5->antenna_heigth_5_2}}" name="antenna_heigth_5_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_5_2">Diámetro Antena</label>
                                                    <input type="text" id="antenna_diameter_5_2" value="{{$id->MakeupMw_1_5->antenna_diameter_5_2}}" name="antenna_diameter_5_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_5_2">Modelo de antena</label>
                                                    <input type="text" id="antenna_model_5_2" value="{{$id->MakeupMw_1_5->antenna_model_5_2}}" name="antenna_model_5_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_5_2">Marca de antena</label>
                                                    <input type="text" id="antenna_brand_5_2" value="{{$id->MakeupMw_1_5->antenna_brand_5_2}}" name="antenna_brand_5_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_5_2">Serial de la antena</label>
                                                    <input type="text" id="antenna_serial_5_2" value="{{$id->MakeupMw_1_5->antenna_serial_5_2}}" name="antenna_serial_5_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_5_2">Azimuth</label>
                                                    <input type="text" id="azimuth_5_2" value="{{$id->MakeupMw_1_5->azimuth_5_2}}" name="azimuth_5_2" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_2_1">Frecuencia Tx 1</label>
                                                    <input type="text" id="frecuency_5_2_1" value="{{$id->MakeupMw_1_5->frecuency_5_2_1}}" name="frecuency_5_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_2_2">Frecuencia Tx 2</label>
                                                    <input type="text" id="frecuency_5_2_2" value="{{$id->MakeupMw_1_5->frecuency_5_2_2}}" name="frecuency_5_2_2" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_5_2_1">Nivel Tx 1</label>
                                                    <input type="text" id="level_5_2_1" value="{{$id->MakeupMw_1_5->level_5_2_1}}" name="level_5_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_2_2">Nivel Tx 2</label>
                                                    <input type="text" id="level_5_2_2" value="{{$id->MakeupMw_1_5->level_5_2_2}}" name="level_5_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_2_3">Nivel Tx 3</label>
                                                    <input type="text" id="level_5_2_3" value="{{$id->MakeupMw_1_5->level_5_2_3}}" name="level_5_2_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_2_4">Nivel Tx Stand By</label>
                                                    <input type="text" id="level_5_2_4" value="{{$id->MakeupMw_1_5->level_5_2_4}}" name="level_5_2_4" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="frecuency_rx_5_2_1">Frecuencia Rx 1</label>
                                                    <input type="text" id="frecuency_rx_5_2_1" value="{{$id->MakeupMw_1_5->frecuency_rx_5_2_1}}" name="frecuency_rx_5_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="frecuency_rx_5_2_2">Frecuencia Rx 2</label>
                                                    <input type="text" id="frecuency_rx_5_2_2" value="{{$id->MakeupMw_1_5->frecuency_rx_5_2_2}}" name="frecuency_rx_5_2_2" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_2_1">Nivel Rx 1</label>
                                                    <input type="text" id="level_rx_5_2_1" value="{{$id->MakeupMw_1_5->level_rx_5_2_1}}" name="level_rx_5_2_1" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_2_2">Nivel Rx 2</label>
                                                    <input type="text" id="level_rx_5_2_2" value="{{$id->MakeupMw_1_5->level_rx_5_2_2}}" name="level_rx_5_2_2" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_2_3">Nivel Rx 3</label>
                                                    <input type="text" id="level_rx_5_2_3" value="{{$id->MakeupMw_1_5->level_rx_5_2_3}}" name="level_rx_5_2_3" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_2_4">Nivel Rx Stand By</label>
                                                    <input type="text" id="level_rx_5_2_4" value="{{$id->MakeupMw_1_5->level_rx_5_2_4}}" name="level_rx_5_2_4" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <hr>
                    <section id="sectionMarkedIDUeB_1">
                        <h4>Planeación marquillas IDU Estaciones base</h4>
                        <div class="row">
                            <div class="col-md-2">
                                <button type="button" data-toggle="modal" data-target="#modalMarkedEB1" class="btn btn-sm btn-success">Estación base 1</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" data-toggle="modal" data-target="#modalMarkedEB2" class="btn btn-sm btn-success">Estación base 2</button>
                            </div>
                        </div>
                        {{--  Modal marquilla estacion base 1  --}}
                        <div class="modal fade" id="modalMarkedEB1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Planeación de marquilla IDU estación base 1</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="station_local_10">Estación base local</label>
                                                    <input type="text" value="{{$id->MakeupMw_2_1->station_local_10}}" name="station_local_10" id="station_local_10" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="station_remote_10">Estación base remota</label>
                                                    <input type="text" value="{{$id->MakeupMw_2_1->station_remote_10}}" name="station_remote_10" id="station_remote_10" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="equipment_brand_10">Marca</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->equipment_brand_10}}" name="equipment_brand_10" id="equipment_brand_10" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="equipment_model_10">Modelo</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->equipment_model_10}}" name="equipment_model_10" id="equipment_model_10" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Gestión</h4>
                                        <p>Equipo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="card_10_1">Targeta</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->card_10_1}}" name="card_10_1" id="card_10_1" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_10_1">Slot</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->slot_10_1}}" name="slot_10_1" id="slot_10_1" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_10_1">Puerto o DDF#</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->ddf_10_1}}" name="ddf_10_1" id="ddf_10_1" class="form-control">
                                            </div>
                                        </div>
                                        <p>Equipo de donde se toma la gestión</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="destination_equipment_10">Equipo destino [Nemónico E.B-ID local]</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->destination_equipment_10}}" name="destination_equipment_10" id="destination_equipment_10" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remote_management_10">E.B. Remota de gestión</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->remote_management_10}}" name="remote_management_10" id="remote_management_10" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="card_10_2">Targeta</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->card_10_2}}" name="card_10_2" id="card_10_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_10_2">Slot</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->slot_10_2}}" name="slot_10_2" id="slot_10_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_10_2">Puerto o DDF#</label>
                                                <input type="text" value="{{$id->MakeupMw_2_1->ddf_10_2}}" name="ddf_10_2" id="ddf_10_2" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Energía</h4>
                                        <p>Equipo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_10_1">Posición Main (-48)</label>
                                                <input type="text" class="form-control" name="main_position_10" id="main_position_10" value="{{$id->MakeupMw_2_1->main_position_10}}" inputmode="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pdb_10_1">PDB</label>
                                                <input type="text" class="form-control" name="pdb_10_1" id="pdb_10_1" value="{{$id->MakeupMw_2_1->pdb_10_1}}" inputmode="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_10_2">Posición Main (+0)</label>
                                                <input type="text" class="form-control" name="main_position_10_2" id="main_position_10_2" value="{{$id->MakeupMw_2_1->main_position_10_2}}" inputmode="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="stand_by_10_2">Posición Stand By (-48)</label>
                                                <input type="text" class="form-control" name="stand_by_10_1" id="stand_by_10_1" value="{{$id->MakeupMw_2_1->stand_by_10_1}}" inputmode="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pdb_10_2">PDB</label>
                                                <input type="text" class="form-control" name="pdb_10_2" id="pdb_10_2" value="{{$id->MakeupMw_2_1->pdb_10_2}}" inputmode="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="stand_by_10_2">Posición Stand By (+0)</label>
                                                <input type="text" class="form-control" name="stand_by_10_2" id="stand_by_10_2" value="{{$id->MakeupMw_2_1->stand_by_10_2}}" inputmode="">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Hilo de drenaje</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_10_3">Posición Main (+0)</label>
                                                <input type="text" class="form-control" name="main_position_10_3" id="main_position_10_3" value="{{$id->MakeupMw_2_1->main_position_10_3}}" inputmode="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="stand_by_10_3">Posición Stand By (-48)</label>
                                                <input type="text" class="form-control" name="stand_by_10_3" id="stand_by_10_3" value="{{$id->MakeupMw_2_1->stand_by_10_3}}" inputmode="">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Marquillas E1 / Fibra / ETH</h4>
                                        <p>Estilo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="card_10_3">Targeta</label>
                                                <input type="text" name="card_10_3" id="card_10_3" value="{{$id->MakeupMw_2_1->card_10_3}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_10_3">Slot</label>
                                                <input type="text" name="slot_10_3" id="slot_10_3" value="{{$id->MakeupMw_2_1->slot_10_3}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_10_3">Puerto o DDF#</label>
                                                <input type="text" name="ddf_10_3" id="ddf_10_3" value="{{$id->MakeupMw_2_1->ddf_10_3}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="e1_10_3">E1 #</label>
                                                <input type="text" name="e1_10_3" id="e1_10_3" value="{{$id->MakeupMw_2_1->e1_10_3}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txrx_10_3">TxRx</label>
                                                <input type="text" name="txrx_10_3" id="txrx_10_3" value="{{$id->MakeupMw_2_1->txrx_10_3}}" class="form-control">
                                            </div>
                                        </div>
                                        <p>Equipo a donde se conecta</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="destination_equipment_10_4">Equipo destino [Nemónico E.B-ID local]</label>
                                                <input type="text" name="destination_equipment_10_4" id="destination_equipment_10_4" value="{{$id->MakeupMw_2_1->destination_equipment_10_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remote_connection_10_4">E.B. Remota de conexión</label>
                                                <input type="text" name="remote_connection_10_4" id="remote_connection_10_4" value="{{$id->MakeupMw_2_1->remote_connection_10_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="card_10_4">Targeta</label>
                                                <input type="text" name="card_10_4" id="card_10_4" value="{{$id->MakeupMw_2_1->card_10_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_10_4">Slot</label>
                                                <input type="text" name="slot_10_4" id="slot_10_4" value="{{$id->MakeupMw_2_1->slot_10_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_10_4">Puerto o DDF#</label>
                                                <input type="text" name="ddf_10_4" id="ddf_10_4" value="{{$id->MakeupMw_2_1->ddf_10_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="e1_10_4">E1 #</label>
                                                <input type="text" name="e1_10_4" id="e1_10_4" value="{{$id->MakeupMw_2_1->e1_10_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txrx_10_4">TxRx</label>
                                                <input type="text" name="txrx_10_4" id="txrx_10_4" value="{{$id->MakeupMw_2_1->txrx_10_4}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  Modal marquilla estacion base 2  --}}
                        <div class="modal fade" id="modalMarkedEB2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Planeación de marquilla IDU estación base 2</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="station_local_11">Estación base local</label>
                                                    <input type="text" value="{{$id->MakeupMw_2_2->station_local_11}}" name="station_local_11" id="station_local_11" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="station_remote_11">Estación base remota</label>
                                                    <input type="text" value="{{$id->MakeupMw_2_2->station_remote_11}}" name="station_remote_11" id="station_remote_11" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="equipment_brand_11">Marca</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->equipment_brand_11}}" name="equipment_brand_11" id="equipment_brand_11" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="equipment_model_11">Modelo</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->equipment_model_11}}" name="equipment_model_11" id="equipment_model_11" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Gestión</h4>
                                        <p>Equipo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="card_11_1">Targeta</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->card_11_1}}" name="card_11_1" id="card_11_1" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_11_1">Slot</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->slot_11_1}}" name="slot_11_1" id="slot_11_1" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_11_1">Puerto o DDF#</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->ddf_11_1}}" name="ddf_11_1" id="ddf_11_1" class="form-control">
                                            </div>
                                        </div>
                                        <p>Equipo de donde se toma la gestión</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="destination_equipment_11">Equipo destino [Nemónico E.B-ID local]</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->destination_equipment_11}}" name="destination_equipment_11" id="destination_equipment_11" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remote_management_11">E.B. Remota de gestión</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->remote_management_11}}" name="remote_management_11" id="remote_management_11" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="card_11_2">Targeta</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->card_11_2}}" name="card_11_2" id="card_11_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_11_2">Slot</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->slot_11_2}}" name="slot_11_2" id="slot_11_2" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_11_2">Puerto o DDF#</label>
                                                <input type="text" value="{{$id->MakeupMw_2_2->ddf_11_2}}" name="ddf_11_2" id="ddf_11_2" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Energía</h4>
                                        <p>Equipo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_11_1">Posición Main (-48)</label>
                                                <input type="text" class="form-control" name="main_position_11" value="{{$id->MakeupMw_2_2->main_position_11}}" inputmode="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pdb_11_1">PDB</label>
                                                <input type="text" class="form-control" name="pdb_11_1" value="{{$id->MakeupMw_2_2->pdb_11_1}}" inputmode="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_11_2">Posición Main (+0)</label>
                                                <input type="text" class="form-control" name="main_position_11_2" value="{{$id->MakeupMw_2_2->main_position_11_2}}" inputmode="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="stand_by_11_2">Posición Stand By (-48)</label>
                                                <input type="text" class="form-control" name="stand_by_11_1" value="{{$id->MakeupMw_2_2->stand_by_11_1}}" inputmode="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pdb_11_2">PDB</label>
                                                <input type="text" class="form-control" name="pdb_11_2" value="{{$id->MakeupMw_2_2->pdb_11_2}}" inputmode="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="stand_by_11_2">Posición Stand By (+0)</label>
                                                <input type="text" class="form-control" name="stand_by_11_2" value="{{$id->MakeupMw_2_2->stand_by_11_2}}" inputmode="">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Hilo de drenaje</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_11_3">Posición Main (+0)</label>
                                                <input type="text" class="form-control" name="main_position_11_3" value="{{$id->MakeupMw_2_2->main_position_11_3}}" inputmode="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="stand_by_11_3">Posición Stand By (-48)</label>
                                                <input type="text" class="form-control" name="stand_by_11_3" value="{{$id->MakeupMw_2_2->stand_by_11_3}}" inputmode="">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Marquillas E1 / Fibra / ETH</h4>
                                        <p>Estilo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="card_11_3">Targeta</label>
                                                <input type="text" name="card_11_3" id="card_11_3" value="{{$id->MakeupMw_2_2->card_11_3}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_11_3">Slot</label>
                                                <input type="text" name="slot_11_3" id="slot_11_3" value="{{$id->MakeupMw_2_2->slot_11_3}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_11_3">Puerto o DDF#</label>
                                                <input type="text" name="ddf_11_3" id="ddf_11_3" value="{{$id->MakeupMw_2_2->ddf_11_3}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="e1_11_3">E1 #</label>
                                                <input type="text" name="e1_11_3" id="e1_11_3" value="{{$id->MakeupMw_2_2->e1_11_3}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txrx_11_3">TxRx</label>
                                                <input type="text" name="txrx_11_3" id="txrx_11_3" value="{{$id->MakeupMw_2_2->txrx_11_3}}" class="form-control">
                                            </div>
                                        </div>
                                        <p>Equipo a donde se conecta</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="destination_equipment_11_4">Equipo destino [Nemónico E.B-ID local]</label>
                                                <input type="text" name="destination_equipment_11_4" id="destination_equipment_11_4" value="{{$id->MakeupMw_2_2->destination_equipment_11_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remote_connection_11_4">E.B. Remota de conexión</label>
                                                <input type="text" name="remote_connection_11_4" id="remote_connection_11_4" value="{{$id->MakeupMw_2_2->remote_connection_11_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="card_11_4">Targeta</label>
                                                <input type="text" name="card_11_4" id="card_11_4" value="{{$id->MakeupMw_2_2->card_11_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_11_4">Slot</label>
                                                <input type="text" name="slot_11_4" id="slot_11_4" value="{{$id->MakeupMw_2_2->slot_11_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_11_4">Puerto o DDF#</label>
                                                <input type="text" name="ddf_11_4" id="ddf_11_4" value="{{$id->MakeupMw_2_2->ddf_11_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="e1_11_4">E1 #</label>
                                                <input type="text" name="e1_11_4" id="e1_11_4" value="{{$id->MakeupMw_2_2->e1_11_4}}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txrx_11_4">TxRx</label>
                                                <input type="text" name="txrx_11_4" id="txrx_11_4" value="{{$id->MakeupMw_2_2->txrx_11_4}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <hr>
                    <section id="sectionMarkedOutdoor">
                        <h4>Planeación marquillas OUTDOOR</h4>
                        <div class="row">
                            <div class="col-md-2">
                                <button type="button" data-toggle="modal" data-target="#modalMarkedOutdoor" class="btn btn-sm btn-success">Planeación de marquilla OUTDOOR</button>
                            </div>
                        </div>
                        {{--  Modal marquilla outdoor  --}}
                        <div class="modal fade" id="modalMarkedOutdoor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Planeación de marquilla OUTDOOR</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="radio_model_20">Modelo de radio</label>
                                                    <input type="text" name="radio_model_20" id="radio_model_20" value="{{$id->MakeupMw_3->radio_model_20}}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="band_20">Banda</label>
                                                    <input type="text" name="band_20" id="band_20" value="{{$id->MakeupMw_3->band_20}}" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="polarity_20">Polaridad</label>
                                                    <input type="text" name="polarity_20" id="polarity_20" value="{{$id->MakeupMw_3->polarity_20}}" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="station_20_1">Estación A</label>
                                                    <input type="text" name="station_20_1" id="station_20_1" value="{{$id->MakeupMw_3->station_20_1}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="azimuth_20_1">Azimuth A</label>
                                                    <input type="text" name="azimuth_20_1" id="azimuth_20_1" value="{{$id->MakeupMw_3->azimuth_20_1}}" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="station_20_2">Estación B</label>
                                                    <input type="text" name="station_20_2" id="station_20_2" value="{{$id->MakeupMw_3->station_20_2}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="azimuth_20_2">Azimuth B</label>
                                                    <input type="text" name="azimuth_20_2" id="azimuth_20_2" value="{{$id->MakeupMw_3->azimuth_20_2}}" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>Cantidad de marquillas Estación base 1</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="amount_20_1_1">IF MAIN</label>
                                                    <input type="number" name="amount_20_1_1" id="amount_20_1_1" value="{{$id->MakeupMw_3->amount_20_1_1}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_1_2">IF STAND BY</label>
                                                    <input type="number" name="amount_20_1_2" id="amount_20_1_2" value="{{$id->MakeupMw_3->amount_20_1_2}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_1_3">OUD MAIN - GND</label>
                                                    <input type="number" name="amount_20_1_3" id="amount_20_1_3" value="{{$id->MakeupMw_3->amount_20_1_3}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_1_4">ODU STAND BY - GND</label>
                                                    <input type="number" name="amount_20_1_4" id="amount_20_1_4" value="{{$id->MakeupMw_3->amount_20_1_4}}" class="form-control">
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>Cantidad de marquillas Estación base 2</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="amount_20_2_1">IF MAIN</label>
                                                    <input type="number" name="amount_20_2_1" id="amount_20_2_1" value="{{$id->MakeupMw_3->amount_20_2_1}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_2_2">IF STAND BY</label>
                                                    <input type="number" name="amount_20_2_2" id="amount_20_2_2" value="{{$id->MakeupMw_3->amount_20_2_2}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_2_3">OUD MAIN - GND</label>
                                                    <input type="number" name="amount_20_2_3" id="amount_20_2_3" value="{{$id->MakeupMw_3->amount_20_2_3}}" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_2_4">ODU STAND BY - GND</label>
                                                    <input type="number" name="amount_20_2_4" id="amount_20_2_4" value="{{$id->MakeupMw_3->amount_20_2_4}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="box-footer">
                {{--  Modal para confirmar envio  --}}
                <input type="submit" name="btnSubmit" value="Enviar y firmar" class="btn btn-sm btn-primary btn-send">
                @if ($id->state == 'Guardado')
                    <input type="submit" name="btnSubmit" value="Guardar y firmar" class="btn btn-sm btn-success btn-send">
                @endif
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalOrdenBodega">Ver orden de bodega</button>
                @if ($id->state == 'Aprobado')
                    @if($id->rf == 1)
                    <button type="button" href="{{route('project_download_rf',$id->id)}}" class="btn btn-sm btn-warning">Descargar marquillas RF</button>
                    @endif
                    @if($id->mw == 2)
                        {{-- <a href="{{route('project_download_mw',$id->id)}}" class="btn btn-sm btn-danger">Descargar marquillas MW</a> --}}
                        <button type="button" id="download_mw" class="btn btn-sm btn-danger">Descargar marquillas MW</button>
                    @endif
                    <a type="button" href="" class="btn btn-sm bg-purple">Descargar orden de bodega</a>
                @endif
                {{-- Modal Orden de Bodega --}}
                <div class="modal fade" id="modalOrdenBodega" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLongTitle">Imprimir para almacen</h4>
                            </div>
                            <div class="modal-body table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ítem</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>V/U</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consumables as $consumable)
                                        <tr>
                                            <td>{{$consumable->id}}</td>
                                            <td>{{$consumable->description}}</td>
                                            <td class="consumablesAmount" id="consumableAmount_{{$consumable->id}}">0</td>
                                            <td id="valueConsumable_{{$consumable->id}}">{{$consumable->value}}</td>
                                            <td class="valuesTotalConsumable" id="valueTotalConsumable_{{$consumable->id}}">0</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="2">Total consumables</th>
                                            <td id="consumableAmountTotal">0</td>
                                            <td><input type="hidden" name="consumables_cost" id="inputConsumablesCost"></td>
                                            <td id="consumables_cost">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/project/create.js') }}" defer></script>
    <script>
        var bPreguntar = true;
    
        window.onbeforeunload = preguntarAntesDeSalir;

        $(document).ready(function () {
            $('.btn-send').click(function (){
                bPreguntar = false;
                return d.submit();
            });
            $('#download_mw').click(function () {
                $.ajax({
                    type:'GET',
                    url:'/projects/{{ $id->id }}/mw',
                    cache: false,
                    beforeSend: function(){
                        $('.loader').show('slow');
                    },
                    success:function(data){
                        $('.loader').hide('slow');
                    },
                    error: function (error) {
                        console.error("ERROR : ", error);
                    }
                });
            });
            
        });
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
            return "¿Seguro que quieres salir?";
        }
    </script>
@endsection
