@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Liquidación prestaciones sociales
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Liquidación prestaciones sociales</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liquidación prestaciones sociales</h3>
                <div class="box-tools">
                    @can('Crear liquidación de prestaciones sociales')
                        <a href="{{route('settlement_create')}}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Código</th>
                                <th scope="col">Funcionario</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settlements as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>H-FR-32-{{$item->id}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->responsable->name}}</td>
                                    <td>{{$item->approve ? $item->approve->name:''}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{($item->status == 1) ? 'Aprobado' : (($item->status == 2 )? 'No aprobado' : 'Sin aprobar')}}</td>
                                    <td>
                                        @can('Ver liquidación de prestaciones sociales')
                                            <a href="{{route('settlement_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @if ($item->status == 0)
                                            @can('Editar liquidación de prestaciones sociales')
                                                <a href="{{route('settlement_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                            @endcan
                                        @endif
                                        @if ($item->status == 1)
                                            @can('Descargar liquidación de prestaciones sociales')
                                                <a href="{{route('settlement_download',$item->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                            @endcan
                                        @endif
                                        @can('Eliminar liquidación de prestaciones sociales')
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$item->id}}">Eliminar</button>
                                            <div class="modal fade" id="delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title">Eliminar liquidación</h4>
                                                        </div>
                                                        <form action="{{route('settlement_delete',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <div class="modal-body">
                                                                <p>¿Está seguro que desa eliminar la liquidación?</p>
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
    </section>
@endsection