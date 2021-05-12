<div class="panel box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                Mantenimiento de software tipo 2 (Aplica sólo para Campo)
            </a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
        <div class="box-body">
            <h4></h4>
            <div class="form-group">
                <div class="radio">
                    <p>1. 1. Cargar de sistema operativo</p>
                    <label>
                        <input type="radio" {{ (old('f1a1') == 'Si' ) ? 'checked' : '' }} name="f1a1" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a1') == 'No' ) ? 'checked' : '' }} name="f1a1" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a1') == 'No aplica' ) ? 'checked' : '' }} name="f1a1" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>2. Cargar de Office</p>
                    <label>
                        <input type="radio" {{ (old('f1a2') == 'Si' ) ? 'checked' : '' }} name="f1a2" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a2') == 'No' ) ? 'checked' : '' }} name="f1a2" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a2') == 'No aplica' ) ? 'checked' : '' }} name="f1a2" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>3. Carga de antivirus y actualización</p>
                    <label>
                        <input type="radio" {{ (old('f1a3') == 'Si' ) ? 'checked' : '' }} name="f1a3" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a3') == 'No' ) ? 'checked' : '' }} name="f1a3" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a3') == 'No aplica' ) ? 'checked' : '' }} name="f1a3" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>4. Cargar de Acrobat y WinRAR</p>
                    <label>
                        <input type="radio" {{ (old('f1a4') == 'Si' ) ? 'checked' : '' }} name="f1a4" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a4') == 'No' ) ? 'checked' : '' }} name="f1a4" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a4') == 'No aplica' ) ? 'checked' : '' }} name="f1a4" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>5. Conexión AnyDesk</p>
                    <label>
                        <input type="radio" {{ (old('f1a5') == 'Si' ) ? 'checked' : '' }} name="f1a5" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a5') == 'No' ) ? 'checked' : '' }} name="f1a5" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a5') == 'No aplica' ) ? 'checked' : '' }} name="f1a5" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>6. Conexión Ericsson MW</p>
                    <label>
                        <input type="radio" {{ (old('f1a6') == 'Si' ) ? 'checked' : '' }} name="f1a6" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a6') == 'No' ) ? 'checked' : '' }} name="f1a6" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a6') == 'No aplica' ) ? 'checked' : '' }} name="f1a6" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>7. Conexión Huawei MW</p>
                    <label>
                        <input type="radio" {{ (old('f1a7') == 'Si' ) ? 'checked' : '' }} name="f1a7" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a7') == 'No' ) ? 'checked' : '' }} name="f1a7" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a7') == 'No aplica' ) ? 'checked' : '' }} name="f1a7" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>8. Conexión NEC Ipaso MW</p>
                    <label>
                        <input type="radio" {{ (old('f1a8') == 'Si' ) ? 'checked' : '' }} name="f1a8" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a8') == 'No' ) ? 'checked' : '' }} name="f1a8" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a8') == 'No aplica' ) ? 'checked' : '' }} name="f1a8" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>9. Conexión NEC NEO MW</p>
                    <label>
                        <input type="radio" {{ (old('f1a9') == 'Si' ) ? 'checked' : '' }} name="f1a9" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a9') == 'No' ) ? 'checked' : '' }} name="f1a9" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a9') == 'No aplica' ) ? 'checked' : '' }} name="f1a9" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>10. Conexión NEC v4 MW</p>
                    <label>
                        <input type="radio" {{ (old('f1a10') == 'Si' ) ? 'checked' : '' }} name="f1a10" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a10') == 'No' ) ? 'checked' : '' }} name="f1a10" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a10') == 'No aplica' ) ? 'checked' : '' }} name="f1a10" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>11. Conexión flexi BTS</p>
                    <label>
                        <input type="radio" {{ (old('f1a11') == 'Si' ) ? 'checked' : '' }} name="f1a11" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a11') == 'No' ) ? 'checked' : '' }} name="f1a11" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a11') == 'No aplica' ) ? 'checked' : '' }} name="f1a11" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>12. Conexión lte BTS</p>
                    <label>
                        <input type="radio" {{ (old('f1a12') == 'Si' ) ? 'checked' : '' }} name="f1a12" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a12') == 'No' ) ? 'checked' : '' }} name="f1a12" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a12') == 'No aplica' ) ? 'checked' : '' }} name="f1a12" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>13. Conexión Ultra BTS</p>
                    <label>
                        <input type="radio" {{ (old('f1a13') == 'Si' ) ? 'checked' : '' }} name="f1a13" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a13') == 'No' ) ? 'checked' : '' }} name="f1a13" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a13') == 'No aplica' ) ? 'checked' : '' }} name="f1a13" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>14. Conexión Umts BTS</p>
                    <label>
                        <input type="radio" {{ (old('f1a14') == 'Si' ) ? 'checked' : '' }} name="f1a14" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a14') == 'No' ) ? 'checked' : '' }} name="f1a14" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a14') == 'No aplica' ) ? 'checked' : '' }} name="f1a14" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>15. Conexión Eltek 1.0 Power</p>
                    <label>
                        <input type="radio" {{ (old('f1a15') == 'Si' ) ? 'checked' : '' }} name="f1a15" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a15') == 'No' ) ? 'checked' : '' }} name="f1a15" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a15') == 'No aplica' ) ? 'checked' : '' }} name="f1a15" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>16. Conexión Eltek 2.0 Power</p>
                    <label>
                        <input type="radio" {{ (old('f1a16') == 'Si' ) ? 'checked' : '' }} name="f1a16" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a16') == 'No' ) ? 'checked' : '' }} name="f1a16" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a16') == 'No aplica' ) ? 'checked' : '' }} name="f1a16" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>17. Verificar cable de conexión para cada aplicativo de SW</p>
                    <label>
                        <input type="radio" {{ (old('f1a17') == 'Si' ) ? 'checked' : '' }} name="f1a17" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a17') == 'No' ) ? 'checked' : '' }} name="f1a17" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1a17') == 'No aplica' ) ? 'checked' : '' }} name="f1a17" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>