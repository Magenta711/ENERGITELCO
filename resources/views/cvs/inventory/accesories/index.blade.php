@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Accesorios <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Inventarios</a></li>
        <li class="active">Accesorios</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de accesorios</h3>
                    <div class="box-tools">
                        @can('CVS Crear accesorios')
                            <a href="{{route('cvs_inventary_Accesories_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Referencia</th>
                                    <th>Valor</th>
                                    <th>Sede</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accesories as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>{{$item->sede->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->status ? 'Disponible' : 'Agotado'}}</td>
                                    <td>
                                        @can('CVS Ver accesorios')
                                            <a href="{{ route('cvs_inventary_Accesories_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('CVS Editar accesorios')
                                            <a href="{{ route('cvs_inventary_Accesories_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @if (count($item->productables) == 0)
                                            @can('CVS Eliminar accesorios')
                                                <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                                @include('cvs.inventory.accesories.includes.modals.delete')
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