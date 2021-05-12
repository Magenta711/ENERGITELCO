@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Inspección detallada de vehículos <small>{{$id->id}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Inspeccion de vehículos</li>
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
                            <a href="{{route('detailed_inspection_vehicles')}}" class="btn btn-sm btn-primary">Volver</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <h3>Información general</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Placa de vehículo</strong><br>
                            {{$id->placa_vehiculo ?? $id->vehicle->plate }}
                        </div>
                        <div class="col-md-3">
                            <strong>Fecha</strong><br>
                            {{$id->fecha}}
                        </div>
                        <div class="col-md-3">
                            <strong>Ciudad</strong><br>
                            {{$id->ciudad}}
                        </div>
                        <div class="col-md-3">
                            <strong>kilometraje</strong><br>
                            {{$id->kilometraje}}
                        </div>
                    </div>
                    <hr>
                    {{-- User 1 --}}
                    <h4>conductor</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Nombre del conductor</strong>
                            <p>{{$id->condutor}}</p>
                        </div>
                    </div>
                    <hr>
                    <h4>Responsable (Quien realiza la inspección)</h4>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <strong>Número de documento</strong><br> {{$id->inspeccionador->cedula}}
                        </div>
                        <div class="col-md-4 mb-3">
                            <strong>Nombre completo funcionario</strong><br> {{$id->inspeccionador->name}}
                        </div>
                        <div class="col-md-3 mb-2">
                            <strong>Rol autorizado para el funcionario</strong><br> {{$id->inspeccionador->position->name}}
                        </div>
                    </div>
                    <hr>
                    {{-- Formulario 2 --}}
                    <h4>Documentos</h4>
                    <p>Verificar que se encuentren y que su fecha de vencimiento sea la adecuada.</p>
                    <div class="row">
                        <div class="col-md-6">
                            Licencia de conducción
                        </div>
                        <div class="col-md-6">
                            {{$id->f1_1}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            SOAT
                        </div>
                        <div class="col-md-6">
                            {{$id->f1_2}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            RTM
                        </div>
                        <div class="col-md-6">
                            {{$id->f1_3}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Seguro de daños y RC
                        </div>
                        <div class="col-md-6">
                            {{$id->f1_4}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Certificado de gases
                        </div>
                        <div class="col-md-6">
                            {{$id->f1_5}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones1)) !!}</p>
                    </div>
                    <hr>
                    {{-- Formulario 3 --}}
                    <h4>Direccionales</h4>
                    <p>Funcionamiento adecuado. Respuesta inmediata.</p>
                    <div class="row">
                        <div class="col-md-6">
                            Altas 
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_1}}
                        </div>
                    </div>
                    @if ($id->foto_1)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_1 }}" width="250px" alt="{{$id->foto_1}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Traseras
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_2}}
                        </div>
                    </div>
                    @if ($id->foto_2)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_2 }}" width="250px" alt="{{$id->foto_2}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <h4>Luces</h4>
                    <p>Funcionamiento de bombillos, cubiertas sin rotura, leds no fundidos.</p>
                    <div class="row">
                        <div class="col-md-6">
                            Altas
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_3}}
                        </div>
                    </div>
                    @if ($id->foto_3)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_3 }}" width="250px" alt="{{$id->foto_3}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Bajas
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_4}}
                        </div>
                    </div>
                    @if ($id->foto_4)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_4 }}" width="250px" alt="{{$id->foto_4}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Stops
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_5}}
                        </div>
                    </div>
                    @if ($id->foto_5)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_5 }}" width="250px" alt="{{$id->foto_5}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Reversa
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_6}}
                        </div>
                    </div>
                    @if ($id->foto_6)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_6 }}" width="250px" alt="{{$id->foto_6}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Parqueo
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_7}}
                        </div>
                    </div>
                    @if ($id->foto_7)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_7 }}" width="250px" alt="{{$id->foto_7}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <h4>Limpiaparabrisas</h4>
                    <p>Plumillas en buen estado (limpieza y estructura)</p>
                    <div class="row">
                        <div class="col-md-6">
                            Derecha / Izquierda / Atrás
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_8}}
                        </div>
                    </div>
                    @if ($id->foto_8)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_8 }}" width="250px" alt="{{$id->foto_8}}" class="img-thumbnail">
                    @endif
                    <h4>Vidrios</h4>
                    <p>Estado general de los vidrios</p>
                    <div class="row">
                        <div class="col-md-6">
                            Adelante
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_9}}
                        </div>
                    </div>
                    @if ($id->foto_9)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_9 }}" width="250px" alt="{{$id->foto_9}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Atrás
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_10}}
                        </div>
                    </div>
                    @if ($id->foto_10)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_10 }}" width="250px" alt="{{$id->foto_10}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Laterales
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_11}}
                        </div>
                    </div>
                    @if ($id->foto_11)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_11 }}" width="250px" alt="{{$id->foto_11}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <h4>Cremalleras y elevavidrios</h4>
                    <p>Abren y cierran sin novedad</p>
                    <div class="row">
                        <div class="col-md-6">
                            En todas las puertas 
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_12}}
                        </div>
                    </div>
                    @if ($id->foto_12)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_12 }}" width="250px" alt="{{$id->foto_12}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <h4>Seguros y chapas</h4>
                    <p>Abren y cierran sin novedad</p>
                    <div class="row">
                        <div class="col-md-6">
                            Puertas y maleta
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_13}}
                        </div>
                    </div>
                    @if ($id->foto_13)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_13 }}" width="250px" alt="{{$id->foto_13}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <h4>Bómperes y punteras</h4>
                    <p>Estado general</p>
                    <div class="row">
                        <div class="col-md-6">
                            Delantera
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_14}}
                        </div>
                    </div>
                    @if ($id->foto_14)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_14 }}" width="250px" alt="{{$id->foto_14}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Trasera
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_15}}
                        </div>
                    </div>
                    @if ($id->foto_15)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_15 }}" width="250px" alt="{{$id->foto_15}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <h4>Cojinería y carteras</h4>
                    <p>Estado general</p>
                    <div class="row">
                        <div class="col-md-6">
                            Asientos y compartimientos
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_16}}
                        </div>
                    </div>
                    @if ($id->foto_16)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_16 }}" width="250px" alt="{{$id->foto_16}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <h4>Frenos</h4>
                    <p>Verificar cada día al momento de comenzar la marcha.</p>
                    <div class="row">
                        <div class="col-md-6">
                            Principal
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_17}}
                        </div>
                    </div>
                    @if ($id->foto_17)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_17 }}" width="250px" alt="{{$id->foto_17}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Emergencia
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_18}}
                        </div>
                    </div>
                    @if ($id->foto_18)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_18 }}" width="250px" alt="{{$id->foto_18}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <strong>Llantas</strong>
                    <p>Cada día, antes de comenzar la marcha, verificar su estado, profundidad del labrado y presión.</p>
                    <div class="row">
                        <div class="col-md-6">
                            Delanteras
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_19}}
                        </div>
                    </div>
                    @if ($id->foto_19)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_19 }}" width="250px" alt="{{$id->foto_19}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Traseras
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_20}}
                        </div>
                    </div>
                    @if ($id->foto_20)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_20 }}" width="250px" alt="{{$id->foto_20}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Repuesto
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_21}}
                        </div>
                    </div>
                    @if ($id->foto_21)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_21 }}" width="250px" alt="{{$id->foto_21}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <strong>Espejos</strong>
                    <p>Verificar estado (limpieza, sin rotura ni opacidad), ubicación acorde a la necesidad.</p>
                    <div class="row">
                        <div class="col-md-6">
                            Laterales Derecho / Izquierdo
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_22}}
                        </div>
                    </div>
                    @if ($id->foto_22)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_22 }}" width="250px" alt="{{$id->foto_22}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Retrovisor
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_23}}
                        </div>
                    </div>
                    @if ($id->foto_23)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_23 }}" width="250px" alt="{{$id->foto_23}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <strong>Niveles de fluidos</strong>
                    <p>Verificar que los niveles de los fluidos sean los adecuados (reportar si se ven fugas).</p>
                    <div class="row">
                        <div class="col-md-6">
                            Frenos
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_24}}
                        </div>
                    </div>
                    @if ($id->foto_24)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_24 }}" width="250px" alt="{{$id->foto_24}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Embargue
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_25}}
                        </div>
                    </div>
                    @if ($id->foto_25)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_25 }}" width="250px" alt="{{$id->foto_25}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Aceite dirección
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_26}}
                        </div>
                    </div>
                    @if ($id->foto_26)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_26 }}" width="250px" alt="{{$id->foto_26}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Aceite de motor
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_27}}
                        </div>
                    </div>
                    @if ($id->foto_27)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_27 }}" width="250px" alt="{{$id->foto_27}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Refrigerante
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_28}}
                        </div>
                    </div>
                    @if ($id->foto_28)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_28 }}" width="250px" alt="{{$id->foto_28}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <strong>Pito</strong>
                    <p>Estado general de los vidrios</p>
                    <div class="row">
                        <div class="col-md-6">
                            Accionar antes de iniciar la marcha. Debe responder de forma adecuada
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_29}}
                        </div>
                    </div>
                    @if ($id->foto_29)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_29 }}" width="250px" alt="{{$id->foto_29}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <strong>Radio y parlantes</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Funciona sin novedad
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_30}}
                        </div>
                    </div>
                    @if ($id->foto_30)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_30 }}" width="250px" alt="{{$id->foto_30}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <strong>Tableros y controles</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Estado general
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_31}}
                        </div>
                    </div>
                    @if ($id->foto_31)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_31 }}" width="250px" alt="{{$id->foto_31}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <strong>Cinturones de seguridad del. / tras</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Verificar el estado de las partes (hebillas y parte textil, entre otras) y ajuste
                        </div>
                        <div class="col-md-6">
                            {{$id->f2_32}}
                        </div>
                    </div>
                    @if ($id->foto_32)
                    <img src="{{ '/storage/human_management/detailed_inspection_vehicles/'.$id->foto_32 }}" width="250px" alt="{{$id->foto_32}}" class="img-thumbnail">
                    @endif
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones2)) !!}</p>
                    </div>
                    <hr>
                    {{-- Formulario 3 --}}
                    <strong>Herramientas</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Como mínimo deberá contener: Alicate, destornilladores, llaves de expansión y llaves fijas
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_1}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_1)) !!}</p>
                    </div>
                    <hr>
                    <strong>Cruceta</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Apta para el vehículo
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_2}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_2)) !!}</p>
                    </div>
                    <hr>
                    <strong>Gato</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Con capacidad de elevar el vehículo
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_3}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_3)) !!}</p>
                    </div>
                    <hr>
                    <strong>Tacos</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Dos tacos aptos para bloquear el vehículo
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_4}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_4)) !!}</p>
                    </div>
                    <hr>
                    <strong>Señales</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Dos señales de carretera triangulares, en material reflectivo, y provistas de soportes  para ser colocadas en forma vertical  o lámparas de señal de luz amarilla intermitentes o de destellos.
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_5}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_5)) !!}</p>
                    </div>
                    <hr>
                    <strong>Chaleco</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Debe ser reflectivo
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_6}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_6)) !!}</p>
                    </div>
                    <hr>
                    <strong>Botiquín</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Yodopividona solución antiséptica bolsa (120ml), jabón, gasas, curas, venda elástica, microporo rollo, algodón paquete (25 gr), acetaminofén tabletas, mareol tabletas, sales de rehidratación oral, bajalenguas, suero fisiológico bolsa (250 ml), guantes latex desechables, toallas higiénicas, tijeras y termómetro oral.
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_7}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_7)) !!}</p>
                    </div>
                    <hr>
                    <strong>Llanta de repuesto</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Estado general, profundidad del labrado y presión
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_8}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_8)) !!}</p>
                    </div>
                    <hr>
                    <strong>Linterna</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Ilumina adecuadamente
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_9}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_9)) !!}</p>
                    </div>
                    <hr>
                    <strong>Extintor</strong>
                    <div class="row">
                        <div class="col-md-6">
                            Día / mes / año de vencimiento:
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_10}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_10)) !!}</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            Capacidad:
                        </div>
                        <div class="col-md-6">
                            {{$id->f3_11}}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <strong>Observaciones</strong>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->observaciones_11)) !!}</p>
                    </div>
                    @if ($id->foto)
                    <img src="{{'/storage/human_management/detailed_inspection_vehicles/'.$id->foto}}" class="img-thumbnail" width="250px" alt="{{$id->foto}}">
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
                        @if ($id->estado == "Sin aprobar")
                            @can('Aprobar solicitud de Inspección detallada de vehículos')
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
                        @can('Aprobar solicitud de Inspección detallada de vehículos')
                            <a class="btn btn-sm btn-primary btn-send" href="{{ route('detailed_inspection_vehicles_approve',$id->id) }}" onclick="aprobar()">
                                Aprobar y firmar
                            </a>
                            <a class="btn btn-sm btn-danger btn-send" href="{{ route('detailed_inspection_vehicles_approve',$id->id) }}" onclick="no_aprobar()">
                                No aprobar
                            </a>
                            <form id="approval_work_no_3" action="{{ route('detailed_inspection_vehicles_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="No aprobado">
                                <textarea name="commentary" id="commentary_b" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                            </form>
                            <form id="approval_work_3" action="{{ route('detailed_inspection_vehicles_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Aprobado">
                                <textarea name="commentary" id="commentary_a" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                            </form>
                        @endcan
                    @endif
                    @if ($id->estado == 'Aprobado')
                        @can('Descargar PDF de inspecciones detalladas de vehículos')
                            <a href="{{route('detailed_inspection_vehicles_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
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
            document.getElementById('approval_work_no_3').submit();
        }
        function aprobar() {
            event.preventDefault();
            document.getElementById('commentary_a').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_3').submit();
        }
    </script>
@endsection