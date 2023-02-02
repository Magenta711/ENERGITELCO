@foreach ($usuarios as $usuario)
<input type="hidden" disabled value="{{$usuario->name}}" id="name{{$usuario->id}}">
<input type="hidden" disabled value="{{$usuario->position->name}}" id="cargo{{$usuario->id}}">
@endforeach

<h4>Encargado</h4>
<div class="form-group row">
    <div class="col-sm-4">
        <label for="cedula1">Número de documento</label>
        <select onchange="infoUser(this)" name="responsable_id" id="cedula1" class="form-control selectCedula">
            <option value="" readonly selected></option>
            @foreach ($usuarios as $usuario)
                <option {{ (old('responsable_id') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!} </option>
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
<div class="form-group row">
    <div class="col-sm-4">
       <label for="namekit">Nombre del nuevo Kit</label>
       <input type="text" name="nombre" value="{{old('nombre')}}" id="namekit" class="form-control">
    </div>
    <div class="col-sm-4">
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" value="{{old('cantidad')}}" id="cantidad" class="form-control" >
    </div>
    <div class="col-sm-4">
        <label for="amount_tools">Catidad de herramientas</label>
        <input type="number" name="amount_tools" id="amount_tools" class="form-control">
    </div>
</div>
<hr>



<h4>Implementos obligatorios para el Kit:</h4>

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
 
</div>
<div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-sm btn-info " id="btn_plus_tools"><i class="fa fa-plus"></i> Agregar</button>
    <button type="button" class="btn btn-sm btn-danger" id="btn_minus_tools"><i class="fa fa-minus"></i> Eliminar</button>
</div>
