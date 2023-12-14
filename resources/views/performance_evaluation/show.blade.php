@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Evaluaciones de desempeño <small>Evaluaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Evaluaciones de desempeño</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-title">Evaluaciones de desempeño</div>
            <div class="box-tools">
                <a href="{{route('performance_evaluation')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <h4>{{ ($id->type_evaluation_id == 1) ? 'Directivos, Administrativos, Ingenieros' : (($id->type_evaluation_id == 2) ? 'Técnicos, auxiliares y operativos' : 'Personal CVS claro') }}.</h4>
            <div class="row">
                <div class="col-md-6">
                    <h4>Fecha de la evaluación</h4>
                    <p>{{$id->date}}</p>
                </div>
                <div class="col-md-6">
                    <h4>Periodo evaluado</h4>
                    <p>{{$id->period}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4>Nombre del empleado</h4>
                    <p>{{$id->evaluado->name}}</p>
                </div>
                <div class="col-md-6">
                    <h4>Nombre del evaluador</h4>
                    <p>{{$id->responsable->name}}</p>
                </div>
            </div>
            <hr>
            <p><strong>CALIFICACIÓN:</strong>  Todos los aspectos se valoran de acuerdo con la siguiente escala de puntaje.</p>
            <br>
            <p>Excelente: 9 a 10   -  Bueno: 8 a 9  -  Regular:  6 a 8  -  Malo: Menos de 6</p>
            @include('performance_evaluation.includes.show_'.$id->type_evaluation_id)
            <p class="pull-right"> <strong> | Puntaje final de la evaluación: </strong> <span class="text-red" id="text_average">{{$id->total}} </span></p>
            <p class="pull-right"> <strong> Puntaje obtenido en la evaluación: </strong> <span class="text-red">{{$id->total_1}} </span> </p>
            <br>
            <h4>CUMPLIMIENTO PLAN DE MEJORAMIENTO DEL PERÍODO ANTERIOR.</h4>
            <p>ASPECTO</p>
            <p>{{$id->aspects}}</p>
            <hr>
            <h4>EFICACIA DE LOS EVENTOS DE FORMACIÓN RECIBIDOS.</h4>
            <p>EVENTO/CONCEPTO</p>
            <p>{{$id->event}}</p>
            <hr>
            <h4>PLAN DE MEJORAMIENTO.</h4>
            <p>ACTIVIDAD</p>
            <p>{{$id->activty}}</p>
            <hr>
            <h4>NECESIDADES DE FORMACIÓN</h4>
            <p>{{$id->training_needs}}</p>
            <hr>
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        Firmado electrónicamente por el auditor o coordinador
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        @if ($id->item_1)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->evaluado->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->evaluado->cedula}}</div>
                            </div>
                            <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->evaluado->name}}</strong> en rol de {{$id->evaluado->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                        @endif
                        @if ($id->item_1_new)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsable->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsable->cedula}}</div>
                            </div>
                            <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->responsable->name}}</strong> en rol de {{$id->responsable->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
        @if ($id->state == 'Sin aprobar')
            @can('Aprobar evaluación de desempeño')
                
            <a class="btn btn-sm btn-primary" href="{{ route('approve_performance',$id->id) }}"
                onclick="event.preventDefault();
                                document.getElementById('approve_performance').submit();">
                Aprobar y firmar
            </a>
            <form id="approve_performance" action="{{ route('approve_performance',$id->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
            </form>
            <a class="btn btn-sm btn-danger" href="{{ route('not_approve_performance',$id->id) }}"
                    onclick="event.preventDefault();
                                document.getElementById('not_approve_performance').submit();">
                No aprobar
            </a>
            <form id="not_approve_performance" action="{{ route('not_approve_performance',$id->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
            </form>
            @endcan

        @endif
        @if ($id->state == 'Aprobado')
            {{-- <a f="" class="btn btn-danger btn-sm">Descargar</a> --}}
        @endif
        </div>
    </div>
</section>
@endsection