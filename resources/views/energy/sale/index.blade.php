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
                                <a href="{{ route('energy_sale.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
                                    Nueva Venta</a>
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
                                            <th class="text-center">COD Venta</th>
                                            <th class="text-center">Tipo de Equipo</th>
                                            <th class="text-center">COD - Modelo</th>
                                            <th class="text-center">Comprador</th>
                                            <th class="text-center">Fecha de Venta</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{ $sale->id }}</td>
                                                <td>{{ $sale->cod_sale }}</td>
                                                @if ($sale->product)
                                                    <td>{{ $sale->product->type }}</td>
                                                    <td>{{ $sale->product->cod_product . ' - ' . $sale->product->model }}
                                                    </td>
                                                @else
                                                    <td>Varios</td>
                                                    <td>Varios</td>
                                                @endif
                                                <td>{{ $sale->client->name }}</td>
                                                <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $sale->status }}</td>
                                                <td>
                                                    @can('Ver Ventas')
                                                        <a href="{{ route('energy_sale.review', $sale->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                        @if (!$sale->product && $sale->status != 'Revertida')
                                                            <a class="btn btn-warning" id="reverse_button_{{ $sale->id }}" data-id="{{ $sale->id }}"><i class="fa fa-undo"></i></a>
                                                        @endif
                                                    @endcan
                                                    <form action="" method="POST" id="reverse_form">
                                                        @csrf
                                                    </form>
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
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('a[id^="reverse_button_"]').click(function(e) {
                e.preventDefault();
                var saleId = $(this).data('id');
                if (confirm('¿Está seguro de que desea revertir esta venta?')) {
                    $('#reverse_form').attr('action', '/energy/sales/reverse/' + saleId);
                    $('#reverse_form').submit();
                }
            });
        })
    </script>
@endsection
