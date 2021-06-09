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
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Crear acta</h3>
                <div class="box-tools">
                    <a href="{{route('proceeding')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('improvement_action_store')}}" method="POST">
                @csrf
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
                        <input type="hidden" name="_wysihtml5_mode" value="1">
                        <iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="width: 100%;"></iframe>
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
                <div id="destino_action">
                    <h4>Plan de Acción</h4>
                    @foreach ($id->details as $key => $item)
                        @if ($item->type == 'action')
                            <div id="origer_action" class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="homework">Tarea</label>
                                        <input type="text" name="homework[]" value="{{$item->text}}" class="form-control homework" id="homework">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="start_date">Fecha inicial</label>
                                                <input type="date" name="start_date_action[]" class="form-control start_date" id="start_date" value="{{$item->start_date}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="end_date">Fecha termina</label>
                                                <input type="date" name="end_date_action[]" class="form-control end_date" id="end_date" value="{{$item->end_date}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($item->users as $ui)
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="user_id_0">Funcionario</label>
                                            <select name="user_action_id[]" id="user_id_0" class="form-control action_user_id">
                                                <option selected disabled></option>
                                                @foreach ($users as $user)
                                                    <option {{ $user->id == $ui->user_id ? 'selected' : '' }} value="{{$user->id}}">{{$user->cedula}} - {{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-sm-1 text-center text-info">
                                    <br>
                                    <span class="add_user" id="tracing_add_user_0" style="cursor: pointer;">
                                        <i class="fa fa-plus"></i>
                                        Agregar funcionario
                                    </span>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <br>
                                    <i class="fa fa-trash remove" id="action_remove_0" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-link bnt-clone-action" id="action_clone"><i class="fa fa-plus"></i> Agregar plan de acción</button>
                <hr>
                <div id="destino_tracing">
                    <h4>Seguimiento y Verificación del Plan de Acción</h4>
                    @foreach ($id->details as $key => $item)
                        @if ($item->type == 'tracing')
                            <div id="origer_tracing" class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="action">Acción</label>
                                        <input type="text" name="action[]" class="form-control action" id="action" value="{{$item->text}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Fecha inicial</label>
                                                <input type="date" name="start_date_tracing[]" class="form-control start_date" id="start_date" value="{{$item->start_date}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Fecha termina</label>
                                                <input type="date" name="end_date_tracing[]" class="form-control end_date" id="end_date" value="{{$item->end_date}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($item->users as $ui)
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="user_id_0">Funcionario</label>
                                            <select name="user_tracing_id[]" id="user_id_0" class="form-control tracing_user_id">
                                                <option selected disabled></option>
                                                @foreach ($users as $user)
                                                    <option {{ $user->id == $ui->user_id ? 'selected' : '' }} value="{{$user->id}}">{{$user->cedula}} - {{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-sm-1 text-center text-info">
                                    <br>
                                    <span class="add_user" id="tracing_add_user_0" style="cursor: pointer;">
                                        <i class="fa fa-plus"></i>
                                        Agregar funcionario
                                    </span>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <br>
                                    <i class="fa fa-trash remove" id="tracing_remove_0" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-link bnt-clone-tracing" id="tracing_clone"><i class="fa fa-plus"></i> Agregar seguimiento o verificación</button>
                <hr>
                <div class="fomr-control">
                    <label for="commentary">Comentarios</label>
                    <textarea name="commentary" id="commentary" cols="30" rows="10" class="form-control"></textarea>
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
@endsection

@section('js')
    <script src="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <script src="{{asset('js/forms/improvement_action.js')}}"></script>
@endsection