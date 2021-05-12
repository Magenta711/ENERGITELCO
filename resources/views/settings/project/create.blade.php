@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear proyecto <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li><a href="#">Lista de proyectos</a></li>
        <li class="active">Crear proyecto</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
            <form action="{{route('project_setting_store')}}" method="POST">
                @csrf
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-cubes"></i>
                        <h3 class="box-title">Crear proyecto</h3>
                        <div class="box-tools">
                            <a href="{{route('project_setting')}}" class="btn btn-sm btn-primary">Volver</a>
                        </div>
                    </div>
                        <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <input type="text" name="description" id="description" value="{{old('description')}}" class="form-control">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="project_type">Tipo de proyecto</label>
                            <select name="project_type" id="project_type" class="form-control">
                                <option selected disabled>Tipo de proyecto</option>
                                @foreach ($project_types as $type)
                                    <option {{($type->id == old('project_type')) ? 'selected' : ''}} value="{{$type->id}}">{{$type->type}}</option>
                                @endforeach
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
                                                        <input type="checkbox" name="deliverable_id[]" id="deliverable_id{{$deliverable->id}}" value="{{$deliverable->id}}">
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
                                                        <input type="checkbox" name="payment_limit_id[]" id="payment_limit_id{{$time->id}}" value="{{$time->id}}">
                                                        <label for="payment_limit_id{{$time->id}}">{{$time->description_time}}</label>
                                                        <input type="text" name="time[]" id="time{{$time->id}}" class="form-control" placeholder="Tiempo">
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
                        <button type="submit" id="send" class="btn btn-sm btn-primary btn-send">Guardar</button>
                    </div>
                </div>
            </form>
</section>
@endsection

@section('js')
<script>
    var bPreguntar = true;
    window.onbeforeunload = preguntarAntesDeSalir;
    $(document).ready(function() {
        $('#send').click(function (){
            bPreguntar = false;
            return true;
        });
    });
    function preguntarAntesDeSalir()
    {
        if (bPreguntar)
            return "¿Seguro que quieres salir?";
    }
</script>
@endsection