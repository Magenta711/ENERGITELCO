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
        <li class="active">Editar acciones</li>
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
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Editar acción correctivas o de mejora</h3>
                <div class="box-tools">
                    <a href="{{route('improvement_action')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('improvement_action_update',$id->id)}}" method="POST">
                @csrf
                @method('PUT')
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$id->date ?? now()->format('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="process">Proceso</label>
                            <input type="text" class="form-control" id="process" name="process" value="{{$id->process }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="num">Acción número</label>
                            <input type="number" class="form-control" id="num" name="num" value="{{$id->num}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="by">Presentada por</label>
                            <input type="text" class="form-control" id="by" name="by" value="{{$id->by}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="radio" id="corrective" name="type" value="Acción correctiva" {{$id->type == 'Acción correctiva' ? 'checked' : ''}}>
                            <label for="corrective">Acción correctiva</label><br>
                            <input type="radio" id="better" name="type" value="Acción de mejora" {{$id->type == 'Acción de mejora' ? 'checked' : ''}}>
                            <label for="better">Acción de mejora</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="effect_description">Descripción del efecto, problema o riesgo identificado</label>
                    <div class="form-group">
                        <textarea class="textarea" id="effect_description" style="width: 100%;" name="effect_description">{{$id->effect_description}}</textarea>
                    </div>
                </div>
                <hr>
                <h4>Descripción de posibles causas</h4>
                <div class="form-group">
                    <label for="infraestructure">INFRAESTRUCTURA</label>
                    <input type="text" name="infraestructure" id="infraestructure" value="{{$id->infraestructure}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="human_talent">TALENTO HUMANO</label>
                    <input type="text" name="human_talent" id="human_talent" value="{{$id->human_talent}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="information">INFORMACIÓN</label>
                    <input type="text" name="information" id="information" value="{{$id->information}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="measuring">MEDICIÓN</label>
                    <input type="text" name="measuring" id="measuring" value="{{$id->measuring}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="environment">MEDIO AMBIENTE</label>
                    <input type="text" name="environment" id="environment" value="{{$id->environment}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="method">MÉTODO</label>
                    <input type="text" name="method" id="method" value="{{$id->method}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cause">Causa(s) principal(es)</label>
                    <input type="text" name="cause" id="cause" value="{{$id->cause}}" class="form-control">
                </div>
                <hr>
                @php
                    $x = 0;
                @endphp
                <div id="destino_action">
                    <h4>Plan de Acción</h4>
                    @foreach ($id->details as $key => $item)
                        @if ($item->type == 'action')
                        @if ($x == 0)
                            <div id="origen_action" class="row">
                        @else
                            <div id="div_action_{{$key}}" class="row">
                        @endif
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="action">Tarea</label>
                                        <textarea class="textarea" id="action_{{$key}}" style="width: 100%;" name="action[{{$key}}]">{{$item->text}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="start_date">Fecha</label>
                                                <input type="date" name="start_date_action[{{$key}}]" class="form-control start_date" id="start_date_action_{{$key}}" value="{{$item->start_date}}">
                                            </div>
                                            <div class="col-md-6 hide">
                                                <label for="end_date">Fecha termina</label>
                                                <input type="date" name="end_date_action[{{$key}}]" class="form-control end_date" id="end_date_action_{{$key}}" value="{{$item->end_date}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($item->users as $uId => $ui)
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="user_id_{{$key}}">Funcionario</label>
                                            <div class="input-group">
                                                <select name="user_action_id[{{$key}}][]" id="user_action_id_{{$key}}_{{$uId}}" class="form-control select2 action_user_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                    <option selected disabled></option>
                                                    @foreach ($users as $user)
                                                        <option {{ $user->id == $ui->user_id ? 'selected' : '' }} data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-trash remove-user" style="cursor: pointer;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="destino_user" id="destino_user_action_{{$key}}"></div>
                                <div class="col-sm-1 text-center text-info">
                                    <br>
                                    <span class="add_user" id="add_user_action_{{$key}}" style="cursor: pointer;">
                                        <i class="fa fa-plus"></i>
                                        Agregar funcionario
                                    </span>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <br>
                                    <i class="fa fa-trash remove" id="action_remove_{{$key}}" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-link bnt-clone" id="action_clone"><i class="fa fa-plus"></i> Agregar plan de acción</button>
                <hr>
                @php
                    $x = 0;
                @endphp
                <div id="destino_tracing">
                    <h4>Seguimiento y Verificación del Plan de Acción</h4>
                    @foreach ($id->details as $key => $item)
                        @if ($item->type == 'tracing')
                        @if ($x == 0)
                            <div id="origen_tracing" class="row">
                            @php
                                $x = 1;
                            @endphp
                        @else
                        <div id="div_tracing_{{$key}}" class="row">
                        @endif
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="action">Acción</label>
                                        <textarea class="textarea" id="tracing_{{$key}}" style="width: 100%;" name="tracing[{{$key}}]">{{$item->text}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Fecha inicial</label>
                                                <input type="date" name="start_date_tracing[{{$key}}]" class="form-control start_date" id="start_date_tracing_{{$key}}" value="{{$item->start_date}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Fecha termina</label>
                                                <input type="date" name="end_date_tracing[{{$key}}]" class="form-control end_date" id="end_date_tracing_{{$key}}" value="{{$item->end_date}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @foreach ($item->users as $uId => $ui)
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="user_id_{{$key}}">Funcionario</label>
                                                <div class="input-group">
                                                    <select name="user_tracing_id[{{$key}}][]" id="user_tracing_id_{{$key}}_{{$uId}}" class="form-control select2 tracing_user_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                        <option selected disabled></option>
                                                        @foreach ($users as $user)
                                                            <option {{ $user->id == $ui->user_id ? 'selected' : '' }} data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-trash remove-user" style="cursor: pointer"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                <div class="destino_user" id="destino_user_tracing_{{$key}}"></div>
                                <div class="col-sm-1 text-center text-info">
                                    <br>
                                    <span class="add_user" id="add_user_tracing_{{$key}}" style="cursor: pointer;">
                                        <i class="fa fa-plus"></i>
                                        Agregar funcionario
                                    </span>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <br>
                                    <i class="fa fa-trash remove" id="tracing_remove_{{$key}}" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-link bnt-clone" id="tracing_clone"><i class="fa fa-plus"></i> Agregar seguimiento o verificación</button>
                <hr>
                <div class="fomr-control">
                    <label for="commentary">Comentarios</label>
                    <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{$id->commentary}}</textarea>
                </div>
                <hr>
                <h4>Evaluación de las acciones tomadas</h4>
            </div>
            <div class="box-footer">
                <button class="btn btn-sm btn-primary btn-send">Enviar y firmar</button>
            </div>
        </form>
        </div>
    </section>
@endsection

@section('css')
{{-- wysihtml5-supported --}}
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <script src="{{asset("assets/$theme//bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{asset('js/forms/improvement_action.js')}}"></script>
@endsection