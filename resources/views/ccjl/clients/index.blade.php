@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Clientes <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li class="active">Clientes</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de clientes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->document }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @can('CCJL Ver clientes')
                                                <a href="{{ route('CCJL_clients_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                            @can('CCJL Editar clientes')
                                                <a href="{{ route('CCJL_clients_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
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