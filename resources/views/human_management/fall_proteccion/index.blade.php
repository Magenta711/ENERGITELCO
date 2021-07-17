@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        H-FR-34 INSPECCIÓN DE EQUIPOS DE PROTECCIÓN CONTRA CAÍDAS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Inspección de equipos de protección contra caídas</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de inpecciones de equipos contra caídas</h3>
                <div class="box-tools">
                    @can('Digitar formulario de Inspección de equipos de protección contra caídas')
                        <a href="{{route('fall_protection_equipment_inspection_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                            @foreach ($fall_protections as $fall_protection)
                            <tr>
                                <th scope="row">{{ $fall_protection->id }}</th>
                                <th scope="row">{{ $fall_protection->codigo_formulario ? $fall_protection->codigo_formulario.'-'.$fall_protection->id : 'N/A' }}</th>
                                <td>{{ ($fall_protection->responsableAcargo) ? $fall_protection->responsableAcargo->name : ''}}</td>
                                <td>{{ ($fall_protection->estado != 'Sin aprobar' && $fall_protection->coordinadorAcargo) ? $fall_protection->coordinadorAcargo->name : ''}}</td>
                                <td>{{ $fall_protection->created_at }}</td>
                                <td>
                                    <small class="label {{($fall_protection->estado == 'Sin aprobar') ? 'bg-green' : (($fall_protection->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$fall_protection->estado}}</small>
                                </td>
                                <td>
                                    @if (
                                        auth()->user()->hasPermissionTo('Consultar inspecciones de equipos de protección contra caídas') ||
                                        auth()->user()->hasPermissionTo('Aprobar solicitud de Inspección y protección contra caídas')
                                    )
                                        <a href="{{route('fall_protection_equipment_inspection_show',$fall_protection->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endif
                                    @if ($fall_protection->estado == 'Aprobado')
                                        @can('Descargar PDF de inspecciones de equipos de protección contra caídas')
                                            <a href="{{route("fall_protection_equipment_inspection_download",$fall_protection->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                        @endcan
                                    @endif
                                    @can('Eliminar formato de inspecciones de equipos de protección contra caídas')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$fall_protection->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$fall_protection->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('fall_protection_equipment_inspection_delete',$fall_protection->id)}}" method="post">
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