@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear activación
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="#">Administración</a></li>
        <li><a href="">Activaciones</a></li>
        <li class="active">Crear activaciones</li>
    </ol>
</section>
<section class="content">
    <div class="box">
         
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_admin_activations')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_admin_activations_store')}}" method="post" autocomplete="off">
            @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
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