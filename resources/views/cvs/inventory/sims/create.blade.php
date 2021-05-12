@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear Sim Cards
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">CVS</a></li>
        <li><a href="">Inventarios</a></li>
        <li><a href="">Sim Cards</a></li>
        <li class="active">Crear Sim Cards</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_inventary_sims')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_inventary_sims_store')}}" id="form_sim" method="post" autocomplete="off">
            @csrf
        <div class="box-body">
            <div id="origen" class="origen">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="serial">ICC-IC</label>
                            <input type="text" name="serial[]" id="serial" class="form-control serial">
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="type_id">Tipo</label>
                            <select name="type_id[]" id="type_id" class="form-control type_id">
                                <option selected disabled></option>
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="help-block" style="display: none;">Este campo es obligatorio</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="number">Vendedor</label>
                            <select name="user_id[]" id="user_id" class="form-control user_id">
                                <option selected disabled></option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->cedula }} - {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" name="date[]" value="{{ now()->format('Y-m-d') }}" id="date" class="form-control date">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <br>
                        <i id="remove" class="fa fa-trash-alt remove"></i>
                    </div>
                </div>
                <hr>
            </div>
            <div id="destino"></div> 
            <button type="button" id="clonar" class="btn btn-sm btn-link"><i class="fa fa-plus"></i> ingresar otra</button>
        </div>
        <div class="box-footer">
            <button type="submit" id="send" class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('css')
    <style>
        .remove:hover {
            cursor: pointer;
            color: red;

        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('js/cvs/sims.js') }}"></script>
@endsection