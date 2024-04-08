
@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Plantas Eléctricas
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Proyectos</li>
        <li class="active">SMU</li>
        <li class="active">Plantas Eléctricas</li>

    </ol>
</section>
<SECTION class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de mantenimientos de Planta Eléctrica</h3>
            <div class="box-tools">
                    <a href="{{route('plant_create', $id->id)}}" class="btn btn-sm btn-primary btn-send">Crear</a>
            </div>
        </div>
        <div class="box-body">
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_minitc" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Estación Base</th>
                                <th class="text-center">Jefatura </th>
                                <th class="text-center">Modalidad</th>
                                <th class="text-center">Fecha creación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($general as $item)
                            <TR>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->name_base }}</td>
                                    <td class="text-center">{{ $item->leadership }}</td>
                                    <td class="text-center">{{ $item->modus }}</td>
                                    <td class="text-center">{{ $item->created_at->format('Y-m-d') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('plant_edit', $item->id) }}" class="btn btn-warning">Editar</a>
                                        <a href="" class="btn btn-primary">Fotos</a>
                                        <a href="{{ route('plant_export', $item->id) }}" class="btn btn-danger">Exportar</a>
                                    </td>
                                </TR>
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
