<div class="panel box box-warning">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                EQUIPO DE CARRETERA
            </a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
        <div class="box-body">
            <h4>Herramientas</h4>
            <p></p>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Como mínimo deberá contener: Alicate, destornilladores, llaves de expansión y llaves fijas</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_1') == 'Bien' ) ? 'checked' : '' }} name="f3_1" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_1') == 'Falta' ) ? 'checked' : '' }} name="f3_1" id="option2" value="Falta"> Falta
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_1" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Cruceta</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Apta para el vehículo</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_2') == 'Bien' ) ? 'checked' : '' }} name="f3_2" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_2') == 'Falta' ) ? 'checked' : '' }} name="f3_2" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_2') == 'No aplica' ) ? 'checked' : '' }} name="f3_2" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_2" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Gato</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Con capacidad de elevar el vehículo</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_3') == 'Bien' ) ? 'checked' : '' }} name="f3_3" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_3') == 'Falta' ) ? 'checked' : '' }} name="f3_3" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_3') == 'No aplica' ) ? 'checked' : '' }} name="f3_3" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_3" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Tacos</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Dos tacos aptos para bloquear el vehículo</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_4') == 'Bien' ) ? 'checked' : '' }} name="f3_4" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_4') == 'Falta' ) ? 'checked' : '' }} name="f3_4" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_4') == 'No aplica' ) ? 'checked' : '' }} name="f3_4" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_4" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Señales</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Dos señales de carretera triangulares, en material reflectivo, y provistas de soportes  para ser colocadas en forma vertical  o lámparas de señal de luz amarilla intermitentes o de destellos.</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_5') == 'Bien' ) ? 'checked' : '' }} name="f3_5" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_5') == 'Falta' ) ? 'checked' : '' }} name="f3_5" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_5') == 'No aplica' ) ? 'checked' : '' }} name="f3_5" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_5" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Chaleco</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Debe ser reflectivo</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_6') == 'Bien' ) ? 'checked' : '' }} name="f3_6" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_6') == 'Falta' ) ? 'checked' : '' }} name="f3_6" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_6') == 'No aplica' ) ? 'checked' : '' }} name="f3_6" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_6" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Botiquín</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Yodopividona solución antiséptica bolsa (120ml), jabón, gasas, curas, venda elástica, microporo rollo, algodón paquete (25 gr), acetaminofén tabletas, mareol tabletas, sales de rehidratación oral, bajalenguas, suero fisiológico bolsa (250 ml), guantes latex desechables, toallas higiénicas, tijeras y termómetro oral.</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_7') == 'Bien' ) ? 'checked' : '' }} name="f3_7" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_7') == 'Falta' ) ? 'checked' : '' }} name="f3_7" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_7') == 'No aplica' ) ? 'checked' : '' }} name="f3_7" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_7" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Llanta de repuesto</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Estado general, profundidad del labrado y presión</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_8') == 'Bien' ) ? 'checked' : '' }} name="f3_8" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_8') == 'Falta' ) ? 'checked' : '' }} name="f3_8" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_8') == 'No aplica' ) ? 'checked' : '' }} name="f3_8" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_8" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Linterna</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Ilumina adecuadamente</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_9') == 'Bien' ) ? 'checked' : '' }} name="f3_9" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_9') == 'Falta' ) ? 'checked' : '' }} name="f3_9" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_9') == 'No aplica' ) ? 'checked' : '' }} name="f3_9" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_9" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <h4>Extintor</h4>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Día / mes / año de vencimiento:</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_10') == 'Bien' ) ? 'checked' : '' }} name="f3_10" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_10') == 'Falta' ) ? 'checked' : '' }} name="f3_10" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_10') == 'No aplica' ) ? 'checked' : '' }} name="f3_10" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_10" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Capacidad:</p>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_11') == 'Bien' ) ? 'checked' : '' }} name="f3_11" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_11') == 'Falta' ) ? 'checked' : '' }} name="f3_11" id="option2" value="Falta"> Falta
                    </label>
                    <label>
                        <input class="security_equip" type="radio" {{ (old('f3_11') == 'No aplica' ) ? 'checked' : '' }} name="f3_11" id="option2" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observacion_11" id="observaciones" class="form-control" cols="3" rows="3"></textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="foto">Inserta foto</label>
                <label for="foto_31" class="form-control text-center" id="label_foto_31"><i class="fa fa-upload"></i></label>
                <input type="file" accept="image/*" name="foto" id="foto" class="hide file">
            </div>
        </div>
    </div>
</div>