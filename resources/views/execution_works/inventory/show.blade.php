@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ver herramientas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Herramientas</a></li>
        <li class="active">Ver herramientas</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ver herramienta</h3>
                    <div class="box-tools">
                        <a href="{{route('inventory_tools')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="serial">Serial</label>
                                <p>{{$id->serial}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <p>{{$id->name}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_id">Funcionario</label>
                                <p>{{ $id->user_id ? $id->user->name : '' }}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="commentary">Comentarios, observaciones o descripción (Historial)</label>
                                <p>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </ul>
</section>
@endsection