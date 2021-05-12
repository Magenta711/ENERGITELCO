@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        O-FR-06 REVISIÓN Y ASIGNACIÓN DE HERRAMIENTAS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Revisión y asignación de herramientas</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de revisión y asignación de herramientas</h3>
                <div class="box-tools">
                    {{-- @can($text_permission_create) --}}
                            <a href="{{route('review_assignment_tools_create')}}" class="btn btn-sm btn-success">Crear</a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Código</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review_tools as $review_tool)
                            <tr>
                                <th scope="row">{{ $review_tool->id }}</th>
                                <th scope="row">{{ $review_tool->codigo_formulario ? $review_tool->codigo_formulario.'-'.$review_tool->id : 'N/A' }}</th>
                                <td>{{ ($review_tool->responsableAcargo) ? $review_tool->responsableAcargo->name : ''}}</td>
                                <td>{{ ($review_tool->estado != 'Sin aprobar' && $review_tool->coordinadorAcargo) ? $review_tool->coordinadorAcargo->name : ''}}</td>
                                <td>{{ $review_tool->created_at }}</td>
                                <td>
                                    <small class="label {{($review_tool->estado == 'Sin aprobar') ? 'bg-green' : (($review_tool->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$review_tool->estado}}</small>
                                </td>
                                <td>
                                    <a href="{{route('review_assignment_tools_show',$review_tool->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @if ($review_tool->estado == 'Aprobado')
                                        {{-- @can($text_permission) --}}
                                            <a href="{{route("review_assignment_tools_download",$review_tool->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                        {{-- @endcan --}}
                                    @endif
                                    {{-- @can($text_permission_delete) --}}
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$review_tool->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$review_tool->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('review_assignment_tools_delete',$review_tool->id)}}" method="post">
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
                                    {{-- @endcan --}}
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