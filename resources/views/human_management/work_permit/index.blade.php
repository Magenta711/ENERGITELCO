@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        H-FR-23 PERMISOS DE TRABAJO
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Permisos de trabajo</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de permisos de trabajo</h3>
                <div class="box-tools">
                    <a href="{{ route('work_permit',['all' => true]) }}" class="btn btn-sm btn-warning">Todos</a>
                    @can('Digitar formulario de Permisos de trabajo')
                        <a href="{{route('work_permit_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                <th scope="col">Funcionarios</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Vehículo</th>
                                <th scope="col">Estación base</th>
                                <th scope="col">Permiso de acturas</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($work_permits as $work_permit)
                            <tr>
                                <th scope="row">{{ $work_permit->id }}</th>
                                <th scope="row">{{ $work_permit->codigo_formulario ? $work_permit->codigo_formulario.'-'.$work_permit->id : 'N/A' }}</th>
                                <td>{{$work_permit->responsableAcargo->name ?? '' }}</td>
                                <td>
                                    @foreach ($work_permit->users as $item)
                                        - {{$item->name}}<br>
                                    @endforeach
                                </td>
                                <td>{{$work_permit->estado != 'Sin aprobar' && $work_permit->coordinadorAcargo ? $work_permit->coordinadorAcargo->name : ''}}</td>
                                <td>
                                    @if ($work_permit->vehicle)
                                        {{$work_permit->vehicle->plate}}
                                    @elseif($work_permit->placa_vehiculo)
                                        {{$work_permit->placa_vehiculo}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $work_permit->nombre_eb ?? 'N/A'  }}</td>
                                <td>{{ $work_permit->max_altura ?? 'N/A' }}</td>
                                <td>{{ $work_permit->created_at }}</td>
                                <td>
                                    <small class="label {{($work_permit->estado == 'Sin aprobar') ? 'bg-green' : (($work_permit->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$work_permit->estado}}</small>
                                </td>
                                <td>
                                    @can('Consultar permisos de trabajo')
                                        <a href="{{route('work_permit_show',$work_permit->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @if ($work_permit->estado == 'Aprobado')
                                        @can('Descargar PDF de permisos de trabajo')
                                            <a href="{{route("work_permit_download",$work_permit->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                        @endcan
                                    @endif
                                    @can('Eliminar formato de permisos de trabajo')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$work_permit->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$work_permit->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('work_permit_delete',$work_permit->id)}}" method="post">
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
                        <tfoot>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Código</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Funcionarios</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Vehículo</th>
                                <th scope="col">Estación base</th>
                                <th scope="col">Permiso de acturas</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection