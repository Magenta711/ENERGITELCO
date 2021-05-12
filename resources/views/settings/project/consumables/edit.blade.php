@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Editar consumible <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li><a href="#">Lista de proyectos</a></li>
        <li class="active">Editar consumible</li>
    </ol>
</section>
<section class="content">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                @if ($error != '')
                    <li>{{ $error }}</li>
                @endif
            @endforeach
            </ul>
        </div>
    @endif
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
        
                    <h3 class="box-title">{{$id->description}}</h3>
                    <div class="box-tools">
                        <a href="{{route('consumables_setting')}}" class="btn btn-sm btn-primary">Volder</a>
                    </div>
                </div>
                    <!-- /.box-header -->
                    <form action="{{route('consumables_setting_update',$id->id)}}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="description">Descripción del consumible</label>
                                <input type="text" name="description" id="description" value="{{$id->description}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="value">Valor</label>
                                <input type="text" name="value" id="value" value="{{$id->value}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="state">Estado</label>
                                <select name="state" id="state" class="form-control">
                                    <option {{($id->state == 0) ? 'selected' : ''}} value="1">Activo</option>
                                    <option {{($id->state == 0) ? 'selected' : ''}} value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-sm btn-success btn-send">Guardar</button>
                        </div>
                    </form>
            </div>
</section>
@endsection