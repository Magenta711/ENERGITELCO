@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Servicios claro <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Inventarios</a></li>
        <li class="active">Servicios claro</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de servicios claro</h3>
                    <div class="box-tools">
                        @can('CVS Crear servicios Claro')
                            <a href="{{route('cvs_inventary_claro_services_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Tipo</th>
                                    <th>Referencia</th>
                                    <th>Valor</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($claro_services as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->cod}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>{{$item->status ? 'Activo' : 'Inativo'}}</td>
                                    <td>
                                        @can('CVS Ver servicios Claro')
                                            <a href="{{ route('cvs_inventary_claro_services_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('CVS Editar servicios Claro')
                                            <a href="{{ route('cvs_inventary_claro_services_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @if (count($item->productables) == 0)
                                            @can('CVS Eliminar servicios Claro')
                                                <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                                @include('cvs.inventory.claro_service.includes.modals.delete')
                                            @endcan
                                        @endif
                                    </td>
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