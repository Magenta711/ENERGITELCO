@extends('lte.layouts')

@section('content')
@include('forms.includes.elements_create')
<section class="content-header">
    <h1>
        Formularios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Formularios</a></li>
        <li class="active">Crear</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title" id="form-tiple">
                Formulario sin título
            </div>
            <div class="box-tools">
                <a href="{{route('forms')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('forms_store')}}" method="POST" autocomplete="off">
            @csrf
        <div class="box-body">
            <div class="card card-body mb-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Título del formulario" value="Formulario sin título">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Descripción de el formulario"></textarea>
                </div>
            </div>
            <div id="destino_question">

            </div>
            <button class="btn btn-sm btn-link" id="new-option"><i class="fas fa-plus"></i> Agregar pregunta</button>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/forms/create.js') }}" defer></script>
@endsection