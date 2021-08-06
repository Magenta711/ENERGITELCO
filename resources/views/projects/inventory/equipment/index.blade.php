@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Inventario de equipos <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li class="active">Inventario</li>
        </ol>
    </section>
    <section class="content">
        @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <div class="box-title">Equipos MINTIC</div>
                <div class="box-tools">
                    @can('Crear equipo al inventario Mintic')
                        <a href="{{route('mintic_inventory_equipment_create')}}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Serial</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipments as $equipment)
                                <tr>
                                    <td>{{$equipment->id}}</td>
                                    <td>{{$equipment->serial}}</td>
                                    <td>{{$equipment->item}}</td>
                                    <td>{{$equipment->brand }}</td>
                                    <td>{{$equipment->created_at}}</td>
                                    <td>{{$equipment->status == 1 ? 'En bodega' : ($equipment->status == 2 ? 'En comisión' : 'Instalado') }}</td>
                                    <td>
                                        @can('Ver equipo al inventario Mintic')
                                            <a href="{{route('mintic_inventory_equipment_show',$equipment->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('Editar equipo al inventario Mintic')
                                            <a href="{{route('mintic_inventory_equipment_edit',$equipment->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @can('Eliminar equipo al inventario Mintic')
                                            @if ($equipment->status == 1)
                                                <button  type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$equipment->id}}">Eliminar</button>
                                                <div class="modal fade" id="modal_delete_{{$equipment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{route('mintic_inventory_equipment_delete',$equipment->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar equipo</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>¿Está seguro de eliminar el equipo {{ $equipment->item }}?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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