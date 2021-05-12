@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Ver comisión de control <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Ver comisiones de control</li>
    </ol>
</section>
<section class="content">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <div class="box-title">Ver comisión de control</div>
                    <div class="box-tools">
                        <a href="{{route('setting_bonuses_control')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <div class="box-body">
                   <div class="form-group">
                       <label for="project_id">Actividad</label>
                       <p>{{ $id->activity->description }}</p>
                       </select>
                   </div>
                   <hr>
                   <h4>Días de ejecución desde notificación del DP hasta la entrega en SHARE POINT</h4>
                   @foreach ($id->ejecution as $item)
                       <div class="row">
                           <div class="col-md-6">
                                <div class="form group">
                                    <label for="of">De</label>
                                    <p>{{ $item->of }}</p>
                                </div>
                           </div>
                            <div class="col-md-6">
                                <div class="form group">
                                   <label for="to">a</label>
                                   <p>{{ $item->to }}</p>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="concept_1">Concepto</label><br>
                                    <p>{{ $item->concept }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="value">Valor</label>
                                    <p>$ {{ number_format($item->value,2,',','.') }}</p>
                                </div>
                           </div>
                       </div>
                       <hr>
                    @endforeach
                    <hr>
                    <h4>Notificaciones interventoria documental o campo aplica la mayor</h4>
                    @foreach ($id->notification as $item)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                <label for="ok">Notificación <small>Con OK</small></label>
                                <p>{{ $item->ok }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="to_ok">En cuantos días</label>
                                <p>{{ $item->to_ok }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="concept_notification_1">Concepto</label><br>
                                    <p>{{ $item->concept }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="value">Valor</label>
                                    <p>$ {{ number_format($item->value,2,',','.') }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach                  
                </div>
            </div>
        <!-- /.box -->
</section>
@endsection