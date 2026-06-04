@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Ver sede
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li><a href="">Sedes</a></li>
        <li class="active">Ver sedes</li>
    </ol>
</section>
<section class="content">
    <div class="box">
         
        <div class="box-header">
            <div class="box-title">
                {{ $id->name }}
            </div>
            <div class="box-tools">
                <a href="{{route('cvs_sedes')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <p>{{ $id->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <p>{{ $id->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <p>{{  $id->address }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <p>{{ $id->city }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tel">Teléfono</label>
                        <p>{{ $id->tel }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection