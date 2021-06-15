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
        <li class="active">Ver acciones</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ver acción de correctiva o de mejora</h3>
                <div class="box-tools">
                    <a href="{{route('improvement_action')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <p>{{$id->date}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="process">Proceso</label>
                            <p>{{$id->process }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="num">Acción número</label>
                            <p>{{$id->num}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="by">Presentada por</label>
                            <p>{{$id->by}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <p>
                                {{$id->type == 'Acción correctiva' ? 'Acción correctiva' : ''}}
                                {{$id->type == 'Acción de mejora' ? 'Acción de mejora' : ''}}
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="effect_description">Descripción del efecto, problema o riesgo identificado</label>
                    <div class="form-group">
                        {!!$id->effect_description!!}
                    </div>
                </div>
                <hr>
                <h4>Descripción de posibles causas</h4>
                <div class="form-group">
                    <label for="infraestructure">INFRAESTRUCTURA</label>
                    <p>{{$id->infraestructure}}</p>
                </div>
                <div class="form-group">
                    <label for="human_talent">TALENTO HUMANO</label>
                    <p>{{$id->human_talent}}</p>
                </div>
                <div class="form-group">
                    <label for="information">INFORMACIÓN</label>
                    <p>{{$id->information}}</p>
                </div>
                <div class="form-group">
                    <label for="measuring">MEDICIÓN</label>
                    <p>{{$id->measuring}}</p>
                </div>
                <div class="form-group">
                    <label for="environment">MEDIO AMBIENTE</label>
                    <p>{{$id->environment}}</p>
                </div>
                <div class="form-group">
                    <label for="method">MÉTODO</label>
                    <p>{{$id->method}}</p>
                </div>
                <div class="form-group">
                    <label for="cause">Causa(s) principal(es)</label>
                    <p>{{$id->cause}}</p>
                </div>
                <hr>
                @php
                    $x = 0;
                @endphp
                <div id="destino_action">
                    <h4>Plan de Acción</h4>
                    @foreach ($id->details as $key => $item)
                        @if ($item->type == 'action')
                            <div id="div_action_{{$key}}" class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="action">Tarea</label>
                                        {!!$item->text!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="start_date">Fecha</label>
                                    <p>{{$item->start_date}}</p>
                                </div>
                                @foreach ($item->users as $uId => $ui)
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="user_id_{{$key}}">Funcionario</label>
                                            <p>{{$ui->user->name}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                @php
                    $x = 0;
                @endphp
                <div id="destino_tracing">
                    <h4>Seguimiento y Verificación del Plan de Acción</h4>
                    @foreach ($id->details as $key => $item)
                        @if ($item->type == 'tracing')
                        <div id="div_tracing_{{$key}}" class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="action">Acción</label>
                                        {!!$item->text!!}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Fecha inicial</label>
                                                <p>{{$item->start_date}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Fecha termina</label>
                                                <p>{{$item->end_date}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @foreach ($item->users as $uId => $ui)
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="user_id_{{$key}}">Funcionario</label>
                                                <p>{{$ui->user->name}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="fomr-control">
                    <label for="commentary">Comentarios</label>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
                </div>
                <hr>
                <h4>Evaluación de las acciones tomadas</h4>
            </div>
        </div>
    </section>
@endsection