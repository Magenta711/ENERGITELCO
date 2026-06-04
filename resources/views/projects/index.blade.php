@extends('lte.layouts')

@php
function deliverablesCheck($deliverables, $id){
    $state = 'Faltante';
    foreach ($deliverables as $item){
        if($item->deliverable_id == $id) {
            if ($item->state == 1){
                $state = 'Listo';
            }
        }
    }
    return $state;
}

function entregables($project){
    $values = array();
    foreach ($project->time_plannings as $time_planning){
        foreach ($time_planning->activity->deliverables as $deliverable){
            $find = true;
            if (!empty($values)){
                foreach ($values as $value){
                    if($deliverable->id == $value->id){
                        $find = false;
                    }
                }
            }
            if ($find){
                $values[] = $deliverable;
            }
        }
    }
    return $values;
}
@endphp

@section('content')
<section class="content-header">
    <h1>
        Proyectos <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Proyectos</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de proyectos</div>
            <div class="box-tools">
                @can('Crear proyectos')
                <a href="{{route('project_create')}}" class="btn btn-sm btn-success">Crear un nuevo proyecto</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del proyecto</th>
                            <th>Responsable</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            <th>Progreso %</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->project_name}}</td>
                            <td>{{$project->responsable->name}}</td>
                            <td>{{$project->start_date ?? 'Sin definir' }}</td>
                            <td>{{$project->end_date ?? 'Sin definir' }}</td>
                            <td>
                                @if ($project->state == "Terminado")
                                    {{ $percentage = $project->final_percentage }} %
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-green" style="width: {{ $percentage }}%;"></div>
                                    </div>
                                @else
                                    @if ($project->state == 'Suspendido')
                                        {{ $percentage = $project->percentage }} %
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: {{ $percentage }}%;"></div>
                                        </div>
                                    @else
                                        {{ $percentage = $project->percentageProject()}} %
                                        <div class="progress xs">
                                            <div class="progress-bar {{ ($percentage <= $project->accepted_percentage) ? 'progress-bar-green' : 'progress-bar-red'}}" style="width: {{$percentage}}%;"></div>
                                        </div>
                                    @endif
                                @endif
                            </td>
                            <td>{{ ($percentage <= $project->accepted_percentage) ? (($project->state == 'Aprobado' && $percentage > 0) ? 'En ejecución' : $project->state) : 'Incumplido'}}</td>
                            <td>
                                @can('Ver proyectos')
                                <a href="{{route('project_show',$project->id)}}" class="btn btn-sm btn-success">Ver</a>
                                @endcan
                                @if ($project->state != "Terminado")
                                    @if ($percentage <= $project->accepted_percentage)
                                        @can('Editar proyectos')
                                            @if ($project->state != 'Suspendido')
                                                <a href="{{route('project_edit',$project->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                            @endif
                                        @endcan
                                        @if ($project->state == "Aprobado")
                                            @can('Suspender proyectos')
                                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalStop_{{$project->id}}">Suspender</button>
                                                @include('projects.includes.models.stop')
                                            @endcan
                                            @if ($percentage > 0)
                                                @can('Terminar proyectos')
                                                    <button class="btn btn-sm bg-purple" data-toggle="modal" data-target="#modalFinish_{{$project->id}}">Terminar</button>
                                                    @include('projects.includes.models.finish')
                                                @endcan
                                            @endif
                                        @endif
                                        @if ($project->state == "Suspendido")
                                            @can('Reactivar proyectos')
                                                <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalStart_{{$project->id}}">Reactivar</a>
                                                @include('projects.includes.models.start')
                                            @endcan
                                        @endif
                                    @else
                                        @can('Reactivar porcentaje de proyectos')
                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalReactivePercentage">Reactivar porcentaje</button>
                                            @include('projects.includes.models.reactivate_percentage')
                                        @endcan
                                    @endif
                                @endif
                                @can('Eliminar Proyectos')
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$project->id}}">Eliminar</button>
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

{{--
    8. Imprimir orden de bodega
    12. Emails
--}}