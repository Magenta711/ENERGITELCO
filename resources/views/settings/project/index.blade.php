@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Listado de proyectos <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Listado de proyectos</li>
    </ol>
</section>
<section class="content">
     
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
        
                    <div class="box-title">Listado de proyectos</div>
                    <div class="box-tools">
                        @can('Crear actividades de proyecto')
                            <a href="{{route('project_setting_create')}}" class="btn btn-sm btn-primary">Crear</a>
                        @endcan
                    </div>
                </div>
                    <!-- /.box-header -->
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th>Ítem</th>
                                <th>Descripción de la actividad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td class="table-td-description">{{$project->description}}</td>
                                    <td>
                                        @can('Ver actividades de proyecto')
                                            <a href="{{route('project_setting_show',$project->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('Editar actividades de proyecto')
                                            <a href="{{route('project_setting_edit',$project->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</section>
@endsection
@section('js')
    <script>
        texto = document.getElementsByClassName('table-td-description');
        for(let i = 0; i < texto.length; i++){
            if (texto[i].innerHTML.length > 70){
                valor = texto[i].innerHTML;
                texto[i].innerHTML = valor.substr(0,70)+"...";
            }
        }
    </script>
@endsection 