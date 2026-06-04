@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Autoevaluación <small>Evaluaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Evaluación de desempeño</a></li>
        <li class="active">Autoevaluación</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Evaluación de desempeño</div>
        </div>
        <form action="{{route('self_assessment_store',$id->id)}}" method="post" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
            <h4>{{ ($id->type_evaluation_id == 1) ? 'Directivos, Administrativos, Ingenieros' : (($id->type_evaluation_id == 2) ? 'Técnicos, auxiliares y operativos' : 'Personal CVS claro') }}.</h4>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="date">Fecha de la evaluación</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="period">Periodo evaluado</label>
                    <input type="text" class="form-control" id="period" name="period" value="{{old('period')}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="evaluado_name">Nombre del empleado</label>
                    <input type="text" readonly class="form-control" id="evaluado_name" name="evaluado_name" value="{{$id->evaluado->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="responsable_name">Nombre del evaluador</label>
                    <input type="text" readonly class="form-control" id="responsable_name" name="responsable_name" value="{{$id->responsable->name}}">
                </div>
            </div>
            <hr>
            <p><strong>CALIFICACIÓN:</strong>  Todos los aspectos se valoran de acuerdo con la siguiente escala de puntaje.</p>
            <br>
            <p>Excelente: 9 a 10   -  Bueno: 8 a 9  -  Regular:  6 a 8  -  Malo: Menos de 6</p>
            @include('performance_evaluation.includes.items_'.$id->type_evaluation_id)
            <p class="pull-right"><strong>Puntaje obtenido en la evaluación: </strong> <span class="text-red" id="text_average"></span><input type="hidden" name="average" value="{{old('average')}}" id="average"></p>
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