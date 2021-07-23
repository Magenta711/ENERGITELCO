<div class="modal fade" id="create-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createTask" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Crear programación</h4>
            </div>
            <form action="{{route('tasking_store')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="date_start">Fecha de salida</label>
                                <input type="datetime-local" name="date_start" id="date_start" class="form-control" value="{{old('date_start')}}">
                            </div>
                            <div class="col-md-4">
                                <label for="users">Funcionarios</label>
                                <select name="users[]" id="users" disabled class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un funcionario" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach ($users as $user)
                                        <option id="option_user_{{$user->id}}" data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="department">Departamentos</label>
                                <select name="department" id="department" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el departamento" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="municipality">Municiopio</label>
                                <select name="municipality" id="municipality" disabled class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el municipio" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="project">Proyecto</label>
                                <select name="project" id="project" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el proyecto" style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    <option data-select2-id="MINTIC_ESTUDIO_DE_CAMPO" value="MINTIC ESTUDIO DE CAMPO">MINTIC ESTUDIO DE CAMPO</option>
                                    <option data-select2-id="MINTIC_INSTALACIÓN" value="MINTIC INSTALACIÓN">MINTIC INSTALACIÓN</option>
                                    <option data-select2-id="MINTIC_MANTANIMIENTO" value="MINTIC MANTANIMIENTO">MINTIC MANTANIMIENTO</option>
                                    <option data-select2-id="RUTAS_DE_TX" value="RUTAS DE TX">RUTAS DE TX</option>
                                    <option data-select2-id="DESMONTES_ENLACES_MW" value="DESMONTES ENLACES MW">DESMONTES ENLACES MW</option>
                                    <option data-select2-id="DESMONTES_ENLACES_MW" value="DESMONTES ENLACES MW">TSS MW</option>
                                    <option data-select2-id="DESMONTES_ENLACES_MW" value="DESMONTES ENLACES MW">TSS RF</option>
                                    <option data-select2-id="INSTALACIÓN_ENLACES_MW" value="INSTALACIÓN ENLACES MW">INSTALACIÓN ENLACES MW</option>
                                    <option data-select2-id="DESMONTES_ESTACIÓN_BASE" value="DESMONTES ESTACIÓN BASE">DESMONTES ESTACIÓN BASE</option>
                                    <option data-select2-id="INSTALACIÓN_ESTACIÓN_BASE" value="INSTALACIÓN ESTACIÓN BASE">INSTALACIÓN ESTACIÓN BASE</option>
                                    <option data-select2-id="MIGRACIONES value="MIGRACIONES">MIGRACIONES</option>
                                    <option data-select2-id="SOLUCIONES_2G" value="SOLUCIONES 2G, 3G O 4G">SOLUCIONES 2G, 3G O 4G</option>
                                    <option data-select2-id="OBRAS_CIVILES_MENORES" value="OBRAS CIVILES MENORES">OBRAS CIVILES MENORES</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="eb">Estación base</label>
                                <input type="hidden" name="type_eb" id="type_eb">
                                <select name="eb" id="eb" class="form-control select2 select2-hidden-accessible" disabled style="width: 100%;" data-placeholder="Selecciona un EB o CD" data-select2-id="5" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                </select>
                            </div>
                            <div class="col-md-4" style="display: none">
                                <label for="station_name">Nombre de la estación base</label>
                                <input type="text" value="{{old('station_name')}}" name="station_name" id="station_name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="lat">Latitud</label>
                                <input type="text" value="{{old('lat')}}" name="lat" id="lat" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="long">Longitud</label>
                                <input type="text" value="{{old('long')}}" name="long" id="long" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="vehicles">Vehículos</label>
                                <select name="vehicles[]" id="vehicles" disabled class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un vehículos" style="width: 100%;" data-select2-id="6" tabindex="-1" aria-hidden="true">
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Disposición</label>
                                <br>
                                <label for="am"><input type="checkbox" name="am" id="am" value="1"> AM</label> <label for="pm"><input type="checkbox" name="pm" id="pm" value="1"> PM</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description"><i class="fa fa-align-left"></i> Descripción</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-10">
                                    <label for="activities"><i class="fa fa-list"></i> Actividades</label>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <button type="button" class="btn btn-sm btn-secundary" id="add-activities"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div id="destino-activities">
                                <input type="text" name="activities[]" id="activities" class="form-control" style="margin-bottom: 5px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="commentaries"><i class="fa fa-align-left"></i> Comentarios</label>
                            <textarea name="commentaries" id="commentaries" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#equipment-modal">
                            <i class="fa fa-hdd"></i> Equipos
                        </button>
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#consumables-modal">
                            <i class="fa fa-plug"></i> Consumibles
                        </button>
                        <div class="modal fade" id="equipment-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Equipos</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                            </select>
                                        </div>
                                        <div id="destino_equipment">
                                            <div class="form-group" id="origen_equipment">
                                                <label for="equipment">Descripción</label>
                                                <select name="equipment[]" id="equipment" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona un equipo" style="width: 100%;" data-select2-id="6" tabindex="-1" aria-hidden="true">
                                                    <option selected disabled></option>
                                                    @foreach ($equipments as $equipment)
                                                        <option value="{{$equipment->id}}">{{$equipment->serial}} - {{$equipment->item}} - {{$equipment->brand }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" id="add_equipment" class="btn btn-sm btn-link add-consumable">Agregar equipo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="consumables-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Consumibles</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                            </select>
                                        </div>
                                        <div id="destino_consumables">
                                            <div class="row" id="origen_consumables">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="consumable">Descripción</label>
                                                        <select name="consumable[]" id="consumable" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona un consumible" style="width: 100%;" data-select2-id="6" tabindex="-1" aria-hidden="true">
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
                                        </div>
                                        <button type="button" id="add_consumable" class="btn btn-sm btn-link add-consumable">Agregar consumible</button>
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