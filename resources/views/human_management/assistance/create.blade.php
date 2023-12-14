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
        <li class="active">Crear</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Crear asistencia</h3>
                <div class="box-tools">
                    <a href="{{route('assistance')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('assistance_store')}}" method="post">
                @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" class="form-control" value="{{old('date') ?? now()->format('Y-m-d')}}" id="date" name="date">
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
                            @foreach ($users as $user)
                                @php
                                    $hasPermission = hasPermission($user->id,$arrayPermissionUsers);
                                @endphp
                                <tr>
                                    <td><input type="checkbox" class="assistance_check" name="assistance[{{$user->id}}]" value="{{$user->id}}" id="assistance_{{$user->id}}" {{ $hasPermission ? 'checked' : ''}}></td>
                                    <td>{{$user->cedula}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->position->name}}</td>
                                    <td><input type="radio" name="where[{{$user->id}}]" id="where_1_{{$user->id}}" value="Oficina" disabled></td>
                                    <td><input type="radio" name="where[{{$user->id}}]" {{ $hasPermission ? 'checked' : ''}} id="where_2_{{$user->id}}" value="Campo" disabled></td>
                                    <td><input type="time" name="start_time[{{$user->id}}]" id="start_time_{{$user->id}}" class="form-control" value="{{$hasPermission ? $hasPermission['startTime'] : '07:30'}}" disabled></td>
                                    <td><input type="time" name="end_time[{{$user->id}}]" id="end_time_{{$user->id}}" class="form-control" value="{{$hasPermission ? $hasPermission['endTime'] : '17:00'}}" disabled></td>
                                    <td><textarea name="commentary[{{$user->id}}]" cols="30" rows="2" class="form-control"></textarea></td>
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
            $('#start_time_'+user).prop("disabled", !status);
            $('#end_time_'+user).prop("disabled", !status);
            $('#where_1_'+user).prop("disabled", !status);
            $('#where_2_'+user).prop("disabled", !status);
        }
    </script>
@endsection