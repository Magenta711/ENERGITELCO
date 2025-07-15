@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Categoría de producto solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Energías</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Categoría</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                <div class="box-title">Equipo Solar</div>
                <div class="box-tools">
                    <a href="{{ route('energy_products') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Nombre de la Categoría</label>
                            <input type="text" class="form-control" name="category" id="category"
                                value="{{ $id->name ?? old('category') }}" placeholder="Nombre de la categoría">
                        </div>
                    </div>
                </div>
                <hr>
                <h4><b>Subcategoría</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a class="btn btn-success" data-toggle="modal" data-target=".category-modal-lg" >Nueva
                                Subcategoría</a>
                        </div>
                    </div>
                </div>
                @foreach ($id->subcategories as $item)
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $item->id }}">
                                    {{ $item->name }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-{{ $item->id }}" class="panel-collapse collapse">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="" class="btn btn-success" data-toggle="modal"
                                        data-target=".create-product-{{ $item->id }}-modal-lg">Agregar productos</a>
                                        @if ($item->SoldProducts() == 0)
                                            <a href="" class="btn btn-danger" data-target=".delete-category-{{ $item->id }}-modal-lg" data-toggle="modal">Eliminar categoría</a>
                                        @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive table-hover">
                                        <table id="table_index" class="table table-striped table-bordered text-center"
                                            data-page-length='15'>
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Modelo</th>
                                                    <th class="text-center">Tipo Producto</th>
                                                    <th class="text-center">Equipos disponibles</th>
                                                    <th class="text-center">Equipos Vendidos</th>
                                                    <th class="text-center">Precio</th>
                                                    <th class="text-center">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($item->SameProducts() as $items)
                                                    <tr>
                                                        <td>{{ $items->model }}</td>
                                                        <td>{{ $items->type }}</td>
                                                        <td>{{ $item->AvailableProducts($items->type, 1) }}</td>
                                                        <td>{{ $item->SoldProducts($items->type, 3) }}</td>
                                                        </td>
                                                        <td>${{ number_format($items->price, 2, ',', '.') }}</td>
                                                        <td>
                                                            @can('Ver Productos')
                                                                <a href="{{ route('energy_products_types', [$id->id, $items->type]) }}"
                                                                    class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                            @endcan
                                                            @if ($items->status == 1)
                                                                @can('Editar Productos')
                                                                    <a href="" class="btn btn-warning" data-toggle="modal"
                                                                        data-target=".edit-product-{{ $items->id }}-modal-lg"><i
                                                                            class="fa fa-edit"></i></a>
                                                                @endcan
                                                                @if ( $item->SoldProducts($items->type) == 0)
                                                                        <a href="" class="btn btn-danger" data-toggle="modal"
                                                                            data-target=".delete-{{ $items->id }}-modal-lg"><i
                                                                                class="fa fa-trash"></i></a>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @include('energy.products.types.edit')
                                                    @include('energy.products.types.delete')
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('energy.products.types.create')
                    @include('energy.products.delete')
                @endforeach
            </div>
            @include('energy.products.includes.subcategory')
            @include('energy.products.includes.subcategory_review')
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/$theme/bower_components/select2/dist/css/select2.min.css") }}">
@endsection

@section('js')
    <script src="{{ asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
    <script src="{{ asset('js/project/mintic/create.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#file_create').change(function() {
                $($('#' + this.id).parent().children('label')).addClass('text-aqua');
                readImage(this);
            });
            $('.file-edit').change(function() {
                let id = this.id.split('_')[this.id.split('_').length - 1];
                $($('#' + this.id).parent().children('label')).addClass('text-aqua');
                readImageEdit(this, id);
            });
        });

        function readImageEdit(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preimg_edit_' + id).attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preimg_create').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
