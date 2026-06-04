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
                                        <input type="text" class="form-control" name="ide" id="ide">
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
                                    class="form-control" name="municipioNew" id="municipioNew"
                                    value="{{ old('municipioNew') }}">
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
                        <h4><b>Productos</b></h4>
                        <div id="list_tools">
                            @php
                                $oldCategories = old('category', []);
                            @endphp
                        </div>
                        <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-sm btn-info " id="btn_plus_tools"><i
                                    class="fa fa-plus"></i> Agregar</button>
                            <button type="button" class="btn btn-sm btn-danger" id="btn_minus_tools"><i
                                    class="fa fa-minus"></i> Eliminar</button>
                        </div>
                        <hr>
                        <h4><b>Kits</b></h4>
                        <div id="list_kits">
                            @php
                                $oldCategories = old('kitGroup', []);
                            @endphp
                        </div>
                        <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-sm btn-info " id="btn_plus_kits"><i
                                    class="fa fa-plus"></i> Agregar</button>
                            <button type="button" class="btn btn-sm btn-danger" id="btn_minus_kits"><i
                                    class="fa fa-minus"></i> Eliminar</button>
                        </div>
                        <hr>
                        <h4>Item adicional</h4>
                        <div class="extra_item">
                            @php
                                $oldCategories = old('ItemGroup', []);
                            @endphp
                        </div>
                        <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-sm btn-info " id="btn_plus_item"><i
                                    class="fa fa-plus"></i> Agregar</button>
                            <button type="button" class="btn btn-sm btn-danger" id="btn_minus_item"><i
                                    class="fa fa-minus"></i> Eliminar</button>
                        </div>
                        <hr>
                        <div id="equipments">
                            <h4>Detalles de venta</h4>
                            <div class="row" id="sale">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fechaventa">Fecha de la Venta</label>
                                        <input type="date" class="form-control" id="fechaventa" name="fechaventa"
                                            value="{{ old('fechaventa') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="form-group">
                                        <b>
                                            <h2 id="valorventa"></h2>
                                            <input type="hidden" name="valorventa" id="valorventaInput"
                                                value="{{ old('valorventa') }}" required>
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-success" data-toggle="modal" data-target=".save-modal-lg">Guardar</a>
                        </div>
                    </div>
                    @include('energy.sale.include.save')
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
    <script src="{{ asset('js/project/mintic/maintence/create.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.alert').hide();
        });
        let index = {{ count(old('category', [])) }};
        let indexKit = {{ count(old('kitGroup', [])) }};
        let indexItem = {{ count(old('ItemGroup', [])) }};
        let categorias = @json($categorias);
        let kits = @json($kits);

        function createSelect(index) {
            let html = `
                <div class="select-container">
                    <div class="row select-group">
                        <div class="col-md-4">
                            <label>Categoria</label>
                            <select class="form-control category select2" name="products[category][${index}]" data-index="${index}" required>
                                <option value="">Seleccione una categoria</option>`;
            categorias.forEach(cat => {
                html += `<option value="${cat.id}">${cat.name}</option>`;
            });
            html += `</select></div>`;

            html += `
                    <div class="col-md-4">
                        <label>Subcategoria</label>
                        <select class="form-control subcategori select2" name="products[subcategori][${index}]" data-index="${index}" required>
                            <option value="">Seleccione una subcategoria</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Productos</label>
                        <select class="form-control products select2" name="products[products][${index}]" data-index="${index}" required>
                            <option value="">Seleccione un producto</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="amount">Cantidad</label>
                            <input type="number" name="products[amount_products][${index}]"
                                id="amount_products_${index}" class="form-control amount_products text-center"
                                value="" data-index="${index}" data-disponibles="" data-id="" disabled required>
                                <span id="alert_amount${index}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="value">Valor por unidad</label>
                            <input type="number" name="products[value_products][${index}]"
                                id="value_products_${index}" class="form-control value_products text-center"
                                value="" data-index="${index}" disabled required>
                                <span id="alert_amount${index}"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="warranty">Garantía en meses</label>
                            <input type="text" name="products[warranty_products][${index}]"
                                id="warranty_products_${index}" class="form-control warranty_products text-center"
                                value="" data-index="${index}" disabled required>
                                <span id="alert_warranty${index}"></span>
                        </div>
                    </div>
                </div>
                <div class="serial">
                    <h4>Ingrese los seriales de los equipos</h4>
                    <div class="row" id="serials_${index}">

                    </div>
                </div>
                <hr>`;
            return html;
        }

        function createSelectKit(indexKit) {
            let html = `
                <div class="select-container">
                    <div class="row select-group">
                        <div class="col-md-4">
                            <label>Categoria</label>
                            <select class="form-control kit select2" name="kit[kit][${indexKit}]" data-index="${indexKit}" required>
                                <option value="">Seleccione una categoria</option>`;
            kits.forEach(cat => {
                html += `<option value="${cat.id}">${cat.name}</option>`;
            });
            html += `</select></div>`;

            html += `
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="value">Valor del Kit</label>
                            <input type="number" name="kit[value_kits][${indexKit}]"
                                id="value_kit_${indexKit}" class="form-control value_products text-center"
                                value="" data-index="${indexKit}" disabled required>
                                <span id="alert_amount${indexKit}"></span>
                            <input type="hidden" name=""
                                id="value_kit_${indexKit}" class="form-control amount_products text-center"
                                value="1" data-index="${indexKit}" disabled required>
                                <span id="alert_amount${indexKit}"></span>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="warranty">Garantía en meses</label>
                            <input type="text" name="kit[warranty_kits][${indexKit}]"
                                id="warranty_kits_${indexKit}" class="form-control warranty_kits text-center"
                                value="" data-index="${indexKit}" disabled required>
                                <span id="alert_warranty${indexKit}"></span>
                        </div>
                    </div>
                </div><hr>`;
            return html;
        }

        function createSelectItem(indexItem) {
            let html = `
                        <div class="select-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="extra_item">Nombre del Item</label>
                                        <input type="text" class="form-control" id="extra_item" name="item[extra_item][${indexItem}]"
                                            value=""
                                            placeholder="Ejemplo: Instalación, transporte, etc." required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="extra_value">Valor del Item</label>
                                        <input type="number" class="form-control amount_products" id="extra_value" name="item[extra_value][${indexItem}]"
                                            value="" placeholder="Valor del item adicional" required>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            return html;
        }

        $('#btn_plus_tools').click(function() {
            $('#list_tools').append(createSelect(index));
            index++;
        });

        $('#btn_minus_tools').click(function() {
            if (index > 0) {
                $('#list_tools .select-container').last().remove();
                index--;
            }
            totalValor();
        });

        $('#btn_plus_kits').click(function() {
            $('#list_kits').append(createSelectKit(indexKit));
            indexKit++;
        });

        $('#btn_minus_kits').click(function() {
            if (indexKit > 0) {
                $('#list_kits .select-container').last().remove();
                indexKit--;
            }
            totalValor();
        });

        $('#btn_plus_item').click(function() {
            $('.extra_item').append(createSelectItem(indexItem));
            indexItem++;
        });

        $('#btn_minus_item').click(function() {
            if (indexItem > 0) {
                $('.extra_item .select-container').last().remove();
                indexItem--;
            }
            totalValor();
        });

        // Cargar subcategorías
        $(document).on('change', '.category', function() {
            const id = $(this).val();
            const i = $(this).data('index');
            const subSelect = $(`[name="products[subcategori][${i}]"]`);
            const prodSelect = $(`[name="products[products][${i}]"]`);
            const prodAmount = $(`[name="products[amount_products][${i}]"]`);
            const prodValue = $(`[name="products[value_products][${i}]"]`);
            const prodWarranty = $(`[name="products[warranty_products][${i}]"]`);
            prodAmount.prop('disabled', true);
            prodValue.prop('disabled', true);
            prodWarranty.prop('disabled', true);

            subSelect.prop('disabled', true).html('<option value="">Cargando...</option>');
            prodSelect.prop('disabled', true).html('<option value="">Seleccione una subcategoria</option>');

            if (id) {
                $.get('/energy/kits/get_subcategories/' + id, function(data) {
                    let html = '<option value="">Seleccione una subcategoria</option>';
                    data.forEach(item => {
                        html += `<option value="${item.id}">${item.name}</option>`;
                    });
                    subSelect.html(html).prop('disabled', false);

                });
            }
        });

        // Cargar productos
        $(document).on('change', '.subcategori', function() {
            const id = $(this).val();
            const i = $(this).data('index');
            const prodSelect = $(`[name="products[products][${i}]"]`);

            prodSelect.prop('disabled', true).html('<option value="">Cargando...</option>');

            if (id) {
                $.get('/energy/kits/get_products/' + id, function(data) {
                    let html = '<option value="">Seleccione un producto</option>';
                    data.forEach(item => {
                        html += `<option value="${item.id}">${item.model} - ${item.type}</option>`;
                    });
                    prodSelect.html(html).prop('disabled', false);
                    $(`[name="products[amount_products][${i}]"]`).val(1).prop('disabled', true);
                    $(`[name="products[value_products][${i}]"]`).prop('disabled', true);
                    $(`[name="products[warranty_products][${i}]"]`).prop('disabled', true);
                });
            }
        });

        // Cargar productos
        $(document).on('change', '.products', function() {
            const id = $(this).val();
            const i = $(this).data('index');
            const $container = $('#serials_' + i);
            if (id) {
                $.get('/energy/kits/get_product/' + id, function(data) {
                    $(`[name="products[amount_products][${i}]"]`).val(1).prop('disabled', false).attr(
                        'data-disponibles', data.disponibles).attr('data-id', data.id);
                    $(`[name="products[value_products][${i}]"]`).val(data.price).prop('disabled', false);
                    $(`[name="products[warranty_products][${i}]"]`).val(data.warranty).prop('disabled',
                        false);
                    totalValor();
                    $('#serials_' + i).append(InputSerials(i, 1, $container, id));
                });
            }
        });

        $(document).on('change', '.kit', function() {
            const id = $(this).val();
            const i = $(this).data('index');
            if (id) {
                $.get('/energy/kits/get_info/' + id, function(data) {
                    $(`[name="kit[value_kits][${i}]"]`).val(data.price).prop('disabled', false);
                    $(`[name="kit[warranty_kits][${i}]"]`).val(data.warranty).prop('disabled',
                        false);
                    totalValor();
                });
            }
        });

        $(document).on('change', '.amount_products', function() {
            const i = $(this).data('index');
            const amount = $(this).val();
            const disponibles = $(this).data('disponibles');
            const id = $(this).data('id');
            const $container = $('#serials_' + i);

            if (amount > disponibles) {
                $(`#alert_amount${i}`).addClass('text-danger').text('No hay suficientes equipos disponibles: ' +
                    disponibles).show();
                $('.btn-success').prop('disabled', true);
            } else {
                $(`#alert_amount${i}`).hide();
                $('.btn-success').prop('disabled', false);
                totalValor();
            }
            InputSerials(i, amount, $container, id);
        });

        function InputSerials(i, amount, $container, id) {
            // tomar valores actuales de los seriales (en orden)
            const existing = $container.find('input[type="text"]').map(function() {
                return $(this).val();
            }).get();

            // vaciar contenedor
            $container.empty();

            // reconstruir con valores previos cuando existan
            for (let s = 0; s < amount; s++) {
                const val = existing[s] || '';
                const html = `
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="serial_${i}_${s}">Serial ${s + 1}</label>
                            <input type="text" name="products[serials][${id}][]" id="serial_${i}_${s}" class="form-control" value="${val}">
                        </div>
                    </div>
                `;
                $container.append(html);
            }
        }

        $(document).on('change', '.value_products', function() {
            totalValor();
        });

        $(document).on('change', '#extra_value', function() {
            totalValor();
        });

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

        function totalValor() {
            let total = 0;
            $('.value_products').each(function() {
                let value = parseFloat($(this).val()) || 0;
                let amount = parseInt($(this).closest('.select-group').find('.amount_products').val()) || 0;
                total += value * amount;
            });
            total += parseFloat($('#extra_value').val()) || 0;
            $('#valorventa').text('$' + total.toLocaleString('es-CO', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }));
            $('#valorventaInput').val(total);
        }
    </script>
@endsection
