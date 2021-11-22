@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Ver proyecto <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li><a href="#">Lista de proyectos</a></li>
        <li class="active">Ver proyecto</li>
    </ol>
</section>
<section class="content">
     
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
                    <h4>Información</h4>
                    <strong>Descripción</strong>
                    <p>{{$id->description}}</p>
                    <hr>
                    <strong>Estado</strong>
                    <p>{{$id->state == 1 ? 'Activo' : 'Inactivo'}}</p>
                    <hr>
                    <h4>Entregables</h4>
                    <ol>
                        @foreach ($id->deliverables as $deliverable)
                            <li>{{$deliverable->deliverable}}</li>
                        @endforeach
                    </ol>
                    <hr>
                    <h4>Limite de pagos</h4>
                    <ol>
                        @foreach ($id->PaymentLimit as $paymentLimit)
                            <li>{{$paymentLimit->description_time}}  - {{$id->hasTime($paymentLimit->id)}} días</li>
                        @endforeach
                    </ol>
                </div>
                <div class="box-footer">
                    <a href="{{route('project_setting_edit',$id->id)}}" class="btn btn-sm btn-success">Editar</a>
                </div>
            </div>
</section>
@endsection