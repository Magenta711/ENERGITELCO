<div class="panel box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Información general
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
        <div class="box-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="placa_vehiculo">Placa de vehículo</label>
                    @if (count($vehicles))
                        <select name="vehicle_id" id="vehicle_id" class="form-control">
                            <option selected disabled></option>
                            @foreach ($vehicles as $item)
                                <option {{ old('vehicle_id') == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->plate}}</option>
                            @endforeach
                        </select>
                    @else
                    <input type="text" name="placa_vehiculo" value="{{old('placa_vehiculo')}}" id="placa_vehiculo" class="form-control">
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" value="{{old('fecha')}}" id="fecha" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" value="{{old('ciudad')}}" id="ciudad" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="kilometraje">Kilometraje</label>
                    <input type="text" name="kilometraje" value="{{old('kilometraje')}}" id="kilometraje" class="form-control">
                </div>
            </div>
            {{-- Usuarios --}}
            @foreach ($usuarios as $usuario)
                <input type="hidden" disabled value="{{$usuario->name}}" id="name{{$usuario->id}}">
                <input type="hidden" disabled value="{{$usuario->position->name}}" id="cargo{{$usuario->id}}">
            @endforeach
            {{-- User 1 --}}
            <div class="form-group">
                <label for="conduto">Nombre del conductor</label>
                <input type="text" name="condutor" value="{{old('condutor')}}" id="condutor" class="form-control">
            </div>
            <hr>
            <h4>Responsable (Quien realiza la inspección)</h4>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="cedula1">Número de documento</label>
                    <select onchange="infoUser(this)" name="cedula_responsable" id="cedula1" class="form-control selectCedula">
                        <option value="" disabled selected></option>
                        @foreach ($usuarios as $usuario)
                            <option {{ (old('cedula_responsable') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="nombre1">Nombre completo funcionario</label>
                    <input type="text" disabled name="name" value="{{ old('name') }}" class="form-control controlName" id="nombre1" placeholder="Nombre" >
                </div>
                <div class="col-md-4">
                    <label for="rol1">Rol autorizado</label>
                    <input type="text" disabled name="rol" value="{{ old('rol') }}" class="form-control controlRol" id="rol1" placeholder="Rol">
                </div>
            </div>
        </div>
    </div>
</div>