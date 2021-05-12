@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar computadores <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Computadores</a></li>
        <li class="active">Editar computadores</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Editar computadores</h3>
                    <div class="box-tools">
                        <a href="{{route('inv_computer')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <form action="{{ route('inv_computer_update',$id->id) }}" method="POST" name="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="user_id">Funcionario</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option selected></option>
                                    @foreach ($users as $user)
                                        <option {{$id->user_id == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="brand">Serial</label>
                                <input type="text" class="form-control" id="serial" name="serial" value="{{ $id->serial }}">
                            </div>
                            <div class="col-md-6">
                                <label for="mac">Mac</label>
                                <input type="text" class="form-control" id="mac" name="mac" value="{{ $id->mac }}">
                            </div>
                            <div class="col-md-6">
                                <label for="serial">Marca</label>
                                <input type="text" class="form-control" id="brand" name="brand" value="{{ $id->brand }}">
                            </div>
                            <div class="col-md-6">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" id="model" name="model" value="{{ $id->model }}">
                            </div>
                            <div class="col-md-6">
                                <label for="cpu">Procesador</label>
                                <input type="text" class="form-control" id="cpu" name="cpu" value="{{ $id->cpu }}">
                            </div>
                            <div class="col-md-6">
                                <label for="rom">Disco duro</label>
                                <input type="text" class="form-control" id="rom" name="rom" value="{{ $id->rom }}">
                            </div>
                            <div class="col-md-6">
                                <label for="ram">Memoria RAM</label>
                                <input type="text" class="form-control" id="ram" name="ram" value="{{ $id->ram }}">
                            </div>
                            <div class="col-md-6">
                                <label for="so">Sistema operativo</label>
                                <input type="text" class="form-control" id="so" name="so" value="{{ $id->so }}">
                            </div>
                            <div class="col-md-6">
                                <label for="software">Software instalado</label>
                                <input type="text" class="form-control" id="software" name="software" value="{{ $id->software }}">
                            </div>
                            <div class="col-md-6">
                                <label for="license">Licencia</label>
                                <input type="text" class="form-control" id="license" name="license" value="{{ $id->license }}">
                            </div>
                            <div class="col-md-6">
                                <label for="graphic_card">Tarjeta grafica</label>
                                <input type="text" class="form-control" id="graphic_card" name="graphic_card" value="{{ $id->graphic_card }}">
                            </div>
                            <div class="col-md-6">
                                <label for="warranty">Garantía</label>
                                <input type="date" class="form-control" id="warranty" name="warranty" value="{{ $id->warranty }}">
                            </div>
                            <div class="col-md-6">
                                <label for="site">Ubicación</label>
                                <input type="text" class="form-control" id="site" name="site" value="{{ $id->site }}">
                            </div>
                            <div class="col-md-6">
                                <label for="type">Tipo</label>
                                <select name="type" id="type" name="type" class="form-control">
                                    <option selected disabled></option>
                                    <option {{ $id->type == 'Escritorio' ? 'selected' : '' }} value="Escritorio">Escritorio</option>
                                    <option {{ $id->type == 'Dos en uno' ? 'selected' : '' }} value="Dos en uno">Dos en uno</option>
                                    <option {{ $id->type == 'Portatil' ? 'selected' : '' }} value="Portatil">Portatil</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="start_date">Fecha ingreso o compra</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $id->start_date }}">
                            </div>
                            <div class="col-md-6">
                                <label for="status">Estado</label>
                                <select name="status" id="status" name="status" class="form-control">
                                    <option selected disabled></option>
                                    <option {{ ($id->status == '3') ? 'selected' : '' }} value="3">Asignado</option>
                                    <option {{ ($id->status == '1') ? 'selected' : '' }} value="1">Sin asignar</option>
                                    <option {{ ($id->status == '2') ? 'selected' : '' }} value="2">Malo</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="avatars">Foto</label>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-5">
                                    <span class="mailbox-attachment-icon has-img" id="icon">
                                        <div id="type">
                                            <img src="/storage/inventory/computer/{{$id->avatar}}" style="width: 100%;" alt="Attachment">
                                        </div>
                                    </span>
                                    <div class="mailbox-attachment-info">
                                        <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$id->avatar}}</p>
                                        <span class="mailbox-attachment-size">
                                            <a target="_black" href="/storage/inventory/computer/{{$id->avatar}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <label for="avatars" class="form-control text-center"><i class="fa fa-upload"></i></label>
                            <input type="file" accept="image/*" class="hide" id="avatars" name="avatars" value="{{ $id->avatars }}">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="office">Office</label>
                                <input type="text" class="form-control" id="office" name="office" value="{{ $id->office }}">
                            </div>
                            <div class="col-md-6">
                                <label for="antivirus">Antivirus</label>
                                <input type="text" class="form-control" id="antivirus" name="antivirus" value="{{ $id->antivirus }}">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="elemets">Elementos o accesorios</label>
                        <input type="text" class="form-control" id="elemets" name="elemets" value="{{ $id->elemets }}">
                    </div>
                    <div class="form-group">
                        <label for="ports">Puertos</label>
                        <input type="text" class="form-control" id="ports" name="ports" value="{{ $id->ports }}">
                    </div>
                    <div class="form-group">
                        <label for="tecnology">Tecnologías instaladas</label>
                        <input type="text" class="form-control" id="tecnology" name="tecnology" value="{{ $id->tecnology }}">
                    </div>
                    <div class="form-group">
                        <label for="wireless_connectivity">Conectividad inalámbrica</label>
                        <input type="text" class="form-control" id="wireless_connectivity" name="wireless_connectivity" value="{{ $id->wireless_connectivity }}">
                    </div>
                    <div class="form-group">
                        <label for="commentary">Comentarios y cambios <br><small>Fecha: <i>texto</i> y salto de linea</small></label>
                        <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{$id->commentary}}</textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary btn-send">Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </ul>
</section>
@endsection