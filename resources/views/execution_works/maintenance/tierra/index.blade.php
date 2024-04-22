@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Sistema Puesta a Tierra
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Proyectos</li>
        <li class="active">SMU</li>
        <li class="active">Sistema Puesta a Tierra</li>

    </ol>
</section>
<SECTION class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de mantenimientos de Sistema Puesta a Tierra</h3>
            <div class="box-tools">
                    <a href="{{route('land_create', $id->id)}}" class="btn btn-sm btn-success btn-send">Crear</a>
                    <a href="{{ route('SMU', $id->maintenance_id) }}" class="btn btn-sm btn-primary">Volver</a>

            </div>
        </div>
        <div class="box-body">
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Estación Base</th>
                                <th class="text-center">Modalidad</th>
                                <th class="text-center">Encargado</th>
                                <th class="text-center">Último Editor</th>
                                <th class="text-center">Fecha actualización</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($general as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->campus->site_name }}</td>
                                    <td class="text-center">{{ $item->campus->modus }}</td>
                                    <td class="text-center">{{ $item->creador->name }}</td>
                                    <td class="text-center">{{ $item->editor->name ? $item->editor->name : 'Sin editar'  }}</td>
                                    <td class="text-center">{{ $item->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('land_edit', $item->id) }}" class="btn btn-warning">Editar</a>
                                        <a href="{{ route('land_photos',[$item->campus->id, $item->id]) }}" class="btn btn-primary">Fotos</a>
                                        <a href="{{ route('land_export', $item->id) }}" class="btn btn-danger">Exportar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</SECTION>
@endsection
