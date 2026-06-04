@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear venta
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Venta</a></li>
        <li class="active">Crear venta</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_sales')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <h4>Información del cliente</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre cliente</label>
                        <p>{{ $id->client->name }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="address">Documento</label>
                        <p>{{ $id->client->document_type }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="address">Número</label>
                        <p>{{ $id->client->document }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Correo</label>
                        <p>{{ $id->client->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">Celular</label>
                        <p>{{ $id->client->tel }}</p>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Información de la venta</h4>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user">Vendedor</label>
                        <p>{{ $id->user->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cashier">Cajero</label>
                        <p>{{ $id->cashier ? $id->cashier->name : '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">CVS o bodega</label>
                        <p>{{ $id->sede->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">Estado</label>
                        <p>{{ $id->status == 3 ? 'Sin pago' : (($id->status == 2) ? 'Pago' : (($id->status == 1) ? 'Finalizado' : 'Cancelado')) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <p><b>Fecha de compra</b></p>
                    <p>{{ $id->sale_date }}</p>
                </div>
                <div class="col-md-6">
                    <p><b>Vencimiento garantia</b></p>
                    <p>{{ $id->expiration_date }}</p>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Medio de pago</h4>
                        @if ($id->cash)    
                            <p>
                                <b>Efectivo</b>
                            </p>
                            <p>$ {{ number_format($id->cash_value, 2) }}</p>
                        @endif
                        @if ($id->qr)
                            <p>
                                <b>Pago QR</b>
                            </p>
                            <p>$ {{ number_format($id->qr_value, 2) }}</p>
                        @endif
                        @if ($id->card)
                            <p>
                                <b>Tarjeta</b>
                            </p>
                            <p>$ {{ number_format($id->card_value, 2) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @php
                $i = 1;
            @endphp
            <hr>
            <h4>Detalle venta</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Valor unitario</th>
                            <th>Valor total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($id->details as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->productable->description }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>$ {{ number_format($item->value, 2) }}</td>
                                <td>$ {{ number_format($item->total_value, 2) }}</td>
                            </tr>
                        @endforeach
                        <tr class="active">
                            <th class="text-right" colspan="4"><h3>Total</h3></th>
                            <th><h3>$ {{ number_format($id->total, 2) }}</h3></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <h4>Recibo y documentos adjuntos</h4>
            <div class="row">
                @if ($id->token)
                <div class="col-sm-4">
                    <span class="mailbox-attachment-icon" id="icon">
                        <div id="type">
                            <i class="fa fa-file-pdf"></i>
                        </div>
                    </span>
                    <div class="mailbox-attachment-info">
                        <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->token}}.pdf</p>
                        <span class="mailbox-attachment-size">
                            Recibo
                            <a target="_blank" href="/storage/cvs/invoice/{{ $id->token }}.pdf" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                        </span>
                    </div>
                </div>
                @endif
                @if ($id->file)
                    <div class="col-sm-4">
                        <span class="mailbox-attachment-icon {{$id->file->type == "jpg" || $id->file->type == "png" || $id->file->type == "jpeg" ? 'has-img' : ''}}" id="icon">
                            <div id="type">
                                @if ($id->file->type=='pdf')
                                    <i class="fa fa-file-pdf"></i>
                                @endif
                                @if ($id->file->type=='docx' || $id->file->type=='doc')
                                    <i class="fa fa-file-word"></i>
                                @endif
                                @if ($id->file->type=='xlsx' || $id->file->type=='xls')
                                    <i class="fa  fa-file-excel"></i>
                                @endif
                                @if ($id->file->type=='pptx' || $id->file->type=='ppt')
                                    <i class="fa  fa-file-powerpoint"></i>
                                @endif
                                @if ($id->file->type == 'png' || $id->file->type == 'jpg' || $id->file->type == 'jpeg')
                                    <img src="/storage/cvs/cajas/{{ $id->file->name }}" style="width: 100%;" alt="Attachment">
                                @endif
                            </div>
                        </span>
                        <div class="mailbox-attachment-info">
                            <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$id->file->name}}</p>
                            <span class="mailbox-attachment-size">
                                {{$id->file->size}}
                                <a target="_blank" href="/storage/cvs/cajas/{{ $id->file->name }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                            </span>
                        </div>
                    </div>
                @endif
            </div>
            <hr>
            <strong>Comentarios</strong>
            <p>{{ $id->commentary }}</p>
        </div>
        @can('CVS Finalizar ventas')
            @if ($id->status == 2 && (auth()->id() == $id->user_id || auth()->user()->hasRole('Administrador')))
                <div class="box-footer text-right">
                    <form action="{{ route('cvs_sales_end',$id->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm btn-success">Finalizar</button>
                    </form>
                </div>
            @endif
        @endcan
    </div>
</section>
@endsection