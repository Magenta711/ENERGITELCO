<div class="modal fade create-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Crear Cliente</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('energy_clients.store') }}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3><b>Nuevo</b></h3>
                        </div>
                        <div class="col-md-12">
                            <p>Los campos (*) son obligatorios</p>
                        </div>
                        <div class="col-md-4"><label for="name">Nombre*</label><input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"></div>
                        <div class="col-md-4"><label for="typeId">Tipo de Identificación</label><select name="typeId" id="typeId" class="form-control">
                            <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                            <option value="Cédula de extranjería">Cédula de extranjería</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="NIT">NIT</option>
                            <option value="Otro">Otro</option>
                        </select></div>
                        <div class="col-md-4"><label for="ide">Identificación/NIT</label><input type="text" class="form-control" name="ide" id="ide" value="{{ old('ide') }}"></div>
                        <div class="col-md-4"><label for="tel">Telefono de Contacto*</label><input type="text" class="form-control" name="tel" id="tel" value="{{ old('tel') }}"></div>
                        <div class="col-md-4"><label for="email">Correo Eléctronico*</label><input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}"></div>
                        <div class="col-md-4"><label for="departament">Departamento</label><input type="text" class="form-control" name="departament" id="departament" value="{{ old('departament') }}"></div>
                        <div class="col-md-4"><label for="municipio">Municipio</label><input type="text" class="form-control" name="municipio" id="municipio" value="{{ old('municipio') }}"></div>
                        <div class="col-md-4"><label for="type_client">Tipo de Cliente</label><select name="type_client" id="type_client" class="form-control">
                            <option selected></option>
                            <option value="Distribuidor">Distribuidor</option>
                            <option value="Cliente Final">Cliente Final</option>
                            <option value="Instalador">Instalador</option>
                            <option value="Otro">Otro</option>
                        </select></div>
                </div>
                <hr>
                <div class="text-center">
                    <button class="btn btn-success submit">Guardar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
