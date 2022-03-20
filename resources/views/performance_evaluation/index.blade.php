@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Evaluaciones de desempeño <small>Evaluaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Evaluaciones de desempeño</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Evaluaciones de desempeño</div>
            <div class="box-tools">
                @can('Disparar evaluación de desempeño')
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_new_evaluation">Gestionar nueva evaluación</button>

                    <div class="modal fade" id="modal_new_evaluation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="exampleModalLongTitle">Gestionar nueva evaluación de desempeño</h4>
                                </div>
                                <form action="{{route('performance_evaluation_create')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <p>¿Desea disparar el envio de la evaluación de desempeño a todos los usuarios activos?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                                        <button class="btn btn-sm btn-success">Aceptar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                            <th>Nombre del evaluado</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($performances as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{($item->type_evaluation_id == 1) ? 'H-FR-04' : (($item->type_evaluation_id == 2) ? 'H-FR-05' : 'H-FR-05')}} {{$item->id}}</td>
                                <td><a href="{{route('user_show',$item->evaluado->id)}}">{{$item->evaluado->name}}</a></td>
                                <td><a href="{{route('user_show',$item->responsable->id)}}">{{$item->responsable->name}}</a></td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <small class="label {{($item->state == 'Sin leer') ? 'bg-yellow' : (($item->state == 'Sin aprobar') ? 'bg-green' : (($item->state == 'Aprobado') ? 'bg-primary' : 'bg-red')) }}">{{$item->state}}</small>
                                </td>
                                <td>
                                    @can('Ver evaluaciones de desempeño')    
                                        <a href="{{route('performance_evaluation_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @if ($item->evaluado->id == auth()->id() && $item->state == "Sin leer")
                                        @can('Evaluar evaluaciones de desempeño')
                                            <a href="{{route('autoevaluation',$item->id)}}" class="btn btn-sm btn-primary">Evaluar</a>
                                        @endcan
                                    @endif
                                    @if (($item->responsable->id == auth()->id() || Auth::user()->hasRole('Administrador')) && $item->state == "Sin calificar")
                                        @can('Calificar evaluaciones de desempeño')
                                            <a href="{{route('performance_evaluation_responder',$item->id)}}" class="btn btn-sm btn-warning">Calificar</a>
                                        @endcan
                                    @endif
                                    @if ($item->state == "Aprobado")
                                        @can('Descargar evaluación de desempeño')
                                            <a href="{{route('performance_evaluation_download',$item->id)}}" class="btn btn-sm btn-warning">Descargar</a>
                                        @endcan
                                    @endif
                                    @can('Eliminar evaluación de desempeños')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                        <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="{{route('performance_evaluation_delete',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Eliminar projecto</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Está seguro de eliminar la evaluacion de desempeño de {{$item->evaluado->name}}?</p>
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