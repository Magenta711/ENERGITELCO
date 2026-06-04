@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Ver usuario <small>Usuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#"> Usuarios</a></li>
            <li class="active">Ver usuarios</li>
        </ol>
    </section>
    <section class="content">
         
        <div class="row">
            <div class="col-md-4">
                @include('users.include.user_information')
            </div>
            <div class="col-md-8">
                @include('users.include.more_information')
            </div>
        </div>
    </section>
@endsection
