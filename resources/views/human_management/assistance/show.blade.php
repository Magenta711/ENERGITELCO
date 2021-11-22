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
        <li class="active">Ver</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ver asistencia</h3>
                <div class="box-tools">
                    <a href="{{route('assistance')}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="date">Fecha</label>
                    <p>{{$id->date}}</p>
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
                                <tr>
                                    <td><span class="label {{ $att->assistance_check ? 'label-primary' : 'label-danger'}}"><i class="fa {{ $att->assistance_check ? 'fa-check' : 'fa-times'}}"></span></td>
                                    <td>{{$att->user->cedula}}</td>
                                    <td>{{$att->user->name}}</td>
                                    <td>{{$att->user->position->name}}</td>
                                    <td><span class="label {{$att->where == 'Oficina' ? 'label-success' : 'label-warning'}}"><i class="fa {{$att->where == 'Oficina' ? 'fa-check' : 'fa-times'}}"></span></td>
                                    <td><span class="label {{$att->where == 'Campo' ? 'label-success' : 'label-warning'}}"><i class="fa {{$att->where == 'Campo' ? 'fa-check' : 'fa-times'}}"></span></td>
                                    <td>{{ $att->start_time}}</td>
                                    <td>{{ $att->end_time}}</td>
                                    <td>{{$id->commentary}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection