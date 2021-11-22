@extends('lte.layouts')

@section('content')
<?php $i=0; ?>
<section class="content-header">
    <h1>
        Lista de verificación para el mantenimiento de los computadores <small>{{$id->id}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li>Formatos de gestión</li>
        <li class="active">Lista de verificación para computadores</li>
    </ol>
</section>
<section class="content">
     
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        @if ($id->estado != 'Sin aprobar')
                            <a href="{{route('checklist_computer_maintenance')}}" class="btn btn-sm btn-primary">Volver</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <strong>Responsable del equipo</strong>
                            <p>{{$id->responsable_equipo}}</p>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <strong>Fecha</strong>
                            <p>{{$id->fecha}}</p>
                        </div>
                    </div>
                    <hr>
                    @if ($id->computer)
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Marca</strong>
                            <p>{{$id->computer->brand}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Modelo</strong>
                            <p>{{$id->computer->model}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Serial</strong>
                            <p>{{$id->computer->serial}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Procesador</strong>
                            <p>{{$id->computer->cpu}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Disco duro</strong>
                            <p>{{$id->computer->rom}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Memoria RAM</strong>
                            <p>{{$id->computer->ram}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Sistema operativo</strong>
                            <p>{{$id->computer->so}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Software instalado</strong>
                            <p>{{$id->computer->software}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Tipo de licencia</strong>
                            <p>{{$id->computer->license}}</p>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Marca</strong>
                            <p>{{$id->marca}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Modelo</strong>
                            <p>{{$id->modelo}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Serial</strong>
                            <p>{{$id->serial}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Procesador</strong>
                            <p>{{$id->procesador}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Disco duro</strong>
                            <p>{{$id->disco_duro}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Memoria RAM</strong>
                            <p>{{$id->memoria_ram}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <strong>Sistema operativo</strong>
                            <p>{{$id->sistema_operativo}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Software instalado</strong>
                            <p>{{$id->software_instalado}}</p>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <strong>Tipo de licencia</strong>
                            <p>{{$id->tipo_licencia}}</p>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>Número de documento</strong><br>{{$id->tecnico->cedula}}</div>
                        <div class="col-md-4"><strong>Nombre completo funcionario</strong><br>{{$id->tecnico->name}}</div>
                        <div class="col-md-4"><strong>Rol autorizado</strong><br>{{$id->tecnico->position->name}}</div>
                    </div>
                    <hr>
                    <h4>Diagnostico inicial del computador</h4>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->diagonostico_inicial))!!}</p>
                    {{-- Version 3* 4* --}}
                    @if ($id->work_add)
                    <hr>
                    <h4>Tareas para el manejo de seguridad de la información</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    1. Usuario y clave de inicio como única opción de acceso al pc
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a1 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    2. Actualizar Windows y todo el SW licenciado
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a2 : ''}}</div>
                            </div>
                        </li>
                        {{-- Version 4* --}}
                        @if ($id->created_at > '2020-10-03 8:00:00')
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    3. Restringir acceso a las unidades de almacenamiento (todos sin excepción)
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a3 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    4. ¿Está impidiendo el acceso a las unidades internas del equipo?
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a5 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    5. Limpiar escritorio, carpetas personales y disco duro (solo queda carpeta Energitelco con clave y sus accesos directos)
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a4 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    6. Crear seguridad VPN
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a6 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    7. ¿Se ha realizado borrado seguro de la información confidencial?
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a7 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    8. ¿Se han presentado incidentes de seguridad con los accesos de claro y otros clientes?
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a8 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    9. ¿Se utilizan los servicios seguros y se han deshabilitado servicios no necesarios?
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a9 : ''}}</div>
                            </div>
                        </li>
                        @else
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    3. Bloquear puertos USB (todos sin excepción)
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a3 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    4. Limpiar escritorio, carpetas personales y disco duro (solo queda carpeta Energitelco con clave y sus accesos directos
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a4 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    5. Crear bloqueo de bodega
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a5 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    6. Crear seguridad VPN
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f2a6 : ''}}</div>
                            </div>
                        </li>
                        @endif
                    </ul>
                    @endif
                    {{-- Version 3*, 4* --}}
                    @if ($id->work_add)
                    <hr>
                    <h4>Mantenimiento de software tipo 1</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    1. Archivos temporales
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f3a1 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    2. Desfragmentación del disco duro
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f3a2 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    3. Actualización del CCLEANER
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f3a3 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    4. Actualización del antivirus (obligatorio)
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f3a4 : ''}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    5. Se requiere formateo del computador
                                </div>
                                <div class="col-md-6">{{($id->work_add) ? $id->work_add->f3a5 : ''}}</div>
                            </div>
                        </li>
                    </ul>
                    @endif
                    <hr>
                        <h4>Mantenimiento de software tipo 2</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    1. Carga de sistema operativo
                                </div>
                                <div class="col-md-6">{{$id->f1a1}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    2. Carga de Office
                                </div>
                                <div class="col-md-6">{{$id->f1a2}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    3. Carga de antivirus y actualización
                                </div>
                                <div class="col-md-6">{{$id->f1a3}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    4. Carga de Acrobat y WinRAR
                                </div>
                                <div class="col-md-6">{{$id->f1a4}}</div>
                            </div>
                        </li>
                        {{-- Version 3* 4* --}}
                        @if ($id->created_at > '2020-09-17 12:00:00')
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    5. Conexión AnyDesk
                                </div>
                                <div class="col-md-6">{{$id->f1a5}}</div>
                            </div>
                        </li>
                        @else
                        {{-- Version 1* 2* --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    5. Conexión TeamViewer
                                </div>
                                <div class="col-md-6">{{$id->f1a5}}</div>
                            </div>
                        </li>
                        @endif
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    6. Conexión Ericsson MW
                                </div>
                                <div class="col-md-6">{{$id->f1a6}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    7. Conexión Huawei MW
                                </div>
                                <div class="col-md-6">{{$id->f1a7}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    8. Conexión NEC Ipaso MW
                                </div>
                                <div class="col-md-6">{{$id->f1a8}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    9. Conexión NEC NEO MW
                                </div>
                                <div class="col-md-6">{{$id->f1a9}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    10. Conexión NEC v4 MW
                                </div>
                                <div class="col-md-6">{{$id->f1a10}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    11. Conexión flexi BTS
                                </div>
                                <div class="col-md-6">{{$id->f1a11}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    12. Conexión lte BTS
                                </div>
                                <div class="col-md-6">{{$id->f1a12}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    13. Conexión Ultra BTS
                                </div>
                                <div class="col-md-6">{{$id->f1a13}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    14. Conexión Umts BTS
                                </div>
                                <div class="col-md-6">{{$id->f1a14}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    15. Conexión Eltek 1.0 Power
                                </div>
                                <div class="col-md-6">{{$id->f1a15}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    16. Conexión Eltek 2.0 Power
                                </div>
                                <div class="col-md-6">{{$id->f1a16}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    17. Verificar cable de conexión para cada aplicativo de SW
                                </div>
                                <div class="col-md-6">{{$id->f1a17}}</div>
                            </div>
                        </li>
                    </ul>
                    {{-- Version 3* 4* --}}
                    @if ($id->work_add)
                    <hr>
                    <h4>Mantenimiento de software tipo 3</h4>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">
                                1. Carga de sistema operativo
                            </div>
                            <div class="col-md-6">{{($id->work_add) ? $id->work_add->f4a1 : ''}}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">
                                2. Carga de office
                            </div>
                            <div class="col-md-6">{{($id->work_add) ? $id->work_add->f4a2 : ''}}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">
                                3. Carga de antivirus y actualización
                            </div>
                            <div class="col-md-6">{{($id->work_add) ? $id->work_add->f4a3 : ''}}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">
                                4. Carga de Acrobat y WinRar
                            </div>
                            <div class="col-md-6">{{($id->work_add) ? $id->work_add->f4a4 : ''}}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">
                                5. Instalación de impresoras y red
                            </div>
                            <div class="col-md-6">{{($id->work_add) ? $id->work_add->f4a5 : ''}}</div>
                        </div>
                    </li>
                     @endif
                    <hr>
                    <h4>Mantenimiento de hardware estándar</h4>
                    <div class="list-gruop">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    1. Limpieza de los contactos de la memoria RAM
                                </div>
                                <div class="col-md-6">{{$id->f1b1}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    2. Limpieza del disparador de calor
                                </div>
                                <div class="col-md-6">{{$id->f1b2}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    3. Mantenimiento al Cooler y Fan
                                </div>
                                <div class="col-md-6">{{$id->f1b3}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    4. Mantenimiento del teclado
                                </div>
                                <div class="col-md-6">{{$id->f1b4}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    5. Mantenimiento de la pantalla
                                </div>
                                <div class="col-md-6">{{$id->f1b5}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    6. Mantenimiento contactos del teclado y sensor del mouse
                                </div>
                                <div class="col-md-6">{{$id->f1b6}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    7. Mantenimiento contactos de tarjeta de red inalámbrica
                                </div>
                                <div class="col-md-6">{{$id->f1b7}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    8. Mantenimiento unidad de CD
                                </div>
                                <div class="col-md-6">{{$id->f1b8}}</div>
                            </div>
                        </li>
                        @if ($id->created_at > '2020-12-12 08:00:00')
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        9. ¿El escritorio físico se encentra limpio y ordenado?
                                    </div>
                                    <div class="col-md-6">{{$id->f1b9}}</div>
                                </div>
                            </li>
                        @endif
                    </ul>
                    <hr>
                    <h4>Observaciones</h4>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones)) !!}</p>
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
                        @if ($id->estado == "Sin aprobar")
                            @can('Aprobar solicitud de lista de verificación para el mantenimiento de computadores')
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
                        @can('Aprobar solicitud de lista de verificación para el mantenimiento de computadores')
                            <a class="btn btn-sm btn-primary btn-send" href="{{ route('checklist_computer_maintenance_approve',$id->id) }}"
                                    onclick="aprobar()">
                                Aprobar y firmar
                            </a>
                            <a class="btn btn-sm btn-danger btn-send" href="{{ route('checklist_computer_maintenance_approve',$id->id) }}"
                                    onclick="no_aprobar()">
                                No aprobar
                            </a>
                            <form id="approval_work_no_6" action="{{ route('checklist_computer_maintenance_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="No aprobado">
                                <textarea name="commentary" id="commentary_b" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                            </form>
                            <form id="approval_work_6" action="{{ route('checklist_computer_maintenance_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Aprobado">
                                <textarea name="commentary" id="commentary_a" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                            </form>
                        @endcan
                    @endif
                    @if ($id->estado == 'Aprobado')
                        @can('Descargar PDF de listas de verificación para el mantenimiento de los computadores')
                            <a href="{{route('checklist_computer_maintenance_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
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
            document.getElementById('approval_work_no_6').submit();
        }
        function aprobar() {
            event.preventDefault();
            document.getElementById('commentary_a').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_6').submit();
        }
    </script>
@endsection