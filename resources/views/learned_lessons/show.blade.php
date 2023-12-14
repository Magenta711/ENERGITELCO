@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lesiones aprendidas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Administración del sistema</a></li>
        <li><a href="#">Lesiones aprendidas</a></li>
        <li class="active">Ver</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lesión aprendidas</h3>
                    <div class="box-tools">
                        <a href="{{route('learned_lessons')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <p>{{$id->date}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="num">Número de lección</label>
                                <p>{{$id->num}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="theme">Tema</label>
                        <p>{{$id->theme}}</p>
                    </div>
                    <div class="form-group">
                        <label for="happened">¿Que pasó?</label>
                        <p>{{$id->happened}}</p>
                    </div>
                    <div class="form-group">
                        <label for="caused">¿Que lo causó?</label>
                        <p>{{$id->caused}}</p>
                    </div>
                    <div class="form-group">
                        <label for="avoid">¿Cómo evitar que ocurra en energitelco?</label>
                        <p>{{$id->avoid}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </ul>
</section>
@endsection
