@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar hoja de vida <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Hojas de vida</a></li>
        <li class="active">Editar hoja de vida</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Hoja de vida</div>
            <div class="box-tools"><a href="{{route('curriculums')}}" class="btn btn-sm btn-primary">Volver</a></div>
        </div>
        <div class="box-body">
            <form action="{{route('curriculum_update',$id->id)}}" method="POST" autocomplete="off" enctype="multipart/form-data" id="formulary">
                @csrf
                @method('PUT')
                <h4>A) Documentación para ingreso del trabajador</h4>
                <h4>Información general</h4>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" value="{{$id->register->name}}" id="name" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="document">Número de documento</label>
                                    <input type="text" name="document" value="{{$id->register->document}}" id="document" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Correo eletrónico</label>
                                    <input type="text" name="email" value="{{$id->register->email}}" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="address">Dirección</label>
                                    <input type="text" name="address" value="{{$id->register->address}}" id="address" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="age">Edad</label>
                                    <input type="number" name="age" value="{{$id->register->age}}" id="age" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="marital_status">Estado civil</label>
                                    <select name="marital_status" id="marital_status" class="form-control">
                                        <option disabled selected></option>
                                        <option {{($id->register->marital_status) == 'Soltero' ? 'selected' : ''}} value="Soltero">Soltero</option>
                                        <option {{($id->register->marital_status) == 'Casado' ? 'selected' : ''}} value="Casado">Casado</option>
                                        <option {{($id->register->marital_status) == 'Viudo' ? 'selected' : ''}} value="Viudo">Viudo</option>
                                        <option {{($id->register->marital_status) == 'Unión libre' ? 'selected' : ''}} value="Unión libre">Union libre</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="position_aspires_id">Cargo al que aspira</label>
                                    <select name="position_aspires_id" id="position_aspires_id" class="form-control">
                                        <option selected disabled></option>
                                        @foreach ($positions as $position)
                                            <option {{($id->register->position_id) == $position->id ? 'selected' : ''}} value="{{$position->id}}">{{$position->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="photo">Foto</label>
                        <div class="form-group text-center">
                            <img src="{{ '/img/interview/'.$id->register->photo }}" alt="{{$id->register->photo}}" class="img-fluid img-thumbnail" style="border-radius: 50%"  width="250px">
                            <label for="photo" id="label_photo" class="form-control text-center"><i class="fa fa-upload"></i></label>
                            <input type="file" accept="image/*" name="photo" value="{{$id->register->photo}}" id="photo" class="hide">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>B) Declaración sobre familiares que laboren con claro y otros</h4>
                <div class="form-group">
                    <label for="has_familiary">¿Tiene el trabajador familiares que trabajen con Claro? Si la respuesta anterior es positiva relacione lo siguiente:</label>
                    <div class="radio">
                        <label>
                                <input type="radio" {{($id->has_familiary == '1') ? 'checked' : ''}} value="1" name="has_familiary" id="hasFamily1"> Si
                        </label>
                        <label>
                                <input type="radio" {{($id->has_familiary == '0') ? 'checked' : ''}} value="0" name="has_familiary" id="hasFamily2"> No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">Nombre</label>
                            <input type="text" name="name_r" value="{{$id->name_r}}" id="name_r" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="parent">Parentesco</label>
                            <input type="text" name="parent" value="{{$id->parent}}" id="parent" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="position_id_r">Cargo</label>
                            <select name="position_id_r" class="form-control" id="position_id_r">
                                <option selected disabled></option>
                                @foreach ($positions as $item)
                                    <option {{($id->position_id_r == $item->id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
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
                                <input type="radio" {{($id->has_limitation == '1') ? 'checked' : ''}} value="1" name="has_limitation" id="hasLimitation1"> Si
                        </label>
                        <label>
                                <input type="radio" {{($id->has_limitation == '0') ? 'checked' : ''}} value="0" name="has_limitation" id="hasLimitation2"> No
                        </label>
                    </div>
                </div>
            </form>
            <hr>
            @php
                $i = 1;
            @endphp
            <h4>Documentación adjunta</h4>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Hoja de vida'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificados de estudio (BACHILLERATO, TECNICO, CURSOS Y/O ESTUDIOS SUPERIORES)'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Fotocopia de cédula','hasDate' => true])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Fotocopia de libreta militar'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Fotocopia de libreta militar o de la matrícula profesional conte'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Fotocopia de licencia de condución','hasDate' => true])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Foto fondo blanco, traje formal'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de antecedentes emitido por la procuraduria'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de antecedentes emitido por la policia nacional'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Dos referencias laborales'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Dos referencias personales'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de revisión en el SIMIT'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Carta de su actual fondo de pensiones (Si aplica)'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Carta de su actual fondo de EPS (Si aplica)'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de apertura de cuenta de Bancolombia'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Concepto de examenes médicos ocupacionales','hasDate' => true])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Concepto de examenes sustancias psicoactivas'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a la ARL'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a la EPS'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a AFP'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a cesantías'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a caja de compensación'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de curso de trabajo seguro en alturas', 'hasDate' => true])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de coordinador de trabajo en alturas'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de curso de virtual de 50 horas sobre SST','hasDate'=>true])
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary btn-send" onclick="event.preventDefault();
                    document.getElementById('formulary').submit();">Guardar</button>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/upload.js')}}"></script>
@endsection