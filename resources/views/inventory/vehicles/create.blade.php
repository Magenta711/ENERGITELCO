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
                    <h3 class="box-title">Crear vehículos</h3>
                    <div class="box-tools">
                        <a href="{{route('inv_vehicle')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <form action="{{ route('inv_vehicle_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="plate">Placa</label>
                                    <input type="text" class="form-control" id="plate" name="plate" value="{{ old('plate') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="avatar">Foto</label>
                                    <label for="avatars" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" accept="image/*" class="hide files" id="avatars" name="avatars" value="{{ old('avatars') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="num_enrollment">Numero de matricula</label>
                                    <input type="text" class="form-control" id="num_enrollment" name="num_enrollment" value="{{ old('num_enrollment') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="start_date">Fecha matricula</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="brand">Marca</label>
                                    <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="line">Línea</label>
                                    <input type="text" class="form-control" id="line" name="line" value="{{ old('line') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="model">Modelo</label>
                                    <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="cc">Cilindrada CC</label>
                                    <input type="text" class="form-control" id="cc" name="cc" value="{{ old('cc') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="type">Tipo vehículo</label>
                                    <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="body_type">Tipo carrocería</label>
                                    <input type="text" class="form-control" id="body_type" name="body_type" value="{{ old('body_type') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="fuel">Combustible</label>
                                    <input type="text" class="form-control" id="fuel" name="fuel" value="{{ old('fuel') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="capacity">Capacidad por personas</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="exp_date">Fecha de expedición</label>
                                    <input type="date" class="form-control" id="exp_date" name="exp_date" value="{{ old('exp_date') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="toll_ship">¿Tiene ship de peaje?</label>
                                    <input type="text" class="form-control" id="toll_ship" name="toll_ship" value="{{ old('toll_ship') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="tires">Numero de llantas</label>
                                    <input type="text" class="form-control" id="tires" name="tires" value="{{ old('tires') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="spare_tire">¿Tiene llanta de repuesto?</label>
                                    <input type="text" class="form-control" id="spare_tire" name="spare_tire" value="{{ old('spare_tire') }}">
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
                                    <label for="enrollments">Matricula</label>
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
                                    <label for="soats">SOAT</label>
                                    <label for="soats" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="soats" name="soats" value="{{ old('soats') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="soat_date">Fecha de vencimiento SOAT</label>
                                    <input type="date" class="form-control" id="soat_date" name="soat_date" value="{{ old('soat_date') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="gasess">Certificado de gasess</label>
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
                                    <label for="technomechanicals">Tecno mecánica</label>
                                    <label for="technomechanicals" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="technomechanicals" name="technomechanicals" value="{{ old('technomechanicals') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="technomechanical_date">Fecha de vencimiento tecno mecánica</label>
                                    <input type="date" class="form-control" id="technomechanical_date" name="technomechanical_date" value="{{ old('technomechanical_date') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_aid_kits">Botiquín</label>
                                    <label for="first_aid_kits" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" class="hide files" id="first_aid_kits" name="first_aid_kits" value="{{ old('first_aid_kits') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="first_aid_kit_date">Fecha de vencimiento botiquín</label>
                                    <input type="date" class="form-control" id="first_aid_kit_date" name="first_aid_kit_date" value="{{ old('first_aid_kit_date') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="observations">Observaciones y comentarios</label>
                            <textarea name="observations" id="observations" cols="30" rows="3" class="form-control">{{old('observations')}}</textarea>
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
        });
    </script>
@endsection