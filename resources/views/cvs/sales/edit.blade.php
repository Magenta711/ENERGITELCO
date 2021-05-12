@extends('lte.layouts')
@section('content')
@php
    function typeCod($item)
    {
        switch ($item->productable_type) {
            case 'App\Models\cvs\inventory\cvs_inv_moviles':
                return "IMEI";
                break;
            case 'App\Models\cvs\inventory\cvs_inv_claro_service':
                return "Tipo";
                break;
            case 'App\Models\cvs\inventory\cvs_inv_accesory':
                return "Código";
                break;
            case 'App\Models\cvs\inventory\cvs_inv_sim':
                return "ICC-IC";
                break;
            
            default:
                return "Código";
                break;
        }
    }
@endphp
<section class="content-header">
    <h1>
        Editar venta
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Venta</a></li>
        <li class="active">Editar ventas</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_sales')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_sales_update',$id->id)}}" method="post" autocomplete="off" id="form_sale" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
            <h4>Venta</h4>
            <div class="row">

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
            <div class="row">
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
                @else
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="file">Archivo adjunto</label>
                            <label for="file" id='label_file' class="form-control text-center"><i class="fa fa-upload"></i></label>
                            <input type="file" name="file" id="file" class="hide">
                        </div>
                    </div>
                @endif
            </div>
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
                            <th>Acciones</th>
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
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modelDetail_{{ $item->id }}"><i class="fa fa-edit"></i></button>
                                        
                                    <div class="modal fade" tabindex="-1" id="modelDetail_{{ $item->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title">{{ $item->id }}</h4>
                                                </div>
                                                <form action="{{route('performance_evaluation_create')}}" method="post">
                                                @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <p><b>{{ typeCod($item) }}</b><br>{{ $item->productable->cod }}</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p><b>Descripción</b><br>{{ $item->productable->description }}</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @if ($item->productable_type == "App\Models\cvs\inventory\cvs_inv_moviles" || $item->productable_type == "App\Models\cvs\inventory\cvs_inv_claro_service")
                                                            <div class="form-group">
                                                                <label for="payroll_{{ $item->id }}">Planilla</label>
                                                                <input type="text" name="payroll[{{ $item->id }}]" id="payroll_{{ $item->id }}" class="form-control" value="{{ $item->payroll }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="activation_date_{{ $item->id }}">Fecha de activación</label>
                                                                <input type="date" name="activation_date[{{ $item->id }}]" id="activation_date_{{ $item->id }}" value="{{ $item->activation_date }}" class="form-control">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-success">Aceptar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="active">
                            <th class="text-right" colspan="4"><h3>Total</h3></th>
                            <th><h3>$ {{ number_format($id->total, 2) }}</h3></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="form-group">
                <label for="commentary">Comentarios</label>
                <textarea name="commentary" id="commentary" class="form-control" cols="30" rows="0">{{ $id->commentary }}</textarea>
            </div>
        </div>
            <div class="box-footer">
                <button type="submit" id="send" class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</section>
@endsection