@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Materiales <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Materiales</li>
    </ol>
</section>
<section class="content">
     
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
        
                    <div class="box-title">Lista de materiales para proyectos</div>
                    <div class="box-tools">
                        @can('Crear materiales para proyectos')
                            <a href="{{route('materials_setting_create')}}" class="btn btn-sm btn-success">Crear</a>
                        @endcan
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>Ítem</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materials as $material)
                                    <tr>
                                        <td>{{$material->id}}</td>
                                        <td>{{$material->description}}</td>
                                        <td>
                                            @can('Ver materiales para proyectos')
                                                <a href="{{route('materials_setting_show',$material->id)}}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                            @can('Editar materiales para proyectos')
                                                <a href="{{route('materials_setting_edit',$material->id)}}" class="btn btn-sm btn-primary">Editar</a>
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