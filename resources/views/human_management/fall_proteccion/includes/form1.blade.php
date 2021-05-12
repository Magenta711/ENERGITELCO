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
            @foreach ($usuarios as $usuario)
                <input type="hidden" disabled value="{{$usuario->name}}" id="name{{$usuario->id}}">
                <input type="hidden" disabled value="{{$usuario->position->name}}" id="cargo{{$usuario->id}}">
            @endforeach
            {{-- User 1 --}}
            <h4>Trabajador</h4>
            <div class="form-group row">
                
                <div class="col-md-4">
                    <label for="">Número de documento</label>
                    <select onchange="infoUser(this)" name="cedula_trabajador" id="cedula0" class="form-control selectCedula">
                        <option value="" disabled selected></option>
                        @foreach ($usuarios as $usuario)
                            <option {{ (old('cedula_trabajador') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Nombre completo funcionario</label>
                    <input type="text" disabled name="name[]" value="{{ old('name[]') }}" class="form-control controlName" id="nombre0" placeholder="Nombre" >
                </div>
                <div class="col-md-4">
                    <label for="">Rol autorizado</label>
                    <input type="text" disabled name="rol[]" value="{{ old('rol[]') }}" class="form-control controlRol" id="rol0" placeholder="Rol">
                </div>
            </div>
            <hr>
            <h4>Responsable de la inspección</h4>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="cedula1">Número de documento</label>
                    <select onchange="infoUser(this)" name="cedula_responsable" id="cedula1" class="form-control selectCedula">
                        <option value="" disabled selected></option>
                        @foreach ($usuarios as $usuario)
                            <option {{ (old('cedula_responsable') == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="nombre1">Nombre completo funcionario</label>
                    <input type="text" disabled name="name[]" value="{{ old('name[]') }}" class="form-control controlName" id="nombre1" placeholder="Nombre" >
                </div>
                <div class="col-md-4">
                    <label for="rol1">Rol autorizado</label>
                    <input type="text" disabled name="rol[]" value="{{ old('rol[]') }}" class="form-control controlRol" id="rol1" placeholder="Rol">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="fecha_inspeccion">Fecha de inspección</label>
                <input type="date" name="fecha_inspeccion" id="fecha_inspeccion" class="form-control">
            </div>
        </div>
    </div>
</div>