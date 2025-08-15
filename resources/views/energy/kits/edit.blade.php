@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Energía Solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li>Kits Solares</li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                <div class="box-title"> Equipo Solar</div>
                <div class="box-tools">
                    <a href="{{ route('energy_products') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{ route('energy_kits.update', $kit->id ) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center"><b>Datos del Kit</b></h4>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label for="amount">Cantidad de kits</label>
                                    <small>(Kits del mismo tipo que se registrarán)</small>
                                    <input type="number" class="form-control" name="amount" id="amount"
                                        value="{{ $count }}" required readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $kit->name }}" placeholder="Kit Solar para Hogar" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type">Tipo del Kit*</label>
                                    <input type="text" checked class="form-control" id="type" name="type"
                                        value="{{ $kit->type }}" placeholder="Kit Solar Aislado" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serie">Serie</label>
                                    <input type="text" class="form-control" id="serie" name="serie"
                                        value="{{ $kit->serie }}" placeholder="Número de serie del equipo" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Características:</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="potencia_dia">Potencia generada al día:</label>
                                    <input type="text" class="form-control" id="potencia_dia" name="potencia_dia"
                                        value="{{ $kit->caracteristics['potencia_dia'] }}" placeholder="4.5 kWh">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="potencia_nominal">Potencia nominal del kit solar:</label>
                                    <input type="text" class="form-control" id="potencia_nominal" name="potencia_nominal"
                                        value="{{ $kit->caracteristics['potencia_nominal'] }}" placeholder="1000 W">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="voltaje">Voltaje del kit solar:</label>
                                    <input type="text" class="form-control" id="voltaje" name="voltaje"
                                        value="{{ $kit->caracteristics['voltaje'] }}" placeholder="24 V">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Precio*</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ $kit->price }}" placeholder="Precio del equipo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="warranty">Garantía</label>
                                    <input type="text" class="form-control" id="warranty" name="warranty"
                                        value="{{ $kit->warranty }}" placeholder="Garantía del equipo en meses">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desription">Descripción*</label>
                                    <textarea name="description" id="description" cols="30" rows="4" class="form-control"
                                        placeholder="Descripción del kit">{{ $kit->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="equipment">
                            <h4 class="text-center">Equipos del Kit</h4>
                            @foreach ($products as $item)
                                <div class="row-{{ $item->id }}">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="product[]{{ $item->id }}">Categoría</label>
                                            <input type="text" class="form-control"
                                                id="product_model_{{ $item->id }}" name="oldProduct[category][]"
                                                value="{{ $item->category->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="product[]{{ $item->id }}">Subcategoría</label>
                                            <input type="text" class="form-control"
                                                id="product_model_{{ $item->id }}" name="oldProduct[category][]"
                                                value="{{ $item->subcategory->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="product_type_{{ $item->id }}">Tipo - Modelo</label>
                                            <input type="text" class="form-control"
                                                id="product_type_{{ $item->id }}" name="oldProduct[products_type][]"
                                                value="{{ $item->type }} - {{ $item->model }}" disabled>
                                            <input type="hidden" id="oldProduct-id-{{ $item->cod_product }}" name="oldProduct[products_id][]" value="{{ $item->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="amount_{{ $item->id }}">Cantidad</label>
                                            <input type="number" class="form-control old_amount_products" id="amount_{{ $item->cod_product }}"
                                                name="oldProduct[amount_product][]" value="{{ $item->cantidad }}" min="1" data-index="{{ $item->cod_product }}"
                                                required>
                                        </div>
                                        <span id="alert_amount{{ $item->cod_product }}"></span>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <div class="form-group">
                                            <label for="amount_{{ $item->id }}">Eliminar</label>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="this.closest('.row-{{ $item->id }}').remove()"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4><b>Agregar Productos</b></h4>
                                </div>
                            </div>
                        </div>
                        <div id="list_tools">
                            @php
                                $oldCategories = old('category', []);
                            @endphp

                            @foreach ($oldCategories as $i => $catId)
                                <div class="select-container">
                                    <div class="row select-group">
                                        {{-- Categoria --}}
                                        <div class="col-md-3">
                                            <label>Categoria</label>
                                            <select class="form-control category select2"
                                                name="products[category][{{ $i }}]"
                                                data-index="{{ $i }}">
                                                <option value="">Seleccione una categoria</option>
                                                @foreach ($categorias as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ $catId == $cat->id ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Subcategoria --}}
                                        <div class="col-md-3">
                                            <label>Subcategoria</label>
                                            <select class="form-control subcategori"
                                                name="products[subcategori][{{ $i }}]"
                                                data-index="{{ $i }}">
                                                <option value="">Seleccione una subcategoria</option>
                                                @foreach ($subcategoriasOld[$i] ?? [] as $sub)
                                                    <option value="{{ $sub->id }}"
                                                        {{ old("subcategori.$i") == $sub->id ? 'selected' : '' }}>
                                                        {{ $sub->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Producto --}}
                                        <div class="col-md-3">
                                            <label>Productos</label>
                                            <select class="form-control products"
                                                name="products[products][{{ $i }}]"
                                                data-index="{{ $i }}">
                                                <option value="">Seleccione un producto</option>
                                                @foreach ($productosOld[$i] ?? [] as $prod)
                                                    <option value="{{ $prod->id }}"
                                                        {{ old("products.$i") == $prod->id ? 'selected' : '' }}>
                                                        {{ $prod->model }} - {{ $prod->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="amount">Cantidad</label>
                                                <input type="number"
                                                    name="products[amount_products][{{ $i }}]"
                                                    id="amount_products_{{ $i }}"
                                                    class="form-control amnount_products"
                                                    value="{{ old("amount_products.$i") }}"
                                                    data-index="{{ $i }}" disabled required>
                                                <span id="alert_amount{{ $i }}" class="color-red alert">No hay
                                                    suficientes productos para la cantidad de Kits: <i
                                                        id="none_disponible{{ $i }}">Disponibles</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                        <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-sm btn-info " id="btn_plus_tools"><i
                                    class="fa fa-plus"></i> Agregar</button>
                            <button type="button" class="btn btn-sm btn-danger" id="btn_minus_tools"><i
                                    class="fa fa-minus"></i> Eliminar</button>
                        </div>
                        <hr>
                        <button class="btn btn-success submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/$theme/bower_components/select2/dist/css/select2.min.css") }}">
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
        let categorias = @json($categorias);

        function createSelect(index) {
            let html = `
                <div class="select-container">
                    <div class="row select-group">
                        <div class="col-md-3">
                            <label>Categoria</label>
                            <select class="form-control category select2" name="products[category][${index}]" data-index="${index}" required>
                                <option value="">Seleccione una categoria</option>`;
            categorias.forEach(cat => {
                html += `<option value="${cat.id}">${cat.name}</option>`;
            });
            html += `</select></div>`;

            html += `
                    <div class="col-md-3">
                        <label>Subcategoria</label>
                        <select class="form-control subcategori select2" name="products[subcategori][${index}]" data-index="${index}" required>
                            <option value="">Seleccione una subcategoria</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Productos</label>
                        <select class="form-control products select2" name="products[products][${index}]" data-index="${index}" required>
                            <option value="">Seleccione un producto</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="amount">Cantidad</label>
                            <input type="number" name="products[amount_products][${index}]"
                                id="amount_products_${index}" class="form-control amount_products"
                                value="" data-index="${index}" disabled required>
                                <span id="alert_amount${index}"></span>
                        </div>
                    </div>
                </div><hr>`;
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
        });

        // Cargar subcategorías
        $(document).on('change', '.category', function() {
            const id = $(this).val();
            const i = $(this).data('index');
            const subSelect = $(`[name="products[subcategori][${i}]"]`);
            const prodSelect = $(`[name="products[products][${i}]"]`);

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
                    $(`[name="products[amount_products][${i}]"]`).val(1).prop('disabled', false);
                });
            }
        });

        $(document).on('change', '#amount', function() {
            const kits = $(this).val();
            $('.amount_products').each(function() {
                const i = $(this).data('index');
                const prodSelect = $(`[name="products[products][${i}]"]`).val();
                if (prodSelect) {
                    amountProducts(prodSelect, $(this).val(), kits, i);
                } else {
                    $(`#alert_amount${i}`).hide();
                }
            });
        });

        $(document).on('change', '.amount_products', function() {
            const i = $(this).data('index');
            const amount = $(this).val();
            const kits = $('#amount').val();
            const prodSelect = $(`[name="products[products][${i}]"]`).val();
            console.log(`Cantidad para el producto en el índice ${i}: ${amount}`);
            if (prodSelect) {
                amountProducts(prodSelect, amount, kits, i);
            } else {
                $(`#alert_amount${i}`).hide();
                console.log(`No hay producto seleccionado en el índice ${i}`);
            }
        });

        $(document).on('change', '.old_amount_products', function() {
            const i = $(this).data('index');
            const amount = $(this).val();
            const kits = $('#amount').val();
            const id = $(`#oldProduct-id-${i}`).val();
            console.log(`Cantidad para el producto en el índice ${i}: ${amount}: Id ${id}`);
                amountProducts(id, amount, kits, i);
                // $(`#alert_amount${i}`).hide();
                // console.log(`No hay producto seleccionado en el índice ${i}`);
        });


        function amountProducts(id, amount, kits, i) {
            $.get(`/energy/kits/amount_products/${id}/${amount}/${kits}`, function(data) {
                if (data.success) {
                    $(`#alert_amount${i}`).hide();
                    console.log(`Cantidad suficiente para el producto en el índice ${i}`);
                    // $(`#alert_amount${i}`).css('display', 'none');;
                    $('.btn-success').prop('disabled', false);
                } else {
                    $(`#alert_amount${i}`).addClass('text-danger').text(
                        'No hay suficientes productos para la cantidad de Kits, equipos disponibles: ' + data
                        .disponibles).show();
                    console.log(`Cantidad insuficiente para el producto en el índice ${i}`);
                    $('.btn-success').prop('disabled', true);
                    $(`#none_disponible${i}`).text(data.disonibles);
                }
            }).fail(function() {
                console.error('Error al cargar los productos.');
            });
        }
    </script>
@endsection
