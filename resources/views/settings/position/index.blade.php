@extends('lte.layouts')

@section('content')

<section class="content-header">
    <h1>
        Cargo <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Cargo</li>
    </ol>
</section>

<section class="content">
     
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-cubes"></i>
            <h3 class="box-title">Configuraciones de cargos</h3>
            <div class="box-tools">
                <a href="{{ route('position_setting_create') }}" class="btn btn-sm btn-success">Crear</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-boby">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>Ítem</th>
                            <th>Descripción de la actividad</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $position)
                            <tr>
                                <td>{{ $position->id }}</td>
                                <td>{{ $position->name }}</td>
                                <td>{{ $position->user_count() }}</td>
                                <td>
                                    <a href="{{route('position_setting_show',$position->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{route('position_setting_edit',$position->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection