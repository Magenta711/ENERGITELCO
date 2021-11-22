@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear consumible <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li><a href="#">Consumibles</a></li>
        <li class="active">Crear consumible</li>
    </ol>
</section>
<section class="content">
     
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
                    <h3 class="box-title">Crear un nuevo consumible</h3>
                    <div class="box-tools">
                        <a href="{{route('consumables_setting')}}" class="btn btn-sm btn-primary">Volder</a>
                    </div>
                </div>
                    <!-- /.box-header -->
                <form action="{{route('consumables_setting_store')}}" method="post"  autocomplete="off">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="description">Descripción del consumible</label>
                            <input type="text" name="description" id="description" value="{{old('description')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="value">Valor</label>
                            <input type="text" name="value" id="value" value="{{old('value')}}" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button id="send" class="btn btn-sm btn-success btn-send">Guardar</button>
                    </div>
                </form>
            </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/project/create.js') }}" defer></script>
    <script>
        var bPreguntar = true;
    
        window.onbeforeunload = preguntarAntesDeSalir;

        $(document).ready(function() {
            $('#send').click(function (){
                bPreguntar = false;
                return d.submit();
            });
        });
        
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
            return "¿Seguro que quieres salir?";
        }
    </script>
@endsection