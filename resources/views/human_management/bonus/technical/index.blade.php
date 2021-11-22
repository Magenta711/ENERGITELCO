@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Bonificaciones y viáticos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active"><a href="#">Bonificaciones y viáticos</a></li>
    </ol>
</section>
<section class="content">
     
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de cortes de pago de bonificaciones y viáticos</h3>
            <div class="box-tools">
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deliveryMinorBoxModal">
                    Pendientes
                </button>
                @can('Crear corte bonificaciones de permisos de trabajo')
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newCutModal">
                        Generar corte
                    </button>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Responsable</th>
                            <th>Fecha inicio</th>
                            <th>Fecha final</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuts as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->responsable->name }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                {{-- if hasBox and hasBonus pass this estatate else whiouth --}}
                                <td>{{ $item->status == 3 ? 'Pendiente' : (($item->status == 1) ? 'Aprobado' : (($item->status == 2) ? 'Sin aprobar' : 'No aprobado')) }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @can('Ver bonificaciones de permisos de trabajo')
                                        <a href="{{ route('work_permit_bonuses_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Editar bonificaciones de permisos de trabajo')
                                        @if ($item->status == 3 || $item->status == 2)
                                            <a href="{{ route('work_permit_bonuses_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        @endif
                                    @endcan
                                    @if ($item->status == 1)
                                        @can('Exportar bonificaciones de permisos de trabajo')
                                            <a href="{{ route('work_permit_bonuses_export',$item->id) }}" class="btn btn-sm btn-warning">Exportar</a>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- Modal --}}
<div class="modal fade" id="deliveryMinorBoxModal" tabindex="-1" role="dialog" aria-labelledby="pendingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Estados</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Funcionario</th>
                                <th>Pendientes</th>
                                <th>/</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($minor_boxes as $item)
                                @if ($item->pending)
                                    <tr>
                                        <td>{{$item->user->name}}</td>
                                        <td>${{number_format($item->pending,2,',','.')}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#historyModal_{{$item->id}}"><i class="fa fa-plus"></i></button>
                                            <div class="modal fade" id="historyModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="historyModal_{{$item->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title">Estados</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{!! str_replace("\n", '</br>', addslashes($item->history)) !!}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@include('human_management.bonus.includes.modals.new_cut')
@endsection