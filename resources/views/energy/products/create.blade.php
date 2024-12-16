@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear producto de energía solar <small>ENERGÍAS</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Energías</a></li>
        <li><a href="#">Productos</a></li>
        <li class="active">Crear</li>
    </ol>
</section>
<section class="content">

    <div class="box">
        <div class="box-header">
            <div class="box-title"> Producto Solar</div>
            <div class="box-tools">
                <a href="" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <form action="" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="card col-md-6">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Modelo</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="brand">Marca</label>
                                    <input type="text" class="form-control" id="brand" name="brand">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Precio</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desription">Descripción</label>
                                    <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card" col-md-6>
                            @include('energy.products.includes.dropzone')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{asset("js/project/mintic/create.js")}}"></script>
@endsection
