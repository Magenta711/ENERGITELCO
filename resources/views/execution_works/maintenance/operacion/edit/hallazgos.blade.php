<div class="body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="findings[FallaResuelta]">Falla Resuelta:</label>
                <br>
                <label for="findings[FallaResuelta][SI]">SI</label>
                <td class="text-center"><input type="radio" id="findings[FallaResuelta][NO]" name="findings[FallaResuelta]" value="SI" {{ $general['findings']['FallaResuelta'] == 'SI' ? 'checked' : '' }}></td>
                <label for="findings[FallaResuelta][NO]">NO</label>
                <td class="text-center"><input type="radio" id="findings[FallaResuelta][SI]"  name="findings[FallaResuelta]" value="NO" {{ $general['findings']['FallaResuelta'] == 'NO' ? 'checked' : '' }}></td>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="findings[FallaEstacion]">¿Se econtraron novedades en la estación?:</label>
                <br>
                <label for="findings[FallaEstacion][SI]">SI</label>
                <td class="text-center"><input type="radio" id="findings[FallaEstacion][NO]" name="findings[FallaEstacion]" value="SI" ></td>
                <label for="findings[FallaEstacion][NO]">NO</label>
                <td class="text-center"><input type="radio" id="findings[FallaEstacion][SI]"  name="findings[FallaEstacion]" value="NO" checked></td>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="findings[ObeservacionesActividad]">OBSERVACIONES DE LA ACTIVIDAD:</label>
                <textarea name="findings[ObeservacionesActividad]" id="findings[ObeservacionesActividad]" class="form-control" cols="30" rows="3">{{ $general['findings']['ObeservacionesActividad'] }}</textarea>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="findings[hallazgo]">HALLAZGO:</label>
                <input type="text" class="form-control" id="findings[hallazgo]" name="findings[hallazgo]" value="{{ $general['findings']['hallazgo'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="findings[sistema]">SISTEMA:</label>
                <input type="text" class="form-control" id="findings[sistema]" name="findings[sistema]" value="{{ $general['findings']['sistema'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="findings[prioridad]">PRIORIDAD:</label>
                <br>
                <select name="findings[prioridad]" id="findings[prioridad]" class="form-control">
                    <option value="SI" {{ $general['findings']['prioridad'] == 'SI' ? 'selected' : ''}}>SI</option>
                    <option value="NO" {{ $general['findings']['prioridad'] == 'NO' ? 'selected' : ''}}>NO</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="findings[descripcion]">DESCRIPCIÓN:</label>
                <textarea name="findings[descripcion]" id="findings[descripcion]" class="form-control" cols="30" rows="2">{{ $general['findings']['descripcion'] }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <hr>
        <h5><b> 6. TRANSPORTES ESPECIALES</b></h5>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transport[distancia]">DISTANCIA EN KM:</label>
                <input type="text" class="form-control" id="transport[distancia]" name="transport[distancia]" value="{{ $general['transport']['distancia'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transport[TiempoDesplazamiento]">TIEMPO DE DESPLAZAMIENTO (Describir):</label>
                <input type="text" class="form-control" id="transport[TiempoDesplazamiento]" name="transport[TiempoDesplazamiento]" value="{{ $general['transport']['TiempoDesplazamiento'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transport[transporte]">TIPO DE TRANSPORTE:</label>
                <input type="text" class="form-control" id="transport[transporte]" name="transport[transporte]" value="{{ $general['transport']['transporte'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transport[observaciones]">OBSERVACIONES DE TRANSPORTE:</label>
                <textarea name="transport[observaciones]" id="transport[observaciones]" class="form-control" cols="30" rows="2">{{ $general['transport']['observaciones'] }}</textarea>
            </div>
        </div>
    </div>
</div>
