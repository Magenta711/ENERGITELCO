@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        D-FR-12	ACCIONES CORRECTIVAS Y DE MEJORA
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li class="active">Acciones correctivas y de mejora</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de acciones correctivas y de mejora</h3>
                <div class="box-tools">
                    @can('Crear acciones de mejora')
                            <a href="{{route('improvement_action_create')}}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
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
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($improvements as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <th>D-FR-12-{{ $item->id }}</th>
                                <td>{{ $item->responsable->name }}</td>
                                <td>{{ $item->status == 1 ? 'Acción cerrada' : ($item->status == 2 ? 'Pedientes' : 'Acción no posible de cerrar' ) }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @can('Ver acciones de mejora')
                                        <a href="{{route('improvement_action_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Editar acciones de mejora')
                                        <a href="{{route('improvement_action_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    @endcan
                                    @can('Descargar acciones de mejora')
                                        <a href="{{route("improvement_action_download",$item->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                    @endcan
                                    @can('Eliminar acciones de mejora')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$item->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar acción</h4>
                                                    </div>
                                                    <form action="{{route('improvement_action_delete',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <div class="modal-body">
                                                            <p>¿Está seguro que desa eliminar la acción?</p>
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
                        <tfoot>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Código</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection