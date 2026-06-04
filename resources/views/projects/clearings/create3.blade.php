@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear proyecto de desmonte <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Desmontes</a></li>
        <li class="active">Crear desmontes</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Crear proyecto de desmonte</div>
            <div class="box-tools">
                <a href="{{route('clearings')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{ route('clearings_store3',$id->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="box-body">
            <h4>7. Inventario</h4>
            <h3>Estación A</h3>
            <hr>
            <div class="origen" id="origen_a">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name_element_a_1">Nombre del elemento</label>
                            <input type="text" name="name_element[]" id="name_element_a_1" class="form-control">
                            <input type="hidden" name="estation[]" id="estation_a_1" value="a">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="code_material_a_1">Codigo material</label>
                            <input type="text" name="code_material[]" id="code_material_a_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="serial_part_a_1">Serial/numero parte</label>
                            <input type="text" name="serial_part[]" id="serial_part_a_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type_active_a_1">Tiene activo</label>
                            <input type="text" name="type_active[]" id="type_active_a_1" class="form-contol">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="file_a_1" class="form-control text-center" id="label_file_1"><i class="fa fa-upload"></i></label>
                            <input type="file" accept="image/*" name="file[]" id="file_a_1" class="file_input hide">
                        </div>
                    </div>
                </div>
                {{-- @include('projects.clearings.includes.upload',['num' => $i++,'it'=>'a','label'=>'Fotos de la estacion base']) --}}
                <hr>
            </div>
            <div id="destino_a"></div>
            <button type="button" class="btn btn-sm btn-link add_element"  id="add_element_a"><i class="fa fa-plus"></i> Agregar equipo</button>
            <hr>
            <h3>Estación B</h3>
            <hr>
            <div class="origen" id="origen_b">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name_element_b_1">Nombre del elemento</label>
                            <input type="text" name="name_element[]" id="name_element_b_1" class="form-control">
                            <input type="hidden" name="estation[]" id="estation_b_1" value="b">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="code_material_b_1">Codigo material</label>
                            <input type="text" name="code_material[]" id="code_material_b_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="serial_part_b_1">Serial/numero parte</label>
                            <input type="text" name="serial_part[]" id="serial_part_b_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type_active_b_1">Tiene activo</label>
                            <br>
                            <input type="text" name="type_active[]" id="type_active_b_1" class="form-contol">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Foto serial</label>
                            <label for="file_b_1" class="form-control text-center" id="label_fil"><i class="fa fa-upload"></i></label>
                            <input type="file" accept="image/*" name="file[]" id="file_b_1" class="file_input hide">
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Foto información del elemento</label>
                            <label for="file_b_1" class="form-control text-center" id="label_fil"><i class="fa fa-upload"></i></label>
                            <input type="file" accept="image/*" name="file[]" id="file_b_1" class="file_input hide">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Foto activo</label>
                            <label for="file_b_1" class="form-control text-center" id="label_fil"><i class="fa fa-upload"></i></label>
                            <input type="file" accept="image/*" name="file[]" id="file_b_1" class="file_input hide">
                        </div>
                    </div> --}}
                </div>
                {{-- @include('projects.clearings.includes.upload',['num' => $i++,'it'=>'a','label'=>'Fotos de la estacion base']) --}}
                <hr>
            </div>
            <div id="destino_b"></div>
            <button type="button" class="btn btn-sm btn-link add_element" id="add_element_b"><i class="fa fa-plus"></i>Agregar equipo</button>
            <hr>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary" id="send">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection
@section('js')
    <script src="{{asset('js/project/clearing/create3.js')}}"></script>
@endsection