@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Roles <small>roles y permisos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Roles</li>
    </ol>
</section>
@php
    $i = 0;
@endphp
<section class="content">
     
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Lista de roles</div>
                    <div class="box-tools">
                        @can('Crear roles')
                        <a class="btn btn-sm btn-success" href="{{ route('roles.create') }}">Crear un nuevo rol</a>
                        @endcan
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Permisos</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ count($role->permissions) }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('roles.show',$role->id) }}">Ver</a>
                                        @can('Editar roles')
                                        <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan
                                        @can('Eliminar roles')
                                            @if (!($role->id === 1))
                                            <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$role->id}}">Eliminar</button>
                                        
                                            <div class="modal fade" id="modal_delete_{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Eliminar rol</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Está seguro de eliminar el rol {{$role->name}}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            @endif
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