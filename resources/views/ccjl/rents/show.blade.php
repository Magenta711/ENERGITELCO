@extends('lte.layouts')
@section('content')

@php
    function hasPay($item){
        $rest = false;
        if ($item->expiration_date < now() && $item->status == 0) {
            $rest = true;
        }
        return $rest;
    }
@endphp

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
                <a href="{{route('CCJL_rents')}}" class="btn btn-sm btn-primary">Volver</a>
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address">Docuemto</label>
                        <p>{{ $id->client->document_type }}</p>
                    </div>
                </div>
                <div class="col-md-3">
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
                        <p>{{ $id->client->number }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Destino</label><br>
                        <p>{{$id->from}}</p>
                    </div>
                </div>
            </div>
            <hr>
            @php
                $i = 1;
            @endphp
            <h4>Detalle</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Descripción</th>
                            <th>Meses</th>
                            <th>Valor/mes</th>
                            <th>Valor total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($id->details as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->productable->name ?? $item->productable->departament }}</td>
                                <td>{{ $item->months }}</td>
                                <td>${{ number_format($item->value, 2) }}</td>
                                <td>${{ number_format($item->total_value, 2) }}</td>
                            </tr>
                        @endforeach
                        <tr class="active">
                            <th class="text-right" colspan="4"><h3>Total</h3></th>
                            <th><h3>${{ number_format($id->total, 2) }}</h3></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            @php
                $i = 1;
                $rest = $id->total;
                $pay = false;
                $diff = 0;
            @endphp
            <h4>Recibos</h4>
            <div class="table responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Valor</th>
                            <th>Total pago</th>
                            <th>Diferencia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($id->invoices as $item)
                            <tr class="{{ hasPay($item) ? 'bg-red' : ''  }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->cod }}</td>
                                <td>{{ $item->expiration_date }}</td>
                                <td>{{ $item->status == 1 ? 'Pago' : 'Sin pagar' }}</td>
                                <td>${{ number_format($item->total_pay + (-($diff)),2) }}</td>
                                <td>${{ number_format($item->total,2) }}</td>
                                <td>${{ number_format($diff = $item->diff,2) }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modelDetail_{{ $item->id }}">Detalle</button>
                                        
                                        <div class="modal fade" tabindex="-1" id="modelDetail_{{ $item->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">{{ $item->cod }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Código<b></b><br>{{ $item->cod }}</p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <p>Fecha de vencimiento<b></b><br>{{ $item->expiration_date }}</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p>Fecha de pago<b></b><br>{{ $item->date_pay }}</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p>Valor<b></b><br>${{ number_format($item->total_pay,2) }}</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p>Total pago<b></b><br>${{ number_format($item->total,2) }}</p>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <p>Diferencia<b></b><br>${{ number_format($item->diff,2) }}</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h4>Medio de pago</h4>
                                                        <div class="row">
                                                            @if ($item->cash)
                                                                <div class="col-sm-4">
                                                                    <p>Efectivo<b></b><br>${{ number_format($item->cash,2) }}</p>
                                                                </div>
                                                            @endif
                                                            @if ($item->card)
                                                                <div class="col-sm-4">
                                                                    <p>Targeta<b></b><br>${{ number_format($item->card,2) }}</p>
                                                                </div>
                                                            @endif
                                                            @if ($item->qr)
                                                                <div class="col-sm-4">
                                                                    <p>QR<b></b><br>${{ number_format($item->qr,2) }}</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <hr>
                                                        <p>Estado<b></b><br>{{ $item->status == 1 ? 'Pago' : 'Sin pago' }}</p>
                                                        <hr>
                                                        <div class="row">
                                                            @if ($item->token)
                                                                <div class="col-sm-4">
                                                                    <span class="mailbox-attachment-icon" id="icon">
                                                                        <div id="type">
                                                                            <i class="fa fa-file-pdf"></i>
                                                                        </div>
                                                                    </span>
                                                                    <div class="mailbox-attachment-info">
                                                                        <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$item->token}}.pdf</p>
                                                                        <span class="mailbox-attachment-size">
                                                                            Recibo
                                                                            <a target="_blank" href="/storage/ccjl/invoice/{{ $item->token }}.pdf" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-success">Aceptar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @if (!$pay)
                                            @can('CCJL Pagar rentas')
                                                <a href="{{ route('CCJL_rents_pay',$item->id) }}" class="btn btn-sm btn-primary">Pagar</a>
                                            @endcan
                                            @can('CCJL Recordar pago de rentas')
                                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modelRemember_{{ $item->id }}">Recordar pago</button>
                                                
                                                <div class="modal fade" tabindex="-1" id="modelRemember_{{ $item->id }}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title">{{ $item->cod }}</h4>
                                                            </div>
                                                            <form action="{{route('CCJL_rents_remember',$item->id)}}" method="post">
                                                            @csrf
                                                                <div class="modal-body">
                                                                    <p>¿Está seguro de notificar el pago al cliente?</p>
                                                                    <small class="text-muted">Esta accion envia un email, con el valor a pagar y la fecha maxima del pago.</small>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                                    <button class="btn btn-sm btn-success">Aceptar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan
                                            @php
                                                $pay = true;
                                            @endphp
                                        @endif
                                    @endif    
                                </td>
                            </tr>
                            @php
                                $rest = $rest - $item->total_pay;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <h4>Documentos adjuntos</h4>
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
        @can('CVS Finalizar ventas')
            @if ($id->status == 2)
                <div class="box-footer text-right">
                    <form action="{{ route('cvs_sales_update',$id->id) }}" method="post">
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