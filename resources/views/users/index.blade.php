@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Usuarios <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Lista de usuarios</div>
                    <div class="box-tools">
                        @can('Disparar evaluación de desempeño')
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target=".performance_evaluation">Evaluación de desempeño</button>
                        @endcan
                        @can('Realizar llamados de atención a trabajadores')
                            <a class="btn btn-sm btn-warning btn-send" href="{{ route('attention_call_create') }}">Llamado de atención</a>
                        @endcan
                        @can('Exportar usuarios a excel')
                        <a href="{{route('user_export')}}" class="btn btn-sm btn-primary">Exportar</a>
                        @endcan
                        @can('Crear usuarios')
                            <a href="{{route('user_create')}}" class="btn btn-sm btn-success btn-send">Crear</a>
                        @endcan
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->cedula }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->position->name }}</td>
                                    <td>{{ ($user->state == 1)  ? 'Activo' : 'Inactivo' }}</td>
                                    <td>
                                        @can('Ver usuarios')
                                            <a class="btn  btn-sm btn-success btn-send" href="{{ route('user_show',$user->id) }}">Ver</a>
                                        @endcan
                                        @can('Editar usuarios')
                                            <a class="btn btn-sm btn-primary btn-send" href="{{ route('user_edit',$user->id) }}">Editar</a>
                                        @endcan
                                        {{-- @if ($user->register && $user->register->state == 2) --}}
                                            @can('Eliminar usuarios')
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$user->id}}">Eliminar</button>
                                                {{-- Modal Delete --}}
                                                <div class="modal fade" id="modal_delete_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('user_destroy',$user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="exampleModalLongTitle">Eliminar usuario</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Está seguro de eliminar el usuario {{$user->name}}?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-sm btn-danger btn-send">Eliminar</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                @endcan
                                            {{-- @else --}}
                                                @can('Terminar contratación de usuarios')
                                                
                                                    <a href="{{route('user_end_work',$user->id)}}" class="btn btn-sm btn-warning btn-send">Terminar</a>
                                                @endcan
                                            {{-- @endif --}}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Evaluación de desempeño --}}
    <div class="modal fade performance_evaluation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Nueva evaluación de desempeño</h4>
                </div>
                <form action="{{route('performance_evaluation_create')}}" method="post">
                @csrf
                    <div class="modal-body">
                        <p>¿Desea disparar el envio de la evaluación de desempeño a todos los usuarios activos?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-sm btn-success btn-send">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection