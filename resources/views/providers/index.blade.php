@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Proveedores <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proveedores</a></li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de proveedores</h3>
                    <div class="box-tools">
                        @can('Disparar evaluación a proveedores')
                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target=".supplier_evaluation">Evaluación a proveedores</a>
                        @endcan
                        @can('Crear proveedores')
                            <a href="{{route('provider_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                <tr>
                                    <td>{{$provider->id}}</td>
                                    <td>{{$provider->name}}</td>
                                    <td>{{$provider->email}}</td>
                                    <td>{{$provider->type_provider->type}}</td>
                                    <td>{{$provider->state == 1 ? 'Activo' : 'Inactivo'}}</td>
                                    <td>
                                        @can('Ver proveedores')
                                        <a href="{{route('provider_show',$provider->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('Editar proveedores')
                                        <a href="{{route('provider_edit',$provider->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @can('Eliminar proveedores')
                                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$provider->id}}">Eliminar</button>
                                        
                                        <div class="modal fade" id="modal_delete_{{$provider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('provider_destroy',$provider->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar proveedor</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar el proveedor {{$provider->name}}?</p>
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
                        <button class="btn btn-sm btn-success">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection