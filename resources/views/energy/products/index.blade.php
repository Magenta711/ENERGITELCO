@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Energía Solar <small>ENERGÍAS</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Productos</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title text-center">Productos</div>
                    <div class="box-tools">
                        <a href="{{ route('energy_products.create') }}" class="btn btn-success">Agregar Productos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
