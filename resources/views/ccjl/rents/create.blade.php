@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear renta
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="#">Rentas</a></li>
        <li class="active">Crear renta</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="hide">
        <select name="description_id[]" id="description_id_1" class="form-control description_id">
            <option selected disabled></option>
            @foreach ($locals as $item)
                <option class="product_option" value="{{ $item->id }}">{{ $item->departament }}</option>
            @endforeach
        </select>
        @foreach ($locals as $item)
            <input type="text" value="{{ $item->value }}" id="value_product_1_{{ $item->id }}">
        @endforeach
        <select name="description_id[]" id="description_id_2" class="form-control description_id">
            <option selected disabled></option>
            @foreach ($services as $item)
                <option class="product_option" value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @foreach ($services as $item)
            <input type="text" value="{{ $item->value }}" id="value_product_2_{{ $item->id }}">
        @endforeach
        <select name="description_id[]" id="description_id_3" class="form-control description_id">
            <option selected disabled></option>
            @foreach ($administrations as $item)
                <option class="product_option" value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @foreach ($administrations as $item)
            <input type="text" value="{{ $item->value }}" id="value_product_3_{{ $item->id }}">
        @endforeach
    </div>
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('CCJL_rents')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('CCJL_rents_store')}}" method="post" autocomplete="off" id="form_sale">
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
                        <label for="number">Celular</label>
                        <input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}" placeholder="Celular">
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_start">Fecha de inicio</label>
                        <input type="date" name="date_start" id="date_start" class="form-control">
                        <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Detalle</h4>
            <div class="orgen" id="origen">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="product_1">Producto</label>
                            <select name="product[]" id="product_1" class="form-control product">
                                <option disabled selected></option>
                                <option value="1">Canon</option>
                                <option value="2">Servicios</option>
                                <option value="3">Administración</option>
                            </select>
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6">
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
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="months">Meses</label>
                            <input type="number" name="months[]" class="form-control months" value="1" id="months_1">
                            <span class="help-block" id="message_validate" style="display: none;">Este campo es obligatorio</span>
                            <span class="help-block" id="message_months_1" style="display: none;">Cantidad no disponible</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="value">Valor/mes</label>
                            <input type="number" name="value[]" class="form-control values_month" id="value_1" value="0">
                            <span class="help-block" id="message_validate" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="value">Total</label>
                            <input type="number" readonly name="total_value[]" class="form-control total_value" id="total_value_1" value="0">
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div id="destino"></div>
            <button type="button" id="clonar" class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar</button>
            <hr>
            <h3 id="text_total" class="text-right">Total: <span id="value_total">$ 0</span></h3>
            <input type="hidden" name="total" id="value_total_input">
            <input type="hidden" name="total_months" id="total_months">
        </div>
            <div class="box-footer">
                <button type="submit" id="send" class="btn btn-sm btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/ccjl/rent.js') }}"></script>
@endsection