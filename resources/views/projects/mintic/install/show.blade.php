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
                <div class="box-title">Acta de Instalación</div>
                <div class="box-tools">
                    <a href="{{ route('install', $id->id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                    <p>{{ $item->date }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="group_install">Grupo</label>
                                <p>{{ $item->group_install }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>Información general</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department">Departamento</label>
                                <p>{{ $id->dep }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="municpality">Municipio</label>
                                   <p> {{ $id->mun }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="population">Centro poblado</label>
                                <p>{{ $id->population }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Sede institución o caso especial</label>
                                <p>{{ $id->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="long">Longitud</label>
                                <p>{{ $id->long }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lat">Latitud</label>
                                <p>{{ $id->lat }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Altitud</label>
                                <p>{{ $id->height }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Id de beneficiario</label>
                                <p>{{ $id->code }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dane_depa">Código Dane (Departamento)</label>
                                <p>{{ $item->dane_depa }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dane_muni">Código Dane (Municipio)</label>
                                <p>{{ $item->dane_muni }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dane_centro">Código Dane (Centro Poblado)</label>
                                <p>{{ $item->dane_centro }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dane_sede">Código Dane (Sede Educativa/Caso especial)</label>
                                <p>{{ $item->dane_sede }}</p>
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
                                <p>{{ $item->responsable_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_dni">Cédula</label>
                                <p>{{ $item->responsable_dni }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_number">Número de contacto</small></label>
                                <p>{{ $id->responsable_number }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_email">Correo electrónico</small></label>
                                <p>{{ $item->responsable_email }}</p>
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
                                @foreach ($item->equipments as $item)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <p>{{ $item->brand }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <p>{{ $item->model }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <p>{{ $item->amount }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h3>Obeservaciones</h3>
                        <p>{{ $item->fault_description }}</p>
                    </div>
                    <hr>
                    <h3>Declaración</h3>
                    <h4>Datos de quien repara el servicio en el centro digital</h4>
                    {{-- Datos de quien recibe el centro digital (rector, docente, autoridad competente) --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_name">Nombres y apellidos</label>
                                <p>{{ $item->repair_name }}</p>{{ $item->repair_name }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_position">Cargo</label>
                                <p>{{ $item->repair_position }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_cc">Número de cédula</label>
                                <p>{{ $item->repair_cc }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_tel">Número de teléfono o celular</label>
                                <p>{{ $item->repair_tel }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_mail">Correo electrónico</label>
                                <p>{{ $item->repair_mail }}</p>
                            </div>
                        </div>
                    </div>
                </div>
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
