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
            <li class="active">Editar</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Para de reloj</div>
                <div class="box-tools">
                    <a href="{{ route('mintic_maintenance', $id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="num">N° de caso</label>
                            <p>{{ $item->num }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <p>{{ $item->date }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="collaborating_company">Empresa colaboradora</label>
                            <p>{{ $item->collaborating_company }}</p>
                        </div>
                    </div>
                </div>

                <h3>Información general</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="department">Departamento</label>
                            <p>{{ $item->department }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="municpality">Municipio</label>
                            <p>{{ $item->municpality }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="population">Centro poblado</label>
                            <p>{{ $item->population }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Sede institución o caso especial</label>
                            <p>{{ $item->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="code">Id de beneficiario</label>
                            <p>{{ $item->code }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="num_contract">Número de contrato</small></label>
                            <p>{{ $item->num_contract }}</p>
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
                                    <p>{{ $item->cause_1_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_1_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_1_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuerza Mayor - Robo</td>
                                <td>
                                    <p>{{ $item->cause_2_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_2_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_2_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuerza Mayor - Terrorismo</td>
                                <td>
                                    <p>{{ $item->cause_3_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_3_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_3_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuerza Mayor - Orden Público</td>
                                <td>
                                    <p>{{ $item->cause_4_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_4_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_4_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuerza Mayor - Paros Cívicos</td>
                                <td>
                                    <p>{{ $item->cause_5_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_5_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_5_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuerza Mayor - Desastres</td>
                                <td>
                                    <p>{{ $item->cause_6_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_6_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_6_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuerza Mayor - Descargas Atmosfericas</td>
                                <td>
                                    <p>{{ $item->cause_7_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_7_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_7_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuerza Mayor - CD Energía Alternativa</td>
                                <td>
                                    <p>{{ $item->cause_8_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_8_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_8_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Fuerza Mayor - Ausencia de Suministros</td>
                                <td>
                                    <p>{{ $item->cause_9_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_9_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_9_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Caso Fortuito - Centro Digital Temporizado</td>
                                <td>
                                    <p>{{ $item->cause_10_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_10_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_10_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Caso Fortuito - Fibra Daños Animales y/o Humanos</td>
                                <td>
                                    <p>{{ $item->cause_11_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_11_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_11_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Caso Fortuito - Manipulación elementos por Terceros</td>
                                <td>
                                    <p>{{ $item->cause_12_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_12_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_12_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Atribuible Terceros - Falla Energia Electrica en CD</td>
                                <td>
                                    <p>{{ $item->cause_13_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_13_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_13_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Atribuible Terceros - Falla Infraestructura fisic</td>
                                <td>
                                    <p>{{ $item->cause_14_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_14_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_14_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Atribuible Terceros - Falla Energia Comercial Zona</td>
                                <td>
                                    <p>{{ $item->cause_15_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_15_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_15_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Atribuible Terceros - Imposibilidad acceso</td>
                                <td>
                                    <p>{{ $item->cause_16_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_16_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_16_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Atribuible Terceros - Imposibilidad accesos al CD</td>
                                <td>
                                    <p>{{ $item->cause_17_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_17_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_17_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Atribuible Terceros - Imposibilidad programa</td>
                                <td>
                                    <p>{{ $item->cause_18_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_18_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_18_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Continuidad Servicio - Trabajo Programado</td>
                                <td>
                                    <p>{{ $item->cause_19_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_19_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_19_num }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Continuidad servicio - Instalaciones no disponible</td>
                                <td>
                                    <p>{{ $item->cause_20_date_init }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_20_date_finilly }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->cause_20_num }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <label for="">Descripción de la parada de Reloj 1</label>
                    <p>{{ $item->description_1 }}</p>
                </div>
                <div class="form-group">
                    <label for="">Descripción de la parada de Reloj 2</label>
                    <p>{{ $item->description_2 }}</p>
                </div>
                <div class="form-group">
                    <label for="">Descripción de la parada de Reloj 3</label>
                    <p>{{ $item->description_3 }}</p>
                </div>
                <div class="form-group">
                    <label for="">Descripción de la parada de Reloj 4</label>
                    <p>{{ $item->description_4 }}</p>
                </div>

                <h4>Datos de quien reporta la parada de Reloj</h4>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="">Nombre y apellidos</label>
                            <p>{{ $item->responsable_name }}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label for="">Cargo</label>
                            <p>{{ $item->responsable_position }}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label for="">Número de cedula</label>
                            <p>{{ $item->responsable_document }}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label for="">Número de contacto</label>
                            <p>{{ $item->responsable_number }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="">Correo electrónico</label>
                            <p>{{ $item->responsable_email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="box-footer">
                <button class="btn btn-sm btn-primary">Guardar</button>
            </div> --}}
        </div>
    </section>
@endsection
