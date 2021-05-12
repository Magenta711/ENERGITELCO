@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Permiso de trabajo <small>{{$id->id}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Permiso de trabajo</li>
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
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        @if ($id->estado != 'Sin aprobar')
                        <a href="{{route('work_permit')}}" class="btn btn-sm btn-primary">Volver</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <h3>1. Información general del trabajo</h3>
                    {{-- User 1 --}}
                    @if(isset($id->users))
                    <?php $f = 0; ?>
                    <p>Relación de personal a intervenir en la estacion base y rol autorizado.</p>
                        @foreach ($id->users as $usuario)
                            <div class="row">
                                <div class="col-md-1">Funcionario {{++$f}}</div>
                                <div class="col-md-4">
                                    <strong>Número de documento</strong><br> {{$usuario->cedula}}
                                </div>
                                <div class="col-md-4">
                                    <strong>Nombre completo funcionario</strong><br> {{$usuario->name}}
                                </div>
                                <div class="col-md-3">
                                    <strong>Rol autorizado para el funcionario</strong><br> {{$usuario->position->name}}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Nombre de la estación base donde se va trabajar</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->nombre_eb}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Altura</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->altura}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>La actividad a realizar es a una altura superior a los 1.5 metros de altura </strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->max_altura}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Placa del vehículo en el cual se moviliza</strong> 
                        </div>
                        <div class="col-sm-6">
                            @if ($id->vehicle)
                                {{$id->vehicle->plate}}
                            @else
                                {{$id->placa_vehiculo}}
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Estado</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->estado_vehiculo}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>¿Por qué?</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->por_que_estado_vehiculo}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Porcentaje de trabajo ejecutado</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->porcentaje_trabajo_presentado}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Número de días en ese proyecto</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->numero_dias_proyecto}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Requiere caja menor</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{ $id->requiere_caja_menor }}
                        </div> 
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Justificación de caja menor</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->Justificación_caja_menor}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Pendientes de consumibles</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->pendientes_consumible}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Negligencias de su coordinador</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->negligencias_coordinador}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Se desplaza en vehículo o moto de la empresa</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->vehiculo_desplazamiento}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Estás trabajando o manipulando equipos Energizados</strong> 
                        </div>
                        <div class="col-sm-6">
                            {{$id->equipos_energizados}}
                        </div>
                    </div>
                    <hr>
                    <h3>2. LISTADO DE VERIFICACIÓN</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>
                                Condiciones meteorológicas seguras
                            </strong>
                        </div>
                        <div class="col-sm-6">
                            {{$id->f2a1}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>
                                Condiciones integrales de los trabajadores
                            </strong>
                        </div>
                        <div class="col-sm-6">
                            {{$id->f2a2}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>
                                Capacitación con certificación vigente
                            </strong>
                        </div>
                        <div class="col-sm-6">
                            {{$id->f2a3}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>
                                Hay entrenamiento para el reconocimiento de riesgos
                            </strong>
                        </div>
                        <div class="col-sm-6">
                            {{$id->f2a4}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>
                                Existen procedimientos o instrucciones para la ejecución de la tarea y métodos de control
                            </strong>
                        </div>
                        <div class="col-sm-6">
                            {{$id->f2a5}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>
                                Se verificaron los puntos de anclaje en la estructura donde se realizará el trabajo
                            </strong>
                        </div>
                        <div class="col-sm-6">
                            {{$id->f2a6}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>
                                Completa documentación del personal
                            </strong>
                        </div>
                        <div class="col-sm-6">
                            {{ ($id->f2a7 === 'Si') ? $id->documentacion_personal : 'No' }}
                        </div>
                    </div>
                    <hr>
                    <h4>Elementos de Protección Personal</h4>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">Elementos de Protección Personal</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 1</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 2</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 3</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 4</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                PROTECCIÓN DE CABEZA: - Casco con barbuquejo
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b1u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b1u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b1u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2b1u4 : ''}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                PROTECCIÓN AUDITIVA: - Protector de inserción
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b2u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b2u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b2u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2b2u4 : ''}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                PROTECCIÓN VISUAL: - Gafas de seguridad
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b3u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b3u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b3u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2b3u4 : ''}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                PROTECCIÓN EN MANOS: - Guantes con recubrimiento adecuado para la actividad
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b4u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b4u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b4u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2b4u4 : ''}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                PROTECCIÓN EN PIES: - Botas de seguridad dieléctricas
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b5u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b5u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b5u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2b5u4 : ''}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                PROTECCIÓN EN CUERPO: - Ropa cómoda para trabajo
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b6u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b6u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2b6u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2b6u4 : ''}}
                        </div>
                    </div>
                    <hr>
                    <h4>Equipos de Protección y Prevención contra Caídas</h4>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">Equipos de Protección y Prevención contra Caídas</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 1</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 2</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 3</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 4</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                ARNÉS DE CUERPO COMPLETO: (de cuatro argollas preferible tipo cruzado)
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c1u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c1u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c1u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2c1u4 : ''}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                CONECTORES: - Eslinga con absorbedor en Y
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c2u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c2u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c2u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2c2u4 : ''}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                MECANISMOS DE ANCLAJE: - Cinta de anclaje portátil (tie off)
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c4u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c4u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c4u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2c4u4 : ''}}
                        </div>
                    </div>
                    <hr width="40%">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                MECANISMOS DE ASCENSO - Freno + Mosquetón de seguridad para ascenso con línea de vida de acero)
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c3u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c3u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f2c3u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f2c3u4 : ''}}
                        </div>
                    </div>
                    <hr>
                    <h4>Condiciones de riesgo en zona de trabajo</h4>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                El sitio de trabajo en alturas está delimitado (encerrado) y señalizado (avisos informativos) debidamente
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2d1}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Se han previsto medidas de control ante riesgos eléctricos, biológicos (avispas, abejas o animales peligrosos), caída de objetos, etc.
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2d2}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Se han previsto controles ante obstáculos, difícil acceso, espacios reducidos, etc., que dificulten la labor en alturas.
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2d3}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Condiciones ambientales adecuadas (ausencia de lluvia, neblina, tormenta eléctrica, vientos fuertes).
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2d4}}</div>
                    </div>
                    <hr>
                    <h4>Torre, estructura o sistema de acceso  y sus componentes</h4>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Se garantiza completa estabilidad y seguridad de la estructura (sin fracturas, partes torcidas, corrosión, partes incompletas).
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2e1}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Se dispone de puntos de anclaje adecuados y con resistencia de 5.000 lbs. aprox. donde el trabajador pueda asegurarse.
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2e7}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                De acuerdo a las condiciones del sitio, es adecuado el sistema de acceso y la resistencia de la estructura a las cargas.
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2e2}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Buen estado de componentes (línea de vida, peldaños escalera, materiales, diámetros, ángulos, tubos, diagonales, barandas, etc.)
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2e3}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Se encuentra libre de superficies húmedas, lisas, resbalosas o irregulares que impidan ejecutar la tarea.
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2e4}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Se garantizan distancias y límites seguros permitidos, evitando líneas eléctricas energizadas o bordes desprotegidos, etc.
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2e5}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Plataformas en perfecto estado que garantizan cobertura del 100% de la superficie de trabajo y sistema de barandas adecuado.
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f2e6}}</div>
                    </div>
                    <hr>
                    <h3>3. Validación para trabajar</h3>
                    <form id="approval_work_1" action="{{ route('work_permit_approve',$id->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Aprobado">
                        <div class="row">
                            <div class="col-sm-6">Responsable del Trablajo</div>
                            <div class="col-sm-6">{{$id->responsableAcargo->name}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">Responsable de la revición</div>
                            <div class="col-sm-6"{{$id->coordinadorAcargo->name}}></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6"><strong>Fecha del permiso</strong></div>
                            <div class="col-sm-6">{{$id->created_at}}</div>
                        </div>
                        @if ($id->estado == 'Sin aprobar' && (auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') || (auth()->user()->hasPermissionTo('Aprobar solicitudes permisos propios') && auth()->id() == $id->coordinador)))
                                <div class="form-group">
                                    <label for="fecha_hasta">Fecha y hora hasta donde autoriza</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input type="date" class="form-control" name="fecha_valido_hasta" id="fecha_hasta">
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="time" class="form-control" name="hora_final" id="">
                                        </div>
                                    </div>
                                </div>
                        @endif
                        <textarea name="commentary" id="commentary_a" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                    </form>
                    <hr>
                    <h3>4. Condiciones de Riesgo Eléctrico (aplica sólo para trabajar en equipos energizados)</h3>
                    <div class="row">
                        <div class="col-sm-8">
                            <strong>Número de matrícula de la persona a cargo de la actividad</strong>
                        </div>
                        <div class="col-sm-4">
                            {{$id->numero_matricula}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Posee matrícula de electricista
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f4a1}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Herramientas a utilizar en la actividad se encuentran aisladas adecuadamente
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f4a2}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                La fuente de energía se encuentra desenergizada en caso de ser posible 
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f4a3}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                En caso de ser una labor en caliente se cumple con todas las condiciones de seguridad y se estudió adecuadamente el procedimiento
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f4a4}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Retiró todos los elementos metálicos o conductivos de su cuerpo, como cadenas, reloj, anillos y manillas
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f4a5}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Tiene puestos los guantes, gafas, pulsera antiestática, botas dieléctricas y todo lo requerido para la actividad
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f4a6}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                Posee la herramienta adecuada para realizar la actividad y entiende eléctricamente el equipo a intervenir
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f4a7}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                El trabajo en caliente es en baja tensión (Recuerde: trabajos en caliente en alta tensión están prohibidos)
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f4a8}}</div>
                    </div>
                    <hr>
                    <h3>5. Condiciones de verificación del vehículo para sistema de seguridad vial</h3>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Está completa la documentación del vehículo o conductor?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a1}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿El sistema de luces del vehículo funciona correctamente?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a2}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Muestra el tablero de instrumentos alguna alarma?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a3}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Son adecuados los niveles de los fluidos (líquidos) del vehículo? 
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a4}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Presenta escapes de algún fluido (líquido) en el motor, las ruedas o en el piso?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a5}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Los frenos funcionan correctamente?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a6}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Funcionan adecuadamente los cinturones de seguridad?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a7}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Están los espejos laterales y el retrovisor en buen estado? 
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a8}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Es adecuado el estado de las llantas, incluida la del repuesto?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a9}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Tiene herramienta y equipo de carretera adecuados?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a10}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Siente ruidos anormales durante el recorrido?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a11}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Realizó la consulta al #767 sobre el estado de la ruta que va a transitar, y no encuentra problemas para su viaje?
                            </p>
                        </div>
                        <div class="col-xs-2">{{$id->f5a12}}</div>
                    </div>
                    <hr>
                    <h3>6. Validación de los equipos de protección para la conducción de motos.</h3>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">Elementos</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 1</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 2</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 3</div>
                        <div class="col-sm-2 col-xs-3">Funcionario 4</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                Casco con placa
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a1u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a1u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a1u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f6a1u4 : ''}}
                        </div>
                    </div>
                    <strong>Comentarios</strong>
                    <p>{{($id->comentario1)}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                Coderas
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a2u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a2u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a2u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f6a2u4 : ''}}
                        </div>
                    </div>
                    <strong>Comentarios</strong>
                    <p>{{($id->comentario2)}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                Rodilleras
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a3u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a3u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a3u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f6a3u4 : ''}}
                        </div>
                    </div>
                    <strong>Comentarios</strong>
                    <p>{{($id->comentario3)}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                Impermeable
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a4u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a4u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a4u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f6a4u4 : ''}}
                        </div>
                    </div>
                    <strong>Comentarios</strong>
                    <p>{{($id->comentario4)}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <strong>
                                Chaleco reflectivo con placa
                            </strong>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a5u1}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a5u2}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->f6a5u3}}
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            {{$id->work_add ? $id->work_add->f6a5u4 : ''}}
                        </div>
                    </div>
                    <strong>Comentarios</strong>
                    <p>{{($id->comentario5)}}</p>
                    <hr>
                    <div class="row">
                    @if ($id->foto_moto1)
                            <div class="col-md-3 col-sm-4">
                                <strong>Foto del equipo funcionario 1</strong>
                                <span class="mailbox-attachment-icon has-img">
                                    <div>
                                        <img src="/storage/human_management/work_permit/{{$id->foto_moto1}}" style="width: 100%;" alt="Attachment">
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->foto_moto1}}</p>
                                    <span class="mailbox-attachment-size">
                                        .
                                        <a target="_black" href="/storage/human_management/work_permit/{{$id->foto_moto1}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div>
                    @endif
                    @if ($id->foto_moto2)
                            <div class="col-md-3 col-sm-4">
                                <strong>Foto del equipo funcionario 2</strong>
                                <span class="mailbox-attachment-icon has-img">
                                    <div>
                                        <img src="/storage/human_management/work_permit/{{$id->foto_moto2}}" style="width: 100%;" alt="Attachment">
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->foto_moto2}}</p>
                                    <span class="mailbox-attachment-size">
                                        .
                                        <a target="_black" href="/storage/human_management/work_permit/{{$id->foto_moto2}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div>
                    @endif
                    @if ($id->foto_moto3)
                            <div class="col-md-3 col-sm-4">
                                <strong>Foto del equipo funcionario 3</strong>
                                <span class="mailbox-attachment-icon has-img">
                                    <div>
                                        <img src="/storage/human_management/work_permit/{{$id->foto_moto3}}" style="width: 100%;" alt="Attachment">
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->foto_moto3}}</p>
                                    <span class="mailbox-attachment-size">
                                        .
                                        <a target="_black" href="/storage/human_management/work_permit/{{$id->foto_moto3}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div> 
                    @endif
                    @if ($id->work_add ? $id->work_add->foto_moto4 : '')
                            <div class="col-md-3 col-sm-4">
                                <strong>Foto del equipo funcionario 4</strong>
                                <span class="mailbox-attachment-icon has-img">
                                    <div>
                                        <img src="/storage/human_management/work_permit/{{$id->work_add ? $id->work_add->foto_moto4 : ''}}" style="width: 100%;" alt="Attachment">
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->work_add ? $id->work_add->foto_moto4 : ''}}</p>
                                    <span class="mailbox-attachment-size">
                                        .
                                        <a target="_black" href="/storage/human_management/work_permit/{{$id->work_add ? $id->work_add->foto_moto4 : ''}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div> 
                    @endif
                    </div>
                    <hr>
                    {{-- Items de bioseguridad --}}
                    <h3>7. Verificación cumplimiento protocolo de bioseguridad (responda las siguientes preguntas bajo gravedad de juramento)</h3>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Se aplicó protocolo de desinfección y limpieza al vehículo o moto?
                            </p>
                        </div>
                        <div class="col-xs-2">{{($id->work_add) ? $id->work_add->f8a1 : ''}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿El equipo cuanta con elementos de bioseguridad como alcohol, antibacterial y jabon de manos?
                            </p>
                        </div>
                        <div class="col-xs-2">{{($id->work_add) ? $id->work_add->f8a2 : ''}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Se realizó protocolo de limpieza y desinfección a la herramienta a utilizar?
                            </p>
                        </div>
                        <div class="col-xs-2">{{($id->work_add) ? $id->work_add->f8a3 : ''}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Se aplicó protocolo de desinfección y limpieza al vehículo o moto?
                            </p>
                        </div>
                        <div class="col-xs-2">{{($id->work_add) ? $id->work_add->f8a4 : ''}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-10">
                            <p>
                                ¿Todo el personal realizó autodiagnostico en la aplicación Coronapp?
                            </p>
                        </div>
                        <div class="col-xs-2">{{($id->work_add) ? $id->work_add->f8a5 : ''}}</div>
                    </div>
                    {{-- Fin de items --}}
                    <hr>
                    <h3>8. Observaciones</h3>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones)) !!}</p>
                    @if (count($id->files))
                    <hr>
                        <strong>Archivos adjuntos</strong>
                        <div class="row">
                            @foreach ($id->files as $file)
                                <div class="col-md-3">
                                    <span class="mailbox-attachment-icon has-img">
                                        <div>
                                            @if ($file->extencion == 'pdf')
                                                <i class="fa fa-file-pdf-o"></i>
                                            @endif
                                            @if ($file->extencion == 'docx' || $file->extencion == 'doc')
                                                <i class="fa fa-file-word-o"></i>
                                            @endif
                                            @if ($file->extencion == 'png' || $file->extencion == 'jpg' || $file->extencion == 'jpeg')
                                                <img src="/storage/human_management/work_permit/{{$file->nombre}}" style="width: 100%;" alt="Attachment">
                                            @endif
                                        </div>
                                    </span>
                                    <div class="mailbox-attachment-info">
                                        <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$file->nombre}}</p>
                                        <span class="mailbox-attachment-size">
                                             KB
                                            <a target="_black" href="/storage/human_management/work_permit/{{$file->nombre}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ($id->created_at > '2020-12-14 11:00:00')
                        <hr>
                        <h3>9. Comisiones</h3>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">/</div>
                            <div class="col-sm-2 col-xs-3">Funcionario 1</div>
                            <div class="col-sm-2 col-xs-3">Funcionario 2</div>
                            <div class="col-sm-2 col-xs-3">Funcionario 3</div>
                            <div class="col-sm-2 col-xs-3">Funcionario 4</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <strong>
                                    Valor que considera de bonificaciones
                                </strong>
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a1u1 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a1u2 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a1u3 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a1u4 , 2, ',', '.') : '0'}}
                            </div>
                        </div>
                        <hr width="40%">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <strong>
                                    Valor que considera de viáticos
                                </strong>
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a2u1 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a2u2 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a2u3 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a2u4 , 2, ',', '.') : '0'}}
                            </div>
                        </div>
                        <hr width="40%">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <strong>
                                    Valor que considera de caja menor
                                </strong>
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a3u1 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a3u2 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a3u3 , 2, ',', '.') : '0'}}
                            </div>
                            <div class="col-sm-2 col-xs-3">
                                {{($id->work_add) ? '$ '.number_format($id->work_add->f9a3u4 , 2, ',', '.') : '0'}}
                            </div>
                        </div>
                    @endif
                    <hr>
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
                    <p>SEÑOR FUNCIONARIO EMISOR DEL PRESENTE PERMISO DE TRABAJO, TENGA PRESENTE QUE ES OBLIGATORIO ANTES DE INICIAR ACTIVIDADES GARANTIZAR EL CONOCIMIENTO Y LAS RESTRICCIONES DEL PRESENTE PERMISO A LOS DEMÁS COMPAÑEROS INVOLUCRADOS EN LA PRESENTE ACTIVIDAD DE FORMA DIGITAL MEDIANTE EL MAIL ENVIADO A CADA UNO DE LOS FUNCIONARIOS INVOLUCRADOS EN LA PRESENTE ACTIVIDAD Y EN CASO DE QUE EL TRABAJO SE REALICE EN SITIOS DONDE INTERVIENEN TERCEROS AJENOS A ENERGITELCO SAS, TENGA PRESENTE QUE ANTES DE INICIAR LABORES OBLIGATORIAMENTE DEBE PROCEDER A IMPRIMIR FÍSICAMENTE EL PRESENTE DOCUMENTO Y PUBLICARLO EN LOS LÍMITES DE LA ZONA DE TRABAJO O DE LA DEMARCACIÓN Y CERRAMIENTO QUE HIZO DE SU ZONA DE TRABAJO.</p>
                    @else
                        @if ($id->estado == 'Sin aprobar' && (auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') || (auth()->user()->hasPermissionTo('Aprobar solicitudes permisos propios') && auth()->id() == $id->coordinador)))
                                <div class="form-group">
                                    <label for="pre_commentary">Comentarios quien aprueba</label>
                                    <textarea name="commentary" id="pre_commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                                </div>
                        @endif
                    @endif
                </div>
                {{-- coordinadorAcargo --}}
                
                <div class="box-footer">
                    @if ($id->estado == 'Sin aprobar' && (auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') || (auth()->user()->hasPermissionTo('Aprobar solicitudes permisos propios') && auth()->id() == $id->coordinador)))
                            <a class="btn btn-sm btn-primary btn-send" href="{{ route('work_permit_approve',$id->id) }}"
                                    onclick="aprobar()">
                                Aprobar y firmar
                            </a>
                            <a class="btn btn-sm btn-danger btn-send" href="{{ route('work_permit_approve',$id->id) }}"
                                    onclick="no_aprobar()">
                                No aprobar
                            </a>
                            <form id="approval_work_no_1" action="{{ route('work_permit_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <textarea name="commentary" id="commentary_b" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                                <input type="hidden" name="status" value="No aprobado">
                            </form>
                    @endif
                    @if ($id->estado == 'Aprobado')
                        @can('Descargar PDF de permisos de trabajo')
                            <a href="{{route('work_permit_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
                        @endcan
                    @endif
                </div>
            </div>
</section>
@endsection

@section('js')
    <script>
        function no_aprobar() {
            event.preventDefault();
            document.getElementById('commentary_b').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_no_1').submit();
        }
        function aprobar() {
            event.preventDefault();
            document.getElementById('commentary_a').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_1').submit();
        }
    </script>
@endsection
