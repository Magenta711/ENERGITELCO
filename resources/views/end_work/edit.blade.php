@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Firma de anexos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Firma de anexos</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Terminación de contrato</div>
            <div class="box-tools"><a href="{{route('users')}}" class="btn btn-sm btn-primary">Volver</a></div>
        </div>
        <form action="{{ route('user_end_work_update') }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <p>{{auth()->user()->name}} firme si esta descuerdo con los adjuntos para finalizar el proceso de terminación contrato con fecha de {{ auth()->user()->register ? auth()->user()->register->date_end : '' }}, cuyos adjuntos fueron compartidos mediante correo previo y consultar "carta de recomendación en <a href="{{config('app.url')}}">{{config('app.url')}}</a></p>
                <h3>Adjuntos</h3>
                <div class="row">
                    {{-- Letters --}}
                    @foreach (auth()->user()->register->letters as $item)
                        @if ($item->status == 1)
                            <div class="col-md-3">
                                <span class="mailbox-attachment-icon" id="icon">
                                    <div id="type">
                                        <i class="fa fa-file-pdf"></i>
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i><span style="overflow-wrap: break-word;" id="name">{{$item->file->name}}</span></p>
                                    <span class="mailbox-attachment-size">
                                        {{$item->file->size}}
                                        <span id="size"></span>
                                        <a target="_black" href="/storage/end_work/{{$item->file->name}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div>
                            @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary btn-send">Firmar</button>
        </div>
        </form>
    </div>
</section>
@endsection