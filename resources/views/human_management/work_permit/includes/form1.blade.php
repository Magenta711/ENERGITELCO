<div class="panel box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                1. Información general del trabajo
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
        <div class="box-body">
            <small><b>RELACIÓN DE PERSONAL A INTERVENIR EN LA ESTACIÓN BASE Y ROL AUTORIZADO.</b> (Cada uno sólo podrá    ejecutar el rol autorizado)</small>
            @foreach ($usuarios as $usuario)
                <input type="hidden" disabled value="{{$usuario->name}}" id="name_{{$usuario->id}}">
                <input type="hidden" disabled value="{{$usuario->position->name}}" id="position_{{$usuario->id}}">
            @endforeach
            {{-- User 1 --}}
            <div id="destino">
                @if (old('cedula') > 0)
                    @for ($i = 0; $i < count(old('cedula')); $i++)
                        <div id='origen' class="origen">
                            <div class="row" id="div_user_{{$i}}">
                                <div class="col-sm-3">
                                    <label for="users_id_{{$i}}">Número de documento</label>
                                    <select name="cedula[]" id="users_id_{{$i}}" class="form-control select_user">
                                        <option value="" disabled selected></option>
                                        @foreach ($usuarios as $usuario)
                                            <option {{ (old('cedula')[$i] == $usuario->id) ? 'selected' : '' }} value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="user_name_{{$i}}">Nombre completo funcionario</label>
                                    <input type="text" readonly name="name[]" value="{{ old('name')[$i] }}" class="form-control user_name" id="user_name_{{$i}}" placeholder="Nombre" >
                                </div>
                                <div class="col-sm-4">
                                    <label for="user_rol_{{$i}}">Rol autorizado</label>
                                    <input type="text" readonly name="rol[]" value="{{ old('rol')[$i] }}" class="form-control user_rol" id="user_rol_{{$i}}" placeholder="Rol">
                                </div>
                                <div class="col-sm-1 text-right">
                                    <br>
                                    <span style="cursor: pointer" id="remove_user_{{$i}}" class="remove_user">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endfor
                @else
                    <div id='origen' class="origen">
                        <div class="row" id="div_user_0">
                            <div class="col-sm-3">
                                <label for="users_id_0">Número de documento</label>
                                <select name="cedula[]" id="users_id_0" class="form-control select_user">
                                    <option value="" disabled selected></option>
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="user_name_0">Nombre completo funcionario</label>
                                <input type="text" readonly name="name[]" value="" class="form-control user_name" id="user_name_0" placeholder="Nombre" >
                            </div>
                            <div class="col-sm-4">
                                <label for="user_rol_0">Rol autorizado</label>
                                <input type="text" readonly name="rol[]" value="" class="form-control user_rol" id="user_rol_0" placeholder="Rol">
                            </div>
                            <div class="col-sm-1 text-right">
                                <br>
                                <span style="cursor: pointer" id="remove_user_0" class="remove_user">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <button type="button" id="clonar_user" class="btn btn-sm btn-link">
                <i class="fa fa-plus"></i> Agregar usuario
            </button>
            <hr>
            {{-- EndUsers --}}
            {{-- Additional Information --}}
            <div class="form-group">
                <label for="nombre_eb">Nombre de la EB donde se va trabajar</label>
                    <input type="text" class="form-control" id="nombre_eb" placeholder="Nombre de la EB" name="nombre_eb" value="{{ old('nombre_eb')}}">
            </div>
            <div class="form-group">
                <label for="altura">Altura aprox. a la cual se realizará la actividad</label>
                <input type="text" class="form-control" id="altura" placeholder="Altura" name="altura" value="{{ old('altura')}}">
            </div>
            <div class="form-group">
                ¿La actividad a realizar es a una altura superior a los 1.5 metros de altura?
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('max_altura') == 'Si') ? 'checked' : '' }} name="max_altura" id="max_altura1" value="Si">
                    <label class="form-check-label" for="max_altura1">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('max_altura') == 'No') ? 'checked' : '' }} name="max_altura" id="max_altura2" value="No">
                    <label class="form-check-label" for="max_altura2">
                        No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="placa">Placa del vehículo en el cual se moviliza</label>
                @if (count($vehicles))
                <div class="row">
                    <div class="col-xs-6">
                        <select name="vehicle_id" id="vehicle_id" class="form-control">
                            <option selected disabled>Seleccione la placa del vehículo</option>
                            @foreach ($vehicles as $item)
                                <option {{ old('vehicle_id') == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->plate}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="placa" placeholder="Digite la placa si no está registrada" name="placa_vehiculo" value="{{ old('placa_vehiculo')}}">
                    </div>
                </div>
                @else
                    <input type="text" class="form-control" id="placa" placeholder="Placa del vehículo" name="placa_vehiculo" value="{{ old('placa_vehiculo')}}">
                @endif
            </div>
            <div class="form-group">
                Estado
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estado_vehiculo" {{ (old('estado_vehiculo') == 'Bien') ? 'checked' : '' }} id="OK" value="Bien">
                    <label class="form-check-label" for="OK">
                        Bien
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estado_vehiculo" {{ (old('estado_vehiculo') == 'No Bien') ? 'checked' : '' }} id="no_OK" value="No bien">
                    <label class="form-check-label" for="no_OK">
                        No bien
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="por_que_estado_vehiculo">¿Por qué?</label>
                <input type="text" class="form-control" id="por_que_estado_vehiculo" placeholder="¿Por qué?" value="{{old('por_que_estado_vehiculo')}}" name="por_que_estado_vehiculo">
            </div>
            <div class="form-group">
                <label for="porcentaje_trabajo_presentado">Porcentaje de trabajo ejecutado</label>
                <input type="text" class="form-control" id="porcentaje_trabajo_presentado" placeholder="Porcentaje trabajo ejecutado" name="porcentaje_trabajo_presentado"  value="{{ old('porcentaje_trabajo_presentado')}}">
            </div>
            <div class="form-group">
                <label for="numero_dias_proyecto">Número de días en ese proyecto</label>
                <input type="text" class="form-control" id="numero_dias_proyecto" placeholder="Número de días" name="numero_dias_proyecto" value="{{ old('numero_dias_proyecto')}}">
            </div>
            <div class="form-group">
                Requiere caja menor
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('requiere_caja_menor') == 'Si') ? 'checked' : '' }} name="requiere_caja_menor" id="requiere_caja_menor_1" value="Si">
                    <label class="form-check-label" for="requiere_caja_menor_1">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('requiere_caja_menor') == 'No') ? 'checked' : '' }} name="requiere_caja_menor" id="requiere_caja_menor_2" value="No">
                    <label class="form-check-label" for="requiere_caja_menor_2">
                        No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="Justificación_caja_menor">Justificación de caja menor</label>
                <input type="text" class="form-control" id="Justificación_caja_menor" placeholder="Justificacion de caja menor" name="Justificación_caja_menor" value="{{ old('Justificación_caja_menor') }}">
            </div>
            <div class="form-group">
                <label for="pendientes_consumible">Pendientes de consumibles</label>
                <input type="text" class="form-control" id="pendientes_consumible" placeholder="Pendientes de consumibles" name="pendientes_consumible" value="{{old('pendientes_consumible')}}">
            </div>
            <div class="form-group">
                <label for="negligencias_coordinador"> Negligencias coordinador de su coordinador</label>
                <input type="text" class="form-control" id="negligencias_coordinador" placeholder="Negligencias de su coordinador" name="negligencias_coordinador" value="{{old('negligencias_coordinador')}}">
            </div>
            <div class="form-group">
                ¿El día de hoy se desplaza en vehículo o moto de la empresa?
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('vehiculo_desplazamiento') == 'Carro') ? 'checked' : '' }} name="vehiculo_desplazamiento" id="Vehiculo_Carro" value="Carro">
                    <label class="form-check-label" for="Vehiculo_Carro">
                        Carro
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('vehiculo_desplazamiento') == 'Moto') ? 'checked' : '' }} name="vehiculo_desplazamiento" id="Vehiculo_Moto" value="Moto">
                    <label class="form-check-label" for="Vehiculo_Moto">
                        Moto
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('vehiculo_desplazamiento') == 'No') ? 'checked' : '' }} name="vehiculo_desplazamiento" id="vehiculo_no" value="No">
                    <label class="form-check-label" for="vehiculo_no">
                        No
                    </label>
                </div>
            </div>
            <div class="form-group">
                ¿Estás trabajando o manipulando equipos Energizados?
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('equipos_energizados') == 'Si') ? 'checked' : '' }} name="equipos_energizados" id="equipos_energizados1" value="Si">
                    <label class="form-check-label" for="equipos_energizados1">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" {{(old('equipos_energizados') == 'No') ? 'checked' : '' }} name="equipos_energizados" id="equipos_energizados2" value="No">
                    <label class="form-check-label" for="equipos_energizados2">
                        No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="project_id">Relacione el proyecto</label>
                <select name="project_id" id="project_id" class="form-control">
                    <option selected></option>
                    @foreach ($projects as $project)
                        @if ($project->state != 'Terminado')
                            <option {{ old('project_id') == $project->id ? 'selected' : ''}} value="{{$project->id}}">{{$project->id}} {{$project->project_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div> 
    </div>
</div>