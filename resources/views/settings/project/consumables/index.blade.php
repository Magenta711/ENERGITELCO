@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Consumibles <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Consumibles</li>
    </ol>
</section>
<section class="content">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
        
                    <div class="box-title">Lista de consumibles para proyectos</div>
                    <div class="box-tools">
                        @can('Crear consumibles para proyectos')
                            <a href="{{route('consumables_setting_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Valor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consumables as $consumable)
                                    <tr>
                                        <td>{{$consumable->id}}</td>
                                        <td>{{$consumable->description}}</td>
                                        <td>
                                            $ {{ number_format($consumable->value, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            @can('Ver consumibles para proyectos')
                                                <a href="{{route('consumables_setting_show',$consumable->id)}}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                            @can('Editar consumibles para proyectos')
                                                <a href="{{route('consumables_setting_edit',$consumable->id)}}" class="btn btn-sm btn-primary">Editar</a>
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