@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Comisiones <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Comisiones</li>
    </ol>
</section>
<section class="content">
     
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <div class="box-title">Comisiones</div>
                    <div class="box-tools">
                        @can('Crear comisiones de control de proyectos')
                            <a href="{{route('bonuses_setting_create_control')}}" class="btn btn-sm btn-success">Crear</a>
                        @endcan
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Actividad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commisions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->activity->description }}</td>
                                        <td>
                                            @can('Ver comisiones de control de proyectos')
                                                <a href="{{ route('bonuses_setting_show_control',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                            @can('Editar comisiones de control de proyectos')
                                                <a href="{{ route('bonuses_setting_edit_control',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                </div>
            <!-- /.box -->
</section>
@endsection