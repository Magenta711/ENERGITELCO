@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar servicio claro
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Inventarios</a></li>
        <li><a href="">servicios claro</a></li>
        <li class="active">Mostrar servicios claro</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_inventary_claro_services')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <p>{{ $id->cod }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reference">Referencia</label>
                        <p>{{ $id->description }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Valor</label>
                        <p>{{ $id->value }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="text">Observaciones</label>
                        <p>{{ $id->text }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <p>{{$id->status ? 'Disponible' : 'Agotado'}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection