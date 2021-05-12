@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Evaluaciones a proveedores <small>Evaluaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Evaluaciones a proveedores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de evaluaciones</div>
            <div class="box-tools">
                @can('Disparar evaluación a proveedores')
                <a data-toggle="modal" data-target=".supplier_evaluation" class="btn btn-sm btn-success">Gestionar nueva evaluación</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del proveedor</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->provider->name}}</td>
                            <td>{{$item->responsable->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                {{$item->state == 1 ? 'Sin responder' : ($item->state == 0 ? 'Sin calificar' : 'Calificado')}}
                            </td>
                            <td>
                                @can('Ver evaluaciones de proveedores')
                                <a href="{{route('supplier_evaluation_show',$item->id)}}" class="btn btn-sm btn-success btn-send">Ver</a>
                                @endcan
                                @if ($item->state == 0 || $item->state == 1)
                                @can('Disparar evaluación a proveedores')
                                    @if ($item->state == 1)
                                        <a href="{{route('supplier_evaluation_remember',$item->id)}}" class="btn btn-sm btn-warning btn-send">Recordar</a>
                                    @endif
                                @endcan
                                @can('Calificar evaluaciones de proveedores')
                                    <a href="{{route('supplier_evaluation_responde',$item->id)}}" class="btn btn-sm btn-primary btn-send">Calificar</a>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Modal Evaluación de desempeño --}}
    <div class="modal fade supplier_evaluation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Nueva evaluación de desempeño</h4>
                </div>
                <form action="{{route('supplier_evaluation_create')}}" method="post">
                @csrf
                    <div class="modal-body">
                        <p>¿Desea disparar el envio de la evaluación de proveedores a todos los que estan activos?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-sm btn-success btn-send">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection