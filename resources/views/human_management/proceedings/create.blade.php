@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear actas
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Actas</a></li>
        <li class="active">Editar actas</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Editar acta</h3>
                <div class="box-tools">
                    <a href="{{route('proceeding')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="hide">
                @foreach ($users as $user)
                    <input type="hidden" value="{{$user->name}}" id="name_user_{{$user->id}}">
                    <input type="hidden" value="{{$user->position->name}}" id='position_user_{{$user->id}}'>
                @endforeach
            </div>
            <form action="{{route('proceeding_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="box-body">
                <h4>Asistentes</h4>
                <div id="destino_assistants">
                    <div id="origen_assistants" class="row">
                        <div class="col-sm-3">
                            <label for="assistants_id_0">Cedula</label>
                            <select class="form-control user_id" name="assistants_id[]" id="assistants_id_0">
                                <option disabled selected></option>
                                @foreach ($users as $user)
                                    <option {{auth()->id() == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->cedula}} - {{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="assistants_name_0">Nombre</label>
                            <input type="text" class="form-control name" name="name[]" id="assistants_name_0" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label for="assistants_position_0"></label>
                            <input type="text" class="form-control position" name="position[]" id="assistants_position_0" readonly>
                        </div>
                        <div class="col-auto">
                            <br>
                            <i class="fa fa-trash remove" id="assistants_remove_0"></i>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-link btn-clonar" id="assistants_clonar"><i class="fa fa-plus"></i> Agegar asistente</button>
                <hr>
                <h4>Invitatos</h4>
                <div id="destino_guest">
                    <div id="origen_guest" class="row">
                        <div class="col-sm-3">
                            <label for="guest_id_0">Cedula</label>
                            <select class="form-control user_id" name="guest_id[]" id="guest_id_0">
                                <option disabled selected></option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->cedula}} - {{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="guest_name_0">Nombre</label>
                            <input type="text" class="form-control name" name="name[]" id="guest_name_0" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label for="guest_position_0"></label>
                            <input type="text" class="form-control position" name="position[]" id="guest_position_0" readonly>
                        </div>
                        <div class="col-auto">
                            <br>
                            <i class="fa fa-trash remove" id="guest_remove_0"></i>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-link btn-clonar" id="guest_clonar"><i class="fa fa-plus"></i> Agegar invitado</button>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{old('city') ?? 'Medellín'}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{old('date') ?? now()->format('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="time_start">Hora de inicio</label>
                            <input type="time" class="form-control" id="time_start" name="time_start" value="{{old('time_start')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="time_end">Hora final</label>
                            <input type="time" class="form-control" id="time_end" name="time_end" value="{{old('time_end')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="place">Lugar</label>
                            <input type="text" class="form-control" id="place" name="place" value="{{old('place')}}">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="affair">Motivo</label>
                            <input type="text" class="form-control" id="affair" name="affair" value="{{old('affair') ?? 'ACTAS DE REUNIÓN'}}">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="theme">Temas</label>
                    <div class="form-group">
                        <textarea class="textarea" id="theme" style="width: 100%;" name="theme"> @if (old('theme')) {{old('theme')}} @else <h4>Temas:</h4><ol> <li><b>Verificación del quórum:</b></li><li><b>Lectura del acta anterior:</b></li><li><b>Desarrollo de los contenidos, incluyendo los acuerdos tomados:</b></li><li><b>Asignación de tareas:</b></li></ol> @endif </textarea>
                        <input type="hidden" name="_wysihtml5_mode" value="1">
                        <iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="width: 100%;"></iframe>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="development">Desarrollo</label>
                    <textarea class="textarea" id="development" style="width: 100%;" name="development">@if (old('development')) {{old('development')}} @else <h4>Desarrollo de la reunión:</h4> <ol><li><b>Verificación de quórum.</b></li><li><b>Lectura del acta anterior.</b></li><li><b>Asignación y cumplimiento de las funciones de cada uno de los integrantes del comité.</b></li><li><b>Desarrollo de los contenidos, incluyendo los acuerdos tomados.</b></li><li><b>Asignación de tareas.</b></li><li><b>Fin de reunión.</b></li> </ol>@endif </textarea>
                    <input type="hidden" name="_wysihtml5_mode" value="1">
                    <iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="width: 100%;"></iframe>
                </div>
                <hr>
                <div id="destino_commitment">
                    <div id="origer_commitment" class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="user_id_0">Funcionario</label>
                                <select name="user_id[]" id="user_id_0" class="form-control commitment_user_id">
                                    <option selected disabled></option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->cedula}} - {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="commitment_0">Compromiso</label>
                                <input type="text" name="commitment[]" class="form-control commitment" id="commitment_0">
                            </div>
                        </div>
                        <div class="col-auto">
                            <br>
                            <i class="fa fa-trash remove" id="commitment_remove_0"></i>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-link bnt-clone-commitment" id="commitment_clone"><i class="fa fa-plus"></i> Agregar compromiso</button>
                <hr>
                <div class="form-group">
                    <label for="file">Adjuntar archivos</label>
                    <label id="label_file" for="file" class="form-control text-center "><i class="fa fa-upload"></i></label>
                    <input class="hide file_input" type="file" multiple="true" name="files[]" id="file">
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-sm btn-primary btn-send">Enviar y firmar</button>
            </div>
        </form>
        </div>
    </section>
@endsection

@section('css')
{{-- wysihtml5-supported --}}
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <script>
        $(function () {
          $('.textarea').wysihtml5()
        })

        $(document).ready(function() {
            let users = $('.user_id');
            for (let i = 0; i < users.length; i++) {
                select(users[i].id);
            }
            incre=0;
            $(".btn-clonar").click(function() {
                incre++;
                type = this.id.split('_')[0];
                newELement = $('#origen_'+type).clone().appendTo('#destino_'+type);
                newELement.attr('id','div_'+type+'_'+incre);
                newELement.children('.col-sm-4').children('.name').attr('id',type+'_name_'+incre).val('');
                newELement.children('.col-sm-4').children('.position').attr('id',type+'_position_'+incre).val('');
                newELement.children('.col-sm-3').children('.user_id').attr('id',type+'_id_'+incre).change(function () {
                    select(this.id);
                });
                newELement.children('.col-auto').children('.remove').attr('id',type+'_remove_'+incre).click(function () {
                    remove(this.id);
                });
            });
            $(".bnt-clone-commitment").click(function() {
                incre++;
                type = this.id.split('_')[0];
                newELement = $('#origer_commitment').clone().appendTo('#destino_commitment');
                newELement.attr('id','div_'+type+'_'+incre);
                newELement.children('.col-sm-3').children('.user_id').attr('id','user_id_'+incre).val('');
                newELement.children('.col-sm-8').children('.commitment').attr('id','commitment_'+incre);
                newELement.children('.col-auto').children('.remove').attr('id',type+'_remove_'+incre).click(function () {
                    remove(this.id);
                });
            });
            
            $('.user_id').change(function () {
                select(this.id);
            });
        });
        
        function remove(id) {
            idU = id.split('_')[id.split('_').length - 1];
            type = id.split('_')[0];
            if (idU != 0) {
                $('#div_'+type+'_'+idU).remove();
            }
        }
        
        function select(id) {
            idU = id.split('_')[id.split('_').length - 1];
            type = id.split('_')[0];
            idUGet = $('#'+type+'_id_'+idU).val();
            $('#'+type+'_name_'+idU).val($('#name_user_'+idUGet).val());
            $('#'+type+'_position_'+idU).val($('#position_user_'+idUGet).val());
        }
        
      </script>
@endsection