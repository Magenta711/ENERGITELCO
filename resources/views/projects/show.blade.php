@extends('lte.layouts')

@php
function entregables($project){
    $values = array();
    foreach ($project->time_plannings as $time_planning){
        foreach ($time_planning->activity->deliverables as $deliverable){
            $find = true;
            if (!empty($values)){
                foreach ($values as $value){
                    if($deliverable->id == $value->id){
                        $find = false;
                    }
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
    $state = 'Faltante';
    foreach ($deliverables as $item){
        if($item->deliverable_id == $id) {
            if ($item->state == 1){
                $state = 'Listo';
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

function hasMaterial($id,$item,$type,$place){
    $res = "";
    if ($item->type == $type && $item->place == $place){
        $idD = ($place == 1) ? 'material_'.$item->material_id : 'acomedida_'.$item->material_id;
        $res = "<strong>".$item->material->description."</strong><br><p class='material' id='$idD'>$item->value</p>";
        if($item->material->hasLength){
            if($type == 2)
                $lon = "Longitud línea metros DC";

            if ($type == 3)
                $lon = "Longitud línea metros RG";
            $res = $res."<br><strong>$lon</strong><br>".hasLength($id,$item->material->id)."<br>";
        }
        foreach ($item->material->consumables as $consumable){
            $res = $res.'<div class="hide formulas_'.$item->material->id.'" id="formula_'.$consumable->id.'">'.$item->material->hasFormula($consumable->id).'</div>';
        }
        $res = $res."<hr>";
    }
    return $res;
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
        Ver proyecto <small>Gestión de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Proyectos</a></li>
        <li class="active">Ver proyectos</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">{{$id->project_name}}</div>
            <div class="box-tools">
                <a href="{{route('project')}}" class="btn btn-sm btn-success">Volver</a>
            </div>
        </div>
            <div class="box-body">
                {{--  Main  --}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Proyecto</strong> <br>
                            {{$id->project ? $id->project->description : ''}}
                        </div>
                        <div class="col-md-6">
                            <strong>Nombre del proyecto</strong>
                            <br>
                            {{$id->project_name}}
                        </div>
                        <div class="col-sm-3">
                            <label>Inicio de actividades:</label>
                            <br>
                            {{$id->start_date}} {{$id->start_time}}
                        </div>
                        <div class="col-sm-3">
                            <label>Fin de actividades:</label>
                            <br>
                            {{$id->end_date}} {{$id->end_time}}
                        </div>
                        <!-- /.input group -->
                        <div class="col-md-6">
                            <label>Comentarios</label>
                            <br>
                            {{$id->comentary}}
                        </div>
                        <div class="col-md-3">
                            <label>Tipo de proyecto:</label><br>
                            <p class="ProjecType">{{ ($id->rf == 1) ? 'RF' : '' }}</p>
                            <p class="ProjecType">{{ ($id->mw == 2) ? 'MW' : '' }}</p>
                        </div>
                        @if ($id->final_percentage)
                        <div class="col-md-3">
                            <label for="">Porcentaje permitido</label>
                            <p>{{ $id->final_percentage }} % / {{ $id->accepted_percentage }} %</p>
                        </div>
                        @else
                            <div class="col-md-3">
                                <label for="">Porcentaje actual</label>
                                <p>{{ $id->percentage }} % / {{ $id->accepted_percentage }} %</p>
                            </div>
                        @endif
                    </div>
                </div>
                {{--  bonus table  --}}
                <div class="table-responsive">
                    <table id="bonus_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>/</th>
                                <th>Ítem a bonificar</th>
                                <th>Cantidad</th>
                                <th>Días</th>
                                <th>Total de días</th>
                                <th>Comentarios</th>
                                {{-- <th>Acciones</th> --}}
                            </tr>
                        </thead>
                        <tr class="active">
                            <td colspan="7" class="text-center">
                                <strong>Fase de instalación</strong>
                            </td>
                        </tr>
                        <tbody id="bonusTableBody_1">
                            @foreach ($id->time_plannings as $time_planning)
                                @if ($time_planning->phase_item == 1)
                                    @include('projects.includes.show_time_planning')
                                @endif
                            @endforeach
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="4">Total fase instalación</td>
                            <td id="tdTotalFase_1">{{$id->total_installation_phase}}</td>
                            <td><input type="hidden" id="inputTotalFase_1" name="total_installation_phase" value="{{$id->total_installation_phase}}"></td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr class="active">
                            <td colspan="7" class="text-center">
                                <strong>Fase de recolección de entregables</strong>
                            </td>
                        </tr>
                        <tbody id="bonusTableBody_2">
                            @foreach ($id->time_plannings as $time_planning)
                                @if ($time_planning->phase_item == 2)
                                    @include('projects.includes.show_time_planning')
                                @endif
                            @endforeach
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="4">Total fase entregables</td>
                            <td id="tdTotalFase_2">{{$id->total_deliverables_phase}}</td>
                            <td><input type="hidden" id="inputTotalFase_2" name="total_deliverables_phase" value="{{$id->total_deliverables_phase}}"></td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr class="active">
                            <td colspan="7" class="text-center">
                                <strong>Fase de recolección pruebas y On Air</strong>
                            </td>
                        </tr>
                        <tbody id="bonusTableBody_3">
                            @foreach ($id->time_plannings as $time_planning)
                                @if ($time_planning->phase_item == 3)
                                    @include('projects.includes.show_time_planning')
                                @endif
                            @endforeach
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="4">Total fase On Air</td>
                            <td id="tdTotalFase_3">{{$id->total_on_air_phase}}</td>
                            <td><input type="hidden" id="inputTotalFase_3" name="total_on_air_phase" value="{{$id->total_on_air_phase}}"></td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr class="active text-right">
                            <td colspan="4">Total proyecto en campo</td>
                            <td id="totalDays">{{$id->total_field_phases}}</td>
                            <td><input type="hidden" id="inputTotalDays" name="total_field_phases" value="{{$id->total_field_phases}}"></td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr class="active">
                            <td colspan="7" class="text-center"><strong>Fase de recolección de entregables y seguimiento</strong></td>
                        </tr>
                        <tr>
                            <th>Ítem</th>
                            <th colspan="3">Descripción</th>
                            <th>Cantidad horas</th>
                            <th>Comentarios</th>
                            {{-- <th></th> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Recepción de OT</td>
                            <td>{{hasTimeControl($id,0)}}</td>
                            <td>{{hasDeliveryFeedback($id,0)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Planeación OT (Presente archivo)</td>
                            <td>{{hasTimeControl($id,1)}}</td>
                            <td>{{hasDeliveryFeedback($id,1)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Soporte a persona en campo</td>
                            <td>{{hasTimeControl($id,2)}}</td>
                            <td>{{hasDeliveryFeedback($id,2)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Verificación de entregables</td>
                            <td>{{hasTimeControl($id,3)}}</td>
                            <td>{{hasDeliveryFeedback($id,3)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Elaboración de entregable 850</td>
                            <td>{{hasTimeControl($id,4)}}</td>
                            <td>{{hasDeliveryFeedback($id,4)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Elaboración de entregable 1900</td>
                            <td>{{hasTimeControl($id,5)}}</td>
                            <td>{{hasDeliveryFeedback($id,5)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Elaboración de entregable LTE</td>
                            <td>{{hasTimeControl($id,6)}}</td>
                            <td>{{hasDeliveryFeedback($id,6)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Elaboración de entregable GSM</td>
                            <td>{{hasTimeControl($id,7)}}</td>
                            <td>{{hasDeliveryFeedback($id,7)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Elaboración de entregable MW</td>
                            <td>{{hasTimeControl($id,8)}}</td>
                            <td>{{hasDeliveryFeedback($id,8)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Auditoria en campo</td>
                            <td>{{hasTimeControl($id,9)}}</td>
                            <td>{{hasDeliveryFeedback($id,9)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr>
                            <td>/</td>
                            <td colspan="3">Entrega proyecto</td>
                            <td>{{hasTimeControl($id,10)}}</td>
                            <td>{{hasDeliveryFeedback($id,10)}}</td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr class="active text-right">
                            <td colspan="3">Total proyecto directivo</td>
                            <td></td>
                            <td id="totalDays_4">{{$id->total_control_phase}}</td>
                            <td><input type="hidden" id="inputTotalFase_4" name="total_control_phase" value="{{$id->total_control_phase}}"></td>
                            {{-- <td></td> --}}
                        </tr>
                        <tr class="active text-right">
                            <th colspan="4">Total proyecto</th>
                            <td id="totalDayFinish">{{$id->total_days_project}}</td>
                            <td><input type="hidden" id="inputTotalDayFinish" name="total_days_project" value="{{$id->total_days_project}}"></td>
                            {{-- <td></td> --}}
                        </tr>
                    </table>
                </div>
                <hr>
                <h4>Entregables</h4>
                <ul class="list-group">
                   @foreach (entregables($id) as $item)
                       <li class="list-group-item list-group-item-action">
                           <label for="deliverable_{{$item->id}}">
                        {{$item->deliverable}}</label> <span class="label {{ (deliverablesCheck($id->deliverables,$item->id) == 'Listo') ? 'label-success' : 'label-warning' }} badge badge-primary badge-pill">{{ deliverablesCheck($id->deliverables,$item->id)}}</span></li>
                   @endforeach
                </ul>
                <hr>
                {{-- Consumables RF --}}
                <div class="row" id="section_rf" style="display: none">
                    <hr>
                    <div class="col-md-6">
                        <h4>Planeación de consumibles RF</h4>
                        @foreach ($id->consumables as $item)
                            {!! hasMaterial($id,$item,2,1) !!}
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h4>Acomedidas</h4>
                        @foreach ($id->consumables as $item)
                            {!! hasMaterial($id,$item,2,2) !!}
                        @endforeach
                    </div>
                </div>
                {{-- Consumables MW --}}
                <div class="row" id="section_mw" style="display: none">
                    <hr>
                    <div class="col-md-6">
                        <h4>Planeación de consumibles MW</h4>
                        @foreach ($id->consumables as $item)
                            {!! hasMaterial($id,$item,3,1) !!}
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h4>Acomedidas</h4>
                        @foreach ($id->consumables as $item)
                            {!! hasMaterial($id,$item,3,2) !!}
                        @endforeach
                    </div>
                </div>
                {{-- Marquillas RF --}}
                <div id="section_marke_rf" style="display: none;">
                    <hr>
                    <h4>Planeación de marquillas RF</h4>
                    <div class="form-group">
                        <div class="radio">{!!$id->whitOVP ? '<b>Con OVP</b>' : ''!!}</div>
                        <div class="radio">{!!$id->whitPower ? '<b>Con POWER</b>' : ''!!}</div>
                    </div>
                    <h5>Sector(es)</h5>
                    <div class="form-group">
                        <div class="radio">{!!$id->sector_1 ? '<b>sector 1</b>' : ''!!}</div>
                        <div class="radio">{!!$id->sector_2 ? '<b>sector 2</b>' : ''!!}</div>
                        <div class="radio">{!!$id->sector_3 ? '<b>sector 3</b>' : ''!!}</div>
                        <div class="radio">{!!$id->sector_4 ? '<b>sector 4</b>' : ''!!}</div>
                    </div>
                    <p><strong>Total de marquillas:</strong> <span id="totalMarquillasRF">{{ $id->marckup_total }}</span></p>
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
                            {!!($id->MakeupMw_1_1->state) ? '<p class="type_marke_mw" id="pTypeMarkeMw_1">Enlace de configuración estándar </p>' : ''!!}
                        
                            {!!($id->MakeupMw_1_2->state) ? '<p class="type_marke_mw" id="pTypeMarkeMw_2">Enlace de configuración XPIC </p>' : ''!!}
                        
                            {!!($id->MakeupMw_1_3->state) ? '<p class="type_marke_mw" id="pTypeMarkeMw_3">Enlace de configuración con diversidad de espacio (SD) </p>' : ''!!}
                        
                            {!!($id->MakeupMw_1_4->state) ? '<p class="type_marke_mw" id="pTypeMarkeMw_4">Enlace de configuración XPIC con diversidad de espacio (SD) </p>' : ''!!}
                        
                            {!!($id->MakeupMw_1_5->state) ? '<p class="type_marke_mw" id="pTypeMarkeMw_5">Enlace de configuración N+1 XPIC </p>' : ''!!}
                            
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
                        <div class="modal fade" id="modalEnlaceMarked_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            <label for="local_station_1">Estación base local</label><br>
                                            {{$id->MakeupMw_1_1->local_station_1}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_local_1">IP local</label><br>
                                                    {{$id->MakeupMw_1_1->ip_local_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_local_1">ID local</label><br>
                                                    {{$id->MakeupMw_1_1->id_local_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="remote_frequency_1">Frecuencia TX local</label><br>
                                                    {{$id->MakeupMw_1_1->local_frequency_1}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="remote_station_1">Estación base remota</label><br>
                                            {{$id->MakeupMw_1_1->remote_station_1}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_local_1">IP remota</label><br>
                                                    {{$id->MakeupMw_1_1->ip_remote_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_local_1">ID remota</label><br>
                                                    {{$id->MakeupMw_1_1->id_remote_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="remote_frequency">Frecuencia TX remota</label><br>
                                                    {{$id->MakeupMw_1_1->remote_frequency_1}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_1">Marca del equipo</label><br>
                                                    {{$id->MakeupMw_1_1->equipment_brand_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_1">Modelo del equipo</label><br>
                                                    {{$id->MakeupMw_1_1->equipment_model_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_1">Fecha de instalación</label><br>
                                                    {{$id->MakeupMw_1_1->instalation_date_1}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_1_1">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_height_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_1_1">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_diameter_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="polarity">Polaridad</label><br>
                                                    {{$id->MakeupMw_1_1->polarity_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_1_1">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_model_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_1_1">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_brand_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_1_1">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_serial_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_1_1">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_1->azimuth_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_1_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_1->level_tx_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_1_1">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_1->level_rx_1_1}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_1_2">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_height_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_1_2">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_diameter_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="polarity">Polaridad</label><br>
                                                    {{$id->MakeupMw_1_1->polarity_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_1_2">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_model_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_1_2">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_brand_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_1_2">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_1->antenna_serial_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_1_2">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_1->azimuth_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_1_2">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_1->level_tx_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_1_2">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_1->level_rx_1_2}}
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
                        <div class="modal fade" id="modalEnlaceMarked_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">
                                            Enlace de configuración XPIC <br>
                                            <small>Aplica para instalaciones con configuración XPIC. Dimensiones 9,5 cm x 11,4 cm</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="station_local_2">Estación base local</label><br>
                                            {{$id->MakeupMw_1_2->station_local_2}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_local_2">IP local</label><br>
                                                    {{$id->MakeupMw_1_2->ip_local_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_local_2">ID local</label><br>
                                                    {{$id->MakeupMw_1_2->id_local_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="local_frecuency_2">Frecuencia TX local</label><br>
                                                    {{$id->MakeupMw_1_2->local_frecuency_2}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="station_remote_2">Estación base remota</label><br>
                                            {{$id->MakeupMw_1_2->station_remote_2}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_remote_2">IP remota</label><br>
                                                    {{$id->MakeupMw_1_2->ip_remote_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="ip_remote_2">ID remota</label><br>
                                                    {{$id->MakeupMw_1_2->id_remote_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="remote_frecuency_2">Frecuencia TX remota</label><br>
                                                    {{$id->MakeupMw_1_2->remote_frecuency_2}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_2">Marca de equipo</label><br>
                                                    {{$id->MakeupMw_1_2->equipment_brand_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_2">Modelo de equipo</label><br>
                                                    {{$id->MakeupMw_1_2->equipment_model_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_2">Fecha de instalación</label><br>
                                                    {{$id->MakeupMw_1_2->instalation_date_2}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_2_1">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_height_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_2_1">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_diameter_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_2_1">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_model_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_2_1">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_brand_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_2_1">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_serial_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_2_1">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_2->azimuth_2_1}}
                                                </div>
                                            </div>
                                            <h5>Polaridad vertical</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_2_1_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_2->level_tx_2_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_2_1_1">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_2->level_rx_2_1_1}}
                                                </div>
                                            </div>
                                            <h5>Polaridad horizontal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_2_1_2">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_2->level_tx_2_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_2_1_2">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_2->level_rx_2_1_2}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_2_2">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_height_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_2_2">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_diameter_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_2_2">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_model_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_2_2">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_brand_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_2_2">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_2->antenna_serial_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_2_2">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_2->azimuth_2_2}}
                                                </div>
                                            </div>
                                            <h5>Polaridad vertical</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_2_2_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_2->level_tx_2_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_2_2_1">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_2->level_rx_2_2_1}}
                                                </div>
                                            </div>
                                            <h5>Polaridad horizontal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_2_2_2">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_2->level_tx_2_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_2_2_2">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_2->level_rx_2_2_2}}
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
                                            Enlace de configuración con diversidad de espacio (SD) <br>
                                            <small>Aplica para instalaciones con configuración con diversidad de espacio (SD).</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="station_local_3">Estación base local</label><br>
                                            {{$id->MakeupMw_1_3->station_local_3}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_local_1">IP local</label><br>
                                                    {{$id->MakeupMw_1_3->ip_local_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_local_3">ID local</label><br>
                                                    {{$id->MakeupMw_1_3->id_local_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="local_frecuency_3">Frecuencia TX local</label><br>
                                                    {{$id->MakeupMw_1_3->local_frecuency_3}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="station_remote_3">Estación base remota</label><br>
                                            {{$id->MakeupMw_1_3->station_remote_3}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_remote_3">IP remota</label><br>
                                                    {{$id->MakeupMw_1_3->ip_remote_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="ip_remote_3">ID remota</label><br>
                                                    {{$id->MakeupMw_1_3->id_remote_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="remote_frecuency_3">Frecuencia TX remota</label><br>
                                                    {{$id->MakeupMw_1_3->remote_frecuency_3}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_3">Marca de equipo</label><br>
                                                    {{$id->MakeupMw_1_3->equipment_brand_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_3">Modelo de equipo</label><br>
                                                    {{$id->MakeupMw_1_3->equipment_model_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_3">Fecha de instalación</label><br>
                                                    {{$id->MakeupMw_1_3->instalation_date_3}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="polarity_3_1">Polaridad</label><br>
                                                    {{$id->MakeupMw_1_3->polarity_3_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_3_1">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_3->azimuth_3_1}}
                                                </div>
                                            </div>
                                            <h5>Antena principal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_3_1_1">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_height_3_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_3_1_1">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_diameter_3_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_3_1_1">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_model_3_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_3_1_1">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_brand_3_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_3_1_1">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_serial_3_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_3_1_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_3->level_tx_3_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_3_1_1">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_3->level_rx_3_1_1}}
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Antena diversidad</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="antenna_height_3_1_2">Altura antena</label><br>
                                                {{$id->MakeupMw_1_3->antenna_height_3_1_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_diameter_3_1_2">Diámetro Antena</label><br>
                                                {{$id->MakeupMw_1_3->antenna_diameter_3_1_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_model_3_1_2">Modelo de antena</label><br>
                                                {{$id->MakeupMw_1_3->antenna_model_3_1_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_brand_3_1_2">Marca de antena</label><br>
                                                {{$id->MakeupMw_1_3->antenna_brand_3_1_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="antenna_serial_3_1_2">Serial de la antena</label><br>
                                                {{$id->MakeupMw_1_3->antenna_serial_3_1_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="level_tx_3_1_2">Nivel Tx</label><br>
                                                {{$id->MakeupMw_1_3->level_tx_3_1_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="level_rx_3_1_2">Nivel Rx</label><br>
                                                {{$id->MakeupMw_1_3->level_rx_3_1_2}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="polarity_3_2">Polaridad</label><br>
                                                    {{$id->MakeupMw_1_3->polarity_3_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_3_2">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_3->azimuth_3_2}}
                                                </div>
                                            </div>
                                            <h5>Antena principal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_3_2_1">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_height_3_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_3_2_1">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_diameter_3_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_3_2_1">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_model_3_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_3_2_1">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_brand_3_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_3_2_1">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_serial_3_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_3_2_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_3->level_tx_3_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_3_2_1">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_3->level_rx_3_2_1}}
                                                </div>
                                            </div>
                                            <h5>Antena diversidad</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_3_2_2">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_height_3_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_3_2_2">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_diameter_3_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_3_2_2">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_model_3_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_3_2_2">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_brand_3_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_3_2_2">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_3->antenna_serial_3_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_tx_3_2_2">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_3->level_tx_3_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_3_2_2">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_3->level_rx_3_2_2}}
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
                                        <h4 class="modal-title" id="exampleModalLongTitle">Enlace de configuración XPIC con diversidad de espacio (SD) <br>
                                            <small>Aplica para instalaciones con configuración con XPIC con diversidad de espacio (SD)</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="station_local_4">Estación base local</label><br>
                                            {{$id->MakeupMw_1_4->station_local_4}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_local_4">IP local</label><br>
                                                    {{$id->MakeupMw_1_4->ip_local_4}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_local_4">ID local</label><br>
                                                    {{$id->MakeupMw_1_4->id_local_4}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="local_frecuency_4">Frecuencia TX local</label><br>
                                                    {{$id->MakeupMw_1_4->local_frecuency_4}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="station_remote_4">Estación base remota</label><br>
                                            {{$id->MakeupMw_1_4->station_remote_4}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ip_remote_4">IP remota</label><br>
                                                    {{$id->MakeupMw_1_4->ip_remote_4}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="ip_remote_4">ID remota</label><br>
                                                    {{$id->MakeupMw_1_4->id_remote_4}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="remote_frecuency_4">Frecuencia TX remota</label><br>
                                                    {{$id->MakeupMw_1_4->remote_frecuency_4}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_4">Marca de equipo</label><br>
                                                    {{$id->MakeupMw_1_4->equipment_brand_4}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_4">Modelo de equipo</label><br>
                                                    {{$id->MakeupMw_1_4->equipment_model_4}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_4">Fecha de instalación</label><br>
                                                    {{$id->MakeupMw_1_4->instalation_date_4}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="azimuth_4_1">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_4->azimuth_4_1}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <h5>Antena principal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_4_1">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_height_4_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_4_1">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_diameter_4_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_4_1">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_model_4_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_4_1">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_brand_4_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_4_1">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_serial_4_1}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Polaridad vertical</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_4_1_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_4->level_tx_4_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_4">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_4->level_rx_4_1_1}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Polaridad horizontal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_4_1_2">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_4->level_tx_4_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_4_1_2">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_4->level_rx_4_1_2}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <h5>Antena Diversidad</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_4_1_2">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_height_4_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_4_1_2">Diámetro antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_diameter_4_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_4_1_2">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_model_4_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_4_1_2">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_brand_4_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_4_1_2">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_serial_4_1_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Polaridad vertical</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_4_1_2_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_4->level_tx_4_1_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_4_1_2_1">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_4->level_rx_4_1_2_1}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Polaridad horizontal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_4_1_2_2">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_4->level_tx_4_1_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_4_1_2_2">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_4->level_rx_4_1_2_2}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <label for="azimuth_4_2">Azimuth</label><br>
                                            {{$id->MakeupMw_1_4->azimuth_4_2}}
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <h5>Antena principal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_4_2">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_height_4_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_4_2">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_diameter_4_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_4_2">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_model_4_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_4_2">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_brand_4_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_4_2">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_serial_4_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Polaridad vertical</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_4_2_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_4->level_tx_4_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_4_2_1">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_4->level_rx_4_2_1}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Polaridad horizontal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_4_2_2">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_4->level_tx_4_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_4_2_2">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_4->level_rx_4_2_2}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <h5>Antena Diversidad</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_height_4_2_2">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_height_4_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_4_2_2">Diámetro antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_diameter_4_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_4_2_2">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_model_4_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_4_2_2">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_brand_4_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_4_2_2">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_4->antenna_serial_4_2_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Polaridad vertical</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_4_2_2_1">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_4->level_tx_4_2_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_4_2_2_1">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_4->level_rx_4_2_2_1}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Polaridad horizontal</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_tx_4_2_2_2">Nivel Tx</label><br>
                                                    {{$id->MakeupMw_1_4->level_tx_4_2_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_4_2_2_2">Nivel Rx</label><br>
                                                    {{$id->MakeupMw_1_4->level_rx_4_2_2_2}}
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
                        <div class="modal fade" id="modalEnlaceMarked_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Enlace de configuración N+1 XPIC <br>
                                            <small>Aplica para instalaciones con configuración N+1 XPIC</small>
                                        </h4>
                                    </div>
                                    <div class="modal-body table-responsive">
                                        <div class="form-group">
                                            <label for="station_local_5">Estación base local</label><br>
                                            {{$id->MakeupMw_1_5->station_local_5}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ip_local_5">IP local</label><br>
                                                    {{$id->MakeupMw_1_5->ip_local_5}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="id_local_5">ID local</label><br>
                                                    {{$id->MakeupMw_1_5->id_local_5}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="station_remota_5">Estación base remota</label><br>
                                            {{$id->MakeupMw_1_5->station_remota_5}}
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ip_remote_5">IP remota</label><br>
                                                    {{$id->MakeupMw_1_5->ip_remote_5}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="id_remote_5">ID remota</label><br>
                                                    {{$id->MakeupMw_1_5->id_remote_5}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="equipment_brand_5">Marca de equipo</label><br>
                                                    {{$id->MakeupMw_1_5->equipment_brand_5}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="equipment_model_5">Modelo de equipo</label><br>
                                                    {{$id->MakeupMw_1_5->equipment_model_5}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="instalation_date_5">Fecha de instalación</label><br>
                                                    {{$id->MakeupMw_1_5->instalation_date_5}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena local</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_heigth_5_1">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_heigth_5_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_5_1">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_diameter_5_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_5_1">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_model_5_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_5_1">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_brand_5_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_5_1">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_serial_5_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_5_1">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_5->azimuth_5_1}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_1_1">Frecuencia Tx 1</label><br>
                                                    {{$id->MakeupMw_1_5->frecuency_5_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_1_2">Frecuencia Tx 2</label><br>
                                                    {{$id->MakeupMw_1_5->frecuency_5_1_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_5_1_1">Nivel Tx 1</label><br>
                                                    {{$id->MakeupMw_1_5->level_5_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_1_2">Nivel Tx 2</label><br>
                                                    {{$id->MakeupMw_1_5->level_5_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_1_3">Nivel Tx 3</label><br>
                                                    {{$id->MakeupMw_1_5->level_5_1_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_1_4">Nivel Tx Stand By</label><br>
                                                    {{$id->MakeupMw_1_5->level_5_1_4}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_1_1">Frecuencia Rx 1</label><br>
                                                    {{$id->MakeupMw_1_5->frecuency_rx_5_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="frecuency_rx_5_1_2">Frecuencia Rx 2</label><br>
                                                    {{$id->MakeupMw_1_5->frecuency_rx_5_1_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_1_1">Nivel Rx 1</label><br>
                                                    {{$id->MakeupMw_1_5->level_rx_5_1_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_1_2">Nivel Rx 2</label><br>
                                                    {{$id->MakeupMw_1_5->level_rx_5_1_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_1_3">Nivel Rx 3</label><br>
                                                    {{$id->MakeupMw_1_5->level_rx_5_1_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_1_4">Nivel Rx Stand By</label><br>
                                                    {{$id->MakeupMw_1_5->level_rx_5_1_4}}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Configuración antena remota</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="antenna_heigth_5_2">Altura antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_heigth_5_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_diameter_5_2">Diámetro Antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_diameter_5_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_model_5_2">Modelo de antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_model_5_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_brand_5_2">Marca de antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_brand_5_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="antenna_serial_5_2">Serial de la antena</label><br>
                                                    {{$id->MakeupMw_1_5->antenna_serial_5_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="azimuth_5_2">Azimuth</label><br>
                                                    {{$id->MakeupMw_1_5->azimuth_5_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_2_1">Frecuencia Tx 1</label><br>
                                                    {{$id->MakeupMw_1_5->frecuency_5_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_2_2">Frecuencia Tx 2</label><br>
                                                    {{$id->MakeupMw_1_5->frecuency_5_2_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_5_2_1">Nivel Tx 1</label><br>
                                                    {{$id->MakeupMw_1_5->level_5_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_2_2">Nivel Tx 2</label><br>
                                                    {{$id->MakeupMw_1_5->level_5_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_2_3">Nivel Tx 3</label><br>
                                                    {{$id->MakeupMw_1_5->level_5_2_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_5_2_4">Nivel Tx Stand By</label><br>
                                                    {{$id->MakeupMw_1_5->level_5_2_4}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="frecuency_5_2_1">Frecuencia Rx 1</label><br>
                                                    {{$id->MakeupMw_1_5->frecuency_rx_5_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="frecuency_rx_5_2_2">Frecuencia Rx 2</label><br>
                                                    {{$id->MakeupMw_1_5->frecuency_rx_5_2_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_2_1">Nivel Rx 1</label><br>
                                                    {{$id->MakeupMw_1_5->level_rx_5_2_1}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_2_2">Nivel Rx 2</label><br>
                                                    {{$id->MakeupMw_1_5->level_rx_5_2_2}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_2_3">Nivel Rx 3</label><br>
                                                    {{$id->MakeupMw_1_5->level_rx_5_2_3}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="level_rx_5_2_4">Nivel Rx Stand By</label><br>
                                                    {{$id->MakeupMw_1_5->level_rx_5_2_4}}
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
                                                    <label for="station_local_10">Estación base local</label><br>
                                                    {{$id->MakeupMw_2_1->station_local_10}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="station_remote_10">Estación base remota</label><br>
                                                    {{$id->MakeupMw_2_1->station_remote_10}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="equipment_brand_10">Marca</label><br>
                                                {{$id->MakeupMw_2_1->equipment_brand_10}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="equipment_model_10">Modelo</label><br>
                                                {{$id->MakeupMw_2_1->equipment_model_10}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Gestión</h4>
                                        <p>Equipo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="card_10_1">Targeta</label><br>
                                                {{$id->MakeupMw_2_1->card_10_1}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_10_1">Slot</label><br>
                                                {{$id->MakeupMw_2_1->slot_10_1}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_10_1">Puerto o DDF#</label><br>
                                                {{$id->MakeupMw_2_1->ddf_10_1}}
                                            </div>
                                        </div>
                                        <p>Equipo de donde se toma la gestión</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="destination_equipment_10">Equipo destino [Nemónico E.B-ID local]</label><br>
                                                {{$id->MakeupMw_2_1->destination_equipment_10}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remote_management_10">E.B. Remota de gestión</label><br>
                                                {{$id->MakeupMw_2_1->remote_management_10}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="card_10_2">Targeta</label><br>
                                                {{$id->MakeupMw_2_1->card_10_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_10_2">Slot</label><br>
                                                {{$id->MakeupMw_2_1->slot_10_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_10_2">Puerto o DDF#</label><br>
                                                {{$id->MakeupMw_2_1->ddf_10_2}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Energía</h4>
                                        <p>Equipo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_10_1">Posición Main (-48)</label><br>
                                                {{$id->MakeupMw_2_1->main_position_10}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pdb_10_1">PDB</label><br>
                                                {{$id->MakeupMw_2_1->pdb_10_1}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_10_2">Posición Main (+0)</label><br>
                                                {{$id->MakeupMw_2_1->main_position_10_2}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="stand_by_10_2">Posición Stand By (-48)</label><br>
                                                {{$id->MakeupMw_2_1->stand_by_10_1}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pdb_10_2">PDB</label><br>
                                                {{$id->MakeupMw_2_1->pdb_10_2}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="stand_by_10_2">Posición Stand By (+0)</label><br>
                                                {{$id->MakeupMw_2_1->stand_by_10_2}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Hilo de drenaje</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_10_3">Posición Main (+0)</label><br>
                                                {{$id->MakeupMw_2_1->main_position_10_3}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="stand_by_10_3">Posición Stand By (-48)</label><br>
                                                {{$id->MakeupMw_2_1->stand_by_10_3}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Marquillas E1 / Fibra / ETH</h4>
                                        <p>Estilo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="card_10_3">Targeta</label><br>
                                                {{$id->MakeupMw_2_1->card_10_3}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_10_3">Slot</label><br>
                                                {{$id->MakeupMw_2_1->slot_10_3}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_10_3">Puerto o DDF#</label><br>
                                                {{$id->MakeupMw_2_1->ddf_10_3}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="e1_10_3">E1 #</label><br>
                                                {{$id->MakeupMw_2_1->e1_10_3}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txrx_10_3">TxRx</label><br>
                                                {{$id->MakeupMw_2_1->txrx_10_3}}
                                            </div>
                                        </div>
                                        <p>Equipo a donde se conecta</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="destination_equipment_10_4">Equipo destino [Nemónico E.B-ID local]</label><br>
                                                {{$id->MakeupMw_2_1->destination_equipment_10_4}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remote_connection_10_4">E.B. Remota de conexión</label><br>
                                                {{$id->MakeupMw_2_1->remote_connection_10_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="card_10_4">Targeta</label><br>
                                                {{$id->MakeupMw_2_1->card_10_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_10_4">Slot</label><br>
                                                {{$id->MakeupMw_2_1->slot_10_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_10_4">Puerto o DDF#</label><br>
                                                {{$id->MakeupMw_2_1->ddf_10_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="e1_10_4">E1 #</label><br>
                                                {{$id->MakeupMw_2_1->e1_10_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txrx_10_4">TxRx</label><br>
                                                {{$id->MakeupMw_2_1->txrx_10_4}}
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
                                                    <label for="station_local_11">Estación base local</label><br>
                                                    {{$id->MakeupMw_2_2->station_local_11}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="station_remote_11">Estación base remota</label><br>
                                                    {{$id->MakeupMw_2_2->station_remote_11}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="equipment_brand_11">Marca</label><br>
                                                {{$id->MakeupMw_2_2->equipment_brand_11}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="equipment_model_11">Modelo</label><br>
                                                {{$id->MakeupMw_2_2->equipment_model_11}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Gestión</h4>
                                        <p>Equipo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="card_11_1">Targeta</label><br>
                                                {{$id->MakeupMw_2_2->card_11_1}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_11_1">Slot</label><br>
                                                {{$id->MakeupMw_2_2->slot_11_1}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_11_1">Puerto o DDF#</label><br>
                                                {{$id->MakeupMw_2_2->ddf_11_1}}
                                            </div>
                                        </div>
                                        <p>Equipo de donde se toma la gestión</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="destination_equipment_11">Equipo destino [Nemónico E.B-ID local]</label><br>
                                                {{$id->MakeupMw_2_2->destination_equipment_11}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remote_management_11">E.B. Remota de gestión</label><br>
                                                {{$id->MakeupMw_2_2->remote_management_11}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="card_11_2">Targeta</label><br>
                                                {{$id->MakeupMw_2_2->card_11_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_11_2">Slot</label><br>
                                                {{$id->MakeupMw_2_2->slot_11_2}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_11_2">Puerto o DDF#</label><br>
                                                {{$id->MakeupMw_2_2->ddf_11_2}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Energía</h4>
                                        <p>Equipo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_11_1">Posición Main (-48)</label><br>
                                                {{$id->MakeupMw_2_2->main_position_11}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pdb_11_1">PDB</label><br>
                                                {{$id->MakeupMw_2_2->pdb_11_1}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_11_2">Posición Main (+0)</label><br>
                                                {{$id->MakeupMw_2_2->main_position_11_2}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="stand_by_11_2">Posición Stand By (-48)</label><br>
                                                {{$id->MakeupMw_2_2->stand_by_11_1}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pdb_11_2">PDB</label><br>
                                                {{$id->MakeupMw_2_2->pdb_11_2}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="stand_by_11_2">Posición Stand By (+0)</label><br>
                                                {{$id->MakeupMw_2_2->stand_by_11_2}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Hilo de drenaje</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="main_position_11_3">Posición Main (+0)</label><br>
                                                {{$id->MakeupMw_2_2->main_position_11_3}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="stand_by_11_3">Posición Stand By (-48)</label><br>
                                                {{$id->MakeupMw_2_2->stand_by_11_3}}
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Marquillas E1 / Fibra / ETH</h4>
                                        <p>Estilo a instalar</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="card_11_3">Targeta</label><br>
                                                {{$id->MakeupMw_2_2->card_11_3}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_11_3">Slot</label><br>
                                                {{$id->MakeupMw_2_2->slot_11_3}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_11_3">Puerto o DDF#</label><br>
                                                {{$id->MakeupMw_2_2->ddf_11_3}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="e1_11_3">E1 #</label><br>
                                                {{$id->MakeupMw_2_2->e1_11_3}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txrx_11_3">TxRx</label><br>
                                                {{$id->MakeupMw_2_2->txrx_11_3}}
                                            </div>
                                        </div>
                                        <p>Equipo a donde se conecta</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="destination_equipment_11_4">Equipo destino [Nemónico E.B-ID local]</label><br>
                                                {{$id->MakeupMw_2_2->destination_equipment_11_4}}
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remote_connection_11_4">E.B. Remota de conexión</label><br>
                                                {{$id->MakeupMw_2_2->remote_connection_11_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="card_11_4">Targeta</label><br>
                                                {{$id->MakeupMw_2_2->card_11_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="slot_11_4">Slot</label><br>
                                                {{$id->MakeupMw_2_2->slot_11_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="ddf_11_4">Puerto o DDF#</label><br>
                                                {{$id->MakeupMw_2_2->ddf_11_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="e1_11_4">E1 #</label><br>
                                                {{$id->MakeupMw_2_2->e1_11_4}}
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txrx_11_4">TxRx</label><br>
                                                {{$id->MakeupMw_2_2->txrx_11_4}}
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
                                                    <label for="radio_model_20">Modelo de radio</label><br>
                                                    {{$id->MakeupMw_3->radio_model_20}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="band_20">Banda</label><br>
                                                    {{$id->MakeupMw_3->band_20}}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="polarity_20">Polaridad</label><br>
                                                    {{$id->MakeupMw_3->polarity_20}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="station_20_1">Estación A</label><br>
                                                    {{$id->MakeupMw_3->station_20_1}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="azimuth_20_1">Azimuth A</label><br>
                                                    {{$id->MakeupMw_3->azimuth_20_1}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="station_20_2">Estación B</label><br>
                                                    {{$id->MakeupMw_3->station_20_2}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="azimuth_20_2">Azimuth B</label><br>
                                                    {{$id->MakeupMw_3->azimuth_20_2}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>Cantidad de marquillas Estación base 1</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="amount_20_1_1">IF MAIN</label><br>
                                                    {{$id->MakeupMw_3->amount_20_1_1}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_1_2">IF STAND BY</label><br>
                                                    {{$id->MakeupMw_3->amount_20_1_2}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_1_3">ODU MAIN - GND</label><br>
                                                    {{$id->MakeupMw_3->amount_20_1_3}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_1_4">ODU STAND BY - GND</label><br>
                                                    {{$id->MakeupMw_3->amount_20_1_4}}
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>Cantidad de marquillas Estación base 2</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="amount_20_2_1">IF MAIN</label><br>
                                                    {{$id->MakeupMw_3->amount_20_2_1}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_2_2">IF STAND BY</label><br>
                                                    {{$id->MakeupMw_3->amount_20_2_2}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_2_3">ODU MAIN - GND</label><br>
                                                    {{$id->MakeupMw_3->amount_20_2_3}}
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="amount_20_2_4">ODU STAND BY - GND</label><br>
                                                    {{$id->MakeupMw_3->amount_20_2_4}}
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
                @if ($id->state == 'Sin aprobar')
                    <a class="btn btn-sm btn-primary" href="{{ route('approve_project',$id->id) }}"
                        onclick="event.preventDefault();
                                        document.getElementById('approve_project').submit();">
                        Aprobar y firmar
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{ route('not_approve_project',$id->id) }}"
                            onclick="event.preventDefault();
                                        document.getElementById('not_approve_project').submit();">
                        No aprobar
                    </a>
                    <form id="not_approve_project" action="{{ route('not_approve_project',$id->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                    <form id="approve_project" action="{{ route('approve_project',$id->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                @endif
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalOrdenBodega">Ver orden de bodega</button>
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalPermissions">Ver permisos de trabajo</button>
                <button type="button" class="btn btn-sm btn-primary hide" data-toggle="modal" data-target="#modalCommissions">Ver comisiones</button>
                @if ($id->state == 'Aprobado')
                    @if($id->rf == 1)
                        @can('Descargar marquillas')
                            <a href="{{route('project_download_rf',$id->id)}}" id="download_rf" class="btn btn-sm btn-warning">Descargar marquillas RF</a>
                        @endcan
                    @endif
                    @if($id->mw == 2)
                        @can('Descargar marquillas')
                            <button type="button" id="download_mw" class="btn btn-sm btn-danger">Descargar marquillas MW</button>
                        @endcan
                    @endif
                    @can('Descargar orden de bodega')
                        <a href="{{ route('project_download_order') }}" class="btn btn-sm bg-purple">Descargar orden de bodega</a>
                    @endcan
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
                                            <td id="consumables_cost">$ 0.00</td>
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
                <div class="modal fade" id="modalPermissions" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLongTitle">Permisos de trabajo</h4>
                            </div>
                            <div class="modal-body table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Responsable</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($id->permissions as $permission)
                                            <tr>
                                                <td>{{$permission->id}}</td>
                                                <td>{{$permission->responsableAcargo->name}}</td>
                                                <td>{{$permission->created_at}}</td>
                                                <td>{{$permission->estado}}</td>
                                                <td><a href="{{route('work_permit',$permission->id)}}" class="btn btn-sm btn-success">Ver</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalCommissions" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLongTitle">Permisos de trabajo</h4>
                            </div>
                            <div class="modal-body table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Funcionario</th>
                                            <th>Valor</th>
                                            <th>Arango de días</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commissions as $commission)
                                            <tr>
                                                <td>{{$commission['name']}}</td>
                                                <td>{{$commission['value']}}</td>
                                                <td>{{'De '.$commission['of'].' a '.$commission['to']}}</td>
                                                <td>{{$commission['type']}}</td>
                                                <td>{{$commission['state']}}</td>
                                            </tr>
                                        @endforeach
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
    </div>
</section>
@endsection

@section('css')
    <style>
        
    </style>
@endsection

@section('js')
    <script src="{{ asset('js/project/show.js') }}" defer></script>
    <script>
        $(document).ready(function () {
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
    </script>
@endsection