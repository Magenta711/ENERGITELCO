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
            <form action="{{ route('energy_products.update', $item->id) }}" method="POST">
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
                                <select name="type" id="type" class="form-control">
                                    <option {{ $item->type ==  'Inversor Solar' ? 'selected' : ''}} value="Inversor Solar">Inversor Solar</option>
                                    <option {{ $item->type ==  'Inversor de Potencia' ? 'selected' : ''}} value="Inversor de Potencia">Inversor de Potencia</option>
                                    <option {{ $item->type ==  'Batería' ? 'selected' : ''}} value="Batería">Batería</option>
                                    <option {{ $item->type ==  'Panel Solar' ? 'selected' : ''}} value="Panel Solar">Panel Solar</option>
                                    <option {{ $item->type ==  'Otro' ? 'selected' : ''}} value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" id="model" name="model" value="{{ $item->model }}">
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
                                <input type="text" class="form-control" id="power" name="power" value="{{ $item->power }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="warranty">Garantía</label>
                                <input type="text" class="form-control" id="warranty" name="warranty" value="{{ $item->warranty }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="desription">Descripción</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ $item->description }}</textarea>
                            </div>
                        </div>
                </div>

                <button class="btn btn-success submit">Actualizar</button>
            </form>
            </div>
        </div>
    </div>
</div>
