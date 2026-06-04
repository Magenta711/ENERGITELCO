<div class="modal fade review-{{ $item->id }}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>{{ $item->type }} {{ $item->cod_product }}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            <p>{{ $item->type }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="model">Modelo</label>
                            <p>{{ $item->model }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <p>{{ $item->serie }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="potencia">Potencia</label>
                            <p>{{ $item->power }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Precio</label>
                            <p>{{ $item->price }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="garantia">Garantía</label>
                            <p>{{ $item->warranty }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desription">Descripción</label>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
