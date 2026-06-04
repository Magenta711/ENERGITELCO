@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Nueva hoja de vida <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">hojas de vida</a></li>
        <li class="active">Crear hoja de vida</li>
    </ol>
</section>
<section class="content">
     
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Hoja de vida</div>
        </div>
        <form action="{{route('curriculum_store3',$id->id)}}" method="post">
            @csrf
            @method('PUT')
        <div class="box-body">
            <h4>B) Declaración sobre familiares que laboren con claro y otros</h4>
            <div class="form-group">
                <label for="has_familiary">¿Tiene el trabajador familiares que trabajen con Claro? Si la respuesta anterior es positiva relacione lo siguiente:</label>
                <div class="radio">
                    <label>
                            <input type="radio" {{(old('has_familiary') == '1') ? 'checked' : ''}} value="1" name="has_familiary" id="option1"> Si
                    </label>
                    <label>
                            <input type="radio" {{(old('has_familiary') == '0') ? 'checked' : ''}} value="0" name="has_familiary" id="option2"> No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name_r">Nombre</label>
                        <input type="text" name="name_r" value="{{old('name_r')}}" id="name_r" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="parent">Parentesco</label>
                        <input type="text" name="parent" value="{{old('parent')}}" id="parent" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="position_id_r">Cargo</label>
                        <select name="position_i_rd" class="form-control" id="position_id_r">
                            <option selected disabled></option>
                            @foreach ($positions as $item)
                                <option {{(old('position_id_r') == $item->id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="has_limitation">¿Tiene o ha tenido alguna limitación osteomuscular? (Relacionada con los músculos, los huesos, los tendones, los ligamentos, las articulaciones y los cartílagos)</label>
                <div class="radio">
                    <label>
                            <input type="radio" {{(old('has_limitation') == '1') ? 'checked' : ''}} value="1" name="has_limitation" id="option1"> Si
                    </label>
                    <label>
                            <input type="radio" {{(old('has_limitation') == '0') ? 'checked' : ''}} value="0" name="has_limitation" id="option2"> No
                    </label>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Enviar y firmar</button>
        </div>
        </form>
    </div>
</section>
@endsection