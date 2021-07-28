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
                    <a href="{{route('drivers_create')}}" class="btn btn-sm btn-success">Crear</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Código</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Conductor</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drivers as $driver)
                            <tr>
                                <th scope="row">{{ $driver->id }}</th>
                                <th scope="row">L-FR--18-{{ $driver->id }}</th>
                                <td>{{ $driver->responsable->name }}</td>
                                <td>{{ $driver->user->name }}</td>
                                <td>{{ $driver->created_at }}</td>
                                <td>
                                    <small class="label {{($driver->status == 1) ? 'bg-green' : 'bg-red' }}">{{$driver->status == 1 ? 'Listo' : 'Penditentes'}}</small>
                                </td>
                                <td>
                                    <a href="{{route('drivers_show',$driver->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{route('drivers_edit',$driver->id)}}" class="btn btn-sm btn-success">Editar</a>
                                    <a href="{{route("drivers_download",$driver->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                    @can('Eliminar formato de inspecciones detalladas de vehículos')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$driver->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$driver->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('drivers_delete',$driver->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <div class="modal-body">
                                                            <p>¿Está seguro que desa eliminar el formato?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
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