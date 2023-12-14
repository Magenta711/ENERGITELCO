@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Recibos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li class="active">Recibos</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de recibos sin pagar</h3>
                    <div class="box-tools">
                    @can('CVS Generar corte de pago caja')
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_breack_pay">Refrescar corte</button>
                            <div class="modal fade" id="modal_breack_pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="exampleModalLongTitle">Refrescar pago de caja</h4>
                                        </div>
                                        <form action="{{route('cvs_payment_cuy')}}" method="POST">
                                        @csrf
                                            <div class="modal-body">
                                                <p>¿Está seguro de refrescar los valores de la caja?</p>
                                                <small>Esto generar un archivo con relación de los items vendidos con su recaudo desde la fecha del ultimo corte al día de hoy.</small>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-sm btn-success">Aceptar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                    <th>Vendedor</th>
                                    <th>Cliente</th>
                                    <th>Sede</th>
                                    <th>Total</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->client->name }}</td>
                                        <td>{{ $item->sede->name }}</td>
                                        <td>${{ number_format($item->total, 2) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->status == 3 ? 'Sin pago' : (($item->status == 2) ? 'Pago' : (($item->status == 1) ? 'Finalizado' : 'Cancelado')) }}</td>
                                        <td>
                                            @can('CVS Pagar recibos')
                                                <a href="{{ route('cvs_invoices_edit',$item->id) }}" class="btn btn-sm btn-primary">Pagar</a>
                                            @endcan
                                            @can('CVS Cancelar ventas')
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
</section>
@endsection