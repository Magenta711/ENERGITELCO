@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        REGISTRO DE DOCUMENTACIÓN Y MANTENIMIENTO DE VEHÍCULOS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li class="active">Registro de documentación y mantenimiento de vehículos</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de registros</h3>
                <div class="box-tools">
                    <a href="{{route('vehicle_documentation_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                            @foreach ($vehicle_documentations as $vehicle_documentation)
                            <tr>
                                <th scope="row">{{ $vehicle_documentation->id }}</th>
                                <td>{{ $vehicle_documentation->responsable->name }}</td>
                                <td>{{ $vehicle_documentation->vehicle->plate }}</td>
                                <td>{{ $vehicle_documentation->date }}</td>
                                <td>
                                    <a href="{{route('vehicle_documentation_show',$vehicle_documentation->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{route('vehicle_documentation_edit',$vehicle_documentation->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$vehicle_documentation->id}}">Eliminar</button>
                                    <div class="modal fade" id="delete_{{$vehicle_documentation->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title">Eliminar accidente</h4>
                                                </div>
                                                <form action="{{route('vehicle_documentation_delete',$vehicle_documentation->id)}}" method="post">
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