<div class="modal fade edit-{{ $item->id }}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>{{ $item->type }} {{ $item->cod_product }}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('energy_products.update_product', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 text-center">
                        <label for="img">Icono</label>
                    </div>
                    <div class="col-md-12 text-center">
                        @if ($item->files)
                        @foreach ($item->files as $items)
                            <img id="img" src="/storage/energy/{{$items->name}}" style="width: 25%;" alt="Attachment">
                        @endforeach
                        @endif
                    </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Tipo de Equipo</label>
                                <input type="text" class="form-control" id="type" name="type" value="{{ $item->type }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" id="model" name="model" value="{{ $item->model }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="serie">Serie</label>
                                <input type="text" class="form-control" id="serie" name="serie" value="{{ $item->serie }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="power">Potencia</label>
                                <input type="text" class="form-control" id="power" name="power" value="{{ $item->power }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Estado</label>
                                <select name="status" id="status" class="form-control" {{ $item->status == 3 ? 'disabled' : '' }}>
                                    <option {{ $item->status ==  '1' ? 'selected' : ''}} value="1">Disponible</option>
                                    <option {{ $item->status ==  '2' ? 'selected' : ''}} value="2">No disponible</option>
                                    <option {{ $item->status ==  '3' ? 'selected' : ''}} value="3">Vendido</option>
                                    <option {{ $item->status ==  '4' ? 'selected' : ''}} value="4">En Kit </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="desription">Descripción</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control" disabled>{{ $item->description }}</textarea>
                            </div>
                        </div>
                </div>

                <button class="btn btn-success submit">Actualizar</button>
            </form>
            </div>
        </div>
    </div>
</div>
