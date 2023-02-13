@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Parada de reloj proyecto mintic <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li><a href="#">Mantenimiento</a></li>
            <li><a href="#">Parada de reloj</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Para de reloj</div>
                <div class="box-tools">
                    <a href="{{ route('mintic_clock_stop', $id->id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{ route('mintic_clock_stop_update', [$id->id, $item->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <p><small>Todo campo con <span class="text-danger">*</span> es <b>obligatorio.</b></small></p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num"><span class="text-danger">*</span> N° de caso</label>
                                <input type="text" name="num" value="{{ $item->num }}" id="num"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date"><span class="text-danger">*</span> Fecha</label>
                                <input type="date" name="date" value="{{ $item->date }}" id="date"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="collaborating_company"><span class="text-danger">*</span> Empresa
                                    colaboradora</label>
                                <input type="text" name="collaborating_company"
                                    value="{{ $item->collaborating_company }}" id="collaborating_company"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <h3>Información general</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department">Departamento</label>
                                <input type="text" readonly name="department" id="department" value="{{ $id->dep }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="municpality">Municipio</label>
                                <input type="text" readonly name="municpality" id="municpality"
                                    value="{{ $id->mun }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="population">Centro poblado</label>
                                <input type="text" readonly name="population" id="population"
                                    value="{{ $id->population }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Sede institución o caso especial</label>
                                <input type="text" readonly name="name" id="name" value="{{ $id->name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Id de beneficiario</label>
                                <input type="text" readonly name="code" id="code" value="{{ $id->code }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="num_contract">Número de contrato</small></label>
                                <input type="text" name="num_contract" id="num_contract"
                                    value="{{ $item->num_contract }}" class="form-control">
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
                                            value="{{ $item->cause_1_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_1_date_finilly"
                                            value="{{ $item->cause_1_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_1_num"
                                            value="{{ $item->cause_1_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Robo</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_2_date_init"
                                            value="{{ $item->cause_2_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_2_date_finilly"
                                            value="{{ $item->cause_2_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_2_num"
                                            value="{{ $item->cause_2_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Terrorismo</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_3_date_init"
                                            value="{{ $item->cause_3_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_3_date_finilly"
                                            value="{{ $item->cause_3_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_3_num"
                                            value="{{ $item->cause_3_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Orden Público</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_4_date_init"
                                            value="{{ $item->cause_4_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_4_date_finilly"
                                            value="{{ $item->cause_4_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_4_num"
                                            value="{{ $item->cause_4_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Paros Cívicos</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_5_date_init"
                                            value="{{ $item->cause_5_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_5_date_finilly"
                                            value="{{ $item->cause_5_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_5_num"
                                            value="{{ $item->cause_5_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Desastres</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_6_date_init"
                                            value="{{ $item->cause_6_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_6_date_finilly"
                                            value="{{ $item->cause_6_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_6_num"
                                            value="{{ $item->cause_6_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Descargas Atmosfericas</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_7_date_init"
                                            value="{{ $item->cause_7_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_7_date_finilly"
                                            value="{{ $item->cause_7_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_7_num"
                                            value="{{ $item->cause_7_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - CD Energía Alternativa</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_8_date_init"
                                            value="{{ $item->cause_8_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_8_date_finilly"
                                            value="{{ $item->cause_8_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_8_num"
                                            value="{{ $item->cause_8_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fuerza Mayor - Ausencia de Suministros</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_9_date_init"
                                            value="{{ $item->cause_9_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_9_date_finilly"
                                            value="{{ $item->cause_9_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_9_num"
                                            value="{{ $item->cause_9_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Caso Fortuito - Centro Digital Temporizado</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_10_date_init"
                                            value="{{ $item->cause_10_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_10_date_finilly"
                                            value="{{ $item->cause_10_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_10_num"
                                            value="{{ $item->cause_10_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Caso Fortuito - Fibra Daños Animales y/o Humanos</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_11_date_init"
                                            value="{{ $item->cause_11_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_11_date_finilly"
                                            value="{{ $item->cause_11_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_11_num"
                                            value="{{ $item->cause_11_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Caso Fortuito - Manipulación elementos por Terceros</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_12_date_init"
                                            value="{{ $item->cause_12_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_12_date_finilly"
                                            value="{{ $item->cause_12_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_12_num"
                                            value="{{ $item->cause_12_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Falla Energia Electrica en CD</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_13_date_init"
                                            value="{{ $item->cause_13_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_13_date_finilly"
                                            value="{{ $item->cause_13_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_13_num"
                                            value="{{ $item->cause_13_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Falla Infraestructura fisic</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_14_date_init"
                                            value="{{ $item->cause_14_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_14_date_finilly"
                                            value="{{ $item->cause_14_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_14_num"
                                            value="{{ $item->cause_14_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Falla Energia Comercial Zona</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_15_date_init"
                                            value="{{ $item->cause_15_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_15_date_finilly"
                                            value="{{ $item->cause_15_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_15_num"
                                            value="{{ $item->cause_15_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Imposibilidad acceso</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_16_date_init"
                                            value="{{ $item->cause_16_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_16_date_finilly"
                                            value="{{ $item->cause_16_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_16_num"
                                            value="{{ $item->cause_16_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Imposibilidad accesos al CD</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_17_date_init"
                                            value="{{ $item->cause_17_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_17_date_finilly"
                                            value="{{ $item->cause_17_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_17_num"
                                            value="{{ $item->cause_17_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atribuible Terceros - Imposibilidad programa</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_18_date_init"
                                            value="{{ $item->cause_18_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_18_date_finilly"
                                            value="{{ $item->cause_18_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_18_num"
                                            value="{{ $item->cause_18_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Continuidad Servicio - Trabajo Programado</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_19_date_init"
                                            value="{{ $item->cause_19_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_19_date_finilly"
                                            value="{{ $item->cause_19_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_19_num"
                                            value="{{ $item->cause_19_num }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Continuidad servicio - Instalaciones no disponible</td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_20_date_init"
                                            value="{{ $item->cause_20_date_init }}">
                                    </td>
                                    <td>
                                        <input type="datetime-local" class="form-control" name="cause_20_date_finilly"
                                            value="{{ $item->cause_20_date_finilly }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cause_20_num"
                                            value="{{ $item->cause_20_num }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label for="description_1">Descripción de la parada de Reloj 1</label>
                        <textarea id="description_1" cols="30" rows="3" class="form-control" name="description_1">{{ $item->description_1 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_2">Descripción de la parada de Reloj 2</label>
                        <textarea id="description_2" cols="30" rows="3" class="form-control" name="description_2">{{ $item->description_2 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_3">Descripción de la parada de Reloj 3</label>
                        <textarea id="description_3" cols="30" rows="3" class="form-control" name="description_3">{{ $item->description_3 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_4">Descripción de la parada de Reloj 4</label>
                        <textarea id="description_4" cols="30" rows="3" class="form-control" name="description_4">{{ $item->description_4 }}</textarea>
                    </div>

                    <h4>Datos de quien reporta la parada de Reloj</h4>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="responsable_name"><span class="text-danger">*</span> Nombre y
                                    apellidos</label>
                                <input type="text" id="responsable_name" name="responsable_name" class="form-control"
                                    value="{{ $item->responsable_name }}">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="form-group">
                                <label for="responsable_position"><span class="text-danger">*</span> Cargo</label>
                                <input type="text" id="responsable_position" name="responsable_position"
                                    class="form-control" value="{{ $item->responsable_position }}">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="form-group">
                                <label for="responsable_document"><span class="text-danger">*</span> Número de
                                    cedula</label>
                                <input type="text" id="responsable_document" name="responsable_document"
                                    class="form-control" value="{{ $item->responsable_document }}">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="form-group">
                                <label for="responsable_number"><span class="text-danger">*</span> Número de
                                    contacto</label>
                                <input type="text" id="responsable_number" name="responsable_number"
                                    class="form-control" value="{{ $item->responsable_number }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="responsable_email"><span class="text-danger">*</span> Correo
                                    electrónico</label>
                                <input type="text" id="responsable_email" name="responsable_email"
                                    class="form-control" value="{{ $item->responsable_email }}">
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