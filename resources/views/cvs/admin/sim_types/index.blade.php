@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tipos Sim Cards <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li class="active">Tipos Sim Cards</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de tipos Sim Cards</h3>
                    <div class="box-tools">
                        @can('CVS Crear tipos de sim cards')
                            <a href="{{route('cvs_admin_sims_type_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sim_types as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @can('CVS Ver tipos de sim cards')
                                            <a href="{{ route('cvs_admin_sims_type_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('CVS Editar tipos de sim cards')
                                            <a href="{{ route('cvs_admin_sims_type_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
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