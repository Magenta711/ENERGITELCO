<div class="modal fade" id="edit-modal-{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createTask" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar programación</h4>
            </div>
            <form action="{{route('tasking_update',$item->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="date_start-edit-{{$item->id}}">Fecha de salida</label>
                                <input type="datetime-local" name="date_start" id="date_start-edit-{{$item->id}}" class="form-control" value="{{date('Y-m-d',strtotime($item->date_start))}}T{{date('h:i',strtotime($item->date_start))}}">
                            </div>
                            <div class="col-md-4">
                                <label for="users-edit-{{$item->id}}">Funcionarios</label>
                                <select name="users[]" id="users-edit-{{$item->id}}" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un funcionario" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach ($users as $user)
                                        <option id="option_user-edit-{{$item->id}}-{{$user->id}}" {{ selected($item->users,$user->id) ? 'selected' : '' }} data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="department-edit-{{$item->id}}">Departamento</label>
                                <select name="department" id="department-edit-{{$item->id}}" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el departamento" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true" value="{{$item->department}}">
                                    <option disabled selected></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="municipality-edit-{{$item->id}}">Municipio</label>
                                <select name="municipality" id="municipality-edit-{{$item->id}}" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el municipio" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" value="{{$item->municipality}}">
                                    <option disabled selected></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="project-edit-{{$item->id}}">Proyecto</label>
                                <select name="project" id="project-edit-{{$item->id}}" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el proyecto" style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    <option {{$item->project == 'MINTIC ESTUDIO DE CAMPO' ? 'selected' : '' }} data-select2-id="MINTIC_ESTUDIO_DE_CAMPO" value="MINTIC ESTUDIO DE CAMPO">MINTIC ESTUDIO DE CAMPO</option>
                                    <option {{$item->project == 'MINTIC INSTALACIÓN' ? 'selected' : '' }} data-select2-id="MINTIC_INSTALACIÓN" value="MINTIC INSTALACIÓN">MINTIC INSTALACIÓN</option>
                                    <option {{$item->project == 'MINTIC MANTANIMIENTO' ? 'selected' : '' }} data-select2-id="MINTIC_MANTANIMIENTO" value="MINTIC MANTANIMIENTO">MINTIC MANTANIMIENTO</option>
                                    <option {{$item->project == 'RUTAS DE TX' ? 'selected' : '' }} data-select2-id="RUTAS_DE_TX" value="RUTAS DE TX">RUTAS DE TX</option>
                                    <option {{$item->project == 'DESMONTES ENLACES MW' ? 'selected' : '' }} data-select2-id="DESMONTES_ENLACES_MW" value="DESMONTES ENLACES MW">DESMONTES ENLACES MW</option>
                                    <option {{$item->project == 'INSTALACIÓN ENLACES MW' ? 'selected' : '' }} data-select2-id="INSTALACIÓN_ENLACES_MW" value="INSTALACIÓN ENLACES MW">INSTALACIÓN ENLACES MW</option>
                                    <option {{$item->project == 'DESMONTES ESTACIÓN BASE' ? 'selected' : '' }} data-select2-id="DESMONTES_ESTACIÓN_BASE" value="DESMONTES ESTACIÓN BASE">DESMONTES ESTACIÓN BASE</option>
                                    <option {{$item->project == 'INSTALACIÓN ESTACIÓN BASE' ? 'selected' : '' }} data-select2-id="INSTALACIÓN_ESTACIÓN_BASE" value="INSTALACIÓN ESTACIÓN BASE">INSTALACIÓN ESTACIÓN BASE</option>
                                    <option {{$item->project == 'MIGRACIONES' ? 'selected' : '' }} data-select2-id="MIGRACIONES" value="MIGRACIONES">MIGRACIONES</option>
                                    <option {{$item->project == 'SOLUCIONES 2G' ? 'selected' : '' }} data-select2-id="SOLUCIONES_2G,_3G_O_4G" value="SOLUCIONES 2G, 3G O 4G">SOLUCIONES 2G, 3G O 4G</option>
                                    <option {{$item->project == 'OBRAS CIVILES MENORES' ? 'selected' : '' }} data-select2-id="OBRAS_CIVILES_MENORES" value="OBRAS CIVILES MENORES">OBRAS CIVILES MENORES</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="eb-edit-{{$item->id}}">Estación base</label>
                                <select name="eb" id="eb-edit-{{$item->id}}" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona la estación base" style="width: 100%;" data-select2-id="5" tabindex="-1" aria-hidden="true" value="{{$item->eb_id}}">
                                    <option disabled selected></option>
                                </select>
                            </div>
                            <div class="col-md-4" {!! $item->eb_id == "0" ? 'style=""' : 'style="display: none"' !!}>
                                <label for="station_name-edit-{{$item->id}}">Nombre de la estación base</label>
                                <input type="text" value="{{$item->station_name}}" name="station_name" id="station_name-edit-{{$item->id}}" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="lat-edit-{{$item->id}}">Latitud</label>
                                <input type="text" value="{{$item->lat}}" name="lat" id="lat-edit-{{$item->id}}" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="long-edit-{{$item->id}}">Longitud</label>
                                <input type="text" value="{{$item->long}}" name="long" id="long-edit-{{$item->id}}" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="vehicles-edit-{{$item->id}}">Vehículos</label>
                                @php
                                    $valuesVehicles = array();
                                    foreach ($item->vehicles as $vehicle){
                                        $valuesVehicles[] = $vehicle->vehicle->id;
                                    }
                                @endphp
                                <select name="vehicles[]" id="vehicles-edit-{{$item->id}}" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un vehículos" style="width: 100%;" data-select2-id="6" tabindex="-1" aria-hidden="true" value="{{implode('-',$valuesVehicles)}}">

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Disposición</label>
                                <br>
                                <label for="am-edit-{{$item->id}}"><input type="checkbox" name="am" id="am-edit-{{$item->id}}" value="1" {{$item->am ? 'checked' : ''}}> AM</label> <label for="pm-edit-{{$item->id}}"><input type="checkbox" name="pm" id="pm-edit-{{$item->id}}" value="1" {{$item->pm ? 'checked' : ''}}> PM</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description-edit-{{$item->id}}"><i class="fa fa-align-left"></i> Descripción</label>
                            <textarea name="description" id="description-edit-{{$item->id}}" cols="30" rows="3" class="form-control">{{$item->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-10">
                                    <label for="activities"><i class="fa fa-list"></i> Actividades</label>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <button type="button" class="btn btn-sm btn-secundary btn-activities" id="add-activities-edit-{{$item->id}}"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div id="destino-activities-{{$item->id}}">
                                @forelse($item->activities as $activity)
                                    <input type="text" name="activities[]" id="activities-edit-{{$item->id}}-{{$activity->id}}" class="form-control" style="margin-bottom: 5px" value="{{$activity->text}}">
                                @empty
                                    <input type="text" name="activities[]" id="activities-edit-{{$item->id}}" class="form-control" style="margin-bottom: 5px">
                                @endforelse
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="commentaries-edit-{{$item->id}}"><i class="fa fa-align-left"></i> Comentarios</label>
                            <textarea name="commentaries" id="commentaries-edit-{{$item->id}}" cols="30" rows="3" class="form-control">{{$item->commentaries}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="report-edit-{{$item->id}}"><i class="fa fa-align-left"></i> Reporte de cierre</label>
                            <textarea name="report" id="report-edit-{{$item->id}}" cols="30" rows="3" class="form-control">{{$item->report}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#equipment-edit-{{$item->id}}-modal">
                            <i class="fa fa-hdd"></i> Equipos
                        </button>
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#consumables-edit-{{$item->id}}-modal">
                            <i class="fa fa-plug"></i> Consumibles
                        </button>
                        <input type="submit" name="add_inv_user" value="Asignar inventario al usuario" class="btn btn-sm btn-block btn-primary">
                        <div class="modal fade" id="equipment-edit-{{$item->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Equipos</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                                @foreach ($item->users as $user)
                                                    <option {{$user->id == $item->user_inv ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div id="destino_equipment-edit-{{$item->id}}">
                                            <div class="form-group" id="origen_equipment-{{$item->id}}">
                                                <label for="equipment">Descripción</label>
                                                <select name="equipment[]" id="equipment" class="form-control select2">
                                                    <option selected disabled></option>
                                                    @foreach ($equipments as $equipment)
                                                        <option value="{{$equipment->id}}">{{$equipment->serial}} - {{$equipment->item}} - {{$equipment->brand }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" id="add_equipment" class="btn btn-sm btn-link add-consumable">Agregar consumible</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="consumables-edit-{{$item->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Consumibles</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                                @foreach ($item->users as $user)
                                                    <option {{$user->id == $item->user_inv ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="consumable">Descripción</label>
                                                    <select name="consumable[]" id="consumable" class="form-control select2">
                                                        <option selected disabled></option>
                                                        @foreach ($consumables as $consumable)
                                                            <option value="{{$consumable->id}}">{{$consumable->item}} - {{$consumable->type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="amount">Cantidad</label>
                                                <input type="number" name="amount[]" id="amount" class="form-control" value="0">
                                            </div>
                                        </div>
                                        <button type="button" id="add_consumable" class="btn btn-sm btn-link add-consumable">Agregar consumible</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <button class="btn btn-sm btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>