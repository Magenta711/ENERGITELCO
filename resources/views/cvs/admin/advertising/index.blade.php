@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Publicidad email <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li class="active">Publicidad email</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @if ($actives > 1)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            <p>Hay un error con las publicaciones activas</p>
        </div>
    @endif
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de activaciones</h3>
                    <div class="box-tools">
                        @can('CVS Crear publicidades')
                            <a href="{{route('cvs_admin_advertising_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Fecha de inicio</th>
                                    <th>Fecha de terminación</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertisings as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->date_start}}</td>
                                    <td>{{$item->date_end}}</td>
                                    <td>{{$item->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                                    <td>
                                        @can('CVS Ver publicidades')
                                            <a href="{{ route('cvs_admin_advertising_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('CVS Editar publicidades')
                                            <a href="{{ route('cvs_admin_advertising_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
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