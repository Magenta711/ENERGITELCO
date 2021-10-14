@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Crear vehículos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Vehículos</a></li>
        <li class="active">Crear vehículos</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Crear registro domentación y mantenimiento de vehículos</h3>
                    <div class="box-tools">
                        <a href="{{route('inv_vehicle')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <form action="{{ route('inv_vehicle_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- /.box-header -->
                    <div class="box-body">
                        <small>Todos los campos con <span class="text-red">*</span> son obligatorios</small>
                        <div class="form-group">
                            <h4>Datos generales del vehículo</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="plate">Placa *</label>
                                    <input type="text" class="form-control" id="plate" name="plate" value="{{ old('plate') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="avatar">Foto</label>
                                    <label for="avatars" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" accept="image/*" class="hide files" id="avatars" name="avatars" value="{{ old('avatars') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="num_enrollment">Número de matricula *</label>
                                    <input type="text" class="form-control" id="num_enrollment" name="num_enrollment" value="{{ old('num_enrollment') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="start_date">Fecha matricula *</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="brand">Marca *</label>
                                    <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="line">Línea *</label>
                                    <input type="text" class="form-control" id="line" name="line" value="{{ old('line') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="model">Modelo *</label>
                                    <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="cc">Cilindrada CC *</label>
                                    <input type="text" class="form-control" id="cc" name="cc" value="{{ old('cc') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="color">Color *</label>
                                    <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="type">Tipo vehículo</label>
                                    <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="body_type">Tipo carrocería *</label>
                                    <input type="text" class="form-control" id="body_type" name="body_type" value="{{ old('body_type') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="fuel">Combustible *</label>
                                    <input type="text" class="form-control" id="fuel" name="fuel" value="{{ old('fuel') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="capacity">Capacidad por personas *</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="exp_date">Fecha de expedición *</label>
                                    <input type="date" class="form-control" id="exp_date" name="exp_date" value="{{ old('exp_date') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="toll_ship">¿Tiene ship de peaje? *</label>
                                    <input type="text" class="form-control" id="toll_ship" name="toll_ship" value="{{ old('toll_ship') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="tires">Número de llantas *</label>
                                    <input type="text" class="form-control" id="tires" name="tires" value="{{ old('tires') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="spare_tire">¿Tiene llanta de repuesto? *</label>
                                    <input type="text" class="form-control" id="spare_tire" name="spare_tire" value="{{ old('spare_tire') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Propietario</label>
                                    <input type="text" name="propetary" id="propetary" value="{{old('propetary')}}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="num_vin">Número de motor</label>
                                    <input type="text" name="num_motor" id="num_motor" value="{{old('num_motor')}}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="num_vin">Número de VIN</label>
                                    <input type="text" name="num_vin" id="num_vin" value="{{old('num_vin')}}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_extinguisher">Fecha vencimiento de extintor</label>
                                    <input type="date" class="form-control" id="date_extinguisher" name="date_extinguisher" value="{{ old('date_extinguisher') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_cross_piece">Fecha cruceta, gato, palanca, llanta de respuesto</label>
                                    <input type="date" class="form-control" id="date_cross_piece" name="date_cross_piece" value="{{ old('date_cross_piece') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_tacos">Fecha banderillas, tacos, linterna, chaleco</label>
                                    <input type="date" class="form-control" id="date_tacos" name="date_tacos" value="{{ old('date_tacos') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="status">Estado</label>
                                    <select name="status" id="status" class="form-control">
                                        <option selected disabled></option>
                                        <option {{(old('status') == 1) ? 'selected' : ''}} value="1">Buen estado</option>
                                        <option {{(old('status') == 2) ? 'selected' : ''}} value="2">Pendientes</option>
                                        <option {{(old('status') == 3) ? 'selected' : ''}} value="3">Mal estado</option>
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
                                    <label for="enrollments">Matricula *</label>
                                    <label for="enrollments" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="enrollments" name="enrollments" value="{{ old('enrollments') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="enrollment_date">Fecha de vencimiento matricula</label>
                                    <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" value="{{ old('enrollment_date') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="soats">SOAT *</label>
                                    <label for="soats" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="soats" name="soats" value="{{ old('soats') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="soat_date">Fecha de vencimiento SOAT *</label>
                                    <input type="date" class="form-control" id="soat_date" name="soat_date" value="{{ old('soat_date') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="gasess">Certificado de gases</label>
                                    <label for="gasess" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="gasess" name="gasess" value="{{ old('gasess') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="gases_date">Fecha de vencimiento gases</label>
                                    <input type="date" class="form-control" id="gases_date" name="gases_date" value="{{ old('gases_date') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="technomechanicals">Tecno mecánica *</label>
                                    <label for="technomechanicals" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="technomechanicals" name="technomechanicals" value="{{ old('technomechanicals') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="technomechanical_date">Fecha de vencimiento tecno mecánica *</label>
                                    <input type="date" class="form-control" id="technomechanical_date" name="technomechanical_date" value="{{ old('technomechanical_date') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_aid_kits">Botiquín con elementos de ley</label>
                                    <label for="first_aid_kits" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="first_aid_kits" name="first_aid_kits" value="{{ old('first_aid_kits') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="first_aid_kit_date">Fecha de vencimiento botiquín</label>
                                    <input type="date" class="form-control" id="first_aid_kit_date" name="first_aid_kit_date" value="{{ old('first_aid_kit_date') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="liability_insurances">Seguro de responsabilidad civil</label>
                                    <label for="liability_insurances" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="liability_insurances" name="liability_insurances" value="{{ old('liability_insurances') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="liability_insurance_date">Fecha de vencimiento seguro de responsabilidad civil</label>
                                    <input type="date" class="form-control" id="liability_insurance_date" name="liability_insurance_date" value="{{ old('liability_insurance_date') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="policys">Póliza de transporte</label>
                                    <label for="policys" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="policys" name="policys" value="{{ old('policys') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="policy_date">Fecha de vencimiento de póliza de transporte</label>
                                    <input type="date" class="form-control" id="policy_date" name="policy_date" value="{{ old('policy_date') }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>Mantenimiento preventivo</h3>
                        <hr>
                        <div id="destino_oillast">
                            <div class="row" id="origen_oillast">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_ch_oillast">Último cambio de aceite</label>
                                        <input type="date" name="last_ch_oil[]" id="last_ch_oillast" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_ws_oil">Taller</label>
                                        <input type="text" name="last_ws_oil[]" id="last_ws_oil" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_oil">Valor</label>
                                        <input type="number" name="last_val_oil[]" id="last_val_oil" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_oillast" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_tires">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_tires">Valor</label>
                                        <input type="number" name="last_val_tires[]" id="last_val_tires" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_tires" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_lubrication">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_lubrication">Valor</label>
                                        <input type="number" name="last_val_lubrication[]" id="last_val_lubrication" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_lubrication" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_address">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_address">Valor</label>
                                        <input type="number" name="last_val_address[]" id="last_val_address" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_address" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_motor">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_motor">Valor</label>
                                        <input type="number" name="last_val_motor[]" id="last_val_motor" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_motor" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_clutch">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_clutch">Valor</label>
                                        <input type="number" name="last_val_clutch[]" id="last_val_clutch" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_clutch" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_suspension">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_suspension">Valor</label>
                                        <input type="number" name="last_val_suspension[]" id="last_val_suspension" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_suspension" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_brakes_bands">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_brakes_bands">Valor</label>
                                        <input type="number" name="last_val_brakes_bands[]" id="last_val_brakes_bands" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_brakes_bands" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_brakes_pastes">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_brakes_pastes">Valor</label>
                                        <input type="number" name="last_val_brakes_pastes[]" id="last_val_brakes_pastes" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_brakes_pastes" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_brake_pump">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_brake_pump">Valor</label>
                                        <input type="number" name="last_val_brake_pump[]" id="last_val_brake_pump" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_brake_pump" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_box_transmission">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_box_transmission">Valor</label>
                                        <input type="number" name="last_val_box_transmission[]" id="last_val_box_transmission" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_box_transmission" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_brassiness">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_brassiness">Valor</label>
                                        <input type="number" name="last_val_brassiness[]" id="last_val_brassiness" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_brassiness" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_lights">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_lights">Valor</label>
                                        <input type="number" name="last_val_lights[]" id="last_val_lights" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_lights" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_gases">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_gases">Valor</label>
                                        <input type="number" name="last_val_gases[]" id="last_val_gases" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_gases" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_wistle">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_wistle">Valor</label>
                                        <input type="number" name="last_val_wistle[]" id="last_val_wistle" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_wistle" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_timing_belt">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_timing_belt">Valor</label>
                                        <input type="number" name="last_val_timing_belt[]" id="last_val_timing_belt" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_timing_belt" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_alignment_balancing">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_alignment_balancing">Valor</label>
                                        <input type="number" name="last_val_alignment_balancing[]" id="last_val_alignment_balancing"}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_alignment_balancing" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <div id="destino_batteries">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_val_batteries">Valor</label>
                                        <input type="number" name="last_val_batteries[]" id="last_val_batteries" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_batteries" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar fecha</button>
                        <hr>
                        <h3>Reporte de comparendos</h3>
                        <div id="destino_summons_report">
                            <div class="row" id="origen_summons_report">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_summons_report">Fecha</label>
                                        <input type="date" class="form-control" name="date_summons_report[]" id="date_summons_report" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="place_summons_report">Lugar</label>
                                        <input type="text" class="form-control" name="place_summons_report[]" id="place_summons_report" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="area_summons_report">Area rural/urbana</label>
                                        <input type="text" class="form-control" name="area_summons_report[]" id="area_summons_report" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_summons_report" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar reporte</button>
                        <hr>
                        <h3>Reporte de incidentes</h3>
                        <div id="destino_incident_report">
                            <div class="row" id="origen_incident_report">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_incident_report">Fecha</label>
                                        <input type="date" class="form-control" name="date_incident_report[]" id="date_incident_report" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="place_incident_report">Lugar</label>
                                        <input type="text" class="form-control" name="place_incident_report[]" id="place_incident_report" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="area_incident_report">Area rural/urbana</label>
                                        <input type="text" class="form-control" name="area_incident_report[]" id="area_incident_report" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_incident_report" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar reporte</button>
                        <hr>
                        <h3>Reporte de accidentes</h3>
                        <div id="destino_accident_report">
                            <div class="row" id="origen_accident_report">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_accident_report">Fecha</label>
                                        <input type="date" class="form-control" name="date_accident_report[]" id="date_accident_report" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="place_accident_report">Lugar</label>
                                        <input type="text" class="form-control" name="place_accident_report[]" id="place_accident_report" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="area_accident_report">Area rural/urbana</label>
                                        <input type="text" class="form-control" name="area_accident_report[]" id="area_accident_report" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add_accident_report" class="btn btn-sm btn-link btn-add"><i class="fa fa-plus"></i> Agregar reporte</button>
                        <hr>
                        {{-- <h3>Plan de mantenimiento preventivo – fechas</h3> --}}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="preventive_plan">Plan de mantenimiento preventivo</label>
                                    <textarea name="preventive_plan" id="preventive_plan" cols="30" rows="2" class="form-control">{{old('preventive_plan')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_preventive_plan">Fecha</label>
                                    <input type="date" class="form-control" name="date_preventive_plan" id="date_preventive_plan" value="{{old('active_safaty_system')}}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- <h3>Sistemas de seguridad activa</h3> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="active_safaty_system">Sistemas de seguridad activa</label>
                                    <textarea name="active_safaty_system" id="active_safaty_system" cols="30" rows="2" class="form-control">{{old('active_safaty_system')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- <h3>Sistemas de seguridad pasiva</h3> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="passive_safaty_system">Sistemas de seguridad pasiva</label>
                                    <textarea name="passive_safaty_system" id="passive_safaty_system" cols="30" rows="2" class="form-control">{{old('passive_safaty_system')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="observations">Observaciones: todo lo que aporte como historial o lecciones aprendidas del vehículo</label>
                            <textarea name="observations" id="observations" cols="30" rows="3" class="form-control">{{old('observations')}}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="annual_cost">Costo anual del vehículo:</label>
                                    <input type="text" class="form-control" name="annual_cost" id="annual_cost" value="{{old('annual_cost')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="useful_life">Estado y porcentaje vida útil al final del periodo:</label>
                                    <input type="text" class="form-control" name="useful_life" id="useful_life" value="{{old('useful_life')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="responsible_process">Responsable del proceso:</label>
                                    <input type="text" class="form-control" name="responsible_process" id="responsible_process" value="{{old('responsible_process')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="responsible_address">Responsable de la dirección:</label>
                                    <input type="text" class="form-control" name="responsible_address" id="responsible_address" value="{{old('responsible_address')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="commentary">Comentarios de cierre que se deban tener presente para el próximo periodo:</label>
                            <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-sm btn-primary btn-send">Guardar</button>
                    </div>
                </form>
            </div>
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
                newELement = $("#origen_"+id).clone().appendTo("#destino_"+id).attr('id','origen_'+id).find('input').val('');
            });
        });
    </script>
@endsection