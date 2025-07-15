@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Energía Solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Energías</li>
            <li class="active">Tienda</li>
            <li class="active">Ventas de la tienda</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title text-center">Ventas de la tienda</div>
                        @can('Crear Productos')
                        <div class="box-tools">
                            <a class="btn btn-info" data-toggle="modal" data-target=".costo-envio-modal-lg">Costos de Envío</a>
                        </div>
                        @endcan
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                            <div class="table-responsive table-hover">
                                <table id="table_index" class="table table-striped table-bordered text-center"
                                    data-page-length='15'>
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Referencia </th>
                                            <th class="text-center">Comprador</th>
                                            <th class="text-center">Valor Compra</th>
                                            <th class="text-center">Estado transacción</th>
                                            <th class="text-center">Recolección del Paquete</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ventas as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->reference }}</td>
                                                <td>{{ $item->client->name }}</td>
                                                <td>${{ number_format($item->valor+$item->valor_envio, 2, ',', '.') }}</td>
                                                <td>{{ $item->status == 'APPROVED' ? 'Aprovada' : 'Pendiente' }}</td>
                                                <td>{{ $item->collect == 'envio' ? 'Envío' : 'Recoger en sede' }}</td>
                                                <td>
                                                    <a href="{{ route('energy_store_ventas_show.ventas_show', $item->reference) }}" class="btn btn-info"><i
                                                            class="fa fa-eye"></i></a>
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
            @include('energy.products.includes.shipping')
    </section>
@endsection
