@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Memorandos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Memorandos</li>
    </ol>
</section>
<section class="content">
     
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de Memorandos</div>
            <div class="box-tools">
                @can('Crear memorandos')
                <a href="{{route('memorandum_create')}}" class="btn btn-sm btn-success">Crear</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asunto</th>
                            <th>Resposable</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($memorandums as $item)
                            @php
                                $r = 1;
                            @endphp
                            @foreach ($item->receivers as $receiver)
                                @if (($receiver->user->id == auth()->id() || $item->responsable == auth()->id() || auth()->user()->hasRole('Administrador')) && $r == 1)
                                @php
                                    $r = 0;
                                @endphp
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->affair}}</td>
                                    <td>{{$item->responsable_memo->name}}</td>
                                    <td>{{$item->state = 1 ? 'Activo' : 'Inactivo'}}</td>
                                    <td>{{$item->created_at }}</td>
                                    <td>
                                        @can('Ver memorandos')
                                            <a href="{{route('memorandum_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                            @endcan
                                        @can('Editar memorandos')
                                            <a href="{{route('memorandum_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @can('Eliminar memorandos')
                                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('memorandum_destroy',$item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar memorando</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar el memorando?</p>
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
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection