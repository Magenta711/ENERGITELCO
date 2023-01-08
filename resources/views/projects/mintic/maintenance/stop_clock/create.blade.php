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
            <li><a href="#">Parada de reloj</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Para de reloj</div>
                <div class="box-tools">
                    <a href="{{ route('mintic_maintenance', $id->id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{ route('mintic_clock_stop_store', $id->id) }}" method="POST">
                @method('POST')
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num">N° de caso</label>
                                <input type="text" value="{{ old('num') }}" name="num" id="num"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="date" value="{{ old('date') }}" name="date" id="date"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="collaborating_company">Empresa colaboradora</label>
                                <input type="text"
                                    value="{{ old('collaborating_company') ? old('collaborating_company') : 'ENERGITELCO' }}"
                                    name="collaborating_company" id="collaborating_company" class="form-control">
                            </div>
                        </div>
                    </div>

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
                                <label for="code">Id de beneficiario</label>
                                <input type="text" name="code" id="code" value="{{ $id->code }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="num_contract">Número de contrato</small></label>
                                <input type="text" name="num_contract" id="num_contract"
                                    value="{{ old() ? old() : '1042 de 2020' }}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Fecha y hora inicial</th>
                                    <th>Fecha y hora final</th>
                                    <th>Número de paradas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Fuerza Mayor - Vandalismo</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_1_date_init"
                                            value="{{ old('cause_1_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_1_date_finilly"
                                            value="{{ old('cause_1_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_1_num"
                                            value="{{ old('cause_1_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Robo</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_2_date_init"
                                            value="{{ old('cause_2_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_2_date_finilly"
                                            value="{{ old('cause_2_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_2_num"
                                            value="{{ old('cause_2_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Terrorismo</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_3_date_init"
                                            value="{{ old('cause_3_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_3_date_finilly"
                                            value="{{ old('cause_3_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_3_num"
                                            value="{{ old('cause_3_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Orden Público</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_4_date_init"
                                            value="{{ old('cause_4_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_4_date_finilly"
                                            value="{{ old('cause_4_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_4_num"
                                            value="{{ old('cause_4_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Paros Cívicos</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_5_date_init"
                                            value="{{ old('cause_5_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_5_date_finilly"
                                            value="{{ old('cause_5_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_5_num"
                                            value="{{ old('cause_5_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Desastres</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_6_date_init"
                                            value="{{ old('cause_6_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_6_date_finilly"
                                            value="{{ old('cause_6_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_6_num"
                                            value="{{ old('cause_6_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Descargas Atmosfericas</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_7_date_init"
                                            value="{{ old('cause_7_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_7_date_finilly"
                                            value="{{ old('cause_7_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_7_num"
                                            value="{{ old('cause_7_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - CD Energía Alternativa</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_8_date_init"
                                            value="{{ old('cause_8_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_8_date_finilly"
                                            value="{{ old('cause_8_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_8_num"
                                            value="{{ old('cause_8_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Ausencia de Suministros</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_9_date_init"
                                            value="{{ old('cause_9_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_9_date_finilly"
                                            value="{{ old('cause_9_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_9_num"
                                            value="{{ old('cause_9_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Caso Fortuito - Centro Digital Temporizado</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_10_date_init"
                                            value="{{ old('cause_10_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_10_date_finilly"
                                            value="{{ old('cause_10_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_10_num"
                                            value="{{ old('cause_10_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Caso Fortuito - Fibra Daños Animales y/o Humanos</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_11_date_init"
                                            value="{{ old('cause_11_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_11_date_finilly"
                                            value="{{ old('cause_11_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_11_num"
                                            value="{{ old('cause_11_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Caso Fortuito - Manipulación elementos por Terceros</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_12_date_init"
                                            value="{{ old('cause_12_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_12_date_finilly"
                                            value="{{ old('cause_12_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_12_num"
                                            value="{{ old('cause_12_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Falla Energia Electrica en CD</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_13_date_init"
                                            value="{{ old('cause_13_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_13_date_finilly"
                                            value="{{ old('cause_13_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_13_num"
                                            value="{{ old('cause_13_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Falla Infraestructura fisic</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_14_date_init"
                                            value="{{ old('cause_14_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_14_date_finilly"
                                            value="{{ old('cause_14_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_14_num"
                                            value="{{ old('cause_14_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Falla Energia Comercial Zona</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_15_date_init"
                                            value="{{ old('cause_15_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_15_date_finilly"
                                            value="{{ old('cause_15_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_15_num"
                                            value="{{ old('cause_15_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Imposibilidad acceso</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_16_date_init"
                                            value="{{ old('cause_16_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_16_date_finilly"
                                            value="{{ old('cause_16_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_16_num"
                                            value="{{ old('cause_16_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Imposibilidad accesos al CD</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_17_date_init"
                                            value="{{ old('cause_17_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_17_date_finilly"
                                            value="{{ old('cause_17_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_17_num"
                                            value="{{ old('cause_17_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Imposibilidad programa</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_18_date_init"
                                            value="{{ old('cause_18_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_18_date_finilly"
                                            value="{{ old('cause_18_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_18_num"
                                            value="{{ old('cause_18_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Continuidad Servicio - Trabajo Programado</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_19_date_init"
                                            value="{{ old('cause_19_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_19_date_finilly"
                                            value="{{ old('cause_19_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_19_num"
                                            value="{{ old('cause_19_num') }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Continuidad servicio - Instalaciones no disponible</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_20_date_init"
                                            value="{{ old('cause_20_date_init') }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_20_date_finilly"
                                            value="{{ old('cause_20_date_finilly') }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_20_num"
                                            value="{{ old('cause_20_num') }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label for="description_1">Descripción de la parada de Reloj 1</label>
                        <textarea id="description_1" cols="30" rows="3" class="form-control" name="description_1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_2">Descripción de la parada de Reloj 2</label>
                        <textarea id="description_2" cols="30" rows="3" class="form-control" name="description_2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_3">Descripción de la parada de Reloj 3</label>
                        <textarea id="description_3" cols="30" rows="3" class="form-control" name="description_3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_4">Descripción de la parada de Reloj 4</label>
                        <textarea id="description_4" cols="30" rows="3" class="form-control" name="description_4"></textarea>
                    </div>

                    <h4>Datos de quien reporta la parada de Reloj</h4>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="responsable_name">Nombre y apellidos</label>
                                <input id="responsable_name" type="text" class="form-control" name="responsable_name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="form-group">
                                <label for="responsable_position">Cargo</label>
                                <input id="responsable_position" type="text" class="form-control"
                                    name="responsable_position"
                                    value="{{ ucwords(strtolower(Auth::user()->position->name)) }}">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="form-group">
                                <label for="responsable_document">Número de cedula</label>
                                <input id="responsable_document" type="text" name="responsable_document"
                                    class="form-control" value="{{ Auth::user()->cedula }}">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="form-group">
                                <label for="responsable_number">Número de contacto</label>
                                <input id="responsable_number" type="text" name="responsable_number"
                                    class="form-control" value="{{ Auth::user()->telefono }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="responsable_email">Correo electrónico</label>
                                <input id="responsable_email" type="text" name="responsable_email"
                                    class="form-control" value="{{ Auth::user()->email }}">
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
