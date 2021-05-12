@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear publicidad
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li><a href="">publicidades</a></li>
        <li class="active">Crear publicidades</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        @include('includes.alerts')
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_admin_advertising')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_admin_advertising_store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="file_up">Imagen</label>
                        <label for="file_up" class="form-control text-center"><i class="fas fa-upload"></i></label>
                        <input type="file" name="file_up" accept="image/*" id="file_up" class="hide" value="{{ old('file_up') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_start">Fecha de inicio</label>
                        <input type="date" name="date_start" id="date_start" class="form-control" value="{{ $advertising->date_end }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_end">Fecha de finalización</label>
                        <input type="date" name="date_end" id="date_end" class="form-control" value="{{ old('date_end') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection