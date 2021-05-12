<div class="panel box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                Mantenimiento de software tipo 3 (Opcional para Administrativos)
            </a>
        </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
        <div class="box-body">
            <div class="form-group">
                <div class="radio">
                    <p>1. Carga de sistema operativo</p>
                    <label>
                        <input type="radio" {{ (old('f4a1') == 'Si' ) ? 'checked' : '' }} name="f4a1" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a1') == 'No' ) ? 'checked' : '' }} name="f4a1" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a1') == 'No aplica' ) ? 'checked' : '' }} name="f4a1" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>2. Carga de Office</p>
                    <label>
                        <input type="radio" {{ (old('f4a2') == 'Si' ) ? 'checked' : '' }} name="f4a2" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a2') == 'No' ) ? 'checked' : '' }} name="f4a2" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a2') == 'No aplica' ) ? 'checked' : '' }} name="f4a2" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>3. Carga de antivirus y actualización</p>
                    <label>
                        <input type="radio" {{ (old('f4a3') == 'Si' ) ? 'checked' : '' }} name="f4a3" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a3') == 'No' ) ? 'checked' : '' }} name="f4a3" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a3') == 'No aplica' ) ? 'checked' : '' }} name="f4a3" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>4. Carga de Acrobat y WinRAR</p>
                    <label>
                        <input type="radio" {{ (old('f4a4') == 'Si' ) ? 'checked' : '' }} name="f4a4" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a4') == 'No' ) ? 'checked' : '' }} name="f4a4" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a4') == 'No aplica' ) ? 'checked' : '' }} name="f4a4" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>5. Instalación de impresoras y red</p>
                    <label>
                        <input type="radio" {{ (old('f4a5') == 'Si' ) ? 'checked' : '' }} name="f4a5" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a5') == 'No' ) ? 'checked' : '' }} name="f4a5" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a5') == 'No aplica' ) ? 'checked' : '' }} name="f4a5" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>