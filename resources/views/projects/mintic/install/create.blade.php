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
            <li><a href="#">Instalación</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                <div class="box-title">Crear acta de Instalación</div>
                <div class="box-tools">
                    <a href="{{ route('install', $id->id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{ route('mintic_installation_store', $id->id) }}" method="POST">
                @method('POST')
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="date" value="{{ old('date') }}" name="date" id="date"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="group_install">Grupo</label>
                                <input type="group_install" value="A" name="group_install" id="group_install"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>Información general</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department">Departamento</label>
                                <input type="text" name="department" id="department" value="{{ $id->dep }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="municpality">Municipio</label>
                                <input type="text" name="municpality" id="municpality" value="{{ $id->mun }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="population">Centro poblado</label>
                                <input type="text" name="population" id="population" value="{{ $id->population }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Sede institución o caso especial</label>
                                <input type="text" name="name" id="name" value="{{ $id->name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="long">Longitud</label>
                                <input type="text" name="long" id="long" value="{{ $id->long }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lat">Latitud</label>
                                <input type="text" name="lat" id="lat" value="{{ $id->lat }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Altitud</label>
                                <input type="text" name="height" id="height" value="{{ $id->height }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Id de beneficiario</label>
                                <input type="text" name="code" id="code" value="{{ $id->code }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dane_depa">Código Dane (Departamento)</label>
                                <input type="text" name="dane_depa" id="dane_depa"
                                    class="form-control" value="{{ old('dane_depa') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dane_muni">Código Dane (Municipio)</label>
                                <input type="text" name="dane_muni" id="dane_muni"
                                    class="form-control" value="{{ old("dane_muni") }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dane_centro">Código Dane (Centro Poblado)</label>
                                <input type="text" name="dane_centro" id="dane_centro"
                                    class="form-control" value="{{ old("dane_centro") }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dane_sede">Código Dane (Sede Educativa/Caso especial)</label>
                                <input type="text" name="dane_sede" id="dane_sede"
                                    class="form-control" value="{{ old("dane_sede") }}">
                            </div>
                        </div>
                        </div>
                        <h3>
                            Responsable de la institución
                                        educativa / autoridad competente
                        </h3>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_name">Nombre</label>
                                <input type="text" name="responsable_name" id="responsable_name"
                                    value="{{ $id->rector_name }}" class="form-control">
                                    <small></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_dni">Cédula</label>
                                <input type="text" name="responsable_dni" id="responsable_dni"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_number">Número de contacto</small></label>
                                <input type="text" name="responsable_number" id="responsable_number"
                                    value="{{ $id->rector_number }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_email">Correo electrónico</small></label>
                                <input type="email" value="{{ old('responsable_email') }}" name="responsable_email"
                                    id="responsable_email" class="form-control">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <hr>
                    <div class="prevent_block">
                        <h3>2. EQUIPOS INSTALADOS EN EL CENTRO DIGITAL</h3>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Descripción</b></h4>
                            </div>
                            <div class="col-md-3">
                                <h4><b>Marca</b></h4>
                            </div>
                            <div class="col-md-3">
                                <h4><b>Modelo</b></h4>
                            </div>
                            <div class="col-md-3">
                                <h4><b>Cantidad</b></h4>
                            </div>
                        </div>
                        <div id="destino_install">
                            <div class="row" id="origen_install">
                                @foreach ($equipments as $item)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="description[]" class="form-control" value="{{ $item->description }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="brand[]" class="form-control" value="{{ $item->brand }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="model[]" class="form-control" value="{{ $item->model }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="amount[]" class="form-control" value="{{ $item->amount }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="btn btn-sm btn-link btn-add" id="btn_add_install"><i class="fa fa-plus"></i> Agregar
                            equipo</button>
                        <hr>
                    </div>
                    <hr>
                    <h3>Obeservaciones</h3>
                    <div class="form-group">
                        <textarea value="{{ old('fault_description') }}" name="fault_description" id="fault_description" cols="30"
                            rows="3" class="form-control"></textarea>
                    </div>
                    <h3>Declaración</h3>
                    <hr>
                    <h4>Datos de quien repara el servicio en el centro digital</h4>
                    {{-- Datos de quien recibe el centro digital (rector, docente, autoridad competente) --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_id">Funcionario</label>
                                <select name="repair_id" id="repair_id" class="form-control">
                                    <option value="" disabled selected></option>
                                    @foreach ($users as $usuario)
                                        <option {{ old('repair_id') == $usuario->id ? 'selected' : '' }}
                                            value="{{ $usuario->id }}">{!! $usuario->cedula . '&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;' . $usuario->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_name">Nombres y apellidos</label>
                                <input type="text" value="{{ old('repair_name') }}" name="repair_name"
                                    id="repair_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_position">Cargo</label>
                                <input type="text" value="{{ old('repair_position') }}" name="repair_position"
                                    id="repair_position" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_cc">Número de cédula</label>
                                <input type="text" value="{{ old('repair_cc') }}" name="repair_cc"
                                    id="repair_cc" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_tel">Número de teléfono o celular</label>
                                <input type="text" value="{{ old('repair_tel') }}" name="repair_tel"
                                    id="repair_tel" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_mail">Correo electrónico</label>
                                <input type="text" value="{{ old('repair_mail') }}" name="repair_mail"
                                    id="repair_mail" class="form-control">
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

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/$theme/bower_components/select2/dist/css/select2.min.css") }}">
@endsection

@section('js')
    <script src="{{ asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
    <script src="{{ asset('js/project/mintic/maintence/create.js') }}"></script>
@endsection
