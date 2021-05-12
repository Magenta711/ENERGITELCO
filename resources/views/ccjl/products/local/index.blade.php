@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Canon <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li class="active">Canons</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de canons</h3>
                    <div class="box-tools">
                        @can('CCJL Crear canons')
                            <a href="{{ route("CCJL_locals_create") }}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Departamento</th>
                                    <th>Piso</th>
                                    <th>Valor</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locals as $item)     
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->departament }}</td>
                                        <td>{{ $item->floor }}</td>
                                        <td>${{ number_format($item->value,2) }}</td>
                                        <td>{{ $item->status ? 'Disponible' : 'No disponible' }}</td>
                                        <td>
                                            @can('CCJL Ver canons')
                                                <a href="{{ route('CCJL_locals_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                            @can('CCJL Editar canons')
                                                <a href="{{ route('CCJL_locals_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
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