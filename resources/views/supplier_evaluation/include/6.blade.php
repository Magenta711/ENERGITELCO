                            <p><label for="period">1. Costo de los exámenes médicos.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == null) ? 'checked' : ''}} id="item_1_NA" value="">
                                <label class="form-check-label" for="item_1_NA">NA. No aplica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 1) ? 'checked' : ''}} id="item_1_1" value="1">
                                <label class="form-check-label" for="item_1_1">1. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 2) ? 'checked' : ''}} id="item_1_2" value="2">
                                <label class="form-check-label" for="item_1_2">2. Insuficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 3) ? 'checked' : ''}} id="item_1_3" value="3">
                                <label class="form-check-label" for="item_1_3">3. regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 4) ? 'checked' : ''}} id="item_1_4" value="4">
                                <label class="form-check-label" for="item_1_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 5) ? 'checked' : ''}} id="item_1_5" value="5">
                                <label class="form-check-label" for="item_1_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">2. Tiempo de atención en la presentación del servicio.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == null) ? 'checked' : ''}} id="item_2_NA" value="">
                                <label class="form-check-label" for="item_2_NA">NA. No aplica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 1) ? 'checked' : ''}} id="item_2_1" value="1">
                                <label class="form-check-label" for="item_2_1">1. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 2) ? 'checked' : ''}} id="item_2_2" value="2">
                                <label class="form-check-label" for="item_2_2">2. Insuficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 3) ? 'checked' : ''}} id="item_2_3" value="3">
                                <label class="form-check-label" for="item_2_3">3. regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 4) ? 'checked' : ''}} id="item_2_4" value="4">
                                <label class="form-check-label" for="item_2_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 5) ? 'checked' : ''}} id="item_2_5" value="5">
                                <label class="form-check-label" for="item_2_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">3. Eficiencia en el envío de los resultados.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == null) ? 'checked' : ''}} id="item_3_NA" value="">
                                <label class="form-check-label" for="item_3_NA">NA. No aplica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 1) ? 'checked' : ''}} id="item_3_1" value="1">
                                <label class="form-check-label" for="item_3_1">1. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 2) ? 'checked' : ''}} id="item_3_2" value="2">
                                <label class="form-check-label" for="item_3_2">2. Insuficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 3) ? 'checked' : ''}} id="item_3_3" value="3">
                                <label class="form-check-label" for="item_3_3">3. regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 4) ? 'checked' : ''}} id="item_3_4" value="4">
                                <label class="form-check-label" for="item_3_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 5) ? 'checked' : ''}} id="item_3_5" value="5">
                                <label class="form-check-label" for="item_3_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">4. Se encuentran certificados para prestar los servicios.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == null) ? 'checked' : ''}} id="item_4_NA" value="">
                                <label class="form-check-label" for="item_4_NA">NA. No aplica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 1) ? 'checked' : ''}} id="item_4_1" value="1">
                                <label class="form-check-label" for="item_4_1">1. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 2) ? 'checked' : ''}} id="item_4_2" value="2">
                                <label class="form-check-label" for="item_4_2">2. Insuficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 3) ? 'checked' : ''}} id="item_4_3" value="3">
                                <label class="form-check-label" for="item_4_3">3. regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 4) ? 'checked' : ''}} id="item_4_4" value="4">
                                <label class="form-check-label" for="item_4_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 5) ? 'checked' : ''}} id="item_4_5" value="5">
                                <label class="form-check-label" for="item_4_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">5. Los médicos cuentan con licencia para prestar el servicio.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == null) ? 'checked' : ''}} id="item_5_NA" value="">
                                <label class="form-check-label" for="item_5_NA">NA. No aplica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 1) ? 'checked' : ''}} id="item_5_1" value="1">
                                <label class="form-check-label" for="item_5_1">1. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 2) ? 'checked' : ''}} id="item_5_2" value="2">
                                <label class="form-check-label" for="item_5_2">2. Insuficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 3) ? 'checked' : ''}} id="item_5_3" value="3">
                                <label class="form-check-label" for="item_5_3">3. regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 4) ? 'checked' : ''}} id="item_5_4" value="4">
                                <label class="form-check-label" for="item_5_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 5) ? 'checked' : ''}} id="item_5_5" value="5">
                                <label class="form-check-label" for="item_5_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">6. Los equipos cuentan con su respectiva calibración periódica.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == null) ? 'checked' : ''}} id="item_6_NA" value="">
                                <label class="form-check-label" for="item_6_NA">NA. No aplica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 1) ? 'checked' : ''}} id="item_6_1" value="1">
                                <label class="form-check-label" for="item_6_1">1. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 2) ? 'checked' : ''}} id="item_6_2" value="2">
                                <label class="form-check-label" for="item_6_2">2. Insuficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 3) ? 'checked' : ''}} id="item_6_3" value="3">
                                <label class="form-check-label" for="item_6_3">3. regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 4) ? 'checked' : ''}} id="item_6_4" value="4">
                                <label class="form-check-label" for="item_6_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 5) ? 'checked' : ''}} id="item_6_5" value="5">
                                <label class="form-check-label" for="item_6_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">7. Agilidad en la respuesta de requerimientos.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == null) ? 'checked' : ''}} id="item_7_NA" value="">
                                <label class="form-check-label" for="item_7_NA">NA. No aplica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 1) ? 'checked' : ''}} id="item_7_1" value="1">
                                <label class="form-check-label" for="item_7_1">1. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 2) ? 'checked' : ''}} id="item_7_2" value="2">
                                <label class="form-check-label" for="item_7_2">2. Insuficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 3) ? 'checked' : ''}} id="item_7_3" value="3">
                                <label class="form-check-label" for="item_7_3">3. regular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 4) ? 'checked' : ''}} id="item_7_4" value="4">
                                <label class="form-check-label" for="item_7_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 5) ? 'checked' : ''}} id="item_7_5" value="5">
                                <label class="form-check-label" for="item_7_5">5. Excelente</label>
                            </div>
                            <hr>