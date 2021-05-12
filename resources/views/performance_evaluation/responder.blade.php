@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Calificar evaluación de desempeño <small>Evaluaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Evaluación de desempeño</a></li>
        <li class="active">Calificar evaluación de desempeño</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Evaluación de desempeño</div>
        </div>
        <form action="{{route('performance_evaluation_store',$id->id)}}" method="post" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
            <h4>Técnicos, auxiliares y operativos.</h4>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="date">Fecha de la evaluación</label>
                    <input type="date" class="form-control" id="date" value="{{$id->date}}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="period">Periodo evaluado</label>
                    <input type="text" class="form-control" id="period" value="{{$id->period}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="evaluado_name">Nombre del empleado</label>
                    <input type="text" readonly class="form-control" id="evaluado_name" value="{{$id->evaluado->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="responsable_name">Nombre del evaluador</label>
                    <input type="text" readonly class="form-control" id="responsable_name" value="{{$id->responsable->name}}">
                </div>
            </div>
            <hr>
            <p><strong>CALIFICACIÓN:</strong>  Todos los aspectos se valoran de acuerdo con la siguiente escala de puntaje.</p>
            <br>
            <p>Excelente: 9 a 10   -  Bueno: 8 a 9  -  Regular:  6 a 8  -  Malo: Menos de 6</p>
            @include('performance_evaluation.includes.resp_'.$id->type_evaluation_id)
            <p class="pull-right"> <strong> | Nuevo puntaje obtenido en la evaluación: </strong> <span class="text-red" id="text_average"> </span> <input type="hidden" name="average" value="old('average')" id="average"> </p>
            <p class="pull-right"> <strong> Puntaje obtenido en la evaluación: </strong> <span class="text-red">{{$id->total_1}} </span> </p>
            <br>
            <h4>CUMPLIMIENTO PLAN DE MEJORAMIENTO DEL PERÍODO ANTERIOR.</h4>
            <div class="form-group">
                <label for="aspects">ASPECTO</label>
                <textarea name="aspects" id="aspects" cols="30" rows="3" class="form-control">{{old('aspects')}}</textarea>
            </div>
            <hr>
            <h4>EFICACIA DE LOS EVENTOS DE FORMACIÓN RECIBIDOS.</h4>
            <div class="form-group">
                <label for="event">EVENTO/CONCEPTO</label>
                <textarea name="event" id="event" cols="30" rows="3" class="form-control">{{old('event')}}</textarea>
            </div>
            <hr>
            <h4>PLAN DE MEJORAMIENTO.</h4>
            <div class="form-group">
                <label for="activty">ACTIVIDAD</label>
                <textarea name="activty" id="activty" cols="30" rows="3" class="form-control">{{old('activty')}}</textarea>
            </div>
            <hr>
            <h4>NECESIDADES DE FORMACIÓN</h4>
            <textarea name="training_needs" id="training_needs" cols="30" rows="3" class="form-control">{{old('training_needs')}}</textarea>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Enviar y firmar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/main.js')}}"></script>
@endsection