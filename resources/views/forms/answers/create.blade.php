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
    <form action="{{route('answers_store')}}" id="target" autocomplete="off" method="post" enctype="multipart/form-data">
        @csrf
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                {{$id->name}} <span>{{$id->description}}</span>
            </div>
        </div>
        <div class="box-body">
            <div class="mb-3">
                <h3 class="box-title">{{$id->name}}</h3>
                <p class="box-text">{{$id->description}}</p>
                <span class="text-danger">*Required</span>
            </div>
            <input type="hidden" name="form" value="{{$id->token}}">
            {{-- <input type="hidden" name="user" value="{{$user}}"> --}}
            <hr>
            @foreach ($id->questions as $question)
                <div class="form-group mb-3">
                    <label class="label-text" for="input_{{$question->id}}">{{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                    @include('forms.includes.type_controls')
                </div>
            @endforeach
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary btn-save">{{__('Send')}}</button>
        </div>
    </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/forms/order_create.js') }}" defer></script>
    <script src="{{ asset('js/forms/upload.js') }}" defer></script>
    <script>
    </script>
@endsection