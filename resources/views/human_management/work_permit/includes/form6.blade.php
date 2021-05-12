<div class="panel box box-gray">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                6. Validación de los equipos de protección para la conducción de motos.
            </a>
        </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
        <div class="box-body">
            <div class="form-group row justify-content-md-center">
                <div class="col-md-4">Elementos</div>
                <div class="col-md-2">Funcionario 1</div>
                <div class="col-md-2">Funcionario 2</div>
                <div class="col-md-2">Funcionario 3</div>
                <div class="col-md-2">Funcionario 3</div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">
                    <h5>Casco con placa</h5>
                </div>
                <div class="col-md-2">
                   <select name="f6a1u1" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 1</option>
                       <option {{(old('f6a1u1') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a1u1') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a1u1') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a1u2" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 2</option>
                       <option {{(old('f6a1u2') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a1u2') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a1u2') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a1u3" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 3</option>
                       <option {{(old('f6a1u3') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a1u3') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a1u3') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a1u4" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 4</option>
                       <option {{(old('f6a1u4') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a1u4') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a1u4') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comentario1">Comentario</label>
                <input type="text" class="form-control" id="comentario1" value="{{old('comentario1')}}" name="comentario1">
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">
                    <h5>Coderas</h5>
                </div>
                <div class="col-md-2">
                   <select name="f6a2u1" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 1</option>
                       <option {{(old('f6a2u1') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a2u1') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a2u1') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a2u2" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 2</option>
                       <option {{(old('f6a2u2') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a2u2') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a2u2') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a2u3" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 3</option>
                       <option {{(old('f6a2u3') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a2u3') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a2u3') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a2u4" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 4</option>
                       <option {{(old('f6a2u4') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a2u4') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a2u4') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comentario2">Comentario</label>
                <input type="text" class="form-control" id="comentario2" value="{{old('comentario2')}}" name="comentario2">
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">
                    <h5>Rodilleras</h5>
                </div>
                <div class="col-md-2">
                   <select name="f6a3u1" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 1</option>
                       <option {{(old('f6a3u1') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a3u1') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a3u1') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a3u2" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 2</option>
                       <option {{(old('f6a3u2') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a3u2') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a3u2') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a3u3" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 3</option>
                       <option {{(old('f6a3u3') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a3u3') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a3u3') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a3u4" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 4</option>
                       <option {{(old('f6a3u4') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a3u4') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a3u4') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comentario3">Comentario</label>
                <input type="text" class="form-control" id="comentario3" value="{{old('comentario3')}}" name="comentario3">
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">
                    <h5>Impermeable</h5>
                </div>
                <div class="col-md-2">
                   <select name="f6a4u1" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 1</option>
                       <option {{(old('f6a4u1') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a4u1') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a4u1') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a4u2" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 2</option>
                       <option {{(old('f6a4u2') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a4u2') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a4u2') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a4u3" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 3</option>
                       <option {{(old('f6a4u3') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a4u3') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a4u3') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a4u4" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 4</option>
                       <option {{(old('f6a4u4') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a4u4') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a4u4') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comentario4">Comentario</label>
                <input type="text" class="form-control" id="comentario4" value="{{old('comentario4')}}" name="comentario4">
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-4">
                    <h5>Chaleco reflectivo con placa</h5>
                </div>
                <div class="col-md-2">
                   <select name="f6a5u1" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 1</option>
                       <option {{(old('f6a5u1') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a5u1') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a5u1') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a5u2" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 2</option>
                       <option {{(old('f6a5u2') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a5u2') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a5u2') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a5u3" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 3</option>
                       <option {{(old('f6a5u3') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a5u3') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a5u3') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
                <div class="col-md-2">
                   <select name="f6a5u4" id="f6a1" class="form-control">
                       <option selected disabled>Funcionario 4</option>
                       <option {{(old('f6a5u4') == 'Bueno') ? 'selected' : ''}} value="Bueno">Bueno</option>
                       <option {{(old('f6a5u4') == 'Desgaste normal en condiciones de uso') ? 'selected' : ''}} value="Desgaste normal en condiciones de uso">Desgaste normal en condiciones de uso</option>
                       <option {{(old('f6a5u4') == 'Mal estado') ? 'selected' : ''}} value="Mal estado">Mal estado</option>
                   </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comentario5">Comentario</label>
                <input type="text" class="form-control" id="comentario5" value="{{old('comentario5')}}" name="comentario5">
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="foto_motos1">Foto del equipo funcionario 1</label>
                    <label for="foto_motos1" class="form-control text-center"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" class="hide file_input" name="foto_motos1" id="foto_motos1">
                </div>
                <div class="col-md-3">
                    <label for="foto_motos2">Foto del equipo funcionario 2</label>
                    <label for="foto_motos2" class="form-control text-center"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" class="hide file_input" name="foto_motos2" id="foto_motos2">
                </div>
                <div class="col-md-3">
                    <label for="foto_motos3">Foto del equipo funcionario 3</label>
                    <label for="foto_motos3" class="form-control text-center"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" class="hide file_input" name="foto_motos3" id="foto_motos3">
                </div>
                <div class="col-md-3">
                    <label for="foto_motos4">Foto del equipo funcionario 4</label>
                    <label for="foto_motos4" class="form-control text-center"><i class="fa fa-upload"></i></label>
                    <input type="file" accept="image/*" class="hide file_input" name="foto_motos4" id="foto_motos4">
                </div>
            </div>
        </div>
    </div>
</div>