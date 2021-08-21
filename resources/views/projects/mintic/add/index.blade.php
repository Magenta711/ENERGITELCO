@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Implementación <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Proyectos</li>
        </ol>
    </section>
    <section class="content">
        @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <div class="box-title">Implementación proyecto MINTIC</div>
                <div class="box-tools">
                    @can('Crear asiganción de implemetación de MINTIC')
                        <a href="{{route('mintic_add_consumables_create',$id)}}" class="btn btn-sm btn-success">Nueva asignación</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th>Funcionario</th>
                                <th>Responsable</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($implements as $implement)
                                <tr>
                                    <td>{{$implement->user->name}}</td>
                                    <td>{{$implement->responsable->name}}</td>
                                    <td>{{$implement->status  == 3 ? 'En comisión' : ($implement->status == 2 ? 'Por revisión' : 'Revisado' ) }}</td>
                                    <td>{{$implement->created_at}}</td>
                                    <td>
                                        @can('Ver asiganción de implemetación de MINTIC')
                                            <a href="{{route('mintic_add_consumables_show',[$id,$implement->id])}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('Editar asiganción de implemetación de MINTIC')
                                            <a href="{{route('mintic_add_consumables_edit',[$id,$implement->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @if ($implement->status == 3)
                                            @can('Ejecutar asiganción de implemetación de MINTIC')
                                                <a href="{{route('mintic_add_consumables_run',[$id,$implement->id])}}" class="btn btn-sm btn-warning">Ejecutar</a>
                                            @endcan
                                        @endif
                                        @can('Eliminar asiganción de implemetación de MINTIC')
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$implement->id}}">Eliminar</button>
                                            <div class="modal fade" id="modal_delete_{{$implement->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('mintic_add_consumables_delete',[$id,$implement->id])}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="exampleModalLongTitle">Eliminar implementación</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Está seguro de eliminar la implementación?</p>
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