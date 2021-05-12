@extends('lte.layouts')

<?php
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
?>

@section('content')
<section class="content-header">
    <h1>
        Crear nuevo proyecto <small>Gestión de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Proyectos</a></li>
        <li class="active">Crear proyectos</li>
    </ol>
</section>
<section class="content">
    {{--  Inputs hiden  --}}
    <div class="hide">
        {{--  projects info  --}}
        <select name="project[]" id="projects" class="form-control">
            <option selected disabled></option>
            @foreach ($projects as $project)
                <option class="projectOption_{{$project->id}}" value="{{$project->id}}">{{$project->id}}. {{$project->description}}</option>
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
            <div class="box-title">Crear proyecto</div>
            <div class="box-tools">
                <a href="{{route('project')}}" class="btn btn-sm btn-success">Volver</a>
            </div>
        </div>
        <form action="{{route('project_store')}}" method="POST" autocomplete="off">
            @csrf
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
                                    <option {{(old('name') == $project->id) ? 'selected' : ''}} class="projectOption_{{$project->id}}" value="{{$project->id}}">{{$project->id}}. {{$project->description}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="project_name">Nombre del proyecto</label>
                            <input type="text" name="project_name" value="{{old('project_name')}}" id="project_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="start_date">Inicio de actividades:</label>
                            <input type="date" name="start_date" value="{{old('start_date')}}" class="form-control pull-right" id="start_date">
                        </div>
                        <div class="col-sm-3">
                            <label for="start_date"></label>
                            <input type="time" name="start_time" value="{{old('start_time')}}" class="form-control pull-right" id="start_time">
                        </div>
                        <!-- /.input group -->
                        <div class="col-md-6">
                            <label for="comentary">Comentarios</label>
                            <textarea name="comentary" id="comentary" cols="30" rows="3" class="form-control">{{old('comentary')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tipo de proyecto:</label><br>
                            <label for="checkbox_type_rf"><input name="rf" type="checkbox" {{ (old('rf') == 1) ? 'checked' : '' }} value="1" class="checkMarckeType" id="checkbox_type_rf"> RF</label>
                            <br>
                            <label for="checkbox_type_mw"><input name="mw" type="checkbox" {{ (old('mw') == 1) ? 'checked' : '' }} value="2" class="checkMarckeType" id="checkbox_type_mw"> MW</label>
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
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="3">Total fase instalación</td>
                            <td id="tdTotalFase_1">0</td>
                            <td><input type="hidden" id="inputTotalFase_1" value="0" name="total_installation_phase"></td>
                            <td></td>
                        </tr>
                        <tr class="active">
                            <td colspan="6" class="text-center">
                                <strong>Fase de recolección de entregables</strong>
                                <button id="btnLap_2" class="btn btn-xs btn-link btn-new-item"><i class="fa fa-plus"></i> Agregar otro item</button>
                            </td>
                        </tr>
                        <tbody id="bonusTableBody_2">
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="3">Total fase entregables</td>
                            <td id="tdTotalFase_2">0</td>
                            <td><input type="hidden" id="inputTotalFase_2" value="0" name="total_deliverables_phase"></td>
                            <td></td>
                        </tr>
                        <tr class="active">
                            <td colspan="6" class="text-center">
                                <strong>Fase de recolección pruebas y On Air</strong>
                                <button id="btnLap_3" class="btn btn-xs btn-link btn-new-item"><i class="fa fa-plus"></i> Agregar otro item</button>
                            </td>
                        </tr>
                        <tbody id="bonusTableBody_3">
                        </tbody>
                        <tr class="active text-right">
                            <td colspan="3">Total fase On Air</td>
                            <td id="tdTotalFase_3">0</td>
                            <td><input type="hidden" id="inputTotalFase_3" value="0" name="total_on_air_phase"></td>
                            <td></td>
                        </tr>
                        <tr class="active text-right">
                            <td colspan="3">Total proyecto en campo</td>
                            <td id="totalDays">0</td>
                            <td><input type="hidden" id="inputTotalDays" value="0" name="total_field_phases"></td>
                            <td></td>
                        </tr>
                        <tr class="active">
                            <td colspan="6" class="text-center"><strong>Fase de recolección de entregables y seguimiento</strong></td>
                        </tr>
                        <tr>
                            <th>Ítem</th>
                            <th>Descripción</th>
                            <th>Cantidad horas</th>
                            <th colspan="2">Comentarios</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Recepción de OT</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.0')}}" id="number_hours_0"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.0')}}" id="delivery_feedback_0"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Planeación OT (Presente archivo)</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.1')}}" id="number_hours_1"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.1')}}" id="delivery_feedback_1"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Soporte a persona en campo</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.2')}}" id="number_hours_2"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.2')}}" id="delivery_feedback_2"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Verificación de entregables</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.3')}}" id="number_hours_3"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.3')}}" id="delivery_feedback_3"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Elaboración de entregable 850</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.4')}}" id="number_hours_4"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.4')}}" id="delivery_feedback_4"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Elaboración de entregable 1900</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.5')}}" id="number_hours_5"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.5')}}" id="delivery_feedback_5"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Elaboración de entregable LTE</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.6')}}" id="number_hours_6"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.6')}}" id="delivery_feedback_6"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Elaboración de entregable GSM</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.7')}}" id="number_hours_7"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.7')}}" id="delivery_feedback_7"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Elaboración de entregable MW</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.8')}}" id="number_hours_8"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.8')}}" id="delivery_feedback_8"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Auditoria en campo</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.9')}}" id="number_hours_9"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.9')}}" id="delivery_feedback_9"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>/</td>
                            <td>Entrega proyecto</td>
                            <td><input type="number" class="form-control numberHours" value="0" name="number_hours[]" value="{{old('number_hours.10')}}" id="number_hours_10"></td>
                            <td colspan="2"><input type="text" class="form-control" name="delivery_feedback[]" value="{{old('delivery_feedback.10')}}" id="delivery_feedback_10"></td>
                            <td></td>
                        </tr>
                        <tr class="active text-right">
                            <td colspan="2">Total proyecto directivo</td>
                            <td></td>
                            <td id="totalDays_4">0</td>
                            <td><input type="hidden" id="inputTotalFase_4" value="0" name="total_control_phase"></td>
                            <td></td>
                        </tr>
                        <tr class="active text-right">
                            <th colspan="3">Total proyecto</th>
                            <td id="totalDayFinish">0</td>
                            <td><input type="hidden" id="inputTotalDayFinish" value="0" name="total_days_project"></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                {{-- Consumables RF --}}
                <div class="row" id="section_rf" style="display: none">
                    <hr>
                    <div class="col-md-6">
                        <h4>Planeación de consumibles RF</h4>
                        @foreach ($materials as $material_rf)
                            @if ($material_rf->project_type == 2 && $material_rf->place == 1)
                                <div class="form-group">
                                    <label for="material_{{$material_rf->id}}">{{$material_rf->id}}. {{$material_rf->description}}</label>
                                    <input type="number" name="material_rf[]" id="material_{{$material_rf->id}}" value="0" class="form-control material">
                                    @if($material_rf->hasLength)
                                        <br>
                                        <label for="length_{{$material_rf->id}}">Longitud línea metros DC</label>
                                        <input type="number" class="material form-control" value="0" placeholder="Longitud línea metros DC" name="length[{{ $material_rf->id }}]" id="length_{{$material_rf->id}}">
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
                                    <input type="number" name="measured_rf[]" id="acomedida_{{$acomedida_rf->id}}" value="0" class="form-control material">
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
                                    <input type="number" name="material_mw[]" id="material_{{$material_mw->id}}" value="0" class="form-control material">
                                    @if($material_mw->hasLength)
                                        <br>
                                        <label for="length_{{$material_mw->id}}">Longitud línea metros RG</label>
                                        <input type="number" class="material form-control" value="0" placeholder="Longitud línea metros RG" name="length[{{ $material_mw->id }}]" id="length_{{$material_mw->id}}">
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
                                    <input type="number" name="measured_mw[]" id="acomedida_{{$acomedida_mw->id}}"
                                        value="0" class="form-control acomedida">
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
                            <label><input type="checkbox" class="checkboxQuestion" name="questions[]" value="1">¿Con OVP?</label>
                        </div>
                        <div class="radio">
                            <label><input type="checkbox" class="checkboxQuestion" name="questions[]" value="2">¿Con POWER?</label>
                        </div>
                    </div>
                    <h5>Número de sector?</h5>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="checkbox" class="checkboxQuestion" name="sector[]" value="1">
                                Sector 1
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="checkbox" class="checkboxQuestion" name="sector[]" value="2">
                                Sector 2
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="checkbox" class="checkboxQuestion" name="sector[]" value="3">
                                Sector 3
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="checkbox" class="checkboxQuestion" name="sector[]" value="4">
                                Sector 4
                            </label>
                        </div>
                    </div>
                    <p><strong>Total de marquillas:</strong> <span id="totalMarquillasRF">0</span><input type="hidden" name="marckup_total" id="marckup_total" value="0"></p>
                </div>
                {{-- Marquillas MW --}}
                <div id="section_marke_mw" style="display: none">
                    <hr>
                    <h3>Planeación de marquillas MW</h3>
                    <section id="sectionMarkedIduMw">
                        @include('projects.includes.tags.iduMw')
                    </section>
                    <hr>
                    <section id="sectionMarkedIDUeB_1">
                        @include('projects.includes.tags.idu')
                    </section>
                    <hr>
                    <section id="sectionMarkedOutdoor">
                        @include('projects.includes.tags.outdoor')
                    </section>
                </div>
            </div>
            <div class="box-footer">
                {{--  Modal para confirmar envio  --}}
                <input type="submit" name="btnSubmit" value="Enviar y firmar" class="btn btn-sm btn-primary btn-send">
                <input type="submit" name="btnSubmit" value="Guardar" class="btn btn-sm btn-success btn-send">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalOrdenBodega">Ver orden de bodega</button>
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
                                            <td><input type="hidden" name="consumables_cost" value="0" id="inputConsumablesCost"></td>
                                            <td id="consumables_cost">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
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

        $(document).ready(function() {
            $('.btn-send').click(function (){
                bPreguntar = false;
                return d.submit();
            });
        });
        
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
            return "¿Seguro que quieres salir?";
        }
    </script>
@endsection
