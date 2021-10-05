@php
function answerQuestion($order, $question){
    $value = '';
        foreach ($order->answers as $answer){
            if ($answer->question_id == $question->id){
            if ($question->type == '1' || $question->type == '2' || $question->type == '7' || $question->type == '8'){
                $value = $answer->answer;
            }
            if ($question->type == '3' || $question->type == '5'){
                foreach ($question->options as $option){
                    if ($answer->answer == $option->id){
                        $value = $option->option;
                    }
                }
            }
            if ($question->type == '4'){
                foreach ($question->options as $option){
                    if ($answer->answer == $option->id){
                        $value = $value.$option->option.'<br>';
                    }
                }
            }
            if ($question->type == '6'){
                $exten = explode('.',$answer->answer);
                if ($exten[count($exten) - 1] == 'jpg' || $exten[count($exten) - 1] == 'png'){
                    $o = '<img src="/storage/upload/files/'.$answer->answer.'" width="100px" height="auto" class="img-rounded figure-img img-fluid rounded" alt="'.$answer->answer.'">';
                }else {
                    $o = $answer->answer;
                }
                $value = $value.'<a href="/storage/upload/files/'.$answer->answer.'" target="_blank" class="m-2">'.$o.'</a>';
            }
        }
    }
    return $value;
}

function hasCalification($order, $question)
{
    foreach ($order->answers as $answer){
        if ($answer->question_id == $question->id) {
            if ($answer->calification == null){
                return '<input type="number" class="form-control inp-calification" placeholder="Calificación" name="qualification_answer['.$question->id.']">';
            }else {
                return $answer->calification;
            }
        }
    }
    return false;
}
@endphp
@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Respuesta <small>Formularios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Formularios</a></li>
        <li><a href="#"> Respuestas</a></li>
        <li class="active">Ver</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                {{$id->form->name}} <span>{{$id->form->description}}</span>
            </div>
            <div class="box-tools">
                <a href="{{route('forms_answer',$id->form->id)}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <p>Todo campo con <span class="text-danger">*</span> son requeridos</p>
            @if ($id->form->form_type == 'Evaluación' && $id->form->rating_type != 'Automática')
                <p><b>Calificación:</b> {{$id->qualification ? (($id->qualification * 100) / $id->form->note).'% / 100%'  : 'Sin calificar'}}</p>
            @endif
            @if ($id->form->form_type == 'Evaluación' && $id->form->rating_type != 'Automática' && !$id->qualification)
                <form action="{{route('answers_calification',$id->id)}}" method="post">
                    @csrf
                    @method('PUT')
            @endif
            @foreach ($id->form->questions as $question)
                @if ($question->status)
                    <div class="card card-body mb-3">
                        <label class="label-text"> {{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                        @if ($id->form->form_type == 'Evaluación' && $id->form->rating_type != 'Automática')
                            <div class="row">
                                <div class="col-sm-8">
                                    @include('forms.answers.includes.answer')
                                </div>
                                <div class="col-sm-4">
                                    @php
                                        $calification = hasCalification($id,$question);
                                    @endphp
                                    <p>{!! !$calification ? ((!$id->qualification) ? '<input type="number" class="form-control inp-calification" placeholder="Calificación" name="qualification_answer['.$question->id.']">' : '0') : $calification !!}</p>
                                </div>
                            </div>
                        @else
                            @include('forms.answers.includes.answer')
                        @endif
                    </div>
                @endif
            @endforeach
            @if ($id->form->form_type == 'Evaluación' && $id->form->rating_type != 'Automática' && !$id->qualification)
                    <p><b>Total posible</b> <span id="ql-total-posible">{{$id->form->note}}</span></p>
                    <p><b>Total</b> <span id="ql-total"></span></p>
                    <p><b>Promedio</b> <span id="ql-avg"></span></p>
                    <input type="hidden" name="qualification" id="qualification" value="0">
                    <p><b>Porcentaje</b> <span id="ql-por"></span></p>
                    <button class="btn btn-sm btn-primary pull-right">Calificar</button>
                </form>
            @endif
        </div>
        @if ($id->form->with_attach == 1)
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <div class="box-title">
                                    Firmado electrónicamente por el responsable
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6"><strong>Nombre: </strong>{{$id->name_require}}</div>
                                    <div class="col-md-6"><strong>Cédula: </strong>{{$id->cc_require}}</div>
                                </div>
                                <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->name_require}}</strong> en rol de {{$id->role_require}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.inp-calification').blur(function () {
                let allCalification = $('.inp-calification');
                let total = 0;
                for (let i = 0; i < allCalification.length; i++) {
                    const element = allCalification[i];
                    const value = element.value ? element.value : 0;
                    console.log(value);
                    total += parseInt(value);
                }
                $('#ql-total').text(total);
                let avg = total / allCalification.length;
                $('#ql-avg').text((avg).toFixed(2));
                let posible = parseInt($('#ql-total-posible').text());
                $('#qualification').val(avg);
                let pormedio = ((100 * avg) / posible).toFixed(2);
                $('#ql-por').text(pormedio+"%");
            });
        });
    </script>
@endsection