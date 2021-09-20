@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Prima de servicios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Prima de servicios</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Prima de servicios</h3>
                <div class="box-tools">
                    @can('Digitar prima de servicios')
                        <a href="{{route('premium_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                            @foreach ($premiums as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>H-FR-32-{{$item->id}}</td>
                                    <td>{{$item->responsable->name}}</td>
                                    <td>{{$item->approve ? $item->approve->name:''}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->estado}}</td>
                                    <td>
                                        @can('Consultar prima de servicios')
                                            <a href="{{route('premium_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @if ($item->estado == "Sin aprobar")
                                            @can('Editar prima de servicios')
                                                <a href="{{route('premium_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                            @endcan
                                        @endif
                                        @if ($item->estado == "Aprobado")
                                            @can('Descargar lista de pago de prima de servicios')
                                                <a href="{{route('premium_download',$item->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                            @endcan
                                        @endif
                                        @can('Eliminar formato de prima de servicios')
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$item->id}}">Eliminar</button>
                                            <div class="modal fade" id="delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title">Eliminar prima</h4>
                                                        </div>
                                                        <form action="{{route('premium_delete',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <div class="modal-body">
                                                                <p>¿Está seguro que desa eliminar la prima?</p>
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