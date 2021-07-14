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
                                    @php
                                        $canReport = $item->responsable_id == auth()->id() ? true : false;
                                    @endphp
                                    @foreach ($item->users as $user)
                                        <span class="label label-default">{{$user->name}}</span>
                                        @php
                                            if ($user->id == auth()->id())
                                                $canReport = true;
                                        @endphp
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
                                <p>{{$item->eb ? $item->eb->projectble->name : $item->station_name}}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="eb-show">Latitud</label>
                                <p>{{ $item->eb ? $item->eb->projectble->lat : $item->lat }}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="eb-show">Longitud</label>
                                <p>{{ $item->eb ? $item->eb->projectble->long : $item->long }}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="eb-show">Altitud</label>
                                <p>{{ $item->eb ? $item->eb->projectble->height : $item->height }}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="vehicles-show">Vehículos</label>
                                <p>
                                    @foreach ($item->vehicles as $vehicle)
                                        <span class="label label-default">{{$vehicle->vehicle->plate}} - {{$vehicle->vehicle->brand}}</span>
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
                        <form action="{{route('tasking_report',$item->id)}}" method="post">
                        <div class="form-group">
                            <label for="report-show"><i class="fa fa-align-left"></i> Reporte de cierre</label>
                            @if ($item->report)
                                <p>{{$item->report}}</p>
                            @else
                                @if ($canReport)
                                    @csrf
                                    @method('PATCH')
                                    <textarea name="report" id="report-show-{{$item->id}}" cols="30" rows="3" class="form-control"></textarea>
                                @endif
                            @endif
                        </div>
                        @if (!$item->report && $canReport)
                            <button class="btn btn-sm btn-success">Enviar reporte</button>
                        @endif
                        </form>
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
                                    <form action="{{route('tasking_consumables',$item->id)}}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Asignado para inventario</label>
                                            <p>{{$item->user_inv ? $item->invetory_user->name : ''}}</p>
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
                                                    @php
                                                        $hasConsumable = false;
                                                    @endphp
                                                    @foreach ($item->consumables as $equiment)
                                                        @if ($equiment->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticEquipment')
                                                            <tr>
                                                                <td>{{$equiment->id}}</td>
                                                                <td>{{$equiment->inventaryble->serial}}</td>
                                                                <td>{{$equiment->inventaryble->item}}</td>
                                                                <td>{{$equiment->inventaryble->brand }}</td>
                                                            </tr>
                                                            @php
                                                                $hasConsumable = true;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if (!$hasConsumable && $item->user_inv == auth()->id())
                                                        @foreach (auth()->user()->inventories as $equiment)
                                                            @if ($equiment->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticEquipment')
                                                                <tr>
                                                                    <td><input type="checkbox" name="equipment[{{$equiment->inventaryble_id}}]" id="equipment_{{$equiment->id}}" value="{{$equiment->id}}"></td>
                                                                    <td>{{$equiment->inventaryble->serial}}</td>
                                                                    <td>{{$equiment->inventaryble->item}}</td>
                                                                    <td>{{$equiment->inventaryble->brand }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if (!$hasConsumable && $item->user_inv == auth()->id())
                                        <div class="box-footer">
                                            <button class="btn btn-sm btn-primary btn-send">Guardar</button>
                                        </div>
                                    @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="consumables-show-{{$item->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Consumibles</h4>
                                    </div>
                                    <form action="{{route('tasking_consumables',$item->id)}}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Asignado para inventario</label>
                                            <p>{{$item->user_inv ? $item->invetory_user->name : ''}}</p>
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
                                                    @php
                                                        $hasConsumable = false;
                                                    @endphp
                                                    @foreach ($item->consumables as $consumable)
                                                        @if ($consumable->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticConsumable')
                                                            <tr>
                                                                <td>{{$consumable->id}}</td>
                                                                <td>{{$consumable->inventaryble->item}} {{$consumable->inventaryble->type}}</td>
                                                                <td>
                                                                    {{$consumable->inventaryble->amount}}
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $hasConsumable = true;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if (!$hasConsumable && $item->user_inv == auth()->id())
                                                        @foreach (auth()->user()->inventories as $consumable)
                                                            @if ($consumable->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticConsumable')
                                                                <tr>
                                                                    <td><input type="checkbox" name="consumable[{{$consumable->inventaryble_id}}]" id="consumable_{{$consumable->inventaryble_id}}" value="1"></td>
                                                                    <td>{{$consumable->inventaryble->item}} {{$consumable->inventaryble->type}}</td>
                                                                    <td>
                                                                        <div class="col-md-9" style="padding-right: 2px;">
                                                                            <input type="number" id="amount-cosumable-{{$consumable->id}}" class="form-control amounts-consumables" name="amount[{{$consumable->inventaryble_id}}]" value="0">
                                                                        </div>
                                                                        <div class="col-md-3" style="padding-left: 2px">/ {{$consumable->stock}}</div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if (!$hasConsumable && $item->user_inv == auth()->id())
                                        <div class="box-footer">
                                            <button class="btn btn-sm btn-primary btn-send">Guardar</button>
                                        </div>
                                    @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>