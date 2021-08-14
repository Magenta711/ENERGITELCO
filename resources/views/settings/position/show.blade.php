@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Mostrar cargos <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Mostrar cargos</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
                    <h3 class="box-title">{{$id->name}}</h3>
                    <div class="box-tools"><a href="{{route('position_setting')}}" class="btn nbtn-sm btn-primary">Volver</a></div>
                </div>
                    <!-- /.box-header -->
                <div class="box-body">

                    {{-- name --}}
                    <strong>Nombre del cargo</strong>
                    <p>{{$id->name}}</p>
                    <hr>
                    {{-- type evaluation --}}
                    <strong>Tipo de evaluación de desempeño</strong>
                    <p>
                        {{ ($id->type_evaluation == 1) ? 'Directivos, Administrativos, Ingenieros' : '' }}
                        {{ ($id->type_evaluation == 2) ? 'Técnicos, auxiliares y operativos' : '' }}
                        {{ ($id->type_evaluation == 3) ? 'Personal CVS claro' : '' }}
                    </p>
                    <hr>
                    {{-- description for job application --}}
                    <strong>Nombre para la solicitud de empleo</strong>
                    <p>{{$id->Description}}</p>
                    <hr>
                    <strong>Bonificación administrativa</strong>
                    <p>{{$id->bonus}}</p>
                    <hr>
                    {{-- offer --}}
                    <strong>Disponible en la solicitud de empleo</strong>
                    <p>{{($id->offer == 1) ? 'SI' : 'No'}}</p>
                </div>
                <div class="box-footer">
                    <a href="{{route('position_setting_edit',$id->id)}}" class="btn btn-sm btn-primary">Editar</a>
                </div>
            </div>
</section>
@endsection