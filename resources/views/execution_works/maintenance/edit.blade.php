@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear proyecto SMU <small>SMU</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">SMU</a></li>
        <li class="active">Editar</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-title"> Proyecto SMU</div>
            <div class="box-tools">
                <a href="{{route('SMU')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <form method="post" action="{{ route('smu_update', $id->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <p><small>Todo campo con <span class="text-danger">*</span> es <b>obligatorio.</b></small></p>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="id_sede">Id de la sede *</label>
                            <input type="text" id="id_sede" name="id_sede" value="{{ $id->id_sede }}" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="OT">Código OT</label>
                            <input type="text" id="OT" name="OT" value="{{ $id->OT }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="department">Departamentos *</label>
                            <select name="dep" id="department" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el departamento" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option></option>
                                <option value="{{ $id->dep }}" selected>{{ $id->dep }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="municipality">Municipio *</label>
                            <select name="mun" id="municipality" disabled class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el municipio" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                <option></option>
                                <option value="{{ $id->mun }}" selected>{{ $id->mun }}</option>
                            </select>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label for="region">Región</label>
                            <input type="text" id="region" name="region" value="{{ $id->region }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="population">Centro Poblado</label>
                            <input type="text" id="population" name="population" value="{{ $id->population }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="site_name">Nombre del sitio*</label>
                            <input type="text" id="site_name" name="site_name" value="{{ $id->site_name }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lat">Latitud</label>
                            <input type="text" value="{{ $id->lat}}" name="lat" id="lat" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="long">Longitud</label>
                            <input type="text" value="{{ $id->long}}" name="long" id="long" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="locate">Ubicación</label>
                            <input type="text" id="locate" name="locate" value="{{ $id->locate }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="structure">Estructura</label>
                            <input type="text" id="structure" name="structure" value="{{ $id->structure }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="plants_amount">Cantidad plantas</label>
                            <input type="number" id="plants_amount" name="plants_amount" value="{{ $id->plants_amount }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-success btn-send">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{asset("js/project/mintic/create.js")}}"></script>
@endsection
