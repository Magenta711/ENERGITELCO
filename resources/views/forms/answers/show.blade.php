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
        </div>
        <div class="box-body">
            <p>Todo campo con <span class="text-danger">*</span> son requeridos</p>
            @foreach ($id->form->questions as $question)
                @if ($question->status)
                    <div class="card card-body mb-3">
                        <label class="label-text"> {{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                        @include('forms.answers.includes.answer')
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
