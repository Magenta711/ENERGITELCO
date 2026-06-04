@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear un descargo, llamados de atencion o felicitaciones <small>Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Usuarios</a></li>
        <li><a href="#"> Descargos</a></li>
        <li class="active">Editar descargo</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{route('attention_call')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('attention_call_update',$id->id)}}" method="post">
            @csrf
            @method('PUT')
        <div class="box-body">
            <p>{{$id->header}}</p>
            <div class="row">
                <div class="col-md-4">
                    <strong>Número de documento</strong>
                    <p>{{$id->receiverCall->cedula}}</p>
                </div>
                <div class="col-md-4">
                    <strong>Nombre completo funcionario</strong>
                    <p>{{$id->receiverCall->name}}</p>
                </div>
                <div class="col-md-4">
                    <strong>Rol autorizado</strong>
                    <p>{{$id->receiverCall->position->name}}</p>
                </div>
            </div>

            <hr>
                @if ($id->responsableCall->id == auth()->id())
                    <div class="form-group">
                        <label for="affair">Asunto</label>
                        <input type="text" name="affair" id="affair" value="{{$id->affair}}" placeholder="Asunto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="references">Referencias</label>
                        <textarea name="references" id="references" cols="30" rows="3" class="form-control textarea">{{$id->references}}</textarea>
                    </div>
                @endif
                @can('Aprobar descargos de atención')
                    @if ($id->comment && $id->approverCall->id == auth()->id())
                        <div class="form-group">
                            <label for="comment">Comentarios</label>
                            <textarea name="comment" id="comment" cols="30" rows="3" class="form-control textarea">{{$id->comment}}</textarea>
                        </div>
                    @endif
                @endcan
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('css')
{{-- wysihtml5-supported --}}
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
@endsection
@section('js')
    <script src="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
    <script>
        $(function () {
            $('.textarea').wysihtml5();
        })
    </script>
@endsection