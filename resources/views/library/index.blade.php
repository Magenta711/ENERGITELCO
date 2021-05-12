@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Biblioteca <small>Lista de formatos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Biblioteca</li>
    </ol>
</section>
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <a href="{{route('view_list_form',  1)}}">H-FR-23 PERMISOS DE TRABAJO</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <a href="{{route('view_list_form',2)}}">H-FR-34 INSPECCIÓN DE EQUIPOS DE PROTECCIÓN CONTRA CAÍDAS</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <a href="{{route('view_list_form',3)}}">L-FR-08 INSPECCIÓN DETALLADA DE VEHÍCULOS</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <a href="{{route('view_list_form',4)}}">O-FR-06 REVISIÓN Y ASIGNACIÓN DE HERRAMIENTAS</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <a href="{{route('view_list_form',5)}}">H-FR-09 ENTREGA DE DOTACIÓN PERSONAL</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <a href="{{route('view_list_form',6)}}">L-FR-06 LISTA DE VERIFICACIÓN PARA EL MANTENIMIENTO DE LOS COMPUTADORES</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <a href="{{route('view_list_form',7)}}">H-FR-24 SOLICITUD DE PERMISO LABORAL O NOTIFICACIÓN DE INCAPACIDAD MÉDICA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection