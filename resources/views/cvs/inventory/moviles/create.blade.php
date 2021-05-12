@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear movil
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Inventarios</a></li>
        <li><a href="">Moviles</a></li>
        <li class="active">Crear moviles</li>
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
        <form action="{{route('cvs_inventary_moviles_store')}}" method="post" autocomplete="off">
            @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="brand">Marca</label>
                        <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="family">Familia</label>
                        <input type="text" name="family" id="family" class="form-control" value="{{ old('family') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="imei">IMEI</label>
                        <input type="text" name="imei" id="imei" class="form-control" value="{{ old('imei') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="icc_id">ICC-ID</label>
                    <input type="text" name="icc_id" id="icc_id" class="form-control" value="{{ old('icc_id') }}">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="postpaid_date">Fecha pospago</label>
                        <input type="date" name="postpaid_date" id="postpaid_date" class="form-control" value="{{ now()->addDays(45)->format('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="value">Valor equipo</label>
                        <input type="text" name="value" id="value" class="form-control" value="{{ old('value') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sede_id">Sede</label>
                        <select name="sede_id" id="sede_id" class="form-control">
                            <option selected disabled></option>
                            @foreach ($sedes as $item)
                                <option {{ old('sede_id') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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

@section('js')
    <script>
        var bPreguntar = true;
    
        window.onbeforeunload = preguntarAntesDeSalir;
        $(document).ready(function() {
            $('#send').click(function (){
                bPreguntar = false;
                return $('form').on( "submit");
            });
        });
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
                return "¿Seguro que quieres salir?";
        }
    </script>
@endsection

{{-- fecha de activacion -> cuando se vende --}}
{{-- planilla -> despues de la venta --}}