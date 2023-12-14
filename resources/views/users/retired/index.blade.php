@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Usuarios retirados <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Usuarios retirados</li>
    </ol>
</section>
<section class="content">
     
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Lista de usuarios retirados</div>
                    <div class="box-tools">
                        <a href="{{route('user_export')}}" class="btn btn-sm btn-primary hide">Exportar</a>
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
                                            <a class="btn  btn-sm btn-success" href="{{ route('user_show',$user->id) }}">Ver</a>
                                        @endcan
                                        @can('Restaurar usuarios eliminados')
                                            <a href="{{route('restore',$user->id)}}" class="btn btn-sm btn-danger">Restaurar</a>
                                        @endcan
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
</section>
@endsection