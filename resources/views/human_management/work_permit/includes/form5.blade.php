<div class="panel box box-info">
        <div class="box-header with-border">
            <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                    5. Condiciones de verificación del vehículo para sistema de seguridad vial
                </a>
            </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse">
            <div class="box-body">
                        <small> (Debe llenarse si se están movilizando en vehículos de la compañía) Si no se moviliza en vehículos de la empresa no requiere llenar esta lista de chequeo, en caso contrario ésta es obligatoria.</small>
                        <hr>
                        <div class="form-group">
                                ¿Está completa la documentación del vehículo y del conductor? <small>Si la respuesta es No, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a1') == 'si') ? 'checked' : ''}} value="si" name="f5a1" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a1') == 'no') ? 'checked' : ''}} value="no" name="f5a1" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a1') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a1" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿El sistema de luces del vehículo funciona correctamente? <small>Si la respuesta es No, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a2') == 'si') ? 'checked' : ''}} value="si" name="f5a2" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a2') == 'no') ? 'checked' : ''}} value="no" name="f5a2" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a2') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a2" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Muestra el tablero de instrumentos alguna alarma? <small>Si la respuesta es No, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a3') == 'si') ? 'checked' : ''}} value="si" name="f5a3" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a3') == 'no') ? 'checked' : ''}} value="no" name="f5a3" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a3') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a3" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Son adecuados los niveles de los fluidos (líquidos) del vehículo? <small>Si la respuesta es No, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a4') == 'si') ? 'checked' : ''}} value="si" name="f5a4" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a4') == 'no') ? 'checked' : ''}} value="no" name="f5a4" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a4') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a4" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Presenta escapes de algún fluido (líquido) en el motor, las ruedas o en el piso? <small>Si la respuesta es Si, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a5') == 'si') ? 'checked' : ''}} value="si" name="f5a5" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a5') == 'no') ? 'checked' : ''}} value="no" name="f5a5" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a5') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a5" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Los frenos funcionan correctamente? <small>Si la respuesta es No, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a6') == 'si') ? 'checked' : ''}} value="si" name="f5a6" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a6') == 'no') ? 'checked' : ''}} value="no" name="f5a6" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a6') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a6" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Funcionan adecuadamente los cinturones de seguridad? <small>Si la respuesta es No, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a7') == 'si') ? 'checked' : ''}} value="si" name="f5a7" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a7') == 'no') ? 'checked' : ''}} value="no" name="f5a7" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a7') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a7" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Están los espejos laterales y el retrovisor en buen estado? <small>Si la respuesta es No, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a8') == 'si') ? 'checked' : ''}} value="si" name="f5a8" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a8') == 'no') ? 'checked' : ''}} value="no" name="f5a8" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a8') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a8" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Es adecuado el estado de las llantas, incluida la del repuesto? <small>Si la respuesta es No, por favor no mueva al vehículo y notifiqué a la compañía</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a9') == 'si') ? 'checked' : ''}} value="si" name="f5a9" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a9') == 'no') ? 'checked' : ''}} value="no" name="f5a9" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a9') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a9" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Tiene herramienta y equipo de carretera adecuados? <small>Si la respuesta es NO, por favor no mueva el vehículo y notifíquelo a la compañía.</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a10') == 'si') ? 'checked' : ''}} value="si" name="f5a10" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a10') == 'no') ? 'checked' : ''}} value="no" name="f5a10" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a10') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a10" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Siente ruidos anormales durante el recorrido?  <small>Si la respuesta es SI, por favor no mueva el vehículo y notifíquelo a la compañía.</small>
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a11') == 'si') ? 'checked' : ''}} value="si" name="f5a11" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a11') == 'no') ? 'checked' : ''}} value="no" name="f5a11" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a11') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a11" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                                ¿Realizó la consulta al #767 sobre el estado de la ruta que va a transitar, y no encuentra problemas para su viaje?
                                <div class="radio">
                                        <label>
                                                <input type="radio" {{(old('f5a12') == 'si') ? 'checked' : ''}} value="si" name="f5a12" id="option1"> Si
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a12') == 'no') ? 'checked' : ''}} value="no" name="f5a12" id="option2"> No
                                        </label>
                                        <label>
                                                <input type="radio" {{(old('f5a12') == 'No aplica') ? 'checked' : ''}} value="No aplica" name="f5a12" id="option3"> No
                                                aplica
                                        </label>
                                </div>
                        </div>
                </div>
        </div>
</div>