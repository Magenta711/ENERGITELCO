@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        TSS v3 proyecto mintic <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">TSS v3</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title"> proyecto MINTIC</div>
            <div class="box-tools">
                <a href="{{route('mintic_maintenance_create',$id->id)}}" class="btn btn-sm btn-success">Crear</a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>/</td>
                            <td>N° de caso</td>
                            <td>Fecha</td>
                            <td>Estado</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maintenances as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->num}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->status == 1 ? 'Aprobado' : (($item->status == 0) ? 'Sin aprobar' : 'No aprobado')}}</td>
                                <td>
                                    <a href="{{route('mintic_maintenance_show',[$id->id,$item->id])}}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{route('mintic_maintenance_edit',[$id->id,$item->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="{{route('mintic_maintenance_photos',[$id->id,$item->id])}}" class="btn btn-sm bg-teal">Fotos</a>
                                    <a href="{{route('mintic_maintenance_export',[$id->id,$item->id])}}" class="btn btn-sm btn-warning">Exportar</a>
                                    <a href="{{route('mintic_maintenance_edit',[$id->id,$item->id])}}" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection