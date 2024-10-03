<div class="body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[estacionBase]">NOMBRE DE ESTACIÓN:</label>
                <input type="text" class="form-control" id="general[estacionBase]" name="general[estacionBase]" value="{{ $id->site_name }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[regional]">REGIONAL:</label>
                <input type="text" class="form-control" id="general[regional]" name="general[regional]" value="{{ $id->region }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[departamento]">DEPARTAMENTO:</label>
                <input type="text" class="form-control" id="general[departamento]" name="general[departamento]" value="{{ $id->dep }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[direccion]">DIRECCIÓN:</label>
                <input type="text" class="form-control" id="general[direccion]" name="general[direccion]" value="{{ $id->lat.', '. $id->long. ' '. $id->mun}}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[tipoEstacion]">TIPO DE ESTACIÓN:</label>
                <input type="text" class="form-control" id="general[tipoEstacion]" name="general[tipoEstacion]" value="{{ $id->structure }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[tipoSitio]">TIPO DE SITIO:</label>
                <input type="text" class="form-control" id="general[tipoSitio]" name="general[tipoSitio]" value="{{ old('general[tipoSitio]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[siteOwner]">SITE OWNER:</label>
                <input type="text" class="form-control" id="general[siteOwner]" name="general[siteOwner]" value="{{ old('general[siteOwner]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[categoria]">CATEGORÍA:</label>
                <input type="text" class="form-control" id="general[categoria]" name="general[categoria]" value="{{ old('general[categoria]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[noInc]">No. INC:</label>
                <input type="text" class="form-control" id="general[noInc]" name="general[noInc]" value="{{ old('general[noInc]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[noTas]">No. TAS:</label>
                <input type="text" class="form-control" id="general[noTas]" name="general[noTas]" value="{{ $id->OT }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[fechaEjecucion]">FECHA EJECUCIÓN:</label>
                <input type="datetime-local" class="form-control" id="general[fechaEjecucion]" name="general[fechaEjecucion]" value="{{ old('general[fechaEjecucion]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[fechaFin]">FECHA FIN ACTIVIDAD:</label>
                <input type="datetime-local" class="form-control" id="general[fechaFin]" name="general[fechaFin]" value="{{ old('general[fechaFin]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="general[exclusion]">¿IMPLICA EXCLUSIÓN?</label>
                <input type="text" class="form-control" id="general[exclusion]" name="general[exclusion]" value="{{ old('general[exclusion]') }}">
            </div>
        </div>
    </div>
</div>
