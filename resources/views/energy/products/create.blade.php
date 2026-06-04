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
            <div class="box-title"> Equipo Solar</div>
            <div class="box-tools">
                <a href="{{ route('energy_products') }}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{ route('energy_products.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Cantidad de Equipos</label>
                                    <small>(Equipos del mismo modelo que se registrarán)</small>
                                    <input type="number" class="form-control" name="amount" id="amount"   value="{{ old('amount') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="file_create">Imagen</label><br>
                                    <div class="text-center mb-3" style="padding: 10px; width: 100%;">
                                        <img src="" alt="" width="40%" id="preimg_create">
                                    </div>
                                    <label for="file_create" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file" id="file_create" class="hide" accept="image/*"  value="{{ old('file') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type">Tipo de Equipo</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="Inversor Solar">Inversor Solar</option>
                                        <option value="Inversor de Potencia">Inversor de Potencia</option>
                                        <option value="Batería">Batería</option>
                                        <option value="Panel Solar">Panel Solar</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="model">Modelo</label>
                                    <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serie">Serie</label>
                                    <input type="text" class="form-control" id="serie" name="serie" value="{{ old('serie') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="potencia">Potencia</label>
                                    <input type="text" class="form-control" id="potencia" name="potencia" value="{{ old('potencia') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Precio</label>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="garantia">Garantía</label>
                                    <input type="text" class="form-control" id="garantia" name="garantia" value="{{ old('garantia') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desription">Descripción</label>
                                    <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                    </div>
                    <button class="btn btn-success submit">Guardar</button>
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
    <script>
        $(document).ready(function() {
            $('#file_create').change(function () {
                $($('#'+this.id).parent().children('label')).addClass('text-aqua');
                readImage(this);
            });
            $('.file-edit').change(function () {
                let id = this.id.split('_')[this.id.split('_').length - 1];
                $($('#'+this.id).parent().children('label')).addClass('text-aqua');
                readImageEdit(this,id);
            });
        });

        function readImageEdit (input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preimg_edit_'+id).attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readImage (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preimg_create').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
      </script>
@endsection
