@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        Mantenimiento proyecto mintic <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">Mantenimiento</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title"> proyecto MINTIC</div>
            <div class="box-tools">
                <a href="{{route('mintic_maintenance_create',$id->id)}}" class="btn btn-sm btn-success">Crear</a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>/</td>
                            <td>N° de caso</td>
                            <td>Tipo</td>
                            <td>Fecha</td>
                            <td>Estado</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($id->maintenances as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->num}}</td>
                                <td>{{$item->type_format}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->status == 1 ? 'Aprobado' : (($item->status == 0) ? 'Sin aprobar' : 'No aprobado')}}</td>
                                <td>
                                    <a href="{{route('mintic_maintenance_show',[$id->id,$item->id])}}" class="btn btn-sm btn-success">Ver</a>
                                    <a href="{{route('mintic_maintenance_edit',[$id->id,$item->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="{{route('mintic_maintenance_photos',[$id->id,$item->id])}}" class="btn btn-sm bg-teal">Fotos</a>
                                    <a href="{{route('mintic_maintenance_export',[$id->id,$item->id])}}" class="btn btn-sm btn-warning">Exportar</a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                    <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('mintic_maintenance_delete',[$id->id,$item->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar projecto</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar el mantenimiento {{$item->id}}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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