@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CCJL</a></li>
        <li><a href="">Clientes</a></li>
        <li class="active">Editar clientes</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title"></div>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="{{route('CCJL_clients')}}"> Volver</a>
                    </div>
                </div>
                <form action="{{ route('CCJL_clients_update',$id->id) }}" method="post">
                    @csrf
                    @method('PUT')
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre cliente</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $id->name }}" placeholder="Nombre completo">
                                <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="document">Tipo de identificación</label><br>
                                <label for="document_type_0">NIT</label>
                                <input type="radio" name="document_type" class="document_type" id="document_type_0" value="NIT" {{ $id->document_type == 'NIT' ? 'checked' : '' }}>
                                <label for="document_type_1">Cédula</label>
                                <input type="radio" name="document_type" class="document_type" id="document_type_1" value="Cédula" {{ $id->document_type == 'Cédula' ? 'checked' : '' }}>
                                <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="document">Número</label>
                                <input type="number" name="document" id="document" class="form-control" value="{{ $id->document }}" placeholder="Número de identificación">
                                <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $id->email }}" placeholder="example@mail.com">
                                <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number">Celular</label>
                                <input type="number" name="number" id="number" class="form-control" value="{{ $id->number }}" placeholder="Celular">
                                <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section> 
@endsection