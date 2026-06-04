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
                            <div class="col-md-6">
                                <label for="plate">Placa</label>
                                <input type="text" class="form-control" id="plate" name="plate" value="{{ $id->plate }}">
                            </div>
                            <div class="col-md-6">
                                <label for="avatars">Foto</label>
                                @if ($id->avatar)
                                    <div class="row">
                                        <div class="col-md-6">
                                            @php
                                                $type=explode('.',$id->avatar)[count(explode('.',$id->avatar)) - 1];
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
                                                        <img src="/storage/inventory/vehicle/{{$id->avatar}}" style="width: 100%;" alt="Attachment">
                                                    @endif
                                                </div>
                                            </span>
                                            <div class="mailbox-attachment-info">
                                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->avata}}</p>
                                                <span class="mailbox-attachment-size">
                                                    .
                                                    <a target="_black" href="/storage/inventory/vehicle/{{$id->avatar}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <label for="avatars" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" accept="image/*" class="hide files" id="avatars" name="avatars" value="{{ $id->avatars }}">
                            </div>
                            <div class="col-md-6">
                                <label for="num_enrollment">Número de matricula</label>
                                <input type="text" class="form-control" id="num_enrollment" name="num_enrollment" value="{{ $id->num_enrollment }}">
                            </div>
                            <div class="col-md-6">
                                <label for="start_date">Fecha matricula</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $id->start_date }}">
                            </div>
                            <div class="col-md-6">
                                <label for="brand">Marca</label>
                                <input type="text" class="form-control" id="brand" name="brand" value="{{ $id->brand }}">
                            </div>
                            <div class="col-md-6">
                                <label for="line">Línea</label>
                                <input type="text" class="form-control" id="line" name="line" value="{{ $id->line }}">
                            </div>
                            <div class="col-md-6">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" id="model" name="model" value="{{ $id->model }}">
                            </div>
                            <div class="col-md-6">
                                <label for="cc">Cilindrada CC</label>
                                <input type="text" class="form-control" id="cc" name="cc" value="{{ $id->cc }}">
                            </div>
                            <div class="col-md-6">
                                <label for="color">Color</label>
                                <input type="text" class="form-control" id="color" name="color" value="{{ $id->color }}">
                            </div>
                            <div class="col-md-6">
                                <label for="type">Tipo vehículo</label>
                                <input type="text" class="form-control" id="type" name="type" value="{{ $id->type }}">
                            </div>
                            <div class="col-md-6">
                                <label for="body_type">Tipo carrocería</label>
                                <input type="text" class="form-control" id="body_type" name="body_type" value="{{ $id->body_type }}">
                            </div>
                            <div class="col-md-6">
                                <label for="fuel">Combustible</label>
                                <input type="text" class="form-control" id="fuel" name="fuel" value="{{ $id->fuel }}">
                            </div>
                            <div class="col-md-6">
                                <label for="capacity">Capacidad por personas</label>
                                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $id->capacity }}">
                            </div>
                            <div class="col-md-6">
                                <label for="exp_date">Fecha de expedición</label>
                                <input type="date" class="form-control" id="exp_date" name="exp_date" value="{{ $id->exp_date }}">
                            </div>
                            <div class="col-md-6">
                                <label for="toll_ship">¿Tiene ship de peaje?</label>
                                <input type="text" class="form-control" id="toll_ship" name="toll_ship" value="{{ $id->toll_ship }}">
                            </div>
                            <div class="col-md-6">
                                <label for="tires">Número de llantas</label>
                                <input type="text" class="form-control" id="tires" name="tires" value="{{ $id->tires }}">
                            </div>
                            <div class="col-md-6">
                                <label for="spare_tire">¿Tiene llanta de repuesto?</label>
                                <input type="text" class="form-control" id="spare_tire" name="spare_tire" value="{{ $id->spare_tire }}">
                            </div>
                            <div class="col-md-6">
                                <label for="date_extinguisher">Fecha vencimiento de extintor</label>
                                <input type="date" class="form-control" id="date_extinguisher" name="date_extinguisher" value="{{ $id->date_extinguisher }}">
                            </div>
                            <div class="col-md-6">
                                <label for="status">Estado</label>
                                <select name="status" id="status" class="form-control">
                                    <option selected disabled></option>
                                    <option {{($id->status == 1) ? 'selected' : ''}} value="1">Buen estado</option>
                                    <option {{($id->status == 2) ? 'selected' : ''}} value="2">Pendientes</option>
                                    <option {{($id->status == 3) ? 'selected' : ''}} value="3">Mal estado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Documentos</h4>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="enrollments">Matricula</label>
                                @if ($id->enrollment)
                                    <div class="row">
                                        <div class="col-md-6">
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
                                @endif
                                <label for="enrollments" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" class="hide files" id="enrollments" name="enrollments" value="{{ $id->enrollments }}">
                            </div>
                            <div class="col-md-6">
                                <label for="enrollment_date">Fecha de vencimiento matricula</label>
                                <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" value="{{ $id->enrollment_date }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="soats">SOAT</label>
                                @if ($id->soat)
                                    <div class="row">
                                        <div class="col-md-6">
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
                                @endif
                                <label for="soats" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" class="hide files" id="soats" name="soats" value="{{ $id->soats }}">
                            </div>
                            <div class="col-md-6">
                                <label for="soat_date">Fecha de vencimiento SOAT</label>
                                <input type="date" class="form-control" id="soat_date" name="soat_date" value="{{ $id->soat_date }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="gasess">Certificado de gases</label>
                                @if ($id->gases)
                                    <div class="row">
                                        <div class="col-md-6">
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
                                @endif
                                <label for="gasess" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" class="hide files" id="gasess" name="gasess" value="{{ $id->gasess }}">
                            </div>
                            <div class="col-md-6">
                                <label for="gases_date">Fecha de vencimiento gases</label>
                                <input type="date" class="form-control" id="gases_date" name="gases_date" value="{{ $id->gases_date }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="technomechanicals">Tecno mecánica</label>
                                @if ($id->technomechanical)
                                    <div class="row">
                                        <div class="col-md-6">
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
                                @endif
                                <label for="technomechanicals" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" class="hide files" id="technomechanicals" name="technomechanicals" value="{{ $id->technomechanicals }}">
                            </div>
                            <div class="col-md-6">
                                <label for="technomechanical_date">Fecha de vencimiento tecno mecánica</label>
                                <input type="date" class="form-control" id="technomechanical_date" name="technomechanical_date" value="{{ $id->technomechanical_date }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_aid_kits">Botiquín</label>
                                @if ($id->first_aid_kit)
                                    <div class="row">
                                        <div class="col-md-6">
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
                                @endif
                                <label for="first_aid_kits" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" class="hide files" id="first_aid_kits" name="first_aid_kits" value="{{ $id->first_aid_kits }}">
                            </div>
                            <div class="col-md-6">
                                <label for="first_aid_kit_date">Fecha de vencimiento botiquín</label>
                                <input type="date" class="form-control" id="first_aid_kit_date" name="first_aid_kit_date" value="{{ $id->first_aid_kit_date }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="liability_insurances">Seguro de responsabilidad civil</label>
                                @if ($id->liability_insurance)
                                    <div class="row">
                                        <div class="col-md-6">
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
                                @endif
                                <label for="liability_insurances" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" class="hide files" id="liability_insurances" name="liability_insurances" value="{{ $id->liability_insurances }}">
                            </div>
                            <div class="col-md-6">
                                <label for="liability_insurance_date">Fecha de vencimiento seguro de responsabilidad civil</label>
                                <input type="date" class="form-control" id="liability_insurance_date" name="liability_insurance_date" value="{{ $id->liability_insurance_date }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="policys">Póliza de transporte</label>
                            @if ($id->policy)
                                <div class="row">
                                    <div class="col-md-6">
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
                            @endif
                            <label for="policys" class="form-control text-center"><i class="fa fa-upload"></i></label>
                            <input type="file" class="hide files" id="policys" name="policys" value="{{ $id->policys }}">
                        </div>
                        <div class="col-md-6">
                            <label for="policy_date">Fecha de vencimiento póliza de transporte</label>
                            <input type="date" class="form-control" id="policy_date" name="policy_date" value="{{ $id->policy_date }}">
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
                                                <input type="date" name="last_ch_oil[]" id="last_ch_oil" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_oil">Taller</label>
                                                <input type="text" name="last_ws_oil[]" id="last_ws_oil" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_oil">Valor</label>
                                                <input type="number" name="last_val_oil[]" id="last_val_oil" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$oil)
                                    <div class="row" id="origen_oil">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_oil">Último cambio de aceite</label>
                                                <input type="date" name="last_ch_oil[]" id="last_ch_oil" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_oil">Taller</label>
                                                <input type="text" name="last_ws_oil[]" id="last_ws_oil" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_oil">Valor</label>
                                                <input type="number" name="last_val_oil[]" id="last_val_oil" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_tires[]" id="last_ch_tires" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_tires">Taller</label>
                                                <input type="text" name="last_ws_tires[]" id="last_ws_tires" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_tires">Valor</label>
                                                <input type="number" name="last_val_tires[]" id="last_val_tires" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$tires)
                                    <div class="row" id="origen_tires">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_tires">Último cambio de llantas</label>
                                                <input type="date" name="last_ch_tires[]" id="last_ch_tires" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_tires">Taller</label>
                                                <input type="text" name="last_ws_tires[]" id="last_ws_tires" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_tires">Valor</label>
                                                <input type="number" name="last_val_tires[]" id="last_val_tires" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_lubrication[]" id="last_ch_lubrication" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_lubrication">Taller</label>
                                                <input type="text" name="last_ws_lubrication[]" id="last_ws_lubrication" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_lubrication">Valor</label>
                                                <input type="number" name="last_val_lubrication[]" id="last_val_lubrication" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$lubrication)
                                    <div class="row" id="origen_lubrication">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_lubrication">Última lubricación</label>
                                                <input type="date" name="last_ch_lubrication[]" id="last_ch_lubrication" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_lubrication">Taller</label>
                                                <input type="text" name="last_ws_lubrication[]" id="last_ws_lubrication" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_lubrication">Valor</label>
                                                <input type="number" name="last_val_lubrication[]" id="last_val_lubrication" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_address[]" id="last_ch_address" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_address">Taller</label>
                                                <input type="text" name="last_ws_address[]" id="last_ws_address" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_address">Valor</label>
                                                <input type="number" name="last_val_address[]" id="last_val_address" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$address)
                                    <div class="row" id="origen_address">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_address">Última revisión de dirección</label>
                                                <input type="date" name="last_ch_address[]" id="last_ch_address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_address">Taller</label>
                                                <input type="text" name="last_ws_address[]" id="last_ws_address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_address">Valor</label>
                                                <input type="number" name="last_val_address[]" id="last_val_address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_motor[]" id="last_ch_motor" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_motor">Taller</label>
                                                <input type="text" name="last_ws_motor[]" id="last_ws_motor" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_motor">Valor</label>
                                                <input type="number" name="last_val_motor[]" id="last_val_motor" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$motor)
                                    <div class="row" id="origen_motor">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_motor">Última revisión motor</label>
                                                <input type="date" name="last_ch_motor[]" id="last_ch_motor" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_motor">Taller</label>
                                                <input type="text" name="last_ws_motor[]" id="last_ws_motor" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_motor">Valor</label>
                                                <input type="number" name="last_val_motor[]" id="last_val_motor" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_clutch[]" id="last_ch_clutch" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_clutch">Taller</label>
                                                <input type="text" name="last_ws_clutch[]" id="last_ws_clutch" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_clutch">Valor</label>
                                                <input type="number" name="last_val_clutch[]" id="last_val_clutch" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                                @if(!$clutch)
                                    <div class="row" id="origen_clutch">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_clutch">Última revisión embrague</label>
                                                <input type="date" name="last_ch_clutch[]" id="last_ch_clutch" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_clutch">Taller</label>
                                                <input type="text" name="last_ws_clutch[]" id="last_ws_clutch" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_clutch">Valor</label>
                                                <input type="number" name="last_val_clutch[]" id="last_val_clutch" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_suspension[]" id="last_ch_suspension" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_suspension">Taller</label>
                                                <input type="text" name="last_ws_suspension[]" id="last_ws_suspension" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_suspension">Valor</label>
                                                <input type="number" name="last_val_suspension[]" id="last_val_suspension" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$suspension)
                                    <div class="row" id="origen_suspension">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_suspension">Última revisión suspensión</label>
                                                <input type="date" name="last_ch_suspension[]" id="last_ch_suspension" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_suspension">Taller</label>
                                                <input type="text" name="last_ws_suspension[]" id="last_ws_suspension" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_suspension">Valor</label>
                                                <input type="number" name="last_val_suspension[]" id="last_val_suspension" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_brakes_bands[]" id="last_ch_brakes_bands" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brakes_bands">Taller</label>
                                                <input type="text" name="last_ws_brakes_bands[]" id="last_ws_brakes_bands" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_brakes_bands">Valor</label>
                                                <input type="number" name="last_val_brakes_bands[]" id="last_val_brakes_bands" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$brakes_bands)
                                    <div class="row" id="origen_brakes_bands">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_brakes_bands">Última revisión bandas de frenos</label>
                                                <input type="date" name="last_ch_brakes_bands[]" id="last_ch_brakes_bands" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brakes_bands">Taller</label>
                                                <input type="text" name="last_ws_brakes_bands[]" id="last_ws_brakes_bands" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_brakes_bands">Valor</label>
                                                <input type="number" name="last_val_brakes_bands[]" id="last_val_brakes_bands" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_brakes_pastes[]" id="last_ch_brakes_pastes" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brakes_pastes">Taller</label>
                                                <input type="text" name="last_ws_brakes_pastes[]" id="last_ws_brakes_pastes" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_brakes_pastes">Valor</label>
                                                <input type="number" name="last_val_brakes_pastes[]" id="last_val_brakes_pastes" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$brakes_pastes)
                                    <div class="row" id="origen_brakes_pastes">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_brakes_pastes">Última revisión pastas de frenos</label>
                                                <input type="date" name="last_ch_brakes_pastes[]" id="last_ch_brakes_pastes" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brakes_pastes">Taller</label>
                                                <input type="text" name="last_ws_brakes_pastes[]" id="last_ws_brakes_pastes" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_brakes_pastes">Valor</label>
                                                <input type="number" name="last_val_brakes_pastes[]" id="last_val_brakes_pastes" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_brake_pump[]" id="last_ch_brake_pump" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brake_pump">Taller</label>
                                                <input type="text" name="last_ws_brake_pump[]" id="last_ws_brake_pump" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_brake_pump">Valor</label>
                                                <input type="number" name="last_val_brake_pump[]" id="last_val_brake_pump" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$brake_pump)
                                    <div class="row" id="origen_brake_pump">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_brake_pump">Última revisión bomba de frenos</label>
                                                <input type="date" name="last_ch_brake_pump[]" id="last_ch_brake_pump" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brake_pump">Taller</label>
                                                <input type="text" name="last_ws_brake_pump[]" id="last_ws_brake_pump" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_brake_pump">Valor</label>
                                                <input type="number" name="last_val_brake_pump[]" id="last_val_brake_pump" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_box_transmission[]" id="last_ch_box_transmission" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_box_transmission">Taller</label>
                                                <input type="text" name="last_ws_box_transmission[]" id="last_ws_box_transmission" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="la value="{{$item->last_val}}"st_val_box_transmission">Valor</label>
                                                <input type="number" name="last_val_box_transmission[]" id="last_val_box_transmission" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$box_transmission)
                                    <div class="row" id="origen_box_transmission">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_box_transmission">Última revisión caja y transmisión</label>
                                                <input type="date" name="last_ch_box_transmission[]" id="last_ch_box_transmission" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_box_transmission">Taller</label>
                                                <input type="text" name="last_ws_box_transmission[]" id="last_ws_box_transmission" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_box_transmission">Valor</label>
                                                <input type="number" name="last_val_box_transmission[]" id="last_val_box_transmission" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_brassiness[]" id="last_ch_brassiness" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brassiness">Taller</label>
                                                <input type="text" name="last_ws_brassiness[]" id="last_ws_brassiness" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_brassiness">Valor</label>
                                                <input type="number" name="last_val_brassiness[]" id="last_val_brassiness" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$brassiness)
                                    <div class="row" id="origen_brassiness">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_brassiness">Última revisión latonería</label>
                                                <input type="date" name="last_ch_brassiness[]" id="last_ch_brassiness" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_brassiness">Taller</label>
                                                <input type="text" name="last_ws_brassiness[]" id="last_ws_brassiness" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_brassiness">Valor</label>
                                                <input type="number" name="last_val_brassiness[]" id="last_val_brassiness" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_lights[]" id="last_ch_lights" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_lights">Taller</label>
                                                <input type="text" name="last_ws_lights[]" id="last_ws_lights" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_lights">Valor</label>
                                                <input type="number" name="last_val_lights[]" id="last_val_lights" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$lights)
                                    <div class="row" id="origen_lights">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_lights">Última revisión luces</label>
                                                <input type="date" name="last_ch_lights[]" id="last_ch_lights" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_lights">Taller</label>
                                                <input type="text" name="last_ws_lights[]" id="last_ws_lights" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_lights">Valor</label>
                                                <input type="number" name="last_val_lights[]" id="last_val_lights" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_gases[]" id="last_ch_gases" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_gases">Taller</label>
                                                <input type="text" name="last_ws_gases[]" id="last_ws_gases" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_gases">Valor</label>
                                                <input type="number" name="last_val_gases[]" id="last_val_gases" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$gases)
                                    <div class="row" id="origen_gases">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_gases">Última revisión gases</label>
                                                <input type="date" name="last_ch_gases[]" id="last_ch_gases" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_gases">Taller</label>
                                                <input type="text" name="last_ws_gases[]" id="last_ws_gases" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_gases">Valor</label>
                                                <input type="number" name="last_val_gases[]" id="last_val_gases" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_wistle[]" id="last_ch_wistle" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_wistle">Taller</label>
                                                <input type="text" name="last_ws_wistle[]" id="last_ws_wistle" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_wistle">Valor</label>
                                                <input type="number" name="last_val_wistle[]" id="last_val_wistle" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$wistle)
                                    <div class="row" id="origen_wistle">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_wistle">Última revisión pito</label>
                                                <input type="date" name="last_ch_wistle[]" id="last_ch_wistle" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_wistle">Taller</label>
                                                <input type="text" name="last_ws_wistle[]" id="last_ws_wistle" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_wistle">Valor</label>
                                                <input type="number" name="last_val_wistle[]" id="last_val_wistle" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_timing_belt[]" id="last_ch_timing_belt" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_timing_belt">Taller</label>
                                                <input type="text" name="last_ws_timing_belt[]" id="last_ws_timing_belt" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_timing_belt">Valor</label>
                                                <input type="number" name="last_val_timing_belt[]" id="last_val_timing_belt" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$timing_belt)
                                    <div class="row" id="origen_timing_belt">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_timing_belt">Cambio de correa de distribución</label>
                                                <input type="date" name="last_ch_timing_belt[]" id="last_ch_timing_belt" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_timing_belt">Taller</label>
                                                <input type="text" name="last_ws_timing_belt[]" id="last_ws_timing_belt" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_timing_belt">Valor</label>
                                                <input type="number" name="last_val_timing_belt[]" id="last_val_timing_belt" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_alignment_balancing[]" id="last_ch_alignment_balancing" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_alignment_balancing">Taller</label>
                                                <input type="text" name="last_ws_alignment_balancing[]" id="last_ws_alignment_balancing" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_alignment_balancing">Valor</label>
                                                <input type="number" name="last_val_alignment_balancing[]" id="last_val_alignment_balancing" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$alignment_balancing)
                                    <div class="row" id="origen_alignment_balancing">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_alignment_balancing">Última alineación y balanceo</label>
                                                <input type="date" name="last_ch_alignment_balancing[]" id="last_ch_alignment_balancing" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_alignment_balancing">Taller</label>
                                                <input type="text" name="last_ws_alignment_balancing[]" id="last_ws_alignment_balancing" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_alignment_balancing">Valor</label>
                                                <input type="number" name="last_val_alignment_balancing[]" id="last_val_alignment_balancing" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="last_ch_batteries[]" id="last_ch_batteries" class="form-control" value="{{$item->last_ch}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_batteries">Taller</label>
                                                <input type="text" name="last_ws_batteries[]" id="last_ws_batteries" class="form-control" value="{{$item->last_ws}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_batteries">Valor</label>
                                                <input type="number" name="last_val_batteries[]" id="last_val_batteries" class="form-control" value="{{$item->last_val}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$batteries)
                                    <div class="row" id="origen_batteries">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ch_batteries">Último cambio de batería</label>
                                                <input type="date" name="last_ch_batteries[]" id="last_ch_batteries" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_ws_batteries">Taller</label>
                                                <input type="text" name="last_ws_batteries[]" id="last_ws_batteries" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="last_val_batteries">Valor</label>
                                                <input type="number" name="last_val_batteries[]" id="last_val_batteries" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="date_summons_report[]" id="date_summons_report" class="form-control" value="{{$item->date}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_summons_report">Lugar</label>
                                                <input type="text" name="place_summons_report[]" id="place_summons_report" class="form-control" value="{{$item->place}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="area_summons_report">Area rural/urbana</label>
                                                <input type="text" name="area_summons_report[]" id="area_summons_report" class="form-control" value="{{$item->area}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$summons_report)
                                    <div class="row" id="origen_summons_report">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date_summons_report">Fecha</label>
                                                <input type="date" name="date_summons_report[]" id="date_summons_report" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_summons_report">Lugar</label>
                                                <input type="text" name="place_summons_report[]" id="place_summons_report" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="area_summons_report">Area rural/urbana</label>
                                                <input type="text" name="area_summons_report[]" id="area_summons_report" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="date_incident_report[]" id="date_incident_report" class="form-control" value="{{$item->date}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_incident_report">Lugar</label>
                                                <input type="text" name="place_incident_report[]" id="place_incident_report" class="form-control" value="{{$item->place}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="area_incident_report">Area rural/urbana</label>
                                                <input type="text" name="area_incident_report[]" id="area_incident_report" class="form-control" value="{{$item->area}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$incident_report)
                                    <div class="row" id="origen_incident_report">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date_incident_report">Fecha</label>
                                                <input type="date" class="form-control" name="date_incident_report[]" id="date_incident_report">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_incident_report">Lugar</label>
                                                <input type="text" class="form-control" name="place_incident_report[]" id="place_incident_report">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="area_incident_report">Area rural/urbana</label>
                                                <input type="text" class="form-control" name="area_incident_report[]" id="area_incident_report">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                @endif
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
                                                <input type="date" name="date_accident_report[]" id="date_accident_report" class="form-control" value="{{$item->date}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_accident_report">Lugar</label>
                                                <input type="text" name="place_accident_report[]" id="place_accident_report" class="form-control" value="{{$item->place}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="area_accident_report">Area rural/urbana</label>
                                                <input type="text" name="area_accident_report[]" id="area_accident_report" class="form-control" value="{{$item->area}}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <br>
                                            <i style="cursor: pointer" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                @if(!$accident_report)
                                    <div class="row" id="origen_accident_report">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date_accident_report">Fecha</label>
                                                <input type="date" class="form-control" name="date_accident_report[]" id="date_accident_report">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="place_accident_report">Lugar</label>
                                                <input type="text" class="form-control" name="place_accident_report[]" id="place_accident_report">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="area_accident_report">Area rural/urbana</label>
                                                <input type="text" class="form-control" name="area_accident_report[]" id="area_accident_report">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <br>
                                        <i style="cursor: pointer" class="fa fa-trash"></i>
                                    </div>
                                @endif
                        </div>
                        <button id="add_accident_report" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar reporte</button>
                        <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="preventive_plan">Plan de mantenimiento preventivo</label>
                                <input type="text" class="form-control" name="preventive_plan" id="preventive_plan" value="{{$id->preventive_plan}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_preventive_plan">Fecha</label>
                                <input type="date" class="form-control" name="date_preventive_plan" id="date_preventive_plan" value="{{$id->date_preventive_plan}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- <h3>Sistemas de seguridad activa</h3> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="active_safaty_system">Sistemas de seguridad activa</label>
                                <input type="text" class="form-control" name="active_safaty_system" id="active_safaty_system" value="{{$id->active_safaty_system}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- <h3>Sistemas de seguridad pasiva</h3> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="passive_safaty_system">Sistemas de seguridad pasiva</label>
                                <input type="text" class="form-control" name="passive_safaty_system" id="passive_safaty_system" value="{{$id->passive_safaty_system}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="observations">Observaciones: todo lo que aporte como historial o lecciones aprendidas del vehículo</label>
                        <textarea name="observations" id="observations" cols="30" rows="3" class="form-control">{{$id->observations}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="annual_cost">Costo anual del vehículo:</label>
                                <input type="text" class="form-control" name="annual_cost" id="annual_cost" value="{{$id->annual_cost}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="useful_life">Estado y porcentaje vida útil al final del periodo:</label>
                                <input type="text" class="form-control" name="useful_life" id="useful_life" value="{{$id->useful_life}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsible_process">Responsable del proceso:</label>
                                <input type="text" class="form-control" name="responsible_process" id="responsible_process" value="{{$id->responsible_process}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsible_address">Responsable de la dirección:</label>
                                <input type="text" class="form-control" name="responsible_address" id="responsible_address" value="{{$id->responsible_address}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="commentary">Comentarios de cierre que se deban tener presente para el próximo periodo:</label>
                        <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{$id->commentary}}</textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary btn-send">Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.files').change(function () {
                $($('#'+this.id).parent().children('label')[1]).addClass('text-aqua');
            });
            $('.btn-add').click(function (e) {
                e.preventDefault();
                let arr = this.id.split('_');
                let arr2 = arr.shift();
                let id = arr.join('_');
                newELement = $("#origen_"+id).clone().appendTo("#destino_"+id).attr('id','origen_'+id).find('input').val('').closest('.row').find('.fa-trash').click(function () {
                    deleteElement(this);
                });
            });
            $('.fa-trash').click(function () {
                deleteElement(this);
            });
            function deleteElement(element){
                if ( $(element).closest('.row').siblings('.row').length ) {
                    $(element).closest('.row').remove();
                }
            }
        });
    </script>
@endsection