@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar Sim Cards
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">CVS</a></li>
        <li><a href="">Inventarios</a></li>
        <li><a href="">Sim Cards</a></li>
        <li class="active">Editar Sim Cards</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('cvs_inventary_sims')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('cvs_inventary_sims_update',$id->id)}}" id="form_sim" method="post" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
            <div id="origen" class="origen">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="serial">ICC-IC</label>
                            <input type="text" readonly name="serial" id="serial" class="form-control serial" value="{{ $id->cod }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type_id">Tipo</label>
                            <select name="type_id" id="type_id" class="form-control type_id">
                                <option selected disabled></option>
                                @foreach ($types as $item)
                                    <option {{ $id->type_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="number">Vendedor</label>
                            <select name="user_id" id="user_id" class="form-control user_id">
                                <option selected disabled></option>
                                @foreach ($users as $item)
                                    <option {{ $id->user_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->cedula }} - {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" value="{{ $id->date }}" id="date" class="form-control date">
                        </div>
                    </div>
                </div>
                <hr>
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
                $('#form_sim').submit();
            });
            $('#form_sim').off( "submit");
        });
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
                return "¿Seguro que quieres salir?";
        }
    </script>
@endsection