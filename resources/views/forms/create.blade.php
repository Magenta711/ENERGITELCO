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
        <form action="{{route('forms_store')}}" method="POST" autocomplete="off">
            @csrf
        <div class="box-header">
            <div class="box-title" id="form-tiple">
                Formulario sin título
            </div>
            <div class="box-tools">
                @include('forms.includes.modals.setting')
                <a href="{{route('forms')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="card card-body mb-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Título del formulario" value="Formulario sin título">
                </div>
                <div id="is_format_div" style="display: none">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" placeholder="Código" id="code" value="{{old('code')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="version" placeholder="Versión" id="version" value="{{old('version')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date" id="date" value="{{old('date')}}">
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('js/forms/setting.js') }}" defer></script>
@endsection

@section('css')
    <style>
        .option-form-menu {
            position: absolute;
            right: 0;
            left: auto;
            width: 200px;
            padding: 0 0 0 0;
            margin: 0;
            top: 100%;
        }
        .option-form-menu>.menu>li.header{
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            background-color: #ffffff;
            padding: 7px 10px;
            border-bottom: 1px solid #f4f4f4;
            color: #444444;
            font-size: 14px;
        }
        .option-form-menu>.menu{
            max-height: 200px;
            margin: 0;
            padding: 0;
            list-style: none;
            overflow-x: hidden;
        }
        .option-form-menu>.menu>li>a{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            padding: 10px;
            white-space: nowrap;
            border-bottom: none;
        }
        .option-form-menu>.menu>li>button{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 10px;
            display: block;
            white-space: nowrap;
            border: none;
            background: #fff;
            width: 100%;
            text-align: left;
        }
    </style>
@endsection