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
                                <label for="num_enrollment">Numero de matricula</label>
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
                                <label for="tires">Numero de llantas</label>
                                <input type="text" class="form-control" id="tires" name="tires" value="{{ $id->tires }}">
                            </div>
                            <div class="col-md-6">
                                <label for="spare_tire">¿Tiene llanta de repuesto?</label>
                                <input type="text" class="form-control" id="spare_tire" name="spare_tire" value="{{ $id->spare_tire }}">
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
                                <label for="gasess">Certificado de gasess</label>
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
                    </div>
                    <div class="form-group">
                        <label for="observations">Observaciones y comentarios</label>
                        <textarea name="observations" id="observations" cols="30" rows="3" class="form-control">{{$id->observations}}</textarea>
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
        });
    </script>
@endsection