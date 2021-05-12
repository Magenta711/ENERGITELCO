@extends('lte.layouts')

@section('content')
<?php $i=0; ?>

<section class="content-header">
    <h1>Entrega de dotación personal {{$id->id}}</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li>Formatos de gestión</li>
        <li class="active">Entrega de dotación personal</li>
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
                    <a href="{{route('delivery_staffing')}}" class="btn btn-sm btn-primary">Volver</a>
                @endif
            </div>
        </div>
        <div class="box-body">
            <div class="col-xs-12">
                <h4>Empleado</h4>
                <div class="row">
                    <div class="col-xs-12"><strong>Cedula</strong> {{$id->empleado->cedula}}</div>
                    <div class="col-xs-12"><strong>Nombre del funcionario</strong> {{$id->empleado->name}}</div>
                </div>
                    <!-- /.box-header -->
                    <div class="table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Ítem</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Marca</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Overol cuerpo entero Energitelco</td>
                                    <td>{{$id->cantidad_1}}</td>
                                    <td>{{$id->marca_1}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Botas dieléctricas</td>
                                    <td>{{$id->cantidad_2}}</td>
                                    <td>{{$id->marca_2}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Guantes tipo ingeniero</td>
                                    <td>{{$id->cantidad_3}}</td>
                                    <td>{{$id->marca_3}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Tapabocas</td>
                                    <td>{{$id->cantidad_4}}</td>
                                    <td>{{$id->marca_4}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Chaqueta Energitelco</td>
                                    <td>{{$id->cantidad_5}}</td>
                                    <td>{{$id->marca_5}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Camiseta Energitelco</td>
                                    <td>{{$id->cantidad_6}}</td>
                                    <td>{{$id->marca_6}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Pantalón Energitelco</td>
                                    <td>{{$id->cantidad_7}}</td>
                                    <td>{{$id->marca_7}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Protector auditivo</td>
                                    <td>{{$id->cantidad_8}}</td>
                                    <td>{{$id->marca_8}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Gafas o careta para protección visual</td>
                                    <td>{{$id->cantidad_9}}</td>
                                    <td>{{$id->marca_9}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Casco para moto certificadocon placa</td>
                                    <td>{{$id->cantidad_10}}</td>
                                    <td>{{$id->marca_10}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Chaleco reflectivo</td>
                                    <td>{{$id->cantidad_11}}</td>
                                    <td>{{$id->marca_11}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Impermeable</td>
                                    <td>{{$id->cantidad_12}}</td>
                                    <td>{{$id->marca_12}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Motocicleta</td>
                                    <td>{{$id->cantidad_13}}</td>
                                    <td>{{$id->marca_13}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Protectores de rodillas y codos</td>
                                    <td>{{$id->cantidad_14}}</td>
                                    <td>{{$id->marca_14}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Manos libres para conducir vehículos</td>
                                    <td>{{$id->cantidad_15}}</td>
                                    <td>{{$id->marca_15}}</td>
                                </tr>
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>Guantes de caucho</td>
                                    <td>{{$id->cantidad_16}}</td>
                                    <td>{{$id->marca_16}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($id->commentary)
                    <hr>
                    <p><b>Comentarios quien aprueba</b><br>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
                @endif
            @if ($id->estado == 'Aprobado')
            <div class="row">
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-body">
                            <h4>Firmado electrónicamente por el responsable del trabajo o líder</h4>
                            <div class="row">
                                <div class="col-xs-6"><strong>Nombre: </strong>{{$id->responsableAcargo->name}}</div>
                                <div class="col-xs-6"><strong>Cédula: </strong>{{$id->responsableAcargo->cedula}}</div>
                            </div>
                            <p>Solicitud elaborada inicialmente y firmada electrónicamente por <strong>{{$id->responsableAcargo->name}}</strong>, en rol de {{$id->responsableAcargo->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-body">
                            <h4>Firmado electrónicamente por el auditor o coordinador</h4>
                            <div class="row">
                                <div class="col-xs-6"><strong>Nombre: </strong>{{$id->coordinadorAcargo->name}}</div>
                                <div class="col-xs-6"><strong>Cédula: </strong>{{$id->coordinadorAcargo->cedula}}</div>
                            </div>
                            <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->coordinadorAcargo->name}}</strong> en rol de {{$id->coordinadorAcargo->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
                @if ($id->estado == 'Sin aprobar')
                    @can('Aprobar solicitud de entrega de dotación personal')
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
                @can('Aprobar solicitud de entrega de dotación personal')
                    <a class="btn btn-sm btn-primary btn-send" href="{{ route('delivery_staffing_approve',$id->id) }}"
                        onclick="aprobar()">
                        Aprobar y firmar
                    </a>
                    <a class="btn btn-sm btn-danger btn-send" href="{{ route('delivery_staffing_approve',$id->id) }}"
                            onclick="no_aprobar()">
                        No aprobar
                    </a>
                    <form id="approval_work_no_5" action="{{ route('delivery_staffing_approve',$id->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="No aprobado">
                        <textarea name="commentary" id="commentary_b" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                    </form>
                    <form id="approval_work_5" action="{{ route('delivery_staffing_approve',$id->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Aprobado">
                        <textarea name="commentary" id="commentary_a" class="hide" cols="30" rows="3">{{old('commentary')}}</textarea>
                    </form>
                @endcan
            @endif
            @if ($id->estado == 'Aprobado')
                @can('Descargar PDF de entrega de dotación personal')
                    <a href="{{route('delivery_staffing_download',$id->id)}}" class="btn btn-danger btn-sm">Descargar</a>
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
            document.getElementById('approval_work_no_5').submit();
        }
        function aprobar() {
            event.preventDefault();
            document.getElementById('commentary_a').value=document.getElementById('pre_commentary').value;
            document.getElementById('approval_work_5').submit();
        }
    </script>
@endsection