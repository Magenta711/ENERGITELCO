@php
    $arrayPermissionUsers = array();
    foreach ($works as $key => $value) {
        foreach ($value->users as $key => $user) {
            $arrayPermissionUsers[$user->id] = [ 'form' => $key, 'status' => $value->estado, 'date' => $value->create_at,'startTime' => $value->hora_inicio, 'endTime' => $value->hora_final ];
        }
    }

    function hasPermission ($id,$arrayPermissionUsers) {
        if (array_key_exists($id,$arrayPermissionUsers)) {
            return $arrayPermissionUsers[$id];
        }
        return false;
    }
@endphp
@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Asistencia
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Asistencia</a></li>
        <li class="active">Editar</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Editar asistencia</h3>
                <div class="box-tools">
                    <a href="{{route('assistance')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('assistance_update',$id->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" class="form-control" value="{{$id->date}}" id="date" name="date" readonly>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Asistencia</td>
                                <td>Documento</td>
                                <td>Nombre</td>
                                <td>Cargo</td>
                                <td>Oficina</td>
                                <td>Campo</td>
                                <td>Hora de llegada</td>
                                <td>Hora de salida</td>
                                <td>Comentarios</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($id->attendees as $att)
                                @php
                                    $hasPermission = hasPermission($att->user_id,$arrayPermissionUsers);
                                @endphp
                                <tr>
                                    <td><input type="checkbox" class="assistance_check" name="assistance[{{$att->user_id}}]" value="{{$att->user_id}}" id="assistance_{{$att->user_id}}" {{ $att->assistance_check ? 'checked' : ($hasPermission ? 'checked' : '')}}></td>
                                    <td>{{$att->user->cedula}}</td>
                                    <td>{{$att->user->name}}</td>
                                    <td>{{$att->user->position->name}}</td>
                                    <td><input type="radio" name="where[{{$att->user_id}}]" id="where_1_{{$att->user_id}}" value="Oficina" {{$att->where == 'Oficina' ? 'checked' : ''}} {{ $att->assistance_check ? '' : 'disabled'}}></td>
                                    <td><input type="radio" name="where[{{$att->user_id}}]" {{ $hasPermission ? 'checked' : ''}} id="where_2_{{$att->user_id}}" value="Campo" {{$att->where == 'Campo' ? 'checked' : ''}} {{ $att->assistance_check ? '' : 'disabled'}}></td>
                                    <td><input type="time" name="start_time[{{$att->user_id}}]" id="start_time_{{$att->user_id}}" class="form-control" value="{{ $att->start_time ? $att->start_time : ($hasPermission ? $hasPermission['startTime'] : '07:30')}}" {{ $att->assistance_check ? '' : 'disabled'}}></td>
                                    <td><input type="time" name="end_time[{{$att->user_id}}]" id="end_time_{{$att->user_id}}" class="form-control" value="{{ $att->end_time ? $att->end_time : ($hasPermission ? $hasPermission['endTime'] : '17:00')}}" {{ $att->assistance_check ? '' : 'disabled'}}></td>
                                    <td><textarea name="commentary[{{$att->user_id}}]" cols="30" rows="2" class="form-control">{{$id->commentary}}</textarea></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-sm btn-success">Guardar</button>
            </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
        var assistance_users = $('.assistance_check');
        for (let i = 0; i < assistance_users.length; i++) {
            let user = assistance_users[i].id.split('_')[1];
            assistance(user,assistance_users[i].checked);
        }
        $('.assistance_check').click(function () {
            let user = this.id.split('_')[1];
            assistance(user,this.checked);
        });
        function assistance(user,status) {
            console.log(status);
            $('#start_time_'+user).prop("disabled", !status);
            $('#end_time_'+user).prop("disabled", !status);
            $('#where_1_'+user).prop("disabled", !status);
            $('#where_2_'+user).prop("disabled", !status);
        }
    </script>
@endsection