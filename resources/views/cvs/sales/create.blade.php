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
        <div class="hide">
            <select name="description_id[]" id="description_id_1" class="form-control description_id">
                <option selected disabled></option>
                @foreach ($moviles as $item)
                    <option class="product_option sede_product_{{ $item->sede_id }}" style="display: none" value="{{ $item->id }}">{{ $item->cod }} - {{ $item->description }}</option>
                @endforeach
            </select>
            @foreach ($moviles as $item)
                <input type="text" value="{{ $item->value }}" id="value_product_1_{{ $item->id }}">
                <input type="text" value="{{ $item->icc_id }}" id="icc_id_product_1_{{ $item->id }}">
            @endforeach
            <select name="description_id[]" id="description_id_2" class="form-control description_id">
                <option selected disabled></option>
                    @foreach ($sims as $item)
                        <option value="{{ $item->id }}">{{ $item->cod }} - {{ $item->description }} - {{ $item->type->name }}</option>
                    @endforeach
            </select>
            @foreach ($sims as $item)
                @foreach ($item->type->prices as $value)
                    <input type="text" value="{{ $value->prices }}" id="value_product_2_{{ $value->sede_id }}_{{ $item->id }}">
                @endforeach
            @endforeach
            <select name="description_id[]" id="description_id_3" class="form-control description_id">
                <option selected disabled></option>
                @foreach ($accesories as $item)
                    <option class="product_option sede_product_{{ $item->sede_id }}" value="{{ $item->id }}">{{ $item->cod }} - {{ $item->description }}</option>
                @endforeach
            </select>
            @foreach ($accesories as $item)
                <input type="text" value="{{ $item->value }}" id="value_product_3_{{ $item->id }}">
                <input type="text" value="{{ $item->amount }}" id="amount_product_3_{{ $item->id }}">
            @endforeach
            <select name="description_id[]" id="description_id_4" class="form-control description_id">
                <option selected disabled></option>
                @foreach ($services as $item)
                    <option value="{{ $item->id }}">{{ $item->cod }} - {{ $item->description }}</option>
                @endforeach
            </select>
            @foreach ($services as $item)
                <input type="text" value="{{ $item->value }}" id="value_product_4_{{ $item->id }}">
            @endforeach
        </div>
        <form action="{{route('cvs_sales_store')}}" method="post" autocomplete="off" id="form_sale">
            @csrf
        <div class="box-body">
            <h4>Información del cliente</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre cliente</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Nombre completo">
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="document">Tipo de identificación</label><br>
                        <label for="document_type_0">NIT</label>
                        <input type="radio" name="document_type" class="document_type" id="document_type_0" value="NIT">
                        <label for="document_type_1">Cédula</label>
                        <input type="radio" name="document_type" class="document_type" id="document_type_1" value="Cédula" checked>
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="document">Número</label>
                        <input type="number" name="document" id="document" class="form-control" value="{{ old('document') }}" placeholder="Número de identificación">
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="example@mail.com">
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">Celular</label>
                        <input type="number" name="tel" id="tel" class="form-control" value="{{ old('tel') }}" placeholder="Celular">
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="converged_client">Realizo oferta de convergencia al cliente</label><br>
                        <input type="radio" name="converged_client" class="converged_client" id="converged_cliente_y" value="1"><label for="converged_cliente_y">Si </label>
                        <input type="radio" name="converged_client" class="converged_client" id="converged_cliente_n" checked><label for="converged_cliente_n" value="0">No </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="send_emails">
                        <input type="checkbox" name="send_emails" id="send_emails" value="1"> Desea recibir ofertas o comunicaciones a través de su dirección de correo electrónico</label>
                    </div>
                </div>    
                
                {{-- <div class="col-md-4">
                    <div class="form-group">
                        <label for="data_policies">
                        <input type="checkbox" name="data_policies" id="data_policies"> Acepta los TERMINOS Y CONDICIONES y confirma que ha leido y entendido la POLÍTICA DE DATOS</label>
                    </div>
                </div>     --}}
                
            </div>
            <hr>
            <h4>Venta</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sede_id">CVS o bodega</label>
                        <select name="sede_id" id="sede_id" class="form-control">
                            <option selected disabled></option>
                            @foreach ($sedes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cashier_id">Cajero</label>
                        <select name="cashier_id" id="cashier_id" class="form-control">
                            <option selected disabled></option>
                            @foreach ($users as $item)
                                @if ($item->hasPermissionTo('CVS Pagar recibos') && auth()->id() != $item->id)
                                    <option value="{{ $item->id }}">{{ $item->cedula }} - {{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Detalle venta</h4>
            <div class="orgen" id="origen">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="product_1">Producto</label>
                            <select name="product[]" id="product_1" disabled="false" class="form-control product">
                                <option disabled selected></option>
                                <option value="1">Movil</option>
                                <option value="2">Sim Cards</option>
                                <option value="3">Accesorio</option>
                                <option value="4">Servicios claro</option>
                            </select>
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="description_empty_1">Detalle</label>
                            <div class="destino" id="destino_1">
                                <select name="description[]" id="description_empty_1" class="form-control description_id">
                                    <option disabled selected></option>
                                </select>
                            </div>
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="type_sale">D o F</label>
                            <select name="type_sale[]" id="type_sale_1" class="form-control type_sale">
                                <option selected disabled></option>
                                <option value="Digital">Digital</option>
                                <option value="Física">Física</option>
                            </select>
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="activation_type">Tipo activación</label>
                            <select name="activation_type[]" id="activation_type_1" class="form-control activation_type">
                                <option selected disabled></option>
                                @foreach ($activations as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="amount">Cantidad</label>
                            <input type="number" name="amount[]" class="form-control amount" value="1" id="amount_1">
                            <span class="help-block" id="message_validate" style="display: none;">Este campo es obligatorio</span>
                            <span class="help-block" id="message_amount_1" style="display: none;">Cantidad no disponible</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="value">Valor unitario</label>
                            <input type="number" name="value[]" class="form-control values_product" id="value_1" value="0">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="value">Total</label>
                            <input type="total_value_1" readonly name="total_value[]" class="form-control total_value" id="total_value_1" value="0">
                        </div>
                    </div>
                    {{-- Modificar el IVA --}}
                </div>
                <hr>
            </div>
            <div id="destino"></div>
            <button type="button" disabled id="clonar" class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar</button>
            <hr>
            <h3 id="text_total" class="text-right">Total: <span id="value_total">$ 0</span></h3>
            <input type="hidden" name="total" id="value_total_input">
            <hr>
            <div class="form-group">
                <label for="commentary">Comentarios</label>
                <textarea name="commentary" id="commentary" class="form-control" cols="30" rows="0"></textarea>
            </div>
        </div>
            <div class="box-footer">
                <button type="submit" id="send" class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/cvs/sale.js') }}"></script>
@endsection