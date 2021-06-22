@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Editar cargo <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Editar cargo</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
                    <h3 class="box-title">{{$id->name}}</h3>
                    <div class="box-tools"><a href="{{route('position_setting')}}" class="btn nbtn-sm btn-success">Volver</a></div>
                </div>
                    <!-- /.box-header -->
                <form action="{{route('position_setting_update',$id->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="box-body">
                    {{-- name --}}
                    <div class="form-group">
                        <label for="name">Nombre del cargo</label>
                        <input type="text" name="name" id="name" value="{{$id->name}}" class="form-control">
                    </div>
                    {{-- type evaluation --}}
                    <div class="form-group">
                        <label for="type_evaluation">Tipo de evaluación de desempeño</label>
                        <select name="type_evaluation" class="form-control" id="type_evaluation">
                            <option selected disabled></option>
                            <option {{ ($id->type_evaluation == 1) ? 'selected' : '' }} value="1">Directivos, Administrativos, Ingenieros</option>
                            <option {{ ($id->type_evaluation == 2) ? 'selected' : '' }} value="2">Técnicos, auxiliares y operativos</option>
                            <option {{ ($id->type_evaluation == 3) ? 'selected' : '' }} value="3">Personal CVS claro</option>
                        </select>                        
                    </div>
                    {{-- description for job application --}}
                    <div class="form-group">
                        <label for="description">Nombre para la solicitud de empleo</label>
                        <input type="text" name="description" id="description" value="{{$id->Description}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bonus">Bonificación administrativa</label>
                        <input type="text" name="bonus" id="bonus" value="{{$id->bonus}}" class="form-control">
                    </div>
                    {{-- offer --}}
                    <div class="form-group">
                        <label for="offer">Diponible en la solicitud de empleo</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="offer" {{($id->offer == 1) ? 'checked' : ''}} id="offer_1" value="1">
                            <label class="form-check-label" for="offer_1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="offer" {{($id->offer == 0) ? 'checked' : ''}} id="offer_2" value="0">
                            <label class="form-check-label" for="offer_2">No</label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary">Guardar</button>
                </div>
                </form>
            </div>
</section>
@endsection