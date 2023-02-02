@php
    function getLastRevission(){

    }
@endphp

@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        REVISIÓN DE ASIGNACIÓNES DE PERSONAL
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Revisión de asignación</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de revisión de Kits</h3>
            <div class="box-tools">
                <a href="{{route('kits_review')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="serial">Asignado</label>
                        <p>{{$user->name}}</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user_id">Fecha de última revisión</label>
                        <p>{{getLastRevission()}}</p>
                    </div>
                </div>
            </div>
            @foreach ($user->assigment_kits as $assigments)
                <div class="panel box box">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$assigments->id}}">
                                {{$assigments->kit_asignado->nombre}}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse_{{$assigments->id}}" class="panel-collapse collapse">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Responsable del kit</label>
                                <p>{{$assigments->kit_asignado->responsable->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Fecha de asignación</label>
                                <p>10/10/10</p>
                            </div>
                        </div>
                        <br>
                        <div class="box-body">
                            <h3>Implementos Obligatorios</h3>
                            @foreach ($assigments->kit_asignado->tools as $tool) 
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
                            <h3>Implementos extras</h3>   
                            @foreach ($assigments->extra as $tool_add)
                                <div class="form-group row">
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <Strong>Implemento</Strong><br>
                                        <p>{{ $tool_add->nombre }}</p>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <label for="amount_${item}">Cantidad</label>
                                        <p>{{ $tool_add->cantidad}}</p>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <label for="marca_${item}">Marca</label>
                                        <p>{{ $tool_add->marca}}</p>
                                    </div>
                                    {{-- <div class="col-md-3 col-sm-4">
                                        <select name="status_tools" id="status_tools" disabled="disabled">
                                            <option value=""></option>
                                        </select>
                                    </div> --}}
                                    
                                    <div class="col-md-5 col-sm-12 mb-1">
                                        <label for="observacion_${item}">Observaciones</label>
                                        <p>{{ $tool_add->Observaciones}}</p>
                                    </div>
                                </div>
                            @endforeach
                            <hr>
                            <div class="row">
                                <div class="md">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="commentary">Comentarios, observaciones o descripción (Historial)</label>
                                            <p></p>
                                                <textarea name="" id=" cols="30" rows="2" class="form-control tools_observation"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            @endforeach
        </div>    
    </div>
</section>
@endsection