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
                        <a href="{{ route('mintic_create') }}" class="btn btn-sm btn-success">Crear</a>
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
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->dep . ' - ' . $item->mun }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-default btn-xs pull-right dropdown-toggle" type="button" id="dropdownMenuButton-{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{$item->id}}">
                                                <a class="dropdown-item" href="{{route('mintic_show',$item->id)}}">Ver</a>
                                                <a class="dropdown-item" href="{{route('mintic_edit',$item->id)}}">Editar</a>
                                                <a class="dropdown-item" href="{{route('mintic_pintures',$item->id)}}">Estudio de campo</a>
                                                <a class="dropdown-item" href="{{route('mintic_install',$item->id)}}">Intalación</a>
                                                <a class="dropdown-item" href="{{route('mintic_tss',$item->id)}}">TSS V3</a>
                                                <a class="dropdown-item" href="{{route('mintic_add_consumables',$item->id)}}">Implementaciones</a>
                                                <a class="dropdown-item" href="{{route('mintic_maintenance',$item->id)}}">Mantenimiento</a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</a>
                                            </div>
                                        </div>
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

@section('css')
    <style>
        .dropdown-menu {
            right: 0;
            left: auto;
            width: 200px;
        }
        .dropdown-item{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            padding: 10px;
            white-space: nowrap;
            border-bottom: none;
        }
        .dropdown-item:hover{
            background: rgb(0,0,0,0.05);
            color: #444444;
        }
    </style>
@endsection