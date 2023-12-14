@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Lista de formatos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Formatos de gestión</a></li>
        <li class="active">Lista de formatos</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$name_work}}</h3>
                <div class="box-tools">
                    @if ($list == 1)
                        @can('Lista de bonificaciones de permisos de trabajo')
                            <a href="{{ route('form_1_bonus_index') }}" class="btn btn-sm btn-warning">Bonificaciones</a>
                        @endcan
                    @endif
                    @can($text_permission_create)
                            <a href="{{route('formulario',$list)}}" class="btn btn-sm btn-success">Crear</a>
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
                                <th scope="col">Fecha de la solicitud</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trabajos as $trabajo)
                            <tr>
                                <th scope="row">{{ $trabajo->id }}</th>
                                <th scope="row">{{ $trabajo->codigo_formulario ? $trabajo->codigo_formulario.'-'.$trabajo->id : 'N/A' }}</th>
                                <td>{{ $trabajo->created_at }}</td>
                                <td>{{ ($trabajo->responsableAcargo) ? $trabajo->responsableAcargo->name : ''}}</td>
                                <td>
                                    <small class="label {{($trabajo->estado == 'Sin aprobar') ? 'bg-green' : (($trabajo->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$trabajo->estado}}</small>
                                </td>
                                <td>
                                    <a href="{{route('approval_form',[$list,$trabajo->id])}}" class="btn btn-sm btn-success">Ver</a>
                                    @if ($list == 8 && $trabajo->estado != 'Aprobado')
                                        <a href="{{route('form_edit',[$list,$trabajo->id])}}" class="btn btn-sm btn-primary">Ediar</a>
                                    @endif
                                    @if ($trabajo->estado == 'Aprobado')
                                        @can($text_permission)
                                            <a href="{{route("exportar",[$list,$trabajo->id])}}" class="btn btn-warning btn-sm">Descargar</a>
                                        @endcan
                                    @endif
                                    @can($text_permission_delete)
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$trabajo->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$trabajo->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('format_delete',[$list,$trabajo->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <div class="modal-body">
                                                            <p>¿Está seguro que desa eliminar el formato?</p>
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
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection