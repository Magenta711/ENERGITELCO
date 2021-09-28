@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        L-FR-18 CONTROL DE DOCUMENTACIÓN DE CONDUCTORES
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li class="active">Documentación de conductores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de controles de documentos de conductores</h3>
                <div class="box-tools">
                    <a href="{{route('traffic_accident_create')}}" class="btn btn-sm btn-success">Crear</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Vehículo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($traffic_accidents as $traffic_accident)
                            <tr>
                                <th scope="row">{{ $traffic_accident->id }}</th>
                                <td>{{ $traffic_accident->responsable->name }}</td>
                                <td>{{ $traffic_accident->vehicle->plate }}</td>
                                <td>{{ $traffic_accident->date }}</td>
                                <td>
                                    <a href="{{route('traffic_accident_show',$traffic_accident->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{route('traffic_accident_edit',$traffic_accident->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$traffic_accident->id}}">Eliminar</button>
                                    <div class="modal fade" id="delete_{{$traffic_accident->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title">Eliminar accidente</h4>
                                                </div>
                                                <form action="{{route('traffic_accident_delete',$traffic_accident->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>¿Está seguro que desa eliminar el accidente?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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