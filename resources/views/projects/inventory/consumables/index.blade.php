@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Inventario de consumibles <small>MINTIC</small>
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
                <div class="box-title">Estudio de campo proyecto MINTIC</div>
                <div class="box-tools">
                    @can('Crear consumible del inventario')
                        <a href="{{route('mintic_inventory_consumables_create')}}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Item</th>
                                <th>Cantidad</th>
                                <th>Fecha actualización</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consumables as $consumable)
                                <tr {!! $consumable->amount <= $consumable->alert ? 'class="bg-red" data-toggle="tooltip" data-placement="top" title="Hay muy pocos consumibles"' : '' !!}>
                                    <td>{{$consumable->id}}</td>
                                    <td>{{$consumable->item}} {{$consumable->type}}</td>
                                    <td>{{$consumable->amount}} {{$consumable->unid}}</td>
                                    <td>{{$consumable->updated_at}}</td>
                                    <td>{{$consumable->status == 1 ? 'Disponible' : 'Agotado' }}</td>
                                    <td>
                                        @can('Ver consumible del inventario')
                                            <a href="{{route('mintic_inventory_consumables_show',$consumable->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        @endcan
                                        @can('Editar consumible del inventario')
                                            <a href="{{route('mintic_inventory_consumables_edit',$consumable->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                        @can('Eliminar consumible del inventario')
                                            @if (count($consumable->productables) == 0)
                                                <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$consumable->id}}">Eliminar</button>
                                                {{-- href="{{route('mintic_inventory_consumables_delete',$consumable->id)}}" --}}
                                                <div class="modal fade" id="modal_delete_{{$consumable->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('mintic_inventory_consumables_delete',$consumable->id)}}" method="POST" class="text-black">
                                                            @csrf
                                                            @method('DELETE')
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="exampleModalLongTitle">Eliminar usuario</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Está seguro de eliminar el consumible {{ $consumable->item }}?</p>
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