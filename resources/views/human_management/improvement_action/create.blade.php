@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        D-FR-12	ACCIONES CORRECTIVAS Y DE MEJORA
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Acciones correctivas y de mejora</a></li>
        <li class="active">Crear acciones</li>
    </ol>
</section>
<div class="col-sm-4 hide" id="origen_user">
    <div class="form-group">
        <label for="user_id">Funcionario</label>
        <div class="input-group">
            <select class="form-control select2" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                <option selected disabled></option>
                @foreach ($users as $user)
                    <option data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <div class="input-group-addon">
                <i class="fa fa-trash remove-user" style="cursor: pointer"></i>
            </div>
        </div>
    </div>
</div>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Crear acción correctiva o de mejora</h3>
                <div class="box-tools">
                    <a href="{{route('improvement_action')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('improvement_action_store')}}" method="POST">
                @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{old('date') ?? now()->format('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="process">Proceso</label>
                            <input type="text" class="form-control" id="process" name="process" value="{{old('process') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="num">Acción número</label>
                            <input type="number" class="form-control" id="num" name="num" value="{{old('num')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="by">Presentada por</label>
                            <input type="text" class="form-control" id="by" name="by" value="{{old('by')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="radio" id="corrective" name="type" value="Acción correctiva">
                            <label for="corrective">Acción correctiva</label><br>
                            <input type="radio" id="better" name="type" value="Acción de mejora">
                            <label for="better">Acción de mejora</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="effect_description">Descripción del efecto, problema o riesgo identificado</label>
                    <div class="form-group">
                        <textarea class="textarea" id="effect_description" style="width: 100%;" name="effect_description"><b>Descripción:</b> </textarea>
                    </div>
                </div>
                <hr>
                <h4>Descripción de posibles causas</h4>
                <div class="form-group">
                    <label for="infraestructure">INFRAESTRUCTURA</label>
                    <input type="text" name="infraestructure" id="infraestructure" value="{{old('infraestructure')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="human_talent">TALENTO HUMANO</label>
                    <input type="text" name="human_talent" id="human_talent" value="{{old('human_talent')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="information">INFORMACIÓN</label>
                    <input type="text" name="information" id="information" value="{{old('information')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="measuring">MEDICIÓN</label>
                    <input type="text" name="measuring" id="measuring" value="{{old('measuring')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="environment">MEDIO AMBIENTE</label>
                    <input type="text" name="environment" id="environment" value="{{old('environment')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="method">MÉTODO</label>
                    <input type="text" name="method" id="method" value="{{old('method')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cause">Causa(s) principal(es)</label>
                    <input type="text" name="cause" id="cause" value="{{old('cause')}}" class="form-control">
                </div>
                <hr>
                <div id="destino_action">
                    <h4>Plan de Acción</h4>
                    <div id="origen_action" class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="action">Tarea</label>
                                <textarea class="textarea" id="action_0" style="width: 100%;" name="action[0]"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="start_date">Fecha</label>
                                        <input type="date" name="start_date_action[0]" class="form-control start_date" id="start_date_action_0">
                                    </div>
                                    <div class="col-md-6 hide">
                                        <label for="end_date">Fecha termina</label>
                                        <input type="date" name="end_date_action[0]" class="form-control end_date" id="end_date_action">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="user_action_id_0">Funcionario</label>
                                <div class="input-group">
                                    <select name="user_action_id[0][]" id="user_action_id_0" class="form-control select2 action_user_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected disabled></option>
                                        @foreach ($users as $user)
                                            <option data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-addon">
                                        <i class="fa fa-trash remove-user" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="destino_user" id="destino_user_action_0"></div>
                        <div class="col-sm-1 text-center" style="cursor: pointer;">
                            <br>
                            <span class="add_user text-info" id="add_user_action_0">
                                <i class="fa fa-plus"></i>
                                Agregar funcionario
                            </span>
                        </div>
                        <div class="col-sm-1 text-center">
                            <br>
                            <i class="fa fa-trash remove" style="cursor: pointer;" id="action_remove_0"></i>
                        </div>
                    </div>
                    <hr>
                </div>
                <button type="button" class="btn btn-sm btn-link bnt-clone" id="action_clone"><i class="fa fa-plus"></i> Agregar plan de acción</button>
                <hr>
                <div id="destino_tracing">
                    <h4>Seguimiento y Verificación del Plan de Acción</h4>
                    <div id="origen_tracing" class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="tracing">Acción</label>
                                <textarea class="textarea" id="tracing_0" style="width: 100%;" name="tracing[0]"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Fecha inicial</label>
                                        <input type="date" name="start_date_tracing[0]" class="form-control start_date" id="start_date_tracing">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Fecha termina</label>
                                        <input type="date" name="end_date_tracing[0]" class="form-control end_date" id="end_date_tracing">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="user_tracing_id_0">Funcionario</label>
                                <div class="input-group">
                                    <select name="user_tracing_id[0][]" id="user_tracing_id_0" class="form-control select2 tracing_user_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option selected disabled></option>
                                        @foreach ($users as $user)
                                            <option data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-addon">
                                        <i class="fa fa-trash remove-user" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="destino_user" id="destino_user_tracing_0"></div>
                        <div class="col-sm-1 text-center" style="cursor: pointer;">
                            <br>
                            <span class="add_user text-info" id="add_user_tracing_0">
                                <i class="fa fa-plus"></i>
                                Agregar funcionario
                            </span>
                        </div>
                        <div class="col-sm-1 text-center">
                            <br>
                            <i class="fa fa-trash remove" style="cursor: pointer;" id="tracing_remove_0"></i>
                        </div>
                        <hr>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-link bnt-clone" id="tracing_clone"><i class="fa fa-plus"></i> Agregar seguimiento o verificación</button>
                <hr>
                <h4>Evaluación de las acciones tomadas</h4>
                <hr>
                <div class="fomr-control">
                    <label for="commentary">Comentarios adicionales</label>
                    <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <hr>
            </div>
            <div class="box-footer">
                <button class="btn btn-sm btn-primary btn-send">Enviar y firmar</button>
            </div>
        </form>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <script src="{{asset("assets/$theme//bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{asset('js/forms/improvement_action.js')}}"></script>
@endsection

{{-- Varios funcionarios para una tarea e incluir solo texto para invitados o cargo --}}
{{-- Evaluación de las acciones tomadas ??? --}}
{{-- Cambiar estados --}}
{{-- Fecha de cierre --}}
{{-- Cada tarea y accion es un cuadro de texto html --}}