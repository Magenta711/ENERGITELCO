<div class="panel box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                Mantenimiento de hardware estándar (Obligatorio para todos los PC)
            </a>
        </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
        <div class="box-body">
            <div class="form-group">
                <div class="radio">
                    <p>Limpieza de los contactos de la memoria RAM</p>
                    <label>
                        <input type="radio" {{ (old('f1b1') == 'Si' ) ? 'checked' : '' }} name="f1b1" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b1') == 'No' ) ? 'checked' : '' }} name="f1b1" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b1') == 'No aplica' ) ? 'checked' : '' }} name="f1b1" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Limpieza del disparador de calor</p>
                    <label>
                        <input type="radio" {{ (old('f1b2') == 'Si' ) ? 'checked' : '' }} name="f1b2" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b2') == 'No' ) ? 'checked' : '' }} name="f1b2" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b2') == 'No aplica' ) ? 'checked' : '' }} name="f1b2" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Mantenimiento al Cooler y Fan</p>
                    <label>
                        <input type="radio" {{ (old('f1b3') == 'Si' ) ? 'checked' : '' }} name="f1b3" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b3') == 'No' ) ? 'checked' : '' }} name="f1b3" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b3') == 'No aplica' ) ? 'checked' : '' }} name="f1b3" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Mantenimiento del teclado</p>
                    <label>
                        <input type="radio" {{ (old('f1b4') == 'Si' ) ? 'checked' : '' }} name="f1b4" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b4') == 'No' ) ? 'checked' : '' }} name="f1b4" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b4') == 'No aplica' ) ? 'checked' : '' }} name="f1b4" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Mantenimiento de la pantalla</p>
                    <label>
                        <input type="radio" {{ (old('f1b5') == 'Si' ) ? 'checked' : '' }} name="f1b5" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b5') == 'No' ) ? 'checked' : '' }} name="f1b5" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b5') == 'No aplica' ) ? 'checked' : '' }} name="f1b5" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Mantenimiento contactos del teclado y sensor del mouse</p>
                    <label>
                        <input type="radio" {{ (old('f1b6') == 'Si' ) ? 'checked' : '' }} name="f1b6" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b6') == 'No' ) ? 'checked' : '' }} name="f1b6" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b6') == 'No aplica' ) ? 'checked' : '' }} name="f1b6" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Mantenimiento contactos de tarjeta de red inalámbrica</p>
                    <label>
                        <input type="radio" {{ (old('f1b7') == 'Si' ) ? 'checked' : '' }} name="f1b7" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b7') == 'No' ) ? 'checked' : '' }} name="f1b7" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b7') == 'No aplica' ) ? 'checked' : '' }} name="f1b7" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Mantenimiento unidad de CD</p>
                    <label>
                        <input type="radio" {{ (old('f1b8') == 'Si' ) ? 'checked' : '' }} name="f1b8" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b8') == 'No' ) ? 'checked' : '' }} name="f1b8" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b8') == 'No aplica' ) ? 'checked' : '' }} name="f1b8" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            {{-- Version 4 --}}
            <div class="form-group">
                <div class="radio">
                    <p>¿El escritorio físico se encentra limpio y ordenado?</p>
                    <label>
                        <input type="radio" {{ (old('f1b9') == 'Si' ) ? 'checked' : '' }} name="f1b9" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b9') == 'No' ) ? 'checked' : '' }} name="f1b9" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f1b9') == 'No aplica' ) ? 'checked' : '' }} name="f1b9" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>