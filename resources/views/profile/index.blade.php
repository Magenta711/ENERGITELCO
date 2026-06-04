@extends('lte.layouts')

@section('content')

<section class="content-header">
    <h1>
        Perfil de usuario <small>{{ auth()->user()->getRoleNames()[0] }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Perfil de usuario</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
     
    <div class="row">
        <div class="col-md-4">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('img')}}/{{ auth()->user()->foto }}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
                    <p class="text-danger text-center">{{ auth()->user()->getRoleNames()[0] }}</p>
                    <p class="text-muted text-center">{{auth()->user()->position->name}}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Aprobaciones</b> <a class="pull-right">{{ auth()->user()->approvals() }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Permisos de trabajo</b> <a class="pull-right">{{ count(auth()->user()->work1) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Formatos</b> <a class="pull-right">{{ auth()->user()->responsable() }}</a>
                        </li>
                    </ul>

                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sobre mi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-credit-card margin-r-5"></i> Documento de identificacion</strong>

                    <p class="text-muted">
                        {{ auth()->user()->cedula }}
                    </p>

                    <hr>

                    <strong><i class="fa fa-envelope margin-r-5"></i> Correo</strong>

                    <p class="text-muted">{{auth()->user()->email}}</p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Direccion</strong>

                    <p class="text-muted">{{auth()->user()->direccion}}</p>

                    <hr>
                    
                    <strong><i class="fa fa-phone margin-r-5"></i>Telefono</strong>
                    
                    <p class="text-muted"> {{auth()->user()->telefono}}</p>
                    
                    <hr>
                    
                    <strong><i class="fa fa-user margin-r-5"></i> Cargo</strong>
                    
                    <p class="text-muted"> {{auth()->user()->position->name}}</p>
                    
                    <hr>
                    
                    <strong><i class="fa fa-chart-area margin-r-5"></i> Área</strong>

                    <p class="text-muted"> {{auth()->user()->area}}</p>

                    {{-- <hr> --}}

                    {{-- <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- /.nav-tabs-custom -->
        <div class="col-md-8">
            @include('users.include.more_information',['id' => auth()->user()])
        </div>
      </div>
    </div>
</section>
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/profile.css') }}"> --}}
@endsection