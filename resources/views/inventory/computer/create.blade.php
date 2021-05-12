@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Crear computadores <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Computadores</a></li>
        <li class="active">Crear computadores</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Crear computadores</h3>
                    <div class="box-tools">
                        <a href="{{route('inv_computer')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <form action="{{ route('inv_computer_store') }}" method="POST" name="POST" enctype="multipart/form-data">
                    @csrf
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="user_id">Funcionario</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option selected></option>
                                    @foreach ($users as $user)
                                        <option {{old('user_id') == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="serial">Serial</label>
                                <input type="text" class="form-control" id="serial" name="serial" value="{{ old('serial') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="mac">Mac</label>
                                <input type="text" class="form-control" id="mac" name="mac" value="{{ old('mac') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="brand">Marca</label>
                                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="cpu">Procesador</label>
                                <input type="text" class="form-control" id="cpu" name="cpu" value="{{ old('cpu') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="rom">Disco duro</label>
                                <input type="text" class="form-control" id="rom" name="rom" value="{{ old('rom') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="ram">Memoria RAM</label>
                                <input type="text" class="form-control" id="ram" name="ram" value="{{ old('ram') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="so">Sistema operativo</label>
                                <input type="text" class="form-control" id="so" name="so" value="{{ old('so') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="software">Software instalado</label>
                                <input type="text" class="form-control" id="software" name="software" value="{{ old('software') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="license">Licencia</label>
                                <input type="text" class="form-control" id="license" name="license" value="{{ old('license') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="graphic_card">Tarjeta grafica</label>
                                <input type="text" class="form-control" id="graphic_card" name="graphic_card" value="{{ old('graphic_card') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="warranty">Garantía</label>
                                <input type="date" class="form-control" id="warranty" name="warranty" value="{{ old('warranty') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="site">Ubicación</label>
                                <input type="text" class="form-control" id="site" name="site" value="{{ old('site') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="type">Tipo</label>
                                <select name="type" id="type" name="type" class="form-control">
                                    <option selected disabled></option>
                                    <option {{ old('type') == 'Escritorio' ? 'selected' : '' }} value="Escritorio">Escritorio</option>
                                    <option {{ old('type') == 'Dos en uno' ? 'selected' : '' }} value="Dos en uno">Dos en uno</option>
                                    <option {{ old('type') == 'Portatil' ? 'selected' : '' }} value="Portatil">Portatil</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="start_date">Fecha ingreso o compra</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="status">Estado</label>
                                <select name="status" id="status" name="status" class="form-control">
                                    <option selected disabled></option>
                                    <option {{ (old('status') == '3') ? 'selected' : '' }} value="3">Asignado</option>
                                    <option {{ (old('status') == '1') ? 'selected' : '' }} value="1">Sin asignar</option>
                                    <option {{ (old('status') == '2') ? 'selected' : '' }} value="2">Malo</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="avatars">Foto</label>
                            <label for="avatars" class="form-control text-center"><i class="fa fa-upload"></i></label>
                            <input type="file" accept="image/*" class="hide" id="avatars" name="avatars" value="{{ old('avatars') }}">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="office">Office</label>
                                <input type="text" class="form-control" id="office" name="office" value="{{ old('office') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="antivirus">Antivirus</label>
                                <input type="text" class="form-control" id="antivirus" name="antivirus" value="{{ old('antivirus') }}">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="elemets">Elementos o accesorios</label>
                        <input type="text" class="form-control" id="elemets" name="elemets" value="{{ old('elemets') }}">
                    </div>
                    <div class="form-group">
                        <label for="ports">Puertos</label>
                        <input type="text" class="form-control" id="ports" name="ports" value="{{ old('ports') }}">
                    </div>
                    <div class="form-group">
                        <label for="tecnology">Tecnologías instaladas</label>
                        <input type="text" class="form-control" id="tecnology" name="tecnology" value="{{ old('tecnology') }}">
                    </div>
                    <div class="form-group">
                        <label for="wireless_connectivity">Conectividad inalámbrica</label>
                        <input type="text" class="form-control" id="wireless_connectivity" name="wireless_connectivity" value="{{ old('wireless_connectivity') }}">
                    </div>
                    <div class="form-group">
                        <label for="commentary">Comentarios y cambios <br><small>Fecha: <i>texto</i> y salto de linea</small></label>
                        <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button id="send" class="btn btn-sm btn-primary btn-send">Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </ul>
</section>
@endsection

<script>
    var bPreguntar = true;
    window.onbeforeunload = preguntarAntesDeSalir;
    $(document).ready(function() {
        $('#send').click(function (){
            bPreguntar = false;
            return true;
        });
        $('.file_input').change(function (){
            $($(this).parent().children('label')[1]).addClass('text-aqua');
        });
    });
    function preguntarAntesDeSalir()
    {
        if (bPreguntar)
            return "¿Seguro que quieres salir?";
    }
</script>