@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear nuevo proyecto <small>Gestión de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Proyectos</a></li>
        <li class="active">Crear proyectos</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="hide">
            @foreach ($users as $user)
                <input type="hidden" disabled value="{{$user->name}}" id="name_{{$user->id}}">
                <input type="hidden" disabled value="{{$user->position->name}}" id="position_{{$user->id}}">
            @endforeach
        </div>
        <div class="box-header">
            <div class="box-title">Crear proyecto</div>
            <div class="box-tools">
                <a href="{{route('routes')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('routes_store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <h4>Información de claro</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="id_orden">Id Orden</label>
                            <input type="text" name="id_orden" value="{{old('id_orden')}}" id="id_orden" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ot">OT</label>
                            <input type="text" name="ot" value="{{old('ot')}}" id="ot" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="project_name">Nombre del proyecto</label>
                            <input type="text" name="project_name" value="{{old('project_name')}}" id="project_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lat">Latitud</label>
                            <input type="text" id="lat" name="lat" value="{{ old('lat') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="long">Longitud</label>
                            <input type="text" id="long" name="long" value="{{ old('long') }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="height">Altitud</label>
                            <input type="text" id="height" name="height" value="{{ old('height') }}" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Técnicos GI que realiza la actividad</h4>
                <div id="destino_user">
                    <div id="origen_user">
                        <div class="row" id="div_user_0">
                            <div class="col-md-3">
                                <label for="users_id_0">Número de documento</label>
                                <select name="users_id[]" id="users_id_0" class="form-control select_user">
                                    <option value="" disabled selected>Seleccione el técnico</option>
                                    @foreach ($users as $user)
                                        <option {{ (old('cedula[0]') == $user->id) ? 'selected' : '' }} value="{{$user->id}}">{!!$user->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$user->name!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="user_name_0">Nombre completo funcionario</label>
                                <input type="text" disabled name="user_name[]" value="{{ old('user_name[0]') }}" class="form-control user_name" id="user_name_0" placeholder="Nombre" >
                            </div>
                            <div class="col-md-4">
                                <label for="user_rol_0">Rol autorizado</label>
                                <input type="text" disabled name="rol_user[]" value="{{ old('roles_user[0]') }}" class="form-control user_rol" id="user_rol_0" placeholder="Rol">
                            </div>
                            <div class="col-md-1 text-right">
                                <br>
                                <span style="cursor: pointer" id="remove_user_0" class="remove_user">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" id="clonar_user" class="btn btn-sm btn-link">
                    <i class="fa fa-plus"></i> Agregar usuario
                </button>
                <hr>
                <h4>Datos generales</h4>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="order_description">Descripción de la orden</label>
                            <input type="text" name="order_description" id="order_description" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="aliado_gdrt">Aliado GDRT: Escalamiento N1</label>
                            <input type="text" name="aliado_gdrt" value="{{ old('aliado_gdrt') }}" id="aliado_gdrt" class="form-control">
                            <label for="tel_aliado_gdrt">Teléfono de contacto</label>
                            <input type="tel" name="tel_aliado_gdrt" value="{{ old('tel_aliado_gdrt') }}" id="tel_aliado_gdrt" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="solicitante_gdrt">Solicitante GDRT: Escalamiento N2</label>
                            <input type="text" name="solicitante_gdrt" value="{{ old('solicitante_gdrt') }}" id="solicitante_gdrt" class="form-control">
                            <label for="tel_solicitante_gdrt">Teléfono de contacto</label>
                            <input type="tel" name="tel_solicitante_gdrt" value="{{ old('tel_solicitante_gdrt') }}" id="tel_solicitante_gdrt" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="solicitante_gi">Solicitante GI</label>
                            <input type="text" name="solicitante_gi" value="{{old('solicitante_gi')}}" id="solicitante_gi" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Criticidad</label><br>
                    <label for="alta">
                        <input type="radio" name="critical" {{old('critical') == 'Alta' ? 'checked' : ''}} value="Alta" class="input-radio" id="alta">
                        Alta
                    </label>
                    <label for="media">
                        <input type="radio" name="critical" {{old('critical') == 'Media' ? 'checked' : ''}} value="Media" class="input-radio" id="media">
                        Media
                    </label>
                    <label for="baja">
                        <input type="radio" name="critical" {{old('critical') == 'Baja' ? 'checked' : ''}} value="Baja" class="input-radio" id="baja">
                        Baja
                    </label>
                </div>
                <div class="form-group">
                    <label for="observation">Observaciones</label>
                    <textarea name="observation" id="observation" cols="30" rows="3" class="form-control">{{old('observation')}}</textarea>
                </div>
                <hr>
                <h3>Orden ejecutada GI</h3>
                <h4>Servicio</h4>
                <div id="destino_sv">
                    <div id="origen_sv">
                        <h5 class="num_sv">Servicio 1</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name_service_0">Nombre</label>
                                    <input type="text" name="name_service[]" id="name_service_0" class="form-control" placeholder="Nombre del servicio">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bsc_rnc_0">BSC/RNC</label>
                                    <input type="text" name="bsc_rnc[]" id="bsc_rnc_0" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="et_wbts_0">ET/WBTS ID</label>
                                    <input type="text" name="et_wbts[]" id="et_wbts_0" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tecnology_0">Tecnología <small>2G/3G/4G</small></label>
                                    <input type="text" name="tecnology[]" id="tecnology_0" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="box box-solid">
                            <div class="box-body clearfix">
                                <div class="destino" id="destino_eb_0">
                                    <div class="origen" id="origen_eb_0">
                                        <blockquote class="num_eb_sv_0" id="div_eb_sv_0_0" style="font-size: unset">
                                            <h5 class="num_bs">Estación Base # 1</h5>
                                            <div class="form-group">
                                                <label for="name_eb_0_0">Nombre de la estación base</label>
                                                <input type="text" name="name_eb[]" id="name_eb_0_0" class="form-control">
                                            </div>
                                            <h6>Equipos de Tx Origen</h6>
                                            <input type="hidden" name="type[]" value="tx origen">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nemonico_0_0">Nemónico</label>
                                                        <input type="text" name="nemonico[]" id="nemonico_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="reference_0_0">Referencia</label>
                                                        <input type="text" name="reference[]" id="reference_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="slot_0_0">Slot</label>
                                                        <input type="text" name="slot[]" id="slot_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="port_0_0">Puerto</label>
                                                        <input type="text" name="port[]" id="port_0_0" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h6>Equipos de Tx Destino</h6>
                                            <input type="hidden" name="type[]" value="tx destino">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nemonico_0_0">Nemónico</label>
                                                        <input type="text" name="nemonico[]" id="nemonico_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="reference_0_0">Referencia</label>
                                                        <input type="text" name="reference[]" id="reference_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="slot_0_0">Slot</label>
                                                        <input type="text" name="slot[]" id="slot_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="port_0_0">Puerto</label>
                                                        <input type="text" name="port[]" id="port_0_0" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h6>Equipo de Tx Nuevo (Migración)</h6>
                                            <input type="hidden" name="type[]" value="tx nuevo">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nemonico_0_0">Nemónico</label>
                                                        <input type="text" name="nemonico[]" id="nemonico_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="reference_0_0">Referencia</label>
                                                        <input type="text" name="reference[]" id="reference_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="slot_0_0">Slot</label>
                                                        <input type="text" name="slot[]" id="slot_0_0" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="port_0_0">Puerto</label>
                                                        <input type="text" name="port[]" id="port_0_0" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row files">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="file_material_0_0">Foto material a utilizar</label>
                                                        <label for="file_material_0_0" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                                        <input type="file" accept="image/*" name="file_material[]" id="file_material_0_0" class="hide photos">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="file_equipment_room_0_0">Foto cuarto de equipos</label>
                                                        <label for="file_equipment_room_0_0" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                                        <input type="file" accept="image/*" name="file_equipment_room[]" id="file_equipment_room_0_0" class="hide photos">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="file_cabling_0_0">Foto cableado realizado</label>
                                                        <label for="file_cabling_0_0" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                                        <input type="file" accept="image/*" name="file_cabling[]" id="file_cabling_0_0" class="hide photos">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="file_inventory_before_0_0">Foto equipos a invertir antes</label>
                                                        <label for="file_inventory_before_0_0" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                                        <input type="file" accept="image/*" name="file_inventory_before[]" id="file_inventory_before_0_0" class="hide photos">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="file_inventory_then_0_0">Foto equipos a invertir después</label>
                                                        <label for="file_inventory_then_0_0" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                                        <input type="file" accept="image/*" name="file_inventory_then[]" id="file_inventory_then_0_0" class="hide photos">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="file_marcked_0_0">Foto marquillado general</label>
                                                        <label for="file_marcked_0_0" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                                        <input type="file" accept="image/*" name="file_marcked[]" id="file_marcked_0_0" class="hide photos">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label for="chs_observation_0_0">CHG's y/o observaciones</label>
                                                        <textarea name="chs_observation[]" id="chs_observation_0_0" cols="30" rows="3" class="form-control">{{old('chs_observation')}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="require_window_0_0">Requiere ventana</label><br>
                                                        <select name="require_window[]" id="require_window_0_0" class="form-control">
                                                            <option value="Si" selected>Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="text-right">
                                                        <span id="remove_eb_0_0" class="remove_eb" style="cursor: pointer"><i class="fa fa-trash"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="button" id="clonar_eb_0" class="btn btn-sm btn-link btn-clonar_eb"><i class="fa fa-plus"></i> Agregar estación</button>
                                <input type="hidden" name="num_stations[]" id="num_stations_0" value="1">
                            </div>
                        </div>
                        <h4>Canal</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="throughput_0">Throughput</label>
                                    <input type="text" name="throughput[]" value="{{old('throughput[0]')}}" id="throughput_0" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="latency_0">Latency</label>
                                    <input type="text" name="latency[]" value="{{old('latency[0]')}}" id="latency_0" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mtu_0">MTU</label>
                                    <input type="text" name="mtu[]" value="{{old('mtu[0]')}}" id="mtu_0" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <button type="button" id="clonar_sv" class="btn btn-sm btn-link "><i class="fa fa-plus"></i> Agregar servicio</button>
                <hr>
                <div class="form-group">
                    <label for="commentary">Comentarios</label>
                    <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                </div>
            </div>
            <div class="box-footer">
                <button id="send" class="btn btn-sm btn-primary btn-send" name="send" value="Firmar">Enviar y firmar</button>
                <button id="send" class="btn btn-sm btn-success btn-send" name="send" value="Guardar">Guardar</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/project/routes/create.js') }}" defer></script>
@endsection
