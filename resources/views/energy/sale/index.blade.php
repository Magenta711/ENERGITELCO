@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Energía Solar <small>ENERGÍAS</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Ventas</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title text-center">Ventas</div>
                    <div class="box-tools">
                        @can('Crear Ventas')
                        <a href="{{ route('energy_sale.create') }}" class="btn btn-success" ><i class="fa fa-plus"></i> Nueva Venta</a>
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
                                        <th class="text-center">COD Venta</th>
                                        <th class="text-center">Tipo de Equipo</th>
                                        <th class="text-center">COD - Modelo</th>
                                        <th class="text-center">Comprador</th>
                                        <th class="text-center">Fecha de Venta</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ $sale->id }}</td>
                                            <td>{{ $sale->cod_sale }}</td>
                                            <td>{{ $sale->product->type }}</td>
                                            <td>{{ $sale->product->cod_product  .' - ' .$sale->product->model}}</td>
                                            <td>{{ $sale->client->name }}</td>
                                            <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                @can('Ver Ventas')
                                                <a href="" class="btn btn-info"  data-toggle="modal" data-target=".review-{{ $sale->id }}-modal-lg"><i class="fa fa-eye"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @include('energy.sale.include.review')
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
@endsection
