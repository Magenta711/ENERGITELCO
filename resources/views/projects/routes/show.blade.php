@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Ver proyecto de rutas <small>Gestión de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Proyectos</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Rutas</a></li>
        <li class="active">Ver proyectos</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Ver proyecto</div>
            <div class="box-tools">
                <a href="{{route('routes')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <h4>Información de claro</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_orden">Id Orden</label>
                        <p>{{$id->id_orden}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ot">OT</label>
                        <p>{{$id->ot}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="project_name">Nombre del proyecto</label>
                        <p>{{$id->project_name}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lat">Latitud</label>
                        <p>{{ $id->lat }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="long">Longitud</label>
                        <p>{{ $id->long }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="height">Altitud</label>
                        <p>{{ $id->height }}</p>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Técnicos GI que realizanla actividad</h4>
            @foreach ($id->users as $item)
                <div class="row">
                    <div class="col-md-3">
                        <label for="users_id_0">Número de documento</label>
                        <p>{{ $item->cedula }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="user_name_0">Nombre completo funcionario</label>
                        <p>{{ $item->name }}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="user_rol_0">Rol autorizado</label>
                        <p>{{$item->position->name}}</p>
                    </div>
                </div>
            @endforeach
            <hr>
            <h4>Datos generales</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="order_description">Descripción de la orden</label>
                        <p>{{$id->order_description}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="aliado_gdrt">Aliado GDRT:Escalamiento N1</label>
                        <p>{{ $id->aliado_gdrt }}</p>
                        <label for="tel_aliado_gdrt">Telefono de contacto</label>
                        <p>{{ $id->tel_aliado_gdrt }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="solicitante_gdrt">Solicitante GDRT:Escalamiento N2</label>
                        <p>{{ $id->solicitante_gdrt }}</p>
                        <label for="tel_solicitante_gdrt">Telefono de contacto</label>
                        <p>{{ $id->tel_solicitante_gdrt }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="solicitante_gi">Solicitante GI</label>
                        <p>{{$id->solicitante_gi}}</p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Criticidad</label><br>
                <p>{{$id->critical}}</p>
            </div>
            <div class="form-group">
                <label for="observation">Observaciones</label>
                <p>{!! str_replace("\n", '</br>', addslashes($id->observation)) !!}</p>
            </div>
            <hr>
            <h3>Orden ejecutada GI</h3>
            <h4>Servicio</h4>
            @foreach ($id->services as $service)
                <div id="destino_sv">
                    <div id="origen_sv">
                        <h5 class="num_sv">Servicio {{$service->num + 1}}</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name_service_0">Nombre</label>
                                    <p>{{$service->name_service}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bsc_rnc_0">BSC/RNC</label>
                                    <p>{{$service->bsc_rnc}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="et_wbts_0">ET/WBTS ID</label>
                                    <p>{{$service->et_wbts}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tecnology_0">Tecnologia <small>2G/3G/4G</small></label>
                                    <p>{{$service->tecnology}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="box box-solid">
                            <div class="box-body clearfix">
                                @foreach ($service->base_stations as $station)
                                    <div class="destino" id="destino_eb_0">
                                        <div class="origen" id="origen_eb_0">
                                            <blockquote class="num_eb_sv_0" id="div_eb_sv_0_0" style="font-size: unset">
                                                <h5 class="num_bs">Estación Base # {{$station->num + 1}}</h5>
                                                <div class="form-group">
                                                    <label for="name_eb_0_0">Nombre de la estación base</label>
                                                    <p>{{$station->name_eb}}</p>
                                                </div>
                                                <h6>Equipos de Tx Origen</h6>
                                                @foreach ($station->types as $type)
                                                    @if ($type->type == 'tx origen')
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="nemonico_0_0">Nemonico</label>
                                                                    <p>{{$type->nemonico}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="reference_0_0">Referencia</label>
                                                                    <p>{{$type->reference}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="slot_0_0">Slot</label>
                                                                    <p>{{$type->slot}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="port_0_0">Puerto</label>
                                                                    <p>{{$type->port}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif    
                                                @endforeach
                                                <hr>
                                                <h6>Equipos de Tx Destino</h6>
                                                @foreach ($station->types as $type)
                                                    @if ($type->type == 'tx destino')
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="nemonico_0_0">Nemonico</label>
                                                                    <p>{{$type->nemonico}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="reference_0_0">Referencia</label>
                                                                    <p>{{$type->reference}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="slot_0_0">Slot</label>
                                                                    <p>{{$type->slot}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="port_0_0">Puerto</label>
                                                                    <p>{{$type->port}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif    
                                                @endforeach
                                                <hr>
                                                <h6>Equipo de Tx Nuevo (Migración)</h6>
                                                <input type="hidden" name="type[]" value="">
                                                @foreach ($station->types as $type)
                                                    @if ($type->type == 'tx nuevo')
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="nemonico_0_0">Nemonico</label>
                                                                    <p>{{$type->nemonico}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="reference_0_0">Referencia</label>
                                                                    <p>{{$type->reference}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="slot_0_0">Slot</label>
                                                                    <p>{{$type->slot}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="port_0_0">Puerto</label>
                                                                    <p>{{$type->port}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif    
                                                @endforeach
                                                <hr>
                                                <div class="row files">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="file_material_0_0">Foto material a utilizar</label>
                                                            <img src="/storage/upload/routes/{{$station->file_material}}" alt="{{$station->file_material}}" width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="file_equipment_room_0_0">Foto cuarto de equipos</label>
                                                            <img src="/storage/upload/routes/{{$station->file_equipment_room}}" alt="{{$station->file_equipment_room}}" width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="file_cabling_0_0">Foto cableado realizado</label>
                                                            <img src="/storage/upload/routes/{{$station->file_cabling}}" alt="{{$station->file_cabling}}" width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="file_inventory_before_0_0">Foto equipos a invertir antes</label>
                                                            <img src="/storage/upload/routes/{{$station->file_inventory_before}}" alt="{{$station->file_inventory_before}}" width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="file_inventory_then_0_0">Foto equipos a invertir despues</label>
                                                            <img src="/storage/upload/routes/{{$station->file_inventory_then}}" alt="{{$station->file_inventory_then}}" width="100%">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="file_marcked_0_0">Foto marquillado general</label>
                                                            <img src="/storage/upload/routes/{{$station->file_marcked}}" alt="{{$station->file_marcked}}" width="100%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <label for="chs_observation_0_0">CHG's y/o observaciones</label>
                                                            <p>{{$station->chs_observation}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="require_window_0_0">Requiere ventana</label><br>
                                                            <p>{{$station->require_window}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </blockquote>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <h4>Canal</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="throughput_0">Throughput</label>
                                    <p>{{$service->throughput}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="latency_0">Latency</label>
                                    <p>{{$service->latency}}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mtu_0">MTU</label>
                                    <p>{{$service->mtu}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            @endforeach
            <hr>
            <div class="form-group">
                <label for="commentary">Comentarios</label>
                <p>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
            </div>
        </div>
        @if ($id->status == 3)
            <div class="box-footer">
                <button class="btn btn-sm btn-primary btn-send" onclick="aprobar()">Aprobar y firmar</button>
                <button class="btn btn-sm btn-danger btn-send" onclick="no_aprobar()">No aprobar</button>
            </div>
            <form id="form_approval" action="{{ route('routes_approval',$id->id) }}" method="POST" style="form_dis;">
                @csrf
                @method('PUT')
                {{-- <textarea name="observaciones_jefe" id="observaciones_jefe_2" class="hide" cols="30" rows="3">{{old('observaciones_jefe')}}</textarea> --}}
            </form>
            <form id="form_no_approval" action="{{ route('routes_not_approval',$id->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
                {{-- <textarea name="observaciones_jefe" id="observaciones_jefe_2" class="hide" cols="30" rows="3">{{old('observaciones_jefe')}}</textarea> --}}
            </form>
        @endif
    </div>
</section>

@endsection

@section('js')
    <script>
        function aprobar(e) {
            // e.preventDefault();
            // document.getElementById('observaciones_jefe_2').value=document.getElementById('observaciones_jefe').value;
            document.getElementById('form_approval').submit();
        }
        function no_aprobar(e) {
            //  e.preventDefault();
            // document.getElementById('observaciones_jefe_2').value=document.getElementById('observaciones_jefe').value;
            document.getElementById('form_no_approval').submit();
        }
    </script>
@endsection