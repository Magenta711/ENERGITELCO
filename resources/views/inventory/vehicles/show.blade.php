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
                                    <label for="gasess">Certificado de gasess</label>
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
                                    <label for="technomechanicals">Tecno mecánica</label>
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
                            </div>
                        <hr>
                        <div class="form-group">
                            <label for="observations">Observaciones y comentarios</label>
                            <p>{{$id->observations}}</p>
                        </div>
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
        });
    </script>
@endsection