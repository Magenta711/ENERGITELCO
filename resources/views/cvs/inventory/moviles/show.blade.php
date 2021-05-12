@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar móvil
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Inventarios</a></li>
        <li><a href="">Móviles</a></li>
        <li class="active">Mostrar moviles</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_inventary_moviles')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="brand">Marca</label>
                        <p>{{ $id->brand }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="family">Familia</label>
                        <p>{{ $id->family }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <p>{{ $id->modelo }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="imei">IMEI</label>
                        <p>{{ $id->cod }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="icc-id">ICC-ID</label>
                    <p>{{ $id->icc_id }}</p>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="postpaid_date">Fecha pospago</label>
                        <p>{{ $id->postpaid_date }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Valor equipo</label>
                        <p>{{ $id->value }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sede_id">Sede</label>
                        <p>{{ $id->sede->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Planilla</label>
                        <p>{{ $id->payroll }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Fecha de activación</label>
                        <p>{{ $id->activation_date }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" id="send" class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection