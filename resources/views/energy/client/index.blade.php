@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Energía Solar <small>ENERGÍAS</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Clientes</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title text-center">Clientes</div>
                    <div class="box-tools">
                        @can('Crear Clientes')
                        <a href="" class="btn btn-success" data-toggle="modal" data-target=".create-modal-lg"><i class="fa fa-plus"></i> Crear Cliente</a>
                        @endcan
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-body">
                        <div class="table-responsive table-hover">
                            <table id="table_index" class="table table-striped table-bordered text-center" data-page-length='15'>
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nombre </th>
                                        <th class="text-center">Tipo de Identificación</th>
                                        <th class="text-center">Identificación</th>
                                        <th class="text-center">Compras Realizadas</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($id as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->typeId }}</td>
                                            <td>{{ $item->ide }}</td>
                                            <td>{{ count($item->ventas) }}</td>
                                            <td>
                                                @can('Ver Clientes')
                                                    <a href="" class="btn btn-info" data-toggle="modal" data-target=".show-{{ $item->id }}-modal-lg"><i class="fa fa-eye"></i></a>
                                                @endcan
                                                @can('Editar Clientes')
                                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target=".edit-{{ $item->id }}-modal-lg"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('ELiminar Clientes')
                                                    @if (count($item->ventas)==0)
                                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target=".delete-{{ $item->id }}-modal-lg"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                @endcan
                                            </td>
                                        </tr>
                                        @include('energy.client.include.show')
                                        @include('energy.client.include.edit')
                                        @include('energy.client.include.delete')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('energy.client.include.create')
@endsection
