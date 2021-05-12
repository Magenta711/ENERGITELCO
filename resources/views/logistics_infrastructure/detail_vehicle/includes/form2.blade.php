<div class="panel box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                VERIFICACIÓN LEGAL
            </a>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
        <div class="box-body">
            <h4>Documentos</h4>
            <p><small>Verificar que se encuentren y que su fecha de vencimiento sea la adecuada.</small></p>
            <strong>Estado</strong>
            <div class="form-group">
                <div class="radio">
                    <p>Licencia de condución</p>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_1') == 'Bien' ) ? 'checked' : '' }} name="f1_1" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_1') == 'Mal' ) ? 'checked' : '' }} name="f1_1" id="option2" value="Mal"> Mal
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>SOAT</p>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_2') == 'Bien' ) ? 'checked' : '' }} name="f1_2" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_2') == 'Mal' ) ? 'checked' : '' }} name="f1_2" id="option2" value="Mal"> Mal
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>RTM</p>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_3') == 'Bien' ) ? 'checked' : '' }} name="f1_3" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_3') == 'Mal' ) ? 'checked' : '' }} name="f1_3" id="option2" value="Mal"> Mal
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Seguro de daños y RC</p>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_4') == 'Bien' ) ? 'checked' : '' }} name="f1_4" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_4') == 'Mal' ) ? 'checked' : '' }} name="f1_4" id="option2" value="Mal"> Mal
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>Certificado de gases</p>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_5') == 'Bien' ) ? 'checked' : '' }} name="f1_5" id="option1" value="Bien"> Bien
                    </label>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_5') == 'Mal' ) ? 'checked' : '' }} name="f1_5" id="option2" value="Mal"> Mal
                    </label>
                    <label>
                        <input class="legal_verification" type="radio" {{ (old('f1_5') == 'No aplica' ) ? 'checked' : '' }} name="f1_5" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="observaciones1">Observaciones</label>
                <p><textarea name="observaciones1" id="observaciones1" class="form-control" cols="3"  rows="3"></textarea></p>
            </div>
        </div>
    </div>
</div>