<div class="panel box box-warning">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                Tareas para el manejo de seguridad de la información (Para Administrativos)
            </a>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
        <div class="box-body">
            <div class="form-group">
                <div class="radio">
                    <p>1. Usuario y clave de inicio como única opción de acceso al pc</p>
                    <label>
                        <input type="radio" {{ (old('f2a1') == 'Si' ) ? 'checked' : '' }} name="f2a1" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a1') == 'No' ) ? 'checked' : '' }} name="f2a1" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a1') == 'No aplica' ) ? 'checked' : '' }} name="f2a1" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>2. Actualizar Windows y todo el SW licenciado</p>
                    <label>
                        <input type="radio" {{ (old('f2a2') == 'Si' ) ? 'checked' : '' }} name="f2a2" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a2') == 'No' ) ? 'checked' : '' }} name="f2a2" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a2') == 'No aplica' ) ? 'checked' : '' }} name="f2a2" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>3. Restringir acceso a las unidades de almacenamiento (todos sin excepción)</p>
                    <label>
                        <input type="radio" {{ (old('f2a3') == 'Si' ) ? 'checked' : '' }} name="f2a3" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a3') == 'No' ) ? 'checked' : '' }} name="f2a3" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a3') == 'No aplica' ) ? 'checked' : '' }} name="f2a3" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>4. ¿Está impidiendo el acceso a las unidades internas del equipo?</p>
                    <label>
                        <input type="radio" {{ (old('f2a5') == 'Si' ) ? 'checked' : '' }} name="f2a5" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a5') == 'No' ) ? 'checked' : '' }} name="f2a5" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a5') == 'No aplica' ) ? 'checked' : '' }} name="f2a5" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>5. Limpiar escritorio, carpetas personales y disco duro (solo queda carpeta Energitelco con clave y sus accesos directos)</p>
                    <label>
                        <input type="radio" {{ (old('f2a4') == 'Si' ) ? 'checked' : '' }} name="f2a4" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a4') == 'No' ) ? 'checked' : '' }} name="f2a4" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a4') == 'No aplica' ) ? 'checked' : '' }} name="f2a4" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>6. Crear seguridad VPN</p>
                    <label>
                        <input type="radio" {{ (old('f2a6') == 'Si' ) ? 'checked' : '' }} name="f2a6" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a6') == 'No' ) ? 'checked' : '' }} name="f2a6" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a6') == 'No aplica' ) ? 'checked' : '' }} name="f2a6" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>7. ¿Se ha realizado borrado seguro de la información confidencial?</p>
                    <label>
                        <input type="radio" {{ (old('f2a7') == 'Si' ) ? 'checked' : '' }} name="f2a7" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a7') == 'No' ) ? 'checked' : '' }} name="f2a7" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a7') == 'No aplica' ) ? 'checked' : '' }} name="f2a7" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>8. ¿Se han presentado incidentes de seguridad con los accesos de claro y otros clientes?</p>
                    <label>
                        <input type="radio" {{ (old('f2a8') == 'Si' ) ? 'checked' : '' }} name="f2a8" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a8') == 'No' ) ? 'checked' : '' }} name="f2a8" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a8') == 'No aplica' ) ? 'checked' : '' }} name="f2a8" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="radio">
                    <p>9. ¿Se utilizan los servicios seguros y se han deshabilitado servicios no necesarios?</p>
                    <label>
                        <input type="radio" {{ (old('f2a9') == 'Si' ) ? 'checked' : '' }} name="f2a9" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a9') == 'No' ) ? 'checked' : '' }} name="f2a9" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f2a9') == 'No aplica' ) ? 'checked' : '' }} name="f2a9" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>