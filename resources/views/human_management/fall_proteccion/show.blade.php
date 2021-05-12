@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Inspección de equipos de protección contra caídas <small>{{$id->id}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Inspección de equipos</li>
    </ol>
</section>
<section class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        @if ($id->estado != 'Sin aprobar')
                            <a href="{{route('fall_protection_equipment_inspection')}}" class="btn btn-sm btn-primary">Volver</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <h3>Información general</h3>
                    <h4>Trabajador</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Número de documento</h4> {{$id->trabajador->cedula}}
                        </div>
                        <div class="col-md-4">
                            <h4>Nombre completo funcionario</h4> {{$id->trabajador->name}}
                        </div>
                        <div class="col-md-3">
                            <h4>Rol autorizado para el funcionario</h4> {{$id->trabajador->position->name}}
                        </div>
                    </div>
                    <h4>Responsable de la inspección</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Número de documento</h4> {{$id->inspeccionador->cedula}}
                        </div>
                        <div class="col-md-4">
                            <h4>Nombre completo funcionario</h4> {{$id->inspeccionador->name}}
                        </div>
                        <div class="col-md-3">
                            <h4>Rol autorizado para el funcionario</h4> {{$id->inspeccionador->position->name}}
                        </div>
                    </div>
                    <strong>Fecha de la inspección</strong>
                    {{$id->fecha_inspeccion}}
                    <hr>
                    {{-- formulario 2 --}}
                    <h4>ARNÉS</h4>
                    <h4>CINTAS, CORREAS Y COSTURAS</h4>
                    <div class="row">
                        <div class="col-md-6">
                            Cortes o rotura del tejido o costuras
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_1}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Fisuras
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_2}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Estiramiento excesivo (elongación de la riata)
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_3}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Deterioro generar
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_4}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Corrosión o desastres por exposición a ácidos o productos químicos
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_5}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Quemaduras o fibras derretidas
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_6}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Perforaciones o agujeros
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_7}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Presenta suciedad
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_8}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Costuras completas
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_9}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Cuenta con la etiqueta de certificación
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_10}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Deshilachamiento
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_11}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Hilos faltantes
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_12}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Reventadas
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_13}}
                        </div>
                    </div>
                    <h4>PARTES METÁLICAS</h4>
                    <div class="row">
                        <div class="col-md-6">
                            Deformación (dobladura, ect.)
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_14}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Picadura, grietas
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_15}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Presenta desgaste
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_16}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Corrosión u oxidación 
                        </div>
                        <div class="col-md-6">
                            {{$id->E1_17}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Serie del equipo</strong></div>
                        <div class="col-md-6">{{$id->serie_equipo_1}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Marca del equipo</strong></div>
                        <div class="col-md-6">{{$id->marca_1}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Estado general del arnés</strong></div>
                        <div class="col-md-6">{{$id->estado_arnes}}</div>
                    </div>
                    <hr>
                    <strong>Observaciones</strong>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_1)) !!}</p>
                    @if ($id->foto_1)
                    <div class="row">
                        <div class="col-md-3">
                            <span class="mailbox-attachment-icon has-img">
                                <div>
                                    <img src="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_1 }}" style="width: 100%;" alt="Attachment">
                                </div>
                            </span>
                            <div class="mailbox-attachment-info">
                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->foto_1}}</p>
                                <span class="mailbox-attachment-size">
                                    KB
                                    <a target="_black" href="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_1 }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <h4>ESLINGA EN Y</h4>
                    <h4>CINTAS, CORREAS, COSTURAS Y ABSORBEDOR</h4>
                    <div class="row">
                        <div class="col-md-6">
                            Presenta perforaciones o desgastes
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_1}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Costuras sueltas o reventadas
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_2}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Deterioro
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_3}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Presenta suciedad
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_4}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Salpicaduras de pintura y rigidez en cinta
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_5}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Cortes o roturas del tejido o costuras
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_6}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Fisuras
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_7}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Estiramiento excesivo (elongación de la riata)
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_8}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Deterioro general
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_9}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Corrosión o desgas tes por exposición a ácidos o productos químicos
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_10}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Quemaduras o fibras derretidas
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_11}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Perforaciones o agujeros
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_12}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Costuras completas
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_13}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Cuenta con etiqueta de certificación
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_14}}
                        </div>
                    </div>
                    <h4>PARTES METÁLICAS</h4>
                    <div class="row">
                        <div class="col-md-6">
                            Deformación (dobladura, ect.)
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_15}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Picadura, grietas
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_16}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Presenta desgaste
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_17}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Corrosión u oxidación 
                        </div>
                        <div class="col-md-6">
                            {{$id->E2_18}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Serie del equipo</strong></div>
                        <div class="col-md-6">{{$id->serie_equipo_2}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Marca del equipo</strong></div>
                        <div class="col-md-6">{{$id->marca_equipo_2}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Estado general de la eslinga en Y</strong></div>
                        <div class="col-md-6">{{$id->estado_eslinga}}</div>
                    </div>
                    <hr>
                    <strong>Observaciones</strong>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_2)) !!}</p>
                    @if ($id->foto_2)
                    <div class="row">
                        <div class="col-md-3">
                            <span class="mailbox-attachment-icon has-img">
                                <div>
                                    <img src="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_2 }}" style="width: 100%;" alt="Attachment">
                                </div>
                            </span>
                            <div class="mailbox-attachment-info">
                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->foto_2}}</p>
                                <span class="mailbox-attachment-size">
                                    KB
                                    <a target="_black" href="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_2 }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <h4>ESLINGA DE POSICIONAMIENTO</h4>
                    <h4>CINTAS, CORREAS Y COSTURAS</h4>
                    <div class="row">
                        <div class="col-md-6">
                            Cortes o rotura del tejido o costuras
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_1}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Fisuras
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_2}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Estiramiento excesivo (elongación de la riata)
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_3}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Deterioro general
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_4}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Corrosión o desgastes por exposición a ácidos o productos químicos
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_5}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Quemaduras o fibras derretidas
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_6}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Perforaciones o agujeros
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_7}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Presenta suciedad
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_8}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Costuras completas
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_9}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Cuenta con etiqueta de certificación
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_10}}
                        </div>
                    </div>
                    <h4>PARTES METÁLICAS</h4>
                    <div class="row">
                        <div class="col-md-6">
                            Deformación (dobladura, ect.)
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_11}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Picadura, grietas
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_12}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Presenta desgaste
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_13}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Corrosión u oxidación
                        </div>
                        <div class="col-md-6">
                            {{$id->E3_14}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Serie del equipo</strong></div>
                        <div class="col-md-6">{{$id->serie_equipo_3}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Marca del equipo</strong></div>
                        <div class="col-md-6">{{$id->marca_equipo_3}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Estado general de la eslinga</strong></div>
                        <div class="col-md-6">{{$id->estado_eslinga2}}</div>
                    </div>
                    <hr>
                    <strong>Observaciones</strong>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_3)) !!}</p>
                    @if ($id->foto_3)
                    <div class="row">
                        <div class="col-md-3">
                            <span class="mailbox-attachment-icon has-img">
                                <div>
                                    <img src="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_3 }}" style="width: 100%;" alt="Attachment">
                                </div>
                            </span>
                            <div class="mailbox-attachment-info">
                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->foto_3}}</p>
                                <span class="mailbox-attachment-size">
                                    KB
                                    <a target="_black" href="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_3 }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <h4>ACCESORIOS</h4>
                    <h4>Moquetón</h4>
                    <div class="row">
                        <div class="col-md-6">
                            Deformación (dobladura, etc.)
                        </div>
                        <div class="col-md-6">
                            {{$id->E4_1}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Bloqueo (ajuste excesivo) de los mosquetones en cierres de seguridad.
                        </div>
                        <div class="col-md-6">
                            {{$id->E4_2}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Grietas o picaduras
                        </div>
                        <div class="col-md-6">
                            {{$id->E4_3}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Resortes (detecta fallas)
                        </div>
                        <div class="col-md-6">
                            {{$id->E4_4}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Deterioro general
                        </div>
                        <div class="col-md-6">
                            {{$id->E4_5}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Corrosión
                        </div>
                        <div class="col-md-6">
                            {{$id->E4_6}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Presencia de oxidación (moho) 
                        </div>
                        <div class="col-md-6">
                            {{$id->E4_7}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Serie del equipo</strong></div>
                        <div class="col-md-6">{{$id->serie_equipo_4}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Marca del equipo</strong></div>
                        <div class="col-md-6">{{$id->marca_equipo_4}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Estado general del mosquetón</strong></div>
                        <div class="col-md-6">{{$id->estado_mosqueton}}</div>
                    </div>
                    <hr>
                    <strong>Observaciones</strong>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_4)) !!}</p>
                    @if ($id->foto_4)
                    <div class="row">
                        <div class="col-md-3">
                            <span class="mailbox-attachment-icon has-img">
                                <div>
                                    <img src="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_4 }}" style="width: 100%;" alt="Attachment">
                                </div>
                            </span>
                            <div class="mailbox-attachment-info">
                                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->foto_4}}</p>
                                <span class="mailbox-attachment-size">
                                    KB
                                    <a target="_black" href="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_4 }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <h4>Freno</h4>
                    <div class="row">
                        <div class="col-md-6">
                            Deformación (dobladura, etc.)
                        </div>
                        <div class="col-md-6">
                            {{$id->E5_1}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Bloqueo (ajuste excesivo) de los mosquetones en cierres de seguridad
                        </div>
                        <div class="col-md-6">
                            {{$id->E5_2}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Grietas o picaduras
                        </div>
                        <div class="col-md-6">
                            {{$id->E5_3}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Resortes (detecta fallas)
                        </div>
                        <div class="col-md-6">
                            {{$id->E5_4}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Frenado (hacer prueba)
                        </div>
                        <div class="col-md-6">
                            {{$id->E5_5}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Deterioro general
                        </div>
                        <div class="col-md-6">
                            {{$id->E5_6}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Corrosión
                        </div>
                        <div class="col-md-6">
                            {{$id->E5_7}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Presencia de oxidación (moho) 
                        </div>
                        <div class="col-md-6">
                            {{$id->E5_8}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Serie del equipo</strong></div>
                        <div class="col-md-6">{{$id->serie_equipo_5}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Marca del equipo</strong></div>
                        <div class="col-md-6">{{$id->marca_equipo_5}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Estado general del freno</strong></div>
                        <div class="col-md-6">{{$id->estado_freno}}</div>
                    </div>
                    <hr>
                    <strong>Observaciones</strong>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_5)) !!}</p>
                    @if ($id->foto_5)
                        <div class="row">
                            <div class="col-md-3">
                                <span class="mailbox-attachment-icon has-img">
                                    <div>
                                        <img src="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_5 }}" style="width: 100%;" alt="Attachment">
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->foto_5}}</p>
                                    <span class="mailbox-attachment-size">
                                        KB
                                        <a target="_black" href="{{ '/storage/human_management/fall_protection_equipment/'.$id->foto_5 }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($id->commentary)
                        <hr>
                        <p><b>Comentarios quien aprueba</b><br>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
                    @endif
                    @if ($id->estado == 'Aprobado')
                    <br><hr><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <h6>Firmado electrónicamente por el responsable del trabajo o líder</h6>
                                    <div class="row">
                                        <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsableAcargo->name}}</div>
                                        <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsableAcargo->cedula}}</div>
                                    </div>
                                    <p>Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$id->responsableAcargo->name}}</strong>, en rol de {{$id->responsableAcargo->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body">
                                    <h6>Firmado electrónicamente por el auditor o coordinador</h6>
                                    <div class="row">
                                        <div class="col-md-6"><strong>Nombre: </strong>{{$id->coordinadorAcargo->name}}</div>
                                        <div class="col-md-6"><strong>Cédula: </strong>{{$id->coordinadorAcargo->cedula}}</div>
                                    </div>
                                    <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->coordinadorAcargo->name}}</strong> en rol de {{$id->coordinadorAcargo->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        @if ($id->estado == 'Sin aprobar')
                            @can('Aprobar solicitud de Inspección y protección contra caídas')
                                <div class="form-group">
                                    <label for="pre_commentary">Comentarios quien aprueba</label>
                                    <textarea name="commentary" id="pre_commentary" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            @endcan
                        @endif
                    @endif
                </div>
                <div class="box-footer">
                    @if ($id->estado == 'Sin aprobar')
                        @can('Aprobar solicitud de Inspección y protección contra caídas')
                            <a class="btn btn-sm btn-primary btn-send" href="{{ route('fall_protection_equipment_inspection_approve',$id->id) }}" onclick="aprobar()">
                                Aprobar y firmar
                            </a>
                            <a class="btn btn-sm btn-danger btn-send" href="{{ route('fall_protection_equipment_inspection_approve',$id->id) }}" onclick="no_aprobar()">
                                No aprobar
                            </a>
                            <form id="approval_work_no_2" action="{{ route('fall_protection_equipment_inspection_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="No aprobado">
                                <textarea name="commentary" id="commentary_b" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                            </form>
                            <form id="approval_work_2" action="{{ route('fall_protection_equipment_inspection_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Aprobado">
                                <textarea name="commentary" id="commentary_a" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                            </form>
                        @endcan
                    @endif
                    @if ($id->estado == 'Aprobado')
                        @can('Descargar PDF de inspecciones de equipos de protección contra caídas')
                            <a href="{{route('fall_protection_equipment_inspection_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
                        @endcan
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
        function no_aprobar() {
            event.preventDefault();
            document.getElementById('commentary_b').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_no_2').submit();
        }
        function aprobar() {
            event.preventDefault();
            document.getElementById('commentary_a').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_2').submit();
        }
    </script>
@endsection