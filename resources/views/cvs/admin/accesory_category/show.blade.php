@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar categoría de accesorios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li><a href="">Categorías de accesorios</a></li>
        <li class="active">Mostrar categoría de accesorios</li>
    </ol>
</section>
<section class="content">
    <div class="box">
         
        <div class="box-header">
            <div class="box-title">
                {{ $id->name }}
            </div>
            <div class="box-tools">
                <a href="{{route('cvs_admin_accesories_category')}}" class="btn btn-sm btn-primary">Volver</a>
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