<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter">
    <i class="fas fa-cog"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLongTitle">Configuraciones</h5>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_type">Tipo de formulario</label>
                        <select name="form_type" id="form_type" class="form-control">
                            <option {{isset($id) && $id->form_type == 'Evaluación' ? 'selected' : ''}} value="Evaluación">Evaluación</option>
                            <option {{isset($id) && $id->form_type == 'Encuesta' ? 'selected' : ''}} value="Encuesta">Encuesta</option>
                            <option {{isset($id) && $id->form_type == 'Formulario' ? 'selected' : ''}} value="Formulario">Formulario</option>
                        </select>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6" id="rating_type_div" style="display: none;">
                    <div class="form-group">
                        <label for="rating_type">Tipo de calificación</label>
                        <select name="rating_type" id="rating_type" class="form-control">
                            <option {{isset($id) && $id->rating_type == 'Automática' ? 'selected' : '' }}  value="Automática">Automática</option>
                            <option {{isset($id) && $id->rating_type == 'Manual' ? 'selected' : '' }} value="Manual">Manual</option>
                        </select>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6" id="value_type_div" style="display: none;">
                    <div class="form-group">
                        <label for="value_type">Valor de la calificación automática</label>
                        <select name="value_type" id="value_type" class="form-control">
                            <option {{isset($id) && $id->value_type == 'Promedio' ? 'checked' : '' }}  value="Promedio">Promedio</option>
                            <option {{isset($id) && $id->value_type == 'Dar el valor' ? 'checked' : '' }} value="Dar el valor">Dar el valor a las preguntas</option>
                        </select>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="from">Destinarios</label>
                        <div class="form-check">
                            <input {!!isset($id) && $id->from_to_guest ? 'checked' : ''!!} type="checkbox" name="from_to_guest" id="from_to_guest" value="1">
                            <label for="from_to_guest">Invitados</label>
                        </div>
                        <div class="form-check">
                            <input {!!isset($id) && $id->from_to_auth ? 'checked' : ''!!} type="checkbox" name="from_to_auth" id="from_to_auth" value="1">
                            <label for="from_to_auth">Funcionarios</label>
                        </div>
                        <div class="form-check">
                            <input {!!isset($id) && $id->from_to_mail ? 'checked' : ''!!} type="checkbox" name="from_to_mail" id="from_to_mail" value="1">
                            <label for="from_to_mail">Correos</label>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6" id="note_div" style="display: none">
                    <div class="form-group">
                        <label for="note">Nota máxima</label>
                        <input type="number" name="note" id="note" class="form-control" value="{{isset($id) ? $id->note : 10 }}">
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="checkbox" {!!isset($id) && $id->is_format ? 'checked' : ''!!}  name="is_format"  id="is_format" value="1">
                        <label for="is_format">Formato versionable</label>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="checkbox" {!!isset($id) && $id->limit_to_one ? 'checked' : ''!!}  name="limit_to_one"  id="limit_to_one" value="1">
                        <label for="limit_to_one">Limitar a una sola respuesta</label>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6" id="sort_randomly_div" style="display: none;">
                    <div class="form-group">
                        <input type="checkbox" {!!isset($id) && $id->sort_randomly ? 'checked' : ''!!}  name="sort_randomly" id="sort_randomly" value="1">
                        <label for="sort_randomly">Ordenar aleatoriamente las preguntas</label>
                    </div>
                    <hr>
                </div>
                <div class="col-md-12" id="from_to_mail_div" style="display: none">
                    <div class="form-group">
                        <label for="mails">Correos</label> <small>Separar por <span class="text-danger"><b>;</b></span></small>
                        <textarea name="mails" id="mails" cols="30" rows="3" class="form-control">{{isset($id) ? $id->mails : ''}}</textarea>
                    </div>
                    <hr>
                </div>
                <div class="col-md-12" id="from_to_auth_div" style="display: none">
                    <label for="">Por cargos</label>
                    <div class="row">
                        @foreach ($positions as $item)
                            <div class="col-sm-3">
                                <label>
                                    <input type="checkbox" name="position[]" id="position_{{$item->id}}" value="{{$item->id}}" checked>
                                    {{$item->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
        </div>
    </div>
    </div>
</div>