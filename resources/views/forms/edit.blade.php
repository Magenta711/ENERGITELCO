@extends('lte.layouts')

@section('content')
@php
    $n = 0;
@endphp
@include('forms.includes.elements_create')
<section class="content-header">
    <h1>
        Formularios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Formularios</a></li>
        <li class="active">Editar</li>
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
                @include('forms.includes.modals.setting')
                <a href="{{route('forms')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('forms_update',$id->id)}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
            <div class="box box-body mb-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Título del formulario" value="{{$id->name}}">
                </div> 
                <div class="form-group">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Descripción de el formulario">{{$id->description}}</textarea>
                </div>
            </div>
            <div id="destino_question">
                @foreach ($id->questions as $question)
                @php
                    $n++;
                @endphp
                <div class="box mb-3 questions" id="question_{{$n}}">
                    <input type="hidden" value="{{$question->id}}" name="question_id[]">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group box-title">
                                     <input type="question" value="{{$question->question}}" placeholder="Title of the question" name="question[]" id="question" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 type-options">
                                <select name="type[]" id="type_{{$n}}" class="form-control types">
                                    <option>Selecciona una optión</option>
                                    <option {{$question->type == 1 ? 'selected' : ''}} value="1"><i class="fas fa-grip-lines"></i> Respuesta breve</option>
                                    <option {{$question->type == 2 ? 'selected' : ''}} value="2"><i class="fas fa-align-justify"></i> Párrafo</option>
                                    <option {{$question->type == 3 ? 'selected' : ''}} value="3"><i class="fas fa-dot-circle"></i> Opción multiple</option>
                                    <option {{$question->type == 4 ? 'selected' : ''}} value="4">Casilla de verificación</option>
                                    <option {{$question->type == 5 ? 'selected' : ''}} value="5">Lista desplegable</option>
                                    <option {{$question->type == 6 ? 'selected' : ''}} value="6">Cargar archivo</option>
                                    <option {{$question->type == 7 ? 'selected' : ''}} value="7">Fecha</option>
                                    <option {{$question->type == 8 ? 'selected' : ''}} value="8">Hora</option>
                                </select>
                            </div>
                            <div class="col-md-12 detino" id="detino_{{$n}}">
                                @include('forms.includes.elements_edit')
                            </div>
                        </div>
                    </div>
                    <div class="box-footer text-right d-flex">
                        <button id="destroy_{{$n}}" class="btn btn-sm btn-destroy"><i class="fas fa-trash"></i></button>
                        |
                        <label class="form-check-label" for="required_{{$n}}">
                            <input class="form-check-input" name="required[]" type="checkbox" {{$question->required ? 'checked' : ''}} value="{{$n}}" id="required_{{$n}}">
                            Requerido
                        </label>
                        |
                        <button type="button" class="btn btn-sm"><i class="fas fa-ellipsis-v"></i></button>
                    </div>
                 </div>
                @endforeach
            </div>
            <button class="btn btn-sm btn-link" id="new-option"><i class="fas fa-plus"></i> Agregar pregunta</button>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Actualizar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/forms/create.js') }}" defer></script>
    <script src="{{ asset('js/forms/setting.js') }}" defer></script>
@endsection