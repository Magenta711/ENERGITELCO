@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Energía Solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Productos</li>
            <li class="active">Categoría</li>
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
                                <a class="btn btn-success" data-toggle="modal" data-target=".category-create-modal-lg">Agregar
                                Categoría</a>
                             @endcan
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                            <div class="table-responsive table-hover">
                                <table id="table_index" class="table table-striped table-bordered text-center"
                                    data-page-length='15'>
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Categoría</th>
                                            <th class="text-center">Cantidad de productos</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($id as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->CountCategoryProducts($item->id) }}</td>
                                                <td>
                                                    @can('Ver Productos')
                                                        <a href="{{ route('energy_products_category.show', $item->id) }}" class="btn btn-info"><i
                                                                class="fa fa-eye"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @include('energy.products.includes.category')
        </section>
@endsection
