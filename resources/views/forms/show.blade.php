@php
    function twodshuffle($array)
    {
        $count = count($array);
        $indi = range(0,$count-1);
        shuffle($indi);
        $newarray = array($count);
        $i = 0;
        foreach ($indi as $index)
        {
            $newarray[$i] = $array[$index];
            $i++;
        }
        return $newarray;
    }
@endphp
@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Formularios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Formularios</a></li>
        <li class="active">Ver</li>
    </ol>
</section>
<section class="content">
     
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
            <p>Todo campo con <span class="text-danger">*</span> son requeridos</p>
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