@php
function checkedActivity($idActivity, $activities)
{
    foreach ($activities as $key => $value) {
        if ($value->activity_id == $idActivity) {
            return $value->status;
        }
    }
    return 'NO';
}

@endphp

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
                                <label for="type_format">Tipo de formato</label>
                                @if (count($item->files) > 0)
                                    <input type="text" name="type_format" id="type_format" class="form-control" readonly
                                        value="{{ $item->type_format }}">
                                @else
                                    <select name="type_format" id="type_format" class="form-control">
                                        <option selected disabled></option>
                                        <option {{ $item->type_format == 'Mantenimiento correctivo' ? 'selected' : '' }}
                                            value="Mantenimiento correctivo">Mantenimiento correctivo</option>
                                        <option {{ $item->type_format == 'Mantenimiento preventivo' ? 'selected' : '' }}
                                            value="Mantenimiento preventivo">Mantenimiento preventivo</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num">N° de caso</label>
                                <input type="text" value="{{ $item->num }}" name="num" id="num"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="date" value="{{ $item->date }}" name="date" id="date"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="collaborating_company">Empresa colaboradora</label>
                                <input type="text" value="{{ $item->collaborating_company }}"
                                    name="collaborating_company" id="collaborating_company" class="form-control">
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
                                <input type="text" name="name" id="name" value="{{ $item->name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Id de beneficiario</label>
                                <input type="text" name="code" id="code" value="{{ $item->code }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_name">Nombre del responsable <small>(Responsable de la institución
                                        educativa / autoridad competente)</small></label>
                                <input type="text" value="{{ $item->responsable_name }}" name="responsable_name"
                                    id="responsable_name" class="form-control">
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
                                    id="responsable_number" value="{{ $item->responsable_number }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_email">Correo electrónico</small></label>
                                <input type="email" value="{{ $item->responsable_email }}" name="responsable_email"
                                    id="responsable_email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="prevent_block"
                        style="{{ $item->type_format == 'Mantenimiento correctivo' ? 'display: none' : '' }}">
                        <h3>Actividades de mantenimiento preventivo</h3>
                        <div class="table-responsable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>SAP</td>
                                        <td>Descripción</td>
                                        <td>SI</td>
                                        <td>NO</td>
                                        <td>N/A</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        @php
                                            $checkedActivity = checkedActivity($activity->id, $item->activities);
                                        @endphp
                                        <tr>
                                            <td>{!! $activity->type == 1 ? '<b>' : '' !!}{{ $activity->sap }}{!! $activity->type == 1 ? '</b>' : '' !!}</td>
                                            <td>{!! $activity->type == 1 ? '<b>' : '' !!}{{ $activity->description }}{!! $activity->type == 1 ? '</b>' : '' !!}
                                            </td>
                                            <td><input type="radio" name="activity_status[{{ $activity->id }}]"
                                                    {{ $checkedActivity == 'SI' ? 'checked' : '' }} value="SI"></td>
                                            <td><input type="radio" name="activity_status[{{ $activity->id }}]"
                                                    {{ $checkedActivity == 'NO' ? 'checked' : '' }} value="NO"></td>
                                            <td><input type="radio" name="activity_status[{{ $activity->id }}]"
                                                    {{ $checkedActivity == 'N/A' ? 'checked' : '' }} value="N/A"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                    <h3>Serial equipo/s retirados e instalados</h3>
                    <div id="destino_retired">
                        @php
                            $retired = false;
                        @endphp
                        @foreach ($item->equipments as $equipment_item)
                            @if ($equipment_item->type == 'retired')
                                @php
                                    $retired = true;
                                @endphp
                                <div class="row" id="origen_retired">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="serial_retired">Serial equipo/s retirados</label>
                                            <input type="text" name="serial_retired[]" id="serial_retired"
                                                class="form-control" value="{{ $equipment_item->serial }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="detail_retired">Detalle</label>
                                            <select name="detail_retired[]" id="detail_retired"
                                                class="form-control select2 select2-hidden-accessible"
                                                data-placeholder="Selecciona la referencia del equipo"
                                                style="width: 100%;" data-select2-id="2" tabindex="-1"
                                                aria-hidden="true">
                                                <option disabled selected></option>
                                                @foreach ($equipments as $equipment)
                                                    <option
                                                        {{ $equipment_item->detail_id == $equipment->id ? 'selected' : '' }}
                                                        value="{{ $equipment->id }}">{{ $equipment->sap }} -
                                                        {{ $equipment->name }} - {{ $equipment->model_id }} -
                                                        {{ $equipment->part_id }} - {{ $equipment->brand }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @if (!$retired)
                            <div class="row" id="origen_retired">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="serial_retired">Serial equipo/s instalados</label>
                                        <input type="text" name="serial_retired[]" id="serial_retired"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="detail_retired">Detalle</label>
                                        <select name="detail_retired[]" id="detail_retired"
                                            class="form-control select2 select2-hidden-accessible"
                                            data-placeholder="Selecciona la referencia del equipo" style="width: 100%;"
                                            data-select2-id="2" tabindex="-1" aria-hidden="true">
                                            <option disabled selected></option>
                                            @foreach ($equipments as $equipment)
                                                <option {{ old('detail_retired') == $equipment->id ? 'selected' : '' }}
                                                    value="{{ $equipment->id }}">{{ $equipment->sap }} -
                                                    {{ $equipment->name }} - {{ $equipment->model_id }} -
                                                    {{ $equipment->part_id }} - {{ $equipment->brand }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-sm btn-link btn-add" id="btn_add_retired"><i class="fa fa-plus"></i> Agregar
                        equipo</button>
                    <hr>
                    <div id="destino_install">
                        @php
                            $install = false;
                        @endphp
                        @foreach ($item->equipments as $equipment_item)
                            @if ($equipment_item->type == 'install')
                                @php
                                    $install = true;
                                @endphp
                                <div class="row" id="origen_install">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="serial_install">Serial equipo/s instalados</label>
                                            <input type="text" name="serial_install[]" class="form-control"
                                                value="{{ $equipment_item->serial }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="detail_install">Detalle</label>
                                            <select name="detail_install[]" id="detail_install"
                                                class="form-control select2 select2-hidden-accessible"
                                                data-placeholder="Selecciona la referencia del equipo"
                                                style="width: 100%;" data-select2-id="2" tabindex="-1"
                                                aria-hidden="true">
                                                <option disabled selected></option>
                                                @foreach ($equipments as $equipment)
                                                    <option
                                                        {{ $equipment_item->detail_id == $equipment->id ? 'selected' : '' }}
                                                        value="{{ $equipment->id }}">{{ $equipment->sap }} -
                                                        {{ $equipment->name }} - {{ $equipment->model_id }} -
                                                        {{ $equipment->part_id }} - {{ $equipment->brand }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @if (!$install)
                            <div class="row" id="origen_install">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="serial_install">Serial equipo/s instalados</label>
                                        <input type="text" name="serial_install[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="detail_install">Detalle</label>
                                        <select name="detail_install[]" id="detail_install"
                                            class="form-control select2 select2-hidden-accessible"
                                            data-placeholder="Selecciona la referencia del equipo" style="width: 100%;"
                                            data-select2-id="2" tabindex="-1" aria-hidden="true">
                                            <option disabled selected></option>
                                            @foreach ($equipments as $equipment)
                                                <option {{ old('detail_install') == $equipment->id ? 'selected' : '' }}
                                                    value="{{ $equipment->id }}">{{ $equipment->sap }} -
                                                    {{ $equipment->name }} - {{ $equipment->model_id }} -
                                                    {{ $equipment->part_id }} - {{ $equipment->brand }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-sm btn-link btn-add" id="btn_add_install"><i class="fa fa-plus"></i> Agregar
                        equipo</button>
                    <hr>
                    <h3>Descripción de la falla</h3>
                    <div class="form-group">
                        <textarea name="fault_description" id="fault_description" cols="30" rows="3" class="form-control">{{ $item->fault_description }}</textarea>
                    </div>
                    <h3>Declaración</h3>
                    <hr>
                    <h4>Datos de quien repara el servicio en el centro digital</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_id">Funcionario</label>
                                <select name="receives_id" id="receives_id" class="form-control">
                                    <option value="" disabled selected></option>
                                    @foreach ($users as $usuario)
                                        <option {{ $item->receives_id == $usuario->id ? 'selected' : '' }}
                                            value="{{ $usuario->id }}">{!! $usuario->cedula . '&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;' . $usuario->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                                <input type="text" value="{{ $item->receives_cc }}" name="receives_cc"
                                    id="receives_cc" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_tel">Número de teléfono o celular</label>
                                <input type="text" value="{{ $item->receives_tel }}" name="receives_tel"
                                    id="receives_tel" class="form-control">
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
                    <h4>Datos del ingeniero de soporte NOC</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_name">Nombres y apellidos</label>
                                <input type="text" value="{{ $item->repair_name }}" name="repair_name"
                                    id="repair_name" class="form-control">
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
                                <label for="ticket">Ticket, Si aplica</label>
                                <input type="text" value="{{ $item->ticket }}" name="ticket" id="ticket"
                                    class="form-control">
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
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
                        </div> --}}
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
