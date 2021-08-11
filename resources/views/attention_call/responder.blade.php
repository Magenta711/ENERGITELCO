@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Reponder descargo <small>Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Usuarios</a></li>
        <li><a href="#"> Descargos</a></li>
        <li class="active">Reponder descargo</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('attention_call')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('called_responder_store',$id->id)}}" method="post">
            @csrf
            @method('PUT')
        <div class="box-body">
            @include('attention_call.include.attention_body',['arg' => true])
            @if ($id->receiverCall->id == auth()->id() && !$id->arguments && $id->created_at > now()->subMonths(3)->format('Y-m-d H:i:s'))
                <div class="form-group">
                    <label for="arguments">Argumentos</label> <small>(Argumentos del trabajador)</small>
                    <textarea name="arguments" id="arguments" cols="30" rows="3" class="form-control">{{$id->arguments}}</textarea>
                </div>
            @endif
            @if ($id->created_at < now()->subMonths(3)->format('Y-m-d H:i:s'))
                <p>Ha expirado el tiempo para responder un llamado de atención</p>
            @endif
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Enviar y firmar</button>
        </div>
        </form>
    </div>
</section>
@endsection