@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear memorando <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Llamado de atención</li>
        <li class="active">Crear memorando</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('memorandum')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('memorandum_store')}}" method="post">
        @csrf
        <div class="box-body">
            <div class="form-group row">
                <div class="col-md-12">
                    <p>Area:</p>
                </div>
                @foreach ($positions as $item)
                    <div class="col-sm-3">
                        <label>
                            <input type="checkbox" name="position[]" id="" value="{{$item->id}}" checked>
                            {{$item->name}}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="affair">Asunto</label>
                <input type="text" name="affair" id="affair" value="{{old('affair')}}" placeholder="Asunto" class="form-control" autofocus>
            </div>
            <div class="form-group">
                <label for="references">Referencias</label>
                <textarea name="references" id="references" cols="4" rows="5" class="form-control">{{old('references')}}</textarea>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary btn-send">Enviar y firmar</button>
        </div>
        </form>
    </div>
</section>
@endsection