@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lesiones aprendidas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Administración del sistema</a></li>
        <li class="active">Lesiones aprendidas</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de lesiones aprendidas</h3>
                    <div class="box-tools">
                        @can('Crear computadores al inventario')
                            <a href="{{route('learned_lessons_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                    <th>Fecha</th>
                                    <th>Tema</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lessons as $item)
                                    <tr>
                                        <td>{{$item->num}}</td>
                                        <td>{{$item->date}}</td>
                                        <td>{{$item->theme}}</td>
                                        <td>
                                            @can('Ver computadores del inventario')
                                                <a href="{{ route('learned_lessons_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                            @can('Editar computadores del inventario')
                                                <a href="{{ route('learned_lessons_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            @endcan
                                            @can('Exportar lesiones aprendidas')
                                                <a href="{{ route('learned_lessons_download',$item->id) }}" class="btn btn-sm btn-warning">Exportar</a>
                                            @endcan
                                            @can('Eliminar computadores del inventario')
                                                <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                                <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('learned_lessons_delete',$item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="exampleModalLongTitle">Eliminar computador</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Está seguro de eliminar el la lección aprendida {{ $item->num }}?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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
