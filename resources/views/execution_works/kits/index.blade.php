@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lista de kits <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Ejecución de obras</a></li>
        <li class="active">Kits</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de kits</h3>
                    <div class="box-tools">
                        @can('Crear kits')
                            <a href="{{route('kits_create')}}" class="btn btn-sm btn-success btn-send">Crear</a>
                        @endcan
                        <a href="{{route('kits_assigment')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-resposive">
                        <table id="table_index" class="table table-hover" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Encargado</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kits as $kit)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$kit->codigo}}</td>
                                        <td>{{$kit->nombre}}</td>
                                        <td>{{$kit->responsable->name}}</td>
                                        <td>{{$kit->estado_kit->estado}}</td>
                                        <td>
                                            <div class="btn-group ms-2">
                                                @can('Ver kits')    
                                                <a href="{{ route('kits_show',$kit->id) }}" class="btn btn-sm btn-primary" value="Ver"> Ver</a>
                                                @endcan
                                                @can('Editar todos los Kits')
                                                <a  href="{{ route('kits_edit_all',$kit->id) }}" class="btn btn-sm btn-success" value="Editar todos los kit">Editar todos los kit</a>
                                                @endcan
                                                @can('Editar Kits')
                                                <a  href="{{ route('kits_edit',$kit->id) }}" class="btn btn-sm bg-olive" value="Editar este kit">Editar este kit</a>
                                                @endcan
                                                @can('Eliminar Kits')
                                                <input type="submit" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_delete_{{$kit->id}}" value="Eliminar">
                                                @include('execution_works.kits.modals.delete')
                                                @endcan
                                                @can('Eliminar todos los Kits')
                                                <input type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_all_{{$kit->id}}" value="Eliminar todos los kits">
                                                @include('execution_works.kits.modals.delete_all')
                                                @endcan
                                            </div>
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