@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Acerca del sistema <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Acerca del sistema</li>
    </ol>
</section>
<section class="content">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        @include('settings.include.menu')
        <div class="col-md-8">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
    
                <h3 class="box-title">Sobre el sistema</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <img src="{{asset('img/logo.png')}}" alt="..." class="rounded" style="width: 150px;"><br>
                                <h4 class='box-title'>Sistema de gestión integrado <br> Energitelco S.A.S</h4>
                                <h5>Versión: </h5><h5>1.5.14</h5>
                                <h5>Fecha de creación: 29/10/2019</h5>
                                <h5>Última modificación: 03/06/2021</h5>
                                <h5>© {{now()->format('Y')}} Todos los derechos reservados</h5>
                                <h5>Hecho por:</h5>
                                Juan Esteban Leal Usuga.
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection