@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Energía Solar <small>ENERGÍAS</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="">Cotizaciones</li>
        <li class="active">Sistema Solar</li>
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
                            <a href="{{ route('quote_energy_system.create') }}" class="btn btn-info" ><i class="fa fa-plus"></i> Nueva Cotización</a>
                            <a href="{{ route('quote_energy_system.items') }}" class="btn btn-success" ><i class="fa fa-plus"></i> Items de Cotización</a>
                            {{-- <a href="{{ route('energy_sale.create') }}" class="btn btn-success" ><i class="fa fa-plus"></i> Nueva Venta</a> --}}
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
                                        <th class="text-center">Cliente</th>
                                        <th class="text-center">Nit/CC</th>
                                        <th class="text-center">Ubicación</th>
                                        <th class="text-center">Tipo Proyecto</th>
                                        <th class="text-center">Fecha de Creación</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cotizacion as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->client->name }}</td>
                                            <td>{{ $item->client->ide }}</td>
                                            <td>{{ $item->locateProject}}</td>
                                            <td>{{ $item->typeProject }}</td>
                                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('quote_energy_system.generated', $item->id) }}" class="btn btn-info btn-sm" title="Ver Cotización"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('quote_energy_system.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Editar Cotización"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('quote_energy_system.export', $item->id) }}" class="btn btn-success btn-sm" title="Descargar Cotización"><i class="fa fa-download"></i></a>
                                                    <form action="{{ route('quote_energy_system.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Cotización" onclick="return confirm('¿Estás seguro de eliminar esta cotización?')"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                {{-- @can('Editar Ventas')
                                                @endcan
                                                @can('Eliminar Ventas')
                                                    <form action="{{ route('quote_energy_system.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Cotización" onclick="return confirm('¿Estás seguro de eliminar esta cotización?')"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                @endcan --}}
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
