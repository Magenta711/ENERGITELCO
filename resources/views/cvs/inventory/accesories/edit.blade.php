@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar accesorios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Inventarios</a></li>
        <li><a href="">Accesorios</a></li>
        <li class="active">Editar accesorios</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_inventary_Accesories')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_inventary_Accesories_update',$id->id)}}" method="post" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cod">Código</label>
                        <input type="text" name="cod" id="cod" class="form-control" value="{{ $id->cod }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option disabled selected></option>
                            @foreach ($categories as $item)
                                <option {{ $id->category_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="brand">Marca</label>
                        <input type="text" name="brand" id="brand" class="form-control" value="{{ $id->brand }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="reference">Referencia</label>
                        <input type="text" name="reference" id="reference" class="form-control" value="{{ $id->description }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Valor</label>
                        <input type="text" name="value" id="value" class="form-control" value="{{ $id->value }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="amount">Cantidad</label>
                        <input type="number" name="amount" id="amount" class="form-control" value="{{ $id->amount }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sede_id">Sede</label>
                        <select name="sede_id" id="sede_id" class="form-control">
                            <option disabled selected></option>
                            @foreach ($sedes as $item)
                                <option {{ $id->sede_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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