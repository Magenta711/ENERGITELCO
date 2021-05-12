@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Carteleta <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Adinistración</a></li>
        <li class="active">Carteleta</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de carteleta</h3>
                    <div class="box-tools">
                        @can('Crear documentos para la cartelera')
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#create_document">Crear</button>
                            <!-- Modal create -->
                            <div class="modal fade" id="create_document" tabindex="-1" role="dialog" aria-labelledby="create_documentTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('billboard_store')}}" autocomplete="off" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title">Agregar documento a la cartelera</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name_document">Nombre del documento</label>
                                                    <input type="text" name="name_document" id="name_document" value="{{old('name_document')}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="document">Documento</label>
                                                    <input type="file"  name="document" id="document" value="{{old('document')}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="type_bill">Seleccione el tipo de cartelera</label>
                                                    <select name="type_billboard" id="type_billboard" class="form-control">
                                                        <option selected disabled>Seleccione el tipo de cartelera</option>
                                                        @foreach ($bill_types as $type)
                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-sm btn-success">Agregar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Resposable</th>
                                    <th>Tipo</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td style="width: 20%">{{$item->name_document}}</td>
                                    <td style="width: 15%">{{$item->user->name}}</td>
                                    <td style="width: 15%">{{$item->type->name}}</td>
                                    <td style="width: 10%">{{$item->created_at}}</td>
                                    <td style="width: 8%">{{$item->estado}}</td>
                                    <td>
                                        @can('Editar documentos de la cartelera')
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_document_{{$item->id}}">Editar</button>
                                            {{-- Modal update --}}
                                            <div class="modal fade" id="edit_document_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('billboard_update',$item->id)}}" autocomplete="off" enctype="multipart/form-data" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLongTitle{{$item->id}}">Agregar documento a la cartelera</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name_document{{$item->id}}">Nombre del documento</label>
                                                                    <input type="text" name="name_document" id="name_document{{$item->id}}" value="{{$item->name_document}}" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="type_bill{{$item->id}}">Seleccione el tipo de cartelera</label>
                                                                    <select name="type_billboard" id="type_billboard{{$item->id}}" class="form-control">
                                                                        <option selected disabled>Seleccione el tipo de cartelera</option>
                                                                        @foreach ($bill_types as $type)
                                                                        <option {{($item->type_billboard == $type->id) ? 'selected' : ''}} value="{{ $type->id }}">{{ $type->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-sm btn-success">Actualizar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan
                                        @can('Descargar documentos de la cartelera')
                                            <a href="/file/billboard/{{$item->document}}" target="_blank" class="btn btn-sm btn-warning">Descargar</a>
                                        @endcan
                                        @can('Eliminar documentos de la cartelera')
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_document_{{$item->id}}">Eliminar</button>
                                            {{-- Modal delete --}}
                                            <div class="modal fade" id="delete_document_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="{{route('billboard_destroy',$item->id)}}" autocomplete="off" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar documento de la cartelera</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Está seguro de que desea eliminar el documento {{$item->name_document}}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-sm btn-danger">Si</button>
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
    </ul>
</section>
@endsection