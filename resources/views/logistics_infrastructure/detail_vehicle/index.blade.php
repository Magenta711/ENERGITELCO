@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        L-FR-08 INSPECCIÓN DETALLADA DE VEHÍCULOS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Inspección detallada de vehículos</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de inpecciones detallada de vehículos</h3>
                <div class="box-tools">
                    @can('Digitar formulario de inspección detallada de vehículos')
                        <a href="{{route('detailed_inspection_vehicles_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                            @foreach ($detail_vehicles as $detail_vehicle)
                            <tr>
                                <th scope="row">{{ $detail_vehicle->id }}</th>
                                <th scope="row">{{ $detail_vehicle->codigo_formulario ? $detail_vehicle->codigo_formulario.'-'.$detail_vehicle->id : 'N/A' }}</th>
                                <td>{{ ($detail_vehicle->responsableAcargo) ? $detail_vehicle->responsableAcargo->name : ''}}</td>
                                <td>{{ ($detail_vehicle->estado != 'Sin aprobar' && $detail_vehicle->coordinadorAcargo) ? $detail_vehicle->coordinadorAcargo->name : ''}}</td>
                                <td>{{ $detail_vehicle->created_at }}</td>
                                <td>
                                    <small class="label {{($detail_vehicle->estado == 'Sin aprobar') ? 'bg-green' : (($detail_vehicle->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$detail_vehicle->estado}}</small>
                                </td>
                                <td>
                                    @if (
                                        auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección detallada de vehículos') ||
                                        auth()->user()->hasPermissionTo('Consultar inspecciones detalladas de vehículos')
                                    )
                                        <a href="{{route('detailed_inspection_vehicles_show',$detail_vehicle->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endif
                                    @if ($detail_vehicle->estado == 'Aprobado')
                                        @can('Descargar PDF de inspecciones detalladas de vehículos')
                                            <a href="{{route("detailed_inspection_vehicles_download",$detail_vehicle->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                        @endcan
                                    @endif
                                    @can('Eliminar formato de inspecciones detalladas de vehículos')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$detail_vehicle->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$detail_vehicle->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('detailed_inspection_vehicles_delete',$detail_vehicle->id)}}" method="post">
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