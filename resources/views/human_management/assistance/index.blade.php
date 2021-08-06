@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Asistencias
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li class="active">Asistencia</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools">
                    @can('Tomar asistecia')
                        <a href="{{route('assistance_create')}}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assistances as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->responsable->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        @can('Ver asistencia')
                                            <a href="{{route('assistance_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('Editar asistencia')
                                            <a href="{{route('assistance_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @can('Eliminar asistencia')
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$user->id}}">Eliminar</button>
                                            <div class="modal fade" id="modal_delete_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('assistance_delete',$user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Eliminar asistencia</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Está seguro de eliminar asistencia {{$user->date}}?</p>
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