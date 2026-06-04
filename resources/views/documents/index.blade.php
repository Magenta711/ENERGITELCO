@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Lista maestra de documentos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Lista maestra de documentos</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de documentos</div>
            <div class="box-tools">
                @can('Crear documentos')
                    <a href="{{route('documents_create')}}" class="btn btn-sm btn-success btn-send">Crear</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Versión</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->version}}</td>
                                <td>{{$item->date}}</td>
                                <td>
                                    <small class="label {{($item->status == 1) ? 'bg-primary' : (($item->status == 0) ? 'bg-red' : '') }}">{{($item->status == 1 ) ? 'Activo' : 'Inactivo'}}</small>
                                </td>
                                <td>
                                    @can('Ver documentos')
                                        <a href="{{route('documents_show',$item->id)}}" class="btn btn-sm btn-success btn-send">Ver</a>
                                    @endcan
                                    @can('Editar documentos')
                                        <a href="{{route('documents_edit',$item->id)}}" class="btn btn-sm btn-primary btn-send">Editar</a>
                                    @endcan
                                    @can('Descargar documentos')
                                        <a href="{{route('documents_download',$item->id)}}" class="btn btn-sm btn-warning">Descargar</a>
                                    @endcan
                                    @can('Eliminar documentos')
                                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                            
                                        <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('documents_delete',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar documento</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar este documento?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-danger btn-send">Eliminar</button>
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