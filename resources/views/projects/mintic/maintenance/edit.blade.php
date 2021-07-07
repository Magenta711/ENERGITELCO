@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Mantenimiento proyecto mintic <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li><a href="#">Mantenimiento</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>
    <section class="content">
        @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <div class="box-title">Editar mantenimiento</div>
                <div class="box-tools">
                    <a href="{{ route('mintic_maintenance', $id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{ route('mintic_maintenance_update', [$id, $item->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num">N° de caso</label>
                                <input type="text" value="{{ $item->num }}" name="num" id="num" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="date" value="{{ $item->date }}" name="date" id="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="collaborating_company">Empresa colaboradora</label>
                                <input type="text" value="{{ $item->collaborating_company }}" name="collaborating_company"
                                    id="collaborating_company" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>Información general</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department">Departamento</label>
                                <input type="text" name="department" id="department" value="{{ $item->department }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="municpality">Municipio</label>
                                <input type="text" name="municpality" id="municpality" value="{{ $item->municpality }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="population">Centro poblado</label>
                                <input type="text" name="population" id="population" value="{{ $item->population }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Sede institución o caso especial</label>
                                <input type="text" name="name" id="name" value="{{ $item->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Id de beneficiario</label>
                                <input type="text" name="code" id="code" value="{{ $item->code }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_name">Nombre del responsable <small>(Responsable de la institución
                                        educativa / autoridad competente)</small></label>
                                <input type="text" value="{{ $item->responsable_name }}" name="responsable_name"
                                    id="responsable_name" value="{{ $item->responsable_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_cc">Número de contacto</small></label>
                                <input type="text" value="{{ $item->responsable_cc }}" name="responsable_cc"
                                    id="responsable_cc" value="{{ $item->responsable_cc }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_number">Número de contacto</small></label>
                                <input type="text" value="{{ $item->responsable_number }}" name="responsable_number"
                                    id="responsable_number" value="{{ $item->responsable_number }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_email">Correo electrónico</small></label>
                                <input type="email" value="{{ $item->responsable_email }}" name="responsable_email" id="responsable_email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>2. Equipos instalados / retirados</h3>
                    <div class="table-responsable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>SAP</td>
                                    <td>Descripción</td>
                                    <td>Cantidad retirado</td>
                                    <td>Cantidad instalado</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equiments as $equiment)
                                    <tr>
                                        <td>{{ $equiment->sap }}</td>
                                        <td>{{ $equiment->name }}</td>
                                        <td><input readonly type="number" name="amount_retired[{{ $equiment->id }}]" value="0"
                                                class="form-control"></td>
                                        <td><input readonly type="number" name="amount_install[{{ $equiment->id }}]" value="0"
                                                class="form-control"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <h3>Serial equipo/s retirados e instalados</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Serial equipo/s retirados</label>
                                <input readonly type="text" name="serial_retired[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Serial equipo/s instalados</label>
                                <input readonly type="text" name="serial_install[]" class="form-control">
                            </div>
                            <button type="button" class="btn btn-sm btn-link">Agregar equipo</button>
                        </div>
                    </div>
                    <hr>
                    <h3>3. Descripción de la falla</h3>
                    <div class="form-group">
                        <textarea value="{{ $item->fault_description }}" name="fault_description" id="fault_description"
                            cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <h3>4. Declaración</h3>
                    <hr>
                    <h4>Datos de quien recibe el centro digital (rector, docente, autoridad competente)</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_name">Nombres y apellidos</label>
                                <input type="text" value="{{ $item->receives_name }}" name="receives_name"
                                    id="receives_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_position">Cargo</label>
                                <input type="text" value="{{ $item->receives_position }}" name="receives_position"
                                    id="receives_position" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_cc">Número de cedula</label>
                                <input type="text" value="{{ $item->receives_cc }}" name="receives_cc" id="receives_cc"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_tel">Número de teléfono o celular</label>
                                <input type="text" value="{{ $item->receives_tel }}" name="receives_tel" id="receives_tel"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_mail">Correo electrónico</label>
                                <input type="text" value="{{ $item->receives_mail }}" name="receives_mail"
                                    id="receives_mail" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h4>Datos de quien repara el servicio en el centro digital</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_name">Nombres y apellidos</label>
                                <input type="text" value="{{ $item->repair_name }}" name="repair_name" id="repair_name"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_position">Cargo</label>
                                <input type="text" value="{{ $item->repair_position }}" name="repair_position"
                                    id="repair_position" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_cc">Número de cedula</label>
                                <input type="text" value="{{ $item->repair_cc }}" name="repair_cc" id="repair_cc"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_tel">Número de teléfono o celular</label>
                                <input type="text" value="{{ $item->repair_tel }}" name="repair_tel" id="repair_tel"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_mail">Correo electrónico</label>
                                <input type="text" value="{{ $item->repair_mail }}" name="repair_mail" id="repair_mail"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('js/project/mintic/water_marker/tss.js') }}"></script>
@endsection
