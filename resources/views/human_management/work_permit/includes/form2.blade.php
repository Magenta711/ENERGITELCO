<div class="panel box box-warning">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                2. LISTADO DE VERIFICACIÓN (El incumplimiento de estas recomendaciones genera la cancelación del permiso de trabajo)
            </a>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
        <div class="box-body">
            <h4>a. Personal que realiza la tarea.</h4>
            <small>Marque las opciones a las que de cumplimiento y dejar sin marcar a las que no.</small>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{(old('f2a1') == 'Si') ? 'checked' : '' }} value="Si" name="f2a1" id="f2a1">
                <label class="form-check-label" for="f2a1">
                        Las condiciones meteorológicas permiten la realización del trabajo en condiciones seguras
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{(old('f2a2') == 'Si') ? 'checked' : '' }} value="Si" name="f2a2" id="f2a2">
                <label class="form-check-label" for="f2a2">
                        Condiciones integrales de los trabajadores
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{(old('f2a3') == 'Si') ? 'checked' : '' }} value="Si" name="f2a3" id="f2a3">
                <label class="form-check-label" for="f2a3">
                        Capacitación con certificación vigente
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{(old('f2a4') == 'Si') ? 'checked' : '' }} value="Si" name="f2a4" id="f2a4">
                <label class="form-check-label" for="f2a4">
                        Hay entrenamiento para el reconocimiento de riesgos
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{(old('f2a5') == 'Si') ? 'checked' : '' }} value="Si" name="f2a5" id="f2a5">
                <label class="form-check-label" for="f2a5">
                        Existen procedimientos o instrucciones para la ejecución de la tarea y métodos de control (verificar)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{(old('f2a6') == 'Si') ? 'checked' : '' }} value="Si" name="f2a6" id="f2a6">
                <label class="form-check-label" for="f2a6">
                        Se verificaron los puntos de anclaje en la estructura donde se realizará el trabajo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{(old('f2a7') == 'Si') ? 'checked' : '' }} value="Si" name="f2a7" id="f2a7">
                <label class="form-check-label" for="f2a7">
                    Completa documentación del personal:</label><br>
                    <label class="form-check-label" for="seguro1"><input value="EPS" {{(old('documentacion_personal') == 'EPS') ? 'checked' : ''}} type="radio" name="documentacion_personal" id="seguro1">Eps</label> <label class="form-check-label" for="seguro2"><input value="ARL" {{(old('documentacion_personal') == 'ARL') ? 'checked' : ''}} type="radio" name="documentacion_personal" id="seguro2">ARL</label>
                    <label class="form-check-label" for="seguro3"><input value="Pensión" {{(old('documentacion_personal') == 'Pensión') ? 'checked' : ''}} type="radio" name="documentacion_personal" id="seguro3">Pensión</label> <label class="form-check-label" for="seguro4"><input value="Carné de la compañía" {{(old('documentacion_personal') == 'Carné de la compañía') ? 'checked' : ''}} type="radio" name="documentacion_personal" id="seguro4">Carné de la compañía</label>
                
            </div>
            <hr>
            <h4>b. Elementos de Protección Personal</h4>
            <small> (Calificar en el lado izquierdo el estado de cada equipo a utilizar. 
                    bueno, desgaste normal en condiciones de uso o mal estado)</small>
            <div class="form-group row justify-content-md-center">
                <div class="col-md-4">Elementos de Protección Personal</div>
                <div class="col-md-2">Funcionario  1</div>
                <div class="col-md-2">Funcionario  2</div>
                <div class="col-md-2">Funcionario  3</div>
                <div class="col-md-2">Funcionario  4</div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">PROTECCIÓN DE CABEZA: - Casco con barbuquejo</div>
                <div class="col-md-2">
                    <select name="f2b1u1" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2b1u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b1u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b1u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b1u2" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2b1u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b1u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b1u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b1u3" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2b1u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b1u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b1u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b1u4" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2b1u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b1u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b1u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">PROTECCIÓN AUDITIVA: - Protector de inserción [opcional]</div>
                <div class="col-md-2">
                    <select name="f2b2u1" id="B1" class="form-control">
                        <option value="" selected>Funcionario 1</option>
                        <option {{ (old('f2b2u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b2u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b2u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b2u2" id="B2" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2b2u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b2u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b2u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b2u3" id="B3" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2b2u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b2u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b2u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b2u4" id="B3" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2b2u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b2u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b2u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">PROTECCIÓN VISUAL: - Gafas de seguridad</div>
                <div class="col-md-2">
                    <select name="f2b3u1" id="C1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2b3u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b3u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b3u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b3u2" id="C2" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2b3u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b3u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b3u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b3u3" id="C3" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2b3u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b3u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b3u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b3u4" id="C3" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2b3u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b3u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b3u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">PROTECCIÓN EN MANOS: - Guantes con recubrimiento adecuado para la actividad</div>
                <div class="col-md-2">
                    <select name="f2b4u1" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2b4u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b4u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b4u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b4u2" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2b4u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b4u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b4u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b4u3" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2b4u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b4u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b4u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b4u4" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2b4u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b4u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b4u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">PROTECCIÓN EN PIES: - Botas de seguridad dieléctricas</div>
                <div class="col-md-2">
                    <select name="f2b5u1" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2b5u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b5u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b5u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b5u2" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2b5u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b5u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b5u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b5u3" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2b5u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b5u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b5u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b5u4" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2b5u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b5u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b5u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">PROTECCIÓN EN CUERPO: - Ropa cómoda para trabajo</div>
                <div class="col-md-2">
                    <select name="f2b6u1" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2b6u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b6u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b6u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b6u2" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2b6u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b6u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b6u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b6u3" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2b6u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b6u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b6u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2b6u4" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2b6u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2b6u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2b6u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <h4>c. Equipos de Protección y Prevención contra Caídas</h4><small>(Calificar el estado de cada equipo. B: bueno; DN: desgaste normal; M: mal estado)</small> 
            <div class="form-group row justify-content-center">
                <div class="col-md-4">Equipos de Protección y Prevención contra Caídas</div>
                <div class="col-md-2">Funcionario  1</div>
                <div class="col-md-2">Funcionario  2</div>
                <div class="col-md-2">Funcionario  3</div>
                <div class="col-md-2">Funcionario  4</div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">ARNÉS DE CUERPO COMPLETO: (de cuatro argollas preferible tipo cruzado)</div>
                <div class="col-md-2">
                    <select name="f2c1u1" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2c1u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c1u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c1u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c1u2" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2c1u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c1u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c1u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c1u3" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2c1u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c1u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c1u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c1u4" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2c1u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c1u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c1u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">CONECTORES: - Eslinga en Y con absorbedor</div>
                <div class="col-md-2">
                    <select name="f2c2u1" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2c2u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c2u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c2u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c2u2" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2c2u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c2u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c2u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c2u3" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2c2u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c2u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c2u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c2u4" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2c2u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c2u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c2u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <!-- Mecanismos de anclaje -->
            <div class="form-group row">
                <div class="col-md-4">MECANISMOS DE ANCLAJE: - Cinta de anclaje portátil (tie off)</div>
                <div class="col-md-2">
                    <select name="f2c4u1" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2c4u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c4u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c4u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c4u2" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2c4u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c4u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c4u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c4u3" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2c4u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c4u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c4u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c4u4" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2c4u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c4u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c4u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <!-- fin de mecanismos de anclaje -->
            <div class="form-group row">
                <div class="col-md-4">MECANISMOS DE ASCENSO - Freno + Mosquetón de seguridad para ascenso con línea de vida de acero)</div>
                <div class="col-md-2">
                    <select name="f2c3u1" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 1</option>
                        <option {{ (old('f2c3u1') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c3u1') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c3u1') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c3u2" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 2</option>
                        <option {{ (old('f2c3u2') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c3u2') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c3u2') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c3u3" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 3</option>
                        <option {{ (old('f2c3u3') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c3u3') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c3u3') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="f2c3u4" id="1" class="form-control">
                        <option value="" selected disabled>Funcionario 4</option>
                        <option {{ (old('f2c3u4') == 'Bueno') ? 'selected' : '' }} value="Bueno">Bueno</option>
                        <option {{ (old('f2c3u4') == 'Desgaste normal') ? 'selected' : '' }} value="Desgaste normal">Desgaste normal en condiciones de uso</option>
                        <option {{ (old('f2c3u4') == 'Mal estado') ? 'selected' : '' }} value="Mal estado">Mal estado</option>
                    </select>
                </div>
            </div>
            <hr>
            <h4>d. Condiciones de riesgo en zona de trabajo</h4>
            <small>Selecciona con cuidado el cumplimiento de estas recomendaciones</small>
            <hr>
            <div class="form-group">
                <p>El sitio de trabajo en alturas está delimitado (encerrado) y señalizado (avisos informativos) debidamente</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2d1') == 'Si') ? 'checked' : '' }} name="f2d1" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2d1') == 'No') ? 'checked' : '' }} name="f2d1" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2d1') == 'No aplica') ? 'checked' : '' }} name="f2d1" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Se han previsto medidas de control ante riesgos eléctricos, biológicos (avispas, abejas o animales peligrosos), caída de objetos, etc.</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2d2') == 'Si') ? 'checked' : '' }} name="f2d2" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2d2') == 'No') ? 'checked' : '' }} name="f2d2" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2d2') == 'No aplica') ? 'checked' : '' }} name="f2d2" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Se han previsto controles ante obstáculos, difícil acceso, espacios reducidos, etc., que dificulten la labor en alturas.</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2d3') == 'Si') ? 'checked' : '' }} name="f2d3" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2d3') == 'No') ? 'checked' : '' }} name="f2d3" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2d3') == 'No aplica') ? 'checked' : '' }} name="f2d3" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Condiciones ambientales adecuadas (ausencia de lluvia, neblina, tormenta eléctrica, vientos fuertes).</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2d4') == 'Si') ? 'checked' : '' }} name="f2d4" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2d4') == 'No') ? 'checked' : '' }} name="f2d4" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2d4') == 'No aplica') ? 'checked' : '' }} name="f2d4" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <hr>
            <h4>e. Torre, estructura o sistema de acceso  y sus componentes</h4><small> (Línea de vida, escaleras, ángulos, tubos, plataformas, cubiertas, etc.)</small> 
            <div class="form-group">
                <p>Se garantiza completa estabilidad y seguridad de la estructura (sin fracturas, partes torcidas, corrosión, partes incompletas) </p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2e1') == 'Si') ? 'checked' : '' }} name="f2e1" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e1') == 'No') ? 'checked' : '' }} name="f2e1" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e1') == 'No aplica') ? 'checked' : '' }} name="f2e1" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Se dispone de puntos de anclaje adecuados y con resistencia de 5.000 lbs. aprox. donde el trabajador pueda asegurarse.</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2e7') == 'Si') ? 'checked' : '' }} name="f2e7" id="option7" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e7') == 'No') ? 'checked' : '' }} name="f2e7" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e7') == 'No aplica') ? 'checked' : '' }} name="f2e7" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>De acuerdo a las condiciones del sitio, es adecuado el sistema de acceso y la resistencia de la estructura a las cargas.</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2e2') == 'Si') ? 'checked' : '' }} name="f2e2" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e2') == 'No') ? 'checked' : '' }} name="f2e2" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e2') == 'No aplica') ? 'checked' : '' }} name="f2e2" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Buen estado de componentes (línea de vida, peldaños escalera, materiales, diámetros, ángulos, tubos, diagonales, barandas, etc.)</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2e3') == 'Si') ? 'checked' : '' }} name="f2e3" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e3') == 'No') ? 'checked' : '' }} name="f2e3" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e3') == 'No aplica') ? 'checked' : '' }} name="f2e3" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Se encuentra libre de superficies húmedas, lisas, resbalosas o irregulares que impidan ejecutar la tarea.</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2e4') == 'Si') ? 'checked' : '' }} name="f2e4" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e4') == 'No') ? 'checked' : '' }} name="f2e4" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e4') == 'No aplica') ? 'checked' : '' }} name="f2e4" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Se garantizan distancias y límites seguros permitidos, evitando líneas eléctricas energizadas o bordes desprotegidos, etc.</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2e5') == 'Si') ? 'checked' : '' }} name="f2e5" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e5') == 'No') ? 'checked' : '' }} name="f2e5" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e5') == 'No aplica') ? 'checked' : '' }} name="f2e5" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Plataformas en perfecto estado que garantizan cobertura del 100% de la superficie de trabajo y sistema de barandas adecuado.</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{(old('f2e6') == 'Si') ? 'checked' : '' }} name="f2e6" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e6') == 'No') ? 'checked' : '' }} name="f2e6" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{(old('f2e6') == 'No aplica') ? 'checked' : '' }} name="f2e6" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>  