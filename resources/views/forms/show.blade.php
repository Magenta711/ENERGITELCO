@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Auto Form
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Dirección</a></li>
        <li><a href="#"> Indicadores</a></li>
        <li class="active">Informe de indicadores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                {{$id->name}} <span>{{$id->description}}</span>
            </div>
            <div class="box-tools">
                <a href="{{route('forms')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <span class="text-danger">*Required</span>
            @foreach ($id->questions as $question)
                @if ($question->status)
                    <div class="box box-body mb-3">
                        <div class="form-group">
                            <label for="input_{{$question->id}}">{{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                            @include('forms.includes.type_controls')
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection