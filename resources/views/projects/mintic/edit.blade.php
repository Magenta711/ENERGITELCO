@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        Editar proyecto mintic <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">Editar</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title"> proyecto MINTIC</div>
            <div class="box-tools">
            </div>
        </div>
        <div class="box-body">
            <form id="form_main" method="post" action="{{ route('mintic_update',$id->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="code">Id benefiicario</label>
                        <input type="text" id="code" name="code" value="{{ $id->code }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name">Nombre sede educativa</label>
                        <input type="text" id="name" name="name" value="{{ $id->name }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="dep">Departamento</label>
                        <input type="text" id="dep" name="dep" value="{{ $id->dep }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="mun">Municipio</label>
                        <input type="text" id="mun" name="mun" value="{{ $id->mun }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="population">Centro de población</label>
                        <input type="text" id="population" name="population" value="{{ $id->population }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="person_name">Nombre quien atiende la visita</label>
                        <input type="text" id="person_name" name="person_name" value="{{ $id->person_name }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="person_number">Telefono quien atiende la visita</label>
                        <input type="text" id="person_number" name="person_number" value="{{ $id->person_number }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="lat">Latitud</label>
                        <input type="text" id="lat" name="lat" value="{{ $id->lat }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="long">Longitud</label>
                        <input type="text" id="long" name="long" value="{{ $id->long }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="height">Altitud</label>
                        <input type="text" id="height" name="height" value="{{ $id->height }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="date">Fecha visita</label>
                        <input type="date" id="date" name="date" value="{{ $id->date }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="time">Hora visita</label>
                        <input type="time" id="time" name="time" value="{{ $id->time }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="rector_name">Nombre del rector</label>
                        <input type="text" id="rector_name" name="rector_name" value="{{ $id->rector_name }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="rector_number">Numero del rector</label>
                        <input type="text" id="rector_number" name="rector_number" value="{{ $id->rector_number }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="technical_id">Técnico asignado para la visita</label>
                        <select name="technical_id" id="technical_id" class="form-control">
                            <option disabled selected></option>
                            @foreach ($users as $item)
                                <option {{ ($id->technical_id == $item->id) ? 'selected' : '' }} value="{{$item->id}}">{{$item->cedula}} - {{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="date_install">Fecha instalación</label>
                        <input type="date" id="date_install" name="date_install" value="{{ $id->date_install }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="time_install">Hora instalación</label>
                        <input type="time" id="time_install" name="time_install" value="{{ $id->time_install }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="observation">Observaciones</label>
                        <textarea name="observation" id="observation" cols="30" rows="3" class="form-control">{{ $id->observation }}</textarea>
                    </div>
                </div>
                <input type="text" name="value_send" id="value_send" class="hide">
            </form>
        </div>
        <div class="box-footer">
            <button onclick="document.getElementById('value_send').value = 'Firmar';document.getElementById('form_main').submit();" class="btn btn-sm btn-primary btn-send">Enviar y firmar</button>
            <button onclick="document.getElementById('value_send').value = 'Guardar';document.getElementById('form_main').submit();" class="btn btn-sm btn-success btn-send">Guardar</button>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/project/mintic/water_marker/upload.js')}}"></script>
@endsection