@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Clientes <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Clientes</a></li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de clientes</h3>
                    <div class="box-tools">
                        @can('Crear clientes')
                        <a href="{{route('customer_create')}}" class="btn btn-sm btn-success">Crear</a>
                        @endcan
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->state ? 'Activo' : 'Inactivo'}}</td>
                                    <td>
                                        @can('Ver clientes')
                                            <a href="{{route('customer_show',$customer->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('Editar clientes')
                                            <a href="{{route('customer_edit',$customer->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @can('Enviar evaluación de satisfacción del cliente')
                                        @csrf
                                            <button type="button" class="btn btn-sm btn-warning pl-4 pr-4" data-toggle="modal" data-target="#modal_send_test_{{$customer->id}}">Enviar evaluación</button>

                                            <div class="modal fade" id="modal_send_test_{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="{{route('new_customer_evaluation',$customer->id)}}" method="post">
                                                        @csrf
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Enviar evaluación de satisfacción al cliente</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Está seguro de de enviar evaluación de satisfacción de cliente a {{$customer->name}}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        @endcan
                                        @can('Eliminar clientes')
                                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$customer->id}}">Eliminar</button>
                                        
                                        <div class="modal fade" id="modal_delete_{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('customer_destroy',$customer->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar cliente</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar el cliente {{$customer->name}}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        @endcan
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </ul>
</section>
@endsection