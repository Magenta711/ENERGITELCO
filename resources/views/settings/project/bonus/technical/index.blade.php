@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Comisiones a técnicos <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Comisiones a técnicos</li>
    </ol>
</section>
<section class="content">
     
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-text-width"></i>
            <div class="box-title">Comisiones a técnicos</div>
            <div class="box-tools">
                @can('Crear comisiones para técnicos de proyectos')
                    <a href="{{route('bonuses_setting_create_technical')}}" class="btn btn-sm btn-success">Crear</a>
                @endcan
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cargo</th>
                            <th>Frecuencia</th>
                            <th>Valor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commission_technicals as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->position->name}}</td>
                                <td>{{$item->days.' día'}}</td>
                                <td>$ {{number_format($item->value,2,',','.')}}</td>
                                <td>
                                    @can('Ver comisiones para técnicos de proyectos')
                                        <a href="{{ route('bonuses_setting_show_technical',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Editar comisiones para técnicos de proyectos')
                                        <a href="{{ route('bonuses_setting_edit_technical',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
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