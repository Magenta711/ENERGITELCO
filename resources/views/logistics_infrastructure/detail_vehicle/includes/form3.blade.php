<div class="panel box box-success">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                ELEMENTOS QUE SE INSPECCIONAN MECANICOS, HIDRAULICOS Y ELECTRICOS
            </a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
        <div class="box-body">
            <h4>Direccionales</h4>
            <p><small>Funcionamiento adecuado. Respuesta inmediata.</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                        <p>Delanteras </p>
                        <label>
                            <input type="radio" {{ (old('f2_1') == 'Operativo' ) ? 'checked' : '' }} name="f2_1" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_1') == 'No operativo' ) ? 'checked' : '' }} name="f2_1" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_1" class="form-control text-center" id="label_foto_1"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_1" id="foto_1" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                        <p>Traseras</p>
                        <label>
                            <input type="radio" {{ (old('f2_2') == 'Operativo' ) ? 'checked' : '' }} name="f2_2" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_2') == 'No operativo' ) ? 'checked' : '' }} name="f2_2" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_2" class="form-control text-center" id="label_foto_2"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_2" id="foto_2" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Luces</h4>
            <p><small>Funcionamiento de bombillos, cubiertas sin rotura, leds no fundidos.</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                        <p>Altas</p>
                        <label>
                            <input type="radio" {{ (old('f2_3') == 'Operativo' ) ? 'checked' : '' }} name="f2_3" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_3') == 'No operativo' ) ? 'checked' : '' }} name="f2_3" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_3" class="form-control text-center" id="label_foto_3"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_3" id="foto_3" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Bajas</p>
                        <label>
                            <input type="radio" {{ (old('f2_4') == 'Operativo' ) ? 'checked' : '' }} name="f2_4" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_4') == 'No operativo' ) ? 'checked' : '' }} name="f2_4" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_4" class="form-control text-center" id="label_foto_4"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_4" id="foto_4" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Stops</p>
                        <label>
                            <input type="radio" {{ (old('f2_5') == 'Operativo' ) ? 'checked' : '' }} name="f2_5" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_5') == 'No operativo' ) ? 'checked' : '' }} name="f2_5" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_5" class="form-control text-center" id="label_foto_5"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_5" id="foto_5" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Reversa</p>
                        <label>
                            <input type="radio" {{ (old('f2_6') == 'Operativo' ) ? 'checked' : '' }} name="f2_6" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_6') == 'No operativo' ) ? 'checked' : '' }} name="f2_6" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_6" class="form-control text-center" id="label_foto_6"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_6" id="foto_6" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Parqueo</p>
                        <label>
                            <input type="radio" {{ (old('f2_7') == 'Operativo' ) ? 'checked' : '' }} name="f2_7" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_7') == 'No operativo' ) ? 'checked' : '' }} name="f2_7" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_7" class="form-control text-center" id="label_foto_7"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_7" id="foto_7" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Limpiabrisas</h4>
            <p><small>Plumillas en buen estado (limpieza y estructura)</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Derecha / Izquierda / Atrás</p>
                        <label>
                            <input type="radio" {{ (old('f2_8') == 'Operativo' ) ? 'checked' : '' }} name="f2_8" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_8') == 'No operativo' ) ? 'checked' : '' }} name="f2_8" id="option2" value="No operativo"> No operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_8') == 'No aplica' ) ? 'checked' : '' }} name="f2_8" id="option2" value="No aplica"> No aplica
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_8" class="form-control text-center" id="label_foto_8"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_8" id="foto_8" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Vidrios</h4>
            <p><small>Estado general de los vidrios</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Adelante</p>
                        <label>
                            <input type="radio" {{ (old('f2_9') == 'Operativo' ) ? 'checked' : '' }} name="f2_9" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_9') == 'No operativo' ) ? 'checked' : '' }} name="f2_9" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_9" class="form-control text-center" id="label_foto_9"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_9" id="foto_9" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Atrás</p>
                        <label>
                            <input type="radio" {{ (old('f2_10') == 'Operativo' ) ? 'checked' : '' }} name="f2_10" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_10') == 'No operativo' ) ? 'checked' : '' }} name="f2_10" id="option2" value="No operativo"> No operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_10') == 'No aplica' ) ? 'checked' : '' }} name="f2_10" id="option2" value="No aplica"> No aplica
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_10" class="form-control text-center" id="label_foto_10"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_10" id="foto_10" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Laterales</p>
                        <label>
                            <input type="radio" {{ (old('f2_11') == 'Operativo' ) ? 'checked' : '' }} name="f2_11" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_11') == 'No operativo' ) ? 'checked' : '' }} name="f2_11" id="option2" value="No operativo"> No operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_11') == 'No aplica' ) ? 'checked' : '' }} name="f2_11" id="option2" value="No aplica"> No aplica
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_11" class="form-control text-center" id="label_foto_11"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_11" id="foto_11" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Cremalleras y elevavidrios</h4>
            <p><small>Abren y cierran sin novedad</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>En todas las puertas </p>
                        <label>
                            <input type="radio" {{ (old('f2_12') == 'Operativo' ) ? 'checked' : '' }} name="f2_12" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_12') == 'No operativo' ) ? 'checked' : '' }} name="f2_12" id="option2" value="No operativo"> No operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_12') == 'No aplica' ) ? 'checked' : '' }} name="f2_12" id="option2" value="No aplica"> No aplica
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_12" class="form-control text-center" id="label_foto_12"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_12" id="foto_12" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Seguros y chapas</h4>
            <p><small>Abren y cierran sin novedad</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Puertas y maleta</p>
                        <label>
                            <input type="radio" {{ (old('f2_13') == 'Operativo' ) ? 'checked' : '' }} name="f2_13" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_13') == 'No operativo' ) ? 'checked' : '' }} name="f2_13" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_13" class="form-control text-center" id="label_foto_13"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_13" id="foto_13" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Bómperes y punteras</h4>
            <p><small>Estado general</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Delantera</p>
                        <label>
                            <input type="radio" {{ (old('f2_14') == 'Operativo' ) ? 'checked' : '' }} name="f2_14" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_14') == 'No operativo' ) ? 'checked' : '' }} name="f2_14" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_14" class="form-control text-center" id="label_foto_14"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_14" id="foto_14" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Trasera</p>
                        <label>
                            <input type="radio" {{ (old('f2_15') == 'Operativo' ) ? 'checked' : '' }} name="f2_15" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_15') == 'No operativo' ) ? 'checked' : '' }} name="f2_15" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_15" class="form-control text-center" id="label_foto_15"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_15" id="foto_15" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Cojinería y carteras</h4>
            <p><small>Estado general</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Asientos y compartimientos</p>
                        <label>
                            <input type="radio" {{ (old('f2_16') == 'Operativo' ) ? 'checked' : '' }} name="f2_16" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_16') == 'No operativo' ) ? 'checked' : '' }} name="f2_16" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_16" class="form-control text-center" id="label_foto_16"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_16" id="foto_16" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Frenos</h4>
            <p><small>Verificar cada día al momento de comenzar la marcha.</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Principal</p>
                        <label>
                            <input type="radio" {{ (old('f2_17') == 'Operativo' ) ? 'checked' : '' }} name="f2_17" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_17') == 'No operativo' ) ? 'checked' : '' }} name="f2_17" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_17" class="form-control text-center" id="label_foto_17"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_17" id="foto_17" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Emergencia</p>
                        <label>
                            <input type="radio" {{ (old('f2_18') == 'Operativo' ) ? 'checked' : '' }} name="f2_18" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_18') == 'No operativo' ) ? 'checked' : '' }} name="f2_18" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_18" class="form-control text-center" id="label_foto_18"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_18" id="foto_18" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Llantas</h4>
            <p><small>Cada día, antes de comenzar la marcha, verificar su estado, profundidad del labrado y presión.</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Delanteras</p>
                        <label>
                            <input type="radio" {{ (old('f2_19') == 'Operativo' ) ? 'checked' : '' }} name="f2_19" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_19') == 'No operativo' ) ? 'checked' : '' }} name="f2_19" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_19" class="form-control text-center" id="label_foto_19"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_19" id="foto_19" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Traseras</p>
                        <label>
                            <input type="radio" {{ (old('f2_20') == 'Operativo' ) ? 'checked' : '' }} name="f2_20" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_20') == 'No operativo' ) ? 'checked' : '' }} name="f2_20" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_20" class="form-control text-center" id="label_foto_20"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_20" id="foto_20" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Repuesto</p>
                        <label>
                            <input type="radio" {{ (old('f2_21') == 'Operativo' ) ? 'checked' : '' }} name="f2_21"21id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_21') == 'No operativo' ) ? 'checked' : '' }} name="f2_21" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_21" class="form-control text-center" id="label_foto_21"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_21" id="foto_21" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Espejos</h4>
            <p><small>Verificar estado (limpieza, sin rotura ni opacidad), ubicación acorde a la necesidad.</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Laterales Derecho / Izquierdo</p>
                        <label>
                            <input type="radio" {{ (old('f2_22') == 'Operativo' ) ? 'checked' : '' }} name="f2_22"22id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_22') == 'No operativo' ) ? 'checked' : '' }} name="f2_22" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_22" class="form-control text-center" id="label_foto_22"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_22" id="foto_22" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Retrovisor</p>
                        <label>
                            <input type="radio" {{ (old('f2_23') == 'Operativo' ) ? 'checked' : '' }} name="f2_23"23id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_23') == 'No operativo' ) ? 'checked' : '' }} name="f2_23" id="option2" value="No operativo"> No operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_23') == 'No aplica' ) ? 'checked' : '' }} name="f2_23" id="option2" value="No aplica"> No aplica
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_23" class="form-control text-center" id="label_foto_23"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_23" id="foto_23" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Niveles de fluidos</h4>
            <p><small>Verificar que los niveles de los fluidos sean los adecuados (reportar si se ven fugas).</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Frenos</p>
                        <label>
                            <input type="radio" {{ (old('f2_24') == 'Operativo' ) ? 'checked' : '' }} name="f2_24" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_24') == 'No operativo' ) ? 'checked' : '' }} name="f2_24" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_24" class="form-control text-center" id="label_foto_24"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_24" id="foto_24" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Embrague</p>
                        <label>
                            <input type="radio" {{ (old('f2_25') == 'Operativo' ) ? 'checked' : '' }} name="f2_25" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_25') == 'No operativo' ) ? 'checked' : '' }} name="f2_25" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_25" class="form-control text-center" id="label_foto_25"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_25" id="foto_25" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Aceite dirección</p>
                        <label>
                            <input type="radio" {{ (old('f2_26') == 'Operativo' ) ? 'checked' : '' }} name="f2_26" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_26') == 'No operativo' ) ? 'checked' : '' }} name="f2_26" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_26" class="form-control text-center" id="label_foto_26"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_26" id="foto_26" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Aceite de motor</p>
                        <label>
                            <input type="radio" {{ (old('f2_27') == 'Operativo' ) ? 'checked' : '' }} name="f2_27" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_27') == 'No operativo' ) ? 'checked' : '' }} name="f2_27" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_27" class="form-control text-center" id="label_foto_27"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_27" id="foto_27" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Refrigerante</p>
                        <label>
                            <input type="radio" {{ (old('f2_28') == 'Operativo' ) ? 'checked' : '' }} name="f2_28" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_28') == 'No operativo' ) ? 'checked' : '' }} name="f2_28" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_28" class="form-control text-center" id="label_foto_28"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_28" id="foto_28" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Pito</h4>
            <p><small>Estado general de los vidrios</small></p>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Accionar antes de iniciar la marcha. Debe responder de forma adecuada</p>
                        <label>
                            <input type="radio" {{ (old('f2_29') == 'Operativo' ) ? 'checked' : '' }} name="f2_29" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_29') == 'No operativo' ) ? 'checked' : '' }} name="f2_29" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_29" class="form-control text-center" id="label_foto_29"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_29" id="foto_29" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Radio y parlantes</h4>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Funciona sin novedad</p>
                        <label>
                            <input type="radio" {{ (old('f2_30') == 'Operativo' ) ? 'checked' : '' }} name="f2_30" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_30') == 'No operativo' ) ? 'checked' : '' }} name="f2_30" id="option2" value="No operativo"> No operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_30') == 'No aplica' ) ? 'checked' : '' }} name="f2_30" id="option2" value="No aplica"> No aplica
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_30" class="form-control text-center" id="label_foto_30"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_30" id="foto_30" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Tableros y controles</h4>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Estado general</p>
                        <label>
                            <input type="radio" {{ (old('f2_31') == 'Operativo' ) ? 'checked' : '' }} name="f2_31" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_31') == 'No operativo' ) ? 'checked' : '' }} name="f2_31" id="option2" value="No operativo"> No operativo
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_31" class="form-control text-center" id="label_foto_31"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_31" id="foto_31" class="hide files">
                </div>
            </div>
            <hr>
            <h4>Cinturones de seguridad del. / tras.</h4>
            <strong>Estado</strong>
            <hr>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 mb-2">
                    <div class="radio">
                    <p>Verificar el estado de las partes (hebillas y parte textil, entre otras) y ajuste</p>
                        <label>
                            <input type="radio" {{ (old('f2_32') == 'Operativo' ) ? 'checked' : '' }} name="f2_32" id="option1" value="Operativo"> Operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_32') == 'No operativo' ) ? 'checked' : '' }} name="f2_32" id="option2" value="No operativo"> No operativo
                        </label>
                        <label>
                            <input type="radio" {{ (old('f2_32') == 'No aplica' ) ? 'checked' : '' }} name="f2_32" id="option2" value="No aplica"> No aplica
                        </label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-2">
                    <label for="foto_32" class="form-control text-center" id="label_foto_32"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" name="foto_32" id="foto_32" class="hide files">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="observaciones2">Observaciones</label>
                <textarea name="observaciones2" id="observaciones2" class="form-control" cols="3"  rows="3"></textarea>
            </div>
        </div>
    </div>
</div>