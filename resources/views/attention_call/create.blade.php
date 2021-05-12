@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear un descargo, llamados de atencion o felicitaciones <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Descargo</li>
        <li class="active">Crear un descargo</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('attention_call')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('call_store')}}" method="post">
        @csrf
        <div class="box-body">
            @foreach ($usuarios as $usuario)
                <input type="hidden" disabled value="{{$usuario->name}}" id="name_{{$usuario->id}}">
                <input type="hidden" disabled value="{{$usuario->position->name}}" id="position_{{$usuario->id}}">
            @endforeach
            <div id="destino">
                <div id='origen' class="form-group row">
                    <div class="col-md-3">
                        <label for="users_id_0">Número de documento</label>
                        <select name="cedula[]" id="users_id_0" class="form-control select_user">
                            <option value="" disabled selected></option>
                            @foreach ($usuarios as $usuario)
                                @if (auth()->user()->position->jerarquia < $usuario->position->jerarquia)
                                    <option value="{{$usuario->id}}">{!!$usuario->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$usuario->name!!}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="user_name_0">Nombre completo funcionario</label>
                        <input type="text" disabled name="name[]" value="{{old('name')}}" class="form-control user_name" id="user_name_0" placeholder="Nombre" >
                    </div>
                    <div class="col-md-4">
                        <label for="user_rol_0">Rol autorizado</label>
                        <input type="text" disabled name="rol[]" value="{{old('rol')}}" class="form-control user_rol" id="user_rol_0" placeholder="Rol">
                    </div>
                    <div class="col-auto">
                        <br>
                        <i class="fa fa-trash remove_user" id="remove_user_0" style="width:15px; cursor: pointer; margin:10px; margin-top: 15px;"></i>
                    </div>
                </div>
            </div>
            <button type="button" id="clonar_user" class="btn btn-sm btn-link">
                <i class="fa fa-plus"></i>
                Agregar usuario
            </button>
            
            <div class="form-group">
                <label for="affair">Asunto</label>
                <input type="text" name="affair" id="affair" value="{{old('affair')}}" placeholder="Asunto" class="form-control">
            </div>
            <div class="form-group">
                <label for="references">Referencias</label>
                <textarea name="references" id="references" cols="30" rows="3" class="form-control">{{old('references')}}</textarea>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Enviar y firmar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        incre=0;
        $("#clonar_user").click(function() {
            incre++;
            newELement = $("#origen").clone().appendTo("#destino");
            newELement.attr('id','div_user_'+incre);
            newELement.children('.col-md-4').children('.user_name').attr('id','user_name_'+incre).val('');
            newELement.children('.col-md-4').children('.user_rol').attr('id','user_rol_'+incre).val('');
            newELement.children('.col-md-3').children('.select_user').attr('id','users_id_'+incre).change(function () {
                select_user(this.id);
            });
            newELement.children('.col-auto').children('.remove_user').addClass('aquitoy').attr('id','remove_user_'+incre).click(function () {
                remove_user(this.id);
            });
        });
        
        $('.remove_user').click(function () {
            remove_user(this.id);
        });
        
        $('.select_user').change(function () {
            select_user(this.id);
        });
    });
    
    function remove_user(id) {
        idU = id.split('_')[id.split('_').length - 1];
        if (idU != 0) {
            $('#div_user_'+idU).remove();
        }
    }
    
    function select_user(id) {
        idU = id.split('_')[id.split('_').length - 1];
        idUGet = $('#users_id_'+idU).val();
        $('#user_name_'+idU).val($('#name_'+idUGet).val());
        $('#user_rol_'+idU).val($('#position_'+idUGet).val());
    }
</script>
@endsection