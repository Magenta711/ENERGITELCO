@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar renta
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="#">Rentas</a></li>
        <li class="active">Editar renta</li>
    </ol>
</section>
<div class="hide">
    {{-- Facturas pagas --}}
    <input type="hidden" value="{{ count($id->invoicesPay()) }}" id="count_invoices">
</div>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('CCJL_rents')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('CCJL_rents_update',$id->id)}}" method="post" autocomplete="off" id="form_sale">
            @csrf
            @method('PUT')
            <div class="box-body">
                <h4>Información del cliente</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre cliente</label>
                            <input type="text" readonly name="name" id="name" class="form-control" value="{{ $id->client->name }}" placeholder="Nombre completo">
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="document">Tipo de identificación</label><br>
                            <label for="document_type_0">NIT</label>
                            <input type="radio" disabled name="document_type" class="document_type" id="document_type_0" value="NIT">
                            <label for="document_type_1">Cédula</label>
                            <input type="radio" disabled name="document_type" class="document_type" id="document_type_1" value="Cédula" checked>
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="document">Número</label>
                            <input type="number" readonly name="document" id="document" class="form-control" value="{{ $id->client->document }}" placeholder="Número de identificación">
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" readonly name="email" id="email" class="form-control" value="{{ $id->client->email }}" placeholder="example@mail.com">
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="number">Celular</label>
                            <input type="number" readonly name="number" id="number" class="form-control" value="{{ $id->client->number }}" placeholder="Celular">
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Destino</label><br>
                            <label for="from_0"><input type="radio" name="from" id="from_0" {{$id->from == "CCJL" ? 'checked' : ''}} value="CCJL"> CCJL</label>
                            <label for="from_1"><input type="radio" name="from" id="from_1" {{$id->from == "Energitelco" ? 'checked' : ''}} value="Energitelco"> Energitelco</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_start">Fecha de inicio</label>
                            <input type="date" {{ ($id->date_start < now()->format('Y-m-d')) ? 'readonly' : '' }} value="{{ $id->date_start }}" name="date_start" id="date_start" class="form-control">
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                </div>
                <hr>
                @php
                    $i = 0;
                @endphp
                <h4>Detalle</h4>
                @foreach ($id->details as $item)
                <input type="hidden" value="{{ $item->id }}" name="detail_id[]">
                        @php
                            $i++;
                        @endphp
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class="form-group">
                                <label for="product_{{ $i }}">Producto</label>
                                <select name="product[]" id="product_{{ $i }}" readonly class="form-control product">
                                    <option disabled selected></option>
                                    <option {{ $item->productable_type == 'App\Models\ccjl\ccjl_pro_local' ? 'selected' : '' }} value="1">Canon</option>
                                    <option {{ $item->productable_type == 'App\Models\ccjl\ccjl_pro_services' ? 'selected' : '' }} value="2">Servicios</option>
                                    <option {{ $item->productable_type == 'App\Models\ccjl\ccjl_pro_administration' ? 'selected' : '' }} value="3">Administración</option>
                                </select>
                                <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class="form-group">
                                <label for="description_empty_{{ $i }}">Detalle</label>
                                <div class="destino" id="destino_{{ $i }}">
                                    <input type="text" name="description[]" readonly id="description_empty_{{ $i }}" class="form-control description_id" value="{{ $item->productable->name ?? $item->productable->departament }}"">
                                </div>
                                <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <div class="form-group">
                                <label for="months">Meses</label>
                                <input type="number" name="months[]" class="form-control months" value="{{ $item->months }}" id="months_{{ $i }}">
                                <span class="help-block" id="message_validate" style="display: none;">Este campo es obligatorio</span>
                                <span class="help-block" id="message_months_{{ $i }}" style="display: none;">Cantidad no disponible</span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="value">Valor/mes</label>
                                <input type="number" name="value[]" class="form-control values_month" id="value_{{ $i }}" value="{{ $item->value }}">
                                <span class="help-block" id="message_validate" style="display: none;">Este campo es obligatorio</span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="value">Total</label>
                                <input type="number" readonly name="total_value[]" class="form-control total_value" id="total_value_{{ $i }}" value="{{ $item->total_value }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <h3 id="text_total" class="text-right">Total: <span id="value_total">$ {{ number_format($id->total,2) }}</span></h3>
                <input type="hidden" name="total" id="value_total_input" value="{{ $id->total }}">
                <input type="hidden" name="total_months" id="total_months" value="{{ $id->total_months }}">
            </div>
            <div class="box-footer">
                <button type="submit" id="send" class="btn btn-sm btn-primary">Guardar</button>
                <button type="submit" id="send" class="btn btn-sm btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/ccjl/edit_rent.js') }}"></script>
@endsection