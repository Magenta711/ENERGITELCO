@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Entrevistas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Entrevistas</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de entrevistas</div>
            @can('Crear entrevistas')
            <div class="box-tools"><a href="{{route('interview_create')}}" class="btn btn-sm btn-success">Crear</a></div>
            @endcan
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Aspirante</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($interviews as $item)  
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->register->name}}</td>
                            <td>{{$item->responsable->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{($item->state == 1 || $item->state == 3) ? 'Aprobado' : (($item->state == 2) ? 'No aprobado' : 'Sin aprobar')}}</td>
                            <td>
                                @can('Ver entrevistas')
                                    <a href="{{route('interview_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                @endcan
                                @can('Editar entrevistas')                                    
                                    <a href="{{route('interview_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                @endcan
                                @if ($item->state == 1)
                                    @can('Enviar documentos de contratación')
                                        <a href="{{route('interview_send_documentation',$item->id)}}" class="btn btn-sm btn-warning">Enviar docuementación</a>
                                    @endcan
                                @endif
                                @can('Eliminar entrevistas')
                                    <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                
                                    <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('interview_delete',$item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="exampleModalLongTitle">Eliminar entrevista</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro de eliminar la entrevista de {{$item->register->name}}?</p>
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
</section>
@endsection