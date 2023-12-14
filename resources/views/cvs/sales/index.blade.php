@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ventas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li class="active">Ventas</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de ventas</h3>
                    <div class="box-tools">
                        @can('CVS Exportar reporte de ventas')
                            {{-- Modal --}}
                            <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_delete">Exportar</button>
                            <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{route('cvs_sales_export')}}" method="post">
                                        @csrf
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Exportar reporte de ventas</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="by">Exportar por</label>
                                            <select name="by" id="by" class="form-control">
                                                <option selected disabled></option>
                                                <option value="1">Hoy</option>
                                                <option value="2">Día</option>
                                                <option value="3">Semana</option>
                                                <option value="4">Mes</option>
                                                <option value="5">Año</option>
                                                <option value="6">Rango</option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="display: none;" id="div_by_day">
                                            <label for="by_day">Por dia</label>
                                            <input type="date" name="by_day" id="by_day" class="form-control">
                                        </div>
                                        <div class="form-group" style="display: none;" id="div_by_week">
                                            <label for="by_week">Por semana</label>
                                            <input type="week" name="by_week" id="by_week" class="form-control">
                                        </div>
                                        <div class="form-group" style="display: none;" id="div_by_month">
                                            <label for="by_month">Por mes</label>
                                            <input type="month" name="by_month" id="by_month" class="form-control">
                                        </div>
                                        <div class="form-group" style="display: none;" id="div_by_year">
                                            <label for="by_year">Por año</label>
                                            <input type="number" value="{{now()->format('Y')}}" min="2001" name="by_year" id="by_year" class="form-control">
                                        </div>
                                        <div class="form-group" style="display: none;" id="div_by_rango">
                                            <label for="by_rango">Por rango</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="start_day">Incio</label>
                                                    <input type="date" name="start_day" class="form-control" id="start_day">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="end_date">Final</label>
                                                    <input type="date" name="end_date" class="form-control" id="end_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Exportar</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        @endcan
                        @can('CVS Crear ventas')
                            <a href="{{route('cvs_sales_create')}}" class="btn btn-sm btn-success">Nueva venta</a>
                        @endcan
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered"  data-order='[[ 0, "desc" ]]' data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Asesor</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $item)
                                    @if (($item->user_id == auth()->id() && (date('Y-m-d', strtotime($item->created_at)) == now()->format('Y-m-d')) || ($item->status == 3 || $item->status == 2)) || auth()->user()->hasPermissionTo('CVS Lista de todas las ventas'))
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->client->name }}</td>
                                            <td>${{ number_format($item->total,2,',','.') }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->status == 3 ? 'Sin pago' : (($item->status == 2) ? 'Pago' : (($item->status == 1) ? 'Finalizado' : 'Cancelado')) }}</td>
                                            <td>
                                                @if (
                                                        auth()->user()->hasPermissionTo('CVS Ver ventas') ||
                                                        auth()->user()->hasPermissionTo('CVS Finalizar ventas')
                                                    )
                                                    <a href="{{ route('cvs_sales_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                                @endif
                                                @can('CVS Editar ventas')
                                                    <a href="{{ route('cvs_sales_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                                @endcan
                                                @can('CVS Cancelar ventas')
                                                    @if ($item->status == 3)
                                                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Cancelar</button>
                                                        {{-- Modal Delete --}}
                                                        <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('cvs_invoices_delete',$item->id) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="exampleModalLongTitle">Cancelar venta</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>¿Está seguro de cancelar la venta?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" class="btn btn-sm btn-danger">Aceptar</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endcan
                                            </td>
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

@section('js')
    <script src="{{asset('js/cvs/export.js')}}"></script>
@endsection