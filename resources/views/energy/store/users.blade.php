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
            <li class="active">Usuarios de la tienda</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title text-center">Usuarios de la tienda</div>
                        <div class="box-tools">
                            @can('Crear Clientes')
                                <a href="" class="btn btn-success" data-toggle="modal" data-target=".create-modal-lg"><i
                                        class="fa fa-plus"></i> Crear Cliente</a>
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
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Nombre </th>
                                            <th class="text-center">Correo Electrónico</th>
                                            <th class="text-center">Telefóno</th>
                                            <th class="text-center">Compras Realizadas</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->number }}</td>
                                                <td>{{ count($item->compras) }}</td>
                                                <td>
                                                    <a href="" class="btn btn-info" data-toggle="modal"
                                                        data-target=".review-{{ $item->id }}-modal-lg"><i
                                                            class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>


                                            <div class="modal fade review-{{ $item->id }}-modal-lg" tabindex="-1"
                                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center"><b>{{ $item->name }}</b>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="name">Nombre</label>
                                                                        <p>{{ $item->name }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="email">Correo Electrónico</label>
                                                                        <p>{{ $item->email }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="number">Telefóno</label>
                                                                        <p>{{ $item->number }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            @if (!empty($item->locate))
                                                            <h4>Ubicación</h4>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="locate">Dirección</label>
                                                                            <p>{{ $item->locate['address'] ?? '' }} - {{ $item->locate['house'] ?? '' }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="locate">Ciudad</label>
                                                                            <p>{{ $item->locate['city'] ?? '' }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="locate">COD Postal</label>
                                                                            <p>{{ $item->locate['cod_postal'] ?? '' }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="locate">Persona de contacto</label>
                                                                            <p>{{ $item->locate['name_contact'] ?? '' }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="locate">Número de la persona de contacto</label>
                                                                            <p>{{ $item->locate['number_contact'] ?? '' }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            @endif
                                                            @if ($item->compras->isEmpty())
                                                                <div class="alert alert-warning text-center">
                                                                    <strong>No hay compras registradas para este cliente.</strong>
                                                                </div>
                                                            @else
                                                                <h4 class="text-center">Compras Realizadas</h4>
                                                                <p class="text-center">A continuación se muestran las compras realizadas por el cliente.</
                                                                    <hr>
                                                                    @foreach ($item->compras as $items)
                                                                        <div class="row">
                                                                            <div class="col-md-12 text-center">
                                                                                <a href="{{ route('energy_store_ventas_show.ventas_show', $items->reference) }}"><h4>Compra #{{ $items->reference }}</h4></a>
                                                                                <p><b>Fecha:</b> {{ $items->created_at }}</p>
                                                                                <p><b>Total:</b> ${{ number_format($items->valor+$items->valor_envio, 2, ',', '.') }}</p>
                                                                                <p><b>Estado:</b> {{ $items->status }}</p>
                                                                            </div>
                                                                        </div>
                                                                    <hr>
                                                                    @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
