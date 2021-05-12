@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ver computadores <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Computadores</a></li>
        <li class="active">Ver computadores</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ver computadores</h3>
                    <div class="box-tools">
                        <a href="{{route('inv_computer')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <form action="{{ route('inv_computer_store') }}" method="POST" name="POST" enctype="multipart/form-data">
                    @csrf
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    @if ($id->user)
                                        <div class="col-md-6">
                                            <label for="brand">Funcionario</label>
                                            <p>{{ $id->user->name }}</p>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <label for="brand">Marca</label>
                                        <p>{{ $id->brand }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mac">Mac</label>
                                        <p>{{ $id->mac }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="serial">Serial</label>
                                        <p>{{ $id->serial }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="model">Modelo</label>
                                        <p>{{ $id->model }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cpu">Procesador</label>
                                        <p>{{ $id->cpu }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rom">Disco duro</label>
                                        <p>{{ $id->rom }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ram">Memoria RAM</label>
                                        <p>{{ $id->ram }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="so">Sistema operativo</label>
                                        <p>{{ $id->so }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="software">Software instalado</label>
                                        <p>{{ $id->software }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="license">Licencia</label>
                                        <p>{{ $id->license }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="graphic_card">Tarjeta grafica</label>
                                        <p>{{ $id->graphic_card }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="warranty">Garantía</label>
                                        <p>{{ $id->warranty }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="site">Ubicación</label>
                                        <p>{{ $id->site }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="type">Tipo</label>
                                        <p>{{ $id->type }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="start_date">Fecha ingreso o compra</label>
                                        <p>{{ $id->start_date }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status">Estado</label>
                                        <p>
                                           {{ ($id->status == '3') ? 'Asignado' : '' }}
                                           {{ ($id->status == '1') ? 'Sin asignar' : '' }}
                                           {{ ($id->status == '2') ? 'Malo' : '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="avatars">Foto</label>
                                <span class="mailbox-attachment-icon has-img" id="icon">
                                    <div id="type">
                                        <img src="/storage/inventory/computer/{{$id->avatar}}" style="width: 100%;" alt="Attachment">
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->avatar}}</p>
                                    <span class="mailbox-attachment-size" style="min-height: 17px;">
                                        <a target="_black" href="/storage/inventory/computer/{{$id->avatar}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="office">Office</label>
                                <p>{{ $id->office }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="antivirus">Antivirus</label>
                                <p>{{ $id->antivirus }}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="elemets">Elementos o accesorios</label>
                        <p>{{ $id->elemets }}</p>
                    </div>
                    <div class="form-group">
                        <label for="ports">Puertos</label>
                        <p>{{ $id->ports }}</p>
                    </div>
                    <div class="form-group">
                        <label for="tecnology">Tecnologías instaladas</label>
                        <p>{{ $id->tecnology }}</p>
                    </div>
                    <div class="form-group">
                        <label for="wireless_connectivity">Conectividad inalámbrica</label>
                        <p>{{ $id->wireless_connectivity }}</p>
                    </div>
                    <div class="form-group">
                        <label for="commentary">Comentarios y cambios</label>
                        <p>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </ul>
</section>
@endsection