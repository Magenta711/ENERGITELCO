@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Permiso de trabajo <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li><a href="#">Caja menor, víaticos y bonificaciones</a></li>
        <li class="active"><a href="#">Bonificaciones técnicas</a></li>
    </ol>
</section>
<section class="content">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Bonificaciones permisos de trabajo</h3>
            <div class="box-tools">
                <a href="{{route('bonuses_technical')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{ route('bonuses_technical_update',$id->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @method('PUT')
            @csrf
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Estación base</th>
                                <th>Días</th>
                                <th>Fecha inicio - fin</th>
                                <th>Funcionario</th>
                                <th>Bonificación</th>
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <td>{{ $item['nombre_eb'] }}</td>
                                    <td>{{ $item['amount'] }}</td>
                                    <td>{{ $item['created_at'] }} {{ $item['ended_at'] }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td class="text-right">
                                       {{ $item['bonus'] ?? 0 }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box box-footer">
                <button id="send" class="btn btn-sm btn-success btn-send">Guardar</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('js')
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


{{-- Lista por proyectos y mes anterior y proyectos que inicio y quedaron iniciado --}}