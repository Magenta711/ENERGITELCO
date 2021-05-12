<div class="panel box box-warning">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                ESLINGA DE POSICIONAMIENTO
            </a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
        <div class="box-body">
            <h5>CINTAS, CORREAS Y COSTURAS</h5>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_1') == "Si") ? 'checked' : '' }} name="E3_1" id="E3_1">
                <label class="form-check-label" for="E3_1">
                    Cortes o rotura del tejido o costuras
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_2') == "Si") ? 'checked' : '' }} name="E3_2" id="E3_2">
                <label class="form-check-label" for="E3_2">
                    Fisuras
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_3') == "Si") ? 'checked' : '' }} name="E3_3" id="E3_3">
                <label class="form-check-label" for="E3_3">
                    Estiramiento excesivo (elongación de la riata)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_4') == "Si") ? 'checked' : '' }} name="E3_4" id="E3_4">
                <label class="form-check-label" for="E3_4">
                    Deterioro general
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_5') == "Si") ? 'checked' : '' }} name="E3_5" id="E3_5">
                <label class="form-check-label" for="E3_5">
                    Corrosión o desgastes por exposición a ácidos o productos químicos
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_6') == "Si") ? 'checked' : '' }} name="E3_6" id="E3_6">
                <label class="form-check-label" for="E3_6">
                    Quemaduras o fibras derretidas
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_7') == "Si") ? 'checked' : '' }} name="E3_7" id="E3_7">
                <label class="form-check-label" for="E3_7">
                    Perforaciones o agujeros
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_8') == "Si") ? 'checked' : '' }} name="E3_8" id="E3_8">
                <label class="form-check-label" for="E3_8">
                    Presenta suciedad
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_9') == "Si") ? 'checked' : '' }} name="E3_9" id="E3_9">
                <label class="form-check-label" for="E3_9">
                    Costuras completas
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_10') == "Si") ? 'checked' : '' }} name="E3_10" id="E3_10">
                <label class="form-check-label" for="E3_10">
                    Cuenta con etiqueta de certificación
                </label>
            </div>
            <hr>
            <h5>PARTES METÁLICAS</h5>
            <hr>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_11') == "Si") ? 'checked' : '' }} name="E3_11" id="E3_11">
                <label class="form-check-label" for="E3_11">
                    Deformación (dobladura, ect.)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_12') == "Si") ? 'checked' : '' }} name="E3_12" id="E3_12">
                <label class="form-check-label" for="E3_12">
                    Picadura, grietas
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_13') == "Si") ? 'checked' : '' }} name="E3_13" id="E3_13">
                <label class="form-check-label" for="E3_13">
                    Presenta desgaste
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Si" {{(old('E3_14') == "Si") ? 'checked' : '' }} name="E3_14" id="E3_14">
                <label class="form-check-label" for="E3_14">
                    Corrosión u oxidación
                </label>
            </div>
            <hr>
            <div class="form-group">
                <label for="serie_equipo_3"><strong>Serie del equipo</strong></label>
                <input type="text" name="serie_equipo_3" id="serie_equipo_3" class="form-control">
            </div>
            <div class="form-group">
                <label for="marca_equipo_3"><strong>Marca del equipo</strong></label>
                <input type="text" name="marca_equipo_3" id="marca_equipo_3" class="form-control">
            </div>
            <div class="form-group">
                <label for="estado_eslinga2"><strong>Estado general de la eslinga</strong></label>
                <input type="text" name="estado_eslinga2" id="estado_eslinga2" class="form-control">
            </div>
            <div class="form-group">
                <label for="foto_3">Inserta foto</label>
                <input type="file" accept="image/*" name="foto_3" id="foto_3" class="form-control">
            </div>
            <div class="form-group">
                <label for="observaciones_3">Observaciones</label>
                <textarea name="observaciones_3" id="observaciones_3" cols="5" rows="3" class="form-control"></textarea>
            </div>  
        </div>
    </div>
</div>