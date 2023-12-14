@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Solicitud de rutas <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Proyectos</li>
        <li class="active">Rutas</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de solicitudes de rutas</div>
            <div class="box-tools">
                @can('Crear proyectos de rutas')
                    <a href="{{route('routes_create')}}" class="btn btn-sm btn-success">Crear</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del proyecto</th>
                            <th>Responsable</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routes as $route)
                        <tr>
                            <td>{{$route->id}}</td>
                            <td>{{$route->project_name}}</td>
                            <td>{{$route->responsable->name}}</td>
                            <td>{{$route->status == 4 ? 'Guardado' : (($route->status == 3) ? 'Sin aprobar' : (($route->status == 1) ? 'Aprobado' : 'No aprobado'))}}</td>
                            <td>{{$route->created_at}}</td>
                            <td>
                                @can('Ver proyectos de rutas')
                                    <a href="{{route('routes_show',$route->id)}}" class="btn btn-sm btn-success">Ver</a>
                                @endcan
                                @if ($route->status != 1)
                                    @if ($route->status != 2)
                                        @can('Editar proyectos de rutas')
                                            <a href="{{route('routes_edit',$route->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                    @endif
                                @endif
                                @can('Eliminar proyectos de rutas')
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$route->id}}">Eliminar</button>
                                    <div class="modal fade" id="modal_delete_{{$route->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('routes_delete',$route->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar projecto</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar el proyecto {{$route->project_name}}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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