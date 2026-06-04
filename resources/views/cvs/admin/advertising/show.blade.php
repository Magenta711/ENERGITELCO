@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar publicidad
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li><a href="">Publicidades</a></li>
        <li class="active">Mostrar publicidades</li>
    </ol>
</section>
<section class="content">
    <div class="box">
         
        <div class="box-header">
            <div class="box-title">
                {{ $id->name }}
            </div>
            <div class="box-tools">
                <a href="{{route('cvs_admin_advertising')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Archivo</label>
                        <p><img width="100%" src="/storage/cvs/advertising/{{ $id->file }}" class="img-rounded img-responsive" alt="{{ $id->name }}"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <p>{{ $id->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Fecha de inicio</label>
                        <p>{{ $id->date_start }}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">Fecha de terminación</label>
                        <p>{{ $id->date_end }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection