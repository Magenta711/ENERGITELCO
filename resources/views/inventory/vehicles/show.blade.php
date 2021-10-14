@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar vehículos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Vehículos</a></li>
        <li class="active">Editar vehículos</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Editar vehículos</h3>
                    <div class="box-tools">
                        <a href="{{route('inv_vehicle')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <form action="{{ route('inv_vehicle_update',$id->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="plate">Placa</label>
                                            <p>{{ $id->plate }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="num_enrollment">Número de matricula</label>
                                            <p>{{ $id->num_enrollment }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="start_date">Fecha matricula</label>
                                            <p>{{ $id->start_date }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="brand">Marca</label>
                                            <p>{{ $id->brand }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="line">Línea</label>
                                            <p>{{ $id->line }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="model">Modelo</label>
                                            <p>{{ $id->model }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cc">Cilindrada CC</label>
                                            <p>{{ $id->cc }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="color">Color</label>
                                            <p>{{ $id->color }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="type">Tipo vehículo</label>
                                            <p>{{ $id->type }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="body_type">Tipo carrocería</label>
                                            <p>{{ $id->body_type }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fuel">Combustible</label>
                                            <p>{{ $id->fuel }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="capacity">Capacidad por personas</label>
                                            <p>{{ $id->capacity }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exp_date">Fecha de expedición</label>
                                            <p>{{ $id->exp_date }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="toll_ship">¿Tiene ship de peaje?</label>
                                            <p>{{ $id->toll_ship }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tires">Número de llantas</label>
                                            <p>{{ $id->tires }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="spare_tire">¿Tiene llanta de repuesto?</label>
                                            <p>{{ $id->spare_tire }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="date_extinguisher">Fecha vencimiento de extintor</label>
                                            <p>{{$id->date_extinguisher}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status">Estado</label>
                                            <p>
                                                {{ ($id->status == '1') ? 'Bueno' : '' }}
                                                {{ ($id->status == '2') ? 'Pendientes' : '' }}
                                                {{ ($id->status == '3') ? 'Malo' : '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="avatars">Foto</label>
                                    @if ($id->avatar)
                                        <img src="/storage/inventory/vehicle/{{$id->avatar}}" style="width: 100%;" alt="Attachment" class="img-thumbnail">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>Documentos</h4>
                        <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="enrollments">Matricula</label>
                                    @if ($id->enrollment)
                                            <p>Fecha vencimiento <small class="label {{ $id->enrollment_date < now() ? 'bg-red' : 'bg-blue' }}">{{ $id->enrollment_date ?? 'xxxx-xx-xx' }}</small></p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @php
                                                    $type=explode('.',$id->enrollment)[count(explode('.',$id->enrollment)) - 1];
                                                @endphp
                                                <span class="mailbox-attachment-icon {{$type == "jpg" || $type == "png" || $type == "jpeg" ? 'has-img' : ''}}" id="icon">
                                                    <div id="type">
                                                        @if ($type=='pdf')
                                                            <i class="fa fa-file-pdf"></i>
                                                        @endif
                                                        @if ($type=='docx' || $type=='doc')
                                                            <i class="fa fa-file-word"></i>
                                                        @endif
                                                        @if ($type=='xlsx' || $type=='xls')
                                                            <i class="fa  fa-file-excel"></i>
                                                        @endif
                                                        @if ($type=='pptx' || $type=='ppt')
                                                            <i class="fa  fa-file-powerpoint"></i>
                                                        @endif
                                                        @if ($type == 'png' || $type == 'jpg' || $type == 'jpeg')
                                                            <img src="/storage/inventory/vehicle/{{$id->enrollment}}" style="width: 100%;" alt="Attachment">
                                                        @endif
                                                    </div>
                                                </span>
                                                <div class="mailbox-attachment-info">
                                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->enrollment}}</p>
                                                    <span class="mailbox-attachment-size">
                                                        .
                                                        <a target="_black" href="/storage/inventory/vehicle/{{$id->enrollment}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Sin archivo</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="soats">SOAT</label>
                                    @if ($id->soat)
                                            <p>Fecha vencimiento <small class="label {{ $id->soat_date < now() ? 'bg-red' : 'bg-blue' }}">{{ $id->soat_date ?? 'xxxx-xx-xx' }}</small></p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @php
                                                    $type=explode('.',$id->soat)[count(explode('.',$id->soat)) - 1];
                                                @endphp
                                                <span class="mailbox-attachment-icon {{$type == "jpg" || $type == "png" || $type == "jpeg" ? 'has-img' : ''}}" id="icon">
                                                    <div id="type">
                                                        @if ($type=='pdf')
                                                            <i class="fa fa-file-pdf"></i>
                                                        @endif
                                                        @if ($type=='docx' || $type=='doc')
                                                            <i class="fa fa-file-word"></i>
                                                        @endif
                                                        @if ($type=='xlsx' || $type=='xls')
                                                            <i class="fa  fa-file-excel"></i>
                                                        @endif
                                                        @if ($type=='pptx' || $type=='ppt')
                                                            <i class="fa  fa-file-powerpoint"></i>
                                                        @endif
                                                        @if ($type == 'png' || $type == 'jpg' || $type == 'jpeg')
                                                            <img src="/storage/inventory/vehicle/{{$id->soat}}" style="width: 100%;" alt="Attachment">
                                                        @endif
                                                    </div>
                                                </span>
                                                <div class="mailbox-attachment-info">
                                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->soat}}</p>
                                                    <span class="mailbox-attachment-size">
                                                        .
                                                        <a target="_black" href="/storage/inventory/vehicle/{{$id->soat}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Sin archivo</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="gasess">Certificado de gases</label>
                                    @if ($id->gases)
                                            <p>Fecha vencimiento <small class="label {{ $id->gases_date < now() ? 'bg-red' : 'bg-blue' }}">{{ $id->gases_date ?? 'xxxx-xx-xx' }}</small></p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @php
                                                    $type=explode('.',$id->gases)[count(explode('.',$id->gases)) - 1];
                                                @endphp
                                                <span class="mailbox-attachment-icon {{$type == "jpg" || $type == "png" || $type == "jpeg" ? 'has-img' : ''}}" id="icon">
                                                    <div id="type">
                                                        @if ($type=='pdf')
                                                            <i class="fa fa-file-pdf"></i>
                                                        @endif
                                                        @if ($type=='docx' || $type=='doc')
                                                            <i class="fa fa-file-word"></i>
                                                        @endif
                                                        @if ($type=='xlsx' || $type=='xls')
                                                            <i class="fa  fa-file-excel"></i>
                                                        @endif
                                                        @if ($type=='pptx' || $type=='ppt')
                                                            <i class="fa  fa-file-powerpoint"></i>
                                                        @endif
                                                        @if ($type == 'png' || $type == 'jpg' || $type == 'jpeg')
                                                            <img src="/storage/inventory/vehicle/{{$id->gases}}" style="width: 100%;" alt="Attachment">
                                                        @endif
                                                    </div>
                                                </span>
                                                <div class="mailbox-attachment-info">
                                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->gases}}</p>
                                                    <span class="mailbox-attachment-size">
                                                        .
                                                        <a target="_black" href="/storage/inventory/vehicle/{{$id->gases}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Sin archivo</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="technomechanicals">Técnico mecánica</label>
                                    @if ($id->technomechanical)
                                            <p>Fecha vencimiento <small class="label {{ $id->technomechanical_date < now() ? 'bg-red' : 'bg-blue' }}">{{ $id->technomechanical_date ?? 'xxxx-xx-xx' }}</small></p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @php
                                                    $type=explode('.',$id->technomechanical)[count(explode('.',$id->technomechanical)) - 1];
                                                @endphp
                                                <span class="mailbox-attachment-icon {{$type == "jpg" || $type == "png" || $type == "jpeg" ? 'has-img' : ''}}" id="icon">
                                                    <div id="type">
                                                        @if ($type=='pdf')
                                                            <i class="fa fa-file-pdf"></i>
                                                        @endif
                                                        @if ($type=='docx' || $type=='doc')
                                                            <i class="fa fa-file-word"></i>
                                                        @endif
                                                        @if ($type=='xlsx' || $type=='xls')
                                                            <i class="fa  fa-file-excel"></i>
                                                        @endif
                                                        @if ($type=='pptx' || $type=='ppt')
                                                            <i class="fa  fa-file-powerpoint"></i>
                                                        @endif
                                                        @if ($type == 'png' || $type == 'jpg' || $type == 'jpeg')
                                                            <img src="/storage/inventory/vehicle/{{$id->technomechanical}}" style="width: 100%;" alt="Attachment">
                                                        @endif
                                                    </div>
                                                </span>
                                                <div class="mailbox-attachment-info">
                                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->technomechanical}}</p>
                                                    <span class="mailbox-attachment-size">
                                                        .
                                                        <a target="_black" href="/storage/inventory/vehicle/{{$id->technomechanical}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Sin archivo</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="first_aid_kits">Botiquín</label>
                                    @if ($id->first_aid_kit)
                                            <p>Fecha vencimiento <small class="label {{ $id->first_aid_kit_date < now() ? 'bg-red' : 'bg-blue' }}">{{ $id->first_aid_kit_date ?? 'xxxx-xx-xx' }}</small></p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @php
                                                    $type=explode('.',$id->first_aid_kit)[count(explode('.',$id->first_aid_kit)) - 1];
                                                @endphp
                                                <span class="mailbox-attachment-icon {{$type == "jpg" || $type == "png" || $type == "jpeg" ? 'has-img' : ''}}" id="icon">
                                                    <div id="type">
                                                        @if ($type=='pdf')
                                                            <i class="fa fa-file-pdf"></i>
                                                        @endif
                                                        @if ($type=='docx' || $type=='doc')
                                                            <i class="fa fa-file-word"></i>
                                                        @endif
                                                        @if ($type=='xlsx' || $type=='xls')
                                                            <i class="fa  fa-file-excel"></i>
                                                        @endif
                                                        @if ($type=='pptx' || $type=='ppt')
                                                            <i class="fa  fa-file-powerpoint"></i>
                                                        @endif
                                                        @if ($type == 'png' || $type == 'jpg' || $type == 'jpeg')
                                                            <img src="/storage/inventory/vehicle/{{$id->first_aid_kit}}" style="width: 100%;" alt="Attachment">
                                                        @endif
                                                    </div>
                                                </span>
                                                <div class="mailbox-attachment-info">
                                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->first_aid_kit}}</p>
                                                    <span class="mailbox-attachment-size">
                                                        .
                                                        <a target="_black" href="/storage/inventory/vehicle/{{$id->first_aid_kit}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Sin archivo</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="liability_insurances">Seguro de responsabilidad civil</label>
                                    @if ($id->liability_insurance)
                                            <p>Fecha vencimiento <small class="label {{ $id->liability_insurance_date < now() ? 'bg-red' : 'bg-blue' }}">{{ $id->liability_insurance_date ?? 'xxxx-xx-xx' }}</small></p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @php
                                                    $type=explode('.',$id->liability_insurance)[count(explode('.',$id->liability_insurance)) - 1];
                                                @endphp
                                                <span class="mailbox-attachment-icon {{$type == "jpg" || $type == "png" || $type == "jpeg" ? 'has-img' : ''}}" id="icon">
                                                    <div id="type">
                                                        @if ($type=='pdf')
                                                            <i class="fa fa-file-pdf"></i>
                                                        @endif
                                                        @if ($type=='docx' || $type=='doc')
                                                            <i class="fa fa-file-word"></i>
                                                        @endif
                                                        @if ($type=='xlsx' || $type=='xls')
                                                            <i class="fa  fa-file-excel"></i>
                                                        @endif
                                                        @if ($type=='pptx' || $type=='ppt')
                                                            <i class="fa  fa-file-powerpoint"></i>
                                                        @endif
                                                        @if ($type == 'png' || $type == 'jpg' || $type == 'jpeg')
                                                            <img src="/storage/inventory/vehicle/{{$id->liability_insurance}}" style="width: 100%;" alt="Attachment">
                                                        @endif
                                                    </div>
                                                </span>
                                                <div class="mailbox-attachment-info">
                                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->liability_insurance}}</p>
                                                    <span class="mailbox-attachment-size">
                                                        .
                                                        <a target="_black" href="/storage/inventory/vehicle/{{$id->liability_insurance}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Sin archivo</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label for="policys">Póliza de transporte</label>
                                    @if ($id->policy)
                                            <p>Fecha vencimiento <small class="label {{ $id->policy_date < now() ? 'bg-red' : 'bg-blue' }}">{{ $id->policy_date ?? 'xxxx-xx-xx' }}</small></p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @php
                                                    $type=explode('.',$id->policy)[count(explode('.',$id->policy)) - 1];
                                                @endphp
                                                <span class="mailbox-attachment-icon {{$type == "jpg" || $type == "png" || $type == "jpeg" ? 'has-img' : ''}}" id="icon">
                                                    <div id="type">
                                                        @if ($type=='pdf')
                                                            <i class="fa fa-file-pdf"></i>
                                                        @endif
                                                        @if ($type=='docx' || $type=='doc')
                                                            <i class="fa fa-file-word"></i>
                                                        @endif
                                                        @if ($type=='xlsx' || $type=='xls')
                                                            <i class="fa  fa-file-excel"></i>
                                                        @endif
                                                        @if ($type=='pptx' || $type=='ppt')
                                                            <i class="fa  fa-file-powerpoint"></i>
                                                        @endif
                                                        @if ($type == 'png' || $type == 'jpg' || $type == 'jpeg')
                                                            <img src="/storage/inventory/vehicle/{{$id->policy}}" style="width: 100%;" alt="Attachment">
                                                        @endif
                                                    </div>
                                                </span>
                                                <div class="mailbox-attachment-info">
                                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->policy}}</p>
                                                    <span class="mailbox-attachment-size">
                                                        .
                                                        <a target="_black" href="/storage/inventory/vehicle/{{$id->policy}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>Sin archivo</p>
                                    @endif
                                </div>
                            </div>
                        <hr>
                    <h3>Mantenimiento preventivo</h3>
                        <hr>
                        <div id="destino_oil">
                            @php
                                $oil = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'oil')
                                    @php
                                        $oil = true;
                                    @endphp
                                    <div class="row" id="origen_oil">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_oil">Último cambio de aceite</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_oil">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_oil">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_oil" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_tires">
                            @php
                                $tires = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'tires')
                            @php
                                $tires = true;
                            @endphp
                                    <div class="row" id="origen_tires">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_tires">Último cambio de llantas</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_tires">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_tires">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_tires" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_lubrication">
                            @php
                                $lubrication = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'lubrication')
                            @php
                                $lubrication = true;
                            @endphp
                                    <div class="row" id="origen_lubrication">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_lubrication">Última lubricación</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_lubrication">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_lubrication">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_lubrication" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_address">
                            @php
                                $address = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'address')
                            @php
                                $address = true;
                            @endphp
                                    <div class="row" id="origen_address">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_address">Última revisión de dirección</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_address">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_address">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_address" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_motor">
                            @php
                                $motor = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'motor')
                            @php
                                $motor = true;
                            @endphp
                                    <div class="row" id="origen_motor">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_motor">Última revisión motor</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_motor">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_motor">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_motor" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_clutch">
                            @php
                                $clutch = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'clutch')
                            @php
                                $clutch = true;
                            @endphp
                                    <div class="row" id="origen_clutch">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_clutch">Última revisión embrague</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_clutch">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_clutch">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                        </div>
                        <button id="add_clutch" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_suspension">
                            @php
                                $suspension = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'suspension')
                            @php
                                $suspension = true;
                            @endphp
                                    <div class="row" id="origen_suspension">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_suspension">Última revisión suspensión</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_suspension">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_suspension">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_suspension" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_brakes_bands">
                            @php
                                $brakes_bands = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'brakes_bands')
                            @php
                                $brakes_bands = true;
                            @endphp
                                    <div class="row" id="origen_brakes_bands">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_brakes_bands">Última revisión bandas de frenos</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brakes_bands">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_brakes_bands">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_brakes_bands" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_brakes_pastes">
                            @php
                                $brakes_pastes = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'brakes_pastes')
                            @php
                                $brakes_pastes = true;
                            @endphp
                                    <div class="row" id="origen_brakes_pastes">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_brakes_pastes">Última revisión pastas de frenos</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brakes_pastes">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_brakes_pastes">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_brakes_pastes" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_brake_pump">
                            @php
                                $brake_pump = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'brake_pump')
                            @php
                                $brake_pump = true;
                            @endphp
                                    <div class="row" id="origen_brake_pump">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_brake_pump">Última revisión bomba de frenos</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brake_pump">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_brake_pump">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_brake_pump" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_box_transmission">
                            @php
                                $box_transmission = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'box_transmission')
                            @php
                                $box_transmission = true;
                            @endphp
                                    <div class="row" id="origen_box_transmission">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_box_transmission">Última revisión caja y transmisión</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_box_transmission">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <p>{{$item->last_val}}</p>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_box_transmission" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_brassiness">
                            @php
                                $brassiness = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'brassiness')
                            @php
                                $brassiness = true;
                            @endphp
                                    <div class="row" id="origen_brassiness">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_brassiness">Última revisión latonería</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brassiness">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_brassiness">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_brassiness" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_lights">
                            @php
                                $lights = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'lights')
                            @php
                                $lights = true;
                            @endphp
                                    <div class="row" id="origen_lights">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_lights">Última revisión luces</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_lights">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_lights">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_lights" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_gases">
                            @php
                                $gases = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'gases')
                            @php
                                $gases = true;
                            @endphp
                                    <div class="row" id="origen_gases">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_gases">Última revisión gases</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_gases">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_gases">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_gases" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_wistle">
                            @php
                                $wistle = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'wistle')
                            @php
                                $wistle = true;
                            @endphp
                                    <div class="row" id="origen_wistle">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_wistle">Última revisión pito</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_wistle">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_wistle">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_wistle" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_timing_belt">
                            @php
                                $timing_belt = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'timing_belt')
                            @php
                                $timing_belt = true;
                            @endphp
                                    <div class="row" id="origen_timing_belt">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_timing_belt">Cambio de correa de distribución</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_timing_belt">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_timing_belt">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_timing_belt" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_alignment_balancing">
                            @php
                                $alignment_balancing = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'alignment_balancing')
                            @php
                                $alignment_balancing = true;
                            @endphp
                                    <div class="row" id="origen_alignment_balancing">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_alignment_balancing">Última alineación y balanceo</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_alignment_balancing">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_alignment_balancing">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_alignment_balancing" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_batteries">
                            @php
                                $batteries = false;
                            @endphp
                            @foreach ($id->maintenances as $item)
                                @if ($item->type == 'batteries')
                            @php
                                $batteries = true;
                            @endphp
                                    <div class="row" id="origen_batteries">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_batteries">Último cambio de batería</label>
                                                <p>{{$item->last_ch}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_batteries">Taller</label>
                                                <p>{{$item->last_ws}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_val_batteries">Valor</label>
                                                <p>{{$item->last_val}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_batteries" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <h3>Reporte de comparendos</h3>
                        <div id="destino_summons_report">
                            @php
                                $summons_report = false;
                            @endphp
                            @foreach ($id->reports as $item)
                                @if ($item->type == 'summons')
                            @php
                                $summons_report = true;
                            @endphp
                                    <div class="row" id="origen_summons_report">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date_summons_report">Fecha</label>
                                                <p>{{$item->date}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_summons_report">Lugar</label>
                                                <p>{{$item->place}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="area_summons_report">Area rural/urbana</label>
                                                <p>{{$item->area}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_summons_report" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar reporte</button>
                        <hr>
                        <h3>Reporte de incidentes</h3>
                        <div id="destino_incident_report">
                            @php
                                $incident_report = false;
                            @endphp
                            @foreach ($id->reports as $item)
                                @if ($item->type == 'incident')
                            @php
                                $incident_report = true;
                            @endphp
                                    <div class="row" id="origen_incident_report">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date_incident_report">Fecha</label>
                                                <p>{{$item->date}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_incident_report">Lugar</label>
                                                <p>{{$item->place}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="area_incident_report">Area rural/urbana</label>
                                                <p>{{$item->area}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_incident_report" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar reporte</button>
                        <hr>
                        <h3>Reporte de accidentes</h3>
                        <div id="destino_accident_report">
                            @php
                                $accident_report = false;
                            @endphp
                            @foreach ($id->reports as $item)
                                @if ($item->type == 'accident')
                            @php
                                $accident_report = true;
                            @endphp
                                    <div class="row" id="origen_accident_report">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date_accident_report">Fecha</label>
                                                <p>{{$item->date}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_accident_report">Lugar</label>
                                                <p>{{$item->place}}</p>
                                            </div>
                                        <p>{{$item->last_ws}}</p>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="area_accident_report">Area rural/urbana</label>
                                                <p>{{$item->area}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button id="add_accident_report" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar reporte</button>
                        <hr>
                        {{-- <h3>Plan de mantenimiento preventivo – fechas</h3> --}}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="preventive_plan">Plan de mantenimiento preventivo</label>
                                    <p>{{$id->preventive_plan}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_preventive_plan">Fecha</label>
                                    <p>{{$id->active_safaty_system}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- <h3>Sistemas de seguridad activa</h3> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="active_safaty_system">Sistemas de seguridad activa</label>
                                    <p>{{$id->active_safaty_system}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- <h3>Sistemas de seguridad pasiva</h3> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="passive_safaty_system">Sistemas de seguridad pasiva</label>
                                    <p>{{$id->passive_safaty_system}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="observations">Observaciones: todo lo que aporte como historial o lecciones aprendidas del vehículo</label>
                            <p>{{$id->observations}}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="annual_cost">Costo anual del vehículo:</label>
                                    <p>{{$id->annual_cost}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useful_life">Estado y porcentaje vida útil al final del periodo:</label>
                                    <p>{{$id->useful_life}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="responsible_process">Responsable del proceso:</label>
                                    <p>{{$id->responsible_process}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="responsible_address">Responsable de la dirección:</label>
                                    <p>{{$id->responsible_address}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="commentary">Comentarios de cierre que se deban tener presente para el próximo periodo:</label>
                            <p>{{$id->commentary}}</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection