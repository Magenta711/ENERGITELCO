@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Herramientas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Ejecución de obras</a></li>
        <li><a href="#">Inventario</a></li>
        <li class="active">Herramientas</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de herramientas</h3>
                    <div class="box-tools">
                        @can('Crear inventario de herramientas')
                            <a href="{{route('inventory_tools_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Código</th>
                                    <th>Herramienta</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tools as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->serial}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->user_id == '0' ? 'En bodega' : $item->user->name}}</td>
                                        <td>
                                            @can('Ver inventario de herramientas')
                                                <a href="{{ route('inventory_tools_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                            @can('Editar inventario de herramientas')
                                                <a href="{{ route('inventory_tools_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            @endcan
                                            @can('Eliminar inventario de herramientas')
                                                <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                                @include('execution_works.inventory.includes.modals.delete')
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
    </ul>
</section>
@endsection
