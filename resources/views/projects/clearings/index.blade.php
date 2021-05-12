@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Desmontes <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Desmontes</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de desmontes</div>
            <div class="box-tools">
                @can('Crear proyectos de desmonte')
                    <a href="{{route('clearings_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                        @foreach ($clearings as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>Desmonte MW{{ $item->estation_a.' - '.$item->estation_b }}</td>
                                <td>{{$item->responsable->name}}</td>
                                <td>{{ ($item->status == 3) ? 'En creación' : (( $item->status == 4) ? 'Guardado' : (( $item->status == 0) ? 'Sin aprobar' : (($item->status == 1) ? 'Aprobado' : 'No aprobado' ))) }}</td>
                                <td>{{$item->created_at }}</td>
                                <td>
                                    @can('Crear proyectos de desmonte')
                                        <a href="{{route('clearings_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @if ($item->status == 4 || $item->status == 3)
                                        @can('Editar proyectos de desmonte')
                                            <a href="{{route('clearings_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                    @endif
                                    @can('Exportar proyectos de desmonte')
                                        <a href="{{ route('clearings_export',$item->id) }}" class="btn btn-sm btn-warning">Exportar</a>
                                    @endcan
                                    @can('Eliminar proyectos de desmonte')
                                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('clearings_delete',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar usuario</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar el proyecto Desmonte MW{{ $item->estation_a.' - '.$item->estation_b }}?</p>
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