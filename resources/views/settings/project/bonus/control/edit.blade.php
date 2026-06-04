@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear comisión de control <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Crear comisiones de control</li>
    </ol>
</section>
<section class="content">
     
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <div class="box-title">Crear comisión de control</div>
                    <div class="box-tools">
                        <a href="{{route('setting_bonuses_control')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{route('bonuses_setting_store_control')}}" method="POST">
                    @csrf
                <div class="box-body">
                   <div class="form-group">
                       <label for="project_id">Actividad</label>
                       <select name="project_id" id="project_id" class="form-control">
                           <option selected disabled></option>
                           @foreach ($projects as $project)
                               <option {{ ($id->project_id == $project->id) ? 'selected' : '' }} value="{{$project->id}}">{{$project->id}}. {{$project->description}}</option>
                           @endforeach
                       </select>
                   </div>
                   <hr>
                   <h4>Días de ejecución desde notificación del DP hasta la entrega en SHARE POINT</h4>
                    @foreach ($id->ejecution as $item)
                    <div class="origen" id="origen_ejecution_{{ $item->i }}">
                        <div class="row">
                            <div class="col-xs-10 col-sm-11">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="of">De</label>
                                            <input type="number" name="of[]" id="of" class="form-control" value="{{ $item->of }}">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form group">
                                            <label for="to">a</label>
                                            <input type="number" name="to[]" id="to" class="form-control" value="{{ $item->to }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="concept_1">Concepto</label><br>
                                            <select name="concept_ejecution[]" id="concept_1" class="form-control">
                                                <option selected disabled></option>
                                                <option {{ $item->concept == 'Aplica' ? 'selected' : '' }} value="Aplica">Aplica</option>
                                                <option {{ $item->concept == 'No aplica' ? 'selected' : '' }} value="No aplica">No aplica</option>
                                                <option {{ $item->concept == 'Penalización 1' ? 'selected' : '' }} value="Penalización 1">Penalización 1</option>
                                                <option {{ $item->concept == 'Penalización 2' ? 'selected' : '' }} value="Penalización 2">Penalización 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="value">Valor</label>
                                            <input type="text" name="value[]" id="value" class="form-control" value="{{ $item->value }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-1" style="padding: 60px 0px 0px 0px">
                                <i style="cursor: pointer" id="remove_ejecution_{{ $item->i }}" class="fa fa-trash remove_ejecution"></i>
                            </div>
                        </div>
                        <hr>
                    </div>
                    @endforeach
                   <div id="destino_ejecution"></div>
                   <button type="button" id="clone_ejecution" class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar dias para ejecución</button>
                    <hr>
                    <h4>Notificaciones interventoria documental o campo aplica la mayor</h4>
                    @foreach ($id->notification as $item)
                        <div id="origen_notification_{{ $item->i }}" class="origen">
                            <div class="row">
                                <div class="col-xs-10 col-sm-11">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form group">
                                                <label for="ok">Notificación <small>Con OK</small></label>
                                                <input type="number" name="ok[]" id="ok" class="form-control" value="{{ $item->ok }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="to_ok">En cuantos días</label>
                                                <input type="number" name="to_ok[]" id="to_ok" class="form-control" value="{{ $item->to_ok }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="concept_notification_1">Concepto</label><br>
                                                <select name="concept_notification[]" id="concept_notification_1" class="form-control">
                                                    <option selected disabled></option>
                                                    <option {{ $item->concept == 'Aplica' ? 'selected' : '' }} value="Aplica">Aplica</option>
                                                    <option {{ $item->concept == 'No aplica' ? 'selected' : '' }} value="No aplica">No aplica</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="value">Valor</label>
                                                <input type="text" name="value_notification[]" id="value" class="form-control" value="{{ $item->value }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-1" style="padding: 60px 0px 0px 0px">
                                    <i style="cursor: pointer" id="remove_notification_{{ $item->i }}" class="fa fa-trash remove_notification"></i>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                   <div id="destino_notification"></div>
                    <button type="button" id="clone_notification" class="btn btn-sm btn-link"><i class="fa fa-plus"></i> Agregar dias para notificación</button>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-sm btn-success btn-send btn-send">Guardar</button>
                </div>
                </form>
            </div>
        <!-- /.box -->
</section>
@endsection

@section('js')    
    <script>
        $(document).ready(function() {
            incre = 0;
            $('#clone_ejecution').click(function (e) {
                e.preventDefault();
                newElement = $('#origen_ejecution_0').clone().appendTo('#destino_ejecution').children().children().children().children().children('.form-group').children('.form-control').val('');
            });
            $('#clone_notification').click(function (e) {
                e.preventDefault();
                $('#origen_notification_0').clone().appendTo('#destino_notification');
            });
            $('.remove_ejecution').click(function () {
                removeFiles(this.id);
            });
            $('.remove_notification').click(function () {
                removeFiles(this.id);
            });
        });

        function removeFiles(id) {
            o = id.split('_');
            if (o[1] == 'ejecution') {
                $('#origen_ejecution_'+o[id.split('_').length - 1]).remove();
            }

            if (o[1] == 'notification') {
                $('#origen_notification_'+o[id.split('_').length - 1]).remove();
            }
        }
    </script>
@endsection