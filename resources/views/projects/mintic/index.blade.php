@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        MINTIC <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">MINTIC</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de proyectos MINTIC</div>
            <div class="box-tools">
                @can('Crear proyectos de MINTIC')
                    <a href="{{route('mintic_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                            <th>Lugar</th>
                            <th>Fecha modificación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mintics as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{$item->dep .' - '. $item->mun}}</td>
                                <td>{{$item->updated_at }}</td>
                                <td>
                                    @can('Ver proyectos de MINTIC')
                                        <a href="{{route('mintic_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Editar proyectos de MINTIC')
                                        <a href="{{route('mintic_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    @endcan
                                    @can('Adjuntar y ver fotos de proyectos mintic')
                                    <a href="{{route('mintic_pintures',$item->id)}}" class="btn btn-sm btn-warning">Estudio de campo</a>
                                    @endcan
                                    @can('Adjuntar y ver fotos de proyectos mintic')
                                        <a href="{{route('mintic_install',$item->id)}}" class="btn btn-sm bg-teal">Instalación</a>
                                    @endcan
                                    @can('Adjuntar y ver fotos de proyectos mintic')
                                        <a href="{{route('mintic_tss',$item->id)}}" class="btn btn-sm bg-maroon">TSS v3</a>
                                    @endcan
                                    @can('Ver implementación proyectos de MINTIC')
                                        <a href="{{route('mintic_add_consumables',$item->id)}}" class="btn btn-sm bg-purple">Implementación</a>
                                    @endcan
                                    @can('Eliminar proyectos de MINTIC')
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('mintic_delete',$item->id)}}" method="POST">
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