@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Solicitudes de empleo <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Solicitudes de empleo</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de solicitudes de empleo</div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Cargo asipira</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($works as $work)
                            <tr>
                                <td>{{$work->id}}</td>
                                <td>{{$work->name}}</td>
                                <td>{{$work->email}}</td>
                                <td>{{$work->position->name}}</td>
                                <td>{{$work->created_at}}</td>
                                <td>
                                    @can('Ver solicitudes de empleo')
                                        <a href="{{route('job_application_show',$work->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Crear entrevistas')
                                        @if (!$work->register)
                                            <a href="{{route('interview_create_application',$work->id)}}" class="btn btn-sm btn-warning">Entrevistar</a>
                                        @endif
                                    @endcan
                                    @can('Eliminar solicitudes de empleo')
                                    <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$work->id}}">Eliminar</button>
                                    
                                    <div class="modal fade" id="modal_delete_{{$work->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('job_application_delete',$work->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="exampleModalLongTitle">Eliminar solicitud de empleo</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro de eliminar la solicitud de empleo de {{$work->name}}?</p>
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