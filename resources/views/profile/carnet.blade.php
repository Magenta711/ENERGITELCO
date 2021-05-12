@extends('lte.layouts')

@section('content')

<section class="content-header">
    <h1>
        Carnet
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">carnet</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    @include('includes.alerts')
    
    <div class="text-center">
        <div class="row">
            <div class="col-md-4 col-sm-3"></div>
            <div class="col-md-4 col-sm-6">
                <div class="box box-primary">
                    <div class="box-body">
                        @if (auth()->user()->register)
                            <img src="{{asset('img')}}/{{ auth()->user()->foto }}" alt="register" class="img-fluid img-thumbnail" style="border-radius: 50%"  width="250px">
                            <h3>{{auth()->user()->name}}</h3>
                            <h4>{{auth()->user()->position->name}}</h4>
                            <hr>
                            <p><b>Cédula:</b> {{auth()->user()->cedula}}</p>
                            <p><b>Teléfono:</b> {{auth()->user()->telefono}}</p>
                            <p><b>EPS:</b> {{auth()->user()->register->eps}}</p>
                            <p><b>RH:</b> {{auth()->user()->register->rh}}</p>
                            <hr>
                            <div class="col-xs-6">
                                <img src="/img/logo.png" height="auto" width="90%" alt="profile">
                            </div>
                            <div class="col-xs-6 text-right">
                                <img src="/img/claro.png" height="auto" width="50%" alt="profile">
                            </div>
                        @else
                            <p class="text-muted">No hay datos suficientes para su carnet</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-3"></div>
        </div>
    </div>
</section>
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('profile.css') }}"> --}}
@endsection