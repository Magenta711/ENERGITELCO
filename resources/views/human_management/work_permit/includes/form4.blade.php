<div class="panel box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                4. Condiciones de Riesgo Eléctrico (aplica sólo para trabajar en equipos energizados)
            </a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
        <div class="box-body">
            <p>¿Aplica riesgo eléctrico para este permiso?
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{ (old('estado') == '1' ) ? 'checked' : '' }} name="estado" id="si2" value="1">
                    <label class="form-check-label" for="si2">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{ (old('estado') == '0' ) ? 'checked' : '' }} name="estado" id="no2" value="0">
                    <label class="form-check-label" for="no2">
                        No
                    </label>
                </div>
            <br>Si no trabaja en equipos energizados no requiere llenar esta lista de chequeo de Riesgo Eléctrico, en caso contrario es obligatoria.</p>
            <div class="form-group">
                <label for="numero_matricula">Número de matrícula de la persona a cargo de la actividad</label>
                {{-- <select name="numero_matricula" id="numero_matricula" class="form-control">
                    <option selected disabled></option>
                    @foreach ($vehicles as $item)
                        <option value="{{$item->id}}">{{$item->num_enrollment}}</option>
                    @endforeach
                </select> --}}
                <input type="text" value="{{ old('numero_matricula') }}" name="numero_matricula" id='numero_matricula' class="form-control" placeholder="Número de matricula">
            </div>
            <div class="form-group">
                <p>Posee matrícula de electricista</p>
                <div class="radio">
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
                <p>Herramientas a utilizar en la actividad se encuentran aisladas adecuadamente</p>
                <div class="radio">
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
                <p>La fuente de energía se encuentra desenergizada en caso de ser posible </p>
                <div class="radio">
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
                <p>En caso de ser una labor en caliente se cumple con todas las condiciones de seguridad y se estudió adecuadamente el procedimiento</p>
                <div class="radio">
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
                <p>Retiró todos los elementos metálicos o conductivos de su cuerpo, como cadenas, reloj, anillos y manillas</p>
                <div class="radio">
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
            <hr>
            <div class="form-group">
                <p>Tiene puestos los guantes, gafas, pulsera antiestática, botas dieléctricas y todo lo requerido para la actividad</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{ (old('f4a6') == 'Si' ) ? 'checked' : '' }} name="f4a6" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a6') == 'No' ) ? 'checked' : '' }} name="f4a6" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a6') == 'No aplica' ) ? 'checked' : '' }} name="f4a6" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>Posee la herramienta adecuada para realizar la actividad y entiende eléctricamente el equipo a intervenir</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{ (old('f4a7') == 'Si' ) ? 'checked' : '' }} name="f4a7" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a7') == 'No' ) ? 'checked' : '' }} name="f4a7" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a7') == 'No aplica' ) ? 'checked' : '' }} name="f4a7" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <p>El trabajo en caliente es en baja tensión (Recuerde: trabajos en caliente en alta tensión están prohibidos)</p>
                <div class="radio">
                    <label>
                        <input type="radio" {{ (old('f4a8') == 'Si' ) ? 'checked' : '' }} name="f4a8" id="option1" value="Si"> Si
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a8') == 'No' ) ? 'checked' : '' }} name="f4a8" id="option2" value="No"> No
                    </label>
                    <label>
                        <input type="radio" {{ (old('f4a8') == 'No aplica' ) ? 'checked' : '' }} name="f4a8" id="option3" value="No aplica"> No aplica
                    </label>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>