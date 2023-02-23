@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
       ASIGNACIÓN DE TRABAJOS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Asignación de trabajos</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="box-body">
            @csrf
            <h4>Creación de evento</h4>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="cedula1">OT</label>
                    <input type="text" name="OT" value="{{old('OT')}}" id="campo_ot" class="form-control" placeholder="OT">
                </div>
                <div class="col-sm-4">
                    <label for="nombre1">Titulo del evento</label>
                    <input type="text" name="title" value="" class="form-control controlName" id="title" placeholder="Titulo" >
                </div>
                <div class="col-sm-4">
                    <label for="rol1">ID MINTIC</label>
                    <input type="number" name="id_minctic" value="" class="form-control controlRol" id="id_minctic" placeholder="ID">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-sm-4">
                   <label for="namekit">ID Beneficiario</label>
                   <input type="text" name="nombre" value="{{old('nombre')}}" id="namekit" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="cantidad">Muncipio</label>
                    <input type="number" name="cantidad" value="{{old('cantidad')}}" id="cantidad" class="form-control" >
                </div>
                <div class="col-sm-4">
                    <label for="amount_tools">FECHA</label>
                    <input type="number" name="amount_tools" id="amount_tools" class="form-control">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".new_documento">Crear</button>
        </div>
        </form>
    </div>
</section>
@endsection
