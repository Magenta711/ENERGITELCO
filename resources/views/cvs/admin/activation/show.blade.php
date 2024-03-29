@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar activación
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li><a href="">Activaciones</a></li>
        <li class="active">Mostrar activaciones</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        @include('includes.alerts')
        <div class="box-header">
            <div class="box-title">
                {{ $id->name }}
            </div>
            <div class="box-tools">
                <a href="{{route('cvs_admin_activations')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <p>{{ $id->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection