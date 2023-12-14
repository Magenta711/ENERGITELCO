<div class="form-group">
    <label for="reason">Motivo</label>
    <select name="reason" id="reason" class="form-control">
        <option selected disabled></option>
        <option {{old('reason') == 'vivienda' ? 'selected' : ''}} value="vivienda">Para financiar vivienda.</option>
        <option {{old('reason') == 'educacion' ? 'selected' : ''}} value="educacion">Para financiar la educación.</option>
        <option {{old('reason') == 'acciones' ? 'selected' : ''}} value="acciones">Para comprar acciones en las empresas del estado.</option>
        <option {{old('reason') == 'carta laboral' ? 'selected' : ''}} value="carta laboral">Carta laboral</option>
        <option {{old('reason') == 'pago de vacaciones' ? 'selected' : ''}} value="pago de vacaciones">Pago de vacaciones</option>
    </select>
</div>
<div class="form-group input_form">
    <label for="from">Aquien dirige</label>
    <input type="text" value="{{old('from') ?? 'PENSIONES Y CESANTÍAS PROTECCION' }}" name="from" class="form-control" id="from">
</div>
<div class="form-group input_value">
    <label for="value">Valor</label>
    <input type="number" value="{{old('value')}}" name="value" class="form-control" id="value">
</div>
<div class="form-group">
    <label for="description" id="lb_descrition">Descriptión</label>
    <textarea name="description" name="description" id="description" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
</div>
<div class="form-group input_file">
    <hr>
    <label for="file">Adjuntar archivos</label>
    <label for="file" id="label_file" class="form-control text-center"><i class="fas fa-upload"></i></label>
    <input type="file" name="file[]" multiple id="file" class="hide" value="{{old('file')}}">
</div>