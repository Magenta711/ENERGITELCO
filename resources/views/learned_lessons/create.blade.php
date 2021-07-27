@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lecciones aprendidas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Administración del sistema</a></li>
        <li><a href="#">Lecciones aprendidas</a></li>
        <li class="active">Crear</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de lecciones aprendidas</h3>
                    <div class="box-tools">
                        <a href="{{route('learned_lessons')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <form action="{{route('learned_lessons_store')}}" method="post">
                    @csrf
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="date" name="date" value="{{old('date')}}" id="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="num">Número de lección</label>
                                <input type="number" name="num" value="{{old('num')}}" id="num" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="theme">Tema</label>
                        <textarea name="theme" id="theme" cols="30" rows="3" class="form-control">{{old('theme')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="happened">¿Que pasó?</label>
                        <textarea name="happened" id="happened" cols="30" rows="3" class="form-control">{{old('happened')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="caused">¿Que lo causó?</label>
                        <textarea name="caused" id="caused" cols="30" rows="3" class="form-control">{{old('caused')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="avoid">¿Cómo evitar que ocurra en energitelco?</label>
                        <textarea name="avoid" id="avoid" cols="30" rows="3" class="form-control">{{old('avoid')}}</textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary btn-send">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </ul>
</section>
@endsection
