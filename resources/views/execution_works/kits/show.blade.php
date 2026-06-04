@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        ASIGNACIÓN DE KITS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Ver Kits</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ver Kits</h3>
                    <div class="box-tools">
                        @can('Editar Kits')
                        <a href="{{route('kits_edit',$id->id)}}" class="btn btn-sm btn-success btn-send">Editar</a>
                        @endcan
                        <a href="{{route('kits')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="serial">Código</label>
                                <p>{{$id->codigo}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nombre del Kit</label>
                                <p>{{$id->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_id">Encargado</label>
                                <p>{{$id->responsable->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="commentary">Comentarios, observaciones o descripción (Historial)</label>
                                <p></p>
                            </div>
                        </div>
                        {{-- @foreach (  as ) --}}
                        {{-- @endforeach --}}
                    </div>
                    <hr>
                    @foreach ($id->tools as $tool) 
                    <div class="form-group row">
                        <div class="col-md-2 col-sm-4 mb-3">
                            <Strong>Implemento</Strong><br>
                            <p>{{ $tool->nombre }}</p>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <label for="amount_${item}">Cantidad</label>
                            <p>{{ $tool->cantidad}}</p>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <label for="marca_${item}">Marca</label>
                            <p>{{ $tool->marca}}</p>
                        </div>
                        <div class="col-md-5 col-sm-12 mb-1">
                            <label for="observacion_${item}">Observaciones</label>
                            <p>{{ $tool->Observaciones}}</p>
                        </div>
                    </div>
                    @endforeach
                   <hr>
                </div>
            </div>
        </div>
    </div>



</section>
@endsection