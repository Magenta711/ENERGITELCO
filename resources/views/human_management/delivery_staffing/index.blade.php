@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        H-FR-09 ENTREGA DE DOTACIÓN PERSONAL
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Entrega de dotación personal</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de entrega de dotación personal</h3>
                <div class="box-tools">
                    @can('Digitar formulario de entrega de dotación personal')
                        <a href="{{route('delivery_staffing_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                <th scope="col">Responsable</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($delivery_staffings as $delivery_staffings)
                            <tr>
                                <th scope="row">{{ $delivery_staffings->id }}</th>
                                <th scope="row">{{ $delivery_staffings->codigo_formulario ? $delivery_staffings->codigo_formulario.'-'.$delivery_staffings->id : 'N/A' }}</th>
                                <td>{{ ($delivery_staffings->responsableAcargo) ? $delivery_staffings->responsableAcargo->name : ''}}</td>
                                <td>{{ ($delivery_staffings->estado != 'Sin aprobar' && $delivery_staffings->coordinadorAcargo) ? $delivery_staffings->coordinadorAcargo->name : ''}}</td>
                                <td>{{ $delivery_staffings->created_at }}</td>
                                <td>
                                    <small class="label {{($delivery_staffings->estado == 'Sin aprobar') ? 'bg-green' : (($delivery_staffings->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$delivery_staffings->estado}}</small>
                                </td>
                                <td>
                                    @if (
                                        auth()->user()->hasPermissionTo('Aprobar solicitud de entrega de dotación personal') ||
                                        auth()->user()->hasPermissionTo('Consultar entrega de dotación personal')
                                    )
                                        <a href="{{route('delivery_staffing_show',$delivery_staffings->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endif
                                    @if ($delivery_staffings->estado == 'Aprobado')
                                        @can('Descargar PDF de entrega de dotación personal')
                                            <a href="{{route("delivery_staffing_download",$delivery_staffings->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                        @endcan
                                    @endif
                                    @can('Eliminar formato de entrega de dotación personal')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$delivery_staffings->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$delivery_staffings->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('delivery_staffing_delete',$delivery_staffings->id)}}" method="post">
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