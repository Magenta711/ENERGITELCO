<div class="modal fade edit-product-{{ $items->id }}-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>{{ $items->type }} {{ $items->cod_product }}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('energy_products.update', $items->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <label for="img">Icono {{ $items->id }}</label>
                        </div>
                        <div class="col-md-12 text-center">
                            @if ($items->files && $items->files->isNotEmpty())
                                @foreach ($items->files as $itemss)
                                    <div class="form-group text-center">
                                        <label for="file_{{ $items->id }}">
                                            <img id="preimg_edit_{{ $items->id }}"
                                                src="/storage/energy/{{ $itemss->name }}"
                                                style="width: 25%; cursor: pointer;" alt="Attachment">
                                        </label>
                                        <label for="file_{{ $items->id }}" class="form-control text-center">
                                            <i class="fa fa-upload"></i>
                                        </label>
                                        <input type="file" name="file_{{ $items->id }}"
                                            id="file_{{ $items->id }}" class="d-none file-edit hide"
                                            accept="image/*">
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group">
                                    <label for="file_{{ $items->id }}">
                                        <img id="preimg_edit_{{ $items->id }}"
                                            src=""
                                            style="width: 25%; cursor: pointer;" alt="Attachment">
                                    </label>
                                    <label for="file_{{ $items->id }}" class="form-control text-center">
                                        <i class="fa fa-upload"></i>
                                    </label>
                                    <input type="file" name="file_{{ $items->id }}"
                                        id="file_{{ $items->id }}" class="d-none file-edit hide" accept="image/*">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Tipo de Equipo</label>
                                <input type="text" class="form-control" id="type" name="type"
                                    value="{{ $items->type }}" placeholder="Panel Solar Bifacial">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" id="model" name="model"
                                    value="{{ $items->model }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="serie">Serie</label>
                                <input type="text" class="form-control" id="serie" name="serie"
                                    value="{{ $items->serie }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="power">Potencia</label>
                                <input type="text" class="form-control" id="power" name="power"
                                    value="{{ $items->power }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $items->price }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="warranty">Garantía</label>
                                <input type="text" class="form-control" id="warranty" name="warranty"
                                    value="{{ $items->warranty }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ancho">Ancho*</label>
                                <input type="number" class="form-control" id="ancho" name="ancho"
                                    value="{{ $items->ancho }}" placeholder="Ancho del equipo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alto">Alto*</label>
                                <input type="number" class="form-control" id="alto" name="alto"
                                    value="{{ $items->alto }}" placeholder="Alto del equipo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="largo">Largo*</label>
                                <input type="number" class="form-control" id="largo" name="largo"
                                    value="{{ $items->largo }}" placeholder="Largo del equipo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="peso">Peso*</label>
                                <input type="number" class="form-control" id="peso" name="peso"
                                    value="{{ $items->peso }}" placeholder="Peso del equipo">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="desription">Descripción</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ $items->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
