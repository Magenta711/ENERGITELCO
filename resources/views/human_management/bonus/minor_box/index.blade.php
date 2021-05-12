@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Caja menor <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Gestión humana</a></li>
        <li class="active"><a href="#">Caja menor</a></li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Caja menor</h3>
            <div class="box-tools">
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pendingModal">
                    Informes
                </button>
                @can('Entregar caja menor manual')
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#deliveryMinorBoxModal">
                        Cargos y descargos
                    </button>
                @endcan
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
                                <td>{{ $item->status == 3 && !$item->has_box ? 'Pendiente' : (($item->status == 1) ? 'Aprobado' : (($item->status == 2 || ($item->has_box && $item->status == 3)) ? 'Sin aprobar' : 'No aprobado')) }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @can('Ver bonificaciones de permisos de trabajo')
                                        <a href="{{ route('bonus_minor_box_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Editar bonificaciones de permisos de trabajo')
                                        @if ($item->status == 3 || $item->status == 2)
                                            <a href="{{ route('bonus_minor_box_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
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

<div class="modal fade" id="deliveryMinorBoxModal" tabindex="-1" role="dialog" aria-labelledby="deliveryMinorBoxModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Entregar caja menor</h4>
            </div>
            <form action="{{route('bonus_minor_box_add_user')}}" method="post" autocomplete="off">
            @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="user_id">Funcionario</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option selected disabled></option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->cedula}} - {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="value">Entrega</label>
                                <input type="number" name="value" id="value" class="form-control" value="{{old('value') ?? 0}}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="discharges">Descarga</label>
                                <input type="number" name="discharges" id="discharges" class="form-control" value="{{old('discharges') ?? 0}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="commentary">Comentario</label>
                                <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-sm btn-primary">Guardar y firmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="pendingModal" tabindex="-1" role="dialog" aria-labelledby="pendingModalLabel" aria-hidden="true">
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
                                <th>Caja menor pendiente de liquidar</th>
                                {{-- <th>Pendientes</th> --}}
                                <th>Valores pendiente a pagar</th>
                                {{-- <th>Ajustes</th> --}}
                                <th>/</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($minor_boxes as $item)
                                @if ($item->charges || $item->discharges)
                                    <tr>
                                        <td>{{$item->user->name}}</td>
                                        <td>${{number_format($item->charges,2,',','.')}}</td>
                                        {{-- <td>${{number_format($item->pending,2,',','.')}}</td> --}}
                                        <td>${{number_format($item->discharges,2,',','.')}}</td>
                                        {{-- <td>{{$item->rest}}</td> --}}
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