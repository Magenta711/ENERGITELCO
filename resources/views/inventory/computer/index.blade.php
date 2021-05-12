@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Computadores <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li class="active">Computadores</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de computadores</h3>
                    <div class="box-tools">
                        @can('Crear computadores al inventario')
                            <a href="{{route('inv_computer_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Serial</th>
                                    <th>Marca</th>
                                    <th>ROM</th>
                                    <th>RAM</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($computers as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->serial}}</td>
                                    <td>{{$item->brand}}</td>
                                    <td>{{$item->rom}}</td>
                                    <td>{{$item->ram}}</td>
                                    <td>
                                        {{ ($item->status == '3') ? 'Asignado' : '' }}
                                        {{ ($item->status == '1') ? 'Sin asignar' : '' }}
                                        {{ ($item->status == '2') ? 'Malo' : '' }}
                                    </td>
                                    <td>
                                        @can('Ver computadores del inventario')
                                            <a href="{{ route('inv_computer_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('Editar computadores del inventario')
                                            <a href="{{ route('inv_computer_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @can('Eliminar computadores del inventario')
                                            <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                            @include('inventory.computer.includes.modals.delete')
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
