{{-- Usuarios --}}
@foreach ($usuarios as $usuario)
<input type="hidden" disabled value="{{$usuario->name}}" id="name{{$usuario->id}}">
<input type="hidden" disabled value="{{$usuario->position->name}}" id="cargo{{$usuario->id}}">
@endforeach
{{-- User 1 --}}
<h4>Funcionario revisor</h4>
<div class="form-group row">
    <div class="col-sm-4">
        <label for="cedula1">Número de documento</label>
        <select onchange="infoUser(this)" name="cedula_revisor" id="cedula1" class="form-control selectCedula">
            <option value="" readonly selected></option>
            @foreach ($usuarios as $usuario)
                <option {{ (old('cedula_revisor') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!} </option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-4">
        <label for="nombre1">Nombre completo funcionario</label>
        <input type="text" readonly name="name1" value="{{ old('name1') }}" class="form-control controlName" id="nombre1" placeholder="Nombre" >
    </div>
    <div class="col-sm-4">
        <label for="rol1">Rol autorizado</label>
        <input type="text" readonly name="rol1" value="{{ old('rol1') }}" class="form-control controlRol" id="rol1" placeholder="Rol">
    </div>
</div>
<hr>
<h4>Funcionario revisado</h4>
<div class="form-group row">
    <div class="col-sm-4">
        <label for="cedula2">Número de documento</label>
        <select onchange="infoUser(this)" name="cedula_revisado" id="cedula2" class="form-control selectCedula">
            <option value="" readonly selected></option>
            @foreach ($usuarios as $usuario)
                <option {{ (old('cedula_revisado') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!} </option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-4">
        <label for="nombre2">Nombre completo funcionario</label>
        <input type="text" readonly name="name2" value="{{ old('name2') }}" class="form-control controlName" id="nombre2" placeholder="Nombre" >
    </div>
    <div class="col-sm-4">
        <label for="rol2">Rol autorizado</label>
        <input type="text" readonly name="rol2" value="{{ old('rol2') }}" class="form-control controlRol" id="rol2" placeholder="Rol">
    </div>
</div>
<hr>
<?php $i = 0;?>
<h5>Herramientas asignadas</h5>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Brújula (GPS)</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_1')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_1')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_1')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Multímetro digital</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_2')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_2')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_2')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Cables USB 2.0 o ETHERNET</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_3')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_3')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_3')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Llaves para tableros de BTS, ZTE, HUAWEI</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_4')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_4')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_4')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Ponchadora BNC</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_5')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_5')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_5')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Ponchadora RJ45</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_6')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_6')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_6')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Juego de llaves TORX</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_7')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_7')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_7')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Juego de llaves hexágonas</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_8')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_8')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_8')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Cortafrío</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_9')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_9')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_9')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Pinza</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_10')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_10')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_10')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Bisturí</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_11')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_11')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_11')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Cautín</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_12')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_12')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_12')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Juego de destornilladores de pala y estrella</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_13')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_13')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_13')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Destornillador perillero de pala y estrella</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_14')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_14')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_14')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Alicate</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_15')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_15')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_15')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Mango de sierra</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_16')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_16')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_16')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Juego de llaves combinadas</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_17')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_17')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_17')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Llave de expansión pequeña</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_18')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_18')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_18')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Llave de expansión grande 12 pulgadas</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_19')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_19')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_19')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Unión BNC-BNC super importante</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_20')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_20')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_20')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Led de prueba super importante</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">*</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_21')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">*</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_21')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">*</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_21')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Extensión eléctrica</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_22')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_22')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_22')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Martillo</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_23')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_23')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_23')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Tijera de corte especial</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_24')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_24')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_24')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Cortafrío pequeño</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_25')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_25')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_25')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Taladro</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_26')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_26')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_26')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Juego de brocas de lámina</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_27')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_27')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_27')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Broca de muro</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_28')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_28')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_28')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> PC con PTO ETH y los SW para MW, BTS y POWER</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_29')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4">
        <label for="marca_{{$i}}">Marca</label>
        <select name="marca_29" id="marca_29" class="form-control">
            <option selected disabled></option>
            @foreach ($computers as $item)
                <option {{old('marca_29')}} value="{{$item->id}}">{{$item->id}} - {{$item->serial}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_29')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Bolso para portar PC</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_30')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_30')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_30')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Smartphone con app Energitelco. puede ser personal</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_31')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_31')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_31')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Marquilladora con cinta dimo</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_32')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_32')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_32')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Bolso para arnés</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_33')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_33')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_33')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Vehículo o moto</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_34')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_34')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_34')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Llaves de ingreso a sede Energitelco</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_35')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_35')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_35')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Silla</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_36')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_36')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_36')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Escritorio</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_37')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_37')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_37')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Arnés</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad<span class="text-danger">**</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_38')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca<span class="text-danger">**</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_38')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones<span class="text-danger">**</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_38')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Casco</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad<span class="text-danger">**</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_39')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca<span class="text-danger">**</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_39')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones<span class="text-danger">**</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_39')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Barbuquejo</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">**</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_40')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">**</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_40')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">**</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_40')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Gafas de seguridad</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">**</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_41')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">**</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_41')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">**</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_41')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Eslinga en Y</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">**</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_42')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">**</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_42')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">**</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_42')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Eslinga de posicionamiento</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">**</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_43')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">**</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_43')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">**</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_43')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Mosquetón</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">**</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_44')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">**</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_44')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">**</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_44')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Freno para guaya de 10 mm</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad <span class="text-danger">**</span></label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_45')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca <span class="text-danger">**</span></label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_45')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones <span class="text-danger">**</span></label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_45')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Equipo de protección caídas para moto</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_46')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_46')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_46')}}</textarea></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-2 col-sm-4 mb-3"><Strong>Ítem {{++$i}}</Strong><br> Impermeable para moto</div>
    <div class="col-md-2 col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_47')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-md-3 col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_47')}}" class="form-control"></div>
    <div class="col-md-5 col-sm-12 mb-1"><label for="observacion_{{$i}}">Observaciones</label><textarea name="observacion_{{$i}}" id="observacion_{{$i}}" cols="30" rows="2" class="form-control">{{old('observacion_47')}}</textarea></div>
</div>
