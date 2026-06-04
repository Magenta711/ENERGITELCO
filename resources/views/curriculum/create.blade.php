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
<div class="hide">
    @foreach ($users as $item)
        <input type="hidden" disabled name="name" id="name_{{$item->id}}" value="{{$item->name}}">
        <input type="hidden" disabled name="cedula" id="cedula_{{$item->id}}" value="{{$item->cedula}}">
        <input type="hidden" disabled name="cedula" id="telefono_{{$item->id}}" value="{{$item->telefono}}">
        <input type="hidden" disabled name="email" id="email_{{$item->id}}" value="{{$item->email}}">
        <input type="hidden" disabled name="direccion" id="direccion_{{$item->id}}" value="{{$item->direccion}}">
        <input type="hidden" disabled name="position_id" id="position_id_{{$item->id}}" value="{{$item->position_id}}">
        <input type="hidden" disabled name="age" id="age_{{$item->id}}" value="{{$item->register ? $item->register->age : ''}}">
        <input type="hidden" disabled name="marital_status" id="marital_status_{{$item->id}}" value="{{$item->register ? $item->register->marital_status : ''}}">
    @endforeach
</div>
<section class="content">
     
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Hoja de vida</div>
            <div class="box-tools"><a href="{{route('curriculums')}}" class="btn btn-sm btn-primary">Volver</a></div>
        </div>
        <form action="{{route('curriculum_store')}}" method="POST" autocomplete="off">
            @csrf
        <div class="box-body">
            <h4>A) Documentación para ingreso del trabajador</h4>
            <small>Seleccione la entrevista o usuario registrado y completa la información</small>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="register_id">Seleccione la entrevista</label>
                        <select name="register_id" class="form-control" id="register_id">
                            <option selected disabled></option>
                            <option value="0">No cuenta con entrevista</option>
                            @foreach ($registers as $item)
                                @if (!$item->curriculum)
                                    <option {{old('register_id') == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->document.' '.$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6" id="user_block" style="display: none">
                        <label for="user_id">Seleccione usuario</label>
                        <select name="user_id" class="form-control" id="user_id">
                            <option selected disabled></option>
                            <option value="0">No es usuario registrado</option>
                            @foreach ($users as $item)
                                @if (!$item->register || ($item->register && !isset($item->register->curriculum)))
                                    <option {{old('user_id') == $item->id ? 'selected' : ''}} value="{{$item->id}}">{!!$item->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$item->name!!}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div id="register_user" style="{{ ( old('name') || old('document') || old('email') || old('address') || old('age') || old('position_id')) ? 'display: block' : 'display: none'}}">
                <hr>
                <h5>Información general</h5><small>En caso que no cuente con entrevista llenar</small>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="document">Número de documento</label>
                            <input type="text" name="document" value="{{old('document')}}" id="document" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Correo eletrónico</label>
                            <input type="text" name="email" value="{{old('email')}}" id="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" value="{{old('address')}}" id="address" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="age">Edad</label>
                            <input type="number" name="age" value="{{old('age')}}" id="age" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="marital_status">Estado civil</label>
                            <select name="marital_status" id="marital_status" class="form-control">
                                <option disabled selected></option>
                                <option {{old('marital_status') == 'Soltero' ? 'selected' : ''}} value="Soltero">Soltero</option>
                                <option {{old('marital_status') == 'Casado' ? 'selected' : ''}} value="Casado">Casado</option>
                                <option {{old('marital_status') == 'Viudo' ? 'selected' : ''}} value="Viudo">Viudo</option>
                                <option {{old('marital_status') == 'Unión libre' ? 'selected' : ''}} value="Unión libre">Union libre</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="position_id">Cargo</label>
                            <select name="position_id" id="position_id" class="form-control">
                                <option selected disabled></option>
                                @foreach ($positions as $position)
                                    <option {{old('position_id') == $position->id ? 'selected' : ''}} value="{{$position->id}}">{{$position->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Continuar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#register_id").change(function(e){
                if ($("#register_id").val() == 0){
                    $("#user_block").show('fast');
                    if ($("#user_id").val()){
                        $("#register_user").show('fast');
                    }else {
                        $("#register_user").hide('fast');
                    }
                }else {
                    $("#user_block").hide('fast');
                    $("#register_user").hide('fast');
                }
            });
            $("#user_id").change(function(e){
                valu = $("#user_id").val();
                if (valu){
                    $("#register_user").show('fast');
                    if (valu != 0) {
                        $("#name").val($("#name_"+valu).val());
                        $("#tel").val($("#telefono_"+valu).val());
                        $("#document").val($("#cedula_"+valu).val());
                        $("#email").val($("#email_"+valu).val());
                        $("#address").val($("#direccion_"+valu).val());
                        $("#position_id").val($("#position_id_"+valu).val());
                        $("#address").val($("#direccion_"+valu).val());
                        $("#marital_status").val($("#marital_status_"+valu).val());
                        $("#age").val($("#age_"+valu).val());
                    }
                }else {
                    $("#register_user").hide('fast');
                }
            });
        });
    </script>
@endsection