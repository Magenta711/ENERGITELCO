@php
    function expirateDate($enrollment_date,$soat_date,$gases_date,$technomechanical_date,$first_aid_kit_date)
    {
        if ($enrollment_date && $enrollment_date < now()) {
            return true;
        }
        if ($soat_date && $soat_date < now()) {
            return true;
        }
        if ($gases_date && $gases_date < now()) {
            return true;
        }
        if ($technomechanical_date && $technomechanical_date < now()) {
            return true;
        }
        if ($first_aid_kit_date && $first_aid_kit_date < now()) {
            return true;
        }
        return false;
    }
@endphp 

@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        vehículos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li class="active">vehículos</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de vehículos</h3>
                    <div class="box-tools">
                        @can('Crear vehículos al inventario')
                            <a href="{{route('inv_vehicle_create')}}" class="btn btn-sm btn-success btn-send">Crear</a>
                        @endcan
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $item)
                                <tr {!! expirateDate($item->enrollment_date,$item->soat_date,$item->gases_date,$item->technomechanical_date,$item->first_aid_kit_date)  ? 'class="bg-red" data-toggle="tooltip" data-placement="top" title="Tiene documentos vencidos"' : '' !!}}}>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->plate}}</td>
                                    <td>{{$item->brand}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>
                                        {{ ($item->status == '1') ? 'Bueno' : '' }}
                                        {{ ($item->status == '2') ? 'Pendientes' : '' }}
                                        {{ ($item->status == '3') ? 'Malo' : '' }}
                                    </td>
                                    <td>
                                        @can('Ver vehículos del inventario')
                                            <a href="{{ route('inv_vehicle_show',$item->id) }}" class="btn btn-sm btn-success btn-send">Ver</a>
                                        @endcan
                                        @can('Editar vehículos del inventario')
                                            <a href="{{ route('inv_vehicle_edit',$item->id) }}" class="btn btn-sm btn-primary btn-send">Editar</a>
                                        @endcan
                                        @can('Eliminar vehículos del inventario')
                                            <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                            @include('inventory.vehicles.includes.modals.delete')
                                        @endcan
                                    </td>
                                </tr>
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
