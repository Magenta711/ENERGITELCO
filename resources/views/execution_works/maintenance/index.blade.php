
@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        MANTENIMIENTO SMU
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Mantenimientos</li>
    </ol>
</section>
<SECTION class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de mantenimientos</h3>
            <div class="box-tools">
                    <a href="{{route('smu_create')}}" class="btn btn-sm btn-success btn-send">Crear</a>
            </div>
        </div>
        <div class="box-body">
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Id Sede</th>
                                <th class="text-center">Nombre </th>
                                <th class="text-center">Estructura</th>
                                <th class="text-center">Fecha modificación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <TR>
                                @foreach ($sedes as $item)
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->id_sede }}</td>
                                    <td class="text-center">{{ $item->site_name }}</td>
                                    <td class="text-center">{{ $item->structure }}</td>
                                    <td class="text-center">{{ $item->updated_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('plant_index', $item->id) }}" class="btn btn-success">Planta Eléctrica</a>
                                        <a href="{{ route('air_index', $item->id) }}" class="btn btn-primary">Aires Acondicionados</a>
                                        <a href="{{ route('strain_index', $item->id) }}" class="btn btn-info">Media, Baja Tensión</a>
                                        <a href="{{ route('land_index', $item->id) }}" class="btn btn-warning">Puesta a Tierra</a>
                                        <a href="" class="btn btn-danger">Eliminar</a>
                                    </td>
                                @endforeach
                            </TR>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</SECTION>
@endsection
