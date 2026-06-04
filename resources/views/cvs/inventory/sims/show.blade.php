@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar Sim Cards
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">CVS</a></li>
        <li><a href="">Inventarios</a></li>
        <li><a href="">Sim Cards</a></li>
        <li class="active">Mostrar Sim Cards</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_inventary_sims')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="serial">ICC-IC</label>
                        <p>{{ $id->cod }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="type_id">Tipo</label>
                        <p>{{ $id->type->name }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number">Vendedor</label>
                        <p>{{ $id->user->name }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <p>{{ $id->date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection