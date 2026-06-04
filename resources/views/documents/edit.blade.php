@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Editar documentos <small>Lista maestra de documentos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Lista maestra de documentos</a></li>
        <li class="active">Editar documentos</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Editar documento</div>
            <div class="box-tools">
                <a href="{{route('documents')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
            </div>
        </div>
        <form action="{{route('documents_update',$id->id)}}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Código</label>
                            <input type="text" class="form-control" name="code" id="code" value="{{$id->code}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$id->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="version">Versión</label>
                            <input type="text" class="form-control" name="version" id="version" value="{{$id->version}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" class="form-control" name="date" id="date" value="{{$id->date}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="page_total">Paginas</label>
                            <input type="text" class="form-control" name="page_total" id="page_total" value="{{$id->page_total}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contract">Contratación</label>
                            <br>
                            <label>
                                <input type="radio" {{ ($id->contract == '1' ) ? 'checked' : '' }} name="contract" class="" id="option1" value="1"> Si
                            </label>
                            <label>
                                <input type="radio" {{ ($id->contract == '0' ) ? 'checked' : '' }} name="contract" class="" id="option2" value="0"> No
                            </label>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-3">
                            <label for="status">Estado</label>
                            <br>
                            <label>
                                <input type="radio" {{ ($id->status == '1' ) ? 'checked' : '' }} name="status" id="option1" value="1"> Activo
                            </label>
                            <label>
                                <input type="radio" {{ ($id->status == '0' ) ? 'checked' : '' }} name="status" id="option2" value="0"> Inactivo
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 m-3">
                        <div class="form-group">
                            <label for="file">Documento</label>
                            <br>
                            <label for="file" id="label_photo" class="form-control text-center"><span class="fa fa-upload"></span></label>  
                            <input type="file" name="file" id="file" class="hide">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-sm btn-success btn-send">Guardar</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#file').change(function (){
            $('#label_photo').addClass('text-aqua');
        });
    });
</script>
@endsection