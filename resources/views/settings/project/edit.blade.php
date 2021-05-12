@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Editar proyecto <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li><a href="#">Lista de proyectos</a></li>
        <li class="active">Editar proyecto</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
            <form action="{{route('project_setting_update',$id->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-cubes"></i>
            
                        <h3 class="box-title">{{$id->description}}</h3>
                        <div class="box-tools">
                            <a href="{{route('project_setting')}}" class="btn btn-sm btn-primary">Volver</a>
                        </div>
                    </div>
                        <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input type="text" name="description" id="description" value="{{$id->description}}" class="form-control">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="project_type">Tipo de proyecto</label>
                            <select name="project_type" id="project_type" class="form-control">
                                <option selected disabled>Tipo de proyecto</option>
                                @foreach ($project_types as $type)
                                    <option {{($type->id == $id->project_type) ? 'selected' : ''}} value="{{$type->id}}">{{$type->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="state">Estado</label>
                            <select name="state" id="state" class="form-control">
                                <option value="" selected disabled></option>
                                <option {{$id->state == 1 ? 'selected' : ''}} value="1">Activo</option>
                                <option {{$id->state == 0 ? 'selected' : ''}} value="0">Inactivo</option>
                            </select>
                        </div>
                        <hr>
                        <h4>Entregables</h4>

                        <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal" data-target="#modela_deliverable">Chequeo de entregables</button>
                                            
                        <div class="modal fade" id="modela_deliverable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Entregables</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Chequeo de los entregables para esta actividad</p>
                                        <ul class="list-group">
                                            @foreach ($deliverables as $deliverable)
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <input type="checkbox" name="deliverable_id[]" id="deliverable_id{{$deliverable->id}}" value="{{$deliverable->id}}" {{($id->hasDeliverable($deliverable->id)) ? 'checked' : '' }}>
                                                        <label for="deliverable_id{{$deliverable->id}}">{{$deliverable->deliverable}}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>Limite de tiempo para pagos</h4>
                        <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal" data-target="#modela_payment_limit">Chequeo de limites</button>
                                            
                        <div class="modal fade" id="modela_payment_limit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="exampleModalLongTitle">Limites de tiempo para pago</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Chequeo de los tiempos de pago para esta actividad</p>
                                        <ul class="list-group">
                                            @foreach ($paymentLimitis as $time)
                                                <li class="list-group-item">
                                                    <div class="form-group">
                                                        <input type="checkbox" name="payment_limit_id[]" id="payment_limit_id{{$time->id}}" value="{{$time->id}}" {{($id->hasPaymet($time->id)) ? 'checked' : '' }}>
                                                        <label for="payment_limit_id{{$time->id}}">{{$time->description_time}}</label>
                                                        <input type="text" name="time[]" id="time{{$time->id}}" value="{{$id->hasTime($time->id)}}" class="form-control" placeholder="Tiempo">
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button class="btn btn-sm btn-primary btn-send btn-send">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/project/create.js') }}" defer></script>
@endsection