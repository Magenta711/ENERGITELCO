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
                                        <a href="{{ route('bonuses_technical_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Editar bonificaciones de permisos de trabajo')
                                        @if ($item->status == 3 || $item->status == 2)
                                            <a href="{{ route('bonuses_technical_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        @endif
                                    @endcan
                                    @if ($item->status == 1)
                                        @can('Exportar bonificaciones de permisos de trabajo')
                                            <a href="{{ route('bonuses_technical_export',$item->id) }}" class="btn btn-sm btn-warning">Exportar</a>
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

@include('human_management.bonus.technical.includes.modals.new_cut')
@endsection