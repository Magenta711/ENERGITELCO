<div class="panel box box-gray">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                ACCESORIOS
            </a>
        </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
        <div class="box-body">
            <h4>Mosquetón</h4>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E4_1') == "Si") ? 'checked' : '' }} name="E4_1" id="E4_1">
                <label class="form-check-label" for="E4_1">
                    Deformación (dobladura, etc.)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E4_2') == "Si") ? 'checked' : '' }} name="E4_2" id="E4_2">
                <label class="form-check-label" for="E4_2">
                    Bloqueo (ajuste excesivo) de los mosquetones en cierres de seguridad.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E4_3') == "Si") ? 'checked' : '' }} name="E4_3" id="E4_3">
                <label class="form-check-label" for="E4_3">
                    Grietas o picaduras
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E4_4') == "Si") ? 'checked' : '' }} name="E4_4" id="E4_4">
                <label class="form-check-label" for="E4_4">
                    Resortes (detecta fallas)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E4_5') == "Si") ? 'checked' : '' }} name="E4_5" id="E4_5">
                <label class="form-check-label" for="E4_5">
                    Deterioro general
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E4_6') == "Si") ? 'checked' : '' }} name="E4_6" id="E4_6">
                <label class="form-check-label" for="E4_6">
                    Corrosión
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E4_7') == "Si") ? 'checked' : '' }} name="E4_7" id="E4_7">
                <label class="form-check-label" for="E4_7">
                    Presencia de oxidación (moho)
                </label>
            </div>
            <hr>
            <div class="form-group">
                <label for="serie_equipo_4"><strong>Serie del equipo</strong></label>
                <input type="text" name="serie_equipo_4" id="serie_equipo_4" class="form-control">
            </div>
            <div class="form-group">
                <label for="marca_equipo_4"><strong>Marca del equipo</strong></label>
                <input type="text" name="marca_equipo_4" id="marca_equipo_4" class="form-control">
            </div>
            <div class="form-group">
                <label for="estado_mosqueton"><strong>Estado general del mosquetón</strong></label>
                <input type="text" name="estado_mosqueton" id="estado_mosqueton" class="form-control">
            </div>
            <div class="form-group">
                <label for="foto_4">Inserta foto</label>
                <input type="file" accept="image/*" name="foto_4" id="foto_4" class="form-control">
            </div>
            <div class="form-group">
                <label for="observaciones_4">Observaciones</label>
                <textarea name="observaciones_4" id="observaciones_4" cols="5" rows="3" class="form-control"></textarea>
            </div>
            <hr>
            <h4>Freno</h4>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E5_1') == "Si") ? 'checked' : '' }} name="E5_1" id="E5_1">
                <label class="form-check-label" for="E5_1">
                    Deformación (dobladura, etc.)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E5_2') == "Si") ? 'checked' : '' }} name="E5_2" id="E5_2">
                <label class="form-check-label" for="E5_2">
                    Bloqueo (ajuste excesivo) de los mosquetones en cierres de seguridad
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E5_3') == "Si") ? 'checked' : '' }} name="E5_3" id="E5_3">
                <label class="form-check-label" for="E5_3">
                    Grietas o picaduras
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E5_4') == "Si") ? 'checked' : '' }} name="E5_4" id="E5_4">
                <label class="form-check-label" for="E5_4">
                    Resortes (detecta fallas)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E5_5') == "Si") ? 'checked' : '' }} name="E5_5" id="E5_5">
                <label class="form-check-label" for="E5_5">
                    Frenado (hacer prueba)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E5_6') == "Si") ? 'checked' : '' }} name="E5_6" id="E5_6">
                <label class="form-check-label" for="E5_6">
                    Deterioro general
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E5_7') == "Si") ? 'checked' : '' }} name="E5_7" id="E5_7">
                <label class="form-check-label" for="E5_7">
                    Corrosión
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E5_8') == "Si") ? 'checked' : '' }} name="E5_8" id="E5_8">
                <label class="form-check-label" for="E5_8">
                    Presencia de oxidación (moho)
                </label>
            </div>
            <hr>
            <div class="form-group">
                <label for="serie_equipo_5"><strong>Serie del equipo</strong></label>
                <input type="text" name="serie_equipo_5" id="serie_equipo_5" class="form-control">
            </div>
            <div class="form-group">
                <label for="marca_equipo_5"><strong>Marca del equipo</strong></label>
                <input type="text" name="marca_equipo_5" id="marca_equipo_5" class="form-control">
            </div>
            <div class="form-group">
                <label for="estado_freno"><strong>Estado general del freno</strong></label>
                <input type="text" name="estado_freno" id="estado_freno" class="form-control">
            </div>
            <div class="form-group">
                <label for="foto_5">Inserta foto</label>
                <input type="file" accept="image/*" name="foto_5" id="foto_5" class="form-control">
            </div>
            <div class="form-group">
                <label for="observaciones_5">Observaciones</label>
                <textarea name="observaciones_5" id="observaciones_5" cols="5" rows="3" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>