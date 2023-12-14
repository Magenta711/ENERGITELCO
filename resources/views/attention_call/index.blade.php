@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear un descargo, llamados de atencion y felicitaciones <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Descargos</li>
    </ol>
</section>
<section class="content">
     
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de descargos</h3>
                    <div class="box-tools">
                        @can('Realizar llamados de atención a trabajadores')
                            <a class="btn btn-sm btn-success" href="{{ route('attention_call_create') }}">Crear</a>
                        @endcan
                    </div>
                </div>
                <div class="box-body">
                    @include('attention_call.include.table')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection