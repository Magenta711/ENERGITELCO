@extends('lte.layouts')

@section('content')
<?php $i=0; ?>
<section class="content-header">
    <h1>Revisión y asignación de herramientas <small>{{$id->id}}</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li>Formatos de gestión</li>
        <li class="active">Revisión y asignación de herramientas</li>
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
                        <a href="{{route('review_assignment_tools')}}" class="btn btn-sm btn-primary">Volver</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <h4>Revisor</h4>
                    <div class="row">
                        <div class="col-md-6"><strong>Cedula</strong><br>{{$id->revisor->cedula}}</div>
                        <div class="col-md-6"><strong>Nombre del funcionario</strong><br>{{$id->revisor->name}}</div>
                    </div>
                    <h4>Revisado</h4>
                    <div class="row">
                        <div class="col-md-6"><strong>Cedula</strong><br>{{$id->revisado->cedula}}</div>
                        <div class="col-md-6"><strong>Nombre del funcionario</strong><br>{{$id->revisado->name}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Brújula (GPS)</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_1}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_1}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_1))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Multímetro digital</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_2}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_2}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_2))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Cables USB 2.0 o ETHERNET</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_3}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_3}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_3))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Llaves para tableros de BTS, ZTE, HUAWEI</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_4}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_4}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_4))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Ponchadora BNC</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_5}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_5}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_5))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Ponchadora RJ45</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_6}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_6}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_6))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Juego de llaves TORX</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_7}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_7}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_7))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Juego de llaves hexágonas</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_8}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_8}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_8))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Cortafrío</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_9}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_9}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_9))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Pinza</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_10}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_10}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_10))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Bisturí</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_11}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_11}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_11))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Cautín</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_12}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_12}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_12))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Juego de destornilladores de pala y estrella</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_13}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_13}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_13))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Destornillador perillero de pala y estrella</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_14}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_14}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_14))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Alicate</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_15}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_15}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_15))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Mango de sierra</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_16}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_16}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_16))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Juego de llaves combinadas</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_17}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_17}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_17))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Llave de expansión pequeña</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_18}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_18}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_18))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Llave de expansión grande 12 pulgadas</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_19}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_19}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_19))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Unión BNC-BNC súper importante</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_20}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_20}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_20))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Led de prueba súper importante</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_21}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_21}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_21))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Extensión eléctrica</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_22}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_22}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_22))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Martillo</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_23}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_23}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_23))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Tijera de corte especial</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_24}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_24}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_24))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Cortafrío pequeño</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_25}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_25}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_25))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Taladro</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_26}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_26}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_26))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Juego de brocas de lámina</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_27}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_27}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_27))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Broca de muro</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_28}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_28}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_28))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>PC con PTO ETH y los SW para MW, BTS y POWER</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_29}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_29}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_29))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Bolso para portar PC</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_30}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_30}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_30))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Smartphone con app Energitelco. puede ser personal</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_31}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_31}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_31))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Marquilladora con cinta dymo</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_32}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_32}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_32))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Bolso para arnés</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_33}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_33}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_33))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Vehículo o moto</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_34}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_34}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_34))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Llaves de ingreso a sede Energitelco</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_35}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_35}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_35))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Silla</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_36}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_36}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_36))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Escritorio</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_37}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_37}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_37))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Arnés</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_38}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_38}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_38))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Casco</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_39}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_39}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_39))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Barbuquejo</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_40}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_40}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_40))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Gafas de seguridad</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_41}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_41}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_41))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Eslinga en Y</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_42}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_42}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_42))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Eslinga de posicionamiento</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_43}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_43}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_43))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Mosquetón</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_44}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_44}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_44))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Freno para guaya de 10 mm</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_45}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_45}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_45))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Equipo de protección caídas para moto</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_46}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_46}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_46))!!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"><strong>{{++$i}}</strong><br>Impermeable para moto</div>
                        <div class="col-md-4"><strong>Cantidad</strong><br>{{$id->cantidad_47}}</div>
                        <div class="col-md-4"><strong>Marca</strong><br>{{$id->marca_47}}</div>
                        <div class="col-md-12"><strong>Observaciones</strong><br>{!! str_replace("\n", '</br>', addslashes($id->observacion_47))!!}</div>
                    </div>
                    @if ($id->commentary)
                        <hr>
                        <p><b>Comentarios quien aprueba</b><br>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
                    @endif
                    @if ($id->estado == 'Aprobado')
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
                            @can('Aprobar solicitud de Revisión y asignación de herramientas')
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
                        @can('Aprobar solicitud de Revisión y asignación de herramientas')    
                            <a class="btn btn-sm btn-primary btn-send" href="{{ route('review_assignment_tools_approve',$id->id) }}"
                                    onclick="aprobar()">
                                Aprobar y firmar
                            </a>
                            <a class="btn btn-sm btn-danger btn-send" href="{{ route('review_assignment_tools_approve',$id->id) }}"
                                    onclick="no_aprobar()">
                                No aprobar
                            </a>
                            <form id="approval_work_no_4" action="{{ route('review_assignment_tools_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="No aprobado">
                                <textarea name="commentary" id="commentary_b" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                            </form>
                            <form id="approval_work_4" action="{{ route('review_assignment_tools_approve',$id->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Aprobado">
                                <textarea name="commentary" id="commentary_a" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                            </form>
                        @endcan
                    @endif
                    @if ($id->estado == 'Aprobado')
                        @can("Descargar PDF de revisión y asignación de herramientas")
                            <a href="{{route('review_assignment_tools_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
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
            document.getElementById('approval_work_no_4').submit();
        }
        function aprobar() {
            event.preventDefault();
            document.getElementById('commentary_a').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_4').submit();
        }
    </script>
@endsection