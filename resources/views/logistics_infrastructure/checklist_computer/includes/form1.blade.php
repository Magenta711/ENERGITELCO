<div class="panel box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Información general
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
        <div class="box-body">
            {{-- Usuarios --}}
            @foreach ($usuarios as $usuario)
            <input type="hidden" disabled value="{{$usuario->name}}" id="name{{$usuario->id}}">
            <input type="hidden" disabled value="{{$usuario->position->name}}" id="cargo{{$usuario->id}}">
            @endforeach
            <div class="form-group row">
                <div class="col-md-8 col-sm-8">
                    <label for="computer_id">Id, Serial o Responsable</label>
                    <select name="computer_id" id="computer_id" class="form-control">
                        <option selected disabled></option>
                        @foreach ($computers as $item)
                            <option {{old('computer_id') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->id}} - {{$item->serial}} - {{ $item->user ? $item->user->name : ''}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="col-md-8 col-sm-8">
                    <label for="responsable_equipo">Responsable del equipo</label>
                    <input type="text" name="responsable_equipo" value="{{old('responsable_equipo')}}" id="responsable_equipo" class="form-control">
                </div> --}}
                <div class="col-md-4 col-sm-4">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" value="{{old('fecha')}}" id="fecha" class="form-control">
                </div>
            {{-- </div>
            <div class="form-group row">
                
                <div class="col-md-4 col-sm-4">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" value="{{old('marca')}}" id="marca" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" value="{{old('modelo')}}" id="modelo" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="serial">Serial</label>
                    <input type="text" name="serial" value="{{old('serial')}}" id="serial" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label for="procesador">Procesador</label>
                    <input type="text" name="procesador" value="{{old('procesador')}}" id="procesador" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="disco_duro">Disco duro</label>
                    <input type="text" name="disco_duro" value="{{old('disco_duro')}}" id="disco_duro" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="memoria_ram">Memoria RAM</label>
                    <input type="text" name="memoria_ram" value="{{old('memoria_ram')}}" id="memoria_ram" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label for="sistema_operativo">Sistema operativo</label>
                    <input type="text" name="sistema_operativo" value="{{old('sistema_operativo')}}" id="sistema_operativo" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="software_instalado">Software instalado</label>
                    <input type="text" name="software_instalado" value="{{old('software_instalado')}}" id="software_instalado" class="form-control">
                </div>
                <div class="col-md-4 col-sm-4">
                    <label for="tipo_licencia">Tipo de licencia</label>
                    <input type="text" name="tipo_licencia" value="{{old('tipo_licencia')}}" id="tipo_licencia" class="form-control">
                </div> --}}
            </div>
            <hr>
            {{-- User 1 --}}
            <h4>Técnico asignado para el mantenimiento</h4>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="cedula1">Número de documento</label>
                    <select onchange="infoUser(this)" name="cedula_tecnico" id="cedula1" class="form-control selectCedula">
                        <option value="" readonly selected></option>
                        @foreach ($usuarios as $usuario)
                            <option {{ (old('cedula_tecnico') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!} </option>
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
            <div class="form-group">
                <h5><label for="diagonostico_inicial">Diagnostico inicial del computador</label></h5>
                <textarea name="diagonostico_inicial" id="diagonostico_inicial" cols="30" rows="3" class="form-control">{{old('diagonostico_inicial')}}</textarea>
            </div>
        </div>
    </div>
</div>