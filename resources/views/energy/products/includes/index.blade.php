@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Energía Solar <small>ENERGÍAS</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Productos</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title text-center">Productos</div>
                    <div class="box-tools">
                        @can('Crear Productos')
                        <a class="btn btn-success" data-toggle="modal" data-target=".category-modal-lg">Agregar Categoría</a>
                        <a href="{{ route('energy_products.create') }}" class="btn btn-success">Agregar Productos</a>
                        @endcan
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-body">
                        <div class="table-responsive table-hover">
                            <table id="table_index" class="table table-striped table-bordered text-center" data-page-length='15'>
                                <thead>
                                    <tr>
                                        <th class="text-center">Codigo de Producto </th>
                                        <th class="text-center">Modelo </th>
                                        <th class="text-center">Tipo Producto</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($id as $item)
                                        <tr>
                                            <td>{{ $item->cod_product }}</td>
                                            <td>{{ $item->model }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->status == 1 ? 'En Bodega' : ( $item->status == 3 ? 'Vendido' : 'Pendiente') }}</td>
                                            <td>${{ number_format($item->price, 2, ',', '.') }}</td>
                                            <td>
                                                @can('Ver Productos')
                                                <a href="" class="btn btn-info"  data-toggle="modal" data-target=".review-{{ $item->id }}-modal-lg"><i class="fa fa-eye"></i></a>
                                                @endcan
                                                @if ($item->status==1)
                                                @can('Editar Productos')
                                                <a href="" class="btn btn-warning" data-toggle="modal" data-target=".edit-{{ $item->id }}-modal-lg"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('ELiminar Productos')
                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target=".delete-{{ $item->id }}-modal-lg"><i class="fa fa-trash"></i></a>
                                                @endcan
                                                @endif
                                            </td>
                                        </tr>
                                        @include('energy.products.includes.delete')
                                        @include('energy.products.includes.edit')
                                        @include('energy.products.includes.review')
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
@include('energy.products.includes.category')

@endsection
