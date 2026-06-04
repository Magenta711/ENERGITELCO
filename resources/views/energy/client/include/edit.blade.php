<div class="modal fade edit-{{ $item->id }}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Editar Cliente</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('energy_clients.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3><b>Actualizar</b></h3>
                        </div>
                        <div class="col-md-4"><label for="name">Nombre</label><input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}"></div>
                        <div class="col-md-4"><label for="typeId">Tipo de Identificación</label><select name="typeId" id="typeId" class="form-control">
                            <option {{ $item->typeId ==  'Cédula de Ciudadanía' ? 'selected' : '' }} value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                            <option {{ $item->typeId ==  'Cédula de extranjería' ? 'selected' : '' }} value="Cédula de extranjería">Cédula de extranjería</option>
                            <option {{ $item->typeId ==  'Pasaporte' ? 'selected' : '' }} value="Pasaporte">Pasaporte</option>
                            <option {{ $item->typeId ==  'NIT' ? 'selected' : '' }} value="NIT">NIT</option>
                            <option {{ $item->typeId ==  'Otro' ? 'selected' : '' }} value="Otro">Otro</option>
                        </select></div>
                        <div class="col-md-4"><label for="ide">Identificación/NIT</label><input type="text" class="form-control" name="ide" id="ide" value="{{ $item->ide }}"></div>
                        <div class="col-md-4"><label for="tel">Telefono de Contacto</label><input type="text" class="form-control" name="tel" id="tel" value="{{ $item->tel }}"></div>
                        <div class="col-md-4"><label for="email">Correo Eléctronico</label><input type="text" class="form-control" name="email" id="email" value="{{ $item->email }}"></div>
                        <div class="col-md-4"><label for="locate">Ubicación</label><input type="text" class="form-control" name="locate" id="locate" value="{{ $item->locate }}"></div>
                        <div class="col-md-4"><label for="type_client">Tipo de Cliente</label><select name="type_client" id="type_client" class="form-control">
                            <option selected></option>
                            <option {{ $item->type_client== 'Distribuidor' ? 'selected' : ''}} value="Distribuidor">Distribuidor</option>
                            <option {{ $item->type_client== 'Cliente Final' ? 'selected' : ''}} value="Cliente Final">Cliente Final</option>
                            <option {{ $item->type_client== 'Instalador' ? 'selected' : ''}} value="Instalador">Instalador</option>
                            <option {{ $item->type_client== 'Otro' ? 'selected' : ''}} value="Otro">Otro</option>
                        </select></div>
                    </div>
                <hr>
                <div class="text-center">
                    <button class="btn btn-success submit">Actualizar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
