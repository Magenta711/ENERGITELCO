@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Comisiones <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Comisiones</li>
    </ol>
</section>
<section class="content">
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-text-width"></i>
            <div class="box-title">Comisiones</div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @can('Lista de comisiones para técnicos de proyectos')
                <div class="box">
                    <div class="box-body"><a href="{{route('setting_bonuses_technical')}}" class="btn btn-sm btn-link">Comisiones por técnicos</a></div>
                </div>
            @endcan
            @can('Lista de comisiones para coordinadores de proyectos')
                <div class="box">
                    <div class="box-body"><a href="{{route('setting_bonuses_control')}}" class="btn btn-sm btn-link">Comisiones por control</a></div>
                </div>
            @endcan
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
@endsection