@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bodegas de técnicos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Ejecución de obras</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Herramientas</a></li>
        <li class="active">Usuario</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de técnicos con sus bodegas</h3>
                    <div class="box-tools">
                        <a href="{{route('inventary_technical')}}" class="btn btn-sm btn-success">Volver</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Detalle</th>
                                    <th>Tipo</th>
                                    <th>Cantidad</th>
                                    <th>Entradas</th>
                                    <th>Salidas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $item)
                                    @if ($item->stock > 0 || $item->tickets > 0 || $item->departures > 0)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->inventaryble->serial}} {{$item->inventaryble->serial ? '-' : ''}} {{$item->inventaryble->item}} - {{$item->inventaryble->brand}} {{$item->inventaryble->type}}</td>
                                            <td>{{$item->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticEquipment' ? 'Equipo' : 'Consumible'}}</td>
                                            <td>{{$item->stock}}</td>
                                            <td>{{$item->tickets}}</td>
                                            <td>{{$item->departures}}</td>
                                        </tr>
                                    @endif
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
