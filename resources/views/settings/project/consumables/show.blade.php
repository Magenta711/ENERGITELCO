@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear proyecto <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li><a href="#">Lista de proyectos</a></li>
        <li class="active">Crear proyecto</li>
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
                <div class="box-body">
                    <div class="form-group">
                        <label for="description">Descripción del consumible</label><br>
                        {{$id->description}}
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="value">Valor</label><br>
                        {{$id->value}}
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="state">Estado</label><br>
                        {{($id->state == 1) ? 'Activo' : 'Inactivo'}}
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('consumables_setting_edit',$id->id)}}" class="btn btn-sm btn-success">Editar</a>
                </div>
            </div>
</section>
@endsection