@foreach ($usuarios as $usuario)
<input type="hidden" disabled value="{{$usuario->name}}" id="name{{$usuario->id}}">
<input type="hidden" disabled value="{{$usuario->position->name}}" id="cargo{{$usuario->id}}">
@endforeach

{{-- Campos de recursos de kits --}}
@foreach ($kits as $kit)
    <input type="hidden" value="{{$kit->token}}" id="kit_token_{{$kit->id}}" class="kit-token-{{$kit->token}}">
    <input type="hidden" value="{{$kit->id}}" id="kit_id_{{$kit->id}}" class="kit-id-{{$kit->token}}">
    <input type="hidden" value="{{$kit->nombre}}" id="kit_nombre_{{$kit->id}}" class="kit-nombres-{{$kit->token}}">

    {{-- Herramientas del kit --}}
    @foreach ($kit->tools as $tool)
        <input type="hidden" value="{{$tool->nombre}}" id="tool_nombre_{{$tool->id}}" class="tool-nombre-{{$kit->id}}">
        <input type="hidden" value="{{$tool->cantidad}}" id="tool_cantidad_{{$tool->id}}" class="tool-cantidad-{{$kit->id}}">
        <input type="hidden" value="{{$tool->marca}}" id="tool_marca_{{$tool->id}}" class="tool-marca-{{$kit->id}}">
        <input type="hidden" value="{{$tool->Observaciones}}" id="tool_Observaciones_{{$tool->id}}" class="tool-Observaciones-{{$kit->id}}">
    @endforeach
@endforeach

<h4>Asignado:</h4>
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
<h4>Asignar kits</h4>
<div class="form-group row">
    <div class="col-sm-4">
       <label for="namekit">Kit</label>
       @php
           $tokens = [];
       @endphp
       <select name="name_kit" id="namekit" class="form-control selectorkits">
            <option value=""></option>
            @foreach ($kits as $kit)
                @if ( !in_array( $kit->token, $tokens ) )
                    <option {{ old('name_kit') == $kit->token ? 'selected' : ''}} value="{{$kit->token}}">{{$kit->nombre_original}}</option>
                    @php
                        array_push($tokens,$kit->token)
                    @endphp
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-sm-4">
        <label for="unique_kit">Disponible</label>
        <select name="unique_kit" id="unique_kit" class="form-control selectorkits" disabled>
            <option value=""></option>
        </select>
    </div>
</div>
<hr>

<div id="implementos_obligatorios" style="display: none">
    <h4>Implementos obligatorios</h4>
    <div id="implementos_obligatorios_child"></div>
</div>

<h4>Implementos extras para el Kit:</h4>

<div id="list_tools">
    @if (old('item'))
        
        @for ($i = 1; $i <= count(old('item')); $i++)
            <div class="form-group row">
                <div class="col-md-2 col-sm-4 mb-3">
                    <Strong>Implemento {{$i}}</Strong><br>
                    <input type="text" name="item[{{$i}}]" id="item_{{$i}}" value="{{ old('item')[$i] }}" class="form-control tools_name" required >
                </div>
                <div class="col-md-2 col-sm-4">
                    <label for="amount">Cantidad</label>
                    
                    <input type="text" name="amount[{{$i}}]" id="amount_{{$i}}" value="{{ old('amount')[$i] }}" class="form-control tools_amount" required>
                </div>
                <div class="col-md-3 col-sm-4">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca[{{$i}}]" id="marca_{{$i}}" value="{{ old('marca')[$i] }}" class="form-control tools_branch">
                </div>
                <div class="col-md-5 col-sm-12 mb-1">
                    <label for="observacion">Observaciones</label>
                    <input type="text" name="observacion[{{$i}}]" id="observacion_{{$i}}" value="{{ old('observacion')[$i] }}" class="form-control tools_observation">
                </div>
            </div>
            <hr>
        @endfor
    @endif
</div>

<div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-sm btn-info " id="btn_plus_tools"><i class="fa fa-plus"></i> Agregar</button>
    <button type="button" class="btn btn-sm btn-danger" id="btn_minus_tools"><i class="fa fa-minus"></i> Eliminar</button>
</div>