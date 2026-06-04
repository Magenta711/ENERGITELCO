{{-- Usuarios --}}
@foreach ($usuarios as $usuario)
<input type="hidden" disabled value="{{$usuario->name}}" id="name{{$usuario->id}}">
<input type="hidden" disabled value="{{$usuario->position->name}}" id="cargo{{$usuario->id}}">
<input type="hidden" disabled value="{{$usuario->area}}" id="cargo{{$usuario->id}}">
@endforeach
{{-- User 1 --}}
<h4>Trabajador</h4>
<div class="form-group row">
    <div class="col-md-3 col-sm-6">
        <label for="cedula1">Número de documento</label>
        <select onchange="infoUser(this)" name="cedula_trabajador" id="cedula1" class="form-control selectCedula">
            <option value="" hidden selected></option>
            @foreach ($usuarios as $usuario)
                <option {{ (old('cedula_trabajador') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!} </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 col-sm-6">
        <label for="nombre1">Nombre completo funcionario</label>
        <input type="text" readonly name="name1" value="{{ old('name1') }}" class="form-control controlName" id="nombre1" placeholder="Nombre" >
    </div>
    <div class="col-md-3 col-sm-6">
        <label for="rol1">Rol autorizado</label>
        <input type="text" readonly name="rol1" value="{{ old('rol1') }}" class="form-control controlRol" id="rol1" placeholder="Rol">
    </div>
    <div class="col-md-3 col-sm-6">
        <label for="area1">Área</label>
        <input type="text" readonly name="area1" value="{{ old('area1') }}" class="form-control controlRol" id="area1" placeholder="Área">
    </div>
</div>
<hr>
<h4>Detalles del permiso</h4>
<div class="form-group row">
    <div class="col-md-3 col-sm-6 col-12">
        <label for="fecha_inicio">Fecha de inicio</label>
        <input type="date" name="fecha_inicio" value="{{old('fecha_inicio')}}" id="fecha_inicio" class="form-control">
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <label for="hora_inicio">Hora de inicio</label>
        <input type="time" name="hora_inicio" value="{{old('hora_inicio')}}" id="hora_inicio" class="form-control">
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <label for="fecha_finalizacion">Fecha de finalización</label>
        <input type="date" name="fecha_finalizacion" value="{{old('fecha_finalizacion')}}" id="fecha_finalizacion" class="form-control">
    </div>
    <div class="col-md-3 col-sm-6 col-12">
        <label for="hora_finalizacion">Hora de finalización</label>
        <input type="time" name="hora_finalizacion" value="{{old('hora_finalizacion')}}" id="hora_finalizacion" class="form-control">
    </div>
</div>
<hr>
<div class="form-group">
    <p>Seleccione el tipo de solicitud</p>
    <div class="row">
        <div class="col-sm-6">
            <label for="radioVacaciones">
            <input type="radio" name="tipo_solicitud" value="Vacaciones" {{(old('tipo_solicitud') == 'Vacaciones') ? 'checked' : ''}} id="radioVacaciones">
            Vacaciones</label>
        </div>
        <div class="col-sm-6">
            <label for="radioPermisoNoRe">
            <input type="radio" name="tipo_solicitud" value="Permiso no remunerado" {{(old('tipo_solicitud') == 'Permiso no remunerado') ? 'checked' : ''}} id="radioPermisoNoRe">
            Permiso no remunerado</label>
        </div>
        <div class="col-sm-6">
            <label for="radioPermisoCo">
            <input type="radio" name="tipo_solicitud" value="Permiso Compensado" {{(old('tipo_solicitud') == 'Permiso Compensado') ? 'checked' : ''}} id="radioPermisoCo">
            Permiso Compensado</label>
        </div>
        <div class="col-sm-6">
            <label for="radioCitaMedica">
            <input type="radio" name="tipo_solicitud" value="Cita Médica" {{(old('tipo_solicitud') == 'Cita Médica') ? 'checked' : ''}} id="radioCitaMedica">
            Cita Médica</label>
        </div>
        <div class="col-sm-6">
            <label for="radioLicenciaMaternidaPaternidad">
            <input type="radio" name="tipo_solicitud" value="Licencia de Maternidad o Paternidad" {{(old('tipo_solicitud') == 'Licencia de Maternidad o Paternidad') ? 'checked' : ''}} id="radioLicenciaMaternidaPaternidad">
            Licencia de Maternidad o Paternidad</label>
        </div>
        <div class="col-sm-6">
            <label for="radioFallecimientoFamiliar">
            <input type="radio" name="tipo_solicitud" value="Fallecimiento de Familiar" {{(old('tipo_solicitud') == 'Fallecimiento de Familiar') ? 'checked' : ''}} id="radioFallecimientoFamiliar">
            Fallecimiento de Familiar</label>
        </div>
        <div class="col-sm-6">
            <label for="radioIncapacidadMedica">
            <input type="radio" name="tipo_solicitud" value="Incapacidad médica" {{(old('tipo_solicitud') == 'Incapacidad médica') ? 'checked' : ''}} id="radioIncapacidadMedica">
            Incapacidad médica</label>
        </div>
        <div class="col-sm-6">
            <label for="radioEmergenciaPersonalFamiliar">
            <input type="radio" name="tipo_solicitud" value="Emergencia Personal o Familiar" {{(old('tipo_solicitud') == 'Emergencia Personal o Familiar') ? 'checked' : ''}} id="radioEmergenciaPersonalFamiliar">
            Emergencia Personal o Familiar</label>
        </div>
        <div class="col-sm-6">
            <label for="radioVacacionesPagas">
            <input type="radio" name="tipo_solicitud" value="Vacaciones pagadas" {{(old('tipo_solicitud') == 'Vacaciones pagadas') ? 'checked' : ''}} id="radioVacacionesPagas">Vacaciones pagadas</label>
        </div>
    </div>
</div>
<div class="form-group" style="display: none" id="type_inability">
    <hr>
    <p>Seleccione el origen de su incapacidad</p>
    <div class="row">
        <div class="col-sm-6">
            <label for="EPS">
                <input type="radio" name="tipo_incapacidad" value="EPS" {{(old('tipo_incapacidad') == 'EPS') ? 'checked' : ''}} id="EPS">
                EPS (Enfermedad general)
            </label>
        </div>
        <div class="col-sm-6">
            <label for="ARL">
                <input type="radio" name="tipo_incapacidad" value="ARL" {{(old('tipo_incapacidad') == 'ARL') ? 'checked' : ''}} id="ARL">
                ARL (Accidente Laboral)
            </label>
        </div>
    </div>
    <span id="text_required" style="display: none" class="text-red">Este campo es obligatorio</span>
</div>
<hr>
<div class="form-group">
    <label for="motivo_permiso">Motivo del permiso (Debe ser un motivo claro y cierto)</label>
    <textarea name="motivo_permiso" id="motivo_permiso" cols="30" rows="3" class="form-control">{{old('motivo_permiso')}}</textarea>
</div>
<hr>
<div class="form-group">
    <label for="file">Adjuntar documento o evidencia en caso de tenerla</label>
    <input type="file" name="file" id="file" class="form-control" value="{{old('file')}}">
</div>