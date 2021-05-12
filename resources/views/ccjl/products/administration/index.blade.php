@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Administración <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li class="active">Administración</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de administración</h3>
                    <div class="box-tools">
                        @can('CCJL Crear administraciones')
                            <a href="{{ route('CCJL_administrations_create') }}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Nombre</th>
                                    <th>Valor</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($administration as $item)    
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>${{ number_format($item->value,2) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->status ? 'Activo' : 'Inactivo' }}</td>
                                        <td>
                                            @can('CCJL Ver administraciones')
                                                <a href="{{ route('CCJL_administrations_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                            @can('CCJL Editar Administraciones')
                                                <a href="{{ route('CCJL_administrations_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            @endcan
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
</section>
@endsection