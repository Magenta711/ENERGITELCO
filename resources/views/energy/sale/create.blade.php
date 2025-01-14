@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Nueva Venta <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Energías</a></li>
            <li><a href="#">Ventas</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">
        @include('energy.sale.include.list')
        <div class="box">
            <div class="box-header">
                <div class="box-title">Realizar Venta</div>
                <div class="box-tools">
                    <a href="{{ route('energy_sale') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{ route('energy_sale.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div id="selectClient">
                            <h4>Cliente</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="client">Seleccione el cliente</label>
                                        <select onchange="infoUser(this)" name="client" id="client"
                                            class="form-control">
                                            <option selected></option>
                                            @foreach ($client as $item)
                                                <option value="{{ $item->id }}">{{ $item->name . '-' . $item->ide }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nameClient">Nombre</label>
                                        <input type="text" class="form-control" name="nameClient" id="nameClient">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="typeId">Tipo de Identificación</label>
                                        <select name="typeId" id="typeId" class="form-control">
                                            <option value=""></option>
                                            <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                            <option value="Cédula de extranjería">Cédula de extranjería</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="NIT">NIT</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ide">Documento</label>
                                        <input type="text" class="form-control" name="ide"
                                            id="ide">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="locate">Ubicación</label>
                                        <input type="text" class="form-control" name="locate" id="locate">
                                    </div>
                                </div>
                                <div class="col-md-4"><label for="type_client">Tipo de Cliente</label><select
                                        name="type_client" id="type_client" class="form-control">
                                        <option selected></option>
                                        <option value="Distribuidor">Distribuidor</option>
                                        <option value="Cliente Final">Cliente Final</option>
                                        <option value="Instalador">Instalador</option>
                                        <option value="Otro">Otro</option>
                                    </select></div>
                            </div>
                        </div>
                        <input type="hidden" name="newCliente" id="newCliente" value="0">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="newClient">Nuevo Cliente</label>
                                    <input type="checkbox" name="newClient" id="newClient">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="newClients" hidden>
                            <div class="col-md-4"><label for="nameNew">Nombre</label><input type="text"
                                    class="form-control" name="nameNew" id="nameNew" value="{{ old('nameNew') }}"></div>
                            <div class="col-md-4"><label for="typeIdNew">Tipo de Identificación</label><select
                                    name="typeIdNew" id="typeIdNew" class="form-control">
                                    <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                    <option value="Cédula de extranjería">Cédula de extranjería</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                    <option value="NIT">NIT</option>
                                    <option value="Otro">Otro</option>
                                </select></div>
                            <div class="col-md-4"><label for="ideNew">Identificación/NIT</label><input type="text"
                                    class="form-control" name="ideNew" id="ideNew" value="{{ old('ideNew') }}">
                            </div>
                            <div class="col-md-4"><label for="telNew">Telefono de Contacto</label><input type="text"
                                    class="form-control" name="telNew" id="telNew" value="{{ old('telNew') }}">
                            </div>
                            <div class="col-md-4"><label for="emailNew">Correo Eléctronico</label><input type="text"
                                    class="form-control" name="emailNew" id="emailNew" value="{{ old('emailNew') }}">
                            </div>
                            <div class="col-md-4"><label for="departamentNew">Departamento</label><input type="text"
                                    class="form-control" name="departamentNew" id="departamentNew"
                                    value="{{ old('departamentNew') }}"></div>
                            <div class="col-md-4"><label for="municipioNew">Municipio</label><input type="text"
                                    class="form-control" name="municipioNew" id="municipioNew" value="{{ old('municipioNew') }}">
                            </div>
                            <div class="col-md-4"><label for="type_clientNew">Tipo de Cliente</label><select
                                    name="type_clientNew" id="type_clientNew" class="form-control">
                                    <option selected></option>
                                    <option value="Distribuidor">Distribuidor</option>
                                    <option value="Cliente Final">Cliente Final</option>
                                    <option value="Instalador">Instalador</option>
                                    <option value="Otro">Otro</option>
                                </select></div>
                        </div>
                        <hr>
                        <h4>Producto</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="productId">Seleccione el tipo de producto disponible</label>
                                    <select name="productId" id="productId" class="form-control selectorkits">
                                        <option value=""></option>
                                        @php
                                            $addedproducts = [];
                                        @endphp
                                        @foreach ($products as $product)
                                            @if (!in_array($product->type, $addedproducts))
                                                <option {{ old('name_product') == $product->id ? 'selected' : '' }}
                                                    value="{{ $product->type }}">
                                                    {{ $product->type }}
                                                </option>
                                                @php
                                                    $addedproducts[] = $product->type;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ModelProduct">Seleccione el modelo de Producto Disponible</label>
                                    <select name="ModelProduct" id="ModelProduct" class="form-control" disabled>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="equipments" hidden>
                            <h4>Equipo</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="type">Tipo de Equipo</label>
                                        <p id="type"></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="model">Modelo</label>
                                        <p id="model"></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="serie">Serie</label>
                                        <p id="serie"></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="potencia">Potencia</label>
                                        <p id="potencia"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price">Precio DEFINIDO</label>
                                        <p id="price"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="garantia">Garantía DEFINIDA</label>
                                        <p id="garantia"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="desription">Descripción</label>
                                        <p id="desription"></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Detalles de venta</h4>
                            <div class="row" id="sale" hidden>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fechaventa">Fecha de la Venta</label>
                                        <input type="date" class="form-control" id="fechaventa" name="fechaventa"
                                            value="{{ old('fechaventa') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="garantiaventa">Garantía de Venta</label>
                                        <input type="text" class="form-control" id="garantiaventa"
                                            name="garantiaventa" value="{{ old('garantiaventa') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="valorventa">Valor Total de la Venta</label>
                                        <input type="number" class="form-control" id="valorventa" name="valorventa"
                                            value="{{ old('valorventa') }}" required>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="btn btn-info" data-toggle="modal"
                                data-target=".save-modal-lg">Guardar</a>
                        </div>
                    </div>
                    @include('energy.sale.include.save')
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('#newClient').change(function() {
            const checkbox = $('#newClient');
            if (checkbox.is(':checked')) {
                $('#newClients').show();
                $('#selectClient').hide();
                $('#newCliente').val(1);
            } else {
                $('#newClients').hide();
                $('#selectClient').show();
                $('#newCliente').val(0);
            }
        })

        function infoUser(element) {
            let user_id = element.value;
            let user_name = $('#name' + user_id).val()
            let user_ide = $('#ide' + user_id).val()
            let user_typeId = $('#typeId' + user_id).val()
            let user_locate = $('#locate' + user_id).val()
            let user_typeClient = $('#type_client' + user_id).val()
            $('#nameClient').val(user_name).prop('readonly', false);
            $('#ide').val(user_ide);
            $('#typeId').val(user_typeId);
            $('#locate').val(user_locate);
            $('#type_client').val(user_typeClient);
        }

        $('#productId').change(function() {
            let selectedType = $(this).val();
            let escapedType = CSS.escape(selectedType);
            let products = [];
            $(`input[id=${escapedType}]`).each(function() {
                products.push({
                    id: $(this).data('id'),
                    name: $(this).val()
                });
            });

            let html_products = '<option value="">Seleccione un modelo</option>';
            products.forEach(product => {
                html_products += `<option value="${product.id}">${product.name}</option>`;
            });

            $('#ModelProduct').prop('disabled', false).html(html_products);
        })

        $('#ModelProduct').change(function() {
            $('#equipments').prop('hidden', false)
            $('#sale').prop('hidden', false)
            $('.submit').prop('disabled', false)

            let type = $('#EquipType-' + this.value)
            let model = $('#EquipModel-' + this.value)
            let serie = $('#EquipSerie-' + this.value)
            let power = $('#EquipPower-' + this.value)
            let price = $('#EquipPrice-' + this.value)
            let warranty = $('#EquipWarranty-' + this.value)
            let description = $('#EquipDescription-' + this.value)

            $('#type').text(type.val())
            $('#model').text(model.val())
            $('#serie').text(serie.val())
            $('#potencia').text(power.val())
            $('#price').text(price.val())
            $('#valorventa').val(price.val())
            $('#garantia').text(warranty.val())
            $('#garantiaventa').val(warranty.val())
            $('#desription').text(description.val())
        })
    </script>
@endsection
