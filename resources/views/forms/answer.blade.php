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
                    $value = $value.'<a href="/storage/upload/files/'.$answer->answer.'" target="_blank" class="btn btn-link">'.$answer->answer.'</a><br>';
                }
            }
        }
        return $value;
    }
    $already = false;
@endphp


@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Respuestas <small>Formularios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Formularios</a></li>
        <li class="active">Respuestas</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                {{$id->name}}
            </div>
            <div class="box-tools">
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_users">Usuarios</button>
                @include('forms.includes.modals.checklist')
                <a href="{{route('forms')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Funcionario</th>
                            @foreach ($id->questions as $question)
                                <th>{{$question->question}}</th>
                            @endforeach
                            <th>Fecha</th>
                            @if ($id->form_type == 'Evaluación')
                                <th>Calificación</th>
                            @endif
                            <th>/</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($id->orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user ? $order->user->name : ''}}</td>
                            @foreach ($id->questions as $question)
                                @if ($question->status)
                                    <td>{!!answerQuestion($order,$question)!!}</td>
                                @endif
                            @endforeach
                                <td>{{$order->created_at}}</td>
                                @if ($id->form_type == 'Evaluación')
                                    @if ($id->rating_type == 'Automática')
                                        <td>{{($order->qualification * 100) / $id->note}}% / 100%</td>
                                    @else
                                        <td>{{$order->qualification ? (($order->qualification * 100) / $id->note).'% / 100%'  : 'Sin calificar'}}</td>
                                    @endif
                                @endif
                                <td>
                                    <a href="{{route('answers_show',$order->id)}}" class="btn btn-sm btn-primary">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
        function copy_url(item){
            document.getElementById('url_'+item).select();
            document.execCommand("copy");
        }
    </script>
@endsection