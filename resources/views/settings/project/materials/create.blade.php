@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear material <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li><a href="#">materiales</a></li>
        <li class="active">Crear materiales</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
                    <h3 class="box-title">Crear un nuevo material</h3>
                    <div class="box-tools">
                        <a href="{{route('materials_setting')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <div class="hide">
                    <div id="selectConsumables" class="form-group divConsumable">
                        <div class="row">
                            <div class="col-md-11">
                                <label for="consumable">Consumible</label>
                                <select name="consumable[]" id="consumable" class="form-control selectConsumable">
                                    <option disabled selected></option>
                                    @foreach ($consumables as $consumable)
                                        <option value="{{$consumable->id}}">{{$consumable->id}}. {{$consumable->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <br>
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="removeConsumable" style="width:15px; cursor: pointer; margin:10px; margin-top: 15px;" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="row" id="action">
                            <br>
                        </div>
                        <label for="formula">Formula</label>
                        <input type="text" name="formula[]" id="formula" class="form-control" readonly>
                        <hr>
                    </div>
                    <select name="selectOperators[]" id="selectOperators" class="form-control">
                        <option></option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="(">(</option>
                        <option value=")">)</option>
                    </select>
                    <input type="text" name="selectOperators[]" id="inputNumbers" class="form-control">
                    <select name="selectOperators[]" id="selectRush" class="form-control">
                        <option></option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->place == 2 ? 'acomedida_'.$material->id : 'material_'.$material->id }}">{{$material->id}}. {{$material->description}}</option>
                        @endforeach
                    </select>
                    <select name="selectOperators[]" id="selectCondicionals" class="form-control">
                        <option></option>
                        <option class="longitudOption" value="longitud">Longitud</option>
                        <option value="totalMarquilla">Total de marquillas RF</option>
                    </select>
                </div>
                    <!-- /.box-header -->
                <form action="{{route('materials_setting_store')}}" method="post"  autocomplete="off">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="description">Descripción del material</label>
                            <input type="text" name="description" id="description" value="{{old('description')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="project_type">Tipo de proyecto</label>
                            <select name="project_type" id="project_type" class="form-control">
                                <option selected disabled>Tipo de proyecto</option>
                                @foreach ($project_types as $type)
                                    <option {{($type->id == old('project_type')) ? 'selected' : ''}} value="{{$type->id}}">{{$type->type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="place">Ubicación</label>
                            <select name="place" id="place" class="form-control">
                                <option selected disabled></option>
                                <option {{(1 == old('place')) ? 'selected' : ''}} value="1">Material</option>
                                <option {{(2 == old('place')) ? 'selected' : ''}} value="2">Acomedida</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hasLength">Tiene longitud linea de metros DC o RG</label>
                            <select name="hasLength" id="hasLength" class="form-control">
                                <option {{(2 == old('hasLength')) ? 'selected' : ''}} value="0">No</option>
                                <option {{(1 == old('hasLength')) ? 'selected' : ''}} value="1">Si</option>
                            </select>
                        </div>
                        <hr>
                        <h3>Relación de formulas</h3>
                        <div id="destinyConsumables">

                        </div>
                        <button id="addConsumable" class="btn btn-sm btn-link">Agregar consumible</button>
                    </div>
                    <div class="box-footer">
                        <button id="save" class="btn btn-sm btn-success">Guardar</button>
                    </div>
                </form>
            </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('js/project/materials.js') }}" defer></script>
@endsection