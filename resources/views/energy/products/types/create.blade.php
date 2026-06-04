<div class="modal fade create-product-{{ $item->id }}-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><b>Nueva producto</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('energy_products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center"><b>Datos del Equipo</b></h4>
                                <ul>
                                    <li>Los equipos se mostrarán en la tienda por tipo.</li>
                                    <li>Los datos del equipo son los mismos para todos los equipos del mismo tipo que se
                                        registrarán.</li>
                                    <li>La cantidad de equipos se refiere a la cantidad de equipos del mismo tipo o
                                        modelo que
                                        se registrarán.</li>
                                    <li>La imagen del equipo debe ser de buena calidad y resolución.</li>
                                    <li>La imagen del equipo debe ser cuadrada.</li>
                                    <li>La imagen del equipo debe ser de un tamaño máximo de 2MB.</li>
                                    <li>La potencia del equipo debe ser ingresada en función del tipo de equipo:</li>
                                    <ul>
                                        <li>Paneles solares: Potencia en vatios (W).</li>
                                        <li>Inversores: Potencia en kilovatios (kW).</li>
                                        <li>Baterías: Capacidad en amperios-hora (Ah).</li>
                                        <li>Controladores de carga: Potencia en amperios (A).</li>
                                    </ul>
                                    <li>La descripción del producto debe ser corta pero detallada, puesto que esta será
                                        la información con la que se ofertará el producto.</li>
                                    <li>La garantía del producto debe ser ingresada en meses.</li>
                                    <li>El precio no debe llevar puntos o comas</li>
                                    <li>Dimensiones del equipo:</li>
                                    <ul>
                                        <li>Ancho: Medida horizontal del equipo (cm).</li>
                                        <li>Alto: Medida vertical del equipo (cm).</li>
                                        <li>Largo: Medida de profundidad del equipo (cm).</li>
                                        <li>Peso: Peso del equipo en kilogramos (kg).</li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label for="category_id">Categoría</label>
                                    <input type="hidden" name="category_id" id="category_id"
                                        value="{{ $id->id }}">
                                    <input type="text" class="form-control" id="category_name" name="category_name"
                                        value="{{ $id->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label for="subcategory_id">Subcategoría</label>
                                    <input type="hidden" name="subcategory_id" id="subcategory_id"
                                        value="{{ $item->id }}">
                                    <input type="text" class="form-control" id="subcategory_name"
                                        name="subcategory_name" value="{{ $item->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <label for="amount">Cantidad de Equipos</label>
                                    <small>(Equipos del mismo modelo que se registrarán)</small>
                                    <input type="number" class="form-control" name="amount" id="amount"
                                        value="{{ old('amount') }}">
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <label for="file_create_{{ $item->id }}">Imagen</label><br>
                                    <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                        <img src="" alt="" width="40%"
                                            id="preimg_create_{{ $item->id }}">
                                    </div>
                                    <label for="file_create_{{ $item->id }}" class="form-control text-center">
                                        <i class="fa fa-upload"></i>
                                    </label>
                                    <input type="file" name="file_{{ $item->id }}"
                                        id="file_create_{{ $item->id }}" class="hide" accept="image/*"
                                        value="{{ old('file_' . $item->id) }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type">Tipo de Equipo*</label>
                                    <input type="text" checked class="form-control" id="type" name="type"
                                        value="{{ old('type') }}" placeholder="Panel Solar Bifacial">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="model">Modelo*</label>
                                    <small></small>
                                    <input type="text" class="form-control" id="model" name="model"
                                        value="{{ old('model') }}" placeholder="M410-144 Bifacial">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serie">Serie</label>
                                    <input type="text" class="form-control" id="serie" name="serie"
                                        value="{{ old('serie') }}" placeholder="Número de serie del equipo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="porwe">Potencia*</label>
                                    <input type="text" class="form-control" id="porwe" name="porwe"
                                        value="{{ old('porwe') }}" placeholder="550W">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Precio*</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ old('price') }}" placeholder="Precio del equipo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="warranty">Garantía</label>
                                    <input type="text" class="form-control" id="warranty" name="warranty"
                                        value="{{ old('warranty') }}" placeholder="Garantía del equipo en meses">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ancho">Ancho*</label>
                                    <input type="number" class="form-control" id="ancho" name="ancho"
                                        value="{{ old('ancho') }}" placeholder="Ancho del equipo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="alto">Alto*</label>
                                    <input type="number" class="form-control" id="alto" name="alto"
                                        value="{{ old('alto') }}" placeholder="Alto del equipo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="largo">Largo*</label>
                                    <input type="number" class="form-control" id="largo" name="largo"
                                        value="{{ old('largo') }}" placeholder="Largo del equipo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="peso">Peso*</label>
                                    <input type="number" class="form-control" id="peso" name="peso"
                                        value="{{ old('peso') }}" placeholder="Peso del equipo">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desription">Descripción*</label>
                                    <textarea name="description" id="description" cols="30" rows="4" class="form-control"
                                        placeholder="Panel solar Bifacial M410-144"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success submit btn-send">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
