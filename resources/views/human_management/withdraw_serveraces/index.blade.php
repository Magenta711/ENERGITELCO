@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        SOLICITUDES DE CARTA DE RETIRO DE CESANTÍAS O LABORAL
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li class="active">Solicitud de carta de retiro de cesantías o laboral</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de solicitudes de retiro de cesantías</h3>
                <div class="box-tools">
                    {{-- @can($text_permission_create) --}}
                        <a href="{{route('request_withdraw_severance_create')}}" class="btn btn-sm btn-success">Crear</a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraw_serveraces as $withdraw_serverace)
                            <tr>
                                <th scope="row">{{ $withdraw_serverace->id }}</th>
                                <td>{{ ($withdraw_serverace->responsableAcargo) ? $withdraw_serverace->responsableAcargo->name : ''}}</td>
                                <td>{{ ($withdraw_serverace->estado != 'Sin aprobar' && $withdraw_serverace->coordinadorAcargo) ? $withdraw_serverace->coordinadorAcargo->name : ''}}</td>
                                <td>{{$withdraw_serverace->reason}}</td>
                                <td>{{ $withdraw_serverace->created_at }}</td>
                                <td>
                                    <small class="label {{($withdraw_serverace->estado == 'Sin aprobar') ? 'bg-green' : (($withdraw_serverace->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$withdraw_serverace->estado}}</small>
                                </td>
                                <td>
                                    <a href="{{route('request_withdraw_severance_show',$withdraw_serverace->id)}}" class="btn btn-sm btn-success">Ver</a>
                                   
                                    {{-- @can($text_permission_delete) --}}
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$withdraw_serverace->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$withdraw_serverace->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('request_withdraw_severance_delete',$withdraw_serverace->id)}}" method="post">
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