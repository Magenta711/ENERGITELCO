@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Rentas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li class="active">Rentas</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de rentas</h3>
                    <div class="box-tools">
                        @can('CCJL Crear rentas')
                            <a href="{{ route('CCJL_rents_create') }}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rents as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->client->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        @php
                                            $status = $item->statusCheck();
                                        @endphp
                                        <td><span class="label {{ $status == 'Pendiente' ? 'label-danger' : ($status == 'Al día') ? 'label-success' : 'label-primary' }}">{{$status}}</span></td>
                                        <td>
                                            @if (
                                                auth()->user()->haspermissionTo('CCJL Ver rentas') ||
                                                auth()->user()->haspermissionTo('CCJL Pagar rentas') ||
                                                auth()->user()->haspermissionTo('CCJL Recordar pago de rentas')
                                            )
                                                <a href="{{ route('CCJL_rents_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                            @endif
                                            @can('CCJL Editar rentas')
                                                <a href="{{ route('CCJL_rents_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            @endcan
                                            @can('CCJL Editar rentas')
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$item->id}}">Eliminar</button>
                                                <div class="modal fade" id="delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title">Eliminar renta de CCJL</h4>
                                                            </div>
                                                            <form action="{{route('CCJL_rents_delete',$item->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                                <div class="modal-body">
                                                                    <p>¿Está seguro que desa eliminar la renta?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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