<div class="panel box box-warning">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                7. Verificación cumplimiento protocolo de bioseguridad (responda las siguientes preguntas bajo gravedad de juramento)
            </a>
        </h4>
    </div>
    <div id="collapseEight" class="panel-collapse collapse">
        <div class="box-body">
            <small></small>
            <div class="form-gruop">
                <label for="">¿Se aplicó protocolo de desinfección y limpieza al vehículo o moto?</label>
                <div class="radio">
                    <label>
                            <input type="radio" {{(old('f8a1') == 'si') ? 'checked' : ''}} value="si" name="f8a1" id="option1"> Si
                    </label>
                    <label>
                            <input type="radio" {{(old('f8a1') == 'no') ? 'checked' : ''}} value="no" name="f8a1" id="option2"> No
                    </label>
                    <label>
                            <input type="radio" {{(old('f8a1') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f8a1" id="option3"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-gruop">
                <label for="">¿El equipo cuanta con elementos de bioseguridad como alcohol, antibacterial y jabon de manos?</label>
                <div class="radio">
                    <label>
                            <input type="radio" {{(old('f8a2') == 'si') ? 'checked' : ''}} value="si" name="f8a2" id="option1"> Si
                    </label>
                    <label>
                            <input type="radio" {{(old('f8a2') == 'no') ? 'checked' : ''}} value="no" name="f8a2" id="option2"> No
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-gruop">
                <label for="">¿Cuentan todos los miembros de la cuadrilla con tapabocas cubriendo nariz y boca?</label>
                <div class="radio">
                    <label>
                            <input type="radio" {{(old('f8a3') == 'si') ? 'checked' : ''}} value="si" name="f8a3" id="option1"> Si
                    </label>
                    <label>
                            <input type="radio" {{(old('f8a3') == 'no') ? 'checked' : ''}} value="no" name="f8a3" id="option2"> No
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-gruop">
                <label for="">¿Se realizó protocolo de limpieza y desinfección a la herramienta a utilizar?</label>
                <div class="radio">
                    <label>
                            <input type="radio" {{(old('f8a4') == 'si') ? 'checked' : ''}} value="si" name="f8a4" id="option1"> Si
                    </label>
                    <label>
                            <input type="radio" {{(old('f8a4') == 'no') ? 'checked' : ''}} value="no" name="f8a4" id="option2"> No
                    </label>
                    <label>
                            <input type="radio" {{(old('f8a4') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f8a4" id="option3"> No
                            aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-gruop">
                <label for="">¿Todo el personal realizó autodiagnostico en la aplicación Coronapp?</label>
                <div class="radio">
                    <label>
                            <input type="radio" {{(old('f8a5') == 'si') ? 'checked' : ''}} value="si" name="f8a5" id="option1"> Si
                    </label>
                    <label>
                            <input type="radio" {{(old('f8a5') == 'no') ? 'checked' : ''}} value="no" name="f8a5" id="option2"> No
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>