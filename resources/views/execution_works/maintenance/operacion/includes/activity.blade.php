<div class="body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity[tipoActividad]">TIPO DE ACTIVIDAD:</label>
                <input type="text" class="form-control" id="activity[tipoActividad]" name="activity[tipoActividad]" value="{{ old('activity[tipoActividad]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity[marca]">MARCA:</label>
                <input type="text" class="form-control" id="activity[marca]" name="activity[marca]" value="{{ old('activity[marca]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity[afectaciones]">PRESENTA AFECTACION DE SERVICIOS:</label>
                <select name="activity[afectaciones]" id="activity[afectaciones]" class="form-control">
                    <option value="SI">SI</option>
                    <option value="NO" selected>NO</option>
                    <option value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity[cambio]">CAMBIO:</label>
                <select name="activity[cambio]" id="activity[cambio]" class="form-control">
                    <option value="SI">SI</option>
                    <option value="NO" selected>NO</option>
                    <option value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity[fallaEquipo]">TIPO DE EQUIPO EN FALLA:</label>
                <input type="text" class="form-control" id="activity[fallaEquipo]" name="activity[fallaEquipo]" value="{{ old('activity[fallaEquipo]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity[modelo]">MODELO:</label>
                <input type="text" class="form-control" id="activity[modelo]" name="activity[modelo]" value="{{ old('activity[modelo]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity[reinstalacion]">REINSTALACIÓN:</label>
                <select name="activity[reinstalacion]" id="activity[reinstalacion]" class="form-control">
                    <option value="SI">SI</option>
                    <option value="NO" selected>NO</option>
                    <option value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="activity[reparacion]">REPARACIÓN:</label>
                <select name="activity[reparacion]" id="activity[reparacion]" class="form-control">
                    <option value="SI">SI</option>
                    <option value="NO" selected>NO</option>
                    <option value="N/A">N/A</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="activity[descripcionFalla]">DESCRIPCIÓN DE LA FALLA</label>
                <textarea name="activity[descripcionFalla]" id="activity[descripcionFalla]" class="form-control" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="activity[descripcionSolucion]">DESCRIPCIÓN DE LA SOLUCIÓN</label>
                <textarea name="activity[descripcionSolucion]" id="activity[descripcionSolucion]" class="form-control" cols="30" rows="5"></textarea>
            </div>
        </div>
    </div>
</div>
