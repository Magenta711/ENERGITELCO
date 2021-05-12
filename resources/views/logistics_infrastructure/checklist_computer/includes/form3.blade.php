<div class="panel box box-success">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                Mantenimiento de software tipo 1 (Aplica para Administrativos o Campo)
            </a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
        <div class="box-body">
            <div class="form-group">
                <div class="radio">
                    <p>1. Archivos temporales</p>
                    <label>
                        <input type="radio" {{ (old('f3a1') == 'Si' ) ? 'checked' : '' }} name="f3a1" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a1') == 'No' ) ? 'checked' : '' }} name="f3a1" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a1') == 'No aplica' ) ? 'checked' : '' }} name="f3a1" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>2. Desfragmentación del disco duro</p>
                    <label>
                        <input type="radio" {{ (old('f3a2') == 'Si' ) ? 'checked' : '' }} name="f3a2" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a2') == 'No' ) ? 'checked' : '' }} name="f3a2" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a2') == 'No aplica' ) ? 'checked' : '' }} name="f3a2" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>3. Actualización del CCLEANER</p>
                    <label>
                        <input type="radio" {{ (old('f3a3') == 'Si' ) ? 'checked' : '' }} name="f3a3" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a3') == 'No' ) ? 'checked' : '' }} name="f3a3" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a3') == 'No aplica' ) ? 'checked' : '' }} name="f3a3" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>4. Actualización del antivirus (obligatorio)</p>
                    <label>
                        <input type="radio" {{ (old('f3a4') == 'Si' ) ? 'checked' : '' }} name="f3a4" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a4') == 'No' ) ? 'checked' : '' }} name="f3a4" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a4') == 'No aplica' ) ? 'checked' : '' }} name="f3a4" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>5. Se requiere formateo del computador</p>
                    <label>
                        <input type="radio" {{ (old('f3a5') == 'Si' ) ? 'checked' : '' }} name="f3a5" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a5') == 'No' ) ? 'checked' : '' }} name="f3a5" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f3a5') == 'No aplica' ) ? 'checked' : '' }} name="f3a5" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>