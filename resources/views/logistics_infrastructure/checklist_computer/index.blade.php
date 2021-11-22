@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        L-FR-08 Lista de verificación para el mantenimiento de los computadores
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Inspección detallada de vehículos</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de inpecciones de equipos contra caídas</h3>
                <div class="box-tools">
                    @can('Digitar formulario de lista de verificación para el mantenimiento de computadores')
                        <a href="{{route('checklist_computer_maintenance_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                            @foreach ($checklist_computers as $checklist_computer)
                            <tr>
                                <th scope="row">{{ $checklist_computer->id }}</th>
                                <th scope="row">{{ $checklist_computer->codigo_formulario ? $checklist_computer->codigo_formulario.'-'.$checklist_computer->id : 'N/A' }}</th>
                                <td>{{ ($checklist_computer->responsableAcargo) ? $checklist_computer->responsableAcargo->name : ''}}</td>
                                <td>{{ ($checklist_computer->estado != 'Sin aprobar' && $checklist_computer->coordinadorAcargo) ? $checklist_computer->coordinadorAcargo->name : ''}}</td>
                                <td>{{ $checklist_computer->created_at }}</td>
                                <td>
                                    <small class="label {{($checklist_computer->estado == 'Sin aprobar') ? 'bg-green' : (($checklist_computer->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$checklist_computer->estado}}</small>
                                </td>
                                <td>
                                    @if (
                                        auth()->user()->hasPermissionTo('Aprobar solicitud de lista de verificación para el mantenimiento de computadores') ||
                                        auth()->user()->hasPermissionTo('Consultar listas de verificación para el mantenimiento de los computadores')
                                    )
                                        <a href="{{route('checklist_computer_maintenance_show',$checklist_computer->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endif
                                    @if ($checklist_computer->estado == 'Aprobado')
                                        @can('Descargar PDF de listas de verificación para el mantenimiento de los computadores')
                                            <a href="{{route("checklist_computer_maintenance_download",$checklist_computer->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                        @endcan
                                    @endif
                                    @can('Eliminar formato de listas de verificación para el mantenimiento de los computadores')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$checklist_computer->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$checklist_computer->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('checklist_computer_maintenance_delete',$checklist_computer->id)}}" method="post">
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