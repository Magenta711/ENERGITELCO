{{-- Usuarios --}}
@foreach ($usuarios as $usuario)
    <input type="hidden" disabled value="{{$usuario->name}}" id="name{{$usuario->id}}">
    <input type="hidden" disabled value="{{$usuario->position->name}}" id="cargo{{$usuario->id}}">
@endforeach
{{-- User 1 --}}
<h4>Empleado</h4>
<div class="form-group row">
    <div class="col-sm-4">
        <label for="cedula1">Número de documento</label>
        <select onchange="infoUser(this)" name="cedula_empleado" id="cedula1" class="form-control selectCedula">
            <option value="" readonly selected></option>
            @foreach ($usuarios as $usuario)
                <option {{ (old('cedula_empleado') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!} </option>
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
<P>Por medio de la presente Energitelco S.A.S., deja constancia de la entrega de los siguientes elementos de dotación personal</P>
<hr>
<?php $i = 0;?>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Overol cuerpo entero Energitelco</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_1')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_1')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Botas dieléctricas</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_2')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_2')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Guantes tipo ingeniero</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_3')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_3')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Tapabocas</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_4')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_4')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Chaqueta Energitelco</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_5')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_5')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Camiseta Energitelco</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_6')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_6')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Pantalón Energitelco</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_7')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_7')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Protector auditivo</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_8')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_8')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Gafas o careta para protección visual</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_9')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_9')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Casco para moto certificadocon placa</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_10')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_10')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Chaleco reflectivo</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_11')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_11')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Impermeable</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_12')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_12')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Motocicleta</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_13')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_13')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Protectores de rodillas y codos</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_14')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_14')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Manos libres para conducir vehículos</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_15')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_15')}}" class="form-control"></div>
</div>
<hr>
<div class="form-group row">
    <div class="col-sm-4 mb-2"><Strong>Ítem {{++$i}}</Strong><br> Guantes de caucho</div>
    <div class="col-sm-4"><label for="cantidad_{{$i}}">Cantidad</label><input type="number" name="cantidad_{{$i}}" value="{{old('cantidad_16')}}" id="cantidad_{{$i}}" class="form-control"></div>
    <div class="col-sm-4"><label for="marca_{{$i}}">Marca</label><input type="text" name="marca_{{$i}}" id="marca_{{$i}}" value="{{old('marca_16')}}" class="form-control"></div>
</div>
<hr>
El buen estado de la dotación asignada, es responsabilidad de la persona a cargo. La devolución de esta dotación debe hacerse al momento de la terminación del contrato laboral o antes si la Gerencia lo solicita.