@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Ver proyecto mintic <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">Ver</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title"> proyecto MINTIC</div>
            <div class="box-tools">
                <a href="{{route('mintic')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="code">Id benefiicario</label>
                    <p>{{ $id->code }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="name">Nombre sede educativa</label>
                    <p>{{ $id->name }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="dep">Departamento</label>
                    <p>{{ $id->dep }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="mun">Municipio</label>
                    <p>{{ $id->mun }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="population">Centro de población</label>
                    <p>{{ $id->population }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="person_name">Nombre quien atiende la visita</label>
                    <p>{{ $id->person_name }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="person_number">Telefono quien atiende la visita</label>
                    <p>{{ $id->person_number }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="lat">Latitud</label>
                    <p>{{ $id->lat }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="long">Longitud</label>
                    <p>{{ $id->long }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="height">Altitud</label>
                    <p>{{ $id->height }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="rector_name">Nombre del rector</label>
                    <p>{{ $id->rector_name }}</p>
                </div>
                <div class="form-group col-sm-6">
                    <label for="rector_number">Numero del rector</label>
                    <p>{{ $id->rector_number }}</p>
                </div>
                <div class="form-group col-sm-12">
                    <label for="observation">Observaciones</label>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->observation)) !!}</p>
                </div>
            </div>
            <hr>
            @php
                $i = 1;
            @endphp
            <h4>Estudio de campo</h4>
            <div id="destino_ec">
                @php
                    $ec = false;
                @endphp
                @foreach ($id->visits as $item)
                    @if ($item->type == "ec")
                        @php
                            $ec = true;
                        @endphp
                        <div class="row" id="origen_ec">
                            <div class="form-group col-sm-6">
                                <label for="date">Fecha visita</label>
                                <p>{{$item->date}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time">Hora visita</label>
                                <p>{{$item->time}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id_ec">Técnico asignado</label>
                                <p>{{$item->technical ? $item->technical->name : ''}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary">Comentarios</label>
                                <p>{{$item->commentary}}</p>
                            </div>
                            <hr>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr>
            <h4>Instalación</h4>
            <div id="destino_install">
                @php
                    $install = false;
                @endphp
                @foreach ($id->visits as $item)
                    @if ($item->type == "install")
                        @php
                            $install = true;
                        @endphp
                        <div class="row" id="origen_install">
                            <div class="form-group col-sm-6">
                                <label for="date_install">Fecha visita</label>
                                <p>{{$item->date}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_install">Hora visita</label>
                                <p>{{$item->time}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id_install">Técnico asignado</label>
                                <p>{{$item->technical ? $item->technical->name : ''}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary_install">Comentarios</label>
                                <p>{{$item->commentary}}</p>
                            </div>
                            <hr>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr>
            <h4>Integración y/o entrega</h4>
            <div id="destino_integration">
                @php
                    $integration = false;
                @endphp
                @foreach ($id->visits as $item)
                    @if ($item->type == "integration")
                        @php
                            $integration = true;
                        @endphp
                        <div class="row" id="origen_integration">
                            <div class="form-group col-sm-6">
                                <label for="date_integration">Fecha visita</label>
                                <p>{{$item->date}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_integration">Hora visita</label>
                                <p>{{$item->time}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id_integration">Técnico asignado</label>
                                <p>{{$item->technical ? $item->technical->name : ''}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary_integration">Comentarios</label>
                                <p>{{$item->commentary}}</p>
                            </div>
                            <hr>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr>
            <h4>Mantenimiento</h4>
            <div id="destino_maintenance">
            @php
                $maintenance = false;
            @endphp
            @foreach ($id->visits as $item)
                @if ($item->type == "maintenance")
                    @php
                        $maintenance = true;
                    @endphp
                        <div class="row" id="origen_maintenance">
                            <div class="form-group col-sm-6">
                                <label for="date_maintenance">Fecha visita</label>
                                <p>{{$item->date}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time_maintenance">Hora visita</label>
                                <p>{{$item->time}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="technical_id_maintenance">Técnico asignado</label>
                                <p>{{$item->technical ? $item->technical->name : ''}}</p>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="commentary_maintenance">Comentarios</label>
                                <p>{{$item->commentary}}</p>
                            </div>
                            <hr>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        @if ($id->status == 0)
            <div class="box-footer">
                <button class="btn btn-sm btn-primary" onclick="aprobar()">Aprobar y firmar</button>
                <button class="btn btn-sm btn-danger" onclick="no_aprobar()">No aprobar</button>
            </div>
            <form id="form_approval" action="{{ route('mintic_approval',$id->id) }}" method="POST" style="form_dis;">
                @csrf
                @method('PUT')
                {{-- <textarea name="observaciones_jefe" id="observaciones_jefe_2" class="hide" cols="30" rows="3">{{old('observaciones_jefe')}}</textarea> --}}
            </form>
            <form id="form_no_approval" action="{{ route('mintic_not_approval',$id->id) }}" method="POST" style="display: none;">
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
        e.preventDefault();
        // document.getElementById('observaciones_jefe_2').value=document.getElementById('observaciones_jefe').value;
        document.getElementById('form_approval').submit();
    }
    function no_aprobar(e) {
        e.preventDefault();
        // document.getElementById('observaciones_jefe_2').value=document.getElementById('observaciones_jefe').value;
        document.getElementById('form_no_approval').submit();
    }
    </script>
@endsection