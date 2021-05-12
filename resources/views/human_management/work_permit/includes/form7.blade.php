<div class="panel box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                8. Observaciones
            </a>
        </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse">
        <div class="box-body">
            <div class="form-gruop">
                <label for="observaciones">Realice aquí sus observaciones</label>
                <textarea name="observaciones" id="observaciones" cols="3" rows="3" class="form-control">{{old('observaciones')}}</textarea>
            </div>
            <hr>
            <div class="form-gruop">
                <label for="archivo">Adjuntar archivos</label>
                <label id="label_archivo" for="archivo" class="form-control text-center "><i class="fa fa-upload"></i></label>
                <input value="{{old('archivos')}}" class="hide file_input" type="file" multiple="true" name="archivos[]" id="archivo">
            </div>
        </div>
    </div>
</div>