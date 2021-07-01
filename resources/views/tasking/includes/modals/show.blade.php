<div class="modal fade" id="show-modal-{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createTask" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Ver programación</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="date_start-show">Fecha de salida</label>
                                <p>{{$item->date_start}}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="users-show">Funcionarios</label>
                                <p>
                                    @foreach ($item->users as $user)
                                        <span class="label label-primary">{{$user->name}}</span>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-md-4">
                                <label for="municipality-show">Municipio</label>
                                <p>{{$item->municipality}}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="department-show">Departamento</label>
                                <p>{{$item->department}}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="project-show">Proyecto</label>
                                <p>{{$item->project}}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="eb-show">Estación base</label>
                                <p>{{$item->eb->projectble->name}}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="vehicles-show">Vehículos</label>
                                <p>
                                    @foreach ($item->vehicles as $vehicle)
                                        <span>{{$vehicle->vehicle->plate}} - {{$vehicle->vehicle->brand}}</span>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-md-4">
                                <label for="">Disposición</label>
                                <p>{{$item->am ? 'AM'.($item->pm ? ' / ' : '') : ''}} {{$item->pm ? 'PM' : ''}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description-show"><i class="fa fa-align-left"></i> Descripción</label>
                            <p>{{$item->description}}</p>
                        </div>
                        <div class="form-group">
                            <label for="activities"><i class="fa fa-list"></i> Actividades</label>
                            <div id="destino-activities">
                                @foreach($item->activities as $activity)
                                    <p>{{$activity->text}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="commentaries-show"><i class="fa fa-align-left"></i> Comentarios</label>
                            <p>{{$item->commentaries}}</p>
                        </div>
                        <div class="form-group">
                            <label for="report-show"><i class="fa fa-align-left"></i> Reporte de cierre</label>
                            <p>{{$item->report}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#equipment-show-{{$item->id}}-modal">
                            <i class="fa fa-hdd"></i> Equipos
                        </button>
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#consumables-show-{{$item->id}}-modal">
                            <i class="fa fa-plug"></i> Consumibles
                        </button>
                        <div class="modal fade" id="equipment-show-{{$item->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Equipos</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Asignado para inventario</label>
                                            {{-- <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                                @foreach ($item->users as $user)
                                                    <option {{$user->id == $item->user_inv ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>/</th>
                                                        <th>Seriral</th>
                                                        <th>Nombre</th>
                                                        <th>Marcar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($equipments as $equiment)
                                                        <tr>
                                                            <td><input type="checkbox" name="equipment[{{$equiment->id}}]" id="equipment_{{$equiment->id}}" value="{{$equiment->id}}"></td>
                                                            <td>{{$equiment->serial}}</td>
                                                            <td>{{$equiment->item}}</td>
                                                            <td>{{$equiment->brand }}</td>
                                                        </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="consumables-show-{{$item->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Consumibles</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Asignado para inventario</label>
                                            {{-- <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                                @foreach ($item->users as $user)
                                                    <option {{$user->id == $item->user_inv ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>/</th>
                                                        <th>Nombre</th>
                                                        <th>Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($consumables as $consumable)
                                                        @php
                                                            $hasCosumable = $item->consumables ? hasConsumable($item->consumables,$consumable->id,'App\Models\project\Mintic\inventory\invMinticConsumable') : false;
                                                        @endphp
                                                        <tr>
                                                            <td><input type="checkbox" name="consumable[{{$consumable->id}}]" id="consumable_{{$consumable->id}}" value="{{$consumable->id}}" {{$hasCosumable ? 'checked' : ''}}></td>
                                                            <td>{{$consumable->item}} {{$consumable->type}}</td>
                                                            <td>
                                                                <div class="col-md-9" style="padding-right: 2px;">
                                                                    <input type="number" class="form-control" name="amount[{{$item->id}}]" value="{{$hasCosumable ? $hasCosumable->amount : 0}}">
                                                                </div>
                                                                <div class="col-md-3" style="padding-left: 2px">
                                                                    / {{$consumable->amount + ($hasCosumable->amount ?? 0)}}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>