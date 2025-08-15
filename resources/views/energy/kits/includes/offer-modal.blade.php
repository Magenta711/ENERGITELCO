<div class="modal fade offer-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><b>Modal de Oferta en el inicio</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('energy_kits.offer') }}" method="POST">
                    @csrf
                    <h4><b>Elija un Kit para promocionarlo en la pantalla de bienvenida de Energitelco:</b></h4>
                    <div class="select-container">
                        <div class="row select-group">
                            {{-- Categoria --}}
                            <div class="col-md-6">
                                <label for="kit">Categoria</label>
                                <br>
                                <select class="form-control kit" id="kit" name="kit" required>
                                    <option value="">Seleccione una categoria</option>
                                    @foreach ($kits as $kit)
                                        <option value="{{ $kit->id }}"
                                            {{ isset($offer) && isset($offer->kit_id) && $offer->kit_id == $kit->id ? 'selected' : '' }}>
                                            {{ $kit->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kit">Estado</label>
                                <select class="form-control kit" id="kit" name="status">
                                    <option value="1" {{ isset($offer) && isset($offer->status) && $offer->status == 1 ? 'selected' : '' }}>Visible</option>
                                    <option value="0" {{ isset($offer) && isset($offer->status) && $offer->status == 0 ? 'selected' : '' }}>Oculto</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <p id="name">{{ isset($kitSelect) && isset($kitSelect->name) ? $kitSelect->name : '' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Tipo del Kit*</label>
                                    <p id="type">{{ isset($kitSelect) && isset($kitSelect->type) ? $kitSelect->type : '' }}</p>
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
                                    <p id="potencia_dia">{{ isset($kitSelect) && isset($kitSelect->caracteristics['potencia_dia']) ? $kitSelect->caracteristics['potencia_dia'] : '' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="potencia_nominal">Potencia nominal del kit solar:</label>
                                    <p id="potencia_nominal">{{ isset($kitSelect) && isset($kitSelect->caracteristics['potencia_nominal']) ? $kitSelect->caracteristics['potencia_nominal'] : '' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="voltaje">Voltaje del kit solar:</label>
                                    <p id="voltaje">{{ isset($kitSelect) && isset($kitSelect->caracteristics['voltaje']) ? $kitSelect->caracteristics['voltaje'] : '' }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Precio*</label>
                                    <p id="price">{{ isset($kitSelect) && isset($kitSelect->price) ? $kitSelect->price : '' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="warranty">Garantía</label>
                                    <p id="warranty">{{ isset($kitSelect) && isset($kitSelect->warranty) ? $kitSelect->warranty : '' }}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Descripción*</label>
                                    <p id="description">{{ isset($kitSelect) && isset($kitSelect->description) ? $kitSelect->description : '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Fecha de Inicio</label>
                                <input type="date" class="form-control" name="start_date" id="start_date"
                                    value="{{ isset($offer) && isset($offer->start_date) ? \Carbon\Carbon::parse($offer->start_date)->format('Y-m-d') : '' }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">Fecha de Finalización</label>
                                <input type="date" class="form-control" name="end_date" id="end_date"
                                    value="{{ isset($offer) && isset($offer->end_date) ? \Carbon\Carbon::parse($offer->end_date)->format('Y-m-d') : '' }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_input">Decripción de oferta (Se mostrará en el inicio)</label>
                                <textarea name="description" id="description_input" class="form-control" cols="30" rows="10">{{ isset($offer) && isset($offer->description) ? $offer->description : '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn-submit btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
