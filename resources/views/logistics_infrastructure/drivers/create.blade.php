@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        L-FR-18 CONTROL DE DOCUMENTACIÓN DE CONDUCTORES
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li class="active">Documentación de conductores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de controles de documentos de conductores</h3>
                <div class="box-tools">
                    <a href="{{route('drivers_create')}}" class="btn btn-sm btn-success">Crear</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row" id="div_user">
                    <div class="col-sm-4">
                        <label for="users_id">Número de documento</label>
                        <select name="user_id" id="users_id" class="form-control select_user">
                            <option value="" disabled selected></option>
                            @foreach ($users as $user)
                                <option {{ (old('cedula') == $user->id) ? 'selected' : '' }} value="{{$user->id}}">{!!$user->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$user->name!!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="user_name">Nombre completo funcionario</label>
                        <input type="text" readonly name="name" value="{{ old('name') }}" class="form-control user_name" id="user_name" placeholder="Nombre" >
                    </div>
                    <div class="col-sm-4">
                        <label for="user_rol">Rol autorizado</label>
                        <input type="text" readonly name="rol" value="{{ old('rol') }}" class="form-control user_rol" id="user_rol" placeholder="Rol">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Ciudad</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Categoría de licencia de conducción</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha de vigencia</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Inscripción ante el RUNT</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Inscripción ante el RUNT</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tipo de vehículo que conduce</label> <br>
                            <label for=""><input type="radio" name="" id=""> Moto</label>
                            <label for=""><input type="radio" name="" id=""> Carro</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Experiencia en conducción (años)</label>
                            <input type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Reporte de comparendos y fotomultas e histórico de los mismos</h4>
                <div class="fomr-group">
                    
                </div>
                <hr>
                <button class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Control de ingreso de conductores con deudas de comparendos y fotomultas</h4>
                <hr>
                <button class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Reporte de accidentes</h4>
                <hr>
                <button class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Acciones realizadas en seguridad vial</h4>
                <hr>
                <button class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Exámenes físicos, de alcohol y drogas psicoactiva</h4>
                <hr>
                <button class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Pruebas teóricas y prácticas realizadas</h4>
                <hr>
                <button class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar reporte</button>
                <hr>
                <h4>Capacitaciones recibidas</h4>
                <hr>
                <button class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar reporte</button>
            </div>
        </div>
    </section>
@endsection